<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/5/2017
 * Time: 9:55 AM
 */
class Story extends Document
{
    public function borrowBook()
    {
        // check condition to borrow
        if ($this->checkConditionToBorrow()) {
            $this->setBorrowAmount($this->getBorrowAmount() + 1);
            $this->setCurrentAmount($this->getCurrentAmount() - 1);
        }
    }

    public function giveBackBook()
    {
        if ($this->checkConditionToGiveBack()) {
            $this->setGiveBackAmount($this->getGiveBackAmount() + 1);
            $this->setCurrentAmount($this->getCurrentAmount() + 1);
        }
    }


    function checkConditionToBorrow()
    {
        if ($this->getCurrentAmount() > 0) {
            return true;
        }

        return false;
    }

    function checkConditionToGiveBack()
    {
        if ($this->getCurrentAmount() < $this->getAmount()) {
            return true;
        }

        return false;
    }

}