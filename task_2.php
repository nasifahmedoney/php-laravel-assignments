<?php
// Create an array called $numbers containing the numbers 1 to 10. Write a PHP function which takes the "$numbers" array as an argument to remove the even numbers from the array and print the resulting array.

$numbers = [1,2,3,4,5,6,7,8,9,10];

function arrManipulation($numbers){
    foreach($numbers as $number){
        if($number % 2 != 0){
            unset($numbers[$number]);
        }
    }
    return array_values($numbers);
}

$newNumbers = arrManipulation($numbers);

print_r($newNumbers);

?>