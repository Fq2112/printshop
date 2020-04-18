<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Kontak;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if ($request->has('period')) {
            $period = $request->period;
        } else {
            $period = null;
        }

        if ($role->isRoot()) {
            $latest = Blog::orderByDesc('id')->take(6)->get();
        } else {
            $latest = Blog::where('admin_id', $role->id)->orderByDesc('id')->take(6)->get();
        }

        return view('pages.main.admins.dashboard', compact('role', 'admins', 'users', 'blog', 'period', 'latest'));
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
}
