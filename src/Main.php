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
use util\ReadFile;
use util\ArrayImploder;
use services\DatasetService;
use services\DataElementService;

require_once ('services/LoginService.php');
require_once('services/OrgUnitService.php');
require_once ('services/DatasetService.php');
require_once ('services/DataElementService.php');
require_once ('util/ReadFile.php');
require_once ('util/ArrayImploder.php');

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
        /*$content = $orgUnitService->getOrgUnitByCode("Rp268JB6Ne4","JSON");
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $orgUnitService->getOrgUnits();
        echo($content."\n");
        echo("*******************************************************************************\n");*/
        $content = $orgUnitService->getOrgUnitLevels(FALSE);
        //echo($content."\n");
        //echo(json_decode($content, true)['organisationUnitLevels'][0]['displayName']);
        $response = json_decode($content, true);
        $myArray = $response['organisationUnitLevels'];
        foreach ($myArray as $key => $value){
            echo($myArray[$key]['displayName']."\n");
        }
        //$cout = json_decode($content);
        //var_dump($cout["organisationUnitLevels"]);
        /*echo("*******************************************************************************\n");
        $content = $orgUnitService->getOrgUnitsByLevel(2, FALSE);
        echo($content."\n");

        echo("*******************************************************************************\n");
        $content = $orgUnitService->getOrgUnitAncestry("Rp268JB6Ne4");
        echo($content."\n");*/

        echo("Org Unit Services complete"."\n");
    }
    public function testDatasetServices(){
        echo("Running Dataset Services"."\n");
        $datasetService = new DatasetService($this->loginService, $this->secrets['baseurl']);
        $content = $datasetService->getDatasets();
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $datasetService->getDatasetByCode("lyLU2wR22tC");
        echo($content."\n");
        echo("Dataset Services complete"."\n");
    }
    public function testDataElementServices(){
        $orgUnits = array('lc3eMKXaEfw', 'PMa2VCrupOd');
        $dataElementCodes = array('eTDtyyaSA7f');
        $periods = array('LAST_12_MONTHS');

        echo("Running Data Element Services"."\n");
        $dataElementService = new DataElementService($this->loginService, $this->secrets['baseurl']);
        /*$content = $dataElementService->getDataElementByCode("FTRrcoaog83");
        echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $dataElementService->getDataElements(FALSE);
        echo($content."\n");
        echo("*******************************************************************************\n");*/
        $content = $dataElementService->getDatasetDataElements("N4fIX1HL3TQ", FALSE);
        echo($content);
        $response = json_decode($content, true);
        $myArray = $response['dataSetElements'];

        foreach ($myArray as $key => $value){
            echo($key."\n");
            echo($key." - ". $value['dataElement']['code']." -> ".$value['dataElement']['name']." -> ".$value['dataElement']['id']."\n");
        }
        /*echo($content."\n");
        echo("*******************************************************************************\n");
        $content = $dataElementService->getDataElementValues($dataElementCodes, $periods, $orgUnits);
        echo($content."\n");
        echo("Data Element Services complete"."\n");*/
    }
}
$secrets = ReadFile::loadJsonFile("secrets_remote.json");
$main = new Main($secrets);
//$main->testOrgUnitServices();
//$main->testDatasetServices();
$main->testDataElementServices();