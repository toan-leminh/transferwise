<?php
/**
 * Created by PhpStorm.
 * User: leminhtoan
 * Date: 7/15/17
 * Time: 20:58
 */

namespace libs;


class FunctionUtil
{

    /**
     * Get key value from array
     *
     * @param $array
     * @param $key
     * @param $default null
     * @return mixed
     */
    public static function fetchKey($array, $key, $default= null){
        return isset($array[$key]) ? $array[$key] : $default;
    }
}