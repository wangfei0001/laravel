<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 9/05/13
 * Time: 4:20 PM
 * To change this template use File | Settings | File Templates.
 */
class Main_Category_Controller extends Main_Base_Controller
{



    public function action_index()
    {
        $this->layout->with('title','Test page');
        $this->layout->nest('content', 'main::category.index');
    }
}
