<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-7
 * Time: PM9:46
 * To change this template use File | Settings | File Templates.
 */

namespace Main\Models;

use Main\Models\Core;

class Pin extends GenericData
{

    public static function loadPins($options = array())
    {
        if(Config::get('settings.solr_enable')){


            die('fuck');
        }else{
            $adapter = self::getPinAdapter();
            $response = $adapter->get('Pins',$options);

            $result = false;
            if($response->isSuccess()){
                $pins = $response->getResultData();
                $result = array();
                foreach($pins as $val){
                    $result[] = new self($val['id_pin']);
                }
            }
        }

        return $result;
    }
}

