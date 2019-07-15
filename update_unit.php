<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id=$_POST['txt_id'];
    $unit = $_POST['txt_unit'];
	$dt=date('Y-m-d');
	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{

		$sql = mysql_query("UPDATE `mst_unit` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`unit`='$unit',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}
	else{
		$sql = mysql_query("UPDATE `mst_unit` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`unit`='$unit',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "3";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}
?>