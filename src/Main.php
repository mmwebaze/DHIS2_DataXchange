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
use util\ReadSecrets;
use services\DataElementService;

require_once ('services\LoginService.php');
require_once('services\OrgUnitService.php');
require_once ('util\ReadSecrets.php');

Class Main{
    private $secrets;
    public function __construct($secrets)
    {
        //$this->baseURL = $baseURL;
        echo ("Loading Secrets...\n");
        $this->secrets = $secrets;
    }

    public function testOrgUnitServices(){
        echo("Running Org Unit Services"."\n");
        //$baseURL = 'http://localhost:8181/dhis/api/';

        //$loginService = LoginService::instance('admin', 'district');
        $loginService = LoginService::instance($this->secrets['username'], $this->secrets['password']);

        $orgUnitService = new OrgUnitService($loginService, $this->secrets['baseurl']);
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
$secrets = ReadSecrets::loadSecrets();
$main = new Main($secrets);
$main->testOrgUnitServices();