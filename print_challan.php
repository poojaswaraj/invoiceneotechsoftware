<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        $query = mysql_query("SELECT * FROM common WHERE id='$id'")or die(mysql_error($connection));
            $data=mysql_fetch_array($query);
    }

?>

<div id="divToPrint1" style="display:none;">
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
                font-size: 14px;
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
                    padding: 0.8% 1%;
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
                text-align: center;
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
                    <!-- <img src="address-line-ushakal.png" alt="logo" class="logo-right"> -->
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
                        <b>Registered Office:</b> <?php echo $res['company_address']; ?>
                    </div>
                </div>
                <div class="div-left1">
                    <div class="header">DELIVERY CHALLAN</div>
                    <b style="font-size: 15px;float: left;padding: 3% 0%;text-align: center; width: 100%;">As per section 31of CGST Act r/w Rules, 2017</b>
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
                            Challan No: <b><?php echo $data['number']; ?></b>
                        </div>
                        <div class="block2">
                            Date Of Issue: <b><?php echo $data['issue_date']; ?></b>
                        </div>
                        <!-- <div class="block2">Place Of Supply: <b></b></div> -->
                    </div>
                    <div class="div-right border-left">
                        <div class="block2">
                            PO / WO No : <b></b>
                        </div>
                        <div class="block2">Date: <b></b></div>
                        <div class="block2">Project Name : <b></b></div>
                    </div>
                </div>

                <div class="outter-block">
                    <div class="div-left" style="width:49%;">
                        <div class="inner-div">
                            <b>Details of Recipient(Billed To)</b>
                        </div>
                    </div>

                    <div class="div-right border-left">
                        <div class="inner-div">
                            <b>Details of Consignee(Shipped To)</b>
                        </div>
                    </div>
                </div>

                <div class="outter-block">
                    <div class="div-left" style="width:49%; border: 1px solid #dddddd;">

                        <div class="block2">
                            Name: <b><?php echo $data['customer_name']; ?></b>
                        </div>

                        <div class="block2">
                           Contact Person: <b><?php echo $data['contact_person']; ?></b>
                        </div>

                         <div class="block2">
                           Email-ID: <b><?php echo $data['customer_email']; ?></b>
                        </div>

                        <div class="block2">
                            Address: <b><?php echo $data['invoicing_address']; ?></b>
                        </div>

                        <div class="block2">

                            <div class="div-left" style="width:49%;">
                                State: <b><?php echo $data['invoice_state']; ?></b>
                            </div>

                            <div class="div-right">
                                <div class="border-outter">
                                    State Code: <b><?php echo $data['in_state_code']; ?></b>
                                </div>   
                            </div>

                        </div>

                        <div class="block2">
                          
                            <div class="div-left" style="width:49%;">
                                GSTIN: <b><?php echo $data['cust_gst_no']; ?></b>
                            </div>

                            <div class="div-right">
                                <!-- <div class="border-outter"> -->
                                  PAN No: <b><?php echo $data['customer_identification']; ?></b>
                                <!-- </div>    -->
                            </div>


                        </div>

                       <!--  <div class="block2">
                            PAN No: <b><?php echo $data['customer_identification']; ?></b>
                        </div> -->
                        
                    </div>
                    <div class="div-right border-left">
                        <div class="block2">
                            Name: <b><?php echo $data['customer_name']; ?></b>
                        </div>
                        <div class="block2">
                            Contact Person: <b><?php echo $data['ship_cont_person']; ?></b>
                        </div>
                        <div class="block2">
                            Email-ID: <b><?php echo $data['ship_email']; ?></b>
                        </div>
                        <div class="block2">
                            Address: <b><?php echo $data['shipping_address']; ?></b>
                        </div>
                        <div class="block2">
                            <div class="div-left" style="width:49%;">
                                State: <b><?php echo $data['ship_state']; ?></b>
                            </div>
                            <div class="div-right">
                                <div class="border-outter" style="border-right: 0px; left: 3%; position: relative;">
                                    State Code: <b><?php echo $data['ship_state_code']; ?></b>
                                </div>   
                            </div>
                        </div>
                        <div class="block2">
                            <div class="div-left" style="width:49%;">
                                GSTIN: <b><?php echo $data['cust_gst_no']; ?></b>
                            </div>

                            <div class="div-right">
                                <!-- <div class=""> -->
                                  PAN No: <b><?php echo $data['customer_identification']; ?></b>
                                <!-- </div>    -->
                            </div>
                        </div>
                        <!-- <div class="block2">&nbsp;<b></b></div> -->
                        <!-- <div class="block2">
                            PAN No: <b><?php echo $data['customer_identification']; ?></b>
                        </div> -->
                    </div>
                </div>
                <div class="outter-block">
                   <table>
                    <thead>
                      <tr>
                        <th>Sr.<br/>no</th>
                        <th>Description of Goods</th>
                        <th>HSN/SAC</th>
                        <th>Qty</th>
                        <!--<th>Rate</th>-->
<!--                        <th>Taxes</th>
                        <th>Dis.</th>
                        <th>Price</th>-->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                            $sr_no=0;
                         $sq = mysql_query("SELECT b.reference,a.* FROM `item` a INNER JOIN `product` b ON a.product_id=b.id LEFT JOIN common c ON c.id=a.common_id WHERE  a.common_id='$id'")or die(mysql_error($connection));
                            while($row=mysql_fetch_array($sq))
                            {
                                 $sr_no++;
                                $id1=$row['id'];
                                 $tax = $row['tax_amt'];
                                 $a=$tax/2; // Divide tax into SGST and CGST
                      ?>
                          <tr>
                            <td><?php echo $sr_no; ?></td>
                            <td><?php echo $row['reference']; echo"(".$row['description'].")"; ?></td>
                            <td><?php echo $row['hsn_code']; ?></td>
                            <td><?php echo round($row['quantity']); echo "Nos"; ?></td>
<!--                            <td><?php echo $row['unitary_cost'];?></td>-->
                            <!--<td>-->
                             <?php
//                                $sel=mysql_query("SELECT b.sgst,b.cgst,b.value,a.* FROM item_tax a INNER JOIN tax b ON b.value=a.tax_value  where a.item_id=$id1");
//                                while($arr=mysql_fetch_array($sel))
//                                    {
//                                        echo $arr['sgst'];echo "&nbsp;-Rs.".$a; echo "<br><br>".$arr['cgst'];echo "&nbsp;-Rs.".$a;
//                                    }   
                             ?>
<!--                            </td>
                            <td><?php echo round($row['disc_amt']);?></td>
                            <td><?php echo $row['price'];?></td>-->
                          </tr>
                          <?php } ?>
                           <tr>
                            <?php 
                                $sum = mysql_query("SELECT SUM(disc_amt) as 'Total_dis', SUM(tax_amt) as 'Total_tax', SUM(a.price) as 'Total_price' FROM item a INNER JOIN product b ON a.product_id=b.id INNER JOIN common c ON c.id=a.common_id WHERE  a.common_id='$id'")or die(mysql_error($connection));
                                while($arr=mysql_fetch_array($sum))
                                {
                                    // $base=$arr['base'];
                                    // $discount =$arr['Total_dis'];

                                    // $Subtotal =$base-$discount;
                            ?>
                            <td></td>
                            
                            <td>-</td>
                           <td>-</td>
                           
<!--                            <td><b>Rs.<?php echo $arr['Total_tax']; ?></b></td>
                            <td><b>Rs.<?php echo round($arr['Total_dis']); ?></b></td>
                            <td><b>Rs.<?php echo $arr['Total_price'];?></b></td>-->
                            <?php } ?>
                          </tr>
                    </tbody>
                </table>
                </div>
<!--                 <div class="outter-block">
                    <div class="div-cont" style="width:98%; border-bottom:0 solid transparent;">
                        <b>Total Amount (in Words):&nbsp;<br/>INR <?php echo $data['amt_words'];?> Only</b>
                    </div>-->
                   <!--  <div class="div-cont" style="width:18%;">                        
                            <b>Total Amount After Tax</b>                        
                    </div>
                    <div class="div-cont" style="width:7%; border-bottom:0 solid transparent; border-left:0px;">
                    <?php 
                        $sum = mysql_query("SELECT SUM(disc_amt) as 'Total_dis', SUM(tax_amt) as 'Total_tax', SUM(a.price) as 'Total_price' FROM item a INNER JOIN product b ON a.product_id=b.id INNER JOIN common c ON c.id=a.common_id WHERE  a.common_id='$id'")or die(mysql_error($connection));
                        while($arr=mysql_fetch_array($sum))
                        {
                                    
                     ?>
                      <?php echo $arr['Total_price'];?>
                      <?php } ?>
                    </div> -->
                <!--</div>-->
<!--                <div class="outter-block">
                    <div class="div-left1 div-cont" style="text-align:left; padding:2% 1%; width:98%; border-bottom:0 solid transparent; " >
                        <b>Bank Details</b><br>
                         <textarea rows="5" cols="96" style="border: none; font-family: serif; font-size: 15px;" ><?php echo $res['bank_details'];?></textarea>
                           <?php echo $res['bank_details'];echo "<br>"; ?> 
                    </div>
                
                </div>-->
             
                <div class="outter-block">
                    <div class="div-left" style="width:49%; border-right: 1px solid #bbbbbb;">
                        <div class="block2">
                            <b>Terms & conditions :</b>
                        </div>
                        <div class="block2 bottom-content"><!-- &nbsp;<?php echo $res['terms']; ?><b></b> -->
                        <textarea rows="6" cols="45" style="border: none; font-family: serif; font-size: 15px;" ><?php echo $res['terms'];?></textarea>

                        </div>
                        <!-- <div class="block2 bottom-content">2:&nbsp;Interest will be recovered @24% p.a plus GST on overdue unpaid bills.</div> -->
                        <div class="block2 bottom-content">&nbsp;</div>
                         <div class="block2 bottom-content">&nbsp;</div>
                          <!-- <div class="block2 bottom-content">&nbsp;</div> -->
                    </div>
                    <div class="div-right">
                        <div class="block2" style="text-align: center;">
                           Certified that the particulars given above are true nd correct
                        </div>
                        <div class="block2" style="font-size:18px; text-align: center;"><b>For&nbsp;<?php echo $res['company_name']; ?></b></div>
                        <div class="block2">&nbsp;</div>
                        <div class="block2">&nbsp;</div>
                        <div class="block2" style="text-align: center;" >Authorised Signature</div>
                    </div>
                </div>
            <!---------------------------------------->
             </div>
        </div>

     </div>
    </div>
  </div> 
