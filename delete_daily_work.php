<?php 
include "config.php";
	
	$id = $_POST['id'];

	$sql = mysql_query("DELETE FROM daily_works WHERE id='$id'")or die(mysql_error($connection));
	if($sql==true)
	{
		echo "1";
	}
	else{
		echo "2";
	}

 ?>