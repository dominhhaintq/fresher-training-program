<?php
require_once ('Circle.php');
require_once ('Rectangle.php');
require_once ('Square.php');

$circle = new Circle\Shape(30);
$rectangle = new Rectangle\Shape(30, 40);
$square = new Square\Shape(30);

echo $circle->toString() . "<br/>";
echo $rectangle->toString() . "<br/>";
echo $square->toString();