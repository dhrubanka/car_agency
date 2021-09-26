<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        //dd(strcmp($data['role'] , "agency") );
        if (strcmp($data['role'] , "agency") == 0 ){
           // dd(strcmp($data['role'] , "agency") );
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required'],
                'agency_name' => ['required'.'email'],
                'company_email' => ['required'],
                'registration_number' => ['required'],
                'date_of_establishment' => ['required'],
                'address' => ['required'],
                'contact' => ['required','digits_between:10,12']

            ]);
            dd(strcmp($data['role'] , "agency") );
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required'],
                'contact' => ['required','digits_between:10,12'],
                'dob' => ['required'],
                'address' => ['required'],
            ]);

        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       // dd('something');
        if (strcmp($data['role'] , "agency") == 0 ){
         //   dd('something1');
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user->assignRole($data['role']);
            $profile = \App\Agency::create([
                'company_name' => $data['agency_name'],
                'company_mail' => $data['company_email'],
                'registration_number' => $data['registration_number'],
                'date_of_establishment' => $data['date_of_establishment'],
                'address' => $data['address'],
                'contact' => $data['contact'],
            ]);
            $profile->user()->save($user);
            return $user;
        } else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user->assignRole($data['role']);
            $profile = \App\Customer::create([
                'dob' => $data['dob'],
                'contact' => $data['contact'],
                'license_number' => $data['license_number'],
                'address' => $data['address'],
            ]);
            $profile->user()->save($user);
            return $user;
        }
    }
}
