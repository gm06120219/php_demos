<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/16
 * Time: 下午1:45
 */

error_reporting(0);

$con = mysqli_connect('127.0.0.1', 'root', '', 'php_db', '3306');
if (!$con) {
    die('Can not connect to DB' . mysqli_error());
}

$sql = "SELECT * FROM t_person WHERE FirstName='Eric'";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "error with select";
} else {
    while ($row = mysqli_fetch_array($result)) {
        echo $row['FirstName'] . " " . $row['LastName'] . '<br>';
    }
}

mysqli_close($con);
?>