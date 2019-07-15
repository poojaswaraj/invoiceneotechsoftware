<?php 
	//var_dump($_POST);
	include "config.php";
     
	$user_id = $_POST['user_id'];
	$sub_user_id =$_POST['sub_user_id'];
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
	$terms = $_POST['terms'];
	$dt =date('Y-m-d');
 if(empty($other_types))
		{
    $sql = mysql_query("INSERT INTO `tbl_work`(`user_id`,`sub_user_id`,`date`,`pro_id`,`cont_id`, `work_type`,`area`,`rate`,`unit`,`value`,`no_of_dayes`,`terms`,`record_date`) VALUES('$user_id','$sub_user_id','$date','$pro_name','$cont_name','$work_type','$area','$rate','$unit','$value','$no_of_dayes','$terms','$dt')")or die(mysql_error($connection));
			
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
				if($qu==true)
				{
					$last_id = mysql_insert_id();
				
					 $sql = mysql_query("INSERT INTO `tbl_work`(`user_id`,`sub_user_id`,`date`,`pro_id`,`cont_id`, `work_type`,`area`,`rate`,`unit`,`value`,`no_of_dayes`,`terms`,`record_date`) VALUES('$user_id','$sub_user_id','$date','$pro_name','$cont_name','$last_id','$area','$rate','$unit','$value','$no_of_dayes','$terms','$dt')")or die(mysql_error($connection));
					
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