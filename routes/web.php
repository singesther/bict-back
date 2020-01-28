<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 
  'middleware' => [ 'localizationRedirect' ]], function()
{
  
  /*
  |--------------------------------------------------------------------------
  |  Frontend routes
  |--------------------------------------------------------------------------
  */

   Route::namespace('Frontend')->group(function () {
    Route::get('/',  'PageController@welcome')->name('welcome');
    Route::get('contact',  'PageController@contact');
    Route::get('gallery',  'PageController@gallery')->name('gallery.all');
    Route::get('our-partners',  'PageController@partners')->name('our-partners');
    Route::get('video',  'PageController@video');
    Route::get('search','SearchController@search');
    Route::get('live-search', 'SearchController@liveSearch');
    Route::get('activity-search', 'SearchController@activitySearch');
    Route::get('profile/fq{profile}', 'PageController@profile');
    Route::get('pages', 'PageController@all')->name('pages.all');
    Route::get('pages/{slug}', ['as' => 'pages.single', 'uses' => 'PageController@single'])->where('slug', '[\w\d\-\_]+');
    Route::get('news', 'PostController@all')->name('news.all');
    Route::get('news/{slug}', ['as' => 'news.single', 'uses' => 'PostController@single'])->where('slug', '[\w\d\-\_]+');
    Route::get('who-we-are', 'AboutusController@all')->name('abouts.all');
    Route::get('who-we-are/{slug}', ['as' => 'abouts.single', 'uses' => 'AboutusController@single'])->where('slug', '[\w\d\-\_]+');
    Route::get('our-team',  'TeamController@all')->name('team.all');
    Route::get('our-team/{id}', 'TeamController@single')->name('team.single');
    Route::get('programs','ProgramController@all')->name('programs.all');
    Route::get('programs/{slug}', 'ProgramController@single')->name('programs.single');
    Route::get('activities/{slug}', ['as' => 'activities.single', 'uses' => 'ActivityController@single'])->where('slug', '[\w\d\-\_]+');
    Route::get('events','EventController@all')->name('events.all');
    Route::get('events/{slug}', ['as' => 'stories.single', 'uses' => 'StoryController@single'])->where('slug', '[\w\d\-\_]+');
    Route::get('faqs', 'FaqController@all')->name('faqs.all');
    Route::post('comments/{post_id}', 'CommentController@store')->name('comments.store'); 
    Route::post('contacts', 'ContactController@store')->name('contacts.store');
    Route::get('categories', 'CategoryController@index')->name('categories.all');
    Route::get('categories/{slug}', 'CategoryController@show')->name('categories.single')
    ->where('slug', '[\w\d\-\_]+');
    Route::post('maillist', 'MaillistController@store');
  });

  /*
  |--------------------------------------------------------------------------
  | Authentication routes
  |--------------------------------------------------------------------------
  */
  Auth::routes();
  Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

  /*
  |--------------------------------------------------------------------------
  | Backend Routes
  |--------------------------------------------------------------------------
  */  

  Route::prefix('dashboard')->middleware('role:superadmin|admin|secretary')->namespace('Backend')->group(function () {
    Route::get('/', 'AdminController@dashboard')->name('dashboard');
    Route::resource('manage/users','UserController');
    Route::resource('pages', 'PageController');
    Route::resource('news', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('faqs', 'FaqController');
    Route::resource('adverts', 'AdvertController');
    Route::resource('maillist', 'MaillistController');
    Route::resource('videos', 'VideoController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('programs', 'ProgramController');
    Route::resource('events', 'EventController');
    Route::resource('partners', 'PartnerController');
    Route::resource('team','TeamController');
    Route::resource('abouts', 'AboutController');
    Route::resource('testimonials', 'TestimonialController');
    Route::resource('contacts', 'ContactController', ['except' => ['store']]);
    Route::post('videos/toggle-approve', 'VideoController@publish');
    Route::post('gallery/toggle-approve', 'GalleryController@publish');
    Route::post('partners/toggle-approve', 'PartnerController@publish');
    Route::get('volunteers','VolunteerController@index')->name('volunteers.index');
    Route::get('volunteer/{id}','VolunteerController@show')->name('volunteers.show');
    Route::resource('comments', 'CommentController', ['except' => ['store']]);
    Route::post('programs/toggle-approve', 'ProgramController@publish');
    Route::post('activities/toggle-approve', 'ActivityController@publish');
    Route::post('events/toggle-approve', 'EventController@publish');
    Route::post('adverts/toggle-approve', 'AdvertController@publish');
    Route::post('pages/toggle-approve', 'PageController@publish');
    Route::post('abouts/toggle-approve', 'AboutController@publish');
    Route::post('faqs/toggle-approve', 'FaqController@publish');
    Route::post('testimonials/toggle-approve', 'TestimonialController@publish');
    Route::post('news/toggle-approve', 'PostController@publish');
    Route::post('team/toggle-approve', 'TeamController@publish');
    Route::post('maillist/toggle-approve', 'MaillistController@subscribed');
    Route::post('crimes/toggle-approve', 'CrimeController@publish');
    Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);
  });

  //Superadmin

  Route::prefix('dashboard')->middleware('role:superadmin')->namespace('Backend')->group(function () {
    Route::resource('manage/roles', 'RoleController');
  });

  //Policing 
  Route::prefix('dashboard')->middleware('role:policing|superadmin|admin|secretary')->namespace('Backend')->group(function () {
      Route::resource('crimes', 'CrimeController', ['except' => ['store']]);
  });
  //District coordinators 
  Route::prefix('dashboard')->middleware('role:district-coordinator|superadmin|admin|secretary')->namespace('Backend')->group(function () {
      Route::resource('activities', 'ActivityController');
      Route::get('district-activities', 'ActivityController@districtActivities')->name('district.activities');
      Route::get('district-members', 'MemberController@districtMembers')->name('district.members');
      Route::get('member/{id}', 'MemberController@memberShow')->name('member.show');
      Route::get('member/{id}/edit', 'MemberController@memberEdit')->name('member.edit');
      Route::put('member/{id}', 'MemberController@memberUpdate')->name('member.update');
  });
  //Members
  Route::prefix('dashboard')->middleware('role:member')->middleware('auth')->namespace('Backend')->group(function () {
    Route::get('report-crime', 'CrimeController@create')->name('report.crime');
    Route::post('report-crime', 'CrimeController@store')->name('report.crime.store');
    Route::get('reported-crimes', 'CrimeController@reportedCrimes')->name('reported.crimes');
    Route::get('reported-crime/{id}', 'CrimeController@reportedCrime')->name('reported.crime');
  });
  //All auth users
  Route::prefix('dashboard')->middleware('auth')->namespace('Backend')->group(function () {
    Route::resource('profile', 'ProfileController', ['except' => ['destroy']]);
    Route::post('/changePassword','ProfileController@changePassword')->name('changePassword');
    Route::get('activities-report', 'ActivityController@activitiesReport')->name('activities.report');
    Route::post('activities-report', 'ActivityController@activityRange');
    Route::get('activity-report/{id}', 'ActivityController@activityReport')->name('activity.report');
    Route::resource('messages', 'MessageController');
    Route::get('sent-messages', 'MessageController@sentMessages')->name('messages.sent');
    Route::get('show-sent/{message}', 'MessageController@showSent')->name('messages.show-sent');
  });

});
