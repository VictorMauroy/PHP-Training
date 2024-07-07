<?php
//$arg = $argv[1];
//echo isTrue($arg);

var_dump((string)false);

function isTrue(int $number) : string{
    if($number % 2 === 0){
        return "Even";
    } else {
        return "Odd";
    }
}