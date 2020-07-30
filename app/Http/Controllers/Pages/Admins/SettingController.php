<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

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
               'logo' => 'images/'.$thumbnail
            ]);
        } else {
            $thumbnail = "";
        }

        return back()->with('success', 'Data Successfully Updated');
    }

    public function rule(Request $request)
    {

    }

    public function show_maintenance()
    {
        return view('pages.main.admins.setting.maintenance');
    }
}
