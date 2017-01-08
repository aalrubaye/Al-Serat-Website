<? ob_start(); ?>
<?php
include 'connection.php';

$space = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";

@session_start();

if (!$_SESSION['username'])
   
   header("location: login.html");

else
{
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<div align='center' dir='rtl' style='background-color:#ECECEC' style='font-size: 14px'>";  
  echo "<a href='$url'>للخلف</a>";
  echo $space;
  echo "<a href='logout.php'> تسجيل الخروج </a>";
  echo $space;
  echo "<a href='insert.php'> إدخال البيانات </a>";
  echo "</div>";
  echo "<p><p><p><p>";

}

	$rr = mysql_query("SELECT * FROM comment");

	
while ($subject=mysql_fetch_array($rr))
	{
		
		echo '<div>'.$subject['com'].' / '.$subject['id'].' / '.$space.$subject['part'].' --> '.$subject['titr'].'</div>';
		
	}//while

		
?>

<? ob_flush(); ?>
