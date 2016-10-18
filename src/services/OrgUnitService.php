<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 2:47 PM
 */
/*require_once ('IOrganisationUnitService.php');*/
namespace services;

require_once ('OrgUnitServiceInterface.php');

class OrgUnitService implements OrgUnitServiceInterface
{
    private $loginService;
    private $orgUnitEndPoint = "organisationUnits";
    private $orgUnitLevelEndPoint = "organisationUnitLevels";
    private $baseURL;
    private $isPaginated = TRUE;

    public function __construct($loginService, $baseURL)
    {
        $this->loginService = $loginService;
        //$this->orgUnitEndPoint = $baseURL.$this->orgUnitEndPoint;
        $this->baseURL = $baseURL;
    }
    public function getOrgUnitUid($orgUnitUid, $format="XML"){
        $format = $this->verifyFormat($format);

        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint."/".$orgUnitUid.".".$this->verifyFormat($format);
        echo($orgUnitEndPoint."\n");
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnits($format="XML")
    {
        $format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint.".".$this->verifyFormat($format);
        echo($orgUnitEndPoint."\n");
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnitsByLevel($level, $format = "XML")
    {
        $format = $this->verifyFormat($format);
        $orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint.".".$this->verifyFormat($format)."?filter=level:eq:".$level;
        echo($orgUnitEndPoint."\n");
        return $this->loginService->login($orgUnitEndPoint);
    }

    public function getOrgUnitLevels($format = "XML")
    {
        $format = $this->verifyFormat($format);
        $orgUnitLevelEndPoint = $this->baseURL.$this->orgUnitLevelEndPoint.".".$this->verifyFormat($format);
        echo($orgUnitLevelEndPoint."\n");
        return $this->loginService->login($orgUnitLevelEndPoint);
    }
    private function verifyFormat($format){
        if ($format != "JSON")
            $format = "XML";

        return $format;
    }
}