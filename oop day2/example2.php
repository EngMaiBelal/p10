<?php


class mobile {

    public function __construct()
    {
        echo "hello world from mobile<br>";
    }

    public function makeCall()
    {
        $this->__construct();
        // self::__construct();
        
    }
}


class samsung extends mobile {
    public function __construct()
    {
        echo "hello world from samsung<br>";
    }


    public function makeCall()
    {
        // parent::__construct();
        parent::makeCall();
    }
}


// echo "nti<br>";
$samsung = new samsung;
$samsung->makeCall();

