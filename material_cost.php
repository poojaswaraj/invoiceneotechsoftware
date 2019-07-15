<div class="row">
	<h3>Material Cost</h3><hr>
	
<div class="col-lg-12" id="filter"> 
	<h4>Add Material Cost</h4>
	<form id="filter" name="filter" method="post">

		<div class="col-md-4">
			<input type="date" name="dob" class="form-control" data-placeholder="Date" required aria-required="true" />
		</div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="fromDate" id="fromDate" placeholder="Descriptions">
		</div>
		
		<div class="col-md-4">
			<input type="text" class="form-control" name="toDate" id="toDate" placeholder="Name of Supplier">
		</div>

		<div class="panel-body"></div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="toDate" id="toDate" placeholder="Rate">
		</div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="toDate" id="toDate" placeholder="Unit">
		</div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="fromDate" id="fromDate" placeholder="Quantity">
		</div>
		<div class="panel-body"></div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="toDate" id="toDate" placeholder="Amount">
		</div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="toDate" id="toDate" placeholder="SGST">
		</div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="fromDate" id="fromDate" placeholder="CGST">
		</div>
		<div class="panel-body"></div>

		<div class="col-md-4">
			<input type="text" class="form-control" name="fromDate" id="fromDate" placeholder="Total Amount">
		</div>
		<div class="panel-body"></div>
 		<div class="col-md-4">
			<button name="search" id="search" type="submit" class="btn btn-primary">Save</button>
			<button name="search" id="search" type="submit" class="btn btn-primary">Update</button>
		</div>
		
	</form>
</div>

<div class="panel-body"></div>

	<div class="col-lg-12" id="reportdata">
        <h4>Material Cost List</h4>
		<table class="datatable table table-striped" id="example" cellspacing="0" width="100%">
		  <thead>
			<tr>
			  <th>Sr. No</th>
			  <th>Date</th>
			  <th>Descriptions</th>
			  <th>Supplier Name</th>
			  <th>Rate</th>
			  <th>Unit</th>
			  <th>Quantity</th>
			  <th>Amount</th>
			  <th>SGST</th>
			  <th>CGST</th>
			  <th>Total Amount</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			<tr id="invoice-23">
			  <td>1</td>
			  <td>06-08-2018</td>
			  <td>KJASHSK</td>
			  <td>Shyam</td>
			  <td>15</td>
			  <td>10</td>
			  <td>5</td>
			  <td>20000</td>
			  <td>1500</td>
			  <td>1500</td>
			  <td>20000</td>
			
			 
			  <td>
			  	<a href='dashboard.php?page=material_cost&id=#' title='Edit Details' data-toggle='tooltip'><span class="icon fa fa-edit"></span></a> |
			  	<a href='dashboard.php?page=material_cost&id=#' title='Delete Record' data-toggle='tooltip'><span class="icon fa fa-trash"></span></a>
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