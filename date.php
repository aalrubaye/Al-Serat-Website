<? ob_start(); ?>
<style type="text/css">
body,td,th {
	font-size: 10px;
}
.ff3{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:10;
	color:#331A00;
}
</style>
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
  
   echo '<div class="ff3">'.$NowDate.'</div>';
?>
<? ob_flush(); ?>