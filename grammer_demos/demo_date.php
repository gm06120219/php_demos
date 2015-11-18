<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>

版权所有 2008-<?php ini_set('date.timezone', 'Asia/Shanghai');
echo date("Y") . "<br><br>"; ?>

<?php
echo "今天是" . date("Y-m-d H:i:s") . "<br><br>";

$d = mktime(20, 47, 33, 10, 13, 2015);
echo "创建日期是:" . date("Y-m-d H:i:s", $d) . "<br><br>";

$s = strtotime("22:38:30 Oct 13 2015");
echo "转换日期是：" . date("Y-m-d H:i:s", $s) . "<br><br>";


?>

</body>
</html>