<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$txt_id = $_POST['txt_id'];
	$date = $_POST['date'];
	$sel_project = $_POST['sel_project'];
	$reqi_made_by = $_POST['reqi_made_by'];
	$material_name = $_POST['material_name'];
	$txt_desc = addslashes($_POST['txt_desc']);
	$txt_unit = $_POST['txt_unit'];
	$txt_qty = $_POST['txt_qty'];
	$requried_by_date = $_POST['requried_by_date'];
	$dt = date('Y-m-d');
	$txt_comment = addslashes($_POST['txt_comment']);
	$approval = $_POST['approval'];
	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("UPDATE `daily_material_requisition` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`pro_id`='$sel_project',`requ_made_by`='$reqi_made_by',`mate_id`='$material_name',`description`='$txt_desc',`unit`='$txt_unit',`qty`='$txt_qty',`requried_by_date`='$requried_by_date',`date`='$date',`update_date`='$dt',`comment`='$txt_comment',`approval`='Pending' WHERE `id`='$txt_id'")or die(mysql_error($connection));

		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2";
		}
	}//User loop end 
	else{
		$sql = mysql_query("UPDATE `daily_material_requisition` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`pro_id`='$sel_project',`requ_made_by`='$reqi_made_by',`mate_id`='$material_name',`description`='$txt_desc',`unit`='$txt_unit',`qty`='$txt_qty',`requried_by_date`='$requried_by_date',`date`='$date',`update_date`='$dt',`comment`='$txt_comment',`approval`='$approval' WHERE `id`='$txt_id'")or die(mysql_error($connection));

		if($sql==true)
		{
			echo "3";
		}
		else{
			echo "2";
		}
	}

?>