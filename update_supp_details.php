<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id = $_POST['sub_us_id'];
	$sub_us_ty = $_POST['sub_us_ty'];
	$id = $_POST['txt_id'];
	$name = $_POST['vender_name'];
    $m_name = $_POST['txt_material_name'];
    $date = $_POST['bill_date'];
    $billno = $_POST['txt_bill_no'];
    $rate = $_POST['txt_rate'];
	$qty = $_POST['txt_qty'];
	$amount = $_POST['txt_amount'];
	$unit = $_POST['unit'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
	$txt_total_amt = $_POST['txt_total_amt'];
	$sgst = $_POST['txt_sgst'];
	$cgst = $_POST['txt_cgst'];
 	$mat_supp_date = $_POST['material_supp_date'];
 	$paid_amt = $_POST['txt_paid_amt'];
 	$balance_amt = $_POST['txt_balance_amt'];
	$dt=date('Y-m-d');

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("UPDATE `supplier_details` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`supp_id`='$name',`material_name`='$m_name',`bill_date`='$date',`bill_no`='$billno', `unit_id`='$unit',`rate`='$rate',`qty`='$qty',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_total_amt',`sgst`='$sgst',`cgst`='$cgst',`material_supp_date`='$mat_supp_date',`paid_amt`='$paid_amt',`balence_amt`='$balance_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "1";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}//user loop end
	else{
		$sql = mysql_query("UPDATE `supplier_details` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`supp_id`='$name',`material_name`='$m_name',`bill_date`='$date',`bill_no`='$billno', `unit_id`='$unit',`rate`='$rate',`qty`='$qty',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`total_amt`='$txt_total_amt',`sgst`='$sgst',`cgst`='$cgst',`material_supp_date`='$mat_supp_date',`paid_amt`='$paid_amt',`balence_amt`='$balance_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
		if($sql==true)
		{
			echo "3";
		}
		else{
			echo "2".mysql_error($connection);
		}
	}


?>