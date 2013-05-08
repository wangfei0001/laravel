<?php

use Main\Models\Pin;

class Main_Pin_Controller extends Base_Controller {

	public function action_index()
	{
		// code here..

		return View::make('main::pin.index');
	}



    public function action_refresh()
    {
        //$this->_helper->layout->disableLayout();

        $type = Input::get('catid');
        $catid = Input::get('catid');
        $boardid = Input::get('boardid');
        $like = Input::get('like');
        $owner = Input::get('owner');
        $timeline = Input::get('timeline');
        $tag = Input::get('tag');
        $id_lists = Input::get('lists');
        $limit = Input::get('limit');

        $userid = 0;
        if($this->_user){
            $userid = $this->_user->id_user;
        }

        $pins = Pin::loadPins(array(
            'type'  =>  $type,
            'ids'   =>  $id_lists,
            'catid' =>  $catid,
            'boardid' => $boardid,
            'like' => $like,
            'userid' => $userid,        //my userid
            'owner' => $owner,
            'timeline' => $timeline,
            'tag' => $tag,
            'limit' => $limit
        ));
        $data = array();
        if(!empty($pins)){
            foreach($pins as $pin){
                $data['data'][] = $pin->toArray();
            }
        }else{
            $data['data'] = array();
        }

        $data['config']['image_host'] = Config::get('settings.image_host');

        echo Response::json($data);
        die();
    }
}
