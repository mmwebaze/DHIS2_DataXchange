<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 2:47 PM
 */
/*require_once ('IOrganisationUnitService.php');*/
namespace services;

use util\Validator;

require_once ('OrgUnitServiceInterface.php');
require_once ('util\Validator.php');

class OrgUnitService implements OrgUnitServiceInterface
{
    private $loginService;
    private $orgUnitEndPoint = "organisationUnits";
    private $orgUnitLevelEndPoint = "organisationUnitLevels";
    private $baseURL;

    public function __construct($loginService, $baseURL)
    {
        $this->loginService = $loginService;
        //$this->orgUnitEndPoint = $baseURL.$this->orgUnitEndPoint;
        $this->baseURL = $baseURL;
    }
    public function getOrgUnitsByCode($code, $format="XML", $isPaginated=TRUE){
        //$format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint."/".$code.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnits($format="XML", $isPaginated=TRUE)
    {
        //$format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnitsByLevel($level, $format = "XML", $isPaginated=TRUE)
    {
        //$format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint.".".Validator::verifyFormat($format)."?filter=level:eq:".$level."&fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnitLevels($format = "XML", $isPaginated=TRUE)
    {
        $orgUnitLevelEndPoint = $this->baseURL.$this->orgUnitLevelEndPoint.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($orgUnitLevelEndPoint);
    }
}