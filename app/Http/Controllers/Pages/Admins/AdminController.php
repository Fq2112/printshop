<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Kontak;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Support\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

        if ($request->has("id")) {
            $findMessage = $request->id;
        } else {
            $findMessage = null;
        }

        return view('pages.main.admins.inbox', compact('contacts', 'findMessage'));
    }

    public function composeInbox(Request $request)
    {
        $this->validate($request, [
            'inbox_to' => 'required|string|email|max:255',
            'inbox_subject' => 'string|min:3',
            'inbox_message' => 'required'
        ]);
        $data = array(
            'email' => $request->inbox_to,
            'subject' => $request->inbox_subject,
            'bodymessage' => $request->inbox_message
        );
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from(env('MAIL_USERNAME'), env('APP_TITLE'));
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        return back()->with('success', 'Successfully sent message to ' . $data['email'] . '!');
    }

    public function deleteInbox(Request $request)
    {
        $contact = Kontak::find(decrypt($request->id));
        $contact->delete();

        return back()->with('success', 'Message from ' . $contact->name . ' [' . $contact->email . '] is successfully deleted!');
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
