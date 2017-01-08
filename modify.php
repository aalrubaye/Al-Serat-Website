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
  echo "<a href='$url'>back</a>";
  echo $space;
  echo "<a href='logout.php'> Logout </a>";
  echo "<p><p><p><p><p><p><p>";

}

	if (isset($_POST['submit']))
	{
		$u= "UPDATE maintable SET titr='$_POST[titr]', main='$_POST[main]' WHERE id=$_POST[id]";
		mysql_query($u) or die (mysql_error());

		header("location: retrive.php?part=".$_POST['part']."&page=".$_POST['page']);
		;
	}

if(!isset($_POST['submit']))
{
	$tablename = $_GET['part'];
	$q = "SELECT * FROM maintable WHERE id=$_GET[id]";
	$result = mysql_query($q);
	$sub = mysql_fetch_array($result);
}

?>


<p> 
<h2 align="center" lang="ar">تعديل موضوع</h2>
<p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<p align="right" dir="rtl">العنوان<input type="text" name="titr" value="<?php echo $sub['titr']; ?>"/> 
</p>
<p align="right" dir="rtl"> <textarea name="main" cols="75" rows="20"><?php echo $sub['main']; ?></textarea>
</p>
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="page" value="<?php echo $_GET['page']; ?>" />
<input type="hidden" name="part" value="<?php echo $_GET['part']; ?>" />
<p align="right" dir="rtl"><input type="submit" name="submit" value="تعديل النص" /></p>
</form>

<? ob_flush(); ?>