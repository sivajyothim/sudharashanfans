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
        <?php include "front_includes/header.php"; ?>

        <!-- Title Page -->
        <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo FRONT_IMAGES_PATH; ?>/heading-pages-02.jpg);">
            <h2 class="l-text2 t-center" style="margin-top: -75px;
                margin-left: -850px;color:black;">
                Cart
            </h2>
            
        </section>

        <!-- Cart -->
        <section class="cart bgwhite p-t-70 p-b-100">
            <div class="container">
                <!-- Cart item -->
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <form action="" method="post" id="cart_form_update">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Product</th>
                                <th class="column-2">Color</th>
                                <th class="column-3">Price</th>
                                <th class="column-4 p-l-70">Quantity</th>
                                <th class="column-5">Total</th>
                                <th class="column-6">Option</th>
                            </tr>
                            <?php
                            $dat_req = json_decode($cartList);
                            if ($dat_req->code == SUCCESS_CODE){
                                foreach ($dat_req->cart_result as $cart_res):
                                    ?>
                             <input type="hidden" value="<?php echo $cart_res->cart_id; ?>" name="cartid"/>
                                        
                                    <tr class="table-row">
                                        <td class="column-1">
                                            <div class="">
                                                <img src="<?php echo $cart_res->image_path;?>" alt="IMG-PRODUCT" width="90">
                                            </div>
                                        </td>
                                        <td class="column-2"><?php echo fetch_ucfirst($cart_res->item_name);?></td>
                                        <td class="column-2"><?php echo fetch_ucfirst($cart_res->item_color);?>    </td>
                                        <td class="column-3">Rs.<?php echo fetch_ucfirst($cart_res->item_price);?>/-</td>
                                        <td class="column-4">
                                            <div class="flex-w bo5 of-hidden w-size17">
                                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                                </button>

                                                <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $cart_res->item_qty;?>">

                                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="column-5">Rs.<?php echo $cart_res->sub_total;?>/-</td>
                                        <td class="column-5"> <a class="btn btn-warning btn-sm pull-right"
                                                                   href="javascript:void(0)"
                                                                   onclick="removeCartItem(<?php echo $cart_res->cart_id; ?>)"
                                                                   title="Remove Item">X</a></td>
                                    </tr>                                                                     <?php
                                endforeach;
                            
                            ?>



                        </table>
                        
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
<!--                        <div class="size11 bo4 m-r-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
                        </div>-->

<!--                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                             Button 
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Apply coupon
                            </button>
                        </div>-->
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Update Cart
                        </button>
                    </div>
                </div>
</form>
                <!-- Total -->
                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                    <h5 class="m-text20 p-b-24">
                        Cart Totals
                    </h5>

                    <!--  -->
                    <div class="flex-w flex-sb-m p-b-12">
                        <span class="s-text18 w-size19 w-full-sm">
                            Subtotal:
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                            Rs.<?php $cartstat= json_decode($cartStatistics);
                           echo $cartstat->order_total;?>.00/
                        </span>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <span class="s-text18 w-size19 w-full-sm">
                            Shipping:
                        </span>

                        <div class="w-size20 w-full-sm">
                            <p class="s-text8 p-b-23">
                                Congratulations!Free shipping
                            </p>



                            <div class="size14 trans-0-4 m-b-10">
                                <!-- Button -->
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Update Totals
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            Total:
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                             Rs.<?php 
                           echo $cartstat->order_total;?>.00/
                        </span>
                    </div>

                    <div class="size15 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="location.href='<?php echo base_url().'checkout';?>'">
                            Proceed to Checkout
                            </button>
                        </div>
                    </div>
                    <?php
                }else {
                    ?>
                <div class="alert alert-danger">
                    <div class="">No items in cart to show.</div>
                </div>
                    <?php
                }
                ?>
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
            
             $.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
        </script>
        <!--===============================================================================================-->
        <script src="<?php echo FRONT_JS_PATH; ?>/main.js"></script>
        <script>
            function removeCartItem(cartid)
    {
        if(confirm('Confirm to delete item ??') == true)
        {
                $.ajax({
                        dataType: 'JSON',
                        type: 'post',
                        data:{'cartid':cartid},
                        url: "<?php echo base_url(); ?>deletecartitem",
                        success: function (s) {
                            console.log(s);
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                        },
                        error:function(e){console.log(e);}
                });
        }
    }
    
    
    $('#cart_form_update').on('submit', function (e) {
            e.preventDefault();
            var str = true;
            if (str == true)
            {
                var formdetails = JSON.stringify($('#cart_form_update').serializeObject());
               // $('.checkoutSubmitSection').hide('');
                //$('.checkoutHideSesction').html("<img style='height:100px' src='<?php echo LOOADING_IMAGE; ?>'>");

                $.ajax({
                    dataType: 'JSON',
                    method: 'post',
                    data: formdetails,
                    processData: false,
                    cache: false,
                    encType: false,
                    url: "<?php echo base_url(); ?>home/cart/cartUpdate",
                    success: function (s) {
                        console.log(s)
                        if (s.code == 200)
                        {
                            $('.checkoutHideSesction').html(s.description).css({'color': 'green'});
                            setTimeout(function () {
                                window.location = location.href;
                            }, 1000);
                        } else
                        {
                            $('.checkoutHideSesction').html(s.description).css({'color': 'red'});
                            $('.checkoutSubmitSection').show('');
                        }
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
            return str;

        });
        </script>
    </body>
</html>
