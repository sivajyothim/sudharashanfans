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
        <style>.error{color:red;}</style>
    </head>
    <body class="">

        <!-- Header -->
        <?php include "front_includes/header.php"; ?>

        <!-- Title Page -->
         <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo FRONT_IMAGES_PATH; ?>/heading-pages-02.jpg);">
            <h2 class="l-text2 t-center" style="margin-top: -75px;
                margin-left: -850px;color:black;">
                Checkout
            </h2>
            
        </section>
<?php
                                $dat_req = json_decode($cartList);
                                if ($dat_req->code == SUCCESS_CODE) {?>
        <!-- Cart -->
        <section class="cart bgwhite p-t-70 p-b-100">
            <div class="container">
                <form  role="form" action="" method="post" id="payment-form">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shipping Details</h4>
                            <div class="clearfix">&nbsp;</div>
                            <table class="table table-striped" style="font-weight: bold;">

                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Full name:</label></td>
                                    <td>
                                        <input class="form-control" id="shipping_name" name="shipping_name"
                                               autocomplete="off" maxlength="60" type="text" placeholder="Full name"/>
                                        <span class="error" id="shipping_name_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Email:</label></td>
                                    <td>
                                        <input class="form-control" id="shipping_email" name="shipping_email"
                                               autocomplete="off" maxlength="60" type="text" placeholder="Email"/>
                                        <span class="error" id="shipping_email_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Mobile:</label></td>
                                    <td>
                                        <input class="form-control" id="shipping_mobile" name="shipping_mobile"
                                               autocomplete="off" maxlength="10" type="text" placeholder="Mobile number"/>
                                        <span class="error" id="shipping_mobile_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_address_line_1">Address:</label></td>
                                    <td>
                                        <textarea class="form-control" id="shipping_address"
                                                  name="shipping_address" placeholder="Address" maxlength="200"></textarea>
                                        <span class="error" id="shipping_address_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Land mark:</label></td>
                                    <td>
                                        <input class="form-control" id="shipping_landmark" name="shipping_landmark"
                                               autocomplete="off" maxlength="60" type="text" placeholder="Land mark"/>
                                        <span class="error" id="shipping_landmark_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Area:</label></td>
                                    <td>
                                        <input class="form-control" id="shipping_area" name="shipping_area"
                                               autocomplete="off" maxlength="60" type="text" placeholder="Area"/>
                                        <span class="error" id="shipping_area_error"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">City:</label></td>
                                    <td>
                                        <input class="form-control" id="shipping_city" name="shipping_city"
                                               autocomplete="off" maxlength="60" type="text" placeholder="City"/>
                                        <span class="error" id="shipping_city_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name" >State:</label></td>
                                    <td>
                                        <?php
                                $state_req = json_decode($stateList);
                                if ($state_req->code == SUCCESS_CODE) {?>
                                        <select class="form-control" id="shipping_state" name="shipping_state">
                                            <option value="">--select state--</option>
                                            <?php foreach ($state_req->state_result as $state_res):?>
                                            <option value="<?php echo $state_res->title;?>"><?php echo $state_res->title;?></option>
                                                <?php
                                                
                                            endforeach;
                                }?>
                                            
                                            
                                        </select>
                                        <span class="error" id="shipping_state_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Pincode:</label></td>
                                    <td>
                                        <input class="form-control" id="shipping_pincode" name="shipping_pincode"
                                               autocomplete="off" maxlength="6" type="text" placeholder="Pincode"/>
                                        <span class="error" id="shipping_pincode_error"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 175px;">
                                        <label for="id_first_name">Payment Mode:</label></td>
                                    <td>
                                        <input type="radio" name="payment_mode" value="cod"  checked/>COD &nbsp;
                                        <input type="radio" name="payment_mode" value="online" />ONLINE
                                        <span class="error" id="payment_mode_error"></span>
                                    </td>
                                </tr>
                                

                            </table>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <h4>Order Details</h4>
                            <div class="clearfix">&nbsp;</div>

                            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38  m-r-0 m-l-auto p-lr-15-sm">
                                <h5 class="m-text20 p-b-24">
                                    <span>Product</span><span class="pull-right"> Total</span>
                                </h5>

                                
                                    <?php
                                    foreach ($dat_req->cart_result as $cart_res):
                                        ?>
                                        <!--  -->
                                        <input type="hidden" value="<?php echo $cart_res->cart_id; ?>" name="cartid"/>
                                        <input type="hidden" value="<?php echo $cart_res->item_qty; ?>" name="qty"/>
                                        <div class="flex-w flex-sb-m p-b-12 row">
                                            <span class="s-text18 col-md-6">
                                                <?php echo $cart_res->item_name; ?>(<?php echo $cart_res->item_qty; ?> x Rs.<?php echo $cart_res->item_price; ?>/-)
                                            </span>

                                            <span class="m-text21  w-full-sm pull-right">
                                                Rs.<?php echo $cart_res->sub_total; ?>.00/
                                            </span>
                                        </div>


                                        <!--  -->
                                        <?php
                                    endforeach;
                                
                                ?>

                                <div class="" style="border-bottom: 1px dashed #d9d9d9;">



                                </div>

                                <!--  -->
                                <?php
                                        $cartstat = json_decode($cartStatistics);
                                        
                                        ?>
                                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                                    <span class="m-text22 w-size19 w-full-sm">
                                        Total:<?php
                                        
                                        echo $cartstat->order_item_count;?> Items
                                    </span>

                                    <span class="m-text21 pull-right w-full-sm">
                                        Rs.<?php
                                        
                                        echo $cartstat->order_total;
                                        ?>.00/
                                    </span>
                                </div>
                                <div style="text-align: left;font-size: 10px;"><br/>
                                    By submiting this order you are agreeing to our <a href="<?php echo base_url(); ?>terms-condition" style="font-size: 10px;">Terms & conditions</a>.
                                    If you have any questions about our products or services please contact us
                                    before placing this order. Phone  040-48549979
                                </div>
                            </div>
                            <div class="checkoutHideSesction"></div>
                            <div class="size15 trans-0-4" style="margin-top: 10px;">
                               
                                <!-- Button -->
                                <div id="payment_msg"></div>
                                <button id="proceed_to_pay_btn" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="button" onclick="makePayment()" >
                                    Proceed to Payment
                                </button>
                                
                            </div>
                            <div style="margin-top:30px;display:none;" id="openVerificationStatus">
                                <p>please enter your OTP bellow</p>
                                <div style="border: 1px solid #dcd7d7;border-radius: 4px;padding: 2px;margin: 13px;">
                                 <input type="text" class="form-control"  name="otp_code" id="otp_code" value="" placeholder="Enter verification code" maxlength="6"/> 
                                
                                </div>
                                <span id="otp_code_error"></span>
                                <button type="button" id="otp_btn" onclick="verifyOrderOtp()" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="padding:10px;">verify otp</button>
                            </div>
                            
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
                                <?php } else{
                                ?><div class="alert alert-danger">
                    <div class="">No items in cart to proceed checkout.</div>
                </div>
                    <?php
                }
                ?>

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
    <script>
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
        function removeCartItem(cartid)
        {
            if (confirm('Confirm to delete item ??') == true)
            {
                $.ajax({
                    dataType: 'JSON',
                    type: 'post',
                    data: {'cartid': cartid},
                    url: "<?php echo base_url(); ?>deletecartitem",
                    success: function (s) {
                        console.log(s);
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
        }
        $('#payment-form').on('submit', function (e) {
            e.preventDefault();
            var str = true;
            var proceedstatus=checkValidations();
            var str =proceedstatus;
            if (str == true)
            {
                var formdetails = JSON.stringify($('#payment-form').serializeObject());
                $('.checkoutSubmitSection').hide('');
                $('.checkoutHideSesction').html("Please wait placing order...");

                $.ajax({
                    dataType: 'JSON',
                    method: 'post',
                    data: formdetails,
                    processData: false,
                    cache: false,
                    encType: false,
                    url: "<?php echo base_url(); ?>home/cart/insertOrder",
                    success: function (s) {
                        console.log(s)
                        if (s.code == 200)
                        {
                            var orderid=s.orderId;
                            setTimeout(function () {
                                window.location = "<?php echo base_url().'order-success/' ?>"+orderid;
                            }, 2000);
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

        function makePayment()
        {
            var str=true;
            var payment_mode = $('#payment_mode').val();
            var pincode = $('#shipping_pincode').val();
            var mobile = $('#shipping_mobile').val();
            var email = $('#shipping_email').val();

            var proceedstatus=checkValidations();
            $('#payment_msg,#otp_code_error').html('');
            if(proceedstatus ==true)
            {
//                $('#proceed_to_pay_btn').attr("disabled", "disabled");
//              $('#payment_msg').html('Please wait..').css({'color':'blue'});
                
                $.ajax({
                    dataType: 'JSON',
                    method: 'post',
                    data: {'pincode':pincode,'email':email,'payment':payment_mode,'mobile':mobile},
                    url:"<?php echo base_url(); ?>orderverificatoin",
                    success:function(s){console.log(s);
                    alert(s.description);
                    if(s.code == 200)
                    {
                        $('#payment_msg').html('');
                        $('#openVerificationStatus').show();
                    }
                    else
                    {
                        $('#payment_msg').html('');
                        $('#proceed_to_pay_btn').show();
                    }
                    
                    },
                    error:function(e){console.log(e);},
                });
            }
            return str;
        }

        function verifyOrderOtp()
        {
            var str=true;
            $('#otp_code_error').html('');
            var otp = $('#otp_code').val();
            if(otp=='')
            {
                $('#otp_code_error').html('Please enter OTP').css({'color':'red'});str=false;
            }
            if(str == true)
            {
//                $('#otp_btn').hide();
                $('#otp_code_error').html('Please Wait..').css({'color':'blue'});
                $('#payment_msg').html('');
                $.ajax({
                    dataType: 'JSON',
                    method: 'post',
                    data: {'otpcode':otp},
                    url:"<?php echo base_url(); ?>verifyorderverification",
                    success:function(s){console.log(s);
                    //alert(s.code);
                        if(s.code == 200)
                        {   
                            $('#otp_btn').hide();
                            $('#payment-form').submit();
                        }
                        else if(s.code == 204)
                        {
                            $('#otp_code_error').html(s.description).css({'color':'red'});
                            setTimeout(function () {
                            $('#openVerificationStatus').hide();
                            },4000);
                            $('#proceed_to_pay_btn').show();
                        }
                        else if(s.code == 300)
                        {
                            $('#proceed_to_pay_btn').show();
                            $('#otp_code_error').html(s.description).css({'color':'red'});
                        }
                    },
                    error:function(e){console.log(e);},
                });
            }
            return str;
        }
        var namepattern = /^[a-zA-Z_., ]+$/;
            var emailpattern = /^[a-zA-Z0-9][a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var passwordpattern=/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
            var mobilepattern = /^[6-9]+[0-9]{9}$/;
            var pincodepatteren = /^[1-9][0-9]{5}$/;
        function checkValidations()
        {
            var str=true;
            $('#shipping_name_error,#shipping_email_error,#shipping_mobile_error,#shipping_address_error,#shipping_landmark_error,#shipping_area_error,#shipping_city_error,#shipping_pincode_error').text('');
	        $('#shipping_name,#shipping_email,#shipping_mobile,#shipping_address,#shipping_landmark,#shipping_area,#shipping_city,#shipping_state,#shipping_pincode').css('border','');
            
            var username=$('#shipping_name').val();
            var useremail=$('#shipping_email').val();
            var checkemail=email_check(useremail);
            var address=$('#shipping_address').val();
            var usermessage=$('#usermessage').val();
            var usermobile=$('#shipping_mobile').val();
            var checkmobile=mobile_check(usermobile);
            var pincode=$('#shipping_pincode').val();
            var checkpincode=pincode_check(pincode);

            var address = $('#shipping_address').val();
            var landmark = $('#shipping_landmark').val();
            var shipping_area = $('#shipping_area').val();
            var city = $('#shipping_city').val();
            var state = $('#shipping_state').val();
            
            if(username==''){$('#shipping_name_error').text('Please Enter Name');str=false;}
            if(username!='' && !namepattern.test(username)){$('#shipping_name_error').text('Please Enter Valid Name');str=false;}
            if(checkemail==false){$('#shipping_email_error').text('Please Enter  Email');str=false;}
            if(checkmobile==false){$('#shipping_mobile_error').text('Please Enter 10 digit Valid Mobile Number');
             str=false;}
             if(checkpincode==false){$('#shipping_pincode_error').text('Please enter 6 digit pincode');str=false;}
             if(address==''){$('#shipping_address_error').text('Please Enter Address');str=false;}
             if(landmark==''){$('#shipping_landmark_error').text('Please Enter Landmark');str=false;}
             if(shipping_area==''){$('#shipping_area_error').text('Please Enter Area');str=false;}
             if(city==''){$('#shipping_city_error').text('Please Enter City');str=false;}
             if(state=='' || state=='0'){$('#shipping_state_error').text('Please Choose State');str=false;}
             return str;
        }

            function email_check(inputdata) { if(inputdata==''){return false;} if(inputdata!='' && !emailpattern.test(inputdata)) { return false; }  }
            function mobile_check(inputdata) { if(inputdata==''){return false;} if(inputdata!='' && !mobilepattern.test(inputdata)) { return false; }  }
            function pincode_check(inputdata) { if(inputdata==''){return false;} if(inputdata!='' && !pincodepatteren.test(inputdata)) { return false; }  }
            function empty_check(inputdata){ if(inputdata==''){return false;}  }
    </script>
</body>
</html>
