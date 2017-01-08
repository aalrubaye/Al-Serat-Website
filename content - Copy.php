<? ob_start(); ?>

<script language="javascript">

function printpage()
 {
  window.print();
 }

function fbs_click() 
{
	u=location.href;
	t=document.title;
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
}

</script>

<style type="text/css">
.font1 {
	font-size: 21px;
	font-style: normal;
	font-weight: bold;
	color:#06C;

}
.font13 {
	font-size: 15px;
	font-weight: bold;
	color:#000;

}
.font14 {
	font-size: 11px;
	color:#999;

}
.font15 {
	font-size: 15px;
	color:#000;
}
.font2 {
	font-size: 13px;
	font-style: normal;
	font-weight:bold;
	color:#900;

}
.font3 {
	font-size: 17px;
	font-style: normal;
	font-weight: bold;
	color:#303;
	line-height:2.25;
	text-align:justify;
	
}

.font33 {
	font-size: 11px;
	color:#FFF;	
}

body {
	background-image: url(pic/back.jpg);
	margin-top: 0px;
	margin-bottom: 0px;
}
.mm {
	cursor:hand;
}
</style>
<?php
include 'connection.php';

$id = $_GET['article'];
$table = $_GET['part'];
$query = "SELECT * FROM maintable WHERE id = $id";
$result = mysql_query($query);
$subject = mysql_fetch_assoc($result);
$jj = $subject['part'];
$kk = $subject['titr'];

  $time = mktime(0, 0, 0, Date('m'), Date('j'), Date('Y'));
  $TDays=round($time/(60*60*24));  
  $HYear=round($TDays/354.37419);  
  $Remain=$TDays-($HYear*354.37419);  
  $HMonths=round($Remain/29.531182);  
  $HDays=$Remain-($HMonths*29.531182);  
  $HYear=$HYear+1389;  
  $HMonths=$HMonths+10;$HDays=$HDays+23;  
  if ($HDays>29.531188 and round($HDays)!=30){  
        $HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);  
  }else{  
        $HDays=Round($HDays);  
  }  
  if ($HMonths>12) {  
        $HMonths=$HMonths-12;  
        $HYear = $HYear+1;  
  } 
  $NowDay=$HDays;
  $NowMonth=$HMonths;
  $NowYear=$HYear;
  $MDay_Num = date("w");
  if ($MDay_Num=="0"){
        $MDay_Name = "الأحد";
  }elseif ($MDay_Num=="1"){
        $MDay_Name = "الإثنين";
  }elseif ($MDay_Num=="2"){
        $MDay_Name = "الثلاثاء";
  }elseif ($MDay_Num=="3"){
        $MDay_Name = "الأربعاء";
  }elseif ($MDay_Num=="4"){
        $MDay_Name = "الخميس";
  }elseif ($MDay_Num=="5"){
        $MDay_Name = "الجمعة";
  }elseif ($MDay_Num=="6"){
        $MDay_Name = "السبت";
  }
  $NowDayName = $MDay_Name;
  
  
  if ($HMonths=="1"){
        $thismonth = "محرم";
  }elseif ($HMonths=="2"){
        $thismonth = "صفر";
  }elseif ($HMonths=="3"){
        $thismonth = "ربيع الأول";
  }elseif ($HMonths=="4"){
        $thismonth = "ربيع الثاني";
  }elseif ($HMonths=="5"){
        $thismonth = "جمادي الأول";
  }elseif ($HMonths=="6"){
        $thismonth = "جمادي الثاني";
  }elseif ($HMonths=="7"){
        $thismonth = "رجب";
  }elseif ($HMonths=="8"){
	  	$thismonth = "شعبان";
  }elseif ($HMonths=="9"){
	  	$thismonth = "رمضان";
  }elseif ($HMonths=="10"){
	  	$thismonth = "شوال";
  }elseif ($HMonths=="11"){
	  	$thismonth = "ذي القعدة";
  }elseif ($HMonths=="12"){
	  	$thismonth = "ذي الحجة";
  }
  
  $NowDate = $MDay_Name." - ".$HDays." / ".$thismonth." / ".$HYear." هـ";

?>
<title><?php echo "موقع الصراط ... الموضوع :  ".$subject['titr']; ?></title>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl" bgcolor="#F7F7F7">
  <tr>
    <td colspan="3" align="center" background="pic/tb.png">&nbsp;</td>
  </tr>
    <tr>
    <td width="50">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="50">&nbsp;</td>
  </tr>
  <tr>
    <td width="50">&nbsp;</td>
    <td align="left" >&nbsp;&nbsp;<a href="index.php"><img src="pic/home.png" width="14" border="0" height="14" alt="الصفحة الرئيسية" /></a>&nbsp;&nbsp;<img src="pic/tell.png" class="mm" width="16" height="11" alt="أرسل الموضوع إلى صديق" onclick="window.open('sendtofriend.php?article=<?php echo $subject['id']; ?>','bib','status=0, toolbar=0, width=650, height=500')" />&nbsp;&nbsp;<a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" onclick="return fbs_click()" target="_blank"><img src="pic/fcb.png" width="14" border="0" height="14" alt="مشاركة الموضوع في الفيسبوك"></a>&nbsp;&nbsp;<img src="pic/print.png" width="16" height="14" alt="طباعة" class="mm" onclick="printpage()" /></td>
    <td width="50">&nbsp;</td>
  </tr>
    <tr>
    <td width="50">&nbsp;</td>
    <td align="center" class="font1"><?php echo $subject['titr']; ?></td>
    <td width="50">&nbsp;</td>
  </tr>
  <tr>
    <td width="50">&nbsp;</td>
    <td align="left"></td>
    <td width="50">&nbsp;</td>
  </tr>
  <tr>
    <td width="50">&nbsp;</td>
    <td align="right" dir="rtl" class="font2">كتب بتاريخ : <?php echo $subject['date'];?></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td dir="rtl" align="justify" class="font3"><?php echo $subject['main']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td></td>
    <td><?php 
	
		if (isset($_POST['submit']))
		{
			$nv= $_POST['name'];
			$cv= $_POST['com'];
			if ($cv== "")
			{
				echo "عذراً ، لا يوجد تعليق";
			}
			else{
				$flage = true;
				$yy = mysql_query("SELECT * FROM comment WHERE sn='$id'");
				while ($sb=mysql_fetch_array($yy))
					{
						if ($sb['com'] == $cv)
							$flage = false;
					}

				
			if ($flage)
			{
			$query= "INSERT into comment (name,com,date,sn,part,titr) VALUES ('$nv','$cv','$NowDate','$id','$jj','$kk')";

			if (!mysql_query($query))
				{
				die(mysql_error());
				}
		}
			}
		

		}
			
	 ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>
	<?php
		$qu = "SELECT * FROM comment WHERE sn='$id'";
		$res = mysql_query($qu);

		while ($sub=mysql_fetch_array($res))
			{


echo '<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="justify" dir="rtl" bgcolor="#FFFFFF" height="35" class="font13">&nbsp&nbsp&nbsp'.$sub['name'].'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="30">&nbsp;</td>
        <td align="right" dir="rtl" class="font14">'.$sub['date'].'</td>
        <td width="30"></td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td align="right" dir="rtl" class="font15">'.$sub['com'].'</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td width="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="30" class="font33">'.$sub['id'].'</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
    <tr>
    <td><hr></td>
  </tr>
</table>';





	}//while	
			

	?></td>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
    <td>
      <p>
		<form name="ff" action="" method="post">
		<label class="font3"> الإسم </label><br />
        <input type="text" name="name" size="41" dir="rtl"/><br /><br />
		<label class="font3"> التعليق </label><br />
        <textarea name="com" cols="33" rows="10" dir="rtl"></textarea><br /><br />
		<input type="submit" name="submit" value="أدخل التعليق"/>
        </form>
    </p></td>
    <td></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><?php include"footer.php"; ?></td>
  </tr>
</table>
<? ob_flush(); ?>