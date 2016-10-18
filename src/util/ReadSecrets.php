<?php
/**
 * Created by PhpStorm.
 * Written By: Michael Mwebaze
 * Date: 10/18/2016
 * Time: 2:12 PM
 */

namespace util;


class ReadSecrets
{
    public static function loadSecrets(){
        $loadSecrets = file_get_contents("secrets.json");
        $secrets = json_decode($loadSecrets, true);

        return $secrets;
    }
}