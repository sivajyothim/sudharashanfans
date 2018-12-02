<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cart</title>
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
    <body class="">

        <!-- Header -->
        <?php  include "front_includes/header.php"; ?>
        <!--Main Sectiom cpode start -->
        <div class="container">

            <div class="row marketing">
                <?php
                $order_req = json_decode($order_details);
                $item_req = json_decode($order_item_details);
                $order_res = $order_req->order_result;
                ?>
                <div class="col-lg-12">
                   
                    <div class="clearfix">&nbsp;</div>
                    <div class="alert alert-success text-center">
                        <center>  
                            <h4>Success - your order is confirmed!</h4>
                            <h5>Order number: #<?php echo $order_res->order_number; ?></h5>
                            <hr />  
                    </div>
                    </center>
                </div>
                
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                           
                            <div class="col-xs-6">
                                <address>
                                    <strong>Shipping Address&nbsp;:</strong><br>
                                    <?php echo $order_res->shipping_name; ?><br>
                                    <?php echo $order_res->shipping_email; ?><br>
                                    <?php echo $order_res->shipping_mobile; ?><br>
                                    <?php echo $order_res->shipping_address . ',' . $order_res->shipping_area; ?><br>
                                    LandMark:<?php echo $order_res->shipping_landmark; ?><br>
                                    <?php echo $order_res->shipping_city . ',' . $order_res->shipping_state; ?>,India-<?php echo $order_res->shipping_pincode; ?><br>
                                </address>

                            </div>
                            <div class="col-xs-6 text-right">
                                <h1><span class="glyphicon glyphicon glyphicon-cloud-download" aria-hidden="true"></span></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td><strong>Sr.No</strong></td>
                                                <td><strong>Product Name</strong></td>
                                                <td class="text-right"><strong>Product Image</strong></td>
                                                <td class="text-right"><strong>Product color</strong></td>
                                                <td class="text-right"><strong>Qty</strong></td>
                                                <td class="text-right"><strong>Price</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $srno=1;
                                        foreach($item_req->item_result as $item_res):
                                            ?>
                                             <tr>
                                                <td><?php echo $srno;?></td>
                                                <td><?php echo $item_res->item_name;?></td>
                                                <td class="text-right"><img src="<?php echo $item_res->product_image; ?>" width="20%"/></td>
                                                <td><?php echo $item_res->item_color;?></td>
                                                <td class="text-right">(<?php echo $item_res->item_qty.'x'.$item_res->item_price;?>)</td>
                                                <td class="text-right">Rs.<?php echo $item_res->sub_total;?>/-</td>
                                            </tr>
                                           
                                           
                                        <?php $srno++;endforeach;
?>                                           
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-right"><strong>Shipping</strong></td>
                                                <td class="no-line text-right">Free.</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-right"><strong>Total</strong></td>
                                                <td class="no-line text-right">Rs.<?php echo $order_res->price;?>/-</td>
                                            </tr>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Section ednm -->
      

    <!-- Footer -->
    <?php include "front_includes/footer.php"; ?>




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
    <script src="<?php echo FRONT_JS_PATH; ?>/main.js"></script>
   
</body>
</html>
