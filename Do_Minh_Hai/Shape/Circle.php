<?php
namespace Circle;

class Shape
{
    private $radius;
    /**
     * Shape constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * get radius
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * set radius
     * @param mixed $radius
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    /**
     * get area
     * @return mixed
     */
    public function getArea()
    {
        return pi() * pow($this->getRadius(), 2);
    }

    /**
     * get perimeter
     * @return mixed
     */
    public function getPerimeter()
    {
        return 2 * pi() * $this->getRadius();
    }

    /**
     * get diameter
     * @return mixed
     */
    public function getDiameter()
    {
        return 2 * $this->getRadius();
    }

    /**
     * display info
     */
    public function toString()
    {
        return "Radius = " . $this->getRadius() . " Diameter = " . $this->getDiameter() . " Perimeter = " . $this->getPerimeter() . " Area = " . $this->getArea();
    }
}