<? ob_start(); ?>
<style type="text/css">
body {
	margin-top: 0px;
}
.font1 {
	font-size: 16px;
	font-weight: bold;
	color:#036;

}
.font11 {
	font-size: 16px;
	font-weight: bold;
	color:#FFF;
	text-align:center;

}
.font22 {
	font-size: 12px;
	font-style: normal;
	color: #5F6F86;
	line-height:1.5;
	text-align:right;

}
.font2 {
	font-family:Tahoma, Geneva, sans-serif;
	font-size: 13px;
	font-style: normal;
	color:#000;
	line-height:2;
	text-align:justify;
}
.font4 {

	font-size: 13px;
	font-weight:bold;
	color:#033;
	line-height:2;
}
.font3 {
	font-size:16px;
	font-weight:bold;
	background-color:#FFF;
 	text-decoration:none
}

</style>
<table width="380" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
		&nbsp;
  </tr>
    <tr>
	<td width="126"  >&nbsp;</td>
	<td align="center" class="font11" background="pic/titrb.gif" width="128" height="23" valign="middle"> العلاقات والإعلام</td>
   	<td width="126" >&nbsp;</td>
  </tr>

</table>
<?php
echo "<p>&nbsp;</p>";
include 'connection.php';
$space = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";

		$perpage=5;
		$pquery=mysql_query("SELECT count('id') from maintable WHERE part='elam'");
		$pages = Ceil(mysql_result($pquery,0)/$perpage);
		$page= (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start = ($page -1)*$perpage;

		$result = mysql_query("SELECT * FROM maintable WHERE part='elam' ORDER BY id DESC LIMIT $start, $perpage");

	while ($subject=mysql_fetch_assoc($result))
	{
$info = $subject['main'];
$article = $subject['id'];

	$tt = (strlen($info));
	$i = 470;
	$nn= substr($info,0,$i);

	$flag = "false";	

	while ($flag != "true")
	{
		$lc = substr($nn, -1);
		if ($lc != " "){
			$nn = substr($info,0,--$i);
		}
		else
		{
			$nn .= "....";
			$flag = "true";
		}
	}//w

echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="justify" dir="rtl" height="23" class="font1">&nbsp&nbsp&nbsp'.$subject['titr'].'</td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30">&nbsp;</td>
        <td dir="rtl" class="font22"> كتب بتاريخ '.$subject['date'].'</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td align="right" dir="rtl" class="font2">'.$nn.'</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td align="left" class="font4">
		<a href="content.php?article='.$article.'&part=maintable">إقرأ التفاصيل</a>
		</td>
        <td width="30">&nbsp;</td>
      </tr>
	  <tr>
        <td width="30">&nbsp;</td>
        <td></td>
        <td width="30">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"bgcolor="#D0D9E2"></td>
  </tr>
</table>';

echo"<p>&nbsp;</p>";

	}//while	
	
	
		if($pages >1 && $page <= $pages)
		{
			echo "<p class='font3' align='center'>";
			for ($x=1;$x<=$pages;$x++)
			{
			echo ($x == $page) ? '<a href="?page='.$x.'">('.$x.')</a>  ' : '<a href="?page='.$x.'">'.$x.'</a> ';

			}
		}

echo "<p>&nbsp;</p>";
?>
<? ob_flush(); ?>