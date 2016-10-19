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
    public function getOrgUnitsByCode($code, $format, $isPaginated);
    public function getOrgUnits($format, $isPaginated);
    public function getOrgUnitsByLevel($level, $format, $isPaginated);
    public function getOrgUnitLevels($format, $isPaginated);
}