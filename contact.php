<?php
$name     = $_POST['name'];
$email    = $_POST['email'];
$comments = $_POST['comments'];



$mail_from = $email;
$mail_to = "alserat.com@gmail.com";
$mail_body = $comments;
$mail_subject = "mail from".$name;
$mail_header = "From ".$name. "  ".$mail_from." \r\n";

$sendmail = mail($mail_to,$mail_subject,$mail_body,$mail_header);
if ($sendmail == true)
 {
header("Location: http://www.al-serat.com/thank.php");
}
else 
{
	echo "خطأ في الإرسال أعد الإرسال مرة أخرى من فضلك!!";
}



?>