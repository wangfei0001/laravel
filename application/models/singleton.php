<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-8
 * Time: PM8:29
 * To change this template use File | Settings | File Templates.
 */
class Singleton
{
    private static $_instances = array();

    protected function __construct(){

    }

    final static public function getInstance(){
        $className = get_called_class();
        if (! array_key_exists($className, self::$_instances)) {
            self::$_instances[$className] = new $className();
        }
        return self::$_instances[$className];
    }

    final function __clone(){

    }


}
