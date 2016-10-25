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
require_once ('util/Validator.php');

class OrgUnitService implements OrgUnitServiceInterface
{
    private $loginService;
    private $orgUnitEndPoint = "organisationUnits";
    private $orgUnitLevelEndPoint = "organisationUnitLevels";
    private $baseURL;

    public function __construct($loginService, $baseURL)
    {
        $this->loginService = $loginService;
        $this->baseURL = $baseURL;
    }
    public function getOrgUnitByCode($code, $format="JSON"){
        //$format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint."/".$code.".".Validator::verifyFormat($format)."?fields=id,displayName";
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnits($isPaginated=TRUE, $format="JSON")
    {
        //$format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint.".".Validator::verifyFormat($format)."?fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnitsByLevel($level, $isPaginated=TRUE, $format = "JSON")
    {
        //$format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint.".".Validator::verifyFormat($format)."?filter=level:eq:".$level."&fields=id,displayName&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnitLevels($isPaginated=TRUE, $format = "JSON")
    {
        $orgUnitLevelEndPoint = $this->baseURL.$this->orgUnitLevelEndPoint.".".Validator::verifyFormat($format)."?fields=id,displayName,level&paging=".Validator::verifyPagination($isPaginated);
        return $this->loginService->login($orgUnitLevelEndPoint);
    }
    public function getOrgUnitAncestry($code, $format = "JSON"){
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint."/".$code.".".Validator::verifyFormat($format)."?fields=id,displayName,children[id,displayName],ancestors[id,displayName]";
        return $this->loginService->login($orgUnitEndPoint);
    }
}