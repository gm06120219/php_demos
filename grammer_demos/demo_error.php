<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/26
 * Time: 下午8:30
 */

function customError($errno, $errstr){
    echo "<b>Error:</b> [$errno] $errstr";
}

// set the error processer
//set_error_handler("customError");

echo $test;

$test = 2;
if($test > 1){
    trigger_error("Value must be 1 or below");
}

?>