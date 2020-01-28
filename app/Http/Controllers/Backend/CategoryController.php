<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Auth;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use Session;
use Image;
use File;
use Purifier;
use Auth;


class CategoryController extends Controller
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
        // Display a view of all of our categories
        //it will also have a form to create a new category

        $categories = Category::all();
        return view('backend.categories.index')->withCategories($categories);
    }

    public function create()
    {
        return view('backend.categories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save a new category and then redirect back to index
        $this->validate($request, array(
          'name' => 'required|max:255',
          'slug'        => 'required|alpha_dash|min:5|max:255|unique:categories,slug'
        ));

        $category = new Category;

        $category->user_id = Auth::user()->id;
        $category->name = $request->name;
        $category->slug = str_slug($request->name, '-');
        
        $category->save();

        Session::flash('success', 'New Category has been created');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category = Category::find($id);
      return view('backend.categories.show')->withCategory($category);
    }

    public function ibyiciro()
    {
      $categories = Category::all();
      return view('categories.index')->withCategories($categories);
    }

    public function icyiciro($slug)
    {
      $category = Category::where('slug', '=', $slug)->first();
      $articlesaside = Article::orderBy('created_at', 'asc')->limit(5)->get();
      return view('categories.show')->withCategory($category)->withAsidearticles($articlesaside);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::find($id);
      return view('backend.categories.edit')->withCategory($category);
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
        $category = Category::find($id);

        $this->validate($request, [
            'name'  => 'required|max:255',
            'slug'  => "required|alpha_dash|min:5|max:255|unique:categories,slug, $id"
        ]);

        $category->name = $request->name;
        $category->slug  = $request->input('slug');

        $category->save();

        Session::flash('sucess', 'Successfully saved your new tag!');

        return redirect()->route('categories.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
