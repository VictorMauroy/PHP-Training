<?php

$arg = $argv[1];
if( is_numeric($arg))
    echo solution($arg);

function solution(int $number) : int {
  $multiples = [];
  
  for($i = 1; $i < $number; $i++) {
    if($i % 3 === 0 || $i % 5 === 0)
      $multiples[] = $i;
  }
  
  return array_sum($multiples);
}

/* It seems you can do one line functions too in PHP :

function solution($number){
  return array_sum(array_filter(range(1, $number - 1), function($n) {return $n % 3 == 0 or $n % 5 == 0;}));
}

Defining a lambda is really strange.

*/