<?php
$name     = $_POST['name'];
$email    = $_POST['email'];
$email2   = $_POST['email2'];
$comments = $_POST['comments'];



$mail_from = $email;
$mail_to = $email2;
$mail_body = $comments;
$mail_subject = "mail from".$name;
$mail_header = "رسالة من ".$name. "  ".$mail_from." \r\n";

if ($mail_to == "") {
	echo "الرجاء إدخال عنوان البريد الإلكتروني الخاص بصديقك";
}
else {
	

$sendmail = mail($mail_to,$mail_subject,$mail_body,$mail_header);
if ($sendmail == true)
 {
	echo "قد تم إرسال الموضوع إلى صديقك ";
}
else 
{
	echo "خطأ في الإرسال أعد الإرسال مرة أخرى من فضلك!!";
}

}

?>