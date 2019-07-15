<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id=$_POST['txt_id'];

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
    
	$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("UPDATE `mst_employee` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`s_type`='$solutation_type',`name`='$txt_name',`gender`='$sol_type',`email`='$txt_email',`contact`='$txt_contact',`panno`='$txt_panno',`panno`='$txt_panno',`panno`='$txt_panno',`panno`='$txt_panno',`adharno`=' $txt_adharno',`qualification`='$txt_qualification',`dob`='$dob',`state`='$txt_state',`city`='$txt_city',`address`='$txt_address',`joining_date`='$joining_date',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}//End of user loop
	else{
			$sql = mysql_query("UPDATE `mst_employee` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`s_type`='$solutation_type',`name`='$txt_name',`gender`='$sol_type',`email`='$txt_email',`contact`='$txt_contact',`panno`='$txt_panno',`panno`='$txt_panno',`panno`='$txt_panno',`panno`='$txt_panno',`adharno`=' $txt_adharno',`qualification`='$txt_qualification',`dob`='$dob',`state`='$txt_state',`city`='$txt_city',`address`='$txt_address',`joining_date`='$joining_date',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		
			if($sql==true)
			{
				echo "3";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}
?>