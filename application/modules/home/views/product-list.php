<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product</title>
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
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_VENDOR_PATH; ?>/noui/nouislider.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH; ?>/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo FRONT_CSS_PATH; ?>/main.css">
        <!--===============================================================================================-->
    </head>
    <body class="">

        <!-- Header -->
        <?php include "front_includes/header.php"; ?>

        <!-- Title Page -->
        <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo FRONT_IMAGES_PATH; ?>/heading-pages-02.jpg);">
            <h2 class="l-text2 t-center" style="margin-top: -75px;
                margin-left: -850px;color:black;">
                Switch To Smart
            </h2>
            <p class="m-text13 t-center" style="margin-left: -850px;color:black;">
                New Arrivals Fans Collection 2018
            </p>
        </section>


        <!-- Content page -->
        <section class="bgwhite p-t-55 p-b-65">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                        <div class="leftbar p-r-20 p-r-0-sm">
                            <!--  -->
                            <h4 class="m-text14 p-b-7">
                                Categories
                            </h4>
                            <ul class="p-b-54">
                              <li class="p-t-4"><a href="<?php echo FRONT_LINK . "products/";?>">All</a></li>

                                <?php
                                $menu_req = json_decode($product_menu_details);
                                if ($menu_req->code == SUCCESS_CODE):
                                    foreach ($menu_req->fantype_result as $menu_res):
                                        ?>
                                        <li class="p-t-4"><a href="<?php echo FRONT_LINK . "products/" . url_title($menu_res->fantype_title) . "/" . $menu_res->fantype_id; ?>"><?php echo ucfirst($menu_res->fantype_title) ?></a></li>
                                        <?php
                                    endforeach;
                                endif;
                                ?>

                            </ul>
                           

                            <!--  -->
                            <h4 class="m-text14 p-b-32">

                            </h4>
                            <div class="filter-price p-t-22 p-b-50 bo3">
                                <img src="<?php echo FRONT_IMAGES_PATH; ?>add.jpg" width="260" height="680"/>
                            </div>
                            <div class="filter-price p-t-22 p-b-50 bo3" style="display:none">
                                <div class="m-text15 p-b-17">
                                    Price
                                </div>

                                <div class="wra-filter-bar">
                                    <div id="filter-bar"></div>
                                </div>

                                <div class="flex-sb-m flex-w p-t-16">
                                    <div class="w-size11">
                                        <!-- Button -->
                                        <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                            Filter
                                        </button>
                                    </div>

                                    <div class="s-text3 p-t-10 p-b-10">
                                        Range: Rs.<span id="value-lower">610</span> - Rs.<span id="value-upper">980</span>
                                    </div>
                                </div>
                            </div>

                            <div class="filter-color p-t-22 p-b-50 bo3" style="display:none">
                                <div class="m-text15 p-b-12">
                                    Color
                                </div>

                                <ul class="flex-w">
                                    <li class="m-r-10">
                                        <input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
                                        <label class="color-filter color-filter1" for="color-filter1"></label>
                                    </li>

                                    <li class="m-r-10">
                                        <input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
                                        <label class="color-filter color-filter2" for="color-filter2"></label>
                                    </li>

                                    <li class="m-r-10">
                                        <input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
                                        <label class="color-filter color-filter3" for="color-filter3"></label>
                                    </li>

                                    <li class="m-r-10">
                                        <input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
                                        <label class="color-filter color-filter4" for="color-filter4"></label>
                                    </li>

                                    <li class="m-r-10">
                                        <input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
                                        <label class="color-filter color-filter5" for="color-filter5"></label>
                                    </li>

                                    <li class="m-r-10">
                                        <input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
                                        <label class="color-filter color-filter6" for="color-filter6"></label>
                                    </li>

                                    <li class="m-r-10">
                                        <input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
                                        <label class="color-filter color-filter7" for="color-filter7"></label>
                                    </li>
                                </ul>
                            </div>

                            <div class="search-product pos-relative bo4 of-hidden" style="display:none">
                                <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                                <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                    <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                        <!--  -->
                        <div class="flex-sb-m flex-w p-b-35">
                            <div class="flex-w">
                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10" style="display:none">
                                    <select class="selection-2" name="sorting">
                                        <option>Default Sorting</option>
                                        <option>Popularity</option>
                                        <option>Price: low to high</option>
                                        <option>Price: high to low</option>
                                    </select>
                                </div>

                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10" style="display:none">
                                    <select class="selection-2" name="sorting">
                                        <option>Price</option>
                                        <option>Rs.0.00 - Rs.50.00</option>
                                        <option>Rs.50.00 - Rs.100.00</option>
                                        <option>Rs.100.00 - Rs.150.00</option>
                                        <option>Rs.150.00 - Rs.200.00</option>
                                        <option>Rs.200.00+</option>

                                    </select>
                                </div>
                            </div>


                        </div>

                        <!-- Product -->
                        <div class="row">
                            <?php
                            $data_req = json_decode($product_list);
                            if ($data_req->code == SUCCESS_CODE){
                                foreach ($data_req->product_result as $data_res):
                                    $colorTitle = '';
                                    ?>
                                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div href="" class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                                <a href="<?php echo FRONT_LINK . "products/" . $catName . "/" . url_title($data_res->title) . "/" . $data_res->product_id; ?>"><img src="<?php echo $data_res->image_path; ?>" alt="IMG-PRODUCT"></a>

<!--                                                <div class="block2-overlay trans-0-4">
                                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                                    </a>

                                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                                        <?php
                                                        $addtocartID = base64_encode(CS_SECURITY . $data_res->product_id);
                                                        ?>
                                                         Button 
                                                        <button onclick="addItemToCart('<?php echo $addtocartID; ?>', '<?php echo $data_res->default_color; ?>', '<?php echo $colorTitle; ?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>-->
                                            </div>

                                            <div class="block2-txt p-t-20">
                                                <a href="<?php echo FRONT_LINK . "products/" . $catName . "/" . url_title($data_res->title) . "/" . $data_res->product_id; ?>" class="block2-name dis-block s-text3 p-b-5">
                                                    <?php echo $data_res->title; ?>
                                                </a>
                                                

                                                <span class="block2-price m-text6 p-r-5">
                                                    Rs.<?php echo $data_res->selling_price; ?>
                                                </span>
                                                <button onclick="addItemToCart('<?php echo $addtocartID; ?>', '<?php echo $data_res->default_color; ?>', '<?php echo $colorTitle; ?>')" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                            Add to Cart
                                                        </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                } 
                                else{
                                    ?>
                            <div class="alert alert-danger">No Products available in this section , products coming soon....</div>
                                        <?php
                                }
                          
                            
                            ?>

                        </div>

                        <!-- Pagination -->
                        <div class="pagination flex-m flex-w p-t-26 " style="display:none;">
                            <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                            <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                        </div>
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
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/slick/slick.min.js"></script>
        <script type="text/javascript" src="<?php echo FRONT_JS_PATH; ?>/slick-custom.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/sweetalert/sweetalert.min.js"></script>
<!--	<script type="text/javascript">
                $('.block2-btn-addcart').each(function(){
                        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                        $(this).on('click', function(){
                                swal(nameProduct, "is added to cart !", "success");
                        });
                });

                $('.block2-btn-addwishlist').each(function(){
                        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                        $(this).on('click', function(){
                                swal(nameProduct, "is added to wishlist !", "success");
                        });
                });
        </script>-->

        <!--===============================================================================================-->
        <script type="text/javascript" src="<?php echo FRONT_VENDOR_PATH; ?>/noui/nouislider.min.js"></script>
        <script type="text/javascript">
                                                    /*[ No ui ]
                                                     ===========================================================*/
                                                    var filterBar = document.getElementById('filter-bar');

                                                    noUiSlider.create(filterBar, {
                                                        start: [50, 200],
                                                        connect: true,
                                                        range: {
                                                            'min': 50,
                                                            'max': 200
                                                        }
                                                    });

                                                    var skipValues = [
                                                        document.getElementById('value-lower'),
                                                        document.getElementById('value-upper')
                                                    ];

                                                    filterBar.noUiSlider.on('update', function (values, handle) {
                                                        skipValues[handle].innerHTML = Math.round(values[handle]);
                                                    });
        </script>
        <!--===============================================================================================-->
        <script src="<?php echo FRONT_JS_PATH; ?>/main.js"></script>

    </body>
</html>
