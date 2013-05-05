<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-4
 * Time: PM11:00
 * To change this template use File | Settings | File Templates.
 */


//Auth::extend('auth', function() {
//    return new Account\Models\Auth;
//});

Autoloader::namespaces(array(
    'Account' => Bundle::path('account').'models',
));