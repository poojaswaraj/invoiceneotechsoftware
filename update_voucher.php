<?php 

include "config.php";

	$txt_id = $_POST['txt_id'];
	$txt_pert = $_POST['txt_pert'];
	$sel_head = $_POST['sel_head'];
	$txt_client = $_POST['txt_client'];
	$bill_no = $_POST['bill_no'];
	$txt_amt = $_POST['txt_amt'];
	$sel_mode = $_POST['sel_mode'];
	$cheque_no = $_POST['cheque_no'];
	$txt_hsn = $_POST['txt_hsn'];
	$voucher_no = $_POST['voucher_no'];
	$dt=date('y-m-d');
	$cheque_dt=strtotime($_POST['cheque_dt']); 
	$cheque_dt=date("Y-m-d",$cheque_dt);


	$edit_query=mysql_query("UPDATE `voucher` SET `particular`='$txt_pert',`acc_head_id`='$sel_head',`project_client`='$txt_client',`bill_no`='$bill_no',`amount`='$txt_amt',`mode_id`='$sel_mode',`cheque_no`='$cheque_no',`cheque_date`='$cheque_dt',`voucher_no`='$voucher_no',`hsn_code`='$txt_hsn',`updated_date`='$dt' WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query)
	{
		// header('location:dashboard.php?page=voucher&status=2');
		echo "1";
	}
	else
	{
		header('location:dashboard.php?page=voucher&status=3');
	}

 ?>