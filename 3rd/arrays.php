<?php


// arrays
// indexed array
$array = [1,2.5,null,];
// length = last index + 1
// last index = length - 1 
// $arrayOfNames = ['ahmed','mohamed','esraa','may'];
// $count = count($arrayOfNames);
// $lastIndex = $count - 1;
// echo $lastIndex;
// print_r($arrayOfNames);
// echo $arrayOfNames[2];
// $arrayOfNames[4] = 'galal';
// $arrayOfNames[0] = 'eslam';

// $arrayOfNames[10] = 'maged';
// $arrayOfNames[9] = 'hend';
// $arrayOfNames[-2] = 'wael';
// $arrayOfNames[-1] = 'wael';


// associative array
// $usersArray = ['id'=>5,'name'=>'may','name'=>'hend'];
// $usersArray = array();

// $usersArray['gender'] = 'f';
// $usersArray['name'] = 'hend';
// print_r($usersArray);

// $user = (object)['id'=>10,'name'=>'ahmed','email'=>'ahmed@gmail.com','gender'=>'m','code'=>NULL,'status'=>true];

// echo $user->gender;
// $user->bonus = 5;
// $user->id = 7;
// print_r($user);



// $user = [
//     'id'=>'5',
//     'name'=>'mohamed',
//     'activites'=>['football','running','reading'],
//     'orders'=> [
//         ['name'=>'lbs','date'=>'7/9/2021'],
//         ['name'=>'akl','date'=>'8/9/2021']
//     ]
// ];

// echo $user['activites'][1];
echo $user['orders'][1]['date'];
// loops
