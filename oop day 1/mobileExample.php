<?php

// s21 : samsung , 128 GByte storage , 8 GRAM , has charger , resolution 1080p , dual apps , can take photos , can make calls
// iphone 12 : apple , 256 Gbyte storage, 6 GRAM , has n't charger , resolution 1080p. can take photos , can make calls

// $this // pseudo vaiable  // refer to current object inside class
class phone {
    public $name;
    public $brand;
    public $storage;
    public $ram;
    public $hasCharger;
    public $res = 1080;

    public function takePhoto()
    {
        echo "photo from  $this->brand <br>";
    }

    public function makeCalls()
    {
        echo 'call';
    }
}


$samsung = new phone;
$samsung->name = 's21';
$samsung->brand = 'samsung';
$samsung->storage = 128;
$samsung->ram = 8;
$samsung->hasCharger = true;
$samsung->dualApp = true;
// print_r($samsung);


$iphone = new phone;
$iphone->name = 'iphone 12';
$iphone->brand = 'apple';
$iphone->storage = 256;
$iphone->ram = 6;
$iphone->hasCharger = false;
// print_r($iphone);

$samsung->takePhoto();
// $iphone->takePhoto();