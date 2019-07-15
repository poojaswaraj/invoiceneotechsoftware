<?php 
include "config.php";

$txt_head = $_POST['txt_head'];
$user_id = $_POST['u_id'];

 $sql_query = mysql_query("INSERT INTO `acc_head`(`user_id`,`head_desc`) VALUES ('$user_id','$txt_head')")or die(mysql_error());
	
	if($sql_query)
	{
		echo "1";
	}
	else
	{
		echo "2";
	}


 ?>