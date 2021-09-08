<?php
$users = array(
    array(
       'id' => 5698,
       'email' => 'galal@gmail.com',
       'password' => '123456',
       'gender' => 'm'
   ),
    array(
       'id' => 4767,
       'email' => 'ahmed@gmail.com',
       'password' => '123456',
       'gender' => 'm'
   ),
    array(
       'id' => 3809,
       'email' => 'esraa@gmail.com',
       'password' => '123456',
       'gender' => 'f'
   )
);
$email = 'galal@gmail.com';
$password = 123456;


$y = array_filter_nti($users,function ($x) use($email,$password) {
    return $x['email'] == $email AND $x['password'] == $password;
});
print_r($y);

// loop on array
// take every element and pass it to the callable function
// check on return value
// if it returns true => then the array will retiurn the value of the current element

function array_filter_nti (array $array,callable $function){
    foreach ($array as $key => $value) {
        $return = call_user_func($function,$value);
        if($return){
            return[$key => $value];
        }
    }
}


// function hello ($msg) {
//     return $msg;
// }
// $result = call_user_func('hello','nti');
// print_r($result);
?>