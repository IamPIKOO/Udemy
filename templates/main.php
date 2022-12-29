<?php

function sum($x, $y)
{
    return $x + $y;
}

$arr = array(4, 5);
$result = call_user_func_array('sum',$arr);
echo $result;