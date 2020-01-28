<?php

namespace App\Http\Controllers\Backend;

use App\Page;
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
use Image;
use File;
use Counter;

class PageController extends Controller
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
        $pages = Page::where('lang', config('app.locale'))->get();

        //Count total pages
        $totalPages = Page::count();

        //Count approved pages
        $approvedPages = Page::where('is_published','1')->where('lang', config('app.locale'))->count();

        //Count not approved pages
        $notapprovedPages = Page::where('is_published','0')->where('lang', config('app.locale'))->count();

        //return a view and pass in the above variable
        return view('backend.pages.index')->withPages($pages)->withTotalpages($totalPages)->withApprovedPages($approvedPages)->withNotapprovedPages($notapprovedPages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.pages.create');
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
          'title'       => 'required|max:255',
          'slug'        => 'required|alpha_dash|min:5|max:255|unique:pages,slug',
          'body'        => 'required'
        ));

        //store the database
        $page = new Page;

        $createSlug = str_slug($request->title, '-');

        $page->user_id = Auth::user()->id;
        $page->title = $request->title;
        $page->slug = $createSlug;
        $page->body = Purifier::clean($request->body);
        $page->lang = $request->language;
        $page->is_published = $request->has('approved');

        $page->save();

        Session::flash('success', 'The blog page was successfully saved!');
        //redirect to another page
        return redirect()->route('pages.show', $page->id);

         // dd($request->all());
    }

    public function publish(Request $request)
    {
        $page = Page::find($request->pageId);
        $page->is_published = $request->pageApproved;
        $page->save();
        return response()->json($page);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('backend.pages.show')->withPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      // find the page in the database and save as a variable
       $page = Page::find($id); 
       if($page)
       {
         // return the view and pass in the var we previously created
         return view('backend.pages.edit')->withPage($page);
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
          'title'       => 'required|max:90',
          'slug'        => "required|alpha_dash|min:5|max:255|unique:pages,slug, $id",
          'body'        => 'required'
        ));


        // Save the data to the database
        $page = Page::find($id);

        $page->title = $request->input('title');
        $page->slug  = $request->input('slug');
        $page->body  = Purifier::clean($request->input('body'));
        $page->lang = $request->language;
        $page->is_published = $request->has('approved');


        $page->save();

        //set flash data with success message
        Session::flash('success', 'This page was successfully updated. ');

        //redirect with flash data to pages.show
        return redirect()->route('pages.show', $page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $page = Page::find($id);

      $page->delete();

      return response()->json(['success'=> $page->title. ' was successfully deleted.']);
    }
}
