<?php



class Main_Index_Controller extends Main_Base_Controller {


	public function action_index()
	{

        $this->showToolbar();


		// code here..
        $this->layout->with('title','Test page');
        $this->layout->nest('content', 'main::index.index');

	}

}
