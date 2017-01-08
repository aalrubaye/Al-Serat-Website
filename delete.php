<? ob_start(); ?>
<?php
include 'connection.php';
$space = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
@session_start();

if (!$_SESSION['username'])
header("location: login.html");
else
{
	$tablename = $_GET['part'];
	$page= $_GET['page'];
	$d = "DELETE FROM maintable WHERE id='$_GET[id]'";
	mysql_query($d);
	mysql_query($dm);
	header("location: retrive.php?page=".$page."&part=".$tablename);
}

?>
<? ob_flush(); ?>