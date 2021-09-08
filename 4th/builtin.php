<?php

// numeric
// $number = 100.9;
// echo round($number,0,PHP_ROUND_HALF_UP);
// echo ceil($number);
// echo floor($number);
// $code = rand(10000,99999);
// echo $code;
// $number = 9;
// echo sqrt($number);
// echo min(1,2,5,9,77);


// arrays

$users = array(
     array(
        'id' => 5698,
        'first_name' => 'Peter',
        'last_name' => 'Griffin',
    ),
     array(
        'id' => 4767,
        'first_name' => 'Ben',
        'last_name' => 'Smith',
    ),
     array(
        'id' => 3809,
        'first_name' => 'Joe',
        'last_name' => 'Doe',
    )
);
$firstNames = array_column($users, 'first_name');
// print_r($firstNames);

// $fname=array("Peter","Ben","Joe");
// $age=array("35","37","43");
// $c=array_combine($fname,$age);
// print_r($c);

// $allowedExtensions = ['pdf','docx'];
// $extensionUploadedFile = 'pdf';

// if(in_array($extensionUploadedFile , $allowedExtensions )){
//     echo "correct file";
// }else{
//     echo "you must upload file with extensions pdf, docX";
// }

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
1 > 2;
$email = 'galal@gmail.com';
$password = 123456;


$y = array_filter($users,function ($x) use($email,$password) {
    return $x['email'] == $email AND $x['password'] == $password;
});
// print_r($y);

// strings
// $date = date('d-m-Y');
// echo $date;
// $time = date('H:i:s');
// echo $time;

// $time = date('h:i:s A');
// echo $time;
// $dateTime = date('d-m-Y h:i:s A');
// echo $dateTime;
// date_default_timezone_set('Africa/Cairo');
// $timeZone = date_default_timezone_get();
// echo $timeZone;


// echo date('d-m-Y',strtotime("+30 days"));
// date

// $name = 'galla';

// echo $name[0];



?>

