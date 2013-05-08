<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 23/12/12
 * Time: 11:19 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Main\Models\Adapter;

use Singleton;

class Solr extends Singleton
{

    public function select($query, $fl = '*', $start=null, $rows=null, $sort=null, $version='2.1', $indent='on')
    {
        $solr = Solr_Service::getInstance();

        $response = $solr->select($query, $fl, $start, $rows, $sort, $version, $indent);

        if(false != $response && $response->isSuccess()){
            return $response->getResponse();
        }
        return false;
    }
}
