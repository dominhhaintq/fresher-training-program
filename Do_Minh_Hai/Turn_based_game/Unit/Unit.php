<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 3:42 PM
 */
require_once('../Weapon/Weapon.php');
require_once('../Armor/Armor.php');

class Unit
{
    private $unit_name;
    private $base_health;
    private $base_damage;
    private $base_defense;
    private $weapon;
    private $armor;
    private $critical_hit;
    private $block;

    /**
     * Unit constructor.
     * @param $base_health
     * @param $base_damage
     * @param $base_defense
     */
    public function __construct($base_health, $base_damage, $base_defense)
    {
        $this->base_health = $base_health;
        $this->base_damage = $base_damage;
        $this->base_defense = $base_defense;
    }
    
    /**
     * @return mixed
     */
    public function getBaseHealth()
    {
        return $this->base_health;
    }

    /**
     * @param mixed $base_health
     */
    public function setBaseHealth($base_health)
    {
        $this->base_health = $base_health;
    }

    /**
     * @return mixed
     */
    public function getBaseDamage()
    {
        return $this->base_damage;
    }

    /**
     * @param mixed $base_damage
     */
    public function setBaseDamage($base_damage)
    {
        $this->base_damage = $base_damage;
    }

    /**
     * @return mixed
     */
    public function getBaseDefense()
    {
        return $this->base_defense;
    }

    /**
     * @param mixed $base_defense
     */
    public function setBaseDefense($base_defense)
    {
        $this->base_defense = $base_defense;
    }

    /**
     * @return mixed
     */
    public function getWeapon()
    {
        return $this->weapon;
    }

    /**
     * @param mixed $weapon
     */
    public function setWeapon(Weapon $weapon)
    {
        $this->weapon = $weapon;
        $this->setBaseDamage($this->getBaseDamage() + $this->getWeapon()->getDamage());
        $this->setCriticalHit($this->getWeapon()->getCriticalHit());
    }

    /**
     * @return mixed
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * @param mixed $armor
     */
    public function setArmor(Armor $armor)
    {
        $this->armor = $armor;
        $this->setBaseDefense($this->getBaseDefense() + $this->getArmor()->getDefense());
        $this->setBlock($this->getArmor()->getBlock());
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

    /**
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
    }

    /**
     * @return mixed
     */
    public function getUnitName()
    {
        return $this->unit_name;
    }

    /**
     * @param mixed $unit_name
     */
    public function setUnitName($unit_name)
    {
        $this->unit_name = $unit_name;
    }

    
}