<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 23/04/13
 * Time: 10:32 AM
 * To change this template use File | Settings | File Templates.
 */
class Admin_Login_Controller extends Controller {

    public $restful = true;

    public function __construct(){

        parent::__construct();

        Config::set('auth.driver', 'adminauth');

        Asset::container('header')->bundle('admin');
        Asset::container('header')->add('bootstrap', 'css/bootstrap.min.css');

    }


    public function get_index(){
        return View::make('admin::login.index');
    }

    public function post_index(){

        $creds = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );
        var_dump($creds);
        die();
//        if (Auth::attempt($creds)) {
//            return Redirect::to(URL::to_action('admin::home@index'));
//        } else {
//            return Redirect::back()->with('error', true);
//        }

    }


    public function get_logout(){
        Auth::logout();
        return Redirect::to(URL::to_action('admin::home@index'));
    }
}