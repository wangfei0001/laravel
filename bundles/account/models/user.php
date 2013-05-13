<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 13/05/13
 * Time: 5:24 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Account\Models;

use Main\Models\Core\Model;

class User
{



    protected function _getAdapter()
    {
        return Model::getPinAdapter();
    }


    public function login($username, $password)
    {
        $pinAdapter = $this->_getAdapter();

        $result = $pinAdapter->set('CustomerLogin',array(
            'username'  =>  $username,
            'password'  =>  $password
        ));

        if($result->isSuccess()){
            $this->data = $result->getResultData();
        }

        return $result->isSuccess()?$result->getResultData():false;
    }

}
