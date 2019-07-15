<?php 
 $user_id=$_SESSION['login_user'];
 $utype=$_SESSION['user_type']=$row['type']; 
 $sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];
?>
<div class="row" id="reportdata">
<h3> Dashboard</h3><hr><div class="col-md-12" style="
    padding: 0px 0px 0px 0px;
">
  <div class="col-md-2" >
    <div class="small-box bg-aqua">
          <div class="inner">
                        <h3>4</h3>
             
              <p>Total Projects</p>
          </div>
          <div class="icon">
              <i class="fa fa-tasks" style="color:#f68e41"></i>
          </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right" ></i></a>
      </div>
  </div>
  <div class="col-md-2">
 
         <div class="small-box bg-aqua">
          <div class="inner">
                        <h3>1</h3>
               <p>Total Contractors</p>
          </div>
          <div class="icon">
              <i class="fa fa-users" style="color:#2bb2e7"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div>
  <div class="col-md-2">
    <div class="small-box bg-aqua">
          <div class="inner">
                    <h3>0</h3>
              <p>Total Material</p>
          </div>
          <div class="icon">
              <i class="fa fa-tag " style="color:#0082c6"></i>
          </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div>
  <div class="col-md-2">
    <div class="small-box bg-aqua">
          <div class="inner">
                        <h3>0</h3>
              <p>Purchase Order</p>
          </div>
          <div class="icon">
              <i class="fa fa-file" style="color:#add544"></i>
          </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div>
  <div class="col-md-2">
    <div class="small-box bg-aqua">
          <div class="inner">
                        <h3>0</h3>
              <p> Debit Note</p>
          </div>
          <div class="icon">
              <i class="fa fa-file" style="color:#ed2f59" ></i>
          </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div>
  <div class="col-md-2">
    <div class="small-box bg-aqua">
          <div class="inner">
                        <h3>0</h3>
              <p>WOrk Order</p>
          </div>
          <div class="icon">
              <i class="fa fa-file" style="color:#2bb2e7"></i>
          </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div>
</div>
   <?php 
   		if($utype=='admin'){
   ?>
    <h4>Recent Projects</h4>
	<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		<thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Project Name</th>
			  <th>Owner Name</th>
			  <th>Maha Rera No</th>
			  <th>State</th>
			  <th>City</th>
			  <th>Address</th>
			  <th>Total Saleble Area</th>
			  <th>Neo Allowted Area</th>
			  <th>Neo Allowted Rate</th>
			</tr>
		</thead>
		<tbody>
		  <?php 
		  	$sr_no=0;
		  	if($utype=='admin'){
		  	$query = mysql_query("SELECT b.name as st_name,c.ct_name, a.* FROM `new_project` a INNER JOIN tbl_states b ON a.state=b.id INNER JOIN city c ON a.city=c.ct_id" )or die(mysql_error($connection));
		  }else{
		  	 $query = mysql_query("SELECT b.name as st_name,c.ct_name, a.* FROM `new_project` a INNER JOIN tbl_states b ON a.state=b.id INNER JOIN city c ON a.city=c.ct_id INNER JOIN `project_team` d ON a.id=d.pro_id WHERE d.emp_id='$user_id'" )or die(mysql_error($connection));
		  }
		  	while($row=mysql_fetch_array($query))
		  	{
		  		$sr_no++;
		  		$id=$row['id'];
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['owner_name']; ?></td>
			  <td><?php echo $row['maharera_no']; ?></td>
			  <td><?php echo $row['st_name']; ?></td>
			  <td><?php echo $row['ct_name']; ?></td>
			  <td><?php echo $row['address']; ?></td>
			  <td><?php echo $row['total_sale_area']; ?></td>
			  <td><?php echo $row['neo_allow_area']; ?></td>
			  <td><?php echo $row['neo_allow_rate']; ?></td>
			</tr>
		<?php } ?>
		  </tbody>
		</table>
	<?php }else{ ?>
	<h4>Daily Work Report</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Date</th>
			  <th>Project</th>
			  <th>Contractor Name</th>
			  <th>Work Type</th>
			  <th>No of Labours</th>
			  <th>Work Done/Volume</th>
			  <th>Unit</th>
			  <th>Value</th>
			</tr>
		  </thead>
		  <tbody>
		  	<?php 
			  $sr_no=0;
			  if($utype=='admin'){
				$sql = mysql_query("SELECT e.pro_name,b.name,c.description,d.unit,a.* FROM `daily_works` a INNER JOIN mst_contractor b ON a.cont_id=b.id INNER JOIN mst_task c ON a.work_type=c.id INNER JOIN mst_unit d ON a.unit_id=d.id INNER JOIN new_project e ON a.pro_id=e.id")or die(mysql_error($connection));
			  }else{
			  	$sql = mysql_query("SELECT e.pro_name,b.name,c.description,d.unit,a.* FROM `daily_works` a INNER JOIN mst_contractor b ON a.cont_id=b.id INNER JOIN mst_task c ON a.work_type=c.id INNER JOIN mst_unit d ON a.unit_id=d.id INNER JOIN new_project e ON a.pro_id=e.id INNER JOIN `project_team` f ON e.id=f.pro_id WHERE f.emp_id='$user_id' ")or die(mysql_error($connection));
			  }
			  	while($row=mysql_fetch_array($sql)){
			  	$sr_no++;
		  		$id=$row['id'];
		  	?>

			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['no_labour']; ?></td>
			  <td><?php echo $row['volume_of_work']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['value']; ?></td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>

	<?php } ?>

</div>
