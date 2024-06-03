<?php 

/* Description:
Take 2 strings s1 and s2 including only letters from a to z. Return a new sorted string, the longest possible, containing distinct letters - each taken only once - coming from s1 or s2.

Examples:
a = "xyaabbbccccdefww"
b = "xxxxyyyyabklmopq"
longest(a, b) -> "abcdefklmopqwxy"

a = "abcdefghijklmnopqrstuvwxyz"
longest(a, a) -> "abcdefghijklmnopqrstuvwxyz"
*/

$arg1 = $argv[1];
$arg2 = $argv[2];
if( is_string($arg1) && is_string($arg2) ){
    echo longest($arg1, $arg2);
}

function longest($a, $b) {
    $sentence_arr = str_split($a . $b);
    sort($sentence_arr);
    $distinct_sentence = array_unique($sentence_arr);
    return implode($distinct_sentence);
}  

/* Solutions by others:
function longest($a, $b) {
    return count_chars($a.$b, 3);
}
https://www.php.net/manual/en/function.count-chars.php

*/