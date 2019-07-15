<?php 
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$txt_id = $_POST['txt_id'];
	$name = $_POST['pro_name'];
	$maharera_no = $_POST['maharera_no'];
	$owner_name = $_POST['owner_name'];
	$sel_state = $_POST['sel_state'];
	$sel_city = $_POST['sel_city'];
	$address = $_POST['address'];
	$total_sale_area = $_POST['total_sale_area'];
	$neo_allow_area = $_POST['neo_allow_area'];
	$neo_allow_rate = $_POST['neo_allow_rate'];
	$dt=date('Y-m-d');
	$start_dt = $_POST['start_dt'];
	$end_dt = $_POST['end_dt'];

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("UPDATE `new_project` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`pro_name`='$name',`owner_name`='$owner_name',`maharera_no`='$maharera_no',`state`='$sel_state',`city`='$sel_city',`address`='$address',`total_sale_area`='$total_sale_area',`neo_allow_area`='$neo_allow_area',`neo_allow_rate`='$neo_allow_rate',`update_date`= '$dt',`start_date`='$start_dt',`end_date`='$end_dt' WHERE `id`='$txt_id'")or die(mysql_error($connection));

			if ($sql==true) {
				echo "1";
			}
			else{
				echo "2";
			}
	}
	else{
		$sql = mysql_query("UPDATE `new_project` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`pro_name`='$name',`owner_name`='$owner_name',`maharera_no`='$maharera_no',`state`='$sel_state',`city`='$sel_city',`address`='$address',`total_sale_area`='$total_sale_area',`neo_allow_area`='$neo_allow_area',`neo_allow_rate`='$neo_allow_rate',`update_date`= '$dt',`start_date`='$start_dt',`end_date`='$end_dt' WHERE `id`='$txt_id'")or die(mysql_error($connection));

			if ($sql==true) {
				echo "3";
			}
			else{
				echo "2";
			}
	}


 ?>