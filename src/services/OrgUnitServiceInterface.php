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
    public function getOrgUnitByCode($code, $format);
    public function getOrgUnits($isPaginated, $format);
    public function getOrgUnitsByLevel($level, $isPaginated, $format);
    public function getOrgUnitLevels($isPaginated, $format);
    public function getOrgUnitAncestry($code, $format);
    public function getOrgUnitGroups($isPaginated, $format);
    public function getOrgUnitsByGroup($orgUnitGroupUid, $format);
}