<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/17/2016
 * Time: 1:41 PM
 */

namespace services;

use util\Validator;

require_once ('DatasetServiceInterface.php');
require_once ('util\Validator.php');

class DatasetService implements DatasetServiceInterface
{
    private $loginService;
    private $datasetEndPoint = "dataSets";
    private $baseURL;

    public function __construct($loginService, $baseURL)
    {
        $this->loginService = $loginService;
        $this->baseURL = $baseURL;
    }

    public function getDatasets($format, $isPaginated=TRUE)
    {
        $datasetEndPoint = $this->baseURL.$this->datasetEndPoint.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($datasetEndPoint);
    }

    public function getDatasetByCode($code, $format, $isPaginated=TRUE)
    {
        $datasetEndPoint = $this->baseURL.$this->datasetEndPoint."/".$code.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($datasetEndPoint);
    }

}