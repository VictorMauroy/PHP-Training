<?php

/* Description:
Build a pyramid-shaped tower, as an array/list of strings, 
given a positive integer number of floors. 
A tower block is represented with "*" character.

For example, a tower with 3 floors looks like this:

[
  "  *  ",
  " *** ", 
  "*****"
]
And a tower with 6 floors looks like this:

[
  "     *     ", 
  "    ***    ", 
  "   *****   ", 
  "  *******  ", 
  " ********* ", 
  "***********"
]
*/

function tower_builder(int $n): array {
    $pyramid = array();
    
    for($i = 0; $i < $n; $i++){
      $pyramid[$i] = "";
      for($j = 0; $j < $n*2 - 1; $j++){
        if($j < $n-$i-1 || $j > $n+$i-1){
          $pyramid[$i] .= ' ';
        } else {
          $pyramid[$i] .= '*';
        }
      }
    }
    
    return $pyramid;
}

/* Clever, by others: 

function tower_builder(int $n): array {
  $result = array();
  for($i=1; $i<=$n; $i++) {
    $result[] = str_repeat(' ', $n-$i) . str_repeat('*', ($i-1)*2+1) . str_repeat(' ', $n-$i);
  }
  return $result;
}

*/