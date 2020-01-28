<?php

namespace App\Http\Controllers\Backend;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Session;
use App\Category;
use Purifier;
use Mail;
use Auth;

class MessageController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::where('id', '=', Auth::user()->id)->with('messages')
                    ->first();

      foreach ($user->messages as $message) {
        $message->orderBy('created_at', 'desc');
        $message->user->profile_image = url("/images/users/".$message->user->profile_image);
      }

      return view('backend.messages.index')->withUser($user);
    }

    public function sentMessages()
    {
      $messages = Message::where('user_id', Auth::user()->id)->with('users')
                    ->orderBy('created_at', 'asc')->get();

      return view('backend.messages.sent')->withMessages($messages);
    }

    public function create()
    {

      $users = User::orderBy('id', 'asc')->with('roles')->get(); // display all users

      $role =  Role::with('users')->where('name', 'admin')->first(); //display only admins
      $admins = $role->users;

      return view('backend.messages.create')->withRole($role)
                                            ->withUsers($users)
                                            ->withAdmins($admins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'subject' => 'required|min:2|string',
            'message' => 'required|min:5|max:1000'
        ));

        $message = new Message;
        $message->user_id = Auth::user()->id;
        $message->subject = $request->subject;
        $message->message = $request->message;

        $message->save();

        $message->users()->sync($request->admins, false);

        Session::flash('success', 'Your message was sent successfully');

        return redirect()->route('messages.index');

    }

    public function show($id)
    {
        $message = Message::find($id);
        return view('backend.messages.show')->withMessage($message);
    }

    public function showSent($id)
    {
        $message = Message::find($id);
        return view('backend.messages.show-sent')->withMessage($message);
    }
}
