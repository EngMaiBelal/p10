<?php 
class user {
    public $makeOrder = true;
}

class employee extends user {
    public $orderCheck = true;
}


class admin extends employee {
    public $deleteOrder = true;
}

print_r(new admin);


print_r(new employee);


print_r(new user);