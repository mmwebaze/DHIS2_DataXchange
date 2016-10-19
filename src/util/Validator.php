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
        if (strtolower($format) != "json")
            $format = "xml";

        return strtolower($format);
    }

    public static function verifyPagination($isPaginated){
        var_dump($isPaginated);
        $paging = "true";
        if ($isPaginated !== TRUE)
            $paging = "false";

        return $paging;
    }
}