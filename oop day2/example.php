<?php

// encapsulation
// private
// getter => accessors
// setter =>  mutators

// final
class user {
    public $name;
    public  function login()
    {
        echo "user login";
    }
}


class admin extends user{
    public function login()
    {
        echo "admin login";
    }
}


// function test () {
//     print_r(func_get_args());
// }

// test(5,9);



