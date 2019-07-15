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

		$sql = mysql_query("SELECT * FROM daily_material_consuption WHERE id='$rec_id'")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
	}
	else{
			$data['date']='';
			$data['pro_id']='';
			$data['mate_id']='';
			$data['description']='';
			$data['unit']='';
			$data['qty']='';
			$data['avail_qty']='';
			$data['bal_qty']='';
			$data['used_for']='';
			$data['comment']='';
		}
?>

<div class="row">
	<h3>Daily Material Consumption</h3><hr>
	
<div class="col-lg-12" id="filter"> 
	<h4>Add Material Daily Material Consumption</h4>
	<form id="frm_consumption" name="frm_consumption" method="post" autocomplete="off">
		<input type="hidden" name="txt_id" class="form-control" value="<?php echo $data['id'];?>"/>
		<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
		<input type="hidden" name="sub_us_id" value="<?php echo $sub_id; ?>">
		<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">
		
		<div class="col-md-3">
			<label>Date <span class="required_field">*</span></label>
			<input type="date" name="date" id="date" class="form-control" data-placeholder="Date" required aria-required="true" value="<?php echo $data['date'];?>"/>
		</div>
		<script>
				$(function(){
				    var dtToday = new Date();
				    
				    var month = dtToday.getMonth() + 1;
				    var day = dtToday.getDate();
				    var year = dtToday.getFullYear();
				    if(month < 10)
				        month = '0' + month.toString();
				    if(day < 10)
				        day = '0' + day.toString();
				    
				    var maxDate = year + '-' + month + '-' + day;
				    // alert(maxDate);
				    $('#date').attr('max', maxDate);
				});

			</script>

		<div class="col-md-3">
			<label>Project Name <span class="required_field">*</span></label>
			<select name="sel_project" id="sel_project" class="form-control" required="">
			<?php 
				if(!empty($rec_id))
				{	
				  $sq = mysql_query("SELECT b.* FROM daily_material_consuption a INNER JOIN new_project b ON a.pro_id=b.id WHERE a.id='$rec_id'")or die(mysql_error($connection));
				$arr=mysql_fetch_array($sq);
				
			 ?>
			 <option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
			 <?php 
			if($utype=='admin'){
				$sq = mysql_query("SELECT DISTINCT(pro_name),a.* FROM new_project a INNER JOIN material_stock b ON a.id=b.pro_id")or die(mysql_error($connection));
			}else{
				$sq = mysql_query("SELECT DISTINCT(pro_name),a.* FROM new_project a INNER JOIN material_stock b ON a.id=b.pro_id INNER JOIN `project_team` f ON a.id=f.pro_id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
			}
					while($arr=mysql_fetch_array($sq))
					{
			  ?>
			  <option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
			 <?php } }else{?>
			<option value="">Select Project</option>
			<?php 
			if($utype=='admin'){
				$sq = mysql_query("SELECT DISTINCT(pro_name),a.* FROM new_project a INNER JOIN material_stock b ON a.id=b.pro_id")or die(mysql_error($connection));
			}else{
				$sq = mysql_query("SELECT DISTINCT(pro_name),a.* FROM new_project a INNER JOIN material_stock b ON a.id=b.pro_id INNER JOIN `project_team` f ON a.id=f.pro_id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
			}
				while($arr=mysql_fetch_array($sq))
				{
			?>
			<option value="<?php echo $arr['id']; ?>"><?php echo $arr['pro_name']; ?></option>
			<?php } }?>
			</select>
		</div>
		
		<div class="col-md-3">
			<label>Material Name <span class="required_field">*</span></label>
			<select name="material_name" id="material_name" class="form-control" required="">
				<option value="">Select Material</option>
			</select>
		</div>

		<div class="col-md-3">
			<label>Description</label>
			<textarea class="form-control" name="txt_desc" id="txt_desc" placeholder="Description" readonly=""><?php echo $data['description'];?></textarea>
		</div>
		<div class="panel-body"></div>

		<!-- <div class="col-md-3">
			<label>Unit</label>
			<input type="text" class="form-control" name="txt_unit" id="txt_unit" placeholder="Unit"  value="<?php echo $data['unit'];?>" readonly="">
		</div> -->
		<div class="col-md-3">
		<label>Unit <span class="required_field">*</span></label>
			<!-- <input type="text" class="form-control" name="txt_unit" id="txt_unit" placeholder="Unit"  value=""> -->
			<select name="txt_unit" id="txt_unit" class="form-control" required="">
				<?php 
					if(!empty($rec_id))
					{	
					  $sq = mysql_query("SELECT b.* FROM daily_material_consuption a INNER JOIN mst_unit b ON a.unit=b.unit WHERE a.id='$rec_id'")or die(mysql_error($connection));
					$arr=mysql_fetch_array($sq);
					
				 ?>
				 <option value="<?php echo $arr['unit']; ?>"><?php echo $arr['unit']; ?></option>
				 <?php 
				 	$sq = mysql_query("SELECT * FROM mst_unit")or die(mysql_error($connection));
						while($arr=mysql_fetch_array($sq))
						{
				  ?>
				  <option value="<?php echo $arr['unit']; ?>"><?php echo $arr['unit']; ?></option>
				 <?php } }else{?>
				<option value="">Select Unit</option>
				<?php 
					$sq = mysql_query("SELECT * FROM mst_unit")or die(mysql_error($connection));
					while($arr=mysql_fetch_array($sq))
					{
				?>
				<option value="<?php echo $arr['unit']; ?>"><?php echo $arr['unit']; ?></option>
				<?php } }?>
			</select>	
		</div>
		<div class="col-md-3">
			<label>Total Quantity</label>
			<input type="text" class="form-control" name="avail_qty" id="avail_qty" placeholder="Total Qty" readonly onkeyup="taxoncalculation();" value="<?php echo $data['avail_qty'];?>">
		</div>

		<div class="col-md-3">
			<label>Quantity <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="txt_qty" id="txt_qty" placeholder="Quantity" onkeyup="taxoncalculation();" value="<?php echo $data['qty'];?>" required="" step=".01">
		</div>
		
		<div class="col-md-3">
			<label>Balance Quantity</label>
			<input type="text" class="form-control" name="bal_qty" id="bal_qty" value="<?php echo $data['bal_qty'];?>" placeholder="Balance Qty" readonly >
		</div>
		<div class="panel-body"></div>

		<div class="col-md-3">
			<label>Contractor Name <span class="required_field">*</span></label>
			<select name="txt_con_name" id="txt_con_name" class="form-control" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_contractor a INNER JOIN daily_material_consuption b ON a.id=b.cont_id WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM mst_contractor")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

				<?php } }else{ ?>
				<option value="">Select Contractor</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM mst_contractor")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
				<?php } } ?>
			</select>
		</div>
		<div class="col-md-4">
			<label>Used For</label>
			<textarea class="form-control" placeholder="Used For" name="used_for" id="used_for" ><?php echo $data['used_for'];?></textarea>
		</div>
		<div class="col-md-4">
			<label>Comment</label>
			<textarea class="form-control" placeholder="Comment" name="comment" id="comment" ><?php echo $data['comment'];?></textarea>
		</div>
		
		<div class="panel-body"></div>
 		<div class="col-md-4">
 		<?php if(empty($rec_id)){ ?>
			<button name="btn_contractor" id="btn_contractor" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
		<?php }else{ ?>
			<button name="btn_contractor_edit" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
		<?php } ?>
			<div id="msg"></div>
		</div>
		
	</form>
</div>

<div class="panel-body"></div>
	<div class="col-lg-12" id="reportdata">
        <h4>Daily Material Consumption List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Date</th>
			  <th>Project</th>
			  <th>Contractor</th>
			  <th>Material</th>
			  <th>Descriptions</th>
			  <th>Unit</th>
			  <th>Total Qty</th>
			  <th>Quantity</th>
			  <th>Balance Qty</th>
			  <th>Used For</th>
			  <th>Comment</th>
			  <!-- <th>Action</th> -->
			</tr>
		  </thead>
		  <tbody>
		  <?php 
		  	$sr_no=0;
		  	if($utype=='admin'){
		  		$sql = mysql_query("SELECT b.pro_name,c.mat_name,c.brand_name,d.name, a.* FROM `daily_material_consuption` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN mst_contractor d ON a.cont_id=d.id")or die(mysql_error($connection));
		  	}
		  	else{
		  		$sql = mysql_query("SELECT b.pro_name,c.mat_name,c.brand_name,d.name, a.* FROM `daily_material_consuption` a INNER JOIN new_project b ON a.pro_id=b.id INNER JOIN mst_material c ON a.mate_id=c.id INNER JOIN `project_team` f ON b.id=f.pro_id INNER JOIN mst_contractor d ON a.cont_id=d.id WHERE f.emp_id='$user_id'")or die(mysql_error($connection));
		  	}
		  	while($row = mysql_fetch_array($sql))
		  	{
		  		$sr_no++;
		  		$id = $row['id'];
		  ?>
			<tr id="invoice-23">
			  <td><?php echo $sr_no; ?></td>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['pro_name']; ?></td>
			  <td><?php echo $row['name']; ?></td>
			  <td><?php echo $row['mat_name'].' ('.$row['brand_name'].")"; ?></td>
			  <td><?php echo $row['description']; ?></td>
			  <td><?php echo $row['unit']; ?></td>
			  <td><?php echo $row['avail_qty']; ?></td>
			  <td><?php echo $row['qty']; ?></td>
			  <td><?php echo $row['bal_qty']; ?></td>
			  <td><?php echo $row['used_for']; ?></td>
			  <td><?php echo $row['comment']; ?></td>
			 <!--  <td>
			  	<a href='dashboard.php?page=daily_consumption&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> |
			  	<a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a>
			  </td> -->
			</tr>
		<?php } ?>
		  </tbody>
		</table>
	</div>
</div>

<!--Delete model start here-->
<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete Consumpiton</h4>
		  	</div>
			   <form  id="del" autocomplete="off" enctype="multipart/formdata" method="POST">
				    <div class="modal-body" id="deleteContent">
		               <input type="hidden" name="data" id="del_id">
		               <div class="form-group">
		                    <p><b>Are you sure want to delete ?</b></p>
		              </div>
				    </div>
				    <center><p id='dmsg'></p></center>
			        <div class="modal-footer">
		               <button class="btn btn-success submit" id="delete_btn" name="submit">Confirm</button>
		               <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
			        </div>
			  </form>
		</div>
	</div>
</div>
<!-- project material script -->
<script type="text/javascript">
$(document).ready(function(){
    $('#sel_project').on('change',function(){
        var pro_id = $(this).val();

        if(pro_id){

            $.ajax({
                type:'POST',
                url:'get_project_materil.php',
                data:'pro_id='+pro_id,
                success:function(html){
                    $('#material_name').html(html);
                }

            }); 
        }else{
           $('#material_name').html('<option value="">Select Project First</option>'); 
        }
    });
});
</script>
<script>
onkeyup="taxoncalculation()"
function taxoncalculation()
{	
	var txt_qty = document.getElementById('txt_qty').value;
    var avail_qty = document.getElementById('avail_qty').value;
   
	var remain = parseFloat(avail_qty)- parseFloat(txt_qty); //reduce from avail qty

 	if (Number(avail_qty) >= Number(txt_qty)) 
 	{
    	if(!isNaN(remain)){
    		document.getElementById('bal_qty').value = parseFloat(remain).toFixed(2);
	    }
	    else{
    		document.getElementById('bal_qty').value = parseFloat(avail_qty).toFixed(2);
	    }
	    $('#txt_qty').css('borderColor','');
		$('#msg').html('');
	}
	else{
			document.getElementById('bal_qty').value ='';
			$('#txt_qty').css('borderColor','red');
			$('#msg').html('Check Total Quantity First');
			$('#msg').css('color','red');
		}
}
</script>
<!-- script for select material information-->
<script>
	$(document).ready(function(){
	    $('#material_name').on('change',function(){
	        var id = $(this).val();

	      if(id!=null)
	        {
	          $.ajax({
	                    type:'POST',
	                    url: "get_mate_stock.php",
	                    data:{
	                            id:id
	                    },
	                    dataType: "JSON",
	                    success:function(data)
	                    {
	                   		$('#txt_desc').val(data.description);
	                    	$('#txt_unit').val(data.unit);
	                    	$('#avail_qty').val(data.bal_qty);
	                    }
	                }); 
	          }else{
	              $('#material_name').html('Select Material first'); 
	          }
	      });
	});
</script>
<!-- Delete Script start -->
<script>
$("#delete_btn").click(function(e)
   { 
    	var id=$('#del_id').val();
	 	e.preventDefault();

	       $.ajax({
                    url:'delete_consumption.php',
                    type: "POST",
                    data: {
                           id:id  
                    },
                    success: function(data)
                    {
                        if(data==1)
                        {
                            swal({
								  position: 'top-right',
 							      type: 'success',
  								  title: 'Record Deleted',
  								  showConfirmButton: false,
  								  timer: 1500
							  })
						  window.setTimeout(function()
						    { 
						     location.reload();
						 	} ,1500);
                        }                          
                    }
                });
    })
</script>


<!-- Insert Script -->
<script>

$('form#frm_consumption').submit(function(e){

    e.preventDefault();
	
	if(document.pressed == 'save')
	{
			$("button#btn_contractor").button('loading');
		    $.ajax({
						data:$("#frm_consumption").serialize(),
						type:"POST",
						url:'insert_daily_consumption.php',

						success: function(data)
						{
							$("button#btn_contractor").button('reset');
							  // alert(data);	
							if(data==1) 
							{
							    //alert('Voucher Inserted !!!');
							   swal({
									  position: 'top-right',
								      type: 'success',
									  title: 'New Consumption Details Added',
									  showConfirmButton: false,
									  timer: 1500
								  })
								  window.setTimeout(function()
								    { 
								     location.reload();
								 	} ,1500);
								
							}
							else if(data==2)
							{
								// alert('Error..');
								$('#msg').html('Please Check Error.');
								$('#msg').css('color','red');
								return false;
							} 
							
						}
					});
 	}
 else
 	if(document.pressed == 'update')
	{
          	e.preventDefault();
				
  		$("button#update").button('loading');
        $.ajax({
					data:$("#frm_consumption").serialize(),
					type:"POST",
					url:'need_to_work_onit.php',
					success: function(data)
					{
						$("button#update").button('reset');

						if(data==1)
						{
							swal({
								  position: 'top-right',
 							      type: 'success',
  								  title: 'Consumption Info Has Been Updated',
  								  showConfirmButton: false,
  								  timer: 1500
							  })
							  window.setTimeout(function()
							    { 
							      window.location.href= "user_dashboard.php?page=daily_consumption";
							 	} ,1500);
			
						}
						else if(data==3)
						{
							swal({
								  position: 'top-right',
 							      type: 'success',
  								  title: 'Consumption Info Has Been Updated',
  								  showConfirmButton: false,
  								  timer: 1500
							  })
							  window.setTimeout(function()
							    { 
							      window.location.href= "dashboard.php?page=daily_consumption";
							 	} ,1500);
						}
						
					}

			   });
			
	}
});
</script>