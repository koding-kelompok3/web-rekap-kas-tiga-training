<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

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
    protected $username = 'username';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $message = [
            'username.required' => 'Username dibutuhkan!',
            'username.exists' => 'Username tidak terdaftar!',
            'password.required' => 'Password dibutuhkan!',
            'validation.required' => 'Username dan password dibutuhkan!',
        ];

        $validatedData = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ], $message);

        if (Auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (Auth()->user()->level == 'admin') {
                return redirect('/admin');
            } else if (Auth()->user()->level == 'bendahara') {
                return redirect('/user');
            } else {
                return redirect('/login');
            }
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'password' => 'Password salah!',
                ]);
        }
    }
}
