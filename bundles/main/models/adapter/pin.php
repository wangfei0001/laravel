<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 15
 * Date: 12-3-19
 * Time: 下午3:21
 * To change this template use File | Settings | File Templates.
 */

namespace Main\Models\Adapter;

use Singleton;

use laravel\Config;

class Pin extends Singleton
{


    public function get($key, $data=false, $timeout = false)
    {
        $method = 'get' .ucfirst($key);
        return $this->_sendRequest($method, $data);
    }

    public function set($key, $data=false, $timeout = false)
    {
        $method = 'set' .ucfirst($key);
        return $this->_sendRequest($method, $data);
    }

    protected function _sendRequest($method, $data)
    {
        $response = $this->_request($method, $data);
        $response = unserialize($response);

        assert($response instanceof \Service_Response);

        return $response;
    }

    protected function _request($method, $data)
    {
        if($data instanceof Transfer_Abstract){
            $data = $data->toArray();
        }
        $rpc = '{"jsonrpc":"JSON-RPC-2.0","id":1,"params":{"data":'.json_encode($data).'},"method": "'.$method.'"}';

        if(function_exists('gethostname')){
            $host=gethostname();
        }elseif(function_exists('php_uname')){
            $host=php_uname('n');
        }else{
            $host='unresolved';
        }

        //get service url
        $url = Config::get('settings.service_url') .'webservice?t='.microtime(true).'&m='.$method;
        if (isset($_COOKIE['XDEBUG_SESSION'])) {
            $url .= '&XDEBUG_SESSION_START='.$_COOKIE['XDEBUG_SESSION'];
        }

        $con = curl_init($url);
        curl_setopt($con, CURLOPT_USERAGENT, 'Pin');
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            (!empty($stats)? 'X-Pin-Stats: '.serialize($stats):'X-Pin-Adapter-No-Stats: 1'),
            'X-Pin-Instance: '.$host,
            'Cache-Control: private, private, private, private, private, no-cache',
            'Expires: 0, 0, 0, 0, Sun, 03 Feb 2008 01:34:44 GMT',
            'Pragma: no-cache',
            'Expect: ',
            'Content-Length: ' . strlen($rpc) . "\r\n",
            $rpc));

        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($con, CURLOPT_POST, true);

        $result = curl_exec($con);

        if(empty($result)){
             throw new \RuntimeException('No result from service[' .$url .']');
        }
        curl_close($con);

        $json = json_decode(trim($result),true);

        if(empty($json)){
            throw new \RuntimeException('Request Error (Result is not Json):' .var_export($result, true));
        }
        return $json['result'];
    }



}
