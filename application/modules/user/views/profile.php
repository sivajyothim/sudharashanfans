<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo SITE_NAME; ?></title>
<link href="<?php echo FRONT_CSS_PATH; ?>bootstrap.css" rel="stylesheet">
<link href="<?php echo FRONT_CSS_PATH; ?>css.css" rel="stylesheet">
<link href="<?php echo FRONT_CSS_PATH; ?>style.css" rel="stylesheet">
<link href="<?php echo FRONT_CSS_PATH; ?>dropdown.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo FRONT_THEME_PATH; ?>default/default.css" type="text/css" media="screen" />
<link href="<?php echo FRONT_CSS_PATH; ?>nivo-slider.css" rel="stylesheet">
<link href="<?php echo FRONT_CSS_PATH; ?>carousel.css" rel="stylesheet">
<link href="<?php echo FRONT_CSS_PATH; ?>font-awesome.min.css" rel="stylesheet">
<link href="<?php echo FRONT_CSS_PATH; ?>responsive.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo FAVICON_PATH; ?>">
<!--SEO start-->
<?php  $this->load->view(FRONT_SEO_PATH); ?>
<!--SEO end-->
</head>

<body>
<!--header start-->
<?php  $this->load->view(FRONT_HEADER_PATH); ?>
<!--header end-->

<!--slider bottom start-->

<!--Breadcrumbs start-->
<div class="">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo FRONT_LINK; ?>"><i class="fa fa-home"></i>Home</a></li>
  <li class="breadcrumb-item active">profile</li>
</ol>
</div>

<!--Breadcrumbs End-->
<!--profile main Start-->
    
<div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bhoechie-tab-menu" >
                      
                        <div class="list-group">
                            <a href="#profile" class="list-group-item active">
                                <h4 class="glyphicon glyphi glyphicon-user"></h4>&nbsp;&nbsp;Profile
                            </a>
                           
                            <a href="#orders" class="list-group-item">
                                <h4 class="glyphicon glyphi glyphicon-book"></h4>&nbsp;&nbsp;My Orders
                            </a>
                            
                           
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 bhoechie-tab">
                        <!-- flight section -->
                        <div id="profile" class="bhoechie-tab-content active col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <form action="">
                                <div class="row">
                                    <div class="form-group  formm">
                                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">User Name</label>
                                                <input type="email" class="form-control" id="email" placeholder="User name" name="email">
                                                <span class="dang"></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                                <span class="dang"></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">Mobile</label>
                                                <input type="email" class="form-control" id="email" placeholder="Mobile" name="email">
                                                <span class="dang"></span>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <div class="form-group  formm">
                                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">Pincode</label>
                                                <input type="email" class="form-control" id="email" placeholder="Pincode" name="email">
                                                <span class="dang"></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">Area</label>
                                                <input type="email" class="form-control" id="email" placeholder="Area" name="email">
                                                <span class="dang"></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">City</label>
                                                <input type="email" class="form-control" id="email" placeholder="City" name="email">
                                                <span class="dang"></span>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    
                                    <div class="form-group  formm">
                                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">Address</label>
                                                <textarea class="form-control" name="" id="" placeholder="Address"></textarea>
                                                <span class="dang"></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                            <label for="">State</label>
                                                <input type="email" class="form-control" id="email" placeholder="State" name="email">
                                                <span class="dang"></span>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>

                                </div>
                                <div class="alert alert-danger">Unable to fetch the userdata. User Api showing error. Please inform to support team</div>
                                <button type="submit" class="btn btn-default orangebtn pull-right" disabled>Update Profile</button>
                                
                            </form>
                            <div class="clearfix">&nbsp;</div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <!-- hotel search -->
                        <div id="orders" class="bhoechie-tab-content">
                            <div class="row order-head">
                                <h3>My Orders</h3>
                                <div class="row order-bar hide"><input type="text" placeholder="Search..." class="search-bar"><button class="submit-btn">Submit</button></div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div id="hack1">
                                        <div id="hack2">
                                            <table class="table table-bordered table-responsive">

                                                <tr>
                                                    
                                                    <th>S.no</th>
                                                    <th>Order ID</th>
                                                    <th>Price</th>
                                                    <th>Total Items</th>
                                                    <th>Delivery Date & Time</th>
                                                    <th>Status</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                                <?php
                                                $order_req = json_decode($orders);
                                                if($order_req->code == SUCCESS_CODE){
                                                foreach($order_req->orders_result as $order_res){
                                                ?>
                                                <tr>
                                                   
                                                    <td><?php echo $order_res->order_id; ?></td>
                                                    <td><?php echo $order_res->order_number; ?></td>
                                                    <td><?php echo $order_res->sub_total; ?></td>
                                                    <td><?php echo $order_res->item_count; ?></td>
                                                    <td><?php echo date('d-M-Y',strtotime($order_res->deliver_date)); ?>
                                                    <br/><?php echo $order_res->deliver_time; ?>
                                                    </td>
                                                    <td>Placed</td>
                                                    <!-- <td><i class="fa fa-check rightfa" aria-hidden="true"></i><i class="fa fa-times wrongfa" aria-hidden="true"></i></td> -->
                                                </tr>
                                                <?php } } else { ?>
                                                <tr>
                                                    <td colspan="6"><div class="alert alert-danger text-center">No orders found</div></td>
                                                </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
    
   <div class="claearfix">&nbsp;</div>



<!--Profile main Start-->


	
<!--welcome botrom end-->
	
	
<!--footer start-->
<?php   $this->load->view(FRONT_FOOTER_PATH); ?>
<!--footer end-->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="<?php echo FRONT_JS_PATH; ?>jquery.nivo.slider.js"></script>	
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
	
	
$(document).ready(function(){
$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
        next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
});
 </script>
 <script type="">
   $(function()
{
  $('.food > .info > .content .stars')
    .bind('mousemove', function(e)
    {
      var pct = e.pageX - $(this).offset().left;
          pct = pct / $(this).width() * 100;
      $(this).find('> em').css('width', pct + '%');
    })
    .bind('mouseleave', function()
    {
      $(this).find('> em').animate({ width: '91%' }, 250);
    });
});
 </script> 
 <script>
            $(document).ready(function () {
                $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                    e.preventDefault();
                    $(this).siblings('a.active').removeClass("active");
                    $(this).addClass("active");
                    var index = $(this).index();
                    $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                    $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                });
            });
        </script>

</body>
</html>
