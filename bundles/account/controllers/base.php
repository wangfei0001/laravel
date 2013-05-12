<?php

class Account_Base_Controller extends Base_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'auth');
    }


//	public function action_index()
//	{
//		// code here..
//
//		return View::make('account::base.index');
//	}

}
