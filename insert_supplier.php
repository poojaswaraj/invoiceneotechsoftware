<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
    $s_type = $_POST['solutation_type'];
    $name = $_POST['txt_name'];
   	$gender = $_POST['gender'];
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
	$dt=date('Y-m-d');

    // check if e-mail address is well-formed
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//       echo "33";
//   	}
// else{
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
		$type= $row['type'];

	if($type=='user')
	{
		$query = mysql_query("SELECT * FROM mst_supplier WHERE email='$email' OR contact='$contact'")or die(mysql_error($connection));
		$row=mysql_fetch_array($query);

		$count=mysql_num_rows($query);

		if($count==0)
		{
			$sql = mysql_query("INSERT INTO mst_supplier (`user_id`,`sub_user_id`,`s_type`,`name`,`email`,`contact`,`panno`,`gender`,`adharno`,`gst_no`,`pic_no`,`state`,`city`,`address`,`record_date`,`land_line`,`comp_name`) VALUES ('$sub_id','$user_id','$s_type','$name','$email','$contact','$panno','$gender','$adhar','$txt_gst','$pic_no','$state','$city','$address','$dt','$land_line','$txt_comp_name')")or die(mysql_error($connection));
				if($sql==true)
				{
					echo "1";
				}
				else{
					echo "2".mysql_error($connection);
				}
		}
		else{
			echo "4";
		}
	}//end user loop
	else{
		$query = mysql_query("SELECT * FROM mst_supplier WHERE email='$email' OR contact='$contact'")or die(mysql_error($connection));
		$row=mysql_fetch_array($query);

		$count=mysql_num_rows($query);

		if($count==0)
		{
			$sql = mysql_query("INSERT INTO mst_supplier (`user_id`,`sub_user_id`,`s_type`,`name`,`email`,`contact`,`panno`,`gender`,`adharno`,`gst_no`,`pic_no`,`state`,`city`,`address`,`record_date`,`land_line`,`comp_name`) VALUES ('$user_id','$sub_id','$s_type','$name','$email','$contact','$panno','$gender','$adhar','$txt_gst','$pic_no','$state','$city','$address','$dt','$land_line','$txt_comp_name')")or die(mysql_error($connection));
				if($sql==true)
				{
					echo "1";
				}
				else{
					echo "2".mysql_error($connection);
				}
		}
		else{
			echo "4";
		}
	}
// }
?>