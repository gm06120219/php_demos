<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/26
 * Time: 下午3:47
 */

error_reporting(0);

session_start();

if (isset($_SESSION["views"])) {
    $_SESSION["views"]++;
} else {
    $_SESSION["views"] = 1;
}

echo "Preview " . $_SESSION["views"];

unset($_SESSION['views']);
echo "Preview " . $_SESSION["views"];

session_destroy();
echo "Preview " . $_SESSION["views"];

?>

