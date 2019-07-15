<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];

    $solutation_type=$_POST['solutation_type'];
    $txt_name=$_POST['txt_name'];
    $sol_type=$_POST['sol_type'];
    $txt_email=$_POST['txt_email'];
    $txt_contact=$_POST['txt_contact'];
    $txt_panno=$_POST['txt_panno'];
    $txt_adharno=$_POST['txt_adharno'];
    $txt_qualification=$_POST['txt_qualification'];
    $dob=$_POST['dob'];
    $txt_state=$_POST['txt_state'];
    $txt_city=$_POST['txt_city'];
    $txt_address=$_POST['txt_address'];
    $joining_date=$_POST['joining_date'];
    $dt=date('Y-m-d');

	// $query = mysql_query("SELECT * FROM mst_employee WHERE email='$email' OR contact='$contact'")or die(mysql_error($connection));
	// $row=mysql_fetch_array($query);

	// $count=mysql_num_rows($query);

	// if($count==0)
	// {
    $query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		$type= $row['type'];

	if($type=='user')
	{

		$sql = mysql_query("INSERT INTO mst_employee (`user_id`,`sub_user_id`,`s_type`,`name`,`gender`,`email`,`contact`,`panno`,`adharno`,`qualification`,`dob`,`state`,`city`,`address`,`joining_date`,`record_date`) VALUES ('$sub_id','$user_id','$solutation_type','$txt_name','$sol_type','$txt_email','$txt_contact','$txt_panno','$txt_adharno',' $txt_qualification','$dob','$txt_state','$txt_city','$txt_address','$joining_date','$dt')")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}//End of type user loop 
	else{
		$sql = mysql_query("INSERT INTO mst_employee (`user_id`,`sub_user_id`,`s_type`,`name`,`gender`,`email`,`contact`,`panno`,`adharno`,`qualification`,`dob`,`state`,`city`,`address`,`joining_date`,`record_date`) VALUES ('$user_id','$sub_id','$solutation_type','$txt_name','$sol_type','$txt_email','$txt_contact','$txt_panno','$txt_adharno',' $txt_qualification','$dob','$txt_state','$txt_city','$txt_address','$joining_date','$dt')")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}

?>