<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/26
 * Time: 下午8:50
 */

//function checkNum($number)
//{
//    if ($number > 1) {
//        throw new Exception("Excetion: value must be below 1");
//    } else {
//        echo "Value is OK!";
//    }
//}
//
//try {
//    checkNum(2);
//} catch (Exception $e) {
//    echo $e->getMessage();
//}
//

function CatchAllException($exception)
{
    echo "<b>Exception:</b>" . $exception->getMessage();
}

set_exception_handler("CatchAllException");

throw new Exception("Uncaught exception occurred.");

?>