<?php

namespace App\Http\Controllers\Frontend;

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
use Image;
use File;
use Counter;

class FaqController extends Controller
{

    public function all()
    {
        //create a variable and store all the blog articles in it from the database
        $faqs = Faq::orderBy('created_at', 'asc')->where('is_published','1')->limit(5)->get();

        //Count total faqs
        $totalFaqs = Faq::count();

        //Count status faqs
        $statusFaqs = Faq::where('is_published','1')->count();

        //Count not status faqs
        $notstatusFaqs = Faq::where('is_published','0')->count();

        //return a view and pass in the above variable
        return view('frontend.faqs.all')->withFaqs($faqs)->withTotalfaqs($totalFaqs)->withstatusFaqs($statusFaqs)->withNotstatusFaqs($notstatusFaqs);
    }

  
}
