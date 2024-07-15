<?php

/* Description:
Write Number in Expanded Form
You will be given a number and you will need to return it as a string in Expanded Form. For example:

expanded_form(12); // Should return "10 + 2"
expanded_form(42); // Should return "40 + 2"
expanded_form(70304); // Should return "70000 + 300 + 4"
NOTE: All numbers will be whole numbers greater than 0.

 */

function expanded_form(int $n): string {
    $number_str = (string) $n;
    $sentence = "";
    $length = strlen($number_str);
    
    for($i = 0; $i < $length; $i++) {
      if($number_str[$i] != 0){
        $num_to_add = $number_str[$i] . str_repeat(0, $length-$i-1);
        
        if((int) $num_to_add == substr($number_str, $i)){
          $sentence .= $num_to_add;
        } else {
          $sentence .= $num_to_add . " + ";
        }
      }
    }
    
    return $sentence;
}

/* Clever solutions by other peoples 

Classic.

function expanded_form(int $n): string {
    $split = str_split($n);
    $num_digits = count($split);
    $numbers_arr = [];
    foreach ($split as $digit) {
        if ($digit != 0) {
            $numbers_arr[] = $digit . str_repeat(0, $num_digits - 1);
        }
        $num_digits--;
    }
    return implode(' + ', $numbers_arr);
}


Ah, I should've used Modulo.

function expanded_form(int $n): string {
	for($i = strlen($n), $a = []; $i > 0;)
	{
		$a[] = $n - ($j = $n % (10 ** (--$i)));
		$n   = $j;
	}
	return implode(' + ', array_filter($a));
}

*/