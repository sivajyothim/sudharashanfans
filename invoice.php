<html>
<head>
  <title>Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css" media="screen">
.highlight_b{font-weight:bold;} .disp_addr_cls{}
  </style>
</head>
<body>
<div class="container">
  
    
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>TAX Invoice (Sec.31 / R.1 tax invoice rules)</strong></h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-condensed">
                <?php
                  $total_colspan=12;
                  $devide_colspan=($total_colspan/2);
                ?>
                <tbody>
                <tr>
                <td colspan="<?php echo $total_colspan; ?>">
                    <h5 class="highlight_b">KLC Constructions</h5>
                    <p><b>Address :</b> Flat No.1112, Sapphire bolock, My Home Jewel, Madinaguda,Miyapur,R.R Dist - 500050</p>
                    <p>email : klc constuctions@yahoo.com  PH No: 9346043212</p>
                    <p>(M) : 9346043212</p>
                </td>
                </tr>
                 <tr>
                <td colspan="<?php echo $devide_colspan; ?>">
                    <h5 class="highlight_b">GSTIN : 36AALFKS708J1Z0</h5>
                    <p class="disp_addr_cls"><b>Period</b> : Sep Month</p>
                    <p class="disp_addr_cls"><b>Serial no.of Invoice </b> : KLC/BHJ/GST_6314/1/035</p>
                    <p class="disp_addr_cls"><b>Work Order No </b> : 430000/ Date : 16.08.201</p>
                </td>
                <td colspan="<?php echo $devide_colspan; ?>">
                    <h5 class="highlight_b">Invoice Date : 21-11-2017</h5>
                    <p class="disp_addr_cls"><b>RA BILL No.</b> : 01</p>
                    
                </td>
                </tr>

                 <tr>
                <td colspan="<?php echo $devide_colspan; ?>">
                    <h5 class="highlight_b">Details of Receiver (Billed to)</h5>
                    <p> M/S. Aqua Space Developers Pvt Ltd.</p>
                    <p>8th floor, 3rd Block, My home hub</p>
                    <p>Madhapur, Hyderabad - 500081</p>
                    <p>TG-36</p>
                    <p>GSTIN / Unique ID :  (36AAHCA0369E1ZW)</p>
                </td>
                <td colspan="<?php echo $devide_colspan; ?>">
                    <h5 class="highlight_b">Details of Consignee (Shipped to)</h5>
                    <p>Work location : Booja Site</p>
                    <p> M/S. Aqua Space Developers Pvt Ltd.</p>
                    <p>Sy.No . 83/1, Hyderabad Knowledge City,</p>
                    <p>Panmaktha, Raidurgam - 500032</p>
                    <p>TG-36</p>
                    </td>
                </tr>
                <tr><td colspan="<?php echo $total_colspan; ?>" style="border:1px solid #000">Shuttering Work, Reinforcement Works & Concrete Works at Bhoja Project Tower-07. MAINI WORK</td></tr>
                  <!-- foreach ($order->lineItems as $line) or some such thing here -->
                             <tr>
                                <td><strong>S.No</strong></td>
                                <td class="text-center"><strong>Description of Goods <br/> /Services</strong></td>
                                <td class="text-center"><strong>HSN / <br/>SAC Code</strong></td>
                                <td class="text-center"><strong>UNIT</strong></td>
                                <td class="text-center"><strong>QTY</strong></td>
                                <td class="text-center"><strong>Rate</strong></td>
                                <td class="text-center"><strong>Total</strong></td>
                                <td class="text-center"><strong>Discount</strong></td>
                                <td class="text-center"><strong>Taxable Value</strong></td>
                                <td class="text-center"><strong>Discount</strong></td>
                                <td class="text-center"><strong>CGST</strong></td>
                                <td class="text-center"><strong>SGST</strong></td>
                                
                      </tr>

                       <tr>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td rowspan="2"></td>
                                <td class="text-center"><strong>Taxable Value</strong></td>
                                <td class="text-center"><strong>Discount</strong></td>
                                <td class="text-center"><strong>CGST</strong></td>
                                <td class="text-center"><strong>SGST</strong></td>
                                
                      </tr>

                                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
         <div class="col-md-12">
            <div class="col-md-4">
              <h3 class="text-center">Order Summary</h3><hr>
              <div class="pull-left"><h4>Subtotal</h4> </div>
              <div class="pull-right"><h4 class="text-right">$11.99</h4></div>
              <div class="clearfix"></div>
              <div class="pull-left"><h4>Tax</h4> </div>
              <div class="pull-right"><h4 class="text-right">$1.99</h4></div>
              <div class="clearfix"></div>
              <div class="pull-left"><h4>Order Total</h4> </div>
              <div class="pull-right"><h4 class="text-right">$13.50</h4></div>
              <div class="clearfix"></div>
          </div>
          <div class="col-md-4 offset-md-1">
              <h3 class="text-center">Payment Type</h3><hr>
              <div class="text-center">
                  <strong>Paid by Credit Card</strong><br>
               </div>
          </div>
          <div class="col-md-4 offset-md-2">
              <h3 class="text-center">Other Info</h3><hr>
              <address>
                  <strong>Billed To:</strong><br>
                  John Smith<br>
                  1234 Main<br>
                  Apt. 4B<br>
                  Springfield, ST 54321
               </address>
          </div>
      </div>
    </div>
</div>
</body>
</html>