<?php 
	include "config.php";

	$id=$_POST['id'];

	$sql = mysql_query("DELETE FROM project_team WHERE id='$id'")or die($connection);

	if($sql==true)
	{
		echo "1";
	}
	else{
		echo "2";
	}

 ?>