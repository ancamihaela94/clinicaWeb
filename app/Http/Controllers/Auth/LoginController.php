<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Api login method
     *
     * @param Request $request
     * @return array
     */
    public function apiLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // todo validation (dar cum ne verificai noua pe cosquare, nu lejereanu)

        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => User::STATUS_ACTIVE],true)) {
            // Authentication passed...
            $user = User::getUserByEmail($email);
            $response = ['status' => 200,
                'user' => $user ];
        } else {
            $response = [
                'status' => 400,
                'error' => 'Login failed'
            ];
        }

        return $response;
    }
}
