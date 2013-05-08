<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fei
 * Date: 12-4-18
 * Time: 下午11:37
 * To change this template use File | Settings | File Templates.
 */
class Core_SqlAdapter extends Intems_Pattern_Singleton
{
    static $connection = null;

    public function __construct()
    {
        $this->connect();
    }

    protected function _createTable()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS `keyvalue` (
                `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
          `value` longtext COLLATE utf8_unicode_ci NOT NULL,
          UNIQUE KEY `key` (`key`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        return mysql_query($sql);
    }

    protected function connect()
    {
        $host = defined(MYSQL_DATABASE_HOST)?MYSQL_DATABASE_HOST:'localhost';

        self::$connection = mysql_connect($host, MYSQL_DATABASE_USER, MYSQL_DATABASE_PASS) or die(mysql_error());
        mysql_select_db(MYSQL_DATABASE_DB, self::$connection);
        mysql_query('set names utf8;', self::$connection);

        $this->_createTable();

    }

    public function get($key, $data=false, $timeout = false)
    {
        $result = false;
        $res = mysql_query('SELECT value FROM keyvalue where `key`="' .mysql_real_escape_string($key) .'"', self::$connection);
        if(mysql_num_rows($res) == 1){
            $row = mysql_fetch_assoc($res);
            if (isset($row['value'])) {
                $result = json_decode($row['value'], true);
            }
        }
        return $result;
    }

    public function set($key, $data=false, $timeout = false)
    {
        $value = json_encode($data);
        mysql_query('INSERT INTO keyvalue
                         VALUES("' . $key . '","' . mysql_real_escape_string($value, self::$connection) . '")
                         ON DUPLICATE KEY UPDATE `value`="' . mysql_real_escape_string($value, self::$connection) . '"', self::$connection);
    }
}
