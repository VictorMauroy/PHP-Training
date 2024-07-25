<?php

/* Description:
Given two arrays of strings a1 and a2 return a sorted array r in lexicographical order 
of the strings of a1 which are substrings of strings of a2.

Example 1:
a1 = ["arp", "live", "strong"]

a2 = ["lively", "alive", "harp", "sharp", "armstrong"]

returns ["arp", "live", "strong"]

Example 2:
a1 = ["tarp", "mice", "bull"]

a2 = ["lively", "alive", "harp", "sharp", "armstrong"]

returns []

Notes:
Arrays are written in "general" notation. See "Your Test Cases" for examples in your language.
In Shell bash a1 and a2 are strings. The return is a string where words are separated by commas.
Beware: In some languages r must be without duplicates.
*/

function inArray($array1, $array2) {
    $result = [];
    
    for($i = 0; $i < count($array1); $i++) {
      for($j = 0; $j < count($array2); $j++) {
        if(str_contains($array2[$j], $array1[$i])){ // Check if a given string contains a given target string.
          $result[] = $array1[$i];
        }
      }  
    }
    
    $result = array_unique($result); // Filter duplicate values
    sort($result); // Sort in ascending order
    return $result;
}

/* Interesting solutions by others: */

// The use of array_filter with the "use" keyword.
function inArray2($a1, $a2) {
    $r = array_filter($a1, function($v) use ($a2) {
        foreach ($a2 as $v2) {
            if (strpos($v2, $v) !== false) return true;
        }
        return false;
    });
    sort($r);
    return $r;
}

// The use of implode and foreach
function inArray3($array1, $array2) {
    // your code
    $str = implode(' ',$array2);
    $newArr = [];
    foreach($array1 as $k=>$v){
      if(substr_count($str,$v)>0){
        $newArr[] = $v;
      }
    }
    sort($newArr);
    return $newArr;
}
