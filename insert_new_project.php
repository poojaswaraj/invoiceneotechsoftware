<?php 
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$name = $_POST['pro_name'];
	$maharera_no = $_POST['maharera_no'];
	$owner_name = $_POST['owner_name'];
	$sel_state = $_POST['sel_state'];
	$sel_city = $_POST['sel_city'];
	$address = $_POST['address'];
	$total_sale_area = $_POST['total_sale_area'];
	$neo_allow_area = $_POST['neo_allow_area'];
	$neo_allow_rate = $_POST['neo_allow_rate'];

	$start_dt = $_POST['start_dt'];
	$end_dt = $_POST['end_dt'];
	$dt=date('Y-m-d');
	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{

		$sql = mysql_query("INSERT INTO `new_project`(`user_id`, `sub_user_id`, `pro_name`,`maharera_no` ,`owner_name`, `state`, `city`, `address`, `total_sale_area`, `neo_allow_area`, `neo_allow_rate`, `record_date`,`start_date`,`end_date`) VALUES ('$sub_id','$user_id','$name','$maharera_no','$owner_name','$sel_state','$sel_city','$address','$total_sale_area','$neo_allow_area','$neo_allow_rate','$dt','$start_dt','$end_dt')")or die(mysql_error($connection));

			if ($sql==true) {
				echo "1";
			}
			else{
				echo "2";
			}
	}
	else{

		$sql = mysql_query("INSERT INTO `new_project`(`user_id`, `sub_user_id`, `pro_name`,`maharera_no` ,`owner_name`, `state`, `city`, `address`, `total_sale_area`, `neo_allow_area`, `neo_allow_rate`, `record_date`,`start_date`,`end_date`) VALUES ('$user_id','$sub_id','$name','$maharera_no','$owner_name','$sel_state','$sel_city','$address','$total_sale_area','$neo_allow_area','$neo_allow_rate','$dt','$start_dt','$end_dt')")or die(mysql_error($connection));

			if ($sql==true) {
				echo "1";
			}
			else{
				echo "2";
			}

	}

 ?>