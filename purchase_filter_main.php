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
      <th>Expense Date</th>
      <th>Invoice No</th>
      <th>Party Name</th>
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
        	$query = mysql_query("SELECT * FROM `expenses` WHERE user_id='$user_id' and is_return='Yes'  AND  date(pur_date) BETWEEN  '$fromdate' AND '$todate' ")or die(mysql_error($connection));
        	}
        	else{
        		$query = mysql_query("SELECT * FROM `expenses` WHERE user_id='$sub_id' and is_return='Yes' AND  date(pur_date) BETWEEN  '$fromdate' AND '$todate' ")or die(mysql_error($connection));
        	}
        	while($row=mysql_fetch_array($query))
        	{
        		$sr_no++;
        		$id=$row['id'];

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
        	<!-- <td><?php echo "<a href='dashboard.php?page=import_gst&id=".$row['id']."'>";?><span class="icon fa fa-edit"></span></a></td> -->
	          <td><?php echo $sr_no; ?></td>
	          <td><?php echo $row['pur_date']; ?></td>
	          <td><?php echo $row['invoice_no']; ?></td>
	          <td><?php echo $row['party_name']; ?></td>
	          <td><?php echo $row['gst_no']; ?></td>
	          <td><?php echo $row['state']; ?></td>
	          <td><?php echo $row['hsn_code']; ?></td>
	          <td><?php echo $row['basic_amt']; ?></td>
        <?php 
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=5 and c.id='$id'")or die(mysql_error($connection));
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
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=12 and c.id='$id'")or die(mysql_error($connection));
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
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=18 and c.id='$id'")or die(mysql_error($connection));
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
      		$gst=mysql_query("SELECT b.sgst,b.cgst,b.value,c.tax_amt,a.* FROM purches_tax a INNER JOIN tax b ON b.value=a.tax_value INNER JOIN expenses c ON c.id=a.purches_id where b.value=28 and c.id='$id'")or die(mysql_error($connection));
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
		?>
	          <td><?php echo $row['tax_amt']; ?></td>
	          <td><?php echo $row['total_amt']; ?></td>
	        </tr>
	    <?php 
			 } 
			}
	    ?>
    </tbody>
</table>    
          
