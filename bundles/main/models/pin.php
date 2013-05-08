<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-7
 * Time: PM9:46
 * To change this template use File | Settings | File Templates.
 */

namespace Main\Models;

use Main\Models\Core\Data;

use laravel\Config;

class Pin extends Data
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


    private $adapter = null;

    public function __construct($pid)
    {
        $memAdapter = self::getLocalStorageAdapter();

        $this->data = $memAdapter->get('pins_' .$pid);
        if(!$this->data){
            throw new Exception('Invalid pin id');
        }

        //parsing comments and fill owner information
        if(!empty($this->data['comments'])){
            foreach($this->data['comments'] as $key=>$val){
                $owner = $memAdapter->get('users_' .$val['fk_user']);
                $this->data['comments'][$key]['user'] = $owner;
            }
        }
    }
}

