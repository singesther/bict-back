<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use Session;
use Image;
use File;
use Purifier;


class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view('frontend.categories.index')->withCategories($categories);
  }

  public function show($slug)
  {
    $category = Category::where('slug', '=', $slug)->first();
    $postsaside = POst::orderBy('created_at', 'asc')->limit(5)->get();
    return view('frontend.categories.show')->withCategory($category)->withAsideposts($postsaside);
  }
}
