<?php

function randomString($n)
{

  $charecters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';
  for ($i = 0; $i < $n; $i++){
    $index = rand(0, strlen($charecters)-1);
    $str .=$charecters[$index];

  }
  return $str;

}