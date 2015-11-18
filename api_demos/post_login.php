<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/18
 * Time: 下午5:50
 */


error_reporting(0);

$username = @$_POST['username'] ? $_POST['username'] : '';
$password = @$_POST['password'] ? $_POST['password'] : '';
$output = array();

if (empty($username) || empty($password)) {
    $output = array('data' => NULL, 'info' => 'Lost username or password.', 'code' => 20002);
} else {
    if ($username == 'liguangming' && $password == '123456') {
        $output = array('data' => array('Nickname' => 'Eric Lee', 'Token' => '1234567890123456', 'Avatar' => 'url.url.url'), 'info' => 'Login Success', 'code' => 200);
    } else {
        $output = array('data' => NULL, 'info' => 'Wrong username or password.', 'code' => 20003);
    }
}
exit(json_encode($output));

?>