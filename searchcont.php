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
	<td align="center" class="font11" background="pic/titrb.gif" width="128" height="23" valign="middle"> نتائج البحث</td>
   	<td width="126" >&nbsp;</td>
  </tr>

</table>
<?php
include "connection.php";

$k = $_GET['k'];
$terms = explode(" ", $k);
$query = "SELECT * FROM maintable WHERE ";
$i = 0;
foreach($terms as $each){
	$i++;
	if ($i == 1)
		$query .= "main LIKE '%$each%' ";
	else
		$query .= "OR main LIKE '%$each%' ";
}

	$query = mysql_query($query);
	$numrows = mysql_num_rows($query);
	
	if($numrows > 0){
		
		while ($row = mysql_fetch_assoc($query)) {
			
			$id = $row['id'];
			$titr = $row['titr'];
			$main = $row['main'];
			$part = $row['part'];
			$date = $row['date'];

			

	$tt = (strlen($main));
	$i = 470;
	$nn= substr($main,0,$i);

	$flag = "false";	

	while ($flag != "true")
	{
		$lc = substr($nn, -1);
		if ($lc != " "){
			$nn = substr($main,0,--$i);
		}
		else
		{
			$nn .= "....";
			$flag = "true";
		}
	}//w

			


if ($part == "adab"){
	$pm = "الأدب";
}
elseif ($part == "aghaed"){
	$pm = "العقائد";
}
elseif ($part == "fekr"){
	$pm = "الفكر الإسلامي";
}
elseif ($part == "hadith"){
	$pm = "الحديث";
}
elseif ($part == "hal_talam"){
	$pm = "هل تعلم؟";
}
elseif ($part == "qosas"){
	$pm = "القصص والعبر";
	}
elseif ($part == "qoran"){
	$pm = "بحوث قرآنية";
}
elseif ($part == "fekrs"){
	$pm = "الفكر السياسي";
}
elseif ($part == "akhlaq"){
	$pm = "دروس أخلاقية";
}
elseif ($part == "sirah"){
	$pm = "أنوار السيرة";
}
elseif ($part == "hossain"){
	$pm = "الإمام الحسين";
	}
elseif ($part == "dawa"){
	$pm = "الدعوة والتبليغ";
}
elseif ($part == "nasaeh"){
	$pm = "نصائح ووصايا";
}
elseif ($part == "elam"){
	$pm = "العلاقات والإعلام";
}
elseif ($part == "shabab"){
	$pm = "الشباب";
}
elseif ($part == "maraa"){
	$pm = "المرأة";
}
elseif ($part == "ask"){
	$pm = "لكل سؤال جواب";
}
elseif ($part == "olilazm"){
	$pm = "من وحي أولي العزم";
}
elseif ($part == "shohada"){
	$pm = "شهداء";
}

echo "<p>&nbsp;</p>";			
echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="justify" dir="rtl" height="23" class="font1">&nbsp&nbsp&nbsp'.$titr.'</td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30">&nbsp;</td>
        <td dir="rtl" class="font22"> قسم : ('.$pm.') -  كتب بتاريخ '.$date.'</td>
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
<a href="content.php?article='.$id.'&part=maintable">إقرأ التفاصيل</a>
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
    <td align="center" bgcolor="#D0D9E2"></td>
  </tr>
</table>';

echo"<p>&nbsp;</p>";

		}
		
	}
	else
	{
		echo "<h5>لا توجد نتائج عن  </h5>".$k;
	}
	



?>
<? ob_flush(); ?>