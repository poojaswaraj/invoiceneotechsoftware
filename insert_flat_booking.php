<?php
 	include "config.php";

 	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
    $paymet_date=$_POST['paymet_date'];
    $cust_name = $_POST['cust_name'];
    $pro_name = $_POST['pro_name'];
	$flat_details =addslashes($_POST['flat_details']);
	$area= $_POST['area'];
    $rate = $_POST['rate'];
    $gov_charge = $_POST['gov_charge'];
    $other_charge = $_POST['other_charge'];
   	$toatl_amt = $_POST['toatl_amt'];
    $paid_amt = $_POST['paid_amt'];
	$cust_cont = $_POST['cust_cont'];
	$bal_amt = $_POST['bal_amt'];
	$dt=date('Y-m-d');
	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
	
		$sql = mysql_query("INSERT INTO flat_booking (`user_id`,`sub_user_id`,`payment_date`,`cust_name`,`cust_cont`,`pro_id`,`flat_details`,`area`,`rate`,`gov_charges`,`other_charges`,`amount`,`paid_amount`,`balance_amount`,`record_date`) VALUES ('$sub_id','$user_id','$paymet_date','$cust_name','$cust_cont','$pro_name','$flat_details','$area','$rate','$gov_charge','$other_charge','$toatl_amt','$paid_amt','$bal_amt','$dt')")or die(mysql_error($connection));
			
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}//user loop end 
	else{
		$sql = mysql_query("INSERT INTO flat_booking (`user_id`,`sub_user_id`,`payment_date`,`cust_name`,`cust_cont`,`pro_id`,`flat_details`,`area`,`rate`,`gov_charges`,`other_charges`,`amount`,`paid_amount`,`balance_amount`,`record_date`) VALUES ('$user_id','$sub_id','$paymet_date','$cust_name','$cust_cont','$pro_name','$flat_details','$area','$rate','$gov_charge','$other_charge','$toatl_amt','$paid_amt','$bal_amt','$dt')")or die(mysql_error($connection));
			
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}
	
?>