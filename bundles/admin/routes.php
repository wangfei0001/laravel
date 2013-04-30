<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 20/04/13
 * Time: 9:13 PM
 * To change this template use File | Settings | File Templates.
 */

//Route::get('(:bundle)', function()
//{
//    return 'Welcome to the Admin bundle!';
//});


Route::controller(array(
    'admin::home',
    'admin::login',
));