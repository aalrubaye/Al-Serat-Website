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
  $dimg = "<img src='pic/del.jpg' width='18' height='18' border='0' />";
  $uimg = "<img src='pic/upd.jpg' width='18' height='18' border='0' />";
}
?>
<style type="text/css">
.font1 {
	font-size: 18px;
	font-style: normal;
	font-weight: bold;
	color: #FFF;

}
.font2 {
	font-size: 15px;
	font-style: normal;
	color: #5F6F86;
	line-height:2;
}
.font22 {
	font-size: 10px;
	font-style: normal;
	color: #5F6F86;
	line-height:2;
}
.font3 {
	background-color:#9C6;
}
</style>

<p> 
<p><h2 align="center" dir="rtl">عرض البيانات</h2></p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<p align="right" dir="rtl">القسم 
  <select name="part">
    <option value="nothing" selected="selected"></option>
    <option value="qoran">أبحاث قرآنية</option>
    <option value="hadith">الحديث</option>
    <option value="aghaed">العقائد</option>
    <option value="fekr">الفكر الإٍسلامي</option>
    <option value="fekrs">الفكر السياسي</option>
    <option value="akhlaq">دراسات أخلاقية</option>
    <option value="sirah">أنوار السيرة</option>
    <option value="hossain">الإمام الحسين</option>
    <option value="olilazm">من وحي أولي العزم</option>
    <option value="dawa">الدعوة والتبليغ</option>
    <option value="adab">الأدب</option>
    <option value="nasaeh">نصائح ووصايا</option>
    <option value="shabab">الشباب</option>
    <option value="maraa">المرأة</option>
    <option value="qosas">قصص وعبر</option>
    <option value="elam">العلاقات والإعلام</option>
    <option value="ask">لكل سؤال جواب</option>
    <option value="hal_talam">هل تعلم؟</option>
    <option value="shohada">شهداء</option>
  </select>
</p>
<p align="right" dir="rtl"><input type="submit" name="submit" value="إذهب للقسم" /></p>
</form>

<?php

	if (isset($_POST['submit']))
	{

 	$table = $_POST['part'];
	echo "<h2 align='center'>".$table."</h2>";
	if ($table=="nothing")
		echo "nothing to show, please select a part";
	else
	{
		$perpage=5;
		$pquery=mysql_query("SELECT count('id') from maintable WHERE part='$table'");
		$pages = Ceil(mysql_result($pquery,0)/$perpage);
		$page= (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start = ($page -1)*$perpage;

		$result = mysql_query("SELECT * FROM maintable WHERE part='$table' ORDER BY id DESC LIMIT $start, $perpage");
	
	while ($subject=mysql_fetch_assoc($result))
	{

		$pp = "<a href=\"modify.php?id=".$subject['id']."&page=".$page."&part=".$subject['part']."\">".$uimg."</a>";
		$dd = "<a href=\"delete.php?id=".$subject['id']."&page=".$page."&part=".$subject['part']."\">".$dimg."</a>";

echo '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="justify" dir="rtl" bgcolor="#5F6F86" height="35" class="font1">&nbsp&nbsp&nbsp'.$subject['titr'].'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#F2F0F3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30">&nbsp;</td>
        <td align="left" dir="rtl" class="font22">كتب بتاريخ '.$subject['date'].'</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td align="right" dir="rtl" class="font2">'.$subject['main'].'</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="30">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#D0D9E2">'.$pp.$space.$dd.'</td>
  </tr>
</table>';



		echo"<p>&nbsp;</p>";

	}//while	
	
	
		if($pages >=1 && $page <= $pages)
		{
			echo "<p class='font3' align='center'>";
			for ($x=1;$x<=$pages;$x++)
			{
			echo ($x == $page) ? '<strong><a href="?page='.$x.'&part='.$table.'">'.$x.'</a></strong> ' : '<a href="?page='.$x.'&part='.$table.'">'.$x.'</a> ';

			}
		}
	
	
	
	}

	}//if


if (isset($_GET['page']) && isset($_GET['part']))
{
		 	$table2 = $_GET['part'];

			
			echo "<h2 align='center'>".$table2."</h2>";
			
			$perpage=5;
			$pquery2=mysql_query("SELECT count('id') from maintable WHERE part='$table2'");
			$pages2 = Ceil(mysql_result($pquery2,0)/$perpage);
			$page2 = $_GET['page'];
			$start2 = ($page2 -1)*$perpage;
					
			$result2 = mysql_query("SELECT * FROM maintable WHERE part='$table2' ORDER BY id DESC LIMIT $start2, $perpage");

			
	
	while ($subject2=mysql_fetch_assoc($result2))
	{
		$pp2 = "<a href=\"modify.php?id=".$subject2['id']."&page=".$page2."&part=".$subject2['part']."\">".$uimg."</a>";
		$dd2 = "<a href=\"delete.php?id=".$subject2['id']."&page=".$page2."&part=".$subject2['part']."\">".$dimg."</a>";
		echo '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="justify" dir="rtl" bgcolor="#5F6F86" height="35" class="font1">&nbsp&nbsp&nbsp'.$subject2['titr'].'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#F2F0F3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30">&nbsp;</td>
        <td align="left" dir="rtl" class="font22">كتب بتاريخ '.$subject2['date'].'</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td align="right" dir="rtl" class="font2">'.$subject2['main'].'</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="30">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#D0D9E2">'.$pp2.$space.$dd2.'</td>
  </tr>
</table>';



		echo"<p>&nbsp;</p>";
	}//while	
	
	
		if($pages2 >=1 && $page2 <= $pages2)
		{
			echo "<p class='font3' align='center'>";
			for ($x=1;$x<=$pages2;$x++)
			{
			echo ($x == $page2) ? '<strong><a href="?page='.$x.'&part='.$table2.'">'.$x.'</a></strong> ' : '<a href="?page='.$x.'&part='.$table2.'">'.$x.'</a> ';

			}
		}

	}

?>

<? ob_flush(); ?>