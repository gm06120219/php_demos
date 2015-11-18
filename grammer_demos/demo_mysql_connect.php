<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/9
 * Time: 下午11:04
 */
error_reporting(0);

$con = mysql_connect('127.0.0.1:3306', 'root', '');

if (!$con) {
    die('Could not connect:' . mysql_error());
} else {
    echo "connect success.<br>";
}


if (mysql_query('CREATE DATABASE php_db;', $con)) {
    echo "create database success.<br>";
} else {
    echo "Error: create database fail. " . mysql_error() . '<br>';
}

mysql_select_db('php_db', $con);
$sql = "CREATE TABLE persons
(
FirstName varchar(15),
LastName varchar(15),
Age int
)";

mysql_query($sql, $con);


mysql_close($con);
?>