<?php 

// public => global scope , child classes , inside class
// protected => child classes , inside class
// private =>  inside class

class animal {
    private $food;
    protected $drink;
    public $name;

    public function setFood($food)
    {
        $this->food = $food;
    }
}

class cat extends animal {

}

class dog extends animal {
    public function setFood($food)
    {
        $this->food = $food;
    }
}

$pitbull = new dog;
// $pitbull->food = 'bone'; // access global scope
// $pitbull->setFood('bone'); // access child scope

print_r($pitbull);
// $animal = new animal;
// $animal->setFood('bone'); // access inside class
// print_r($animal);

