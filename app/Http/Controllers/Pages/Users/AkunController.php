<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AkunController extends Controller
{
    public function profil()
    {
        $user = Auth::user();
        $bio = $user->getBio;
        $addresses = $user->getAddress;
        $address = Address::where('user_id', $user->id)->where('is_main', true)->first();

        $provinces = Province::all();

        return view('pages.main.users.sunting-profile', compact('user', 'bio', 'addresses', 'address', 'provinces'));
    }

    public function updateProfil(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->update(['name' => $request->name]);
        $user->getBio->update([
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => preg_replace("![^a-z0-9+]+!i", "", $request->phone),
        ]);

        return back()->with('update', __('lang.profile.update-personal'));
    }

    public function createProfilAddress(Request $request)
    {
        if ($request->is_main == 1) {
            Address::where('user_id', Auth::id())->update(['is_main' => false]);
        }

        Address::create([
            'user_id' => Auth::id(),
            'name' => $request->address_name,
            'phone' => preg_replace("![^a-z0-9+]+!i", "", $request->address_phone),
            'city_id' => $request->city_id,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->long,
            'save_as' => $request->save_as,
            'is_main' => $request->is_main,
        ]);

        return back()->with('add', __('lang.profile.address') . ' [' . $request->address . '] ' . __('lang.profile.create-address'));
    }

    public function updateProfilAddress(Request $request)
    {
        if ($request->is_main == 1) {
            Address::where('user_id', Auth::id())->update(['is_main' => false]);
        }

        $address = Address::find($request->id);
        $address->update([
            'name' => $request->address_name,
            'phone' => preg_replace("![^a-z0-9+]+!i", "", $request->address_phone),
            'city_id' => $request->city_id,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->long,
            'save_as' => $request->save_as,
            'is_main' => $request->is_main,
        ]);

        return back()->with('update', __('lang.profile.address') . ' [' . $address->address . '] ' . __('lang.profile.update-address'));
    }

    public function deleteProfilAddress(Request $request)
    {
        $address = Address::find($request->id);
        $address->delete();

        return back()->with('delete', __('lang.profile.address') . ' [' . $address->address . '] ' . __('lang.profile.delete-address'));
    }

    public function pengaturan()
    {
        $user = Auth::user();
        $bio = $user->getBio;
        $address = Address::where('user_id', $user->id)->where('is_main', true)->first();

        return view('pages.main.users.pengaturan-akun', compact('user', 'bio', 'address'));
    }

    public function updatePengaturan(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        if ($request->hasFile('ava')) {
            $this->validate($request, ['ava' => 'image|mimes:jpg,jpeg,gif,png|max:2048']);

            $name = $request->file('ava')->getClientOriginalName();

            if ($user->getBio->ava != '') {
                Storage::delete('public/users/ava/' . $user->getBio->ava);
            }

            if ($request->file('ava')->isValid()) {
                $request->ava->storeAs('public/users/ava', $name);
                $user->getBio->update(['ava' => $name]);
                return asset('storage/users/ava/' . $name);
            }

        } else {
            if ($request->has('username')) {
                $check = User::where('username', $request->username)->first();

                if (!$check || $request->username == Auth::user()->username) {
                    $user->update(['username' => $request->username]);
                    return $user->username;
                } else {
                    return 0;
                }

            } else {
                if (!Hash::check($request->password, $user->password)) {
                    return 0;
                } else {
                    if ($request->new_password != $request->password_confirmation) {
                        return 1;
                    } else {
                        $user->update(['password' => bcrypt($request->new_password)]);
                        return 2;
                    }
                }
            }
        }
    }
}
