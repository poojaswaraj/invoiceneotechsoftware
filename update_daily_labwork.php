<?php 
	
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id=$_POST['txt_id'];
	$txtDate = $_POST['txtDate'];
	$pro_name = $_POST['pro_name'];
	$contractor = $_POST['contractor'];
	$num_labour = $_POST['num_labour'];
	$num_unskill_labour = $_POST['num_unskill_labour'];
	$types = $_POST['types'];
	$other_types = $_POST['other_types'];
	$work_volume = $_POST['work_volume'];
	$unit = $_POST['unit'];
	$value = $_POST['value'];
	$dt =date('Y-m-d');

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{

		if(empty($other_types)){
			$sql = mysql_query("UPDATE `daily_works` SET  `user_id`='$sub_id',`sub_user_id`='$user_id',`date`='$txtDate',`pro_id`='$pro_name',`cont_id`='$contractor',`work_type`='$types',`volume_of_work`='$work_volume',`no_skill_labour`='$num_labour', `no_unskill_labour`='$num_unskill_labour',`unit_id`='$unit',`value`='$value',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			
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

				$sql = mysql_query("UPDATE `daily_works` SET  `user_id`='$sub_id',`sub_user_id`='$user_id',`date`='$txtDate',`pro_id`='$pro_name',`cont_id`='$contractor',`work_type`='$last_id',`volume_of_work`='$work_volume',`no_skill_labour`='$num_labour', `no_unskill_labour`='$num_unskill_labour',`unit_id`='$unit',`value`='$value',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
				
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
			$sql = mysql_query("UPDATE `daily_works` SET  `user_id`='$user_id',`sub_user_id`='$sub_id',`date`='$txtDate',`pro_id`='$pro_name',`cont_id`='$contractor',`work_type`='$types',`volume_of_work`='$work_volume',`no_skill_labour`='$num_labour', `no_unskill_labour`='$num_unskill_labour',`unit_id`='$unit',`value`='$value',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			
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

				$sql = mysql_query("UPDATE `daily_works` SET  `user_id`='$user_id',`sub_user_id`='$sub_id',`date`='$txtDate',`pro_id`='$pro_name',`cont_id`='$contractor',`work_type`='$last_id',`volume_of_work`='$work_volume',`no_skill_labour`='$num_labour', `no_unskill_labour`='$num_unskill_labour',`unit_id`='$unit',`value`='$value',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
				
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