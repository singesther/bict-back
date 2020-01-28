<?php

namespace App\Http\Controllers\Backend;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use App\Role;
use App\Article;
use App\User;
use App\Category;
use App\Tag;
use Auth;
use Session;
use Purifier;
use Input;
use Response;
use Validator;

class FaqController extends Controller
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
        //create a variable and store all the blog articles in it from the database
        $faqs = Faq::orderBy('created_at', 'asc')->get();

        //return a view and pass in the above variable
        return view('backend.faqs.index')->withFaqs($faqs);
    }

    public function create()
    {
        return view('backend.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
          'question'       => 'required|max:255',
          'answer'        => 'required'
        ));

        //store the database
        $faq = new Faq;
        $faq->user_id = Auth::user()->id;
        $faq->question = $request->question;
        $faq->answer = $request->answer; 
        $faq->lang = $request->language;      

        $getMaxOrder = Faq::orderBy('order', 'desc')->first();
        if (isset($getMaxOrder)) {
            $getMax =  $getMaxOrder->order;
        }else{
             $getMax = 0;
        }

        $faq->order = $getMax + 1;   
        $faq->save();

        Session::flash('success', 'The FAQ was successfully saved!');
        //redirect to another faq
        return redirect()->route('faqs.index');

        // dd($request->all());
    }

    public function publish(Request $request)
    {
        $faq = Faq::find($request->faqId);
        $faq->is_published = $request->faqApproved;
        $faq->save();
        return response()->json($faq);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);
        return view('backend.faqs.show')->withFaq($faq);
    }

    public function edit($id)
    {

      // find the faq in the database and save as a variable
       $faq = Faq::find($id); 
       if($faq)
       {
         // return the view and pass in the var we previously created
         return view('backend.faqs.edit')->withFaq($faq);
       }
       else{
         return view('errors.403');
       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // Validate the data
        $this->validate($request, array(
          'question'       => 'required|max:90',
          'answer'        => 'required'
        ));
       
        //Find the id and update the data to the database
        $faq = Faq::find($id);
        $faq->user_id = Auth::user()->id;
        $faq->question = $request->question;
        $faq->answer  = $request->answer;
        $faq->lang = $request->language;      
       
        $faq->save();

        //set flash data with success message
        Session::flash('success', 'The faq was successfully updated. ');

          //redirect with flash data to faqs.show
        return redirect()->route('faqs.show', $faq->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $faq = Faq::find($id);

      $faq->delete();

      return response()->json(['success'=> $faq->question. ' was successfully deleted.']);
    }
}
