<?php
//$arg = $argv[1];
//echo isTrue($arg);

var_dump(solution("abc\n", "abc"));

function solution($str, $ending) {
    $pattern = '/(' . preg_quote($ending) . ')$/';
    print($pattern . "\n");
    print($str . " is str and " . $ending . " is the ending." . "\n" . "\n");
    $result = preg_match($pattern, trim($str));
    return (bool) $result;
}