<?php

include "config.php";

$fromdate=strtotime($_POST['fromDate']); 
$fromdate=date("Y-m-d",$fromdate);
$todate=strtotime($_POST['toDate']); 
$todate=date("Y-m-d",$todate);
$user_id=$_POST['us_id'];
$utype=$_POST['us_ty'];

$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
?>     
<table id="example" class="datatable table table-striped">
  <thead>
   <tr>
      <th>Sr.No</th>
      <th>Issue Date</th>
      <th>Invoice No</th>
      <th>Party Name</th>
      <th>Discription of Product</th>
	  <th>GST No</th>		  
	  <th>State</th>
	  <th>HSN/SAC</th>
	  <th>Basic Amount</th>
	  <th>CGST@ 2.5%</th>
	  <th>SGST@ 2.5%</th>
	  <th>IGST@ 5%</th>
	  <th>CGST@ 6%</th>
	  <th>SGST@ 6%</th>
	  <th>IGST@ 12%</th>
	  <th>CGST@ 9%</th>
	  <th>SGST@ 9%</th>
	  <th>IGST@ 18%</th>
	  <th>CGST@ 14%</th>
	  <th>SGST@ 14%</th>
	  <th>IGST@ 28%</th>
	  <th>Total Tax</th>
	  <th>Total Amount</th>
	</tr>
  </thead>
  <tbody>
        <?php
		  if($fromdate!='' && $todate!='')
			{
		         
		     $sr_no=0;
        	if($utype=='admin')
        	{
        	$sq = mysql_query("SELECT e.sgst,e.cgst,e.igst,e.value,b.base_price,b.reference,c.issue_date,c.number,c.customer_name,c.cust_gst_no,c.invoice_state,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id LEFT JOIN common c ON c.id=a.common_id INNER JOIN item_tax d ON a.id=d.item_id INNER JOIN tax e ON e.value=d.tax_value WHERE c.type='Invoice' and c.user_id='$user_id' and a.status=1 AND  date(c.issue_date) BETWEEN  '$fromdate' AND '$todate' AND c.user_id='$user_id' ORDER BY c.issue_date DESC")or die(mysql_error($connection));
        	}
        	else{
        		$sq = mysql_query("SELECT e.sgst,e.cgst,e.igst,e.value,b.base_price,b.reference,c.issue_date,c.number,c.customer_name,c.cust_gst_no,c.invoice_state,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id LEFT JOIN common c ON c.id=a.common_id INNER JOIN item_tax d ON a.id=d.item_id INNER JOIN tax e ON e.value=d.tax_value WHERE c.type='Invoice' and c.user_id='$sub_id' and a.status=1 AND  date(c.issue_date) BETWEEN  '$fromdate' AND '$todate' AND c.user_id='$user_id' ORDER BY c.issue_date DESC")or die(mysql_error($connection));
        	}
		  	while($row=mysql_fetch_array($sq))
		  	{
		  		$sr_no++;
		  		$id1=$row['id'];
		  		$qty=$row['quantity'];
		  		// $price=$row['base_price'];
		  		$unit_price=$row['unitary_cost'];
		  		$disc_amt=$row['disc_amt'];
		  		$base_amt=$qty*$unit_price;
		  		$base_amount=$base_amt-$disc_amt;
		  		if($utype=='admin')
				{
			  	$sql111 = mysql_query("SELECT * FROM company where user_id='$user_id'")or die(mysql_error($connection));
			  }
			  else{
			  	$sql111 = mysql_query("SELECT * FROM company where user_id='$sub_id'")or die(mysql_error($connection));
			  }
                        $res = mysql_fetch_array($sql111);
                        $code=$res['state_code'];
						$cod=$row['state_code'];
	  ?>
	        <tr>
	          <td><?php echo $sr_no;?></td>
	          <td><?php echo date('Y-m-d', strtotime($row['issue_date']));?></td>
	          <td><?php echo $row['number']; ?></td>
	          <td><?php echo $row['customer_name']; ?></td>
	          <td><?php echo $row['reference']; echo"(".$row['description'].")"; ?></td>
	          <td><?php echo $row['cust_gst_no']; ?></td>
			  <td><?php echo $row['invoice_state']; ?></td>
	          <td><?php echo $row['hsn_code']; ?></td>
	          <td><?php echo $base_amount; ?></td>
	          <?php 

	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.igst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=5 and c.id='$id1'")or die(mysql_error($connection));
	          			$arr=mysql_fetch_array($gst);

	          			$tax = $arr['tax_amt'];
		  				$a=$tax/2; 	// Divide tax into SGST and CGST
		  		 if ($code==$cod) {
	           ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
	          <td>0</td>
	          <?php 
	          	}
	          	else{
	           ?>
	            <td>0</td>
	            <td>0</td>
	           <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	           <?php 
	       			}
	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=12 and c.id='$id1'")or die(mysql_error($connection));
	          			$arr=mysql_fetch_array($gst);

	          			 $tax = $arr['tax_amt'];
		  				 $a=$tax/2; 
		  				 	// Divide tax into SGST and CGST
		  			if ($code==$cod) {
	           ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
	          <td>0</td>
	          <?php 
	          	}
	          	else{
	           ?>
	            <td>0</td>
	            <td>0</td>
	            <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	         <?php 
	     		}
	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=18 and c.id='$id1'")or die(mysql_error($connection));
	          			$arr=mysql_fetch_array($gst);

	          			 $tax = $arr['tax_amt'];
		  				 $a=$tax/2; 	// Divide tax into SGST and CGST
		  				 if ($code==$cod) {
	           ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
		      <td>0</td>
		      <?php 
		        }
		        else{
		      ?>
	            <td>0</td>
	            <td>0</td>
	          <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	         <?php 
	     		}
	          		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN item c ON c.id=a.item_id INNER JOIN common d ON d.id=c.common_id where d.type='Invoice' and b.value=28 and c.id='$id1'")or die(mysql_error($connection));
	          			$arr=mysql_fetch_array($gst);
	          			
	          			 $tax = $arr['tax_amt'];
		  				 $a=$tax/2; 	// Divide tax into SGST and CGST
		  			if ($code==$cod) {
	           ?>
	          <td><?php echo $a; ?></td>
	          <td><?php echo $a; ?></td>
	          <td>0</td>
		      <?php 
		        }
		        else{
		      ?>
	            <td>0</td>
	            <td>0</td>
	           <td><?php if(!empty($tax)){echo $tax;}else{echo "0";} ?></td>
	         <?php } ?> 
	          <td><?php echo $row['tax_amt']; ?></td>
	          <td><?php echo $row['price']; ?></td>
	        </tr>
	        <?php 
	    		} 
	   			 }
	        ?>
          </tbody>
</table>    
          
