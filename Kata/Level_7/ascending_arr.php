<?php 

/* Description: 
    Determine if an array of integers has every integer 
    in an ascending order.
*/

function in_asc_order($arr) {
    $sorted_arr = $arr;
    sort($sorted_arr);
    if($sorted_arr === $arr)
      return true;
    
    return false;
}

/* Shorter return:

    return ($sorted_arr === $arr);

*/