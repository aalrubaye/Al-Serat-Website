<? 
$name     = $_POST['name'];
$email    = $_POST['email'];
$comments = $_POST['comments'];
$error_msg = "";
$msg = "";

if($name){
	$msg .= "Name: \t $name \n";
}

if(!$email){
	$error_msg .= "Your email \n";
}
if($email){
	if(!eregi("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\._\-]+\.[a-zA-Z]{2,4}", $email)){
		echo "\n<br>That is not a valid email address.  Please click on browser Back button and try again.\n<br>";
		exit;
	}			
	$msg .= "Email: \t $email \n";
}

if($comments){
	$msg .= "Comments: \t $comments \n";
}
$sender_email="";

if(!isset($name)){
	if($name == ""){
		$sender_name="Contact form";
	}
}else{
	$sender_name=$name;
}
if(!isset($email)){
	if($email == ""){
		$sender_email="rabiei140@gmail.COM";
	}
}else{
	$sender_email=$email;
}
if($error_msg != ""){
	echo "You didn't fill in these required fields:<br>"
	.nl2br($error_msg) .'<br>Please click on browser Back button and try again.';
	exit;
}

$mailheaders  = "MIME-Version: 1.0\r\n";
$mailheaders .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$mailheaders .= "From: $sender_name <$sender_email>\r\n";
$mailheaders .= "Reply-To: $sender_email <$sender_email>\r\n";
@mail("rabiei140@gmail.com","Contact form from your web site.",stripslashes($msg), $mailheaders);

header("Location: http://www.al-serat.com/contactus/thankyou.html");
?>