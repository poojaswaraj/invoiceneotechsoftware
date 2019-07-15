<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
    $name = $_POST['txt_name'];
    $payment_date = $_POST['payment_date'];
    $txt_bill_no = addslashes($_POST['txt_bill_no']);
    $bill_date = $_POST['bill_date'];
    $amount = $_POST['txt_amount'];
    $txt_total_amt = $_POST['txt_total_amt'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
    $sgst = $_POST['txt_sgst'];
    $cgst = $_POST['txt_cgst'];
	$dt=date('Y-m-d');

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("INSERT INTO pay_info (`user_id`,`sub_user_id`,`name`,`payment_date`,`bill_no`,`bill_date`,`amount`,`tax_value`,`tax_amt`,`sgst`,`cgst`,`total_amt`,`type`,`record_date`) VALUES ('$sub_id','$user_id','$name','$payment_date','$txt_bill_no','$bill_date','$amount','$select_tax','$tax_amt','$sgst','$cgst','$txt_total_amt','Paid','$dt')")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}//user loop end
	else{
		$sql = mysql_query("INSERT INTO pay_info (`user_id`,`sub_user_id`,`name`,`payment_date`,`bill_no`,`bill_date`,`amount`,`tax_value`,`tax_amt`,`sgst`,`cgst`,`total_amt`,`type`,`record_date`) VALUES ('$user_id','$sub_id','$name','$payment_date','$txt_bill_no','$bill_date','$amount','$select_tax','$tax_amt','$sgst','$cgst','$txt_total_amt','Paid','$dt')")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}
?>