<?php

$arg = $argv[1];
if( is_string($arg))
    echo getCount($arg);

function getCount($str) {
  $vowelsCount = 0;
  $pattern = "/[aeiou]/i";
  
  for($i = 0; $i < strlen($str); $i++) {
    if(preg_match($pattern, $str[$i]))
      $vowelsCount++;
  }
  
  return $vowelsCount;
}

/* 
There is a shorter solution:
    return preg_match_all("/[aeiou]/i", $str);

Someone also wrote that:
    $findLetters = ['a', 'e', 'i', 'o', 'u'];  
    return sizeof(array_intersect(str_split($str), $findLetters));
*/