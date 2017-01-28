<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = '/admin/product';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'email' => 'required|email|max:255',
            'login' => 'required|max:100|unique:users,login',
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
            'login' => $data['login'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegisterForm(){
        $credentials = [
            'email'    => 'john.doe@example.com',
            'password' => 'password',
        ];
        //$user = Sentinel::register($credentials);
        // dd($user);
        return view('auth.register');
    }

    protected function createUser(Request $data){

        $credentials = $data->all();

        $rules = [
            'email' => 'required|email|max:255',
            'login' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        $validaror = Validator::make($credentials, $rules);
        if(!$validaror->fails()){
            $result = Sentinel::registerAndActivate($credentials);
        }else {
            return redirect()->back()->withErrors($validaror->errors());
        }

        Sentinel::authenticate($credentials);
        return  redirect()->route('product.index');
    }
}
