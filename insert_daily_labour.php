<?php 
	
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

	$date = $_POST['date'];
	$txt_con_name = $_POST['txt_con_name'];
	$no_labour = $_POST['no_labour'];
	$types = $_POST['types'];
	$other_types = $_POST['other_types'];
	$dt =date('Y-m-d');

	if(empty($other_types)){
		$sql = mysql_query("INSERT INTO `daily_labour`(`user_id`, `sub_user_id`, `date`, `cont_id`, `type_of_work`, `no_labour`, `record_date`) VALUES ('$user_id','$sub_id','$date','$txt_con_name','$types','$no_labour','$dt')")or die(mysql_error($connection));
		
		if($sql==true)
		{
			echo "1";
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

			$sql = mysql_query("INSERT INTO `daily_labour`(`user_id`, `sub_user_id`, `date`, `cont_id`, `type_of_work`, `no_labour`, `record_date`) VALUES ('$user_id','$sub_id','$date','$txt_con_name','$last_id','$no_labour','$dt')")or die(mysql_error($connection));
			
			if($sql==true)
			{
				echo "1";
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