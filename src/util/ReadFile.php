<?php
/**
 * Created by PhpStorm.
 * Written By: Michael Mwebaze
 * Date: 10/18/2016
 * Time: 2:12 PM
 */

namespace util;


class ReadFile
{
   /* public static function loadSecrets(){
        $loadSecrets = file_get_contents("secrets_remote.json");
        $secrets = json_decode($loadSecrets, true);

        return $secrets;
    }
    public static function loadPeriods(){
        $loadSecrets = file_get_contents("dhis2_periods.json");
        $secrets = json_decode($loadSecrets, true);

        return $secrets;
    }*/
    public static function loadJsonFile($jsonFile){
        $loadJson = file_get_contents($jsonFile);

        return json_decode($loadJson, true);
    }
}