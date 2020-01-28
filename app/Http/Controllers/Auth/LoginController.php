<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Input;
use Response;


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

    protected $redirectTo = 'dashboard/profile';

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
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            // return response()->json(['errors'=>$validator->errors()->all()]);
            return Response::json(array('errors' => $validator->getMessageBag()->toArray(),));
        } 

        $user = User::where('email', '=', Input::get('email'))->first();
        if($user === null)
        {
            //If the input email is not found in the users table located in db, display the message in JSON
            $message['error'] =  "User doesn't exist, your email is not found";
            return response()->json($message);
        }

        if(!Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        {   
            //If email and password don't match in database, display the message in JSON
            $message['error'] =  "Wrong credentials, Incorrect password"; 
            return response()->json($message);
        }

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();

            if(Auth::user()->hasRole('superadmin|admin|secretary')){
              return Response()->json(['redirect' => '/dashboard']);
            }else if(Auth::user()->hasRole('district-coordinator')){
              return Response()->json(['redirect' => '/dashboard/district-activities']);
            }else if(Auth::user()->hasRole('policing')){
              return Response()->json(['redirect' => '/dashboard/crimes']);
            }else{
              return Response()->json(['redirect' => route('profile.show',  Auth::user()->id)]);
            }
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }
}
