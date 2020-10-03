<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Kontak;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Models\PromoCode;
use App\Models\Sent;
use App\Support\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\Exception;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $role = Auth::guard('admin')->user();
        $admins = Admin::all();
        $users = User::all();
        $blog = Blog::all();
//        $data =DB::table('carts')
//            ->select()
//            ->orderBy('created_at','DESC')
//            ->get()
//            ->groupBy('address_id');

//        $order = Order::whereMonth('created_at',date('m'))->get();
        $order = Order::wherebetween('created_at', [now()->firstOfMonth()->subDay()->format('Y-m-d H:i:s'), now()->lastOfMonth()->addDay()->format('Y-m-d H:i:s')]);
        $payment = PaymentCart::select('uni_code_payment', 'user_id', 'updated_at', 'finish_payment')->distinct('uni_code_payment')->orderByDesc('updated_at')->get();

        $incomePerdays = PaymentCart::whereBetween('created_at', [now()->firstOfMonth()->subDay()->format('Y-m-d H:i:s'), now()->lastOfMonth()->addDay()->format('Y-m-d H:i:s')])
            ->get()->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('d');
            });
        if ($request->has('period')) {
            $period = $request->period;
        } else {
            $period = null;
        }

        if ($role->role == 'owner') {
            $latest = Blog::orderByDesc('id')->take(6)->get();
        } else {
            $latest = Blog::where('admin_id', $role->id)->orderByDesc('id')->take(6)->get();
        }

        return view('pages.main.admins.dashboard', compact('role', 'admins', 'users', 'blog', 'period', 'latest', 'order', 'payment'));
    }

    public function showInbox(Request $request)
    {
        $contacts = Kontak::orderByDesc('id')->get();
        $promo = PromoCode::where('end', '>', now()->subDay())->orderBy('promo_code')->get();

        if ($request->has("id")) {
            $findMessage = $request->id;
        } else {
            $findMessage = null;
        }

        return view('pages.main.admins.inbox', compact('contacts', 'findMessage', 'promo'));
    }

    public function getRead(Request $request)
    {
        if ($request->type == 'sent') {
            $data = Sent::find(decrypt($request->id))->toArray();
            $ava = asset('images/icon-512.png');
        } else {
            $data = Kontak::find(decrypt($request->id))->toArray();
            $user = User::where('email', $data['email'])->first();
            $ava = $user->getBio->ava != "" ? asset('storage/users/ava/' . $user->getBio->ava) : asset('admins/img/avatar/avatar-' . rand(1, 5) . '.png');
        }

        $data = array_replace($data, [
            'ava' => $ava,
            'created_at' => \Illuminate\Support\Carbon::parse($data['created_at'])->format('l, j F Y') . ' at ' .
                Carbon::parse($data['created_at'])->format('H:i'),
            'encryptID' => encrypt($data['id']),
            'del_route' => $request->type == 'sent' ? route('admin.delete.sent', ['id' => encrypt($data['id'])]) :
                route('admin.delete.inbox', ['id' => encrypt($data['id'])]),
            'str_attach' => $request->type == 'sent' && !is_null($data['attachments']) ?
                count($data['attachments']) . ' attachment(s): ' . implode(', ', $data['attachments']) : null,
        ]);

        return $data;
    }

    public function composeInbox(Request $request)
    {
        $this->validate($request, [
            'inbox_to' => 'required',
            'inbox_subject' => 'required|string|min:3',
            'inbox_category' => 'required|string',
            'inbox_promo' => 'string',
            'inbox_message' => 'required',
            'attachments' => 'array',
            'attachments.*' => 'max:5120'
        ]);

        $data = [
            'subject' => $request->inbox_subject,
            'category' => $request->inbox_category,
            'promo_code' => $request->inbox_promo,
            'body-message' => $request->inbox_message,
            'attachments' => [],
        ];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $row) {
                array_push($data['attachments'], $row->getClientOriginalName());
                $row->storeAs('public/admins/attachments', $row->getClientOriginalName());
            }
        }

        $emails = explode(',', $request->inbox_to);
        foreach ($emails as $email) {
            Sent::create([
                'recipients' => $email,
                'subject' => $data['subject'],
                'category' => $data['category'],
                'promo_code' => $data['promo_code'],
                'message' => $data['body-message'],
                'attachments' => count($data['attachments']) > 0 ? $data['attachments'] : null,
            ]);

            Mail::to($email)->send(new ComposeMail($data));
        }

        if (count($data['attachments']) > 0) {
            foreach ($data['attachments'] as $filename) {
                Storage::delete('public/admins/attachments/' . $filename);
            }
        }

        return back()->with('success', 'Successfully sent a message to ' . implode(', ', $emails) . '!');
    }

    public function deleteInbox(Request $request)
    {
        $contact = Kontak::find(decrypt($request->id));
        $contact->delete();

        return back()->with('success', 'Message from ' . $contact->name . ' [' . $contact->email . '] is successfully deleted!');
    }

    public function showSent(Request $request)
    {
        $sents = Sent::orderByDesc('id')->get();
        $promo = PromoCode::where('end', '>', now()->subDay())->orderBy('promo_code')->get();

        if ($request->has("id")) {
            $findMessage = $request->id;
        } else {
            $findMessage = null;
        }

        return view('pages.main.admins.sent', compact('sents', 'findMessage', 'promo'));
    }

    public function deleteSent(Request $request)
    {
        $sent = Sent::find(decrypt($request->id));
        $sent->delete();

        return back()->with('success', 'Message for ' . $sent->recipients . ' is successfully deleted!');
    }

    public function profil()
    {
        $admin = Auth::guard('admin')->user();

        return view('pages.main.admins.editProfile', compact('admin'));
    }

    public function updateProfil(Request $request)
    {
        $admin = Admin::find(Auth::guard('admin')->id());
        if ($request->check_form == 'personal_data') {
            if ($request->hasfile('ava')) {
                $this->validate($request, [
                    'ava' => 'image|mimes:jpg,jpeg,gif,png|max:2048',
                ]);

                $name = $request->file('ava')->getClientOriginalName();
                if ($admin->ava != '') {
                    Storage::delete('public/admins/ava/' . $admin->ava);
                }
                $request->file('ava')->storeAs('public/admins/ava', $name);

            } else {
                $name = $admin->ava;
            }

            $admin->update([
                'ava' => $name,
                'name' => $request->name,
                'about' => $request->about,
            ]);

        } else {
            $admin->update([
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'whatsapp' => $request->whatsapp,
            ]);
        }

        return back()->with('success', 'Successfully update your profile!');
    }

    public function pengaturan()
    {
        $admin = Auth::guard('admin')->user();

        return view('pages.main.admins.accountSettings', compact('admin'));
    }

    public function updatePengaturan(Request $request)
    {
        $admin = Admin::find(Auth::guard('admin')->id());

        if (!Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Your current password is incorrect!');

        } else {
            if ($request->new_password != $request->password_confirmation) {
                return back()->with('error', 'Your password confirmation doesn\'t match!');

            } else {
                $admin->update([
                    'email' => $request->email,
                    'password' => bcrypt($request->new_password)
                ]);
                return back()->with('success', 'Successfully update your account!');
            }
        }
    }

    public function show_admin()
    {
        $data = Admin::whereNotIn('role', [Role::ROOT])->get();

        return view('pages.main.admins.privilege.admin', [
            'title' => 'Admins List',
            'kategori' => $data
        ]);
    }

    public function admin_add(Request $request)
    {
        $check = Admin::where('username', $request->username)->orwhere('email', $request->email)->first();

        if (empty($check)) {
            Admin::create([
                'email' => $request->email,
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->username),
                'role' => $request->role
            ]);
            return back()->with('success', 'Successfully add new admin!');
        }else{
            return back()->with('error', 'Email / Username already taken');
        }


    }

    public function admin_edit(Request $request)
    {
        try {
            $data = Admin::find($request->id);

            $data->update([
                'name' => $request->name,
                'role' => $request->role
            ]);

            return back()->with('success', 'Data Successfully updated!');
        }catch (Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }

    public function delete_admin($id)
    {
        $post = Admin::find(decrypt($id));

        $post->delete();

        return back()->with('success','Admin Successfully deleted');
    }

    public function reset_password(Request $request)
    {
        $data = Admin::find($request->id);
        $data->update([
            'password' => bcrypt($data->username)
        ]);

        return back()->with('success', 'Successfully Reset Password!');
    }

    public function show_user()
    {
        $data =User::all();

        return view('pages.main.admins.privilege.user', [
            'title' => 'Users List',
            'kategori' => $data
        ]);
    }
}
