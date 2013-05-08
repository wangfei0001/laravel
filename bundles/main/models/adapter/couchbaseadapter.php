<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 16/01/13
 * Time: 10:28 PM
 * To change this template use File | Settings | File Templates.
 */
require("Couchbase.php");

class Core_CouchbaseAdapter extends Intems_Pattern_Singleton
{
    protected $cb;

    public function __construct()
    {
        $this->cb = new Couchbase;
        $this->cb->addCouchbaseServer("localhost");
    }

    public function get($key, $data=false, $timeout = false)
    {
        $data = $this->cb->get($key);
        if(!empty($data)) $data = json_decode($data,true);

        return $data;
    }

    public function set($key, $data=false, $timeout = false)
    {
        $value = json_encode($data);
        $this->cb->set($key, $value);
    }

}
