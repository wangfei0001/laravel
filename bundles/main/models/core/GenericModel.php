<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 15
 * Date: 12-3-19
 * Time: 下午3:31
 * To change this template use File | Settings | File Templates.
 */

namespace Main\Models\Core;

class GenericModel
{
    const ADAPTER_NAME_PIN = 'Pin';


    public static function getPinAdapter()
    {
        return self::getAdapterByName(self::ADAPTER_NAME_PIN);
    }


    /***
     * Get local storage adapter, set in config.php
     *
     * @static
     * @return mixed
     */
    public static function getLocalStorageAdapter()
    {
        switch(LOCAL_STORAGE_ADAPTER){
            case "LOCAL_STORAGE_ADAPTER_COUCHBASE":
                return self::getAdapterByName('Couchbase');
                break;
            case "LOCAL_STORAGE_ADAPTER_MYSQL":
                return self::getAdapterByName('Sql');
                break;

        }
    }

    public static function getAdapterByName($name)
    {
        require_once APPLICATION_PATH .'/modules/default/extensions/adapter/core/' .$name .'Adapter.php';
        require_once APPLICATION_PATH .'/modules/default/extensions/adapter/' .$name .'Adapter.php';
        return call_user_func(array($name .'Adapter','getInstance'));
    }
}
