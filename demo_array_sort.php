<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/10
 * Time: 下午4:38
 */

$cars = array("Benz", "BMW", "Saab");
rsort($cars);
foreach ($cars as $car) {
    echo "$car\r\n";
}


$men = array("Ben" => 27, "Lee" => 26, "Max" => 28);
krsort($men);
foreach ($men as $man => $age) {
    echo "$man age is $age.\r\n";
}
?>