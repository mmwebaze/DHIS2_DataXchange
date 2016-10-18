<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 2:48 PM
 */
/*require_once('IDataElementService.php');*/
namespace services;

class DataElementService implements DataElementServiceInterface
{
    public function getDataElementByCode($code, $format)
    {
        // TODO: Implement getDataElementByCode() method.
    }

    public function getDataElements($format)
    {
        // TODO: Implement getDataElements() method.
    }

    public function getDatasetDataElements($datasetCode, $format)
    {
        // TODO: Implement getDatasetDataElements() method.
    }

    public function getDataElementValues($dataElementCodes = array(), $periods = array(), $orgUnits = array())
    {
        // TODO: Implement getDataElementValues() method.
    }

}