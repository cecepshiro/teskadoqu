<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo;

    public function redirectTo()
    {
        switch(Auth::user()->level){
            case 0:
                $this->redirectTo = '/admin/dashboard/';
                return $this->redirectTo;
                break;
            case 1:
                $this->redirectTo = '/admin/dashboard/';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/admin/dashboard/';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/beranda';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/beranda';
                return $this->redirectTo;
        }
         
        // return $next($request);
    } 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
 
        $request->session()->flush();
 
        $request->session()->regenerate();
 
        return redirect('/beranda');
    }
}
