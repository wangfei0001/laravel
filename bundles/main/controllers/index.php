<?php

use Main\Models\Category;

class Main_Index_Controller extends Main_Base_Controller {




	public function action_index()
	{
        $categoryModel = new Category();

        $cats = $categoryModel->getCategories();

        var_dump($cats);

		// code here..
        $this->layout->with('title','Test page');
        $this->layout->nest('content', 'main::index.index');
		//return View::make('main::index.index');



	}

}
