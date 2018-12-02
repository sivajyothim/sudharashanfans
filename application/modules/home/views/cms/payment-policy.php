<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Privacy</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="<?php echo FRONT_IMAGES_PATH; ?>/icons/fav.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>/themify/themify-icons.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_FONTS_PATH; ?>/elegant-font/html-css/style.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>/slick/slick.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH; ?>/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH; ?>/main.css">
        <!--===============================================================================================-->
    </head>
    <style>
        .privacy li{
            margin-top:0.7em;
        }
    </style>
    <body class="" onload="getLocation()">

        <!-- Header -->
        <?php $this->load->view('front_includes/header'); ?>
        <div class="container">
            <div class="col-xs-12" style="padding-bottom:30px;">
                <h2 style="text-align: center;margin-top: 20px;" class="t-center">Payment policy</h2>
                <br>
                <p>Mode of Payment is most important for online shopping. We believe in providing our customers with choices, convenience and trusted payment options. Thus, you can always shop with confidence knowing that your payments are always secured. Shop with ease with our payment options that lets you pay both on and offline using major Credit Cards, Debit Cards, ATM cards and Net banking.</p>                <h3 class="m-text26 p-b-36 p-t-15">WHAT WE COLLECT</h3>
               
                <h4 class="m-text26 p-b-36 p-t-15">Credit Card/ Debit Card
                </h4>
                <p>You may use your credit/debit cards to make your purchase. Our payment gateway partners use 3D secure technology to keep your transaction details confidential at all times.

</p>

                
                <h4 class="m-text26 p-b-36 p-t-15">Credit cards
</h4>
<p>We accept Payments made using Visa, MasterCard and American Express credit cards .To pay using your credit card at checkout, you will need your card number, expiry date and three-digit CVV number (found on the backside of your card). After entering these details, you will be redirected to the bank's page for entering the online 3D secure password.</p>                    
<h4 class="m-text26 p-b-36 p-t-15">Debit cards</h4>
<p>we accept Payments made using Visa, MasterCard and Maestro debit cards. To pay using your debit card at checkout, you will need your card number, expiry date (optional for Maestro cards) and three-digit CVV number (optional for Maestro cards). After filling your card details you will be redirected to your bank's secure page for entering your online secure password (issued by your bank)to complete the payment.

</p>
<h4 class="m-text26 p-b-36 p-t-15">Internet Banking</h4>
<p>
    You may use internet banking to pay through your bank's interface by the help of a simplified step-by-step process. Your online transaction at …………..is highly secure and we follow very stringent action towards protecting your transaction details and Sudharshan fans nowhere saves your transaction details. All payments through debit cards and credit cards on Sudharshan fas are processed through 3D secure password service and trusted payment gateways managed by leading banks.


</p>


                  
            </div>
                        </div>
        
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
                        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/jquery/jquery-3.2.1.min.js"></script>
                        <!--===============================================================================================-->
                        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/animsition/js/animsition.min.js"></script>
                        <!--===============================================================================================-->
                        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/bootstrap/js/popper.js"></script>
                        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/bootstrap/js/bootstrap.min.js"></script>
                        <!--===============================================================================================-->
                        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/select2/select2.min.js"></script>
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
                        <script src="<?php echo FRONT_JS_PATH; ?>/map-custom.js"></script>
                        <!--===============================================================================================-->
                        <script src="<?php echo FRONT_JS_PATH; ?>/main.js"></script>

                        </body>
                        </html>
