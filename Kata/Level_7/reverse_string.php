<?php

$arg = $argv[1];
if( is_string($arg))
    echo solution($arg);

function solution(string $str) : string {
  $reversed_str = "";
  
  for($i = strlen($str)-1; $i >= 0; $i--) {
    $reversed_str .= $str[$i];
  }
  
  return $reversed_str;
}

/* 
There is a predefined function in PHP for that:

function solution($str) {
  return strrev($str);
}

Note that you can replace your function by that predefined one:
use function strrev as solution;
*/