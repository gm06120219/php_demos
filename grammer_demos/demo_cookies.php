<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/26
 * Time: 下午3:17
 */

//<?php
//setcookie("user", "Alex Porter", time() + 3600);
setcookie("user", "Alex Porter", time()-3600);
?>

<html>
<body>
<?php

if (isset($_COOKIE["user"])) {
    // Print a cookie
    echo $_COOKIE["user"];

    // A way to view all cookies
    print_r($_COOKIE);
} else {
    echo "No cookies user.";
}

?>
</body>
</html>