<?php


// Route for Account_Login_Controller
Route::controller('account::login');

// Route for Account_Board_Controller
Route::controller('account::board');

// Route for Account_Pin_Controller
Route::controller('account::pin');

Route::filter('auth', function()
{
    // Slight change to redirect to login route
    if (Auth::guest()) return Redirect::to_action('account::login@index');
});

// Route for Account_Base_Controller
Route::controller('account::base');