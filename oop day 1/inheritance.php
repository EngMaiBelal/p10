<?php


class mobile {
    public $camera = true;
    public $modelNumber;
    public $battery = true;

    // public function makeCalls()
    // {
    //     echo "make calls from mobile";
    // }

    public function takePhotos()
    {
        echo "take photos from mobile";
    }

    // const macAddress = '123456789';
    // static public $sim = true;
    // public static function test()
    // {
    //     echo "static method";
    // }
}

// echo mobile::macAddress;

class samsung extends mobile { 
    public $pen = true;
    public $theme = 'One Ui';

    public function makeCalls($mobile)
    {
        // $mobile->takePhotos();
        // echo "make calls from samsung";
    }

    public function takePhotos()
    {
        echo "take photos from samsung";
    }
}

// echo samsung::$sim;

// $samsung = new samsung;
// $mobile = new mobile;

// $array = (mobile) $samsung;

// print_r($samsung->makeCalls($mobile));

class apple extends mobile {
    public $faceId = true;
}