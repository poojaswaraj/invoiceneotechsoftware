<?php 
	
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$id=$_POST['txt_id'];

	$date = $_POST['date'];
	$txt_con_name = $_POST['txt_con_name'];
	$no_labour = $_POST['no_labour'];
	$types = $_POST['types'];
	$other_types = $_POST['other_types'];
	$dt =date('Y-m-d');

	if(empty($other_types)){
		$sql = mysql_query("UPDATE `daily_labour` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`date`='$date',`cont_id`='$txt_con_name',`type_of_work`='$types',`no_labour`='$no_labour',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		
		if($sql==true)
		{
			echo "3";
		}
		else{
			echo "2";
		}
	}
	else{	
			$qu = mysql_query("INSERT INTO `mst_task`(`user_id`, `sub_user_id`, `description`, `record_date`) VALUES ('$user_id','$sub_id','$other_types','$dt')")or die(mysql_error($connection));
			if($qu==true)
			{
				$last_id = mysql_insert_id();

			$sql = mysql_query("UPDATE `daily_labour` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`date`='$date',`cont_id`='$txt_con_name',`type_of_work`='$last_id',`no_labour`='$no_labour',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			
			if($sql==true)
			{
				echo "3";
			}
			else{
				echo "2";
			}
		}
		else{
			echo "2";
		}
	}
?>