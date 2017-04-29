<?php
/**
 * Created by PhpStorm.
 * User: Salted Fish
 * Date: 2017/4/29
 * Time: 14:01
 */

namespace Saltedfish\Util;

use Saltedfish\Location\Errcode;

class Base {

    /**
     * @brief Return the output
     * @param $errNo
     * @param string $errMsg
     * @param null $data
     * @return array
     */
    public static function errRet($errNo, $errMsg = '', $data = null) {
        if ('' === $errMsg) {
            $errMsg = Errcode::getErrMsg($errNo);
        }

        $output = array(
            'errNo'  => $errNo,
            'errMsg' => $errMsg,
            'data'   => $data,
        );

        return $output;
    }
}
