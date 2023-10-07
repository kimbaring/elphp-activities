<?php

$name =  'Kim I. Baring';
$vowels = ['a','e','i','o','u'];
$vowelsCount = 0;

for($i = 0; $i < strlen($name); $i++)
    if(in_array(strtolower($name[$i]), $vowels))
        $vowelsCount++;

echo $name.'<br>';
echo 'Number of Vowels: '.$vowelsCount;