<?php 
include "config.php";

$user_id=$_POST['user_id3'];
$inv_print = $_POST['inv_print'];

	$sql = mysql_query("UPDATE `company` SET `print_temp`='$inv_print' WHERE user_id='$user_id'")or die(mysql_error($connection));
		if($sql==true)
		 	{
		 		echo"1";
		 	}
			else
			{
			    echo"2".mysql_error($connection);
			}
	
 ?>