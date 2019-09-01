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
use Spatie\Honeypot\ProtectAgainstSpam;


Route::get('', 'LandingController@index')->name('landing');
Route::get('browse', 'BrowseController@search')->name('browse');
Route::get('browse/{name}','BrowseController@details')->name('browse.details');
Route::get('home', 'HomeController@index')->name('home');
Route::post('home','HomeController@store')->name('home.store');
Route::get('faqs', 'FaqsController@index')->name('faqs');
Route::get('journey', 'JourneyController@index')->name('journey');
Route::get('terms', 'TermsController@index')->name('terms');
Route::get('privacy', 'PrivacyController@index')->name('privacy');

Route::get('posts','PostController@index')->name('post.index');
Route::get('post/{slug}','PostController@details')->name('post.details');

Route::get('/category/{slug}','PostController@postByCategory')->name('category.posts');
Route::get('/tag/{slug}','PostController@postByTag')->name('tag.posts');

Route::get('profile/{username}','AuthorController@profile')->name('author.profile');

Route::post('subscriber','SubscriberController@store')->name('subscriber.store')->middleware(ProtectAgainstSpam::class);

Route::get('search','SearchController@search')->name('search');
Route::get('freelancer','FreelancerController@index')->name('freelancer');

Auth::routes(['verify' => true]); 

Route::group(['middleware'=>['auth']], function (){

   Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
   Route::post('comment/{post}','CommentController@store')->name('comment.store');

});


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin','verified']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');


    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');
    Route::resource('freelancer','FreelancerController');

    Route::put('/freelancer/{id}/setvetinfo','FreelancerController@setvetinfo')->name('freelancer.setvetinfo');
    Route::get('/pending/post','PostController@pending')->name('post.pending');
    Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');
    Route::put('/post/{id}/setinvoice','PostController@setinvoice')->name('post.setinvoice');
    Route::put('/post/{id}/complete','PostController@complete')->name('post.complete');
    Route::put('/post/{id}/incomplete','PostController@incomplete')->name('post.incomplete');
    Route::put('/post/{postid}/{userid}','PostController@assign')->name('post.assign');
   


    Route::get('/favorite','FavoriteController@index')->name('favorite.index');

    Route::get('authors','AuthorController@index')->name('author.index');
    Route::delete('authors/{id}','AuthorController@destroy')->name('author.destroy');

    Route::get('freelancer','FreelancerController@index')->name('freelancer.index');
    Route::put('freelancer/{id}/accept','FreelancerController@accept')->name('freelancer.accept');
    Route::put('freelancer/{id}/reject','FreelancerController@reject')->name('freelancer.reject');
    Route::put('freelancer/{id}/setvetinfo','FreelancerController@setvetinfo')->name('freelancer.setvetinfo');
    Route::delete('freelancers/{id}','FreelancerController@destroy')->name('freelancer.destroy');

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');

});

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author','verified']], function (){
    
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

    Route::put('post/{id}/pay', 'PostController@pay')->name('post.pay');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::resource('post','PostController');
    Route::get('/favorite','FavoriteController@index')->name('favorite.index');

});

Route::group(['as'=>'freelancer.','prefix'=>'freelancer','namespace'=>'Freelancer','middleware'=>['auth','freelancer','verified']], function (){
    
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::resource('post','PostController');
    Route::resource('projects','ProjectController');
    Route::get('/favorite','FavoriteController@index')->name('favorite.index');


});

View::composer('layouts.frontend.partial.footer',function ($view) {
    $categories = App\Category::all();
    $view->with('categories',$categories);
});