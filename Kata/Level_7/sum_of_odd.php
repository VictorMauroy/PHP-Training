<?php 

/* Description:
Given the triangle of consecutive odd numbers:

             1
          3     5
       7     9    11
   13    15    17    19
21    23    25    27    29
...
Calculate the sum of the numbers in the nth row of this triangle 
(starting at index 1) e.g.: (Input --> Output)

1 -->  1
2 --> 3 + 5 = 8
*/

/**
 * Summary of rowSumOddNumbers
 * @param int $n The pyramid line of numbers to get
 * 
 * @return int The sum of the numbers at the searched line 
 */
function rowSumOddNumbers(int $n) : int {
    $sum = 0;
    $start = $n * ($n - 1) + 1;
    $end = ($n + 1) * $n;

    for($i = $start; $i < $end; $i += 2) {
        $sum += $i;
    }

    return $sum;
}


/* Clever:
function rowSumOddNumbers($n) {
  return pow($n, 3);
}
*/