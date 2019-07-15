<?php
 include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id=$_POST['txt_id'];
	$s_type = $_POST['solutation_type'];
    $gender = $_POST['gender'];
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
	$contact = $_POST['txt_contact'];
	$panno = $_POST['txt_panno'];
	$adhar = $_POST['txt_adharno'];
	$txt_gst = $_POST['txt_gst'];
	$pic_no = $_POST['pic_no'];
	$land_line = $_POST['land_line'];
	$txt_comp_name=$_POST['txt_comp_name'];
    $state= $_POST['txt_state'];
 	$city= $_POST['txt_city'];
 	$address= $_POST['txt_address'];
	$land_line = $_POST['land_line'];
	// $joindate = $_POST['joining_date'];
	$dt=date('Y-m-d');
	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
		$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("UPDATE `mst_supplier` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`s_type`='$s_type',`name`='$name',`email`='$email',`contact`='$contact',`gender`='$gender',`panno`='$panno',`adharno`='$adhar',`gst_no`='$txt_gst',`pic_no`='$pic_no',`state`='$state',`city`='$city',`address`='$address',`update_date`='$dt',`comp_name`='$txt_comp_name',`land_line`='$land_line' WHERE `id`='$id'")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}//end user loop
	else{
		$sql = mysql_query("UPDATE `mst_supplier` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`s_type`='$s_type',`name`='$name',`email`='$email',`contact`='$contact',`gender`='$gender',`panno`='$panno',`adharno`='$adhar',`gst_no`='$txt_gst',`pic_no`='$pic_no',`state`='$state',`city`='$city',`address`='$address',`update_date`='$dt',`comp_name`='$txt_comp_name',`land_line`='$land_line' WHERE `id`='$id'")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "3";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}
?>