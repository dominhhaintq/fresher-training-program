<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/5/2017
 * Time: 3:42 PM
 */
class Armor
{
    private $defense;
    private $block;

    /**
     * Armor constructor.
     * @param $defense
     * @param $block
     */
    public function __construct($defense, $block)
    {
        $this->defense = $defense;
        $this->block = $block;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
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

    
}