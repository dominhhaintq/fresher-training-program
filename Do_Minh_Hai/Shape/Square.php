<?php
namespace Square;

class Shape
{
    private $edge;

    /**
     * Shape constructor.
     * @param $edge
     */
    public function __construct($edge)
    {
        $this->edge = $edge;
    }

    /**
     * get area
     */
    public function getArea()
    {
        return pow($this->getEdge(), 2);
    }

    /**
     * @return mixed
     */
    public function getEdge()
    {
        return $this->edge;
    }

    /**
     * @param mixed $edge
     */
    public function setEdge($edge)
    {
        $this->edge = $edge;
    }

    /**
     * display info
     */
    public function toString()
    {
        return "Edge = " . $this->getEdge() . " Area = " . $this->getArea();
    }
}