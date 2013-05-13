<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 13/05/13
 * Time: 2:46 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Account\Libraries;

use Laravel\Auth\Drivers\Driver;


class Myauth extends Driver {


    public function attempt($arguments = array())
    {
        return $this->login(1);
    }

    public function retrieve($id)
    {
        var_dump($id);die();
        return get_my_user_object($id);
    }

}