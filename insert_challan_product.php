<?php 
// var_dump($_POST);
include "config.php";

$txt_product = $_POST['txt_product'];
$txt_hsn_no = $_POST['txt_hsn_no'];
$txt_desc = $_POST['txt_desc'];
$txt_cost = $_POST['txt_cost'];
$txt_qty = $_POST['txt_qty'];
$select_tax = $_POST['select_tax'];
$txt_discount = $_POST['txt_discount'];
$txt_price = $_POST['txt_price'];
$txt_amt = $_POST['tax_amt'];
$disc_amt = $_POST['disc_amt'];

$dt=date('y-m-d H:i:s');

$ssid=$_POST['txt_session'];

$query = mysql_query("SELECT * FROM product WHERE reference='$txt_product'")or die(mysql_error($connection));
	$row = mysql_fetch_array($query);

	$pr_id = $row['id'];
	// $units = $row['units'];
	// $sold=$units-$txt_qty;
	$sold=$row['sold'];
	$sold_item=$txt_qty+$sold;

	$count = mysql_num_rows($query);
if($count>0)
{
	// echo "0";
	$sql21 = mysql_query("UPDATE product SET `hsn_code`='$txt_hsn_no',`description`='$txt_desc',`base_price`='$txt_cost',`updated_at`='$dt',`session`='$ssid',sold='$sold_item' WHERE id='$pr_id'")or die(mysql_error($connection));

			if($sql21==true)
			{
				  $last_id1 = mysql_insert_id();

				  $temp=0;
			$aa = mysql_query("SELECT * FROM common ")or die(mysql_error($connection));
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
					
				$sql31 = mysql_query("INSERT INTO item (`quantity`,`discount`,`tax_amt`,`disc_amt`,`common_id`,`product_id`,`description`,`unitary_cost`,`price`,`hsn_code`,`session`,`status`) VALUES ('$txt_qty','$txt_discount','$txt_amt','$disc_amt','$temp','$pr_id','$txt_desc','$txt_cost','$txt_price','$txt_hsn_no','$ssid','1')")or die(mysql_error($connection));

	 				if($sql31==true)
		 				{
		 					$item_id=mysql_insert_id();
					
 								if(!empty($_POST['chk'])) 
 								{
	    							foreach($_POST['chk'] as $check) 
	    							 {
			 							$sql61 = mysql_query("INSERT INTO item_tax (`item_id`,`tax_value`) VALUES ('$item_id','$check')");
					 							
					 						 if($sql61==true)
					 							{
					 								echo "1";
					 							}
												else
												{
													echo "error";
												}
									 }
								}
								else
								{
									echo "1";
								}
		 				}			
			}

}
else{

	$sql2 = mysql_query("INSERT INTO product (`reference`,`hsn_code`,`description`,`base_price`,`created_at`,`session`,`sold`) VALUES ('$txt_product','$txt_hsn_no','$txt_desc','$txt_cost','$dt','$ssid','$sold_item')")or die(mysql_error($connection));

			if($sql2==true)
			{
				  $last_id1 = mysql_insert_id();
				  $temp=0;
				$aa = mysql_query("SELECT * FROM common ")or die(mysql_error($connection));
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
					
				$sql3 = mysql_query("INSERT INTO item (`quantity`,`discount`,`tax_amt`,`disc_amt`,`common_id`,`product_id`,`description`,`unitary_cost`,`price`,`hsn_code`,`session`,`status`) VALUES ('$txt_qty','$txt_discount','$txt_amt','$disc_amt','$temp','$last_id1','$txt_desc','$txt_cost','$txt_price','$txt_hsn_no','$ssid','1')")or die(mysql_error($connection));

	 				if($sql3==true)
		 				{
		 					$item_id=mysql_insert_id();
					
 								if(!empty($_POST['chk'])) 
 								{
	    							foreach($_POST['chk'] as $check) 
	    							 {
       							  
			 							$sql6 = mysql_query("INSERT INTO item_tax (`item_id`,`tax_value`) VALUES ('$item_id','$check')");
					 							
					 						 if($sql6==true)
					 							{
					 								echo "1";
					 							}
												else
												{
													echo "error";
												}
									 }
								}
								else
								{
									echo "1";
								}
		 										
		 				}
		 				
			}
 	}
?>