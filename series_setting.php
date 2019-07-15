<?php 
$user_id=$_SESSION['login_user'];
?>
<div class="row">
<!-- /.panel-heading -->
<div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="dashboard.php?page=setting">Company Setting</a></li>
        <li class="active"><a href="dashboard.php?page=series_setting">Series Setting</a></li>
        <li><a href="dashboard.php?page=my_setting">My Setting</a></li>
        <li><a href="dashboard.php?page=print_template">Printing Templates</a></li>
        <li><a href="dashboard.php?page=create_user">Create Users Setting</a></li>
        <?php 
            $aa1 = mysql_query("SELECT * FROM company WHERE user_id='$user_id'")or die(mysql_error($connection));
				$rrr=mysql_fetch_array($aa1);
					  					  	
					$vouch = $rrr['voucher'];
				if($vouch== 'Yes')
				{  	
            ?>
        <li><a href="dashboard.php?page=expenses_setting">Expenses Setting</a></li>
        <?php 
       	 }
        else{}
        ?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
		<!-- Tab 1 -->
        <div class="tab-pane fade in active" id="series">
           <!-- Tab 2 -->
            <h3>Series Setting</h3><hr>
             <form id="myinvoice" name="myinvoice" autocomplete="off" method="POST" enctype="multipart/form-data">
			<div class="col-lg-8" id="tax">
				<h4>Invoice Taxes</h4>
			
				<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
				  <thead>
					<tr class="table_head" bgcolor="#999999">
					  <td>Sr. No</td>
					  <td>Name</td>
					  <td>Value</td>
					  <td>CGST</td>
					  <td>SGST</td>
					  <td>IGST</td>
					  <!-- <td>Ative</td>
					  <td>Default</td> -->
					  <!-- <td>Delete</td> -->
					</tr>
					</thead>
					<tbody>
					<?php
						$qry=mysql_query("SELECT * FROM tax ORDER BY `id` DESC")or die(mysql_error());
						$cnt=1;
						while($row=mysql_fetch_array($qry))
						{
							$id=$row['id'];
					?>
					<tr>
						  <td><?php echo $cnt++ ?></td>
						  <td><?php echo $row['name'];?></td>
						  <td><?php echo $row['value']."%";?></td>
						  <td><?php echo $row['cgst'];?></td>
						  <td><?php echo $row['sgst'];?></td>
						  <td><?php echo $row['igst'];?></td>
						  <!-- <td><?php echo $row['active'];?></td>
						  <td><?php echo $row['is_default'];?></td> -->
						 <!--  <td>
						 	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal1" onclick="$('#del_id1').val('<?php echo $id;?>');"><span class="icon fa fa-trash-o" ></span> </button>
						  </td> -->
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-8" id="series">
				<h4>Invoice Series</h4>
				<input type="hidden" name="user_id1" value="<?php echo $user_id;?>">
				<div class="col-md-4"><input type="text" class="form-control" name="label" placeholder="Label" required></div>
				<div class="col-md-4"><input type="text" class="form-control" name="value" placeholder="Value" required></div>
				<div class="col-md-4"><input type="text" class="form-control" name="ini_val" placeholder="Invoice Initial No"></div>
				<div class="panel-body"></div>
				<div class="col-md-3"><input type="text" class="form-control" name="est_ini_val" placeholder="Estimate Initial No"></div>
				<div class="col-md-3"><input type="text" class="form-control" name="pro_ini_val" placeholder="Proforma Initial No"></div>
				<div class="col-md-3"><button name="add_series" value="add_series" type="submit" class="btn btn-primary" value="add_series" onclick="document.pressed=this.value" >Add</button></div>	
				
				<div class="panel-body"></div>
				<!-- <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example"> -->
				<table class="table table-striped table-bordered table-hover dataTable no-footer" id="example1">
				  <thead>
					<tr class="table_head" bgcolor="#999999">
					  <!-- <td>Sr. No</td> -->
					  <td>Label</td>
					  <td>Value</td>
					  <td>Invoice No</td>
					  <td>Estimate No</td>
					  <td>Proforma No</td>
					  <td>Delete</td>
					</tr>
					</thead>
					<tbody>
					<?php
						$qry=mysql_query("SELECT * FROM series WHERE user_id='$user_id' ORDER BY `id` DESC")or die(mysql_error());
						$cnt=1;
						while($row=mysql_fetch_array($qry)){
							$id=$row['id'];
					?>
					<tr>
					  <!-- <td><?php echo $cnt++ ?></td> -->
					  <td><?php echo $row['name'];?></td>
					  <td><?php echo $row['value'];?></td>
					  <td><?php echo $row['first_number'];?></td>
					  <td><?php echo $row['estimates'];?></td>
					  <td><?php echo $row['profarmas'];?></td>
					 <td>
					 	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="$('#del_id').val('<?php echo $id;?>');"><span class="icon fa fa-trash-o" ></span> </button>
					</td>
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
			</form>
		</div>
		</div>
	</div>
<!-- /.panel-body -->
</div>

<!--Delete Series model start here-->

<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete Invoice Series</h4>
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
<!--Delete Tax model start here-->

<div id="deleteModal1" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Delete Invoice Tax</h4>
		  	</div>
			   <form  id="del1" autocomplete="off" enctype="multipart/formdata" method="POST">
				    <div class="modal-body" id="deleteContent">
		               <input type="hidden" name="data1" id="del_id1">
		               <div class="form-group">
		                     <p><b>Are you sure want to delete ?</b></p>
		              </div>
				    </div>
				    <center><p id='dmsg'></p></center>
			        <div class="modal-footer">
		               <button class="btn btn-success submit" id="delete_btn1" name="submit">Confirm</button>
		               <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
			        </div>
			  </form>
		</div>
	</div>
</div>
<script>

//Insert new tax and series
$('form#myinvoice').submit(function(e){

     e.preventDefault();

	if(document.pressed == 'add_tax')
	  {
	           $.ajax({
							data:$("#myinvoice").serialize(),
							type:"POST",
							url:'insert_tax.php',
							success: function(data)
							{

								 // alert(data);
								if(data==1) 
								{
									 // alert('New Tax Inserted !!!');
									$("#tax").load(" #tax");
								}
								else if(data==2)
								{
									alert('Error..');
									return false;
								} 
							}
					    });
	}
	else
	 if(document.pressed == 'add_series')
	  {
	           $.ajax({
							data:$("#myinvoice").serialize(),
							type:"POST",
							url:'insert_series.php',
							success: function(data)
							{
								 // alert(data);
								if(data==1) 
								{
									// alert('New Series Inserted !!!');
									// $("#series").load(" #series");
									location.reload();
									 // $('table.table').DataTable();
			             		  
								}
								else if(data==2)
								{
									alert('Error..');
									return false;
								} 
							}
					    });
	}

});

//  Delete Series Script start 
$("#delete_btn").click(function(e)
   { 
        var id=$('#del_id').val();
		e.preventDefault();
	
       $.ajax({
                url:'delete_series.php',
                type: "POST",
                data:{
                    id:id  
                },
                success: function(data)
                {
                    if(data==1)
                    {
							window.location.reload();
                    }                          
                }
            });
    })

//  Delete tax Script start 
$("#delete_btn1").click(function(e)
   { 
        var id=$('#del_id1').val();
		e.preventDefault();
	
        $.ajax({
                url:'delete_tax.php',
                type: "POST",
                data: {
                       id:id  
                },
                success: function(data)
                    {
                      //alert(data);
                        if(data==1)
                        {
                            // alert('Deleted Successfully.');
								 window.location.reload();
                            

                        }                          
                    }
            });
    })

</script>