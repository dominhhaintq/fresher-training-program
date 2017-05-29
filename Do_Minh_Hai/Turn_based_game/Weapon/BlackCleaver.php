<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 3:58 PM
 */
require_once('Weapon.php');

class BlackCleaver extends Weapon
{
    function __construct()
    {
        parent::__construct(40, 15);
    }
}