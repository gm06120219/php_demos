<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/17
 * Time: 下午2:45
 */

$con = mysqli_connect('127.0.0.1', 'root', '', 'php_db', '3306');
if (!$con) {
    die('Could not connect mysql.' . mysqli_error());
}

$sql = 'DELETE FROM t_person WHERE FirstName="Eric"';
$result = mysqli_query($con, $sql);

echo "delete " . $result . '<br>';

mysqli_close($con);

?>