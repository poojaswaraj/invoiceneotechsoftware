<?php 
	
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id=$_POST['txt_id'];
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

		if(empty($other_types)){
			$sql = mysql_query("UPDATE `tbl_planning` SET  `user_id`='$sub_id',`sub_user_id`='$user_id',`pro_id`='$sel_project',`task_id`='$types',`start_date`='$start_Date',`end_date`='$end_Date',`total_work_plan`='$total_work_planed',`unit`='$unit',`update_date`='$dt',`pro_st_date`='$pro_start_Date',`pro_ed_date`='$pro_end_Date',`total_work_days`='$total_work_days',`remark`='$remark' WHERE `id`='$id'")or die(mysql_error($connection));
			
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

				$sql = mysql_query("UPDATE `tbl_planning` SET  `user_id`='$sub_id',`sub_user_id`='$user_id',`pro_id`='$sel_project',`task_id`='$last_id',`start_date`='$start_Date',`end_date`='$end_Date',`total_work_plan`='$total_work_planed',`unit`='$unit',`update_date`='$dt',`pro_st_date`='$pro_start_Date',`pro_ed_date`='$pro_end_Date',`total_work_days`='$total_work_days',`remark`='$remark'  WHERE `id`='$id'")or die(mysql_error($connection));
				
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
	}//user loop end
	else{
		if(empty($other_types)){
			$sql = mysql_query("UPDATE `tbl_planning` SET  `user_id`='$user_id',`sub_user_id`='$sub_id',`pro_id`='$sel_project',`task_id`='$types',`start_date`='$start_Date',`end_date`='$end_Date',`total_work_plan`='$total_work_planed',`unit`='$unit',`update_date`='$dt',`pro_st_date`='$pro_start_Date',`pro_ed_date`='$pro_end_Date',`total_work_days`='$total_work_days',`remark`='$remark'  WHERE `id`='$id'")or die(mysql_error($connection));
			
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

				$sql = mysql_query("UPDATE `tbl_planning` SET  `user_id`='$user_id',`sub_user_id`='$sub_id',`pro_id`='$sel_project',`task_id`='$last_id',`start_date`='$start_Date',`end_date`='$end_Date',`total_work_plan`='$total_work_planed',`unit`='$unit',`update_date`='$dt',`pro_st_date`='$pro_start_Date',`pro_ed_date`='$pro_end_Date',`total_work_days`='$total_work_days',`remark`='$remark'  WHERE `id`='$id'")or die(mysql_error($connection));
				
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
	}
?>