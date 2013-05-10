<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-5-10
 * Time: PM8:51
 * To change this template use File | Settings | File Templates.
 */

namespace Main\Models;

use Main\Models\Core\Data;



class Board extends Data
{

    /***
     * Get Boards by user id
     *
     * @static
     * @param $userid
     * @param bool $latestpins
     * @return mixed
     */
    public static function getBoardsByUserid($userid, $latestpins = false)
    {
        $adapter = self::getLocalStorageAdapter();

        $boards = $adapter->get('boards_' .$userid);
        if($latestpins){
            $pinAdapter = self::getPinAdapter();
            foreach($boards as $key=>$val){
                $response = $pinAdapter->get('PinsByBoard2',array(
                    'id'    =>  $key,
                    'page'  =>  1,
                    'itemsPage' =>  9,
                    'excluded'  =>  false
                ));
                if($response->isSuccess()){
                    $result = $response->getResultData();
                    $boards[$key]['pins'] = $result['pins'];

                }
            }
        }

        return $boards;
    }
}