<?php

// abstract class

// interface

abstract class auth {
    public abstract function login ();
    // public abstract function register ();
    //public function test()
    // {
    //     # code...
    // }//
    // public $name;
    // static public $age;
    // static public function newMethod ()  {

    // }

    // const x = 5;
}

// $a = new auth;


class user extends auth {
    public function login () {
        echo "user login";
    }
}


class admin extends auth {
    public function login () {
        echo "admin login";
    }
}


class empolyee extends auth {
    public function login () {
        echo "employee login";
    }
}