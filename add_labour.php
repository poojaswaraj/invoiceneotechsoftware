
<div class="row">
	<h3> Labour</h3><hr>
	<div class="col-lg-12">
		<h4>Labour Details</h4>
		<form id="myform" name="frm_purchase" autocomplete="off" method="POST" >
			
			<div class="col-md-4">
				<input type="text" class="form-control" name="txt_name" id="txt_cleagal_id" placeholder="Labour Name">
			</div>
			
			<div class="col-md-4">
				<input type="int" class="form-control" name="txt_contact" id="txt_contact" placeholder="Contact No">
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control" name="txt_address" id="txt_address" placeholder="Address">
			</div>
			
			<div class="panel-body"></div>
			
			<div class="col-md-4">
				<button type="submit" class="btn btn-primary" name="product_submit1" id="product_submit1" value="add_item">Save</button>
				<button type="submit" class="btn btn-primary" name="product_submit1" id="product_submit1" value="add_item">Update</button>
			</div>

		</form>
	</div>

	<div class="panel-body"></div>
	<div class="col-lg-12" id="reportdata">
	    <h4>Labour List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr.No</th>
			  <th>Labour Name</th>
			  <th>Contact No</th>
			  <th>Address</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			<tr id="invoice-23">
			  <td>1</td>
			  <td>Amit Rana</td>
			  <td>7896541230</td>
			  <td>Pune</td>
			  <td>
			  	<a href='dashboard.php?page=contractor&id=#' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> |
			  	<a href='dashboard.php?page=contractor&id=#' title='Delete Record' data-toggle='tooltip'><span class="icon fa fa-trash"></span></a>
			  </td>
			</tr>
		  </tbody>
		</table>
	</div>
</div>


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