<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo FRONT_IMAGES_PATH;?>/icons/fav.icon"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH;?>/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH;?>/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH;?>/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH;?>/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH;?>/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH;?>/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH;?>/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH;?>/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH;?>/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH;?>/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH;?>/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH;?>/main.css">
<!--===============================================================================================-->
</head>
<body class="" onload="getLocation()">

	 <!-- Header -->
        <?php $this->load->view('front_includes/header'); ?>

	<!-- Title Page -->
	 <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo FRONT_IMAGES_PATH; ?>/heading-pages-02.jpg);">
            <h2 class="l-text2 t-center" style="margin-top: -75px;
                margin-left: -850px;color:black;">
                Contact us
            </h2>
            
        </section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
                                            


						<div class="contact-map size21" id="google_map" data-map-x="17.4447068" data-map-y="78.4663812" data-pin="<?php echo FRONT_IMAGES_PATH;?>/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
				    <b>Address :</b><br/>
				    <address># 34-35 ,<br/> APPAREL PARK INDUSTRIAL ESTATE ,<br/> 
KOMPALLY,<br/> HYDERABAD-500100</address>
Phone : 040-48549979<br/>

					<form class="leave-comment" style="display:none">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Phone Number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	 <!-- Footer -->
        <?php $this->load->view('front_includes/footer'); ?>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH;?>/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH;?>/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH;?>/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH;?>/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH;?>/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="<?php echo FRONT_JS_PATH;?>/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo FRONT_JS_PATH;?>/main.js"></script>

</body>
</html>
