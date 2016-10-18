<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 2:30 PM
 */
namespace services;

interface DataElementServiceInterface
{
    public function getDataElementByCode($code, $format);
    public function getDataElements($format);
    public function getDatasetDataElements($datasetCode, $format);
    public function getDataElementValues($dataElementCodes = array(), $periods = array(), $orgUnits = array());
}