<?php

function stray(array $arr) : int
{
  $occurences = array_count_values($arr);
  $first = array_values($occurences)[0];
  $second = array_values($occurences)[1];
  return ($first < $second) ? array_keys($occurences)[0] : array_keys($occurences)[1];
}

/* Solutions by other peoples:

function stray(array $arr) {
  return array_search(1, array_count_values($arr));
}
==> This is searching the key when the value is 1. So it's gonna 
find the stray.

*/