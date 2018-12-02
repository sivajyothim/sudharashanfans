<!DOCTYPE html>
<html lang="en">
<head>
  <title>CCAvenue Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
</head>
<body onload="load()">
	<div class="container">
  
	<form method="post" name="customerData" id="customerData" action="<?php echo base_url(); ?>home/Cart/payrequest">
 
 
<div class="form-group">
      <?php 
      $order=json_decode($orderdetails);
     // $payment=$order->order_price;
     $payment=1;
      ?>
      <input type="hidden" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $order->shipping_name; ?>">
    </div>
    <div class="form-group">
      
      <input type="hidden" class="form-control" id="address" placeholder="Enter address" name="address" value="<?php echo $order->shipping_address; ?>">
    </div>
 <div class="form-group">
      
      <input type="hidden" class="form-control" id="amount" placeholder="Enter amount" name="amount" value="<?php echo $payment; ?>">
    </div>
 
				<input type="hidden" name="tid" id="tid" readonly />
				<input type="hidden" name="merchant_id" value="174227"/>
				<input type="hidden" name="order_id" value="<?php echo $order->order_number; ?>"/>
				
				<input type="hidden" name="currency" value="INR"/>
				<input type="hidden" name="redirect_url" value="http://sudharshanfans.com/paymentsuccess"/>
				<input type="hidden" name="cancel_url" value="http://sudharshanfans.com/paymentfail"/><input type="hidden" name="language" value="EN"/>
				<!-- <button type="submit" class="btn btn-default">Pay Now</button> -->
	      </form>
	  </div>
	</body>
	<script>
function load()
{
document.customerData.submit()
}
</script>
</html>