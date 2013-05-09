<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-2
 * Time: PM9:12
 * To change this template use File | Settings | File Templates.
 */

use Main\Models\Category;

class Main_Base_Controller extends Base_Controller{

    public $layout = 'main::layouts.default';


    protected $categories = null;

    public function __construct(){

        parent::__construct();

//        Asset::container('header')->bundle('main');
//        Asset::container('header')->add('bootstrap', 'css/bootstrap.min.css');
    }


    /***
     * Show toolbar
     */
    protected function showToolbar()
    {

        $cats = $this->getCategories();

        $this->layout->with('toolbar', true);
        $this->layout->nest('toolbarView', 'main::partials.toolbar', array('categories'=>$cats));
    }


    /***
     * @return mixed|null
     *
     * Get Categories
     */
    protected function getCategories()
    {
        if(!$this->categories){
            $categoryModel = new Category();

            $this->categories = $categoryModel->getCategories();
        }

        return $this->categories;
    }
}