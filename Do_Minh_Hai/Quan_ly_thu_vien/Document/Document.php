<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/5/2017
 * Time: 9:52 AM
 */
abstract class Document implements Borrow, GiveBack
{
    private $id;
    private $title;
    private $author;
    private $amount;
    private $borrowAmount;
    private $giveBackAmount;
    private $currentAmount;

    /**
     * Document constructor.
     * @param $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /*  condition to borrow document*/
    abstract function checkConditionToBorrow();

    /*  condition to borrow document*/
    abstract function checkConditionToGiveBack();

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getBorrowAmount()
    {
        return $this->borrowAmount;
    }

    /**
     * @param mixed $borrowAmount
     */
    public function setBorrowAmount($borrowAmount)
    {
        $this->borrowAmount = $borrowAmount;
    }

    /**
     * @return mixed
     */
    public function getGiveBackAmount()
    {
        return $this->giveBackAmount;
    }

    /**
     * @param mixed $giveBackAmount
     */
    public function setGiveBackAmount($giveBackAmount)
    {
        $this->giveBackAmount = $giveBackAmount;
    }

    /**
     * @return mixed
     */
    public function getCurrentAmount()
    {
        return $this->currentAmount;
    }

    /**
     * @param mixed $currentAmount
     */
    public function setCurrentAmount($currentAmount)
    {
        $this->currentAmount = $currentAmount;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }


}