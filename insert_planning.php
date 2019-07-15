<?php 
	
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	
	$sel_project = $_POST['sel_project'];
	$stdate = $_POST['start_Date'];
	$eddate = $_POST['end_Date'];
	$types = $_POST['types'];
	$other_types = $_POST['other_types'];
	$total_work_planed = $_POST['total_work_planed'];
	$unit = $_POST['unit'];
	$dt =date('Y-m-d');

	$pro_start_Date = $_POST['pro_start_Date'];
	$pro_end_Date = $_POST['pro_end_Date'];
	$total_work_days = $_POST['total_work_days'];
	$remark = $_POST['remark'];
	
	$start_Date = date('Y-m-d', strtotime($stdate));
	$end_Date = date('Y-m-d', strtotime($eddate));
	


	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		if(empty($other_types))
		{
			$sql = mysql_query("INSERT INTO `tbl_planning`(`user_id`, `sub_user_id`, `pro_id`, `task_id`, `start_date`, `end_date`, `total_work_plan`, `unit`, `record_date`,`pro_st_date`,`pro_ed_date`,`total_work_days`,`remark`) VALUES ('$sub_id','$user_id','$sel_project','$types','$start_Date','$end_Date','$total_work_planed','$unit','$dt','$pro_start_Date','$pro_end_Date','$total_work_days','$remark')")or die(mysql_error($connection));
			
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
			}
		}
		else{	
				$qu = mysql_query("INSERT INTO `mst_task`(`user_id`, `sub_user_id`, `description`, `record_date`) VALUES ('$sub_id','$user_id','$other_types','$dt')")or die(mysql_error($connection));
				if($qu==true)
				{
					$last_id = mysql_insert_id();
					$sql = mysql_query("INSERT INTO `tbl_planning`(`user_id`, `sub_user_id`, `pro_id`, `task_id`, `start_date`, `end_date`, `total_work_plan`, `unit`, `record_date`,`pro_st_date`,`pro_ed_date`,`total_work_days`,`remark`) VALUES ('$sub_id','$user_id','$sel_project','$last_id','$start_Date','$end_Date','$total_work_planed','$unit','$dt','$pro_start_Date','$pro_end_Date','$total_work_days','$remark')")or die(mysql_error($connection));
					
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
	}//end user loop
	else
	{
		if(empty($other_types))
		{
			$sql = mysql_query("INSERT INTO `tbl_planning`(`user_id`, `sub_user_id`, `pro_id`, `task_id`, `start_date`, `end_date`, `total_work_plan`, `unit`, `record_date`,`pro_st_date`,`pro_ed_date`,`total_work_days`,`remark`) VALUES ('$user_id','$sub_id','$sel_project','$types','$start_Date','$end_Date','$total_work_planed','$unit','$dt','$pro_start_Date','$pro_end_Date','$total_work_days','$remark')")or die(mysql_error($connection));
			
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
					$sql = mysql_query("INSERT INTO `tbl_planning`(`user_id`, `sub_user_id`, `pro_id`, `task_id`, `start_date`, `end_date`, `total_work_plan`, `unit`, `record_date`,`pro_st_date`,`pro_ed_date`,`total_work_days`,`remark`) VALUES ('$user_id','$sub_id','$sel_project','$last_id','$start_Date','$end_Date','$total_work_planed','$unit','$dt','$pro_start_Date','$pro_end_Date','$total_work_days','$remark')")or die(mysql_error($connection));
					
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
	}
?>