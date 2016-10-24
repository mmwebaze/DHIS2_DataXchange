<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/19/2016
 * Time: 9:51 AM
 */

namespace util;


final class Validator
{
    public static function verifyFormat($format){
        if (strtolower($format) != "xml")
            $format = "json";

        return strtolower($format);
    }

    public static function verifyPagination($isPaginated){
        $paging = "true";
        if ($isPaginated !== TRUE)
            $paging = "false";

        return $paging;
    }
}