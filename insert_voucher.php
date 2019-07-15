<?php

include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id = $_POST['sub_us_id'];
	$sub_us_ty = $_POST['sub_us_ty'];
	$pur_date = $_POST['txt_dt'];
	$txt_pert = $_POST['txt_pert'];
	$party_name = $_POST['party_name'];
	$sel_head = $_POST['sel_head'];
	$txt_gst = $_POST['txt_gst'];	
	$invoice_no = $_POST['invoice_no'];
	$voucher_no = $_POST['voucher_no'];
	$txt_client = $_POST['txt_client'];	
	$txt_hsn = $_POST['txt_hsn'];
	$base_amt = $_POST['base_amt'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
	$total_amt = $_POST['total_amt'];
	$state = $_POST['state'];
	$sel_mode = $_POST['sel_mode'];
	$cheque_no = $_POST['cheque_no'];

	$txt_code = $_POST['txt_code'];

	$dt=date('y-m-d');
	
	$cheque_dt=strtotime($_POST['cheque_dt']); 
	$cheque_dt=date("Y-m-d",$cheque_dt);


$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];

if($type=='user')
{

	if(isset($_POST['ret_app']))
	{
	$sql_query = mysql_query("INSERT INTO `expenses`(`user_id`, `sub_user_id`, `invoice_no`,`pur_date`, `perticular`, `party_name`, `gst_no`, `proj_client`, `state`,`state_code`,`hsn_code`, `basic_amt`, `tax_amt`, `total_amt`, `created_at`, `acc_head_id`, `mode_id`, `cheque_no`, `cheque_date`, `voucher_no`, `is_return`) VALUES ('$sub_id','$user_id','$invoice_no','$pur_date','$txt_pert','$party_name','$txt_gst','$txt_client','$state','$txt_code','$txt_hsn','$base_amt','$tax_amt','$total_amt','$dt','$sel_head','$sel_mode','$cheque_no','$cheque_dt','$voucher_no','Yes')")or die(mysql_error());
	}
	else{
		$sql_query = mysql_query("INSERT INTO `expenses`(`user_id`, `sub_user_id`, `invoice_no`,`pur_date`, `perticular`, `party_name`, `gst_no`, `proj_client`, `state`,`state_code`, `hsn_code`, `basic_amt`, `tax_amt`, `total_amt`, `created_at`, `acc_head_id`, `mode_id`, `cheque_no`, `cheque_date`, `voucher_no`, `is_return`) VALUES ('$sub_id','$user_id','$invoice_no','$pur_date','$txt_pert','$party_name','$txt_gst','$txt_client','$state','$txt_code','$txt_hsn','$base_amt','$tax_amt','$total_amt','$dt','$sel_head','$sel_mode','$cheque_no','$cheque_dt','$voucher_no','No')")or die(mysql_error());
	}
	if($sql_query)
	{
		$last_id = mysql_insert_id();

		 if(!empty($_POST['chk'])) 
		  	{
				foreach($_POST['chk'] as $check) 
				 {
					$sql = mysql_query("INSERT INTO purches_tax (`purches_id`,`tax_value`) VALUES ('$last_id','$check')");
							
						if($sql==true)
							{
								echo "1";
							}
						else
						{
							echo "error";
						}
				 }
			}
			else{
				echo "1";
			}
	}
	else
	{
		header('location:user_dashboard.php?page=voucher&status=3');
	}
}
else
{
	if(isset($_POST['ret_app']))
	{
	$sql_query = mysql_query("INSERT INTO `expenses`(`user_id`, `sub_user_id`, `invoice_no`,`pur_date`, `perticular`, `party_name`, `gst_no`, `proj_client`, `state`,`state_code`, `hsn_code`, `basic_amt`, `tax_amt`, `total_amt`, `created_at`, `acc_head_id`, `mode_id`, `cheque_no`, `cheque_date`, `voucher_no`, `is_return`) VALUES ('$user_id','$sub_id','$invoice_no','$pur_date','$txt_pert','$party_name','$txt_gst','$txt_client','$state','$txt_code','$txt_hsn','$base_amt','$tax_amt','$total_amt','$dt','$sel_head','$sel_mode','$cheque_no','$cheque_dt','$voucher_no','Yes')")or die(mysql_error());
	}
	else{
		$sql_query = mysql_query("INSERT INTO `expenses`(`user_id`, `sub_user_id`, `invoice_no`,`pur_date`, `perticular`, `party_name`, `gst_no`, `proj_client`, `state`,`state_code`, `hsn_code`, `basic_amt`, `tax_amt`, `total_amt`, `created_at`, `acc_head_id`, `mode_id`, `cheque_no`, `cheque_date`, `voucher_no`, `is_return`) VALUES ('$user_id','$sub_id','$invoice_no','$pur_date','$txt_pert','$party_name','$txt_gst','$txt_client','$state','$txt_code','$txt_hsn','$base_amt','$tax_amt','$total_amt','$dt','$sel_head','$sel_mode','$cheque_no','$cheque_dt','$voucher_no','No')")or die(mysql_error());
	}
	if($sql_query)
	{
		$last_id = mysql_insert_id();

		 if(!empty($_POST['chk'])) 
		  	{
				foreach($_POST['chk'] as $check) 
				 {
					$sql = mysql_query("INSERT INTO purches_tax (`purches_id`,`tax_value`) VALUES ('$last_id','$check')");
							
						if($sql==true)
							{
								echo "1";
							}
						else
						{
							echo "error";
						}
				 }
			}
			else{
				echo "1";
			}
	}
	else
	{
		header('location:dashboard.php?page=voucher&status=3');
	}
}
?>