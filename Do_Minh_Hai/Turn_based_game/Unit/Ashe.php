<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 3:50 PM
 */
require_once('Unit.php');

class Ashe extends Unit
{
    function __construct()
    {
        parent::__construct(700, 40, 10);
        $this->setUnitName("Ashe");
    }
}