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

use Laravel\Session;

use Account\Models\User;

class Myauth extends Driver {



    public function attempt($arguments = array())
    {
        $username = $arguments['username'];

        $password = $arguments['password'];

        $user = new User();

        $result = $user->login($username, $password);
        if($result){

            Session::put('me', $result);

            return $this->login($result['id_user'], array_get($arguments, 'remember'));
        }else{
            return false;
        }

    }

    public function retrieve($id)
    {


        return Session::get('me');
    }

}