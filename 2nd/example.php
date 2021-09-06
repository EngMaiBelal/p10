<?php
declare(strict_types=1);


function calcuateWeather($tmpDegree){
    if($tmpDegree <= 15){
        $msg = "cold weather";
    }elseif($tmpDegree > 15 AND $tmpDegree < 20){
        $msg = "warm weather";
    }elseif($tmpDegree >= 20 AND $tmpDegree < 30){
        $msg = "hot weather";
    }else{
        $msg = "very hot weather";
    }
    return $msg;

}
// solid

// $msg = calcuateWeather(9);
// echo $msg;
// echo calcuateWeather(20);

function cacluateSum(string $n1,int $n3, int $n2 = 0) 
{
    return $n1+$n2+$n3;
}

var_dump(cacluateSum('8',2,5)) ;