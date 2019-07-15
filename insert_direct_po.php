<?php 

	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$supplier_name = $_POST['supplier_name'];
	$sel_pro = $_POST['sel_pro'];
	$dt = date('Y-m-d');
	$po_no = $_POST['po_no'];
	$po_date = $_POST['po_date'];
	$txt_terms = $_POST['txt_terms'];
	$sess=$_POST['txt_session'];

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];

	if($type=='user')
	{
		

		$sql = mysql_query("INSERT INTO `tbl_po`(`user_id`, `sub_user_id`, `req_id`, `pro_id`, `supp_id`, `mate_id`, `description`, `unit`, `po_no`, `po_date`, `qty`, `rate`, `base_amt`, `tax_value`, `tax_amt`, `grand_total`, `terms`, `comment`,`session_no`, `record_date`) VALUES ('$sub_id','$user_id','0','$sel_pro','$supplier_name','0','null','null','$po_no','$po_date','null','null','null','null','null','null','$txt_terms','null','$sess','$dt')")or die(mysql_error($connection));

			if($sql==true)
			{
				$last_id = mysql_insert_id();

				$sql1 = mysql_query("SELECT SUM(qty) as Qty, SUM(rate) as Rate,SUM(total_amt) as Grand_total,SUM(base_amt) as Base_amt,SUM(tax_amt) as Tax_amt FROM `tbl_po_matrials` WHERE po_id='$last_id'")or die(mysql_error($connection));
				while($data = mysql_fetch_array($sql1))
				{
					
					$Qty = $data['Qty'];
					$Rate = $data['Rate'];
					$base_amt =  $data['Base_amt'];
					$Tax_amt =  $data['Tax_amt'];
					$Grand_total = $data['Grand_total'];
				}

				$que = mysql_query("UPDATE `tbl_po` SET `qty`='$Qty',`rate`='$Rate',`base_amt`='$base_amt',`tax_amt`='$Tax_amt',`grand_total`='$Grand_total' WHERE `id`='$last_id'")or die(mysql_error($connection));
				
				if ($que==true) {
					echo "1";
				}
				else{
					echo "4";
				}
			}
			else{
				echo "2";
			}
	}//User loop end 
	else{

		$sql = mysql_query("INSERT INTO `tbl_po`(`user_id`, `sub_user_id`, `req_id`, `pro_id`, `supp_id`, `mate_id`, `description`, `unit`, `po_no`, `po_date`, `qty`, `rate`, `base_amt`, `tax_value`, `tax_amt`, `grand_total`, `terms`, `comment`,`session_no`, `record_date`) VALUES ('$user_id','$sub_id','0','$sel_pro','$supplier_name','0','null','null','$po_no','$po_date','null','null','null','null','null','null','$txt_terms','null','$sess','$dt')")or die(mysql_error($connection));

			if($sql==true)
			{
				$last_id = mysql_insert_id();

				$sql1 = mysql_query("SELECT SUM(qty) as Qty, SUM(rate) as Rate,SUM(total_amt) as Grand_total,SUM(base_amt) as Base_amt,SUM(tax_amt) as Tax_amt FROM `tbl_po_matrials` WHERE po_id='$last_id'")or die(mysql_error($connection));
				while($data = mysql_fetch_array($sql1))
				{
					
					$Qty = $data['Qty'];
					$Rate = $data['Rate'];
					$base_amt =  $data['Base_amt'];
					$Tax_amt =  $data['Tax_amt'];
					$Grand_total = $data['Grand_total'];
				}

				$que = mysql_query("UPDATE `tbl_po` SET `qty`='$Qty',`rate`='$Rate',`base_amt`='$base_amt',`tax_amt`='$Tax_amt',`grand_total`='$Grand_total' WHERE `id`='$last_id'")or die(mysql_error($connection));

				if ($que==true) {
					echo "3";
				}
				else{
					echo "4";
				}

			}
			else{
				echo "2";
			}
	}

?>