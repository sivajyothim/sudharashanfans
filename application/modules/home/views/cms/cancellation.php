<!DOCTYPE html>
<html lang="en">
    <head>
        <title>cancellation</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="<?php echo FRONT_IMAGES_PATH; ?>/icons/favicon.png"/>
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
    <body class="animsition" onload="getLocation()">

        <!-- Header -->
        <?php $this->load->view('front_includes/header'); ?>
        <div class="container">
            <div class="col-xs-12" style="padding-bottom:30px;">
                <h2 style="text-align: center;margin-top: 20px;" class="t-center">Cancellation Policy</h2>
                <br>
                <p>Once purchased,<?php echo PROJECT_NAME; ?> does not accept the return of the product. If you have received a damaged or defective product, please inform us at support@sudharshanfans.com within 7 days of delivery of a product.</p>
                <p style="text-align:center;">An order cannot be cancelled once it has been placed.</p>
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
