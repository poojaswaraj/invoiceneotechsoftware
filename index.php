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
    <link rel="icon" href="images/neotech_fevicon.png" type="image/x-icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <style type="text/css">
      
      .backimg 
        {
          background-image: url(images/signupbackground.jpg);
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          height: -webkit-fill-available;
        }
   
     </style>
</head>

<body class="backimg">
<div class="container">
 <div class="row">
 
 <!--  <div class="alert alert-success" style="padding: 1.5% 13%;">
      <img src="images/new.gif" height="25px;">
      <strong>New Feature for Printing Template!</strong> Goto your setting and open Printing Template tab and select template for print...Thank You!
  </div> -->
    <div class="col-md-4 col-md-offset-4">
       
      <div class="login-panel panel panel-default" style="margin-top:200px">
        <div class="panel-heading">
          <h3 class="panel-title" style="text-align: center;">Please Sign In</h3>
        </div>
        <div class="panel-body">
        	<center><img src="images/neotech.png" alt="test" height="150px" width="100%";></center>
        </div>
      
        <div class="panel-body">
          <form role="form" id="myform" name="form1"  method="post">
            <fieldset>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Emial Id" name="username"  autofocus>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password"  value="">
              </div>
              <div class="checkbox">
                <!--   <label style="float: left; margin-bottom: 5px;">
                      <a href="sign_up.php">Sign Up?</a>
                  </label> -->

                  <label style="float: right; margin-bottom: 5px;">
                      <a href="forget_password.php">Forgot password?</a>
                  </label>
              </div>
              <!-- Change this to a button or input when using this as a form -->
              
              <button type="submit" name="submit" id="save" class="btn btn-lg btn-primary btn-block">Sign In</button>
              <p id="msg"></p>
              <?php if(isset($_GET['status'])&&$_GET['status']==1)
      					echo "<font color=red>Invalid Username Or Password..</font>";
      							  
      					if(isset($_GET['status'])&&$_GET['status']==2)
      					echo "<font color=green>Username is your mail id</font>";
      			  ?>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$('form#myform').submit(function(e)
{
    e.preventDefault();
    $('button#save').button('loading');
            
    $.ajax({
              url:'login_code.php',
              type: "POST",
              data: new FormData(this),
              contentType:false,
              processData:false,
              success: function(data)
              {
                
                $('button#save').button('reset');
                  if(data==1)
                  {
                    window.location.href= "dashboard.php";
                    // header("location: dashboard.php"); 
                  }
                  else if(data==2)
                  {
                    $('#msg').html('Invalid Username Or Password..');
                    $('#msg').css('color','red');
                  }
                  else if(data==3)
                  {
                     window.location.href= "user_dashboard.php";
                    // $('#msg').html('Access Denied..');
                    // $('#msg').css('color','red');
                  }
                    else if(data==4)
                  {
                    $('#msg').html('Please check your email id for confirmation ');
                    $('#msg').css('color','green');
                  }
				        else if(data==5)
                  {
                    $('#msg').html('Your trial version is over');
                    $('#msg').css('color','red');
                  }
                else if(data==6)
                  {
                    $('#msg').html('Your package is expire');
                    $('#msg').css('color','red');
                  }
              }
          });             
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