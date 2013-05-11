<?php

use Main\Models\Pin;

use laravel\Config;

class Account_Pin_Controller extends Base_Controller {

	public function action_index()
	{
		// code here..

		return View::make('account::pin.index');
	}


    public function action_getthumb()
    {
        $id = Input::get('id');


        $data = array(
            'url'       =>      null,
            'result'    =>     false
        );
        $pin = new Pin($id);

        $data['url'] = Config::get('settings.image_host') .$pin->filename .'.w192.jpg';
        $data['height'] = $pin->thumb_height;
        $data['result'] = true;

        echo Response::json($data);
        exit();
    }
}
