<?php 
	//var_dump($_POST);
	include "config.php";

    $user_id = $_POST['user_id'];
	$sub_user_id =$_POST['sub_user_id'];
	$id=$_POST['id'];
	$date = $_POST['date'];
	$pro_name = $_POST['pro_name'];
	$cont_name = $_POST['cont_name'];
	$work_type = $_POST['types'];
	$other_types = $_POST['other_types'];
	$area = $_POST['area'];
	$rate = $_POST['rate'];
	$unit = $_POST['unit'];
	$value = $_POST['value'];
	$no_of_dayes = $_POST['no_of_dayes'];
	$dt =date('Y-m-d');
		if(empty($other_types))
		{
			$sql = mysql_query("UPDATE `tbl_work` SET  `user_id`='$user_id',`sub_user_id`='$sub_user_id',`date`='$date',`pro_id`='$pro_name',`cont_id`='$cont_name',`work_type`='$work_type',`area`='$area',`rate`='$rate',`unit`='$unit', `value`='$value',`no_of_dayes`='$no_of_dayes',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2";
		
	        }
	    }
	        else
		{
			$qu = mysql_query("INSERT INTO `mst_task`(`user_id`, `sub_user_id`, `description`, `record_date`) VALUES ('$user_id','$sub_user_id','$other_types','$dt')")or die(mysql_error($connection));

			//$qu = mysql_query("INSERT INTO `mst_task`(`user_id`, `sub_user_id`, `description`, `record_date`) VALUES ('$sub_id','$user_id','$other_types','$dt')")or die(mysql_error($connection));
				if($qu==true)
				{
					$last_id = mysql_insert_id();

				//$sql = mysql_query("UPDATE `daily_works` SET  `user_id`='$sub_id',`sub_user_id`='$user_id',`date`='$txtDate',`pro_id`='$pro_name',`cont_id`='$contractor',`work_type`='$last_id',`volume_of_work`='$work_volume',`no_skill_labour`='$num_labour', `no_unskill_labour`='$num_unskill_labour',`unit_id`='$unit',`value`='$value',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
				$sql = mysql_query("UPDATE `tbl_work` SET  `user_id`='$user_id',`sub_user_id`='$sub_user_id',`date`='$date',`pro_id`='$pro_name',`cont_id`='$cont_name',`work_type`='$last_id',`area`='$area',`rate`='$rate',`unit`='$unit', `value`='$value',`no_of_dayes`='$no_of_dayes',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
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