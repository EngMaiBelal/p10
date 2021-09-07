<?php 

// for
// for (intial; condition ; step) { 
//     // for body 
// }

// for ($i=1; $i < 4; $i++) { 
    // echo "$i<br>";
    // echo $i . '<br>';
// }
// for ($i=3; $i >= 1 ; $i--) { 
//     echo "$i<br>";
// }

$colors = ['red','green','blue','black'];
$lastIndex = count($colors) - 1;
// for ($i=0; $i <= $lastIndex ; $i++) { 
//     echo $colors[$i].'<br>';
// }

// for ($i=$lastIndex; $i >= 0; $i--) { 
//     echo $colors[$i].'<br>';
// }


// for ($i=$lastIndex *10 ; $i >= 0; $i-=10) { 
//     echo $colors[$i/10].'<br>';
// }

// while

// intail value

// while(condtion){
    //body
    // step
// }
// $counter = 0;
// while($counter <= 3){
//     echo $colors[$counter].'<br>';
//     $counter++;
// }

// do while
// intail value 
// do {
    // do while body
    // step
// }while(condtion);
// $counter = $lastIndex;
// do{
//     echo $colors[$counter].'<br>';
//     $counter--;
// }while($counter >= 0);




// foreach  

// foreach ($container AS $v1=>$v2) {

// }

$indexed = ['football','running','swimming','reading','gym'];
// $associative = ['id'=>5,'name'=>'sara'];
// $object = (object) ['id'=>5,'name'=>'sara'];

// foreach ($object AS $property => $value) {
//     echo $property . '==>>' . $value.'<br>';
// }
// echo "ok";


// foreach ($object as $x) {
//     echo $x.'<br>';
// }

// $target = 'swimming';

// foreach ($indexed as $index => $value) {
    // if ($target == $value) {
    //     echo $index.'<br>';
    //     break;
    // }else{
    //     echo "wrong<br>";
    // }
// }


foreach($indexed AS $index => $value){
    // if($index % 2 == 0){
    //     echo $value.'<br>';
    // }


    /*   anthor way */ 
    // if($index % 2 != 0 ){
    //     continue;
    // }

    // echo $value.'<br>';
}

