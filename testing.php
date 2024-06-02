<?php
$arg = $argv[1];
echo isTrue($arg);

function isTrue(int $number) : string{
    if($number % 2 === 0){
        return "Even";
    } else {
        return "Odd";
    }
}