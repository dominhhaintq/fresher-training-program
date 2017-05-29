<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 3:50 PM
 */
require_once('Unit.php');

class Garen extends Unit
{
    function __construct()
    {
        parent::__construct(1000, 20, 15);
        $this->setUnitName("Garen");
    }
}