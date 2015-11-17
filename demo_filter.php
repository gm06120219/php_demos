<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/29
 * Time: 下午10:09
 */


$x = 123;


if (filter_var($x, FILTER_VALIDATE_INT)) {
    echo "Integer is valid";
} else {
    echo "Integer is not valid";
}

echo "<br>";

$var = 257;
$var_options = array("options" => array("min_range" => 0, "max_range" => 256));

if (filter_var($var, FILTER_VALIDATE_INT, $var_options)) {
    echo "Integer is valid";
} else {
    echo "Integer is not valid";
}

?>