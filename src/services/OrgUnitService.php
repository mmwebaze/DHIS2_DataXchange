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
        echo($format);
        $this->orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint."/".$orgUnitUid;
        echo($this->orgUnitEndPoint);
        return $this->loginService->login($this->orgUnitEndPoint);
    }

    public function getOrgUnits($format="XML")
    {
        if ($format != "JSON")
            $format = "XML";


        $this->orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint.".".$format;
        echo($this->orgUnitEndPoint);
        return $this->loginService->login($this->orgUnitEndPoint);
    }

    public function getOrgUnitsByLevel($level, $format)
    {
        $this->orgUnitEndPoint = $this->baseURL.$this->orgUnitEndPoint."?filter=level:eq:".$level;
        echo($this->orgUnitEndPoint);
        return $this->loginService->login($this->orgUnitEndPoint);
    }

    public function getOrgUnitLevels($format)
    {
        $this->orgUnitLevelEndPoint = $this->baseURL.$this->orgUnitLevelEndPoint;
        echo($this->orgUnitLevelEndPoint);
        return $this->loginService->login($this->orgUnitLevelEndPoint);
    }

}