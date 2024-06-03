<?php

function sequence_sum(int $begin, int $end, int $step): int {
    if($begin > $end)
      return 0;
    
    $result = [0 => $begin];
    
    for($i = $begin + $step, $j = 0; $i <= $end; $i += $step, $j++){
      $result[] = $result[$j] + $step;
    }
    
    return array_sum($result);
}

/* I guess that I got lost in my reflexions xD

Simple solution:

function sequence_sum(int $begin, int $end, int $step): int {
  $sum = 0;
  for ($begin; $begin <= $end; $begin += $step) {
    $sum += $begin;
  }
  return $sum;
}
*/