<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/5/2016
 * Time: 2:26 PM
 */
namespace services;

interface OrgUnitServiceInterface
{
    public function getOrgUnits($format);
    public function getOrgUnitsByLevel($level, $format);
    public function getOrgUnitLevels($format);
}