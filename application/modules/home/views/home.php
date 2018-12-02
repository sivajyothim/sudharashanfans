<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo SITE_NAME; ?> - India's most energy efficient ceiling fans</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="<?php echo FRONT_IMAGES_PATH; ?>icons/fav.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>themify/themify-icons.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>elegant-font/html-css/style.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>slick/slick.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>lightbox2/css/lightbox.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH; ?>util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH; ?>main.css">
        <!--===============================================================================================-->
    </head>
    <style>
        /**********************
/***** Services *******
/*********************/
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        section{
            padding: 60px 0;
        }
        section .section-title{
            text-align:center;
            color:#ffcb05;
            margin-bottom:50px;
            text-transform:uppercase;
        }
        #what-we-do{
            background:#f2f2f2;
        }
        #what-we-do .card{
            padding: 1rem!important;
            border: none;
            margin-bottom:1rem;
            -webkit-transition: .5s all ease;
            -moz-transition: .5s all ease;
            transition: .5s all ease;
        }
        #what-we-do .card:hover{
            -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        }
        #what-we-do .card .card-block{
            padding-left: 50px;
            position: relative;
        }
        #what-we-do .card .card-block a{
            color: #ffcb05 !important;
            font-weight:700;
            text-decoration:none;
        }
        #what-we-do .card .card-block a i{
            display:none;

        }
        #what-we-do .card:hover .card-block a i{
            display:inline-block;
            font-weight:700;

        }
        #what-we-do .card .card-block:before{
            font-family: FontAwesome;
            position: absolute;
            font-size: 39px;
            color: #ffcb05;
            left: 0;
            -webkit-transition: -webkit-transform .2s ease-in-out;
            transition:transform .2s ease-in-out;
        }
        #what-we-do .card .block-1:before{
            content: "\f0e7";
        }
        #what-we-do .card .block-2:before{
            content: "\f0eb";
        }
        #what-we-do .card .block-3:before{
            content: "\f0e7";
        }
        #what-we-do .card .block-4:before{
            content: "\f25b";
        }
        #what-we-do .card .block-5:before{
            content: "\f0a1";
        }
        #what-we-do .card .block-6:before{
            content: "\f00c";
        }
        #what-we-do .card:hover .card-block:before{
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);	
            -webkit-transition: .5s all ease;
            -moz-transition: .5s all ease;
            transition: .5s all ease;
        }
        .card-block>h3{
            font-size:23px;
        }
    </style>
    <body class="">

        <!-- Header -->
        <?php include "front_includes/header.php"; ?>

        <!-- Slide1 -->
        <section class="slide1">
            <div class="wrap-slick1">
                <div class="slick1">
                    <div class="item-slick1 item1-slick1" style="background-image: url(<?php echo FRONT_IMAGES_PATH; ?>master-slide-02.jpg);">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                            <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                                Never settle for anything less than the best
                            </span>

                            <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                                Switch To Smart
                            </h2>

                            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                                <!-- Button -->
                                <a href="<?php echo FRONT_LINK . "products/"; ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick1 item2-slick1" style="background-image: url(<?php echo FRONT_IMAGES_PATH; ?>master-slide-03.jpg);">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                            <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                                India's Most Energy Efficient Ceiling Fans with
                            </span>

                            <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                                MER Technology
                            </h2>

                            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                                <!-- Button -->
                                <a href="<?php echo FRONT_LINK . "products/"; ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick1 item3-slick1" style="background-image: url(<?php echo FRONT_IMAGES_PATH; ?>master-slide-04.jpg);">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                            <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                                Energy Saving Upto 80% by changing Your 1 Fan With Our Latest Technology
                            </span>

                            <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                                Saves up to  Rs.2200/- per Year
                            </h2>

                            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                                <!-- Button -->
                                <a href="<?php echo FRONT_LINK . "products/"; ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- New Product -->
        <section class="newproduct bgwhite p-t-45 p-b-105">
            <div class="container">
                <div class="sec-title p-b-60">
                    <h3 class="m-text5 t-center">
                        Featured Products
                    </h3>
                </div>

                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        <?php
                        $data_req = json_decode($product_list);
//print_r($data_req);
                        if ($data_req->code == SUCCESS_CODE):
                            foreach ($data_req->product_result as $data_res):
                                ?>
                                <?php
                                $addtocartID = base64_encode(CS_SECURITY . $data_res->product_id);
                                $catName = $data_res->fan_type;
                                $colorTitle='';
                                ?>
                                <div class="item-slick2 p-l-15 p-r-15">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">

                                            <a href="<?php echo FRONT_LINK . "products/" . $catName . "/" . url_title($data_res->product_title) . "/" . $data_res->product_id; ?>"><img src="<?php echo $data_res->display_pic; ?>" alt="IMG-PRODUCT">
                                            </a>


                                            <!--                                            <div class="block2-overlay trans-0-4">
                                                                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                                                                            </a>
                                            
                                                                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                                                                
                                                                                                 Button 
                                                                                                <button onclick="addItemToCart('<?php echo $addtocartID; ?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                                                                    Add to Cart
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>-->
                                        </div>

                                        <div class="block2-txt p-t-20">
                                            <a href="<?php echo FRONT_LINK . "products/" . $catName . "/" . url_title($data_res->product_title) . "/" . $data_res->product_id; ?>" class="block2-name dis-block s-text3 p-b-5">
                                                <?php echo $data_res->product_title; ?>
                                            </a>

                                            <span class="block2-price m-text6 p-r-5">
                                                Rs.<?php echo $data_res->selling_price; ?>
                                            </span>
                                            <button onclick="addItemToCart('<?php echo $addtocartID; ?>','<?php echo $data_res->default_color;?>','<?php echo $colorTitle; ?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            endforeach;
                        endif;
                        ?>	
                    </div>
                </div>

            </div>
        </section>

        <!-- what we do -->
        <section class="banner2 bg5 p-t-55 p-b-55">
            <div class="container">
                <div class="row">
                    <section id="what-we-do">
                        <div class="container-fluid">
                            <h2 class="section-title mb-2 h1">WE AIM FOR EXCELLENCE, ALWAYS.</h2>
                            <!--<p class="text-center text-muted h5">sudharshan fans promotional text will come here.</p>-->
                            <div class="row mt-5">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block block-1">
                                            <h3 class="card-title">Runs smoothly</h3>
                                            <p class="card-text">Runs smoothly at wide voltage range of 90-300V.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block block-2">
                                            <h3 class="card-title">warranty</h3>
                                            <p class="card-text">3 years on site warranty on all fans .</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block block-3">
                                            <h3 class="card-title">Timer mode</h3>
                                            <p class="card-text">Automatically stops after the programmed hour - Saves energy, increases comfort level.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block block-4">
                                            <h3 class="card-title">MER Technology</h3>
                                            <p class="card-text">All sudharshan fans runs with the Magno-Electric Rotor Technology which gives the high efficiency.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block block-5">
                                            <h3 class="card-title">Smart Mode</h3>
                                            <p class="card-text">The fan operates the the Speed of 300 Rpm for better comfort level and saves energy.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-block block-6">
                                            <h3 class="card-title">Consistent performance</h3>
                                            <p class="card-text">Consistent performance even at low voltage and power.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
                    </section>


                </div>
            </div>
        </section>
        <!--power saving pngs-->
        <div class="flex-w">
            <div class="col-md-4">
                <img class="img-responsive" src="<?php echo FRONT_IMAGES_PATH; ?>power-saving.png" width="500px" style="margin-top: 130px;
                     margin-left: 55px;"/>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <img class="img-responsive" src="<?php echo FRONT_IMAGES_PATH; ?>energy-saving.png" width="600px" style="margin-top:20px;"/>
            </div>
        </div>





        <!-- Shipping -->
        <section class="shipping bgwhite p-t-62 p-b-46">
            <div class="flex-w p-l-15 p-r-15">
                <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                    <h4 class="m-text12 t-center">
                        Free Delivery All India
                    </h4>

                    <a href="#" class="s-text11 t-center">
                        Click here for more info
                    </a>
                </div>

                <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                    <h4 class="m-text12 t-center">
                        3 Years Warranty
                    </h4>

                    <span class="s-text11 t-center">
                        Simply exchange it for any manufacturing defects.
                    </span>
                </div>

                <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                    <h4 class="m-text12 t-center">
                        Local Stores
                    </h4>

                    <span class="s-text11 t-center">
                        Shop open from Monday to Sunday
                    </span>
                </div>
            </div>
        </section>


        <!-- Footer -->
        <?php include "front_includes/footer.php"; ?>



        <!-- Back to top -->
        <div class="btn-back-to-top bg0-hov" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span>
        </div>

        <!-- Container Selection1 -->
        <div id="dropDownSelect1"></div>



        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>bootstrap/js/popper.js"></script>
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>select2/select2.min.js"></script>
        <script type="text/javascript">
                                                $(".selection-1").select2({
                                                    minimumResultsForSearch: 20,
                                                    dropdownParent: $('#dropDownSelect1')
                                                });
        </script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>slick/slick.min.js"></script>
        <script type="text/javascript" src="<?php echo FRONT_JS_PATH; ?>slick-custom.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>lightbox2/js/lightbox.min.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript">
//		$('.block2-btn-addcart').each(function(){
//			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
//			$(this).on('click', function(){
//				swal(nameProduct, "is added to cart !", "success");
//			});
//		});
//
//		$('.block2-btn-addwishlist').each(function(){
//			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
//			$(this).on('click', function(){
//				swal(nameProduct, "is added to wishlist !", "success");
//			});
//		});
        </script>

        <!--===============================================================================================-->
        <script src="<?php echo FRONT_JS_PATH; ?>main.js"></script>

    </body>
</html>
