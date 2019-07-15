<?php 
	include "config.php";
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id = $_POST['txt_id'];
	$pro_name = $_POST['pro_name'];
	$sel_emp = $_POST['sel_emp'];
	$role = $_POST['role'];
	$start_dt = $_POST['start_dt'];
	$end_dt = $_POST['end_dt'];
	$dt=date('Y-m-d');

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{

		if($end_dt>=$start_dt)
		{
			$sql = mysql_query("UPDATE `project_team` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`emp_id`='$sel_emp',`pro_id`='$pro_name',`job_title`='$role',`start_date`='$start_dt',`end_date`='$end_dt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));

				if ($sql==true) {
					echo "1";
				}
				else{
					echo "2";
				}

		}
		else{
			echo "4";
		}
	}//end user loop
	else{
		if($end_dt>=$start_dt)
		{
			$sql = mysql_query("UPDATE `project_team` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`emp_id`='$sel_emp',`pro_id`='$pro_name',`job_title`='$role',`start_date`='$start_dt',`end_date`='$end_dt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));

				if ($sql==true) {
					echo "3";
				}
				else{
					echo "2";
				}
		}
		else{
			echo "4";
		}
	}
 ?>