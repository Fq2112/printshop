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
        /*if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('signed', 'message');
        } else {
            if (Auth::user()->getBio->dob != null && Auth::user()->getBio->gender != null && Auth::user()->getBio->phone != null) {
                return back()->with('signed', 'message');

            } else {
                return back()->with('profil', 'message');
            }
        }*/
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
        if (GlobalAuth::login(['useremail' => $request->useremail, 'password' => $request->password], $request)) {
            if (session()->has('intended')) {
                session()->forget('intended');
            }

            if (Auth::guard('admin')->check()) {
                return redirect()->route('admin.dashboard')->with('signed', 'message');
            } else {
                if (Auth::user()->status == false) {
                    return back()->withInput($request->all())->with(['inactive' => 'message']);
                } else {
                    if (Auth::user()->getBio->dob != null && Auth::user()->getBio->gender != null && Auth::user()->getBio->phone != null) {
                        return back()->with('signed', 'message');
                    } else {
                        return back()->with('profil', 'message');
                    }
                }
            }
        }

        return back()->withInput($request->all())->with(['error' => 'message']);
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

        return redirect()->route('beranda')->with('logout', 'message');
    }
}
