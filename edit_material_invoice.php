<?php
 $user_id=$_SESSION['login_user'];
 $utype=$_SESSION['user_type']=$row['type'];
 $sub=mysql_query("SELECT * FROM user_profile WHERE type='$utype' and id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];

 $query = mysql_query("SELECT * from material_invoice_gen")or die(mysql_error($connection));
       		$data=mysql_fetch_array($query);
       			     	 $challan_no = $data['challan_no'];
       			 
       			   $chall=explode(',',$challan_no);
					   foreach($chall as $cha)
					   {
					     	      $cha;
					   }

 ?>
<div class="row">
	<h3>Invoices 
		<!-- <a  href="logproduct.php?us_ty=<?php echo $utype; ?>" style="float:right;"> + New Invoice</a></h3><hr> -->
	<?php 
	  	if($utype=='admin')
		{
	   ?>
	 <a  href="dashboard.php?page=material_invoices" style="float:right;"> Invoice In Material Inward</a></h3><hr>
	  <?php 
	 	 }
	 	 else
	 	 {
	   ?>
	   <a  href="userlogproduct.php" style="float:right;"> + Invoice In Material Inward</a></h3><hr>
	<?php } ?>

	<div class="col-lg-12" id="filter"> 
	    <input type="hidden" name="us_id" id="us_id" value="<?php echo $user_id; ?>">
	    <input type="hidden" name="us_ty" id="us_ty" value="<?php echo $utype; ?>">

		<div class="col-md-3">
		<label>From Date <span class="required_field">*</span></label>
			<input type="date" class="form-control" name="fromDate" id="fromDate" data-placeholder="From Date" required aria-required="true">
		</div>
		
		<div class="col-md-3">
			<label>To Date <span class="required_field">*</span></label>
			<input type="date" class="form-control" name="toDate" id="toDate" data-placeholder="To Date" required aria-required="true" onclick="check()">
			<p id="msg1"></p>
		</div>

		<div class="col-md-3">
			<label>Project <span class="required_field">*</span></label>
			<select name="sel_pro" id="sel_pro" class="form-control" required="">
			<option value="">Select Project</option>
			<?php
			if($utype=='admin'){
				$sq = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
				}else{
					$sq = mysql_query("SELECT a.* FROM new_project a INNER JOIN `project_team` f ON a.id=f.pro_id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
				}
					while($arr=mysql_fetch_array($sq))
					{
				?>
				<option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
			<?php } ?>
			</select>
		</div>
		<div class="col-md-3">
			<label>Supplier Name</label>
				<select name="supp_name" id="supp_name" class="form-control">
				<option value="">Select Supplier</option>
				<?php 
					$sq = mysql_query("SELECT * FROM mst_supplier")or die(mysql_error($connection));
					while($arr=mysql_fetch_array($sq))
					{
				?>
					<option value="<?php echo $arr['id']; ?>"><?php echo $arr['name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="panel-body"></div>
	    <div class="col-md-12" style="float: right;">
			<button name="search" id="search" type="submit" class="btn btn-primary">Search&nbsp;<span class="glyphicon glyphicon-search"></span></button>
		</div>
<div class="panel-body"></div>
	</div>
<div class="col-lg-12" id="reportdata">
        <h4>Material Inward Register List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  
			  <th>Date</th>
			  <th>Project</th>
			  <th>Supplier</th>
			  <th>Material</th>
			  <th>Descriptions</th>
			  <th>Unit</th>
			  <th>Rate</th>
			  <th>Qty</th>
			  <th>Basic Amt</th>
			  <th>Tax Rate(%)</th>
			  <th>Tax Amt</th>
			  <th>SGST</th>
			  <th>CGST</th>
			  <th>Total Amt</th>
			  <th>GRN</th>
			  <th>PO/WO No</th>
			  <th>Challan No</th>
			  <th>Batch No</th>
			  <th>Gadi No</th>
		
			<!--   <th>Action</th> -->
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	if($utype=='admin'){
                
		  		$sql = mysql_query("SELECT b.mat_name,b.brand_name,c.name,d.pro_name, a.* FROM `material_procurement` a INNER JOIN mst_material b ON a.mate_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id INNER JOIN new_project d ON a.pro_id=d.id left join material_invoice_gen e  on a.id=e.challan_no ")or die(mysql_error($connection));
		  	}else{
		  		$sql = mysql_query("SELECT b.mat_name,b.brand_name,c.name,d.pro_name, a.* FROM `material_procurement` a INNER JOIN mst_material b ON a.mate_id=b.id INNER JOIN mst_supplier c ON a.supp_id=c.id INNER JOIN new_project d ON a.pro_id=d.id INNER JOIN `project_team` f ON d.id=f.pro_id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
		  	}
		  		while ($row=mysql_fetch_array($sql)) {
		  			$sr_no++;
		  			$id = $row['id'];
		   ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			 <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].')';?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['rate']; ?></td>
			  <td><?php echo $row['qty']; ?></td>
			  <td><?php echo $row['amount']; ?></td>
			  <td><?php echo $row['tax_value'];?></td>
			  <td><?php echo $row['tax_amt'];?></td>
			  <td><?php echo $row['sgst']; ?></td>
			  <td><?php echo $row['cgst']; ?></td>
			  <td><?php echo $row['total_amt']; ?></td>
		      <td><?php echo $row['grn']; ?></td> 
			  <td><?php echo $row['po_wo_no']; ?></td>
			  <td><?php echo $row['challan']; ?></td>
			  <td><?php echo $row['batch_no']; ?></td>
			  <td><?php echo $row['gadi_no']; ?></td>
			 <!--  <td>
			   <input type="checkbox" name="mult_po[]" value="<?php echo $id;?> ">
			  </td>
 -->
			
			</tr>
			<?php } ?>
		  </tbody>
		</table>
			<!-- <a href='dashboard.php?page=invoice_mat_pro&id=<?php echo $id; ?>' title='View PO' data-toggle='tooltip'><button class="btn btn-sm btn-info" type="button">Generate Invoive</button></a> -->
		 
	</div>
	<script>
$('#search').click(function()
	{
		var fromDate=$('#fromDate').val();
		var toDate=$('#toDate').val();
		var sel_project=$('#sel_pro').val();
		 var supp_name=$('#supp_name').val();
		var us_id=$('#us_id').val();
		var us_ty=$('#us_ty').val();

		if(fromDate=="" || toDate=="" || sel_project=="" || supp_name=="")
			{
				alert('Please Select Dates and Project.');
				// $('#toDate').css('borderColor','red');
				// $('#msg1').html('Please Select To Date.');
				// $('#msg1').css('color','red');
			}
			else{
			
			  $.ajax({
			  
				    url:'mat_invoice_filter.php',
				    type:'POST',
				    data:{
					        fromDate:fromDate,
					        toDate:toDate,
					        sel_project:sel_project,
					        us_id:us_id,
						    us_ty:us_ty,
					        supp_name:supp_name

				    },
				    success:function(data)
				    {
				      //alert(data);
				      $('#reportdata').html('');
				      $('#reportdata').html(data);

				      $('#example').DataTable({

						     "dom": 'lBfrtip',
						     "buttons": [
						            {
						                extend: 'collection',
						                text: 'Export',
						                exportOptions: {
						                   columns: [ 0, 1, 2]
						                    
						                },
						                buttons: [
						                    // 'copy',
						                    'excel'
						                    // 'csv',
						                    // 'pdf',
						                    // 'print'
						                ]
						            }
						        ]
						  });
      
					      var table=$('#example').DataTable();
						      table
						      .order([[1,'desc']])
						      .draw(false);
				    }
			 });

		}
	});
</script>