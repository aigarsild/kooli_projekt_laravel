<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use JWTAuth;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', [ 'except' => 'logout' ]);
        return response()->json(['result' => 'logged out yay']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request::only('email', 'password');

        try {
            // This is to verify the credential. Make sure you already define the User model on User.php, which means the database and the users table have been made with email and hashed password stored (see how to make hash password in laravel).

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['result' => false, 'token' => 'invalid_credentials']); // if the credential is not valid
            }
        } catch (JWTException $e) {
            return response()->json(['result' => false, 'token' => 'could_not_create_token']);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(['result' => true, 'token' => $token]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function show() {
        return JWTAuth::parseToken()->toUser();
    }
}
