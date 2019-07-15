<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$solutation_type = $_POST['solutation_type'];
    $s_type = $_POST['sol_type'];
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
	$contractor_type = $_POST['txt_type'];

	$dt=date('Y-m-d');

   $query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
		$type= $row['type'];

	if($type=='user')
	{
		$query = mysql_query("SELECT * FROM mst_contractor WHERE email='$email' OR contact='$contact'")or die(mysql_error($connection));
		$row=mysql_fetch_array($query);

		$count=mysql_num_rows($query);

		if($count==0)
		{
			
		$sql = mysql_query("INSERT INTO mst_contractor (`user_id`,`sub_user_id`,`s_type`,`name`,`gender`,`email`,`contact`,`panno`,`adharno`,`gst_no`,`pic_no`,`state`,`city`,`address`,`type`,`record_date`,`comp_name`,`land_line`) VALUES ('$sub_id','$user_id','$solutation_type','$name','$s_type','$email','$contact','$panno','$adhar','$txt_gst','$pic_no','$state','$city','$address','$contractor_type','$dt','$txt_comp_name','$land_line')")or die(mysql_error($connection));
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
	}//end of user loop
	else{

		$query = mysql_query("SELECT * FROM mst_contractor WHERE email='$email' OR contact='$contact'")or die(mysql_error($connection));
		$row=mysql_fetch_array($query);

		$count=mysql_num_rows($query);

		if($count==0)
		{
			
		$sql = mysql_query("INSERT INTO mst_contractor (`user_id`,`sub_user_id`,`s_type`,`name`,`gender`,`email`,`contact`,`panno`,`adharno`,`gst_no`,`pic_no`,`state`,`city`,`address`,`type`,`record_date`,`comp_name`,`land_line`) VALUES ('$user_id','$sub_id','$solutation_type','$name','$s_type','$email','$contact','$panno','$adhar','$txt_gst','$pic_no','$state','$city','$address','$contractor_type','$dt','$txt_comp_name','$land_line')")or die(mysql_error($connection));
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
?>