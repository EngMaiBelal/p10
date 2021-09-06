<?php

// if(TRUE || FALSE){
//     // body 
// }


// if(true){
//     echo "ok";
// }

// if(false){
//     echo "no";
// }

// "" , 0 , '0' , false , NULL , [] , (object)[]

// $x = (object)[];


// if($x){
//     echo "ok";
// }

// $number1 = 5;
// $number2 = 10;

// if ($number1 == $number2) {

// }

// $user = 'm';

// if($user == 'f'){
//     echo "female";
// }else{
//     echo "male";
// }

// $msg = '';
// if (4 > 5) {
//     $msg = 'hello';
// }

// echo $msg;

// $color  = 'red';
// ['red','blue','black']
// if($color == 'red'){
//     // echo 'my fav color is :' . $color;
//     echo "my fav color is $color <br>";
// }elseif( $color == 'blue' ){
//     echo ' my brother\'s fav color is '.$color;
// }else{
//     echo  $color;
// }


# example
// weather < 15 => cold weather
//  15 < weather < 20 => warm weather
// 20 < weather < 30 => hot weather
// weather > 30 => very hot weather

$weather = 15;
if($weather <= 15){
    $msg = "cold weather";
}elseif($weather > 15 AND $weather < 20){
    $msg = "warm weather";
}elseif($weather >= 20 AND $weather < 30){
    $msg = "hot weather";
}else{
    $msg = "very hot weather";
}

echo $msg;
