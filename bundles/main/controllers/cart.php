<?php

class Main_Cart_Controller extends Base_Controller {

	public function action_index()
	{
		// code here..

		return View::make('main::cart.index');
	}



    public function action_mycart()
    {

        exit();
    }
}
