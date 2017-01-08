<?php
include "connection.php";


	$re = mysql_query("SELECT * FROM maintable");

	$su=mysql_fetch_array($re);
	$num = count($su);
	
	$rnd = rand(1,$num);
	$int = 1;
	$array[$int] = $rnd;
	
	while($found ="true" && $int < 5){
		$rnd = rand(1,$num);
		$found = "false";
		for ($i= 1; $i<=$int; $i++)
		{
			if ($array[$i] == $rnd){
				$found = "true";
			}
		}//for
		if ($found == "false")
		{
			$array[++$int] = $rnd;
			$found = "true";
		}
		
	}//w
	
	
	var_dump($array);
	



?>