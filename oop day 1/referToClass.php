<?php

class bmw {
    public $model = 2021;
    const error = 0;
    const success = 1;

    public function autoParking()
    {
        echo "auto parking $this->model";
    }

    public function test()
    {
        $this->model;
        $this->autoParking();

        bmw::brand;
        self::brand;
    }


    // public function validation()
    // {
    //     if($this->model < 2021){
    //         return self::error;
    //     }else{
    //         return bmw::success;
    //     }
    // }

    public static $name = 'x';
    public static function staticMethod()
    {
        echo "static";
    }


    const brand = 'bmw';
}


// $object = new bmw;
// $object->model = 55;
// $object->autoParking();

// print_r($object);

// echo bmw::brand; // :: double colon , scope resolution operator
// echo bmw::$name;
// bmw::staticMethod();
