<?php

function solution($str, $ending) {
  $pattern = '/(' . preg_quote($ending) . ')$/';
  $result = preg_match($pattern, preg_replace("/\n/", "²", $str));
  return (bool) $result;
}

