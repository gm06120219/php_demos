<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/17
 * Time: 下午2:49
 */

$con = mysqli_connect('127.0.0.1', 'root', '', 'php_db', '3306');
if(!$con){
    die('Could not connect mysql.' . mysqli_error($con));
}

$sql = "INSERT INTO t_person (FirstName, LastName, Age) VALUES ('Eric', 'Lee', 25)";
$result = mysqli_query($con, $sql);

echo $result;

mysqli_close($con);

?>
