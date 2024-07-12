<?php

function solution($str, $ending) {
  $pattern = '/(' . preg_quote($ending) . ')$/';
  $result = preg_match($pattern, preg_replace("/\n/", "²", $str));
  return (bool) $result;
}

/* Not by me

    BEST SOLUTION:

function solution(string $str, string $ending): bool {
    return str_ends_with($str, $ending);
}


    The solution I tried to do:

function solution($str, $ending): bool {
    $inp = preg_quote($ending);
    return !!preg_match("/{$inp}$(?!\n)/", $str);
}

    Without built-in function:

function solution($str, $ending): bool {
    return substr($str, -strlen($ending), strlen($ending)) == $ending;
}

*/