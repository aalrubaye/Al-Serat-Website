<?php

include "connection.php";

	$su = mysql_query("SELECT * FROM maintable");

	$inc = 1;
	while ($subject=mysql_fetch_assoc($result))
	{
		$mr[$inc++] = $subject['id'];
	}

?>