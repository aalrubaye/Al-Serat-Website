<? ob_start(); ?>
<?php
include 'connection.php';
@session_start();

if (isset($_GET['status']))
{

	echo "added to main table successfully";
}

if ($_SESSION['username'])
{

echo "<div align='center' dir='rtl' style='background-color:#ECECEC' style='font-size: 14px'>";
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>للخلف</a>";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "<a href='logout.php'> تسجيل الخروج</a>";
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo "<a href='retrive.php'> عرض البيانات </a>";
  echo "</div>";
  echo "<p><p>";
  echo "<h2 align='center'>إضافة إلى الجدول</h2>";

}

else
	header("location: login.html");

?>

<p> 
<p><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<p align="right" dir="rtl">العنوان<input type="text" name="titr"/> 
</p>
<p align="right" dir="rtl">القسم 
  <select name="part">
    <option value="nothing" selected="selected"></option>
    <option value="qoran">بحوث قرآنية</option>
    <option value="hadith">الحديث</option>
    <option value="aghaed">العقائد</option>
    <option value="fekr">الفكر الإسلامي</option>
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
<p align="right" dir="rtl">
<?php 


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
  
  $NowDate = $MDay_Name." - ".($HDays-1)." / ".$thismonth." / ".$HYear." هـ";
  
?>
<p align="right" > <textarea name="main" cols="75" rows="20" dir="rtl"></textarea></p>
</p><input type="hidden"  />
<p align="right" dir="rtl"><input type="submit" name="submit" value="إدخال النص" /></p>
</form>

<?php
	if (isset($_POST['submit']))
	{
	$titrvalue= $_POST['titr'];
	$mainvalue= $_POST['main'];
	$partvalue= $_POST['part'];
	if ($partvalue== "nothing")
	{
		echo "please select a part";
	}
	else{
	$query= "INSERT into maintable (titr,main,part,date) VALUES ('$titrvalue','$mainvalue','$partvalue','$NowDate')";

	if (!mysql_query($query))
	{
		die(mysql_error());
	}
	else
		
	mysql_close();
	header("location: insert.php?status=added");
	
	
	}

	}
?>
<? ob_flush(); ?>