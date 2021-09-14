<?php
class user {
    function __construct()
    {
        echo "user construct <br>";
    }
    public function login()
    {
        echo "user login  <br>";
    }
    function __destruct()
    {
        echo "user destruct  <br>";
    }
}

class admin extends user {
    function __construct()
    {
        echo "admin construct  <br>";
    }
    public function login()
    {
        echo "admin login  <br>";
    }
    function __destruct()
    {
        echo "admin destruct  <br>";
    }
}

$user = new user;
$user->login();

$admin = new admin;
$admin->login();

echo "nti  <br>";

// ahmed
// __construct
// login
// __destruct
// nti

// mostafa
// __construct
// login
// nti
// __destruct