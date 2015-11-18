<?php
/**
 * Created by PhpStorm.
 * User: liguangming
 * Date: 15/10/26
 * Time: 下午3:56
 */

//$to = "gm06120219@aliyun.com";
//$from = "gm06120219@163.com";
//$subject = "Test mail";
//$message = "This is a test mail for test php send mail";
//$headers = "From:$from";
//mail($to, $subject, $message, $headers);
//echo "Mail sent.";

if (isset($_REQUEST['email'])) //if "email" is filled out, send email
{
    //send email
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    mail("gm06120219@aliyun.com", "Subject: $subject",
        $message, "From: $email");
    echo "Thank you for using our mail form";
} else //if "email" is not filled out, display the form
{
    echo "<form method='post' action='demo_send_mail.php'>
  Email: <input name='email' type='text' /><br />
  Subject: <input name='subject' type='text' /><br />
  Message:<br />
  <textarea name='message' rows='15' cols='40'>
  </textarea><br />
  <input type='submit' />
  </form>";
}

?>

