<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product Detail</title>
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
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH; ?>/mag.css">
        <link rel="stylesheet" href="<?php echo FRONT_CSS_PATH; ?>etalage.css">
        <script src="<?php echo FRONT_JS_PATH; ?>modernizr.js"></script> <!-- Modernizr -->
        <!--===============================================================================================-->
        <style>/*set a border on the images to prevent shifting*/
            #gallery_01 img{border:2px solid white;}

            /*Change the colour*/
            .active img{border:2px solid #333 !important;}
        #example3{float:left;}
        </style>
    </head>
    <body class="">
        <!-- Header -->
        <?php include "front_includes/header.php"; ?>
        <?php
        $data_req = json_decode($product_details);
        if ($data_req->code == SUCCESS_CODE):
            $data_res = $data_req->product_result;
        endif;
        ?>
        <!-- breadcrumb -->
        <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
            <a href="<?php echo base_url(); ?>" class="s-text16">
                Home
                <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
            </a>
            <?php $category = ($data_res->fan_type == 1) ? "ceiling fans" : "Table Fans"; ?>
            <a href="<?php echo FRONT_LINK . "products/" . url_title($category) . "/" . $data_res->fan_type; ?>" class="s-text16">
                <?php echo $category; ?>
                <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
            </a>



            <span class="s-text17">
                <?php echo $data_res->product_title; ?>
            </span>
        </div>

        <!-- Product Detail -->
        <div class="container bgwhite p-t-35 p-b-80">
            <div class="flex-w flex-sb">
                <div class="w-size13 p-t-30 respon5">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>

                        <ul id="example3" style="margin-right:30%">
                            <li>
                                <img class="etalage_thumb_image" src="<?php echo $data_res->display_pic; ?>" /><!--small image size 250px-->
                                <img class="etalage_source_image" src="<?php echo $data_res->display_pic; ?>" /><!--large image size:600px-->
                            </li>
                             <?php
                            $img_res = $data_req->product_sideimg_result;
                            if ($img_res->code == SUCCESS_CODE):
                                foreach ($img_res->side_images_result as $image_set):
                                    ?>
                            <li>
                                <img class="etalage_thumb_image" src="<?php echo $image_set->image_path ;?>" />
                                <img class="etalage_source_image" src="<?php echo $image_set->image_path ;?>" />
                            </li>
                            <?php endforeach;endif; ?>


                        </ul> 
                    </div>
                </div>

                <div class="w-size14 p-t-30 respon5">
                    <h4 class="product-detail-name m-text16 p-b-13">
                        <?php echo $data_res->product_title; ?>
                    </h4>

                    <span class="m-text17">
                        Rs.<?php echo $data_res->selling_price; ?>/-
                    </span>
                    <div style="margin-left: 30px;">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa fa-arrow-right" style="color:#ffcb05;"></i>&nbsp;<span class="s-text8">Remote Control:<?php echo ($data_res->remote_control == 1) ? 'Yes' : 'No'; ?></span><br/>
                                <i class="fa fa-arrow-right" style="color:#ffcb05;"></i>&nbsp;<span class="s-text8">wattage:<?php echo $data_res->wattage; ?></span><br/>
                                <!--<i class="fa fa-arrow-right" style="color:#ffcb05;"></i>&nbsp;<span class="s-text8">Air Delivery :<?php // echo $data_res->air_delivery;  ?></span><br/>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa fa-arrow-right" style="color:#ffcb05;"></i>&nbsp;<span class="s-text8">RPM:<?php echo $data_res->rpm; ?></span><br/>
                                <i class="fa fa-arrow-right" style="color:#ffcb05;"></i>&nbsp;<span class="s-text8">Sweep:<?php echo $data_res->sweep; ?></span><br/>
                                <i class="fa fa-arrow-right" style="color:#ffcb05;"></i>&nbsp;<span class="s-text8">warranty:<?php echo $data_res->warrenty; ?></span><br/>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="p-t-33 p-b-60">

                        <input type='hidden' name='default_color' id='default_color' value="<?php echo $data_res->default_color; ?>"/>
                        <div class="flex-m flex-w" style="display:none;">
                            <div class="s-text15 w-size15 t-center" style="width: 32%;">
                                Colors Available:
                            </div>
                            <input type='hidden' name='default_color' id='default_color' value="<?php echo $data_res->default_color; ?>"/>
                            <ul class="flex-w">
                                <?php
                                $color_class = '';
                                $color_name = '';
                                $str = $data_res->color;
                                $arr = explode(",", $str);
                                if (!empty($str) && is_array($arr)) {
                                    foreach ($arr as $key => $colorTitle):
                                        switch ($colorTitle) {
                                            case 'MATTE BROWN':
                                                $color_name = 'MATTE BROWN';
                                                $color_class = '1';
                                                break;
                                            case 'SLIVER BLUE':
                                                $color_class = '2';
                                                $color_name = 'SLIVER BLUE';
                                                break;
                                            case 'IVORY':
                                                $color_class = '3';
                                                $color_name = 'IVORY';
                                                break;
                                            case 'METALLIC BURGANDY SHINE':
                                                $color_class = '4';
                                                $color_name = 'METALLIC BURGANDY SHINE';
                                                break;
                                            case 'METALLIC BLUE':
                                                $color_class = '5';
                                                $color_name = 'METALLIC BLUE';
                                                break;
                                            case 'black':
                                                $color_class = '6';
                                                $color_name = 'black';
                                                break;
                                            case 'black':
                                                $color_class = '7';
                                                $color_name = 'black';
                                                break;
                                            case 'black':
                                                $color_class = '8';
                                                $color_name = 'black';
                                                break;
                                        }
                                        ?>
        <?php if ($color_name != '') { ?>
                                            <li class="m-r-10">

                                                <input data-toggle="tooltip" data-title="<?php echo $color_name; ?>" class="checkbox-color-filter" id="color-filter2" type="radio" name="color" value="<?php echo $colorTitle; ?>" onclick="selectColor('<?php echo $colorTitle; ?>')">
                                                <label class="color-filter color-border color-filter<?php echo $color_class; ?>" for="color-filter2" style="background-color:<?php echo $color_name; ?>;"></label>
                                            </li> <?php } ?>                                 <?php endforeach;
}
?>





                            </ul>

                        </div>

                        <div class="flex-r-m flex-w p-t-10">
                            <div class="w-size16 flex-m flex-w">
                                <!--                                <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                
                                                                    <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">
                                
                                                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>-->

<?php
$addtocartID = base64_encode(CS_SECURITY . $data_res->product_id);
?>
                                <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                    <!-- Button -->
                                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="addItemToCart('<?php echo $addtocartID; ?>', '<?php echo $data_res->default_color; ?>', '<?php echo $colorTitle; ?>')">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-b-45">
                        <span class="s-text8 m-r-35">SKU:<?php echo strtoupper($data_res->product_code); ?></span>
                        <span class="s-text8">Categories:Fans</span>
                    </div>

                    <!--  -->
                    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 ">
                        <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4 show-dropdown-content">
                            Features
                            <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                            <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                        </h5>

                        <div class="dropdown-content dis-none p-t-15 p-b-23" style="display: block;">
                            <p class="s-text8">
                                <i class="fa fa-dot-circle-o" style="color:#ffcb05;"> </i>  3 Year On-site warranty
                            </p>
                            <p class="s-text8">
                                <i class="fa fa-dot-circle-o" style="color:#ffcb05;"> </i>  80% Power Saving  
                            </p>
                            <p class="s-text8">
                                <i class="fa fa-dot-circle-o" style="color:#ffcb05;"> </i>  Runs with MER Technology.
                            </p>
                            <p class="s-text8">
                                <i class="fa fa-dot-circle-o" style="color:#ffcb05;"> </i>  No humming noise
                            </p>
                            <p class="s-text8">
                                <i class="fa fa-dot-circle-o" style="color:#ffcb05;"> </i>  Consistent performance even at low voltage and power
                            </p>
                            <p class="s-text8">
                                <i class="fa fa-dot-circle-o" style="color:#ffcb05;"> </i>  Runs smoothly at wide voltage range of 90-300V
                            </p>
                            <?php if($data_res->description!=''):?>
                            
                            
                            <p class="s-text8">
                                <i class="fa fa-dot-circle-o" style="color:#ffcb05;"> </i> <?php echo $data_res->description; ?>
                            </p>
                            <?php endif;?>
                        </div>
                    </div>
                    <p style="font-weight:bold;">Note:When in Smart Mode the remote wont operate until smart mode has been turned off.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_default_1" data-toggle="tab">
                                Technical Information </a>
                        </li>
                        <li>
                            <a href="#tab_default_3" data-toggle="tab">
                                Reviews </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                            <p>
                                Technical Information
                            </p>

                            <table class="table">

                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>MODEL</td>
                                        <td><?php echo ucfirst($data_res->product_title); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Remote Control</td>
                                        <td><?php echo ($data_res->remote_control == 1) ? 'Yes' : 'No'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>wattage</td>
                                        <td><?php echo $data_res->wattage; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Air Delivery</td>
                                        <td><?php echo $data_res->air_delivery; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>RPM</td>
                                        <td><?php echo $data_res->rpm; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Sweep</td>
                                        <td><?php echo $data_res->sweep; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Service value</td>
                                        <td><?php echo $data_res->service_value; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>winding</td>
                                        <td><?php echo $data_res->winding; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Phase</td>
                                        <td><?php echo $data_res->phase; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>Frequency</td>
                                        <td><?php echo $data_res->frequency; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td>No Of Blades</td>
                                        <td><?php echo $data_res->no_of_blades; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td>body type</td>
                                        <td><?php echo $data_res->body_type; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td>Rating</td>
                                        <td><?php echo $data_res->seller_rating; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td>Bearings</td>
                                        <td><?php echo $data_res->bearings; ?></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">15</th>
                                        <td>warranty</td>
                                        <td><?php echo $data_res->warrenty; ?></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                        <div class="tab-pane" id="tab_default_3">
                            <p>
                                Reviews
                            </p>
                            <p>
                                NO Reviews Yet
                            </p>
                            <p>
                                <a class="btn btn-info" href="#" target="_blank">
                                    Be The first Review
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Relate Product -->
        <section class="relateproduct bgwhite p-t-45 p-b-138">
            <div class="container">
                <div class="sec-title p-b-60">
                    <h3 class="m-text5 t-center">
                        Related Products
                    </h3>
                </div>

                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">

                        <!--listing start -->
<?php
$data_req = json_decode($related_products);
if ($data_req->code == SUCCESS_CODE):
    foreach ($data_req->product_result as $data_res):
        $colorTitle = '';
        $catName = $data_res->catName;
        ?>
                                <div class="item-slick2 p-l-15 p-r-15">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                            <img src="<?php echo $data_res->image_path; ?>" alt="IMG-PRODUCT">

                                            <div class="block2-overlay trans-0-4">
                                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                                </a>

                                                <div class="block2-btn-addcart w-size1 trans-0-4">
        <?php
        $addtocartID = base64_encode(CS_SECURITY . $data_res->product_id);
        ?>
                                                    <!-- Button -->
                                                    <button onclick="addItemToCart('<?php echo $addtocartID; ?>', '<?php echo $data_res->default_color; ?>', '<?php echo $colorTitle; ?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                        Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="block2-txt p-t-20">
                                            <a href="<?php echo FRONT_LINK . "products/" . $catName . "/" . url_title($data_res->title) . "/" . $data_res->product_id; ?>" class="block2-name dis-block s-text3 p-b-5">
        <?php echo $data_res->title; ?>
                                            </a>

                                            <span class="block2-price m-text6 p-r-5">
                                                Rs.<?php echo $data_res->selling_price; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
        <?php
    endforeach;
endif;
?>
                        <!--listing end -->













                    </div>
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
        <script type="text/javascript" src="<?php echo FRONT_JS_PATH; ?>jquery.elevatezoom.js"></script>
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/slick/slick.min.js"></script>
        <script type="text/javascript" src="<?php echo FRONT_JS_PATH; ?>/slick-custom.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/sweetalert/sweetalert.min.js"></script>


        <!--===============================================================================================-->
        <script src="<?php echo FRONT_JS_PATH; ?>main.js"></script>
        <!--zoomer-->
        <script src="<?php echo FRONT_JS_PATH; ?>jquery.etalage.min.js"></script>
        <script>
                                                jQuery(document).ready(function ($) {
                                                    $('#example3').etalage({
                                                        thumb_image_width: 450,
                                                        thumb_image_height: 550,
                                                        source_image_width: 900,
                                                        source_image_height: 1000,
                                                        zoom_area_width: 400,
                                                        zoom_area_height:400,
                                                        zoom_area_distance:5,
                                                        small_thumbs: 4,
                                                        smallthumb_inactive_opacity: 0.3,
                                                        smallthumbs_position: 'left',
                                                        show_icon: true,
                                                        autoplay: true,
                                                        keyboard: true,
                                                        zoom_easing: false
                                                    });

                                                    // This is for the dropdown list example:
                                                    $('.dropdownlist').change(function () {
                                                        etalage_show($(this).find('option:selected').attr('class'));
                                                    });
                                                });
        </script> 
        <script type="text/javascript">

            function selectColor(colortitle)
            {
                $('#default_color').val(colortitle);
            }

            function addItemToCart(itemid, dcolor, available_color)
            {
                var userselection_color = $('#default_color').val();
                $.ajax({
                    dataType: 'JSON',
                    type: 'post',
                    data: {'itemid': itemid, 'default_color': dcolor, 'selected_color': userselection_color},
                    url: "<?php echo base_url(); ?>itemaddtocart",
                    success: function (s) 
                    {
                        console.log(s);
                                window.location.reload();
                        
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
        </script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
