<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\User;
use App\Role;
use App\Post;
use App\Activity;
use App\Project;
use App\Contact;
use App\Event;
use App\Program;
use App\Maillist;
use App\Team;
use App\Faq;
use Charts;

class AdminController extends Controller
{
    public function dashboard()
    {

      $totalUsers = User::count();
      $totalMembers = Role::where('name', '=', 'member')->count();
      $totalActivities = Activity::count();
      $totalContactMessages = Contact::count();
      $totalEvents = Event::count();
      $totalNews = Post::count();
      $totalSubscribers = Maillist::count();
      $activities = Activity::orderBy('created_at', 'desc')->limit(2)->get();
      $users = User::orderBy('created_at', 'desc')->limit(4)->get();

      $chart = Charts::database(Activity::all(), 'bar', 'highcharts')
            ->title('Activities in districts')
            ->elementLabel("Total Activities")
            ->responsive(false)
            ->groupBy('district');

      $chart2 = Charts::database(User::all(), 'pie', 'c3')
            ->title('Users in districts')
            ->elementLabel("Total Users")
            ->responsive(false)
            ->groupBy('district');

      $chart3 = Charts::database(User::all(), 'bar', 'highcharts')
                ->title('Registered users in Last 30 days')
                ->elementLabel("Total Users")
                ->responsive(false)
                ->lastByDay(30, true);

      $chart4 = Charts::database(User::all(), 'bar', 'highcharts')
                ->title('Registered users in Last 30 days')
                ->elementLabel("Total Users")
                ->responsive(false)
                ->lastByDay(30, true);

      return view('backend.dashboard')->withTotalUsers($totalUsers)
                        ->withTotalMembers($totalMembers)
                        ->withTotalActivities($totalActivities)
                        ->withTotalContactMessages($totalContactMessages)
                        ->withTotalEvents($totalEvents)
                        ->withTotalNews($totalNews)
                        ->withActivities($activities)
                        ->withTotalSubscribers($totalSubscribers)
                        ->withChart($chart)
                        ->withChart2($chart2)
                        ->withChart3($chart3)
                        ->withChart4($chart4)
                        ->withUsers($users);
    }
}
