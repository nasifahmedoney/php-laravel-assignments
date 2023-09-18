<?php

function fibonacci($number){
    $first = 0;
    $second = 1;
    $newNumber = 0;
    echo "$first $second ";
    $number = $number-2;
    for($i = 0; $i<$number; $i++){
        $newNumber = $first + $second;
        echo "{$newNumber} ";
        $first = $second;
        $second = $newNumber;
    }
}
fibonacci(15);
?>