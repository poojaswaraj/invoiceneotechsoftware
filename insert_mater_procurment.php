<?php 
	
	include "config.php";

	$user_id = $_POST['user_id'];
	$sub_id =$_POST['sub_us_id'];
	$sub_us_ty= $_POST['sub_us_ty'];
	$supp_name = $_POST['supplier_name'];
	$date = $_POST['date'];
	$material_name = $_POST['material_name'];
	$txt_desc = addslashes($_POST['txt_desc']);
	$txt_unit = $_POST['txt_unit'];
	$txt_rate = $_POST['txt_rate'];
	$txt_qty = $_POST['txt_qty'];
	$txt_amount = $_POST['txt_amount'];
	$select_tax = $_POST['select_tax'];
	$tax_amt = $_POST['tax_amt'];
	$txt_sgst = $_POST['txt_sgst'];
	$txt_cgst = $_POST['txt_cgst'];
	$txt_total_amt = $_POST['txt_total_amt'];
	$sel_project = $_POST['sel_project'];
	$grn = $_POST['grn'];
	$po_wo_no = $_POST['po_wo_no'];
	$challan_no = $_POST['challan_no'];
	$dt = date('Y-m-d');
	$batch_no = $_POST['batch_no'];
	$gadi_no = $_POST['gadi_no'];

	$query1 = mysql_query("SELECT * FROM user_profile WHERE type='$sub_us_ty'");
	$row=mysql_fetch_array($query1);
	$type= $row['type'];
//     $sql12=mysql_query("SELECT * from  material_procurement where challan='$challan_no'")or die(mysql_error($connection));
// if(mysql_num_rows($sql12)!=0)
// {
	
// 	echo"3";
// }
// 	else
// 		{
		    if($type=='user')
			{
		      
			$sql = mysql_query("INSERT INTO `material_procurement`(`user_id`,`sub_user_id`, `supp_id`,`pro_id`,`mate_id`,`description`,`unit`,`rate`,`qty`,`amount`,`date`,`tax_value`,`tax_amt`,`total_amt`,`sgst`,`cgst`,`grn`,`po_wo_no`,`challan`,`record_date`,`batch_no`,`gadi_no`) VALUES ('$sub_id','$user_id','$supp_name','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_rate','$txt_qty','$txt_amount','$date','$select_tax','$tax_amt','$txt_total_amt','$txt_sgst','$txt_cgst','$grn','$po_wo_no','$challan_no','$dt','$batch_no','$gadi_no')")or die(mysql_error($connection));
				
				if ($sql==true) 
				{
					$qu = mysql_query("SELECT * FROM `material_stock` WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project'")or die(mysql_error($connection));
					$row=mysql_fetch_assoc($qu);
					$mat_qty = $row['total_qty'];
					$mat_bqty = $row['bal_qty'];
					$tot_qty = $mat_qty+$txt_qty;
					$total_bal=$mat_bqty+$txt_qty;
					
					$arr=mysql_num_rows($qu);

					if($arr==0){
					$query = mysql_query("INSERT INTO `material_stock`(`user_id`, `sub_user_id`,`pro_id`,`mate_id`,`desc`,`unit`,`rate`,`total_qty`,`bal_qty`,`record_date`) VALUES ('$sub_id','$user_id','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_rate','$txt_qty','$txt_qty','$dt')")or die(mysql_error($connection));
						if($query==true)
						{
							echo "1";
						}
						else{
							echo "2";
						}
				}
				else{
						$query = mysql_query("UPDATE `material_stock` SET `user_id`='$sub_id',`sub_user_id`='$user_id',`pro_id`='$sel_project',`mate_id`='$material_name',`desc`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`total_qty`='$tot_qty',`bal_qty`='$total_bal',`update_date`='$dt' WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project'")or die(mysql_error($connection));
						if($query==true)
						{
							echo "1";
						}
						else{
							echo "2";
						}
					}
				}
				else{
					echo "2";
				}
			}//user loop end

			else{

				$sql = mysql_query("INSERT INTO `material_procurement`(`user_id`, `sub_user_id`, `supp_id`, `pro_id`, `mate_id`, `description`, `unit`, `rate`, `qty`,`amount`,`date`, `tax_value`, `tax_amt`, `total_amt`, `sgst`, `cgst`,`grn`, `po_wo_no`, `challan`, `record_date`,`batch_no`,`gadi_no`) VALUES ('$user_id','$sub_id','$supp_name','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_rate','$txt_qty','$txt_amount','$date','$select_tax','$tax_amt','$txt_total_amt','$txt_sgst','$txt_cgst','$grn','$po_wo_no','$challan_no','$dt','$batch_no','$gadi_no')")or die(mysql_error($connection));
				
				if ($sql==true) 
				{
					$qu = mysql_query("SELECT * FROM `material_stock` WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project'")or die(mysql_error($connection));
					$row=mysql_fetch_assoc($qu);
					$mat_qty = $row['total_qty'];
					$mat_bqty = $row['bal_qty'];
					$tot_qty = $mat_qty+$txt_qty;
					$total_bal=$mat_bqty+$txt_qty;
					
					$arr=mysql_num_rows($qu);

					if($arr==0){
					$query = mysql_query("INSERT INTO `material_stock`(`user_id`, `sub_user_id`,`pro_id`, `mate_id`, `desc`, `unit`, `rate`, `total_qty`,`bal_qty`, `record_date`) VALUES ('$user_id','$sub_id','$sel_project','$material_name','$txt_desc','$txt_unit','$txt_rate','$txt_qty','$txt_qty','$dt')")or die(mysql_error($connection));
						if($query==true)
						{
							echo "1";
						}
						else{
							echo "2";
						}
				}
				else{
						$query = mysql_query("UPDATE `material_stock` SET `user_id`='$user_id',`sub_user_id`='$sub_id',`pro_id`='$sel_project',`mate_id`='$material_name',`desc`='$txt_desc',`unit`='$txt_unit',`rate`='$txt_rate',`total_qty`='$tot_qty',`bal_qty`='$total_bal',`update_date`='$dt' WHERE `mate_id`='$material_name' AND `pro_id`='$sel_project'")or die(mysql_error($connection));
						if($query==true)
						{
							echo "1";
						}
						else{
							echo "2";
						}
					}
				}
				else{
					echo "2";
				}
			}

		// }

 ?>