<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45" style="background-image: url(http://localhost/fans/front_assests/images//footer-strip.png);
    background-repeat: none;
    background-repeat: no-repeat;
    background-position: center bottom;">
		<div class="flex-w p-b-90">
                    <!--<img src="http://localhost/sudharsanfans/front_assests/images//footer-strip.png"/>-->
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
                                            Any questions? Let us know in store at <br/> # 34-35 , APPAREL PARK INDUSTRIAL ESTATE , <br/>KOMPALLY, HYDERABAD-500100, PH:040-48549979. or<br/> CALL US  ON :040-48549979 (MON-FRI 10AM - 5PM).
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
                                    
                                    <?php
                                $menu_req = json_decode($product_menu_details);
                                //echo $product_menu_details;
                                if ($menu_req->code == SUCCESS_CODE):
                                    foreach ($menu_req->fantype_result as $menu_res):
                                    $menulink=($menu_res->enable_status==1)?FRONT_LINK . "products/" . url_title($menu_res->fantype_title) . "/" . $menu_res->fantype_id:'javascript:void(0)';
                                        ?>
					<li class="p-b-9">
						<a href="<?php echo $menulink; ?>" class="s-text7">
							<?php echo ucfirst($menu_res->fantype_title) ?> <?php if($menu_res->enable_status==0){ ?>(Coming Soon..)<?php } ?>
						</a>
					</li>
                                          <?php endforeach; endif;  ?>

					

					
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					

					<li class="p-b-9">
						<a href="<?php echo base_url().'aboutus';?>" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url().'contactus';?>" class="s-text7">
							Contact Us
						</a>
					</li>

					
                                       
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
                                     <li class="p-b-9">
						<a href="<?php echo base_url().'privacy';?>" class="s-text7">
							Privacy & Policy
						</a>
					</li>
					
                                        <li class="p-b-9">
						<a href="<?php echo base_url().'payment';?>" class="s-text7">
							payment policy
						</a>
					</li>

					
                                        <li class="p-b-9">
						<a href="<?php echo base_url().'cancellation';?>" class="s-text7">
							Cancellation Policy
						</a>
					</li>
					<li class="p-b-9">
						<a href="<?php echo base_url().'faqs';?>" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Mailing Contact 
				</h4>
                            <p><i class="fa fa-envelope"></i> support@sudharshanfans.com</p>
                            <p><i class="fa fa-envelope"></i> sales@sudharshanfans.com</p>
                            <p><u>For quick contact :</u><br/><i class="fa fa-envelope"></i> info@sudharshanfans.com</p>
<!--				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						 Button 
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>-->
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			
				<img class="h-size2" src="<?php echo FRONT_IMAGES_PATH;?>icons/paypal.png" alt="IMG-PAYPAL">
			

			
				<img class="h-size2" src="<?php echo FRONT_IMAGES_PATH;?>icons/visa.png" alt="IMG-VISA">

				<img class="h-size2" src="<?php echo FRONT_IMAGES_PATH;?>icons/mastercard.png" alt="IMG-MASTERCARD">

				<img class="h-size2" src="<?php echo FRONT_IMAGES_PATH;?>icons/express.png" alt="IMG-EXPRESS">

				<img class="h-size2" src="<?php echo FRONT_IMAGES_PATH;?>icons/discover.png" alt="IMG-DISCOVER">

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | Design & Developed By  <a href="http://vgrowmedia.com" target="_blank">Vgrow Media</a>
			</div>
		</div>
	</footer>
<script type="text/javascript">
function  addItemToCart(itemid,dcolor,available_color)
{
    $('.cart-msg').html('').removeClass('alert alert-suceess alert-danger');

    $.ajax({
            dataType: 'JSON',
            type: 'post',
            data:{'itemid':itemid,'default_color':dcolor,'selected_color':available_color},
            url: "<?php echo base_url(); ?>itemaddtocart",
            success: function (s) { console.log(s);
           let resMsg=(s.code == 200)?'success':'danger';
            $('.cart-msg').html(s.description).addClass('alert alert-'+resMsg);

            window.location=location.href;
                
            },
            error:function(e){console.log(e);}
    });
}


</script>	