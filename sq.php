<?php
$name     = $_POST['name'];
$comments = $_POST['comments'];


$mail_from = "سؤال من زوار الموقع ";
$mail_to = "alserat.com@gmail.com";
$mail_body = $comments;
$mail_subject = "mail from".$name;
$mail_header = "رسالة من ".$name. "  ".$mail_from." \r\n";


$sendmail = mail($mail_to,$mail_subject,$mail_body,$mail_header);
if ($sendmail == true)
 {
	echo "شكراً لك على أرسال السؤال، سنجاوب على سؤالك عن قريب في قسم (لكل سؤال جواب) ت ";
}
else 
{
	echo "خطأ في الإرسال أعد الإرسال مرة أخرى من فضلك!!";
}



?>