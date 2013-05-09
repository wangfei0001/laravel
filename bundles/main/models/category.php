<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fei
 * Date: 12-7-8
 * Time: 下午7:38
 * To change this template use File | Settings | File Templates.
 */
namespace Main\Models;

use Main\Models\Core\Model;

class Category
{
    /***
     * Get categories
     *
     * @return mixed
     */
    public function getCategories()
    {
        $memAdapter = Model::getLocalStorageAdapter();

        return $memAdapter->get('category');
    }
}