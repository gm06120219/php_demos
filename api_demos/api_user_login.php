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

error_log("Login by " . $username . "\n", 3, "/var/tmp/api.log");

// login mysql
$con = mysqli_connect('127.0.0.1', 'root', '', 'api_db', '3306');
// Server error fail 50000
if (!$con) {
    $output = array('data' => NULL, 'info' => 'Server sql error.', 'code' => 50000);
    exit(json_encode($output));
}

// new memcache object
$mem = new Memcache();
$mem->connect('127.0.0.1', 11211);

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

$sql = 'SELECT * FROM t_user WHERE Username="' . $username . '"';

$result = mysqli_query($con, $sql);

// Insert fail 10016
if (!$result) {
    $output = array('data' => NULL, 'info' => 'Wrong username or password.' . $sql, 'code' => 20003);
    exit(json_encode($output));
}

mysqli_close($con);

$user_info = mysqli_fetch_array($result);
if ($user_info['Password'] == $password) {
    // set data into the memcache
    $token = md5($username . time());
//    error_log("user info: " . json_encode($user_info) . "\n", 3, "/var/tmp/api.log");
    $mem->set($token, $user_info);
    $mem->close();

    // login success;
    $output = array('data' => array('Token' => $token,
        'Nickname' => $user_info['Nickname']),
        'info' => 'Success', 'code' => 20000
    );
    exit(json_encode($output));
} else {
    // login fail;
    $output = array('data' => NULL, 'info' => 'Wrong username or password.' . $sql, 'code' => 20003);
    exit(json_encode($output));
}

?>