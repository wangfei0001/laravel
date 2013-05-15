<?php


// Route for Account_Login_Controller
Route::controller('account::login');

// Route for Account_Board_Controller
Route::controller('account::board');

// Route for Account_Pin_Controller
Route::controller('account::pin');

// Route for Account_Base_Controller
Route::controller('account::base');

Route::filter('auth', function()
{
    // Slight change to redirect to login route
    if (Auth::guest())
        return Redirect::to_action('account::login@index')->with('flash_error', 'You must be logged in to view this page!');
});

View::composer('main::layouts.default', function($view)
{
    $title = '';

    if(isset($view->title)){
        $title = $view->title .' | ';
    }
    $title .= Config::get('settings.site_name');
    $view->with('title', $title);

    $view->with('me', Session::get('me'));
});

//View::composer('main::partials.topnav', function($view)
//{
//    $view->with('me', Session::get('me'));
//});