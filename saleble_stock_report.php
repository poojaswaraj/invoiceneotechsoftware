<?php 
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
 ?>
<div class="row">
<h3>Saleble Stock Report</h3><hr>
	<div class="col-lg-12" id="reportdata">
        <h4>Recent Saleble Stock Report</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Project Name</th>
			  <th>Neo Allowted Area</th>
			  <th>Neo Allowted Rate</th>
			  <th>Consumed Area</th>
			  <th>Consumed Area Rate</th>
			  <th>Balance Area</th>
			</tr>
		  </thead>
		  <tbody>
		  <!-- <?php 
		  	$sr_no=0;
		 	$sql = mysql_query("SELECT b.pro_name,b.neo_allow_area,b.neo_allow_rate,a.* FROM `flat_booking` a INNER JOIN new_project b ON a.pro_id=b.id")or die(mysql_error($connection));
		  	while ($row=mysql_fetch_array($sql)) {
		  		$sr_no++;
	  			$neo_area=$row['neo_allow_area'];
	  			$neo_rate=$row['neo_allow_rate'];
	  			$flat_area=$row['area'];
	  			$consum_area = $neo_area-$flat_area;
		   ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['neo_allow_area']; ?></td>
			  <td><?php echo $row['neo_allow_rate']; ?></td>
			  <td><?php echo $row['area']; ?></td>
			  <td><?php echo $row['rate']; ?></td>
			  <td><?php echo $consum_area; ?></td>
			</tr>
		  <?php } ?> -->	
		  </tbody>
		</table>
	</div>
</div>
