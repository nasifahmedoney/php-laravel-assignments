<?php
$first = 0;
$second = 1;
$newNumber = 0;
echo "$first $second ";
for($i = 0; $i<=10; $i++){
    $newNumber = $first + $second;
    if($newNumber > 100)
    {
        break;
    }
    else{
        echo "{$newNumber} ";
    }
    $first = $second;
    $second = $newNumber;
}
?>