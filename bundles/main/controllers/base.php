<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-2
 * Time: PM9:12
 * To change this template use File | Settings | File Templates.
 */
class Main_Base_Controller extends Base_Controller{

    public $layout = 'main::layouts.default';

    public function __construct(){

        parent::__construct();

//        Asset::container('header')->bundle('main');
//        Asset::container('header')->add('bootstrap', 'css/bootstrap.min.css');
    }


}