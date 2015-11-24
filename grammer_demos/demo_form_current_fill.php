<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <style>.error {
            color: #FF0000;
        }

    </style>
</head>
<body>
<?php
$nameErr = $emailErr = $websiteErr = $commentErr = $genderErr = "";
$name = $email = $website = $comment = $gender = "";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = " 请填写您的姓名";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]*$/", $name)) {
            $nameErr = " 只允许字母和空格";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = " 请填写您的电邮";
    } else {
        $email = test_input($_POST["email"]);
        if (!preg_match("/^([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $emailErr = " 邮箱格式不正确";
        }
    }

    if (empty($_POST["website"])) {
        // website no check
    } else {
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|[-a-z0-9+&@#\/%?=~_|!:,.;]*\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%
=~_|]/i", $website)
        ) {
            $websiteErr = " 无效的网址";
        }
    }

    if (empty($_POST["comment"])) {
        // comment no check
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = " 请选择您的性别";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}
?>

<h2>PHP验证实例</h2>

<span class="error">* 为必填的字段</span><br><br>

<form method="post" action="/php_demos/grammer_demos/demo_form_current_fill.php">
    姓名：<input type="text" name="name" value="<?php echo $name ?>">
    <span class="error">*<?php echo $nameErr; ?></span>
    <br><br>
    电邮：<input type="text" name="email" value="<?php echo $email ?>">
    <span class="error">*<?php echo $emailErr; ?></span>
    <br><br>
    网址：<input type="text" name="website" value="<?php echo $website ?>">
    <span class="error"><?php echo $websiteErr; ?></span>
    <br><br>
    评论：<textarea name="comment" rows="5" cols="40"><?php echo $comment ?></textarea>
    <br><br>
    性别：
    <input type="radio" name="gender"
           value="female" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>>女性
    <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>>男性
    <span class="error">*<?php echo $genderErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="提交">
    <br><br>
</form>

<h2>您的输入：</h2><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($name) {
        echo "您的名字：" . $name . "<br><br>";
    }
    if ($email) {
        echo "您的邮箱：" . $email . "<br><br>";
    }
    if ($website) {
        echo "您的网站：" . $website . "<br><br>";
    }
    if ($comment) {
        echo "您的评论：" . $comment . "<br><br>";
    }
    if ($gender) {
        if ($gender == "female") {
            echo "您的性别：女性<br><br>";
        } elseif ($gender == "male") {
            echo "您的性别：男性<br><br>";
        }
    }
}
?>
<br><br>
</body>
</html>