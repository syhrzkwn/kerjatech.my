<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:employer')->except('employerLogout');
    }

    public function showEmployerLoginForm()
    {
        return view('employer.login');
    }

    public function employerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('employer/dashboard');
        }
        else {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function employerLogout(Request $request)
    {
        Auth::guard('employer')->logout();
        $request->session()->invalidate();
        return redirect()->route('employer.login');
    }
}
