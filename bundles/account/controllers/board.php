<?php

use Main\Models\Board;

class Account_Board_Controller extends Base_Controller {

	public function action_index()
	{
		// code here..

		return View::make('account::board.index');
	}


    public function action_all()
    {
        $boards = Board::getBoardsByUserid(1);
        $result = false;
        if($boards){
            $result = array();
            foreach($boards as $key=>$board){
                $result[] = array(
                    'id'        =>      $key,
                    'name'      =>      $board['name']
                );
            }
        }
        echo Response::json($result);
        exit();
    }
}
