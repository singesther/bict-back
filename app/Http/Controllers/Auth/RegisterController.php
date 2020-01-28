<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\ConfirmationEmail;
use Mail;
use Auth;
use Input;
use Response;


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
    protected $redirectTo = '/';

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
     * Register new account.
     *
     * @param Request $request
     * @return User
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tel'    => 'required',
            'district'    => 'required',
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

        $profile_image='default-avatar.png';

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'district' => $data['district'],
            'password' => bcrypt($data['password']),
            'profile_image' => $profile_image
        ]);

        Profile::create(['user_id' => $user->id]);

        return $user;
    }
 
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        //attach new registered user event which can be fired or broadcast
        event(new Registered($user = $this->create($request->all())));

        //this automatically login users and enables Auth guard after registration
        $this->guard()->login($user);

        return Response()->json(['redirect' => route('profile.show',  Auth::user()->id)]);
    }

}
