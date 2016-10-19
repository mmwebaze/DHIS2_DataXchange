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
use services\DatasetService;
use services\DataElementService;

require_once ('services\LoginService.php');
require_once('services\OrgUnitService.php');
require_once ('services\DatasetService.php');
require_once ('services\DataElementService.php');
require_once ('util\ReadSecrets.php');

Class Main{
    private $secrets;
    private $loginService;

    public function __construct($secrets)
    {
        echo ("Loading Secrets...\n");
        $this->secrets = $secrets;
        $this->loginService = LoginService::instance($secrets['username'], $secrets['password']);
    }

    public function testOrgUnitServices(){
        echo("Running Org Unit Services"."\n");

        $orgUnitService = new OrgUnitService($this->loginService, $this->secrets['baseurl']);
        $content = $orgUnitService->getOrgUnitsByCode("Rp268JB6Ne4","JSON", FALSE);
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $orgUnitService->getOrgUnits("JSON", FALSE);
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $orgUnitService->getOrgUnitLevels("JSON", FALSE);
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $orgUnitService->getOrgUnitsByLevel(1, "XML", FALSE);
        echo($content."\n");

        echo("Org Unit Services complete"."\n");
    }
    public function testDatasetServices(){
        echo("Running Dataset Services"."\n");
        $datasetService = new DatasetService($this->loginService, $this->secrets['baseurl']);
        $content = $datasetService->getDatasets("JSON");
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $datasetService->getDatasetByCode("lyLU2wR22tC", "JSON", FALSE);
        echo($content."\n");
        echo("Dataset Services complete"."\n");
    }
    public function testDataElementServices(){
        echo("Running Data Element Services"."\n");
        $dataElementService = new DataElementService($this->loginService, $this->secrets['baseurl']);
        $content = $dataElementService->getDataElementByCode("FTRrcoaog83", "JSON", FALSE);
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $dataElementService->getDataElements("JSON", FALSE);
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $dataElementService->getDatasetDataElements("lyLU2wR22tC", "JSON", FALSE);
        echo($content."\n");
        echo("*******************************************************************************\n");
        //$content = $dataElementService->getDataElementValues($dataElementCodes = array(), $periods = array(), $orgUnits = array());
        echo("Data Element Services complete"."\n");
    }
}
$secrets = ReadSecrets::loadSecrets();
$main = new Main($secrets);
//$main->testOrgUnitServices();
//$main->testDatasetServices();
$main->testDataElementServices();