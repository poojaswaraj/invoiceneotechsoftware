<?php
 
 include "config.php";
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id=$_POST['txt_id'];
    $name = $_POST['txt_name'];
    $payment_date = $_POST['payment_date'];
    $bill_no = $_POST['txt_bill_no'];
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
		$sql = mysql_query("UPDATE `pay_info` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`name`='$name',`payment_date`='$payment_date',`bill_no`='$bill_no',`bill_date`='$bill_date',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`sgst`='$sgst',`cgst`='$cgst',`total_amt`='$txt_total_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}//user loop end
	else{
		$sql = mysql_query("UPDATE `pay_info` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`name`='$name',`payment_date`='$payment_date',`bill_no`='$bill_no',`bill_date`='$bill_date',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`sgst`='$sgst',`cgst`='$cgst',`total_amt`='$txt_total_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "3";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}

?>