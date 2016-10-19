<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 2:48 PM
 */
/*require_once('IDataElementService.php');*/
namespace services;

use util\Validator;

require_once ('DataElementServiceInterface.php');
require_once ('util\Validator.php');

class DataElementService implements DataElementServiceInterface
{
    private $loginService;
    private $dataElementEndPoint = "dataElements";
    private $datasetEndPoint = "dataSets";
    private $baseURL;

    public function __construct($loginService, $baseURL)
    {
        $this->loginService = $loginService;
        $this->baseURL = $baseURL;
    }

    public function getDataElementByCode($code, $format, $isPaginated = TRUE)
    {
        $dataElementEndPoint = $this->baseURL.$this->dataElementEndPoint."/".$code.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($dataElementEndPoint);
    }

    public function getDataElements($format, $isPaginated = TRUE)
    {
        $dataElementEndPoint = $this->baseURL.$this->dataElementEndPoint.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($dataElementEndPoint);
    }

    public function getDatasetDataElements($datasetCode, $format, $isPaginated = TRUE)
    {
        $dataElementEndPoint = $this->baseURL.$this->dataElementEndPoint."/".$datasetCode.".".Validator::verifyFormat($format)."?fields=dataSetElements[id,displayName]&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($datasetEndPoint);
    }

    public function getDataElementValues($dataElementCodes = array(), $periods = array(), $orgUnits = array())
    {
        // TODO: Implement getDataElementValues() method.
    }

}