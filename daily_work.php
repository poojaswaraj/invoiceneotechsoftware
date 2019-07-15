


<?php 
	$user_id=$_SESSION['login_user'];
	$utype=$_SESSION['user_type']=$row['type']; 
	$sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
	$array=mysql_fetch_array($sub);
	$sub_id=$array['user_id'];
	// this is for edit record 
	if(isset($_GET['id']))
	{
		$rec_id=$_GET['id'];

		$sql = mysql_query("SELECT * FROM daily_works WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{
		    $data['cont_id']='';
			$data['date']='';
			$data['work_type']='';
			$data['volume_of_work']='';
			$data['no_skill_labour']='';
			$data['no_unskill_labour']='';
			$data['unit_id']='';
			$data['value']='';
			
		   
		}
?>
<div class="row">
	<h3> Work Order</h3><hr>

	<div class="col-lg-12">
		<h4>Work Order</h4>
<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Date</th>
			  <th>Project</th>
			  <th>Contractor Name</th>
			  <th>Work Type</th>
			  <th>No of Skilled Labours</th>
			  <th>No of Unskilled Labours</th>
			  <th>Work Done/Volume</th>
			  <th>Unit</th>
			  <th>Value</th>
			  <th>Action</th>
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
			  <td><?php echo $row['no_skill_labour']; ?></td>
			  <td><?php echo $row['no_unskill_labour']; ?></td>
			  <td><?php echo $row['volume_of_work']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['value']; ?></td>
			  <td>
			  <?php if($utype=='admin'){ ?>
              <a href='dashboard.php?page=edit_daily_work&id=<?php echo $id; ?>' title='Debit Note' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button"> Daily Work </button></a>


			  <!-- 	<a href='dashboard.php?page=daily_works&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">View Debit Note</button><span class="icon fa fa-edit"></span></a> -->
			  <?php }else{ ?>
			  	<a href='user_dashboard.php?page=daily_works&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a>
			  <?php } ?> 
			  	</button>
			  </td>
			</tr>
			<?php } ?>
		  </tbody>
		</table>