
<?php
include "connection.php";



	$re = mysql_query("SELECT * FROM maintable ORDER BY id");

	$su=mysql_fetch_array($re);
	$num = count($su)-1;
	
	
	srand(time());
	$rnd = rand(1,$num);
	$int = 1;
	$array[$int] = $rnd;
	
	while($found ="true" && $int < 7){
		srand(time());
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
	

	$inc = 1;
	while ($sub=mysql_fetch_assoc($re))
	{
		$mr[$inc++] = $sub['id'];
	}
	shuffle($mr);
	
	for ($i = 1; $i <$int ; $i++)
	{
	$kk = $mr[$array[$i]];	
	$rn = mysql_fetch_assoc(mysql_query("SELECT * FROM maintable WHERE id = '$kk'"));	

		echo '<img src="pic/pretex.gif" width="13" height="12" alt="e"/>  <a class="y" href="content.php?article='.$rn['id'].'&part=maintable">'.$rn['titr']."</a><br><br>";

	}

?>