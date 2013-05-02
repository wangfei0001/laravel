<?php

class Main_Account_Controller extends Main_Base_Controller {

    public $restful = true;

//	public function action_index()
//	{
//		// code here..
//
//		return View::make('main::account.index');
//	}


    public function get_login()
    {
        $this->layout->with('title','登录');
        $this->layout->nest('content', 'main::account.login');
    }

    public function post_login(){

        $creds = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        var_dump($creds);
        die();

        if (Auth::attempt($creds)) {
            return Redirect::to(URL::to_action('admin::home@index'));
        } else {
            return Redirect::back()->with('error', true);
        }

    }

}
