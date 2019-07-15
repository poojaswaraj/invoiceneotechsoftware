<?php 
// var_dump($_POST);
include "config.php";

$user_id =$_POST['user_id'];
$sub_id =$_POST['sub_us_id'];
$sub_us_ty= $_POST['sub_us_ty'];
$txt_code = $_POST['txt_code'];
$sel_pro = $_POST['sel_pro'];
$material_name = $_POST['material_name'];
$txt_desc = addslashes($_POST['txt_desc']);
$txt_unit =addslashes($_POST['txt_unit']);
$txt_qty = $_POST['txt_qty'];
$txt_rate = $_POST['txt_rate'];
$select_tax = $_POST['select_tax'];
$txt_price = $_POST['txt_price'];
$tax_amt = $_POST['tax_amt'];
$txt_comment = addslashes($_POST['txt_comment']);
$base_amt=$txt_qty*$txt_rate;
$dt=date('y-m-d');

$ssid=$_POST['txt_session'];

$query = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query);
		 $type= $row['type'];

if($type=='user')
{
	$temp=0;
	$aa = mysql_query("SELECT * FROM tbl_po ")or die(mysql_error($connection));
	while($rr=mysql_fetch_array($aa))
	  {
	  	 $c_id= $rr['id'];
	  }
	  if(!empty($c_id)){
	     $temp=$c_id+1;
	  }
	  else{
	  		$temp=0+1;
	  }	
		$sql3 = mysql_query("INSERT INTO `tbl_po_matrials`(`user_id`, `sub_user_id`, `po_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `state_code`, `status`, `sesssion_no`,`record_date`,`base_amt`) VALUES ('$sub_id','$user_id','$temp','$sel_pro','$material_name','$txt_desc','$txt_unit','$txt_qty','$txt_rate','$select_tax','$tax_amt','$txt_price','$txt_comment','$txt_code','1','$ssid','$dt','$base_amt')")or die(mysql_error($connection));

	 	if($sql3==true)
		{
		 	echo "1";
		}
		else{
			echo "2";
		}
		 				
 }//type user if end
 else{

	$temp=0;
	$aa = mysql_query("SELECT * FROM tbl_po ")or die(mysql_error($connection));
	while($rr=mysql_fetch_array($aa))
	  {
	  	 $c_id= $rr['id'];
	  }
	  if(!empty($c_id)){
	     $temp=$c_id+1;
	  }
	  else{
	  		$temp=0+1;
	  }	
		$sql3 = mysql_query("INSERT INTO `tbl_po_matrials`(`user_id`, `sub_user_id`, `po_id`, `pro_id`, `mate_id`, `description`, `unit`, `qty`, `rate`, `tax_value`, `tax_amt`, `total_amt`, `comment`, `state_code`, `status`, `sesssion_no`,`record_date`,`base_amt`) VALUES ('$user_id','$sub_id','$temp','$sel_pro','$material_name','$txt_desc','$txt_unit','$txt_qty','$txt_rate','$select_tax','$tax_amt','$txt_price','$txt_comment','$txt_code','1','$ssid','$dt','$base_amt')")or die(mysql_error($connection));

	 	if($sql3==true)
		{
		 	echo "1";
		}
		else{
			echo "2";
		}
 }
?>