<?php
include "config.php";
session_start();
if(!isset($_SESSION['login_user']))
{
	header('location:index.php');
}
else{
  $user_id=$_SESSION['login_user'];
   $sql=mysql_query("SELECT * FROM user a INNER JOIN user_profile b ON a.id=b.user_id WHERE b.id='$user_id'");
  $row=mysql_fetch_array($sql);

    $ed=$row['end_date'];
    $cd=date('Y-m-d');
    $date1 = new DateTime("$ed");
    $date2 = new DateTime("$cd");
    $diff = $date1->diff($date2);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Neo Tech</title>
    <!-- fevicon of ebc invoice -->
    <!-- <link rel="shortcut icon" href="images/ebc_logo1.png" type="image/x-icon" /> -->
     <link rel="icon" href="images/neotech_fevicon.png" type="image/x-icon">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <link rel="stylesheet" type="text/css" href="datatables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="datatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">


    <!-- Ajax script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

	<style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		border: 1px solid #ddd;
	}

	td {
		border: none;
		text-align: center;
		padding: 8px;
	}
	
	th {
		border: none;
		text-align: center;
		padding: 8px;
		background-color:#ddd;
    
	}

	tr:nth-child(even){background-color: #f2f2f2}
	
	hr {
		margin-top: 10px;
		margin-bottom: 20px;
		border-color: #27b6ee;
	} 
   .dt-buttons{
        margin-left: 350px;
        
    }
 .required_field{
      color: red;
  }

  /*  .table_head{

          background-color: #337ab7;
          color: white;
    }*/

	</style></style>
<style type="text/css">/*script for input type date to display placeholder*/
  input[type="date"]::before { 
          content: attr(data-placeholder);
          width: 100%;
        }

  input[type="date"]:focus::before,
  input[type="date"]:valid::before { display: none }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    td {
        border: none;
        text-align: center;
        padding: 8px;
    }
    
    th {
        border: none;
        text-align: center;
        padding: 8px;
        background-color:#ddd;
    
    }

    tr:nth-child(even){background-color: #f2f2f2}
    
    hr {
        margin-top: 10px;
        margin-bottom: 20px;
        border-color: #27b6ee;
    } 
   .dt-buttons{
        margin-left: 350px;
        
    }

  /*  .table_head{

          background-color: #337ab7;
          color: white;
    }*/
  .required_field{
      color: red;
  }

/*custom css for print image view in setting tab*/
#myImg,  #myImg1{
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg, #myImg1:hover {opacity: 0.7;}

/* The Modal (background) */
.modal_print {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    /*z-index: 1;  Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content_print {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content_print, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

.small-box {
  border-radius: 2px;
  position: relative;
  display: block;
  margin-bottom: 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.small-box > .inner {
  padding: 10px;
}
.small-box > .small-box-footer {
  position: relative;
  text-align: center;
  padding: 3px 0;
  color: #fff;
  color: rgba(255, 255, 255, 0.8);
  display: block;
  z-index: 10;
  background: rgba(0, 0, 0, 0.1);
  text-decoration: none;
}
.small-box > .small-box-footer:hover {
  color: #fff;
  background: rgba(0, 0, 0, 0.15);
}
.small-box h3 {
  font-size: 38px;
  font-weight: bold;
  margin: 0 0 10px 0;
  white-space: nowrap;
  padding: 0;
}
.small-box p {
  font-size: 20px;
}
.small-box p > small {
  display: block;
  /*color: #f9f9f9;*/
  font-size: 15px;
  margin-top: 5px;
}
.small-box h3,
.small-box p {
  z-index: 5;
}
.small-box .icon {
  -webkit-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  transition: all 0.3s linear;
  position: absolute;
  top: -10px;
  right: 10px;
  z-index: 0;
  font-size: 45px;
  color: rgba(0, 0, 0, 0.15);
}
.small-box:hover {
  text-decoration: none;
  /*color: #f9f9f9;*/
}
.small-box:hover .icon {
  font-size: 60px;
}
@media (max-width: 767px) {
  .small-box {
    text-align: center;
  }
  .small-box .icon {
    display: none;
  }
  .small-box p {
    font-size: 12px;
  }
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content_print {
        width: 100%;
    }
}
</style>
</head>

<body>

    <!-- Navigation -->
    <div class="header">
    
    <?php 
    $user_id=$_SESSION['login_user'];
     // $utype=$_SESSION['user_type']=$row['type'];
 $sub=mysql_query("SELECT * FROM user_profile WHERE id='$user_id'")or die(mysql_error());
 $array=mysql_fetch_array($sub);
 $sub_id=$array['user_id'];


      $aa12 = mysql_query("SELECT * FROM company WHERE user_id='$sub_id'")or die(mysql_error($connection));
            
        $arr=mysql_fetch_array($aa12);
        $logo=$arr['logo'];
        if(!empty($logo))
        {
     ?>
         <a href="user_dashboard.php?page=home"><img src="<?php echo $logo; ?>" class="company-logo" alt="logo"></a>
     <?php 
        }
        else{
      ?>
	   <a href="user_dashboard.php?page=home"> <img src="images/ebc_logo.png" class="company-logo" alt="logo"></a>
     <?php } ?>

       <div class="setting">
           <div class="setting-sub">

               <span class="setting-part">Welcome <?php
			   $query=mysql_query("SELECT * FROM user_profile WHERE id='".$_SESSION['login_user']."'");
			   $row=mysql_fetch_array($query);
                $us_id=$row['user_id'];
			   echo $row['name'];
         // echo $row['admin_type'];
			   ?></span>&nbsp;|&nbsp;
               <!-- <span class="setting-part"><a href="dashboard.php?page=setting" title='View Setting'> <span class="glyphicon glyphicon-cog"></span>&nbsp;</a></span>&nbsp;|&nbsp; -->
               <span class="setting-part"><a href="logout.php" title='Logout'><span class="glyphicon glyphicon-off"></span>&nbsp;</a></span></div>
       </div>
    </div>
    <nav class="navbar navbar-inverse navbar-fixed-top nav-menu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header  navbar-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
           
                <!-- <a class="navbar-brand" href="logproduct.php"> + New Invoice</a> -->
         <!-- <a class="navbar-brand" href="#"> <?php echo ' Days Remaining For Renew :'.$diff->days; ?></a>      -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php 
            error_reporting(0);
            $aa1 = mysql_query("SELECT * FROM user_profile WHERE id='$user_id'")or die(mysql_error($connection));
            
                $rr=mysql_fetch_array($aa1);
                $result_explode = explode(',', $rr['permission']);
                $a = $result_explode[0];
                $b = $result_explode[1];
                $c = $result_explode[2];
                $d = $result_explode[3];
                $e = $result_explode[4];
                $f = $result_explode[5];
                $g = $result_explode[6];
                $h = $result_explode[7];
                
            ?>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-tab-menu">
                    <li>
                        <a href="user_dashboard.php?page=home">Dashboard</a>
                    </li>
                    <?php  if ($a=='master'||$b=='master'||$c=='master'||$d=='master'||$e=='master'||$f=='master'||$g=='master'||$h=='master') {
                    ?>
                    <!-- for master dropdown -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Master
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="user_dashboard.php?page=employee">Employee</a></li>
                        <li><a href="user_dashboard.php?page=contractor">Contractor</a></li>
                        <li><a href="user_dashboard.php?page=supplier">Suppliers</a></li>
                        <li><a href="user_dashboard.php?page=task">Task</a></li>
                        <li><a href="user_dashboard.php?page=unit">Unit</a></li>
                        <li><a href="user_dashboard.php?page=material">Material</a></li>
                        <li><a href="user_dashboard.php?page=customer">Customer</a></li>
                        <li><a href="user_dashboard.php?page=new_project">New Project</a></li>
                        <li><a href="user_dashboard.php?page=project_team">Project Team</a></li>
                      </ul>
                    </li>
                    <?php }else{} ?>
                    <?php  if ($a=='project'||$b=='project'||$c=='project'||$d=='project'||$e=='project'||$f=='project'||$g=='project'||$h=='project') {
                    ?>  
                    <!-- Project Tabs here -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Project 
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      
                        <li><a href="user_dashboard.php?page=daily_works">Daily Labour/Work</a></li>
                        <!-- <li><a href="dashboard.php?page=daily_labour">Daily Labour</a></li> -->
                        <!-- <li><a href="dashboard.php?page=material_cost">Material Cost</a></li> -->
                        <li><a href="user_dashboard.php?page=material_requisition">Daily Material Requisition</a></li>
                      </ul>
                    </li> 
                    <?php }else{} ?>
                    <?php  if ($a=='material'||$b=='material'||$c=='material'||$d=='material'||$e=='material'||$f=='material'||$g=='material'||$h=='material') {
                    ?>  
                      <!-- Material tabb -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Material 
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="user_dashboard.php?page=material_procurment">Material Inward Register</a></li>
                        <li><a href="user_dashboard.php?page=daily_consumption">Daily Material Consumption</a></li>
                        <li><a href="user_dashboard.php?page=material_stock">Material Stock</a></li>
                      </ul>
                    </li> 
  <!-- PO/DN/WO -->
 <!--<li class="dropdown">-->
 <!--                     <a class="dropdown-toggle" data-toggle="dropdown" href="#"> PO/DN/WO -->
 <!--                     <span class="caret"></span></a>-->
 <!--                     <ul class="dropdown-menu">-->
 <!--                       <li><a href="user_dashboard.php?page=material_procurment">Purchase order</a></li>-->
 <!--                       <li><a href="user_dashboard.php?page=daily_consumption">Debit note</a></li>-->
 <!--                       <li><a href="user_dashboard.php?page=edit_daily_work">work order</a></li>-->
 <!--                     </ul>-->
 <!--                   </li> -->

                    <?php }else{} ?>
                    <?php  if ($a=='flat'||$b=='flat'||$c=='flat'||$d=='flat'||$e=='flat'||$f=='flat'||$g=='flat'||$h=='flat') {
                    ?>
                    <li>
                        <a href="user_dashboard.php?page=flat_booking">Flat Booking</a>
                    </li>
                    <?php }else{} ?>
                    <?php  if ($a=='report'||$b=='report'||$c=='report'||$d=='report'||$e=='report'||$f=='report'||$g=='report'||$h=='report') {
                    ?>
                    <!--Report tabb -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Reports 
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="user_dashboard.php?page=saleble_stock_report">Saleble Stock Report</a></li>
                      </ul>
                    </li>
                    <?php }else{} ?>
                    <?php  if ($a=='billing'||$b=='billing'||$c=='billing'||$d=='billing'||$e=='billing'||$f=='billing'||$g=='billing'||$h=='billing') {
                    ?>
                    <!-- for dropdown -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Billing <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                       <!--above for dropdown -->
                        <li>
                            <a href="user_dashboard.php?page=invoices">Invoices</a>
                        </li>
                        <li>
                        <a href="user_dashboard.php?page=profarmas">Proforma Invoices</a>
                        </li>  
                        <li>
                           <a href="user_dashboard.php?page=customers">Customers</a>
                        </li>
                        <li>
                           <a href="user_dashboard.php?page=estimates">Estimates</a>
                        </li>
                         <li>
                           <a href="user_dashboard.php?page=product">Product</a>
                        </li>
                           <li>
                          <a href="user_dashboard.php?page=voucher">Expenses</a>
                        </li>
                        <li>
                           <a href="user_dashboard.php?page=import_gst">GST Entries</a>
                        </li>
                    <!-- for dropdown -->
                       </ul>
                    </li> 
                    <?php }else{} ?>
                    <?php  if ($a=='payment'||$b=='payment'||$c=='payment'||$d=='payment'||$e=='payment'||$f=='payment'||$g=='payment'||$h=='payment') {
                    ?>
                    <!-- Payment tabb -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Payment 
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="user_dashboard.php?page=payment_receive">Payment Received</a></li>
                        <li><a href="user_dashboard.php?page=payment_paid">Payment Paid</a></li>
                      </ul>
                    </li> 
                    <?php }else{} ?>
                    <?php  if ($a=='vendor'||$b=='vendor'||$c=='vendor'||$d=='vendor'||$e=='vendor'||$f=='vendor'||$g=='vendor'||$h=='vendor') {
                    ?>  
                    <!-- Vendor tabb -->
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Vendor 
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="user_dashboard.php?page=contractor_details">Contractor Details</a></li>
                        <li><a href="user_dashboard.php?page=suppliers_details">Suppliers Details</a></li>
                      </ul>
                    </li> 
                    <?php }else{} ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <?php 
            if(!isset($_GET['page']))
            $page="home";
                else
					$page=$_GET['page'];
                switch($page)
                {
                    case "home":
                        include("home.php");
                    break;
					
					case "invoices":
                        include("invoices.php");
                    break;
				
				    case "new_invoice":
                        include("new_invoice.php");
                    break;
                    case "convert_invoice":
                        include("convert_invoice.php");
                    break;

                    case "edit_profarma_invoice":
                        include("edit_profarma_invoice.php");
                    break;

                    case "edit_new_invoice":
                        include("edit_new_invoice.php");
                    break;

                    case "edit_recurring_invoice":
                        include "edit_recurring_invoice.php";
                    break;

                    case "profarmas":
                        include "profamas.php";
                    break;

                    case "edit_estimate":
                        include("edit_estimate.php");
                    break;
					
					case "recurring_invoices":
                        include("recurring_invoices.php");
                    break;
					
                    case "new_recurring_invoice":
                        include("new_recurring_invoice.php");
                    break;
                     
                    case 'profarma_incoice':
                        include ("profarma_incoice.php");
                    break;

					case "customers":
                        include("customers.php");
                    break;
					
					case "estimates":
                        include("estimates.php");
                    break;
					
                    case "new_estimate":
                        include("new_estimate_invoice.php");
                    break;

					case "product":
                        include("product.php");
                    break;
					
				    case "setting":
                        include("setting.php");
                    break;

                    case 'voucher':
                        include "voucher.php";
                    break;

                    case 'import_gst':
                        include "import_gst.php";
                    break;

                    case 'gst_export':
                        include "gst_export.php";
                    break;

                    case "forget_password":
                        include("forget_password.php");
                    break;

                    case "new_challan":
                        include("new_challan.php");
                    break;

                    case "challans":
                        include("challans.php");
                    break;

                    case "edit_challan":
                        include("edit_challan.php");
                    break;

                    case "genrate_invoice":
                        include("genrate_invoice.php");
                    break;

                      // new cases added
                     case "task":
                        include("task.php");
                    break;
                    
                    case "flat_booking":
                      include("flat_booking.php");
                    break;
                    
                    case "payment_receive":
                      include("payment_receive.php");
                    break;

                    case "payment_paid":
                      include("payment_paid.php");
                    break;

                    case "suppliers_details":
                      include("suppliers_details.php");
                    break;

                    case "contractor_details":
                      include("contractor_details.php");
                    break;

                    case "material_procurment":
                      include("material_procurment.php");
                    break;

                    case "daily_consumption":
                      include("daily_consumption.php");
                    break;

                    case "material_stock":
                      include("material_stock.php");
                    break;

                    case "material_cost":
                      include("material_cost.php");
                    break;
                    
                    case "material_requisition":
                      include("material_requisition.php");
                    break;    

                    case "new_project":
                      include("new_project.php");
                    break;   
                    
                    case "project_team":
                      include("project_team.php");
                    break; 

                    case "saleble_stock_report":
                      include("saleble_stock_report.php");
                    break; 
                    
                    case "employee":
                        include("employees.php");
                    break;

                    case "material":
                        include("material.php");
                    break;

                    case "contractor":
                        include("contractor.php");
                    break;

                    case "labour":
                        include("add_labour.php");
                    break;
                    
                    case "supplier":
                        include("supplier.php");
                    break;
                    
                    case "customer":
                        include("customer.php");
                    break;

                    case "unit":
                        include("unit.php");
                    break;

                    case "daily_labour":
                        include("daily_labour.php");
                    break;

                    case "daily_works":
                        include("daily_works.php");
                    break;
                     case "edit_daily_work":
                        include("edit_daily_work.php");
                    break;
                    
					default:
                        include("home.php");
                    break;
      				  }
              ?>
		
		
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12"><hr>
                    <p>Copyright &copy; EBC Solutions Pvt. Ltd 2017</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
  <!-- scripts -->
  
    </script>
    <!-- jQuery -->
    <!-- <script language="javascript" src="js/users.js" type="text/javascript"></script> -->
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="datatables/media/js/dataTables.bootstrap.min.js"></script>

 <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"> </script>
    
<script type="text/javascript">
  $(document).ready(function() {
   
         $('#example').DataTable({

                "scrollX": true,
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

$("[data-toggle=tooltip]").tooltip();
 
var table=$('#example').DataTable();

      table
      .order([[0,'desc']])
      .draw(false);

  });
</script>
<!-- Script for autocomplete -->
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
 
    <!-- script for datatable buttons -->

<!-- <script type="text/javascript">

        $(document).ready(function() {
           $('#example').DataTable();
    } ); 
 </script> -->

</body>
</html>
