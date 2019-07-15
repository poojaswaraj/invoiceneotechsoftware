<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$vender_name = $_POST['vender_name'];
  	$m_name = $_POST['txt_material_name'];
  	$mat_supp_date= $_POST['material_supp_date'];
    $bill_date = $_POST['bill_date'];
    $txt_bill_no= $_POST['txt_bill_no'];
    $unit= $_POST['unit'];
    $rate = $_POST['txt_rate'];
	$qty = $_POST['txt_qty'];
	$amount = $_POST['txt_amount'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
	$txt_total_amt = $_POST['txt_total_amt'];
	$sgst = $_POST['txt_sgst'];
	$cgst=$_POST['txt_cgst'];//date
 	$paid_amt= $_POST['txt_paid_amt'];
 	$balance_amt= $_POST['txt_balance_amt'];
	$dt=date('Y-m-d');
	
	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		$sql = mysql_query("INSERT INTO `supplier_details`(`user_id`, `sub_user_id`, `supp_id`, `material_name`, `bill_date`, `bill_no`, `unit_id`, `rate`, `qty`, `amount`, `tax_value`, `tax_amt`, `total_amt`, `sgst`, `cgst`, `material_supp_date`, `paid_amt`, `balence_amt`, `record_date`) VALUES ('$sub_id','$user_id','$vender_name','$m_name','$bill_date','$txt_bill_no','$unit','$rate','$qty','$amount','$select_tax','$tax_amt','$txt_total_amt','$sgst','$cgst','$mat_supp_date','$paid_amt','$balance_amt','$dt')")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}//user loop end
	else{
		$sql = mysql_query("INSERT INTO `supplier_details`(`user_id`, `sub_user_id`, `supp_id`, `material_name`, `bill_date`, `bill_no`, `unit_id`, `rate`, `qty`, `amount`, `tax_value`, `tax_amt`, `total_amt`, `sgst`, `cgst`, `material_supp_date`, `paid_amt`, `balence_amt`, `record_date`) VALUES ('$user_id','$sub_id','$vender_name','$m_name','$bill_date','$txt_bill_no','$unit','$rate','$qty','$amount','$select_tax','$tax_amt','$txt_total_amt','$sgst','$cgst','$mat_supp_date','$paid_amt','$balance_amt','$dt')")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
	}
?>