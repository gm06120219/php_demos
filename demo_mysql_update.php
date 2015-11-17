<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/16
 * Time: 下午6:52
 */

$con = mysqli_connect('127.0.0.1', 'root', '', 'php_db', '3306');

if(!$con){
    die('Can not connect mysql.' . mysqli_error($con));
}

$sql = 'UPDATE t_person SET Age="36" WHERE FirstName="Eric" AND LastName="Lee"';
mysqli_query($con, $sql);

mysqli_close($con);

?>