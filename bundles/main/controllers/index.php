<?php

class Main_Index_Controller extends Base_Controller {

    public $layout = 'main::layouts.default';

    public function __construct(){

        parent::__construct();

        Asset::container('header')->bundle('main');
        Asset::container('header')->add('bootstrap', 'css/bootstrap.min.css');
    }


	public function action_index()
	{
		// code here..
        $this->layout->nest('content', 'main::index.index');
		//return View::make('main::index.index');
	}

}
