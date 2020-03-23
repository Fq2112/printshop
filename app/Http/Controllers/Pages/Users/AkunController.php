<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
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

        return $user;
    }

    public function updateProfil(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        if ($request->check_form == 'kontak') {
            $user->getBio->update([
                'hp' => $request->hp,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'kota_id' => $request->kota_id,
            ]);

        } elseif ($request->check_form == 'personal') {
            $user->update(['name' => $request->name]);
            $user->getBio->update([
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kewarganegaraan' => $request->kewarganegaraan,
                'website' => $request->website,
            ]);
        }

        return back()->with('update', 'Data ' . $request->check_form . ' Anda berhasil diperbarui!');
    }

    public function pengaturan()
    {
        $user = Auth::user();

        return $user;
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
