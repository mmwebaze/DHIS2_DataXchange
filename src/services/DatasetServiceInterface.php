<?php

/**
 * Created by PhpStorm.
 * User: mmwebaze
 * Date: 10/17/2016
 * Time: 1:38 PM
 */
namespace services;


interface DatasetServiceInterface
{
    public function getDatasets($format);
    public function getDatasetByCode($code, $format);
}