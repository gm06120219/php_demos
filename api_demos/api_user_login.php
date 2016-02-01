<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/21
 * Time: 下午10:42
 */
include('string_illegal.php');
$string_illegal = new StringIllegal();
error_reporting(0);
function PostParam($param)
{
    return $_POST[$param] ? $_POST[$param] : '';
}

$username = @PostParam('username');
$password = @PostParam('password');

$output = array();

// Username, password cannot be empty 20002
if (!$username || !$password) {
    $output = array('data' => NULL, 'info' => 'Username and password cannot be empty.', 'code' => 20002);
    exit(json_encode($output));
}

// Illegal value parameter 10017
if (!$string_illegal->userName($username, 'ALL', 20) ||
    !$string_illegal->isEngLength($username, 6, 20) ||
    !$string_illegal->passWord(6, 20, $password) ||
    !$string_illegal->isEnglish($password)
) {
    $output = array('data' => NULL, 'info' => 'Illegal value parameter.', 'code' => 10017);
    exit(json_encode($output));
}

// insert mysql
$con = mysqli_connect('127.0.0.1', 'root', '', 'api_db', '3306');

// Server error fail 50000
if (!$con) {
    $output = array('data' => NULL, 'info' => 'Server sql error.', 'code' => 50000);
    exit(json_encode($output));
}

$sql = 'SELECT * FROM t_user WHERE Username="' . $username . '"';

$result = mysqli_query($con, $sql);

// Insert fail 10016
if (!$result) {
    $output = array('data' => NULL, 'info' => 'Wrong username or password.' . $sql, 'code' => 20003);
    exit(json_encode($output));
}

mysqli_close($con);

$row = mysqli_fetch_array($result);
if ($row['Password'] == $password) {
    // login success;
    $output = array('data' => array('Nickname' => $row['Nickname'], 'Lv' => $row['Lv'], 'Enable' => $row['Enable']), 'info' => 'Success . ', 'code' => 20000);
    exit(json_encode($output));
} else {
    // login fail;
    $output = array('data' => NULL, 'info' => 'Wrong username or password.' . $sql, 'code' => 20003);
    exit(json_encode($output));
}

?>