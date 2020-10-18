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

Route::get('/', 'PostController@index');
Route::get('/{slug}','PostController@show');
Route::get('support/contact',function() { return view('frontend.contact'); });
Route::get('support/about',function() { return view('frontend.about'); });
Route::get('support/terms-conditions',function() { return view('frontend.terms'); });
Route::get('support/faqs',function() { return view('frontend.faqs'); });
Route::post('contact/store','ContactController@store');

Route::prefix('user')->group(function () {
	//Sign Up
    Route::get('signup','UserController@signup');
    Route::post('register','UserController@register');
    
    // Sign In
    Route::get('signin','UserController@signin');
    Route::post('authentication','UserController@authentication');

    // forgot password
    Route::get('forget-password','UserController@forgetpassword');
    Route::post('forget','UserController@forget');
    Route::get('change-passowrd/{hash}','UserController@changepassowrd');
    Route::post('reset-password/{hash}','UserController@resetpassword');

    //logout
    Route::get('logout','UserController@logout');

    // User Dashboard Pages
    Route::group(['middleware' => ['homesession']], function () {
        Route::post('/update/{id}','Home@update');
        Route::post('/profile/{id}','Home@profile');
        Route::post('/changePassowrd/{id}','Home@changePassowrd');
        Route::get('/{slug}/ads/published','Home@published');
        Route::get('/{slug}','Home@index');
        Route::get('/{slug}/ads/unverified','Home@unverified');
        Route::get('/{slug}/ads/solded','Home@solded');
        Route::get('/{slug}/ads/deleted','Home@deleted');
        Route::get('/ads/marksold/{id}','Home@marksold');
        Route::get('/ads/delete/{id}','Home@delete');
        Route::get('/{slug}/ads/edit/{id}','Home@edit');
    });
});

Route::prefix('interested')->group(function () {
    Route::post('store/{to_id}','InetrestedController@store');
});
// Post Ad
Route::prefix('post')->group(function () {
    Route::get('postad','PostController@create');
    Route::post('store','PostController@store');
    Route::post('update/{id}','PostController@update');
});


// All Email Routes
Route::prefix('mail')->group(function () {
    Route::get('user/{email}','Mailsender@Email');
    Route::get('verify/{email}','Mailsender@verify');
});

// All Search Routes
Route::prefix('search')->group(function () {
    Route::get('keyword','SearchController@index');
    Route::get('home','SearchController@home');
    Route::get('location','SearchController@home');
});

// All New Mobile Routes
Route::prefix('mobile')->group(function () {
    Route::get('new','NewMobileController@index');
    Route::get('/{slug}','BrandController@index');
});

// All New Mobile Routes
Route::prefix('city')->group(function () {
    Route::get('/{slug}','CitiesController@index');
});

Route::prefix('blogs')->group(function () {
     // Home 
    Route::get('/all', 'BlogController@list');
    Route::get('/{slug}','BlogController@show');
});    
//blog routes
Route::prefix('blog')->group(function () {
    
    Route::group(['middleware' => ['adminsession']], function () {
        // Admin Panel
        Route::get('create','BlogController@create');
        Route::post('store','BlogController@store');
        Route::get('list','BlogController@index');
        Route::get('delete/{id}','BlogController@destroy');
        Route::get('edit/{id}','BlogController@edit');
        Route::post('update','BlogController@update');
        Route::get('status','BlogController@changePublishStatus');
    });
});

// Login With Social Media
Route::prefix('auth')->group(function () {
    // Login With Google
    Route::get('google', 'UserController@redirectToGoogle');
    Route::get('google/callback', 'UserController@handleGoogleCallback');

    Route::get('redirect/{provider}', 'UserController@redirect');
    Route::get('{provider}/callback', 'UserController@callback');
});

// Login in Dashboard
Route::prefix('admin')->group(function () {
    // Admin Pannel Login
    Route::get('login', 'admin\AdminController@create');
    Route::post('user/authentication', 'admin\AdminController@authentication');

    // User dashboard pages
    Route::group(['middleware' => ['adminsession']], function () {
        Route::get('dashboard', 'admin\AdminController@index');
        Route::get('user', 'admin\UserController@index');
        Route::get('user/status','admin\AdminController@changeUserActiveStatus');
        Route::get('alllocations', 'admin\locationsController@index');
        Route::get('adpost', 'admin\AdpostController@index');
        Route::get('contacts', 'ContactController@index');
        Route::get('brand/create', 'BrandController@create');
        Route::post('brand/store', 'BrandController@store');
        Route::get('brand/show', 'BrandController@show');
        Route::get('brand/edit/{id}','BrandController@edit');
        Route::post('brand/update/{id}','BrandController@update');
        Route::get('brand/delete/{id}','BrandController@destroy');
    });
    Route::group(['middleware' => ['adminsession']], function () {
        // Admin Panel
        Route::get('mobiles/create','admin\MobilesController@create');
        Route::post('mobiles/store','admin\MobilesController@store');
        Route::get('mobiles/list','admin\MobilesController@index');
        Route::get('mobiles/delete/{id}','admin\MobilesController@destroy');
        Route::get('mobiles/edit/{id}','admin\MobilesController@edit');
        Route::post('mobiles/update','admin\MobilesController@update');
        Route::get('mobiles/status','admin\MobilesController@changePublishStatus');
    }); 
});

Route::prefix('new-mobiles')->group(function () {
    Route::get('/{slug}','NewMobileController@show');
});