<?php
    if(isset($_GET["id"]))
    {
         $id = $_GET["id"];

       $query = mysql_query("SELECT * from tbl_work a  WHERE id='$id'")or die(mysql_error($connection));
            $data=mysql_fetch_array($query);
            $user_id=$data['user_id'];
    }

?>
    
<div id="divToPrint" style="display:none;">
  <div style="width: 800px; height: 620px; background-color: white; text-align: left;">
    <div class="panel-body" style="font-size:20px">
<style>
            .container1, .row-data1
            {
                width: auto;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;
            }
            .para
            {
                width: 100%;
                height: auto;
                float: left;
                padding: 1%;
                margin: 0;
            }
            .wrapper
            {
                width: 100%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0%;
                border: 1px solid black;
            }
            .logo
            {
                    padding: 1% 5%;
                    margin: 0;
                    width: 30%;
                    float: left;
            }
            .full-div
            {
                width: 100%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;
            }
            .div-left
            {
                width: 50%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;
                font-size:14px;
            }
            .div-left1
            {
                width: 70%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;
                text-align: center;
            }
            .div-right1
            {
                width: 30%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;  
            }
            .div-right
            {
                width: 50%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;
                font-size:15px;
            }
            .logo-right
            {
                    float: right;
                    padding: 2%;
                    margin: 0;
                    width: 50%;
            }
            .inner-div
            {
                width: 100%;
                float: left;
                padding: 0% 0%;
                margin: 0;
                font-size: 14px;
                text-align: center;
                border-bottom: 1px solid black;
            }
            .header
            {
                margin-top: 5px;
                margin-bottom: 0.72px;
                font-size: 15px;
                font-weight: 600;
            }
            .block1
            {
                width: 98%;
                height: auto;
                float: left;
                border-left: 1px solid black;
                padding:1% 0% 1% 2%;
                font-size: 14px;
                border-bottom: 1px solid black;
            }
            .block2
            {
                    width: 100%;
                    height: auto;
                    float: left;
                    font-size: 14px;
                    padding: 1% 1%;
                    text-align: left;
                    /*border-left: 1px solid darkgray;*/
            }
            .border-left
            {
                border-left: 1px solid black;
            }
            .outter-block
            {
                width: 100%;
                float: left;
                padding: 0% 0%;
                margin: 0;
                font-size: 14px;
                text-align: center;
                border-top: 1px solid black;
               
            }
            .border-outter
            {
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                border-left: 1px solid black;
                border-right: 1px solid black;
                padding: 0px 5px;
            }
            .border-outter1
            {
                border-right: 1px solid black;
                height: 40px;
                padding: 12% 2% 2% 2%;
            }
            table
            {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            td, th
            {
                border: 1px solid black;
                /*text-align: center;*/
                padding: 5px;
                font-size: 12px;
            }
            .div-cont
            {
                    height: auto;
                    float: left;
                    padding: 8px;
                    margin: 0;
                    border: 1px solid black;
                    text-align: left;
            }
            .div-vertical
            {
                width: 100%;
                border-bottom: 1px solid black;
                padding: 1px 0px;
            }
            .div-cont1
            {
                    width: 13%;
                    font-size: 12px;
                    float: left;
                    margin: 0;
               
            }
            .bottom-content
            {
                font-size: 12px;
            }
            .div-left_check
            {
                width: 30%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;
                font-size: 14px;
            }
            .div-mid_check
            {
                width: 40%;
                height: auto;
                float: left;
                padding: 0%;
                margin: 0;
                font-size: 14px;
            }
            .div-right_check
            {
                width: 26%;
                height: auto;
                padding: 0% 0% 0% 0%;
                margin: 0;
                float: right;
                font-size: 14px;
            }
            .box-check{
               height:20px; width:20;
            }
            .check-box-text{
                position: relative;
                top: -5px;
            }
        </style>
   
        <div class="container1">
		<!-- <div class="div-left_check"><input type="checkbox" class="form-control" style="height:20px; width:20;">ORIGINAL FOR RECEIPIENT </div>
		<div class="div-mid_check"><input type="checkbox" class="form-control" style="height:20px; width:20;">DUPLICATE FOR SUPPLIER/TRANSPORTER </div>
		<div class="div-right_check"><input type="checkbox" class="form-control" style="height:20px; width:20;">TRIPLICATE FOR SUPPLIER </div> -->
		
            <div class="wrapper">            
            <!---------------------------------------->
              <?php 
                    $sql = mysql_query("SELECT * FROM company")or die(mysql_error($connection));
                    $res = mysql_fetch_array($sql);
               ?>


                <div class="div-left">
                <img src="<?php echo $res['logo'];?>" alt="logo" class="logo">
				</div> 
                <div class="div-right" style="float: right;">
                    <div style="padding: 0 7%; margin-top: 8px;">
                      <b><?php echo $res['company_name']; ?></b>
                    </div>
                 
                    <div style=" padding: 0 7%; font-size: 15px;">
                       Contact No.:<?php echo $res['company_phone']; ?>
                    </div>
                     <div style=" padding: 0 7%; font-size: 15px;">
                      E-MAIL: <?php echo $res['company_email']; ?>
                    </div>

                </div>
				  <div class="full-div">
                    <div class="inner-div">
              </div>
			  </div>
                <div class="div-left1">
                    <div class="header">Work Order </div>
                    <b style="font-size: 15px;float: left;padding:1% 0%;text-align: center; width: 100%;">As per section 31of CGST Act r/w Rules, 2017</b>
                </div>
                <div class="div-right1">
                    <div class="block1">
                        GSTIN:&nbsp;<b><?php echo $res['gst_no']; ?></b>
                    </div>
                    <div class="block1">State Code:&nbsp;<b><?php echo $res['state_code']; ?></b></div>
                    <div class="block1">PAN NO:&nbsp;<b><?php echo $res['pan_no']; ?></b></div>
                </div>
                <div class="outter-block">
                    <div class="div-left" style="width:49%;">
                        
						<div class="block2">
                           Registered Office:<b><?php echo $res['company_address']; ?> </b>
                        </div>
						
						<div class="block2">
                           Work Ord: <b><?php echo $data['id']; ?></b>
                        </div>
                        <div class="block2">
                            Date Of Issue: <b>
                            <?php echo date('d-M-Y',strtotime($data['record_date']));?></b>
                        </div>
                        
                    </div>

              

                <div class="outter-block">
                   <table>
                    <thead>
                      <tr>
						  <th>Sr No.</th>
						  <th>Project Name</th>
						  <th>Contractor Name</th>
						  <th>Work Type</th>
                          <th>Area</th>		 
						  <th>Rate</th>
						  <th>Unit</th>
						  <th>value</th>
                          <th>No of dayes</th>
					 </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sr_no=0;
                    $sq = mysql_query("SELECT * from tbl_work a inner join new_project b on a.pro_id=b.id  inner join mst_contractor c on c.id=a.cont_id where a.id='$id'")or die(mysql_error($connection));
                    while($row=mysql_fetch_array($sq))
                    {
                        $sr_no++;
                        $id1= $row['id'];
                        //$tax = $row['tax_amt'];
                        //$a=$tax/2; // Divide tax into SGST and CGST
                        //$total_price12=$row['total_amt'];
 
                   ?>
                        <tr>
                            <td><?php echo $sr_no; ?></td>
							<td><?php echo $row['pro_name']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['work_type']; ?></td>
                            <td><?php echo $row['area']; ?></td>
							<td>Rs.<?php echo $row['rate']; ?></td>
							<td><?php echo $row['unit']; ?> </td>  
                            <td><?php echo $row['value']; ?></td>
                            <td><?php echo $row['no_of_dayes']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
				      
                <div class="outter-block">
                   <?php
                    $ss = mysql_query("SELECT value FROM `tbl_work` WHERE id='$id'")or die(mysql_error($connection));
                    while ($arra=mysql_fetch_array($ss)) {
                      $value=$arra['value'];
                    }

                     // $total_price=$data['grand_total'];
					//$no = round($total_price);
                   //$point = round($total_price - $no, 2) * 100;
                    $hundred = null;
                    $digits_1 = strlen($value);
                    $i = 0;
                    $str = array();
                    $words = array('0' => '', '1' => 'one', '2' => 'two',
                                   '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                                   '7' => 'seven', '8' => 'eight', '9' => 'nine',
                                   '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                                   '13' => 'thirteen', '14' => 'fourteen',
                                   '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                                   '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                                   '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                                   '60' => 'sixty', '70' => 'seventy',
                                   '80' => 'eighty', '90' => 'ninety','100' => 'thousand');
									 $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
									 while ($i < $digits_1) {
									 $divider = ($i == 2) ? 10 : 100;
									 $total_price = floor($value % $divider);
									 $value = floor($value / $divider);
									 $i += ($divider == 10) ? 1 : 2;
									 if ($total_price) {
									 $plural = (($counter = count($str)) && $total_price > 9) ? 's' : null;
									 $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
									 $str [] = ($total_price < 21) ? $words[$total_price] .
									 " " . $digits[$counter] . $plural . " " . $hundred
									:
									$words[floor($total_price / 10) * 10]
									. " " . $words[$total_price % 10] . " "
									. $digits[$counter] . $plural . " " . $hundred;
									} else $str[] = null;
									}
									$str = array_reverse($str);
									$result = implode('', $str);
									
									
                    ?>
                    <div class="div-left1 div-cont" style="text-align:left; padding:2% 1%; width:68%; border-bottom:0 solid transparent; " >
                        <b>Total Amount (in Words):</b>&nbsp;INR <?php  echo  $result;?> Only
                    </div>
                   
                    <div class="div-cont1" style="width:25%; font-size:12px;  border: 1px solid #dddddd;">
                    <table style="font-size:10px;">
                        <tr> 
                            </tr><tr>   
                            </tr><tr>
                            <td>Payable Amount</td>

                            <td> <b>
                            <?php 
                                $ss = mysql_query("SELECT value  FROM `tbl_work` WHERE id='$id'")or die(mysql_error($connection));
                                while ($arra=mysql_fetch_array($ss)) {
                                    $value=$arra['value'];
                                }
                                echo $value; 
                            ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
				
                <div class="outter-block">
                    <div class="div-left" style="width:65%; border-right: 1px solid #bbbbbb;">
                        <div class="block2">
                            <b>Terms & conditions :</b>
                        </div>
                        <div class="block2 bottom-content">&nbsp;<!-- <?php echo $data['terms']; ?> --><b></b>
                        <textarea rows="10" cols="55" style="border: none; font-family: serif; font-size: 15px;" ><?php echo $data['terms']; ?> </textarea>
                        </div>
                        <div class="block2 bottom-content">&nbsp;</div>
                        <div class="block2 bottom-content">&nbsp;</div>
                    </div>
                    <div class="div-right" style="width:30%; ">
                        <div class="block2" style="text-align: center;">
                           Certified that the particulars given above are true and correct
                        </div>
                        <div class="block2" style="font-size:18px; text-align: center;"><b>For <?php echo $res['company_name']; ?></b></div>
                        <div class="block2">&nbsp;</div>
                        <div class="block2">&nbsp;</div>
						<div class="block2">&nbsp;</div>
                        <div class="block2">&nbsp;</div>
                        <div class="block2" style="text-align: center;" >Authorized Signature</div>
                    </div>
                </div>
            <!---------------------------------------->
             </div>
        </div>

     </div>
    </div>
  </div> 
