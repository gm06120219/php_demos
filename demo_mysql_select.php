<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/11/16
 * Time: 上午10:13
 */

//error_reporting(0);

//$con = mysql_connect("127.0.0.1:3306", "root", "");
$con = mysqli_connect("127.0.0.1", "root", "", "php_db", "3306");
if (mysqli_connect_error($con)) {
    die("Can not connect mysql" . mysqli_error());
}

//mysql_select_db("php_db", $con);
$sql = "SELECT * FROM t_person";

//$content = mysql_query($sql);
$content = mysqli_query($con, $sql);


echo "<table  style='width:200px;'
<tr>
<th>FirstName</th>
<th>LastName</th>
</tr>>
";


//while ($row = mysql_fetch_array($content)) {
while ($row = mysqli_fetch_array($content)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<tr>";
}

echo "</table>";

mysqli_close($con);

?>