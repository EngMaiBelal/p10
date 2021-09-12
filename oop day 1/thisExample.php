<?php

class user {
    public $name;
    public $age;

    public function printHelloMessage()
    {
        return "Hello $this->name , Your Age Is : $this->age";
    }

    public function sayWelcomeBeforeHelloMessage()
    {
        echo "Welcome ". $this->printHelloMessage();
    }
}

$firstUser = new user;
$firstUser->name = 'ahmed';
$firstUser->age = 25;
// echo $firstUser->printHelloMessage();
$firstUser->sayWelcomeBeforeHelloMessage();