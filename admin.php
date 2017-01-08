<? ob_start(); ?>
<style type="text/css">
body {
	background-color: #CFC;
}
</style>
<?php

@session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username&&$password)
{
	
	$connect = mysql_connect("localhost","root","") or die ("Couldnt connet to data base");
	mysql_select_db("login") or die ("couldnt find database");
	
	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	$numrows = mysql_num_rows($query);
	
	if ($numrows != 0){
		
		while($row = mysql_fetch_assoc($query))
			{
				
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				
			}
			
		if($username==$dbusername&&$password==$dbpassword)
		{
			$_SESSION['username'] = $dbusername;
			header("location: member.php");

		}
		else
			echo "incorrect password";
	
		
	}
		else
		die ("this username does not exist");
	
	
}
else
die ("Please enter a username and password");

?>
<? ob_flush(); ?>