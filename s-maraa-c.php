<? ob_start(); ?>
<style type="text/css">
body {
	margin-top: 0px;
	background-image: url(pic/back.jpg);
	
}


</style>

<?php

include 'connection.php';
	$space = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	$result = mysql_query("SELECT * FROM maintable WHERE part='maraa'");
	
	while ($subject=mysql_fetch_array($result))
	{
		echo '<div><a href="content.php?article='.$subject['id'].'&part=maintable">'.$space." - ".$subject['titr'].'</a></div>';
		
	}//while


?>
<? ob_flush(); ?>