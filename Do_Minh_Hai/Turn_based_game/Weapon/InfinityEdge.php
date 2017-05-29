<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 3:56 PM
 */
require_once('Weapon.php');

class InfinityEdge extends Weapon
{
    public function __construct()
    {
        parent::__construct(75, 20);
    }
}