<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 4:00 PM
 */
require_once('Armor.php');

class GuardianAngel extends Armor
{
    function __construct()
    {
        parent::__construct(15, 20);
    }
}