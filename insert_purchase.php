<?php

include "config.php";
	
	$user_id = $_POST['user_id'];
	$party_name = $_POST['party_name'];
	$invoce_no = $_POST['invoce_no'];
	$gst_code = $_POST['gst_code'];			
	$hsn_code = $_POST['hsn_code'];
	$base_amt = $_POST['base_amt'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
	$total_amt = $_POST['total_amt'];
	$state = $_POST['state'];
	$dt=date('y-m-d');
	
	$pur_dt=strtotime($_POST['pur_dt']); 
	$pur_dt=date("Y-m-d",$pur_dt);

	$sql_query = mysql_query("INSERT INTO `gst_purches`(`user_id`,`date`, `invoice_no`, `party_name`, `gst_no`, `state`, `hsn_code`, `basic_amt`, `tax_amt`, `total_amt`, `created_at`) VALUES ('$user_id','$pur_dt','$invoce_no','$party_name','$gst_code','$state','$hsn_code','$base_amt','$tax_amt','$total_amt','$dt')")or die(mysql_error());
	
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
	}
	else
	{
		header('location:dashboard.php?page=import_gst&status=3');
	}
?>