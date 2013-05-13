<?php

use Account\Libraries\Myauth;



class Account_Login_Controller extends Base_Controller {

    public $restful = true;

    public $layout = 'main::layouts.default';

    public function __construct()
    {

        parent::__construct();

    }

	public function get_index()
	{
        $this->layout->with('title','登录');
        $this->layout->nest('content', 'account::login.index');
    }


    public function post_index()
    {
        $creds = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($creds)) {
            return Redirect::to(URL::to_action('account::login@index'));
        } else {
            die('not done');
            return Redirect::back()->with('error', true);
        }
    }
}
