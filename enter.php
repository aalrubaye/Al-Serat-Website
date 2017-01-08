<? ob_start(); ?>
<?php

include 'connection.php';
	
	$titrvalue= $_POST['titr'];
	$mainvalue= $_POST['main'];
	$partvalue= $_POST['part'];
	if ($partvalue== "nothing")
	{
		echo "please select a part";
	}
	else{
	$query= "INSERT into $partvalue (titr,main,part) VALUES ('$titrvalue','$mainvalue','$partvalue')";

	
	if (!mysql_query($query))
	{
		die('error in insertion');
	}
	else
	
		
	mysql_close();
	header("location: member.php");
	}
?>
<? ob_flush(); ?>