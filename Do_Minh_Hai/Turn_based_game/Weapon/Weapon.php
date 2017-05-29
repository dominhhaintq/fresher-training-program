<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 3:42 PM
 */
class Weapon
{
    private $damage;
    private $critical_hit;

    /**
     * Weapon constructor.
     * @param $damage
     * @param $critical_hit
     */
    public function __construct($damage, $critical_hit)
    {
        $this->damage = $damage;
        $this->critical_hit = $critical_hit;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param mixed $damage
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return mixed
     */
    public function getCriticalHit()
    {
        return $this->critical_hit;
    }

    /**
     * @param mixed $critical_hit
     */
    public function setCriticalHit($critical_hit)
    {
        $this->critical_hit = $critical_hit;
    }

}