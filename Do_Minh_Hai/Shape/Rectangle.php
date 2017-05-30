<?php
namespace Rectangle;

class Shape
{
    private $width;
    private $height;

    /**
     * Shape constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * get area
     * @return mixed
     */
    public function getArea()
    {
        return $this->getWidth() * $this->getHeight();
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * display info
     */
    public function toString()
    {
        return "Width = " . $this->getWidth() . " Height = " . $this->getHeight() . " Area = " . $this->getArea();
    }
}