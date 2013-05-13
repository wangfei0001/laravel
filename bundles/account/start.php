<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-4
 * Time: PM11:00
 * To change this template use File | Settings | File Templates.
 */

Autoloader::map(array(
    'Account_Base_Controller' => Bundle::path('account').'controllers/base.php',
));

//Auth::extend('auth', function() {
//    return new Account\Models\Auth;
//});

Autoloader::namespaces(array(
    'Account\Models' => Bundle::path('account').'models',
    'Main\Models' => Bundle::path('main').'models',
    'Account\Libraries' => Bundle::path('account').'libraries',
));

Autoloader::directories(array(
    Bundle::path('account').'libraries',
));

Auth::extend('myauth', function() {
    return new Account\Libraries\Myauth;
});

