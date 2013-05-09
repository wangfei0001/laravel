<?php

// Route for Main_Controllers_Index_Controller
Route::controller('main::controllers.index');

// Route for Main_Index_Controller
Route::controller('main::index');

// Route for Main_Category_Controller
Route::controller('main::category');

// Route for Main_Cart_Controller
Route::controller('main::cart');

// Route for Main_Pin_Controller
Route::controller('main::pin');



View::composer('main::layouts.default', function($view)
{
    $title = '';

    if(isset($view->title)){
        $title = $view->title .' | ';
    }
    $title .= Config::get('settings.site_name');
    $view->with('title', $title);
});


