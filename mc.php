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
	font-size: 14px;
	font-weight: bold;
	color:#F30;
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
}
.font4 {

	font-size: 13px;
	font-weight:bold;
	color:#033;
	line-height:2;
}
.font3 {
	font-size:16px;
	background-color:#E7D3C8;
}

</style>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="font11"></td>
  </tr>
    <tr>
	<td><br /><br/></td>
  </tr>
</table>
<?php

include 'connection.php';
$space = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";

		$perpage=20;
		$pquery=mysql_query("SELECT count('id') from maintable");
		$pages = Ceil(mysql_result($pquery,0)/$perpage);
		$page= 1;
		$start = ($page -1)*$perpage;

		$result = mysql_query("SELECT * FROM maintable ORDER BY id DESC LIMIT $start, $perpage");

	while ($subject=mysql_fetch_assoc($result))
	{

if ($subject['part'] == "adab"){
	$pm = "الأدب";
}
elseif ($subject['part'] == "aghaed"){
	$pm = "العقائد";
}
elseif ($subject['part'] == "elam"){
	$pm = "العلاقات والإعلام";
}
elseif ($subject['part'] == "fekr"){
	$pm = "الفكر الإسلامي";
}
elseif ($subject['part'] == "hadith"){
	$pm = "الحديث";
}
elseif ($subject['part'] == "hal_talam"){
	$pm = "هل تعلم؟";
}
elseif ($subject['part'] == "qosas"){
	$pm = "القصص والعبر";
	}
elseif ($subject['part'] == "qoran"){
	$pm = "بحوث قرآنية";
	}
elseif ($subject['part'] == "akhlaq"){
	$pm = "دروس أخلاقية";
	}

elseif ($subject['part'] == "hossain"){
	$pm = "الإمام الحسين";
	}
	elseif ($subject['part'] == "nasaeh"){
	$pm = "نصائح ووصايا";
	}
	elseif ($subject['part'] == "fekrs"){
	$pm = "الفكر السياسي";
	}
	elseif ($subject['part'] == "sirah"){
	$pm = "أنوار السيرة";
	}
	elseif ($subject['part'] == "dawa"){
	$pm = "الدعوة والتبليغ";
	}
	elseif ($subject['part'] == "shabab"){
	$pm = "الشباب";
	}
	elseif ($subject['part'] == "maraa"){
	$pm = "المرأة";
	}
	elseif ($subject['part'] == "ask"){
	$pm = "لكل سؤال جواب";
	}
	elseif ($subject['part'] == "olilazm"){
	$pm = "من وحي أولي العزم";
	}	
	elseif ($subject['part'] == "shohada"){
	$pm = "شهداء";
	}	

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
    <td align="justify" dir="rtl" height="23" class="font1">&nbsp&nbsp&nbsp'.$subject['titr'].$lc.'</td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30">&nbsp;</td>
        <td dir="rtl" class="font22"> قسم : ('.$pm.') -  كتب بتاريخ '.$subject['date'].'</td>
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
	

?>
<? ob_flush(); ?>