<?php

if ($_FILES["file"]["type"] != "image/gif") {
    echo "Invalid file";
} else {
    if ($_FILES["file"]["error"] > 0) {
        echo "Error " . $_FILES["file"]["error"] . "<br>";
    } else {
        echo "Upload:" . $_FILES["file"]["name"] . "<br>";
        echo "Type:" . $_FILES["file"]["type"] . "<br>";
        echo "Size:" . $_FILES["file"]["size"] . "<br>";
        echo "Store in:" . $_FILES["file"]["tmp_name"] . "<br>";

        if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " is already exists.";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo $_FILES["file"]["name"] . " store at upload/";
        }
    }
}

?>