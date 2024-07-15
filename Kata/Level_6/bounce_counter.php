<?php

/* Description:

A child is playing with a ball on the nth floor of a tall building. 
The height of this floor above ground level, h, is known.

He drops the ball out of the window. The ball bounces (for example), to two-thirds of its height (a bounce of 0.66).

His mother looks out of a window 1.5 meters from the ground.

How many times will the mother see the ball pass in front of her window (including when it's falling and bouncing)?

Three conditions must be met for a valid experiment:
Float parameter "h" in meters must be greater than 0
Float parameter "bounce" must be greater than 0 and less than 1
Float parameter "window" must be less than h.
If all three conditions above are fulfilled, return a positive integer, otherwise return -1.

Note:
The ball can only be seen if the height of the rebounding ball is strictly greater than the window parameter.

Examples:
- h = 3, bounce = 0.66, window = 1.5, result is 3

- h = 3, bounce = 1, window = 1.5, result is -1 

(Condition 2) not fulfilled).

*/

function bouncingBall($h, $bounce, $window) {
    if($bounce <= 0 || $bounce >= 1 || $h <= 0 || $window >= $h)
        return -1;

    $ball_height = $h;
    $count = 1;
    while($ball_height * $bounce > $window) {
        $count += 2;
        
        $ball_height *= $bounce;
    }
    return $count;
}

/* Clever solutions, by other peoples

Recursive:

function bouncingBall($h, $bounce, $window) {
  if($h <= 0 || $window <= 0 || $h <= $window || $bounce >= 1 || $bounce <= 0) {
    return -1;
  }
  
  return bouncingBall($h * $bounce, $bounce, $window) + 2;
}

Math:

function bouncingBall(float $h, float $bounce, float $window): int {
  return ($bounce > 0 && $bounce < 1 && $window < $h) ? ceil(log($window/$h) / log($bounce))*2 - 1 : -1;
}

*/