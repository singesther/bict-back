<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Maillist;
use Illuminate\Http\Request;
use Purifier;
use Mail;
use Auth;
use Input;
use Response;
use Validator;

class MaillistController extends Controller
{

  public function __construct(){
      $this->middleware('auth', ['except' => 'store']);
  }


  public function index()
  {
    //create a variable and store all the blog posts in it from the database
    $maillist = Maillist::orderBy('id','desc')->get();
    return view('backend.maillist.index')->withMaillist($maillist);
  }

  public function store(Request $request)
  {
      $validator = Validator::make(Input::all(), [
        'email' => 'required|email|max:255|unique:maillist,email',
      ]);

      if ($validator->fails()) {
        return Response::json(array(
            'errors' => $validator->getMessageBag()->toArray(),
        ));
      } else {

        $subscriber = new Maillist;
        $subscriber->email = $request->email;
        $subscriber->subscribed = true;
        $subscriber->save();

        return response()->json($subscriber);
      }
  }

  public function subscribed(Request $request)
  {
      $subscriber = Maillist::find($request->subscriberId);
      $subscriber->subscribed = $request->subscriberApproved;
      $subscriber->save();
      return response()->json($subscriber);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $username)
  {

    $user = User::where('username', $username)->first();

    $this->validate($request, array(
      'subscribed' => 'boolean',
    ));

    $user->gender = $request->input('gender');
    Session::flash('success', 'Profile was updated');

    return redirect()->route('profile.show', $user->username);
  }

  public function destroy($id)
  {
    $subscriber = Maillist::find($id);

    $subscriber->delete();

    return response()->json(['success'=> $subscriber->email. ' was successfully deleted.']);
  }
}
