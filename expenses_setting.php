<?php 
$user_id=$_SESSION['login_user'];
?>
<div class="row">
<!-- /.panel-heading -->
<div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li><a href="dashboard.php?page=setting">Company Setting</a></li>
        <li><a href="dashboard.php?page=series_setting">Series Setting</a></li>
        <li><a href="dashboard.php?page=my_setting">My Setting</a></li>
        <li ><a href="dashboard.php?page=print_template">Printing Templates</a></li>
        <li><a href="dashboard.php?page=create_user">Create Users Setting</a></li>
        <?php 
            $aa1 = mysql_query("SELECT * FROM company WHERE user_id='$user_id'")or die(mysql_error($connection));
				$rrr=mysql_fetch_array($aa1);
					  					  	
					$vouch = $rrr['voucher'];
				if($vouch== 'Yes')
				{  	
            ?>
        <li class="active"><a href="dashboard.php?page=expenses_setting">Expenses Setting</a></li>
        <?php 
       	 }
        else{}
        ?>
    </ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- Tab 1 -->
	    <div class="tab-pane fade in active" id="series">
           <div class="col-lg-12">
			  <form id="myvoucher" name="myvoucher" autocomplete="off" method="POST" enctype="multipart/form-data">
			<div class="col-lg-6" id="head">
				<h3>Account Head</h3><hr>
				<input type="hidden" name="u_id" value="<?php echo $user_id; ?>">
				<div class="col-md-4">
				<input type="text" class="form-control" name="txt_head" id="txt_head" placeholder="Description"></div>
				<div class="col-md-2"><button name="add_head" id="add_head" type="submit" class="btn btn-primary" value="add_head" onclick="document.pressed=this.value" >Add</button></div>	
				<div class="panel-body"></div>
				 <table class="table table-striped table-bordered table-hover dataTable no-footer" id="example2">
				  <thead>
					<tr bgcolor="#999999">
					  <td>Sr. No</td>
					  <td>Head Description</td>
					  <td>Delete</td>
					</tr>
					</thead>
					<tbody>
					<?php
						$qry=mysql_query("SELECT * FROM acc_head WHERE user_id='$user_id' ORDER BY `id` DESC")or die(mysql_error());
						$cnt=1;
						while($row=mysql_fetch_array($qry))
						{
							$id=$row['id'];
					?>
					<tr>
						  <td><?php echo $cnt++ ?></td>
						  <td><?php echo $row['head_desc'];?></td>
						  <td>
						 	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal2" onclick="$('#del_id2').val('<?php echo $id;?>');"><span class="icon fa fa-trash-o" ></span> </button>
						  </td>
					</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-6" id="mode">
				<h3>Payment Mode</h3><hr>
				<input type="hidden" name="ur_id" value="<?php echo $user_id; ?>">
				<div class="col-md-4"><input type="text" class="form-control" name="mode" placeholder="Mode Type"></div>
				<div class="col-md-2"><button name="add_mode" value="add_mode" type="submit" class="btn btn-primary" value="add_mode" onclick="document.pressed=this.value">Add</button></div>	

				<div class="panel-body"></div>
				 <table class="table table-striped table-bordered table-hover dataTable no-footer" id="example1">
				  <thead>
						<tr bgcolor="#999999">
					  <td>Sr. No</td>
					  <td>Modes</td>
					  <td>Delete</td>
					</tr>
					</thead>
					<tbody>
					<?php
						$qry=mysql_query("SELECT * FROM mode WHERE user_id='$user_id' ORDER BY `id` DESC")or die(mysql_error());
						$cnt=1;
						while($row=mysql_fetch_array($qry)){
							$id=$row['id'];
					?>
					<tr>
					  <td><?php echo $cnt++ ?></td>
					  <td><?php echo $row['mode'];?></td>
	
					 <td>
					 	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal3" onclick="$('#del_id3').val('<?php echo $id;?>');"><span class="icon fa fa-trash-o" ></span> </button>
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
</div>
<!-- /.panel-body -->
</div>

<!--Delete Mode model start here-->

<div id="deleteModal3" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete Mode</h4>
		  	</div>
			   <form  id="del3" autocomplete="off" enctype="multipart/formdata" method="POST">
				    <div class="modal-body" id="deleteContent">
		               <input type="hidden" name="data" id="del_id3">
		               <div class="form-group">
		                     <p><b>Are you sure want to delete ?</b></p>
		              </div>
				    </div>
				    <center><p id='dmsg'></p></center>
			        <div class="modal-footer">
		               <button class="btn btn-success submit" id="delete_mode" name="submit">Confirm</button>
		               <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
			        </div>
			  </form>
		</div>
	</div>
</div>

<!--Delete Head model start here-->

<div id="deleteModal2" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  	<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title" align="center">Delete Head</h4>
		  	</div>
			   <form  id="del2" autocomplete="off" enctype="multipart/formdata" method="POST">
				    <div class="modal-body" id="deleteContent">
		               <input type="hidden" name="data2" id="del_id2">
		               <div class="form-group">
		                     <p><b>Are you sure want to delete ?</b></p>
		              </div>
				    </div>
				    <center><p id='dmsg'></p></center>
			        <div class="modal-footer">
		               <button class="btn btn-success submit" id="delete_head" name="submit">Confirm</button>
		               <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cancel</button>      
			        </div>
			  </form>
		</div>
	</div>
</div>


<script>

// Voucher tab script

$('form#myvoucher').submit(function(e){

     e.preventDefault();

	if(document.pressed == 'add_head')
	{
       $.ajax({
				data:$("#myvoucher").serialize(),
				type:"POST",
				url:'insert_acc_head.php',
				success: function(data)
				{
					if(data==1) 
					{
						location.reload();
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
	 if(document.pressed == 'add_mode')
	{
       $.ajax({
				data:$("#myvoucher").serialize(),
				type:"POST",
				url:'insert_mode.php',
				success: function(data)
				{
					if(data==1) 
					{
             		  location.reload();
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


//  Delete Head Script start 
    $("#delete_head").click(function(e)
       { 
            var id=$('#del_id2').val();
			e.preventDefault();
		
	        $.ajax({
                    url:'delete_head.php',
                    type: "POST",
                    data: {
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

  //  Delete Mode Script start 
    $("#delete_mode").click(function(e)
       { 
            var id=$('#del_id3').val();
			  e.preventDefault();
		
			       $.ajax({
                            url:'delete_mode.php',
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
         $(document).ready(function() {
           // $('#example1').DataTable();
           $('#example2').DataTable();
    } ); 
$(document).ready(function() {
    $('table.table').DataTable();
} );
</script>