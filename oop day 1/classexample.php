<?php

class car {
    public $model;
    public $maxSpeed;
    public $color = 'black';
    public $sunRoof = false;

    public function drive () {
        echo "forward";
    }

    public function reverse()
    {
        echo "backward";
    }
}

$bmw = new car;
// $bmw = new car();

// print_r($bmw->color);
$bmw->color = 'red';
$bmw->newProperty = 'test';
$bmw->model = 'x6';
$bmw->maxSpeed = 250;

print_r($bmw);


$mercides = new car;
print_r($mercides);
// $bmw->reverse();