<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 4:02 PM
 */
require_once('Armor.php');

class SunfireCape extends Armor
{
    function __construct()
    {
        parent::__construct(35, 20);
    }
}