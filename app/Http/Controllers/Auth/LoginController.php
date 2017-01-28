<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

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

    protected $username = 'login';
    protected $redirectTo = 'home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);

    }

    public function showLoginForm(){

        return view('auth.login');
    }

    protected function validator( $data)
    {
        return Validator::make($data, [
            'login' => 'required|max:255|exists:users',
            'password' => 'required|min:3',
        ]);
    }

    public function loginUser(Request $data){

        $credentials = $data->all();

        $validator =  $this->validator($credentials);
        if($validator->fails()){
            redirect()->back()->withErrors($validator->errors());
        }
        if(array_key_exists('remember', $credentials) && $credentials['remember'] == 'on'){
            Sentinel::authenticateAndRemember($credentials);
        }else{
           $tut =  Sentinel::authenticate($credentials);

        }
        return  redirect()->route('user_cab');




    }

    public function logout()
    {
        if (Sentinel::logout()) {
            return redirect()->route($this->redirectTo);
        }else{
            return redirect()->back();
        }
    }


}
