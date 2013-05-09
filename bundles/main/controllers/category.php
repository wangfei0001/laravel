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

    public function action_index($catName)
    {
        $catName = urldecode($catName);
        if(empty($catName)){

        }

        $categories = $this->getCategories();
        $cat = 0;
        foreach($categories as $key=>$val){
            if($val['seo_name'] == $catName){
                $cat = $val;
                break;
            }
        }

        $this->showToolbar();

        $this->layout->with('title', $catName);

        $this->layout->nest('content', 'main::category.index', array(
            'cat'   =>  $cat
        ));
    }
}
