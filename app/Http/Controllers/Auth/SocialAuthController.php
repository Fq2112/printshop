<?php

namespace App\Http\Controllers\Auth;

use App\Models\Bio;
use App\Models\SocialProvider;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Storage;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the social providers authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from each Social Provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $userSocial = Socialite::driver($provider)->user();
            $checkUser = User::where('email', $userSocial->email)->first();

            if (!$checkUser) {
                Storage::disk('local')
                    ->put('public/users/ava/' . $userSocial->getId() . ".jpg", file_get_contents($userSocial->getAvatar()));

                $user = User::firstOrCreate([
                    'email' => $userSocial->getEmail(),
                    'name' => $userSocial->getName(),
                    'username' => strtok($userSocial->getEmail(), '@'),
                    'password' => bcrypt('secret'),
                    'status' => true,
                ]);

                Bio::create(['user_id' => $user->id, 'ava' => $userSocial->getId() . ".jpg"]);

                SocialProvider::create([
                    'user_id' => $user->id,
                    'provider_id' => $userSocial->getId(),
                    'provider' => $provider
                ]);

            } else {
                $user = $checkUser;
            }

            if ($user->getBio->ava == "") {
                Storage::disk('local')
                    ->put('public/users/ava/' . $userSocial->getId() . ".jpg", file_get_contents($userSocial->getAvatar()));

                $user->getBio->update(['ava' => $userSocial->getId() . ".jpg"]);
            }
            Auth::loginUsingId($user->id);

            if (Auth::user()->getBio->dob != null && Auth::user()->getBio->gender != null && Auth::user()->getBio->phone != null) {
                return redirect()->route('beranda');

            } else {
                return redirect()->route('beranda')->with('profil', 'message');
            }

        } catch (\Exception $e) {
            return back()->with('unknown', 'message');
        }
    }
}
