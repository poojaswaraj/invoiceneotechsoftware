<?php
 
 include "config.php";
	
	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$id=$_POST['txt_id'];
	$name = $_POST['txt_con_name'];
    $work = $_POST['txt_type_work'];
    $date = $_POST['bill_date'];
    $rate = $_POST['txt_rate'];
	$unit = $_POST['txt_unit'];
	$qty = $_POST['txt_qty'];
	$amount = $_POST['txt_amount'];
	$txt_total_amt = $_POST['txt_total_amt'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
	$sgst = $_POST['txt_sgst'];
	$cgst=$_POST['txt_cgst'];//date
    $billno= $_POST['txt_bill_no'];
 	$paid_amt= $_POST['txt_paid_amt'];
 	$balance_amt= $_POST['txt_balance_amt'];
	$dt=date('Y-m-d');
	$other_types = $_POST['other_types'];

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		if(empty($other_types)){
			$sql = mysql_query("UPDATE `contractor_details` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`con_name`='$name',`type_work`='$work',`bill_date`='$date',`rate`='$rate',`unit`='$unit',`qty`='$qty',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`sgst`='$sgst',`cgst`='$cgst',`total_amt`='$txt_total_amt',`bill_no`='$billno',`paid_amt`='$paid_amt',`balance_amt`='$balance_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "1";
			}
			else{
				echo "2".mysql_error($connection);
			}
		}else{
			$qu = mysql_query("INSERT INTO `mst_task`(`user_id`, `sub_user_id`, `description`, `record_date`) VALUES ('$sub_id','$user_id','$other_types','$dt')")or die(mysql_error($connection));
				if($qu==true)
				{
					$last_id = mysql_insert_id();

					$sql = mysql_query("UPDATE `contractor_details` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`con_name`='$name',`type_work`='$last_id',`bill_date`='$date',`rate`='$rate',`unit`='$unit',`qty`='$qty',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`sgst`='$sgst',`cgst`='$cgst',`total_amt`='$txt_total_amt',`bill_no`='$billno',`paid_amt`='$paid_amt',`balance_amt`='$balance_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
					if($sql==true)
					{
						echo "1";
					}
					else{
						echo "2".mysql_error($connection);
					}
				}
		}
	}//user loop end
	else{
		if(empty($other_types)){
			$sql = mysql_query("UPDATE `contractor_details` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`con_name`='$name',`type_work`='$work',`bill_date`='$date',`rate`='$rate',`unit`='$unit',`qty`='$qty',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`sgst`='$sgst',`cgst`='$cgst',`total_amt`='$txt_total_amt',`bill_no`='$billno',`paid_amt`='$paid_amt',`balance_amt`='$balance_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
			if($sql==true)
			{
				echo "3";
			}
			else{
				echo "2".mysql_error($connection);
			}
		}else{
			$qu = mysql_query("INSERT INTO `mst_task`(`user_id`, `sub_user_id`, `description`, `record_date`) VALUES ('$user_id','$sub_id','$other_types','$dt')")or die(mysql_error($connection));
				if($qu==true)
				{
					$last_id = mysql_insert_id();

					$sql = mysql_query("UPDATE `contractor_details` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`con_name`='$name',`type_work`='$last_id',`bill_date`='$date',`rate`='$rate',`unit`='$unit',`qty`='$qty',`amount`='$amount',`tax_value`='$select_tax',`tax_amt`='$tax_amt',`sgst`='$sgst',`cgst`='$cgst',`total_amt`='$txt_total_amt',`bill_no`='$billno',`paid_amt`='$paid_amt',`balance_amt`='$balance_amt',`update_date`='$dt' WHERE `id`='$id'")or die(mysql_error($connection));
					if($sql==true)
					{
						echo "3";
					}
					else{
						echo "2".mysql_error($connection);
					}
				}
		}
	}
?>