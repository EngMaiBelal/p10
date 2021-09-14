<?php

// class grandParent {

// }


// class parentClass extends grandParent {


// }

// class child extends parentClass {

// }

trait media {
    public $name = 's';
    public static $age = 5;
    public static function x ( ) {

    }
    // const x = 7;
    public function uploadPhoto()
    {
        echo "upload photo from media";
    }

    public function uploadPdf()
    {
        # code...
    }
}

trait data {
    public function uploadPhoto()
    {
        echo "upload photo from data";
    }
}

trait general {
    use data,media {
        media::uploadPhoto AS mediaUploadPhoto;
        data::uploadPhoto insteadOf media;
    }
}


class user {
    use media; 
}

class admin {
    use data;
}

class product {
    use general;
}

$product = new product;
$product->mediaUploadPhoto();

// namespaces in php
// autoload class , class autoloader
// apis 