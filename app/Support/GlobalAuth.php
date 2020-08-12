<?php
/**
 * Created by PhpStorm.
 * User: fiqy_
 * Date: 10/1/2018
 * Time: 8:38 PM
 */

namespace App\Support;

use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalAuth
{
    /**
     * login process
     *
     * @param array $credentials
     * @param Request $request
     * @return boolean
     */
    public function login($credentials, Request $request)
    {
        if ($this->isUser($credentials['useremail'])) {
            $user = User::where('username', $request->useremail)->orwhere('email', $request->useremail)->first();
            if (Auth::guard('web')->attempt(['email' => $user->email, 'password' => $request->password])) {
                return true;
            }
        } else if ($this->isAdmin($credentials['useremail'])) {
            $admin = Admin::where('username', $request->useremail)->orwhere('email', $request->useremail)->first();
            if (Auth::guard('admin')->attempt(['email' => $admin->email, 'password' => $request->password])) {
                return true;
            }
        } else {
            return false;
        }

        return false;
    }

    /**
     * logout process
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard($this->getAttemptedGuard())->logout();
    }

    /**
     * Check whether one of the guard is login
     *
     * @return boolean
     */
    public function check()
    {
        $guard = $this->getAttemptedGuard();
        return !is_null($guard);
    }

    /**
     * get user who's logged in from one of the guard
     *
     * @return \App\User|\App\Models\Admin
     */
    public function user()
    {
        if ($this->getAttemptedGuard() === 'admin')
            return Auth::guard('admin')->user();
        return Auth::guard('web')->user();
    }

    /**
     * get guard who's logged in as a string
     *
     * @return string|null
     */
    public function getAttemptedGuard()
    {
        if (Auth::guard('web')->check()) {
            return 'web';
        }
        if (Auth::guard('admin')->check()) {
            return 'admin';
        }
        return null;
    }

    /**
     * Check whether the intended username|email was found in the user table
     *
     * @param string $useremail
     * @return boolean
     */
    private function isUser($useremail)
    {
        return !is_null(User::where('username', $useremail)->orwhere('email', $useremail)->first());
    }

    /**
     * Check whether the intended username|email was found in the admin table
     *
     * @param [type] $useremail
     * @return boolean
     */
    private function isAdmin($useremail)
    {
        return !is_null(Admin::where('username', $useremail)->orwhere('email', $useremail)->first());
    }
}
