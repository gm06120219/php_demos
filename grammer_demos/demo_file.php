<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/14
 * Time: 上午9:57
 */

//echo readfile("./demo_file.txt");
error_reporting(0);
$file_handle = fopen("demo_file.txt", "r") or die("Unable to open file!");
//echo fread($file_handle, filesize("demo_file.txt"));

while (!feof($file_handle)) {
    echo fgets($file_handle) . "<br>";
}

fclose($file_handle);

$new_file_handle = fopen("new_demo_file.txt", "w") or die("Cannot write file in line $__LINE__.");
$txt = "write this words in new file. you can see this in the new file.\n";
fwrite($new_file_handle, $txt);
fclose($new_file_handle);

if (file_exists("new_demo_file.txt")) {
    echo "File created successfully. Now, delete the file." . "<br>";
    unlink("new_demo_file.txt");
} else {
    echo "Failed to create file.";
}

?>