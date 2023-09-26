<?php
// Create a multidimensional array called $studentGrades to store the grades of three students. Each student has grades for three subjects: Math, English, and Science. Write a PHP function which takes "$studentGrades" as an argument to calculate and print the average grade for each student.

$studentGrades = [
    "student1" =>["Math"=> 72, "English"=> 62, "Science"=> 87],
    "student2" =>["Math"=> 81, "English"=> 83, "Science"=> 81],
    "student3" =>["Math"=> 58, "English"=> 73, "Science"=> 96]
];

function calculateAvg($studentGrades){
    foreach($studentGrades as $grades){
        $avg[] = number_format(($grades["Math"] + $grades["English"] + $grades["Science"])/3, 2);
    }
    return $avg;
}
$avg = calculateAvg($studentGrades);

echo "The average grade for student1: {$avg[0]}, student2: {$avg[1]}, student3: {$avg[2]}";
?>