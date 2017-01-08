<? ob_start(); ?>
<?php

@session_start();

if ($_SESSION['username'])
{


	echo "<div align='center' dir='rtl' style='background-color:#ECECEC' style='font-size: 14px'>";
	echo "<a href='logout.php'> تسجيل الخروج </a>";
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";	
	echo "<a href='insert.php'>إدخال بيانات</a>";
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	echo "<a href='retrive.php'>عرض البيانات</a>";
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	echo "<a href='comretrive.php'>التعليقات</a>";
	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	echo "<a href='allcomment.php'>عرض كل التعليقات</a>";
	echo "</div>";
	echo "<p>";
	echo "تم تسجيل دخولك بنجاح";
		
}

else
	header("location: login.html");

?> 
<? ob_flush(); ?>