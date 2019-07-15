<?php
include "config.php";
//------------------------ new invoice ----------------------------------
if(isset($_POST['btn_save']))
{	
	//$data['txt_id']="";
	$cname = $_POST['txt_cname'];
	$cleagal_id = $_POST['txt_cleagal_id'];
	$cperson = $_POST['txt_cperson'];
	$cemail = $_POST['txt_cemail'];
	$iaddr = $_POST['txt_iaddr'];
	$saddr = $_POST['txt_saddr'];
	$series = $_POST['select_series'];
	
	$sql_query = mysql_query("INSERT INTO `common`(`series_id`, `customer_id`, `customer_name`, `customer_identification`, `customer_email`, `invoicing_address`, `shipping_address`, `contact_person`, `created_at`, `updated_at`) 
	values('$series','1','$cname','$cleagal_id','$cemail','$iaddr','$saddr','$cperson',now(),now())")or die(mysql_error());
	
	$prod_query = mysql_query("INSERT INTO `customer`(`name`, `name_slug`, `identification`, `email`, `contact_person`, `invoicing_address`, `shipping_address`) 
	VALUES ('$cname','$cname','$cleagal_id','$cemail','$cperson','$iaddr','$saddr')")or die(mysql_error());
	
	if($sql_query)
	{
		header('location:dashboard.php?page=new_invoice&status=1');
	}
	else
	{
		header('location:dashboard.php?page=new_invoice&status=3');
	}
}


//------------------------ customer ----------------------------------
if(isset($_POST['btn_customer']))
{	
	$cname = $_POST['txt_cname'];
	$cleagal_id = $_POST['txt_cleagal_id'];
	$txt_gstno = $_POST['txt_gstno'];
	$cperson = $_POST['txt_cperson'];
	$cemail = $_POST['txt_cemail'];
	$iaddr = $_POST['txt_iaddr'];
	$saddr = $_POST['txt_saddr'];
	
	$sql_query = mysql_query("INSERT INTO `customer`(`name`, `name_slug`, `identification`, `email`, `contact_person`, `invoicing_address`, `shipping_address`,`gst_no`) 
	VALUES ('$cname','$cname','$cleagal_id','$cemail','$cperson','$iaddr','$saddr','$txt_gstno')")or die(mysql_error());
	
	if($sql_query)
	{
		header('location:dashboard.php?page=customers&status=1');
	}
	else
	{
		header('location:dashboard.php?page=customers&status=3');
	}
}

if(isset($_POST['btn_customer_edit']))
{	
	$txt_id = $_POST['txt_id'];
	$cname = $_POST['txt_cname'];
	$cleagal_id = $_POST['txt_cleagal_id'];
	$txt_gstno = $_POST['txt_gstno'];
	$cperson = $_POST['txt_cperson'];
	$cemail = $_POST['txt_cemail'];
	$iaddr = $_POST['txt_iaddr'];
	$saddr = $_POST['txt_saddr'];
	
	$edit_query=mysql_query("UPDATE `customer` SET name='$cname',name_slug='$cname',identification='$cleagal_id',email='$cemail',contact_person='$cemail',invoicing_address='$iaddr',shipping_address='$saddr',gst_no='$txt_gstno' WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query)
	{
		header('location:dashboard.php?page=customers&status=2');
	}
	else
	{
		header('location:dashboard.php?page=customers&status=3');
	}
}

//------------------------ product ----------------------------------
if(isset($_POST['btn_product']))
{	
	$pname = $_POST['txt_pname'];
	$txt_hsn = $_POST['txt_hsn'];
	$desc = $_POST['txt_desc'];
	$price = $_POST['txt_price'];
	
	$sql_query = mysql_query("INSERT INTO `product`(`reference`,`hsn_code`,`description`, `base_price`,`created_at`) 
	VALUES ('$pname','$txt_hsn','$desc','$price',now())")or die(mysql_error());
	
	if($sql_query)
	{
		header('location:dashboard.php?page=product&status=1');
	}
	else
	{
		header('location:dashboard.php?page=product&status=3');
	}
}

if(isset($_POST['btn_product_edit']))
{	
	$txt_id = $_POST['txt_id'];
	$pname = $_POST['txt_pname'];
	$txt_hsn = $_POST['txt_hsn'];
	$desc = $_POST['txt_desc'];
	$price = $_POST['txt_price'];
	
	
	$edit_query=mysql_query("UPDATE `product` SET reference='$pname',hsn_code='$txt_hsn',description='$desc',base_price='$price',updated_at=now() WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query)
	{
		header('location:dashboard.php?page=product&status=2');
	}
	else
	{
		header('location:dashboard.php?page=product&status=3');
	}
}

//------------------------ Voucher ----------------------------------
if(isset($_POST['btn_voucher']))
{	
	$txt_pert = $_POST['txt_pert'];
	$sel_head = $_POST['sel_head'];
	$txt_client = $_POST['txt_client'];			
	$bill_no = $_POST['bill_no'];
	$txt_amt = $_POST['txt_amt'];
	$sel_mode = $_POST['sel_mode'];
	$cheque_no = $_POST['cheque_no'];
	$cheque_dt = $_POST['cheque_dt'];
	$voucher_no = $_POST['voucher_no'];
	$dt=date('y-m-d');

	
	$sql_query = mysql_query("INSERT INTO `voucher`(`particular`, `acc_head_id`, `project_client`, `bill_no`, `amount`, `mode_id`, `cheque_no`, `cheque_date`, `voucher_no`, `created_date`) VALUES ('$txt_pert','$sel_head','$txt_client','$bill_no','$txt_amt','$sel_mode','$cheque_no','$cheque_dt','$voucher_no','$dt')")or die(mysql_error());
	
	if($sql_query)
	{
		header('location:dashboard.php?page=voucher&status=1');
	}
	else
	{
		header('location:dashboard.php?page=voucher&status=3');
	}
}

if(isset($_POST['btn_voucher_edit']))
{	
	$txt_id = $_POST['txt_id'];
	$txt_pert = $_POST['txt_pert'];
	$sel_head = $_POST['sel_head'];
	$txt_client = $_POST['txt_client'];
	$bill_no = $_POST['bill_no'];
	$txt_amt = $_POST['txt_amt'];
	$sel_mode = $_POST['sel_mode'];
	$cheque_no = $_POST['cheque_no'];
	$cheque_dt = $_POST['cheque_dt'];
	$voucher_no = $_POST['voucher_no'];
	$dt=date('y-m-d');

	$edit_query=mysql_query("UPDATE `voucher` SET `particular`='$txt_pert',`acc_head_id`='$sel_head',`project_client`='$txt_client',`bill_no`='$bill_no',`amount`='$txt_amt',`mode_id`='$sel_mode',`cheque_no`='$cheque_no',`cheque_date`='$cheque_dt',`voucher_no`='$voucher_no',`updated_date`='$dt' WHERE id='$txt_id'")or die(mysql_error());
	
	if($edit_query)
	{
		header('location:dashboard.php?page=voucher&status=2');
	}
	else
	{
		header('location:dashboard.php?page=voucher&status=3');
	}
}
?>