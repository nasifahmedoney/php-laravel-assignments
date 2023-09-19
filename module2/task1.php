<?php
declare(strict_types=1);
// for loop
// ============================================
function printEvenNumbers(int $start, int $end, int $step):void{
    for($i = $start+1; $i <= $end; $i+=$step){
        if($i % 2 == 0){
            echo "{$i} ";
        }
    }
}
printEvenNumbers(1,20,2);

// while loop
// ============================================
// function printEvenNumbers(int $start, int $end, int $step):void{
//     $start++;
//     while($start <= $end){
//         if($start % 2 == 0){
//             echo "{$start} ";
//         }
//         $start+=$step;
//     }
// }
// printEvenNumbers(1,20,2);

// do while loop
// ============================================
// function printEvenNumbers(int $start, int $end, int $step):void{
//     $start++;
//     do{
//         if($start % 2 == 0){
//             echo "{$start} ";
//         }
//         $start+=$step;
//     }while($start <= $end);
// }
// printEvenNumbers(1,20,2);
?>