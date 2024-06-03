<?php 

/* Description:
Translate a given number into its Roman equivalent.

Note: My solution is so loooooooooooooong.
*/

function solution(int $number) : string
{
  $result = "";
  $str_num = (string)$number;
  $len = strlen($str_num);
  echo "Number to translate: $str_num \n";
  
  for($i = $len-1, $unit = 1; $i >= 0; $i--, $unit++){
    $digit = $str_num[$i];
    echo "Current digit: $digit at unit $unit \n";
    if($digit === 0)
      continue;
    
    switch($digit){
        case 1:
        case 2:
        case 3:
          switch($unit){
              case 1:
                $result = str_repeat("I", $digit) . $result;
                break;
              case 2:
                $result = str_repeat("X", $digit) . $result;
                break;
              case 3:
                $result = str_repeat("C", $digit) . $result;
                break;
              case 4:
                $result = str_repeat("M", $digit) . $result;
                break;
          }
          break;
        
        case 4:
          switch($unit){
              case 1:
                $result = "IV" . $result;
                break;
              case 2:
                $result = "XL" . $result;
                break;
              case 3:
                $result = "CD" . $result;
                break;
          }
          break;
        
        case 5:
        case 6:
        case 7:
        case 8:
          switch($unit){
              case 1:
                $result = "V" . str_repeat("I", $digit-5) . $result;
                break;
              case 2:
                $result = "L" . str_repeat("X", $digit-5) . $result;
                break;
              case 3:
                $result ="D" . str_repeat("C", $digit-5) . $result;
                break;
          }
          break;
        
        case 9:
        case 10:
          switch($unit){
              case 1:
                $result = str_repeat("I", 10-$digit) . "X" . $result;
                break;
              case 2:
                $result = str_repeat("X", 10-$digit) . "C" . $result;
                break;
              case 3:
                $result = str_repeat("C", 10-$digit) . "M" . $result;
                break;
          }
          break;
    }
  }
  
  echo "Result: $result \n";
  return $result;
}

/* Interesting solutions, by other peoples:

function solution($number){
  $tab = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,  'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($tab as $roman => $int) {
            if($number >= $int) {
                $number -= $int; 
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

function solution($number)
{
    $thousands = floor($number / 1000);
    $last3digits = str_pad($number % 1000, 3, '0', STR_PAD_LEFT);
    list($hundreds, $tens, $ones) = str_split($last3digits);

    return
        str_repeat('M', $thousands) .
        ['', 'C', 'CC', 'CCC', 'CD', 'D', 'DC', 'DCC', 'DCCC', 'CM'][$hundreds] .
        ['', 'X', 'XX', 'XXX', 'XL', 'L', 'LX', 'LXX', 'LXXX', 'XC'][$tens] .
        ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'][$ones];
}

*/