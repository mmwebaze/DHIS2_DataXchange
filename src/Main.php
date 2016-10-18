<?php
/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 3:39 PM
 */
/*require_once('services\LoginService.php');
require_once('services\OrgUnitService.php');
require_once('services\DataElementService.php');*/
namespace dhis;

use services\LoginService;
use services\OrgUnitService;
use services\DataElementService;

require_once ('services\LoginService.php');
require_once('services\OrgUnitService.php');

Class Main{
    public function main(){
        $baseURL = 'http://localhost:8181/dhis/api/';
        $loginService = LoginService::instance('admin', 'district');
        //$content = $login->login($api_url);
        //echo($content);

        $orgUnitService = new OrgUnitService($loginService, $baseURL);
        //$content = $orgUnitService->getOrgUnitUid("Rp268JB6Ne4");
        $content = $orgUnitService->getOrgUnits("CSV");
        echo($content);
        /*$dataElementService = new DataElementService();
        $dataElementService->getDataElementByCode(34859, TRUE);*/
    }
}

$main = new Main();
$main->main();