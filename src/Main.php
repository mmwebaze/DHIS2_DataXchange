<?php
/**
 * Created by PhpStorm.
 * Written By: Michael Mwebaze
 * Date: 10/18/2016
 * Time: 3:39 PM
 */

namespace dhis;

use services\LoginService;
use services\OrgUnitService;
use services\DataElementService;

require_once ('services\LoginService.php');
require_once('services\OrgUnitService.php');

Class Main{
    private $baseURL;
    public function __construct($baseURL)
    {
        $this->baseURL = $baseURL;
        echo ("Base URL : ".$baseURL."\n");
    }

    public function testOrgUnitServices(){
        echo("Running Org Unit Services"."\n");
        //$baseURL = 'http://localhost:8181/dhis/api/';
        $loginService = LoginService::instance('admin', 'district');

        $orgUnitService = new OrgUnitService($loginService, $this->baseURL);
        $content = $orgUnitService->getOrgUnitUid("Rp268JB6Ne4");
        echo($content."\n");
        $content = $orgUnitService->getOrgUnits("JSON");
        echo($content."\n");
        $content = $orgUnitService->getOrgUnitLevels();
        echo($content."\n");
        $content = $orgUnitService->getOrgUnitsByLevel(1);
        echo($content."\n");

        echo("Org Unit Services complete"."\n");
    }
}

$main = new Main($baseURL = 'http://localhost:8181/dhis/api/');
$main->testOrgUnitServices();