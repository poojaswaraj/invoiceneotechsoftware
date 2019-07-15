<?php 
	
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
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
		if(empty($other_types))
		{
			$sql = mysql_query("INSERT INTO `daily_works`(`user_id`, `sub_user_id`, `date`, `pro_id`,`cont_id`, `work_type`, `volume_of_work`, `no_skill_labour`, `no_unskill_labour`, `unit_id`, `value`, `record_date`) VALUES ('$sub_id','$user_id','$txtDate','$pro_name','$contractor','$types','$work_volume','$num_labour','$num_unskill_labour','$unit','$value','$dt')")or die(mysql_error($connection));
			
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
					$sql = mysql_query("INSERT INTO `daily_works`(`user_id`, `sub_user_id`, `date`, `pro_id`, `cont_id`, `work_type`, `volume_of_work`, `no_skill_labour`, `no_unskill_labour`, `unit_id`, `value`, `record_date`) VALUES ('$sub_id','$user_id','$txtDate','$pro_name','$contractor','$last_id','$work_volume','$num_labour','$num_unskill_labour','$unit','$value','$dt')")or die(mysql_error($connection));
					
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
	$sql = mysql_query("INSERT INTO `daily_works`(`user_id`, `sub_user_id`, `date`, `pro_id`,`cont_id`, `work_type`, `volume_of_work`,  `no_skill_labour`, `no_unskill_labour`, `unit_id`, `value`, `record_date`) VALUES ('$user_id','$sub_id','$txtDate','$pro_name','$contractor','$types','$work_volume','$num_labour','$num_unskill_labour','$unit','$value','$dt')")or die(mysql_error($connection));
			
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
					$sql = mysql_query("INSERT INTO `daily_works`(`user_id`, `sub_user_id`, `date`, `pro_id`, `cont_id`, `work_type`, `volume_of_work`,  `no_skill_labour`, `no_unskill_labour`, `unit_id`, `value`, `record_date`) VALUES ('$user_id','$sub_id','$txtDate','$pro_name','$contractor','$last_id','$work_volume','$num_labour','$num_unskill_labour','$unit','$value','$dt')")or die(mysql_error($connection));
					
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