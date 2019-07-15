<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
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

		$sql = mysql_query("INSERT INTO `daily_material_requisition`(`user_id`, `sub_user_id`, `pro_id`, `requ_made_by`, `mate_id`, `description`, `unit`, `qty`, `date`, `record_date`,`requried_by_date`,`comment`,`approval`) VALUES ('$sub_id','$user_id','$sel_project','$reqi_made_by','$material_name','$txt_desc','$txt_unit','$txt_qty','$date','$dt','$requried_by_date','$txt_comment','Pending')")or die(mysql_error($connection));

		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2";
		}
	}//User loop end 
	else{
		$sql = mysql_query("INSERT INTO `daily_material_requisition`(`user_id`, `sub_user_id`, `pro_id`, `requ_made_by`, `mate_id`, `description`, `unit`, `qty`, `date`, `record_date`,`requried_by_date`,`comment`,`approval`) VALUES ('$user_id','$sub_id','$sel_project','$reqi_made_by','$material_name','$txt_desc','$txt_unit','$txt_qty','$date','$dt','$requried_by_date','$txt_comment','$approval')")or die(mysql_error($connection));

		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2";
		}
	}

?>