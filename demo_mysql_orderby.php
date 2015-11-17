<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/16
 * Time: 下午6:42
 */


$con = mysqli_connect('127.0.0.1', 'root', '', 'php_db', '3306');

$sql = 'SELECT * FROM t_person ORDER BY Age';
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo $row['FirstName'] . ' ' . $row['LastName'] . '<br>';
}

mysqli_close($con);

?>