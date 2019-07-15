<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Billing Software</title>
    <!-- fevicon of ebc invoice -->
    <link rel="shortcut icon" href="images/ebc_logo1.png" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body background="images/imagebackground.png"  height="100px; width:100px";>
<div class="container">
  <div class="row">
    <!-- <div class="col-md-4 col-md-offset-4"> -->
      <div class="login-panel panel panel-default" style="margin-top:200px; width:90%; margin-left: 60px; ">
        <!-- <div class="panel-heading">
          <h3 class="panel-title" style="text-align: center;">Please Sign In</h3>
        </div> -->
        <div class="col-md-3">
        <?php 
          include "config.php";
          $sql = mysql_query("SELECT * FROM `company`")or die(mysql_error($connection));
            $row=mysql_fetch_array($sql);
            $logo=$row['logo'];

            if(isset($logo)){

         ?>
            <img src="<?php echo $row['logo'];?>" alt="" height="90px; width:90px";>
        <?php }
            else{
         ?>
             <img src="images/ebc_logo.png" alt="test" height="90px; width:90px";>
        <?php } ?>
          <ol style="font-size: 17px;">
            <li><a href="#">License</a></li>
            <li><a href="#">Database</a></li>
            <li><a href="#">Configuration</a></li>
            <li><a href="#">Finish</a></li>
          </ol>
        </div>
        <div class="panel-body">
        <h3 class="panel-title" style="font-size: 25px;">License Agreement</h3>
        <hr style="border-top: 2px solid #c23030;">
          <!-- <form role="form" name="form1" action="login_code.php" method="post"> -->
            <fieldset>
              <h3 style="font-size: 20px;">The EBC License</h3>
                <small>Copyright &copy; 2017-2018 EBC Solutions Pvt. Ltd.</small><br><br>
              
                  <p>Once your new business VoIP system and service are in place, you and your staff members will have full-control capabilities for use of your business communications system. Your service provider will ensure connection with your online portal for customizing your telecom options. These modern digital portals are user-friendly, enabling feature changes and additions to be made for immediate availability. You and your staff can make decisions and changes in real-time that work for you right in the moment.</p>

                  <p><em><b>Once your new business VoIP system and service are in place, you and your staff members will have full-control capabilities for use of your business communications system. Your service provider will ensure connection with your online portal for customizing your telecom options. These modern digital portals are user-friendly, enabling feature changes and additions to be made for immediate availability. You and your staff can make decisions and changes in real-time that work for you right in the moment.</b></em></p>

                  <p>Once your new business VoIP system and service are in place, you and your staff members will have full-control capabilities for use of your business communications system. Your service provider will ensure connection with your online portal for customizing your telecom options. These modern digital portals are user-friendly, enabling feature changes and additions to be made for immediate availability. You and your staff can make decisions and changes in real-time that work for you right in the moment.</p>
               <hr>
              <div class="checkbox">
                <label style="float: right; margin-bottom: 5px;">
                  <button type="submit" name="submit" class="btn btn-default" >Back</button>
                  <button type="submit" name="submit" class="btn btn-default" >Next</button>
                </label>
              </div>
            </fieldset>
          <!-- </form> -->
        </div>
      </div>
    <!-- </div> -->
  </div>
</div>
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