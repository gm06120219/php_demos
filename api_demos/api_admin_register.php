<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/12/2
 * Time: 上午9:38
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
$nickname = @PostParam('nickname');

$output = array();

// Username, password and nickname cannot be empty 20002
if (!$username || !$password || !$nickname) {
    $output = array('data' => NULL, 'info' => 'Username, password and nickname cannot be empty.', 'code' => 20002);
    exit(json_encode($output));
}

// Illegal value parameter 10017
if (!$string_illegal->userName($username, 'ALL', 20) ||
    !$string_illegal->isEngLength($username, 6, 20) ||
    !$string_illegal->passWord(6, 20, $password) ||
    !$string_illegal->isEnglish($password) ||
    !$string_illegal->isStrLength($nickname, 2, 12)
) {
    $output = array('data' => NULL, 'info' => 'Illegal value parameter.', 'code' => 10017);
    exit(json_encode($output));
}

// insert mysql
$con = mysqli_connect('127.0.0.1', 'root', '', 'api_db', '3306');

// Insert fail 10016
if (!$con) {
    $output = array('data' => NULL, 'info' => 'Server sql error.', 'code' => 50000);
    exit(json_encode($output));
}

$sql = 'INSERT INTO t_user(Username, Password, Nickname, Lv, Enable) VALUES ("' . $username . '","' . $password . '","' . $nickname . '", 34, TRUE);';

$result = mysqli_query($con, $sql);

// Insert fail 10016
if (!$result) {
    $output = array('data' => NULL, 'info' => 'Insert fail.' . $sql, 'code' => 10016);
    exit(json_encode($output));
}

mysqli_close($con);
$output = array('data' => NULL, 'info' => 'Success.', 'code' => 20000);
exit(json_encode($output));

?>