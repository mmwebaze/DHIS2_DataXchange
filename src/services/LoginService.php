<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 10:45 AM
 */
namespace services;

final class LoginService
{
    private $header = array();
    private $username;
    private $password;
    private $isSessionAlive = FALSE;

    private function __construct ($username, $password){
        $this->header = $this->setHeaders($username, $password);
        $this->username = $username;
        $this->password = $password;
    }
    public function login($url){
        echo("-> ".$url."\n");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->username.':'.$this->password);
        #curl_setopt($ch, CURLOPT_URL,$url);

        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        //$r = var_dump(json_decode($result));
        #print($r);

        return $result;
    }
    public static function instance($username, $password){

        static $inst = null;
        if ($inst === null){
            $inst = new LoginService($username, $password);
        }

        return $inst;
    }

    private function setHeaders($username, $password){
        $header = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json';
        #$header[] = 'Authorization: Basic '. base64_encode("$username:$password");
        return $header;
    }
    private function isSessionAlive(){

        return $this->isSessionAlive;
    }
}
/*$api_url = 'http://localhost:8181/dhis/api/organisationUnits.json';
$loginService = LoginService::instance('admin', 'district');
$content = $loginService->login($api_url);
echo $content;*/