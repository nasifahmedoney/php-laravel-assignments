<?php
// Create a PHP function called generatePassword($length) that generates a random password of the specified length. The password should include lowercase letters, uppercase letters, numbers, and special characters (!@#$%^&*()_+). Write a PHP program to generate a password with a length of 12 characters using this function and print the password.

function generatePassword($length) {

    $password = '';

    $smallLetters = 'abcdefghijklmnopqrstuvwxyz';
    $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $specialChars = '!@#$%^&*()_+';
    if($length < 1){
        return "Length can not be less than 1";
    }
    while(strlen($password) != $length){
        $password .= $smallLetters[rand(0, strlen($smallLetters) - 1)];
        $password .= $capitalLetters[rand(0, strlen($capitalLetters) - 1)];
        $password .= $numbers[rand(0, strlen($numbers) - 1)];
        $password .= $specialChars[rand(0, strlen($specialChars) - 1)];
        if(strlen($password) > $length){
            $password = substr($password,0,$length);
        }
    }

    return str_shuffle($password);
}

$randomPassoword = generatePassword(12);

echo $randomPassoword;

?>