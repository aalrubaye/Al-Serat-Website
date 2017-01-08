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

		if (isset($_GET['no']))
		{
			$no= $_GET['no'];
			if ($no== "")
			{
				echo "ادخل الرقم";
			}
			else{
							
			$query= "DELETE FROM comment WHERE id=$no";

			if (mysql_query($query))
			{	
				echo $no." تم حذف التعليق رقم";
			}
			else
			{
				echo "هذا ليس رقم، حاول إدخال الرقم الصحيح";
			}

		
		}
	}
		
?>


		<form action="" method="get">
		<label> Comment Number</label><br />
        <input type="text" name="no" size="41"/><br /><br />
		<input type="submit" name="submit" value="delete"/>
        </form>
<? ob_flush(); ?>
