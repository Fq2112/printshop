<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function show_setting()
    {
        return view('pages.main.admins.setting');
    }

    public function show_general()
    {
        return view('pages.main.admins.setting.general');
    }

    public function update_general(Request $request)
    {
        $data = Setting::find($request->id);
        $data->update([
            'email_premier' => $request->site_email,
            'phone' => $request->site_phone,
            'fax' => $request->site_fax,
            'address' => $request->address
        ]);

        if ($request->hasFile('site_logo')) {
            $this->validate($request, ['site_logo' => 'required|image|mimes:jpg,jpeg,gif,png|max:5120']);
            $thumbnail = uniqid() . $request->file('site_logo')->getClientOriginalName();
            $request->file('site_logo')->move('images/', $thumbnail);
            $data->update([
                'logo' => 'images/' . $thumbnail
            ]);
        } else {
            $thumbnail = "";
        }

        return back()->with('success', 'Data Successfully Updated');
    }

    public function activeMaintenance(Request $request)
    {
        $owner = Admin::where('email', 'sindhu@supremewrap.co.id')->first();
        if (!Hash::check($request->password, $owner->password)) {
            return back()->with([
                'error' => 'Wrong Password Please Try Again!!'
            ]);
        } else {
            $data = Setting::find($request->id);
            if ($data->is_maintenance == 0) {
                $data->update([
                    'is_maintenance' => 1
                ]);
                return back()->with('success', 'Printshop Maintenance Mode Active');
            } else {
                $data->update([
                    'is_maintenance' => 0
                ]);
                return back()->with('success', 'Printshop Maintenance Done');
            }

        }
    }

    public function rule(Request $request)
    {
        return view('pages.main.admins.setting.rules');
    }

    public function rules_update(Request $request)
    {
        $data = Setting::find($request->id);
        $data->update([
            'rules' => $request->rule,
        ]);

        return back()->with('success', 'Rules Successfully Updated to ' . $request->rule . '%');
    }

    public function show_maintenance()
    {
        return view('pages.main.admins.setting.maintenance');
    }
}
