<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Faq's</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="<?php echo FRONT_IMAGES_PATH; ?>/icons/fav.icon"/>
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
        ol>li{
            padding-bottom: 21px;
        }
    </style>
    <body class="" onload="getLocation()">

        <!-- Header -->
        <?php $this->load->view('front_includes/header'); ?>
        <div class="container">
            <div class="col-xs-12" style="padding-bottom:30px;">
                <h2 style="text-align: center;margin-top: 20px;" class="t-center">FAQ'S</h2>
                <br>
                <div style='margin-left: 50px;'>
                <ol>
                    <li>1.What material is the coil made up of?<p>Answer: 100%  Pure Copper  winding with MER technology.</p></li>
                    <li>2.How is the noise?<p>Answer: No Humming noise and heating</p></li>
                    <li>3.Will this fan work with inverter?<p>Answer: Yes, the fan performs well even at low voltage. It works on inverter as it consumes only 28 watts. Runs 3 times longer on an inverter resulting in longer battery life.</p></li>
                    <li>4.How to claim warranty?<p>Answer: You can write to us:
support@sudharshanfans.com
You can call us:
7893257238 (Mon-Sat 10am-6pm)
Note: Please call us with Barcode/serial number of FAN 
(Eg.SU-787652417)
</p></li>
                    <li>5. What is the material used for blades?<p>Answer: High quality aluminum is used for the blades.</p></li>
                    <li>6. How many RPM?<p>Answer: The highest rpm is 370 along with the boost mode.</p></li>
                    <li>7. How many years warranty is provided?<p>Answer: We provide 3 years warranty.</p></li>
                    <li>8.What is the power star rating for Sudharshan fans?<p>Answer:It’s all star rated technology with efficient design, elegant and powerful with MER technology.</p></li>
                    <li>9.Is regulator provided along with the fan?<p>Answer: No, we do not provide regulator, you can use the normal regulator or all speed functions are available in the remote.</p></li>
                    <li>10.Are the blades Anti-dust?<p>Answer: Yes.</p></li>
                    <li>11. How many models are available currently in ceiling fans?<p>Answer: We do have 6 models available, One model is with remote and other 5 models are with remote.</p></li>
                    <li>12. Are table fans available?<p>Answer: No, the table fans section is coming soon and under development.</p></li>
                    <li>13. Are Sudarshan fans available Online?<p>Answer: Yes.</p></li>
                    <li>14. Cancellation and returns ?<p>Answer: Once purchased Sudharshan Fans does not accept the return of the product. If you have received a damaged or defective product, please inform us at contact@sudharshanfans.com within 7 days of delivery of a product. 
                    <br/><b>Note:</b> An order cannot be cancelled once it has been placed.</p></li>
                    <li>15. Does it have double ball bearing?<p>Answer: Yes.</p></li>
                    
                    
                </ol>
                </div>
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
