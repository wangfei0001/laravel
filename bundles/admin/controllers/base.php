<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 20/04/13
 * Time: 9:35 PM
 * To change this template use File | Settings | File Templates.
 */

class Admin_Base_Controller extends Base_Controller{

    public $restful = true;

    public $layout = 'admin::layouts.main';


    public function __construct(){

        parent::__construct();

        Asset::container('header')->bundle('admin');
        Asset::container('header')->add('bootstrap', 'css/bootstrap.min.css');

        Asset::container('footer')->bundle('admin');
        Asset::container('footer')->add('jquery', 'http://code.jquery.com/jquery-latest.min.js');
        Asset::container('footer')->add('bootstrapjs', 'js/bootstrap.min.js');
    }
}