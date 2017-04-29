<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/4/29
 * Time: 13:57
 */

namespace Saltedfish\Location;

class Errcode {

    // defines of error no
    const ERR_SUCCESS = 0;
    const ERR_GEO_LOCATION_FAIL = 1;

    // defines of error message
    private static $errMsg = array(
        self::ERR_SUCCESS => 'success',
        self::ERR_GEO_LOCATION_FAIL => 'geo location fail',
    );

    /**
     * @brief  get the detailed error msg by error no
     * @param  $errNo
     * @return mixed|string
     */
    public static function getErrMsg($errNo) {
        if (isset(self::$errMsg[$errNo])) {
            return self::$errMsg[$errNo];
        }
        else {
            return "unknown error msg";
        }
    }
}