<?php
include "config.php";

$id=$_POST['id'];

	$sql = mysql_query("DELETE FROM tax where id='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}

?>