<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\Facades\GlobalAuth;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectTo()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('signed', __('lang.alert.login'));
        } else {
            return back()->with('signed', __('lang.alert.login'));
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest:admin', 'guest:web'])->except('logout');
    }

    /**
     * Perform login process for users & admins
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $user = User::where('username', $request->useremail)->orwhere('email', $request->useremail)->first();
        if (!is_null($user)) {
            if (GlobalAuth::login(['email' => $request->email, 'password' => $request->password])) {
                if (session()->has('intended')) {
                    session()->forget('intended');
                }

                return $this->redirectTo();
            }
        }

        return back()->withInput($request->all())->with([
            'error' => __('lang.alert.login-fail')
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        GlobalAuth::logout();

        return redirect()->route('beranda')->with('logout', __('lang.alert.logout'));
    }
}
