<?php
namespace Account\Models;
use /*Admin\Models\Admin as Admin, */Laravel\Auth\Drivers\Eloquent as Eloquent, Laravel\Hash, Laravel\Config;



class Auth extends Eloquent {


    /**
     * Get the current user of the application.
     *
     * If the user is a guest, null should be returned.
     *
     * @param  int|object  $token
     * @return mixed|null
     */
    public function retrieve($token)
    {
    }

    /**
     * Attempt to log a user into the application.
     *
     * @param  array $arguments
     * @return void
     */
    public function attempt($arguments = array())
    {

    }

    protected function model(){
    //    return new Admin;
    }


    public function guest()
    {
        return true;
    }

}
