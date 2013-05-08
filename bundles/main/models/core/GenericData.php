<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 15
 * Date: 12-4-7
 * Time: 下午7:50
 * To change this template use File | Settings | File Templates.
 */

namespace Main\Models\Core;

class GenericData extends GenericModel
{
    protected $data = null;

    public function __get($name)
    {
        if(!empty($this->data)){
            if(isset($this->data[$name])) return $this->data[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function toArray()
    {
//        if(is_array($this->data)){
//            foreach($this->data as $key=>$val){
//                if(is_object($val)){
//                    die('hello');
//                }
//            }
//        }
        //die('fuck');
        return $this->data;
    }
}
