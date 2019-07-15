<?php 
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$pro_name = $_POST['pro_name'];
	$sel_emp = $_POST['sel_emp'];
	$role =$_POST['role'];
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
			$sql = mysql_query("INSERT INTO `project_team`(`user_id`, `sub_user_id`, `emp_id`, `pro_id`, `job_title`, `start_date`, `end_date`, `record_date`) VALUES ('$sub_id','$user_id','$sel_emp','$pro_name','$role','$start_dt','$end_dt','$dt')")or die(mysql_error($connection));

				if ($sql==true) {
					echo "1";
				}
				else{
					echo "2";
				}
		}
		else{
			echo "3";
		}
	}//end user loop
	else{
		if($end_dt>=$start_dt)
		{
			$sql = mysql_query("INSERT INTO `project_team`(`user_id`, `sub_user_id`, `emp_id`, `pro_id`, `job_title`, `start_date`, `end_date`, `record_date`) VALUES ('$user_id','$sub_id','$sel_emp','$pro_name','$role','$start_dt','$end_dt','$dt')")or die(mysql_error($connection));

				if ($sql==true) {
					echo "1";
				}
				else{
					echo "2";
				}
		}
		else{
			echo "3";
		}
	}

 ?>