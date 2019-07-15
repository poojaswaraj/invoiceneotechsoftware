<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up-Invoice Software</title>
    <!-- fevicon of ebc invoice -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body class="backimg">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default" style="margin-top:100px">
        <div class="panel-heading">
          <h3 class="panel-title" style="text-align: center;">Sign Up Here</h3>
        </div>
        <div class="panel-body">
        <center><img src="images/it-freedom-logo.png" alt="test" height="50px" width="100%";></center>
        </div>
        <div class="panel-body">
          <form id="myform" role="form" name="form1" method="post">
            <fieldset>
                 <!-- <input type="hidden" class="form-control" placeholder="Admin Email" name="adminemail" id="adminemail" value="shyam@e-bc.in" readonly="">  -->
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Company Name" name="comp_name" id="comp_name" value="" autofocus required="" >
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="" required="">
              </div>

              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email-ID" name="email" id="email" required="">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Contact Number" name="contact" id="contact" value="" required="">
              </div>

              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="pass" id="pass" value="" required="">
              </div>

              <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpass" id="cpass" value="" required="">
              </div>

              <div class="checkbox">
               	  <label style="float: right; margin-bottom: 5px;">
                      <a href="index.php">Goto Sign In?</a> 
                  </label>
              </div>
              <!-- Change this to a button or input when using this as a form -->
              <p id="msg"></p>
              <button type="submit" name="save" id="save" class="btn btn-lg btn-primary btn-block">Submit</button>
            
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>

<script>

$('form#myform').submit(function(e){

      var pass=$('#pass').val();
      var cpass= $('#cpass').val();
      var contact= $('#contact').val();
        e.preventDefault();
        	
    if(pass==cpass)
      { 
        if(pass.length>=4 && pass.length<=10)
          {      
            if(contact.length>=10 && contact.length<=15)
              {           
    				        $('button#save').button('loading');
    				            $.ajax({

    				                    url:'insert_sign_up.php',
    				                    type: "POST",
    				                    data: new FormData(this),
    				                    contentType:false,
    				                    processData:false,
    				                    success: function(data)
    				                    {
    				                        // alert(data);
    				                        $('button#save').button('reset');
    				                        if(data==1)
    				                        {
    				                          // alert("Successfully..");
    				                          // location.reload();
    				                          swal({
              													    position: 'top-right',
              					 							      type: 'success',
              					  								  title: 'Successfull!!!',
              					  								  showConfirmButton: false,
              					  								  timer: 2000
              												  })
              												  window.setTimeout(function()
              												    { 
              				 										window.location.href= "index.php";
                                          // location.reload();
              				 								 	} ,2000);
              				                        }
    				                        else if(data==2){
                                      $('#contact').css('borderColor','#27b6ee');
    				                         	$('#msg').html('Email-ID or Company name already exists.');
    										            	$('#msg').css('color','red');
    				                        }
    				                        
    				                    }
    				            });
                  }
                  else
                  {
                    $('#cpass').css('borderColor','#27b6ee');
                    $('#contact').css('borderColor','red');
                    $('#msg').html('Mobile Number between 10 to 15 Number.');
                    $('#msg').css('color','red');
                  }

                  }
              else
              {
                // $('#pass').css('borderColor','red');
                $('#msg').html('Password must be between 4 to 10 characters.');
                $('#msg').css('color','red');
              }

          }
          else
          {
            $('#cpass').css('borderColor','red');
            $('#msg').html('Password Not Match.');
            $('#msg').css('color','red');
          }
				     
    });

</script>


	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>