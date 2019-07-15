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
		$sql = mysql_query("SELECT d.description,a.* from tbl_work a inner join new_project b on a.pro_id=b.id inner join mst_contractor c on c.id=a.cont_id inner join mst_task d on a.work_type=d.id  where a.id=$rec_id")or die(mysql_error($connection));
		$data=mysql_fetch_array($sql);
		 $data1=$data['date'];
	}
	else{}
?>
<div class="row">
	<h3> Work order </h3><hr>
	<div class="col-lg-12">
	   <h4>Work order </h4>
	   <form id="frm_contractor" name="frm_contractor" autocomplete="off" method="POST">
			<input type="hidden" name="id" class="form-control" value="<?php echo $data['id'];?>"/>
			<input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>"/>
			<input type="hidden" name="sub_user_id" value="<?php echo $sub_user_id; ?>">
			<input type="hidden" name="sub_us_ty" value="<?php echo $utype; ?>">

           <textarea type="hidden" class="form-control" rows="4" name="terms" id="terms" placeholder="Terms"  style="display:none;"><?php echo $arr['terms'];?></textarea>

            <div class="col-md-4">
			<label>Date <span class="required_field">*</span></label>
				<input type="date" name="date" id="date" class="form-control" data-placeholder="Date" required aria-required="true" value="<?php echo $data1; ?>" />
			</div>
			
			<!-- <div class="col-md-4">
				<label>project  name<span class="required_field">*</span></label>
				<input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="project  name" value="<?php if(isset($rec_id)){echo $data['pro_name'];}else{} ?>" style="text-transform:capitalize;" required="">
              
           	</div> --><div class="col-md-4">
				<label>Project <span class="required_field">*</span></label>	
				<select class="form-control" name="pro_name" id="pro_name" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT b.* FROM tbl_work a INNER JOIN new_project b ON a.pro_id=b.id where a.id=$rec_id")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);


				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['pro_name']; ?></option>
				<?php 
				if($utype=='admin'){
					$query = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
				}else{
					$query = mysql_query("SELECT * FROM new_project a INNER JOIN `project_team` d ON a.id=d.pro_id WHERE d.emp_id='$user_id' ")or die(mysql_error($connection));
				}
					while($row=mysql_fetch_array($query))
					  {

				?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>
				<?php } }else{ ?>

					<option value="">Select Project</option>
				<?php 
				if($utype=='admin'){
					$query = mysql_query("SELECT * FROM new_project")or die(mysql_error($connection));
				}else{
					$query = mysql_query("SELECT * FROM new_project a INNER JOIN `project_team` d ON a.id=d.pro_id WHERE d.emp_id='$user_id' ")or die(mysql_error($connection));
				}
					while($row=mysql_fetch_array($query))
					 {
				?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['pro_name']; ?></option>
				<?php } } ?>
					
				</select>
			</div>
			<!-- <div class="col-md-4">
				<label>Contractor Name <span class="required_field">*</span></label>
				<input type="text" class="form-control" name="cont_name" id="cont_name" placeholder="Contractor Name" value="<?php if(isset($rec_id)){echo $data['cont_name'];}else{} ?>" style="text-transform:capitalize;" required="">
			</div> --><div class="col-md-4">
				<label>Contractor <span class="required_field">*</span></label>
				<select class="form-control"  name="cont_name" id="cont_name"  required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_contractor a INNER JOIN tbl_work b ON a.id=b.cont_id ")or die(mysql_error($connection));
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
		

			<!-- <div class="col-md-4">
				<label>Work Type<span class="required_field">*</span></label>
				<input type="text" class="form-control" name="work_type" id="work_type" placeholder="Work Type" value="<?php if(isset($rec_id)){echo $data['work_type'];}else{} ?>" style="text-transform:capitalize;" required=""  onkeyup="work();">
			</div> -->
			<div class="col-md-4">
				<label>Work Type <span class="required_field">*</span></label>
				<select id="types" name="types" class="form-control" required="">
				<?php 
					if(!empty($rec_id)){
					$sql1=mysql_query("SELECT a.* FROM mst_task a INNER JOIN tbl_work b ON a.id=b.work_type WHERE b.id='$rec_id'")or die(mysql_error($connection));
					$row1=mysql_fetch_array($sql1);

				 ?>
				<option value="<?php echo $row1['id']; ?>"><?php echo $row1['description']; ?></option>
				<?php 
					$sql=mysql_query("SELECT * FROM mst_task")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['description']; ?></option>

				<?php } }else{ ?>
				<option value="">Select Work Type</option>
				<?php 
				
					$sql=mysql_query("SELECT * FROM mst_task")or die(mysql_error($connection));
					while($row=mysql_fetch_array($sql))
					{
				 ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['description']; ?></option>
				<?php } } ?>
					<option value="Other">Other</option>
				</select>
				<input type="text" id="other" name="other_types" style="display: none;" class="form-control" />
			</div>
			 <div class="col-md-4">
			<label>Area <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="area" id="area" placeholder="Area"  required="" value="<?php echo $data['area']; ?>" onkeyup="taxoncalculation();" step=".01">
			</div>
			<div class="col-md-4">
				<label>Rate <span class="required_field">*</span></label>
			<input type="number" class="form-control" name="rate" id="rate" placeholder="Rate"  required="" value="<?php echo $data['rate']; ?>" onkeyup="taxoncalculation();" step=".01">
			</div>
			

			<div class="col-md-4">
				<label>Unit</label>
				<input type="text" class="form-control" name="unit" id="unit" placeholder="unit" value="<?php if(isset($rec_id)){echo $data['unit'];}else{} ?>">
			</div>
			 
			
			<div class="col-md-4">
				<label>value</label>
				<input type="text" class="form-control" name="value" id="value" readonly="" placeholder="value" value="<?php if(isset($rec_id)){echo $data['value'];}else{} ?>">
			</div>
			<div class="col-md-4">
				<label>NO of dayes</label>
				<input type="number" class="form-control" name="no_of_dayes" id="no_of_dayes" placeholder="NO of dayes" value="<?php if(isset($rec_id)){echo $data['no_of_dayes'];}else{} ?>">
			</div>
			<div class="panel-body"></div>
			<div class="col-md-4">
			<?php 
				if(empty($rec_id)){
		 	?>
			<button name="btn_contractor" id="btn_contractor" type="submit" class="btn btn-primary"  value="save" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Save</button>
			<?php }else{ ?>
			<button name="update" id="update" type="submit" class="btn btn-primary" value="update" onclick="document.pressed=this.value" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Processing..."><i class="ace-icon fa fa-check bigger-110"></i>Update</button>
			<button name="product_submit" type="submit" class="btn btn-primary" name="print_button" id="print_button" value="Print" onclick="PrintDiv();"><span class="glyphicon glyphicon-print"></span> Print</button>
			<?php } ?>
			
			
			<?php require_once "print_work_order.php"; ?>
			</div>
			
		</form>
	</div>
<script>
onkeyup="taxoncalculation()"
function taxoncalculation()
{	
	var area = document.getElementById('area').value;
    var rate = document.getElementById('rate').value;
   	var value =  parseFloat(area) * parseFloat(rate);//calculate base amt
   	document.getElementById('value').value = parseFloat(value).toFixed(2);
		//alert(value);	
}
</script>


	<div class="panel-body"></div>
	<div class="col-lg-12" id="reportdata">
	    <h4>Work Order List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			   <th>Id</th>
			    <th>Project Name</th>
			    <th>Contractor Name</th>
			     <th>Work type</th>
			      <th>Area</th>
			      <th>Rate</th>
			       <th>unit</th>
			     <th>value</th>
			    <th>no of dayes</th>
			 <!-- 	<th>Type</th> -->
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>  <?php 
		  	// if($utype=='admin'){
			 
			  // 	$sr_no=0;
			   	$sql = mysql_query("SELECT a.id as work_id,b.pro_name,c.name,d.description,a.* from tbl_work a inner join new_project b on a.pro_id=b.id inner join mst_contractor c on c.id=a.cont_id  inner join mst_task d on d.id=a.work_type")or die(mysql_error($connection));
			  
			  	  // }else{


			  	  // 	$sql = mysql_query("SELECT * from tbl_work a inner join new_project b on a.pro_id=b.id where a.pro_id='$user_id' ")or die(mysql_error($connection));}
			  		while($row=mysql_fetch_array($sql))
			  		{
			  			$sr_no++;
			  			 $id=$row['work_id'];
			?>
			<tr id="invoice-23">
			  	<td><?php echo $sr_no; ?></td>
			    	<td><?php echo $row['pro_name']; ?></td>
			    	<td><?php echo $row['name']; ?></td>
			    	<td><?php echo $row['description']; ?></td>
			    	<td><?php echo $row['area']; ?></td>
			    	<td><?php echo $row['rate']; ?></td>
			    	<td><?php echo $row['unit']; ?></td>
			    	<td><?php echo $row['value']; ?></td>
			   		<td><?php echo $row['no_of_dayes']; ?></td>
			    	<!--  <td><?php echo $row['type']; ?></td> -->
			  	<td>
			  	<?php if($utype=='admin'){ ?>
			  		<a href='dashboard.php?page=edit_daily_work&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
			  	<?php }else{ ?>
			  		<a href='dashboard.php?page=edit_daily_work&id=<?php echo $id; ?>' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> 
			  	<?php } ?>
			  		| <a href='#' title='Delete Record' data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash"></span></a>
			  	</td>
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
			    <h4 class="modal-title" align="center">Delete work order</h4>
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


<!-- Delete Script start -->
<script>
    $("#delete_btn").click(function(e)
       { 
            var id=$('#del_id').val();
			  e.preventDefault();
		
			       $.ajax({
                            url:'delete_work_order.php',
                            type: "POST",
                            data: {
                                   id:id  
                            },
                            success: function(data)
                                {
                                  //alert(data);
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
          								
                                        // window.location.reload();
                                        
                                    }                          
                                }
                        });
        })
</script>

<script>
	//script to hide and show textbox in select box
	$(document).ready(function() {
		$('#types').change(function(){
		if($('#types').val() == 'Other')
		   {
		   $('#other').css('display', 'block'); 
		      }
		else
		   {
		   $('#other').css('display', 'none');
		   }
		});
	});
</script>
<!-- Insert Script -->
<script>

$('form#frm_contractor').submit(function(e){

    e.preventDefault();
  		if(document.pressed == 'save')
	{
	  		
          
              		 $("button#btn_contractor").button('loading');
			        $.ajax({
								data:$("#frm_contractor").serialize(),
								type:"POST",
								url:'insert_work_order.php',

								success: function(data)
								{
									$("button#btn_contractor").button('reset');
									 //alert(data);
									if(data==1) 
									{
									   // alert('Voucher Inserted !!!');
									   swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'work order added',
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
			       	
	       			
	     }
	     else
	     	if(document.pressed == 'update')
	  	{
	  	
          	
              		$("button#update").button('loading');
			        $.ajax({

								data:$("#frm_contractor").serialize(),
								type:"POST",
								url:'update_work_order.php',

								success: function(data)
								{
									$("button#update").button('reset');
									//alert(data);
									if(data==1)
									{
										swal({
											  position: 'top-right',
			 							      type: 'success',
			  								  title: 'work order has been Updated',
			  								  showConfirmButton: false,
			  								  timer: 1500
										  })
										  window.setTimeout(function()
										    { 
										      window.location.href= "dashboard.php?page=edit_daily_work";
										 	} ,1500);
						
									}
									
								}
						   });
			      
	       	}
		return true;
	});
</script>

<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
</script>
    <script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#fromDate').datepicker();
        $('#toDate').datepicker();
    })
}
</script>

<script>
function PrintDiv()
{    
	var divToPrint = document.getElementById('divToPrint');
	var popupWin = window.open('', '_blank', 'width=800,height=620');

	popupWin.document.open();
	popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	popupWin.document.close();
}



</script>