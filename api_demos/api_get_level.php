<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/30
 * Time: 下午7:38
 */

include('string_illegal.php');
$string_illegal = new StringIllegal();
error_reporting(0);
function PostParam($param)
{
    return $_POST[$param] ? $_POST[$param] : '';
}

$token = @PostParam('token');

error_log("token " . $token . " get level.\n", 3, "/var/tmp/api.log");

// Illegal value parameter 10017
if (!$string_illegal->isStrLength($token, 31, 33)) {
    $output = array('data' => NULL, 'info' => 'Illegal value parameter.', 'code' => 10017);
    exit(json_encode($output));
}

// get user info from memcache
$mem = new Memcache();
$mem->connect('127.0.0.1', 11211);
$user_info = $mem->get($token);
//error_log("user info is: \n" . json_encode($user_info) . "\n", 3, "/var/tmp/api.log");

// Token expired 20022
if (!$user_info) {
    error_log("Token " . $token . " expired.\n", 3, "/var/tmp/api.log");
    $output = array('data' => NULL, 'info' => 'Token expired.', 'code' => 20022);
    exit(json_encode($output));
}

// response success
$output = array('data' => array("level" => $user_info["Lv"]), 'info' => 'Success', 'code' => 20000);
exit(json_encode($output));

?>

