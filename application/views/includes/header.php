<div class="top">
    <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <div class="top-left">
                <ul>
                    <?php 
                    $user_sess_log_status =  $this->session->userdata('user_login_status');    
                    
                    ?>
                    <?php
                     if($user_sess_log_status == 1){
                        $user_sess_id = $this->session->userdata(US_EXT.'userid'); 
                        $user_sess_name = $this->session->userdata(US_EXT.'username'); 
                         ?>
                     <li><a href="<?php echo base_url(); ?>profile">Welcome <b><?php echo fetch_ucfirst($user_sess_name);  ?></b></a></li>
                     <li><a href="<?php echo base_url(); ?>signout" onclick="return confirm('Confirm to signout from account ?')">Sign out</a></li>	
                      <?php } else{
                     ?>
                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal"> Login / Register</a></li>
                    <li><a href="<?php echo base_url(); ?>vendor-signup">Become a Seller</a></li>	
                     <?php } ?>
                   
                    <li><a href="#"><i class="fa fa-phone"></i><?php echo SITE_PHONE; ?></a>
                    
                    
                    </li>
                    <div class="clearfix"></div>
                </ul>	
            </div>	
        </div>	

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="social">
                <ul>
                    <li><a href="<?php echo SOCIAL_FACEBOOK; ?>"><i class="fa fa-facebook"></i></a></li>	
                    <li><a href="<?php echo SOCIAL_LINKEDIN; ?>"><i class="fa fa-linkedin"></i></a></li>	
                    <li><a href="<?php echo SOCIAL_GOOGLE; ?>"><i class="fa fa-google-plus"></i></a></li>	
                    <li><a href="<?php echo SOCIAL_INSTAGRAM; ?>"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="<?php echo SOCIAL_TWITTER; ?>"><i class="fa fa-twitter"></i></a></li>	
                    <div class="clearfix"></div>
                </ul>	
            </div>	
        </div>

    </div>	
</div>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-9">
                <div class="logo">
                    <a href="<?php echo FRONT_LINK; ?>">
                        <img src="<?php echo LOGO_PATH; ?>" class="img-responsive" title="<?php echo SITE_NAME; ?>" alt="<?php echo SITE_NAME; ?>"/>
                    </a>
                </div>
            </div>



            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-3">



                <!--menu start-->	
                <div class="menu">
                    <div id="navbar">    
                        <nav class="navbar navbar-default navbar-static-top" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                    <span class="sr-only">Menu</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <?php
                             $header_cartsession=$this->session->userdata('cartsession');
                            $item_count=0;
$url=base_url().'home/Cart/checkoutStatustics/'.$header_cartsession ;
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$statistics_req = curl_exec($ch);
curl_close($ch);
$checkout_statistics_res = json_decode($statistics_req);
$item_count = $checkout_statistics_res->order_item_count;
?>
                            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="<?php echo FRONT_LINK; ?>">Home</a></li>
                                    <li><a href="<?php echo base_url(); ?>aboutus">About Us</a></li>
                                    <li><a href="<?php echo base_url(); ?>menu">Menu</a></li>
                                    <li><a href="<?php echo base_url(); ?>menu"> Gallery</a></li>
                                    <li><a href="<?php echo base_url(); ?>testimonials">Testimonials</a></li>
                                    <li><a href="<?php echo base_url(); ?>reservation">Reservation (<span id="header_chekout_count"><?php echo $item_count; ?></span>)</a></li>
                                    <li><a href="<?php echo base_url(); ?>contactus">Contact Us</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div>

                </div>

                <!--menu end-->
                <div class="clearfix"></div>
            </div>


            <div class="clearfix"></div>
        </div>
    </div>
</header>
<input type="hidden" id="cart_count_val" value="<?php echo $item_count; ?>">