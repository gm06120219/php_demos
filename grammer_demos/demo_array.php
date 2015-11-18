<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/9/24
 * Time: 下午9:31
 */

// A two-dimensional array
$cars = array
(
    array("Volvo",100,96),
    array("BMW",60,59),
    array("Toyota",110,100)
);

echo $cars[0][0].": Ordered: ".$cars[0][1].". Sold: ".$cars[0][2]."<br>";
echo $cars[1][0].": Ordered: ".$cars[1][1].". Sold: ".$cars[1][2]."<br>";
echo $cars[2][0].": Ordered: ".$cars[2][1].". Sold: ".$cars[2][2]."<br>";


$cars=array("Volvo","BMW","SAAB");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".<br>";
echo "I like $cars[0], $cars[1] and $cars[2].<br>";

echo count($cars)."<br>";
for($x=0;$x<count($cars);$x++) {
    echo $cars[$x];
    echo "<br>";
}

?>