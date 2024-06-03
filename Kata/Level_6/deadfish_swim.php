<?php

/* Description:
Write a simple parser that will parse and run Deadfish.

Deadfish has 4 commands, each 1 character long:

i increments the value (initially 0)
d decrements the value
s squares the value
o outputs the value into the return array
Invalid characters should be ignored.

parse("iiisdoso") => [ 8, 64 ]
 */

$arg = $argv[1];
if(is_string($arg))
    print_r(parse($arg));

function parse(string $data) : array {
  $result = [];
  $val = 0;
  
  for($i = 0; $i < strlen($data); $i++) {
    switch($data[$i]) {
        case "i":
          $val++;
          break;
        
        case "d":
          $val--;
          break;
        
        case "s":
          $val = $val**2;
          break;
        
        case "o":
          $result[] = $val;
          break;
    }
  }
  
  return $result;
}