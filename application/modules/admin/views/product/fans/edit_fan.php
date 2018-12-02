<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo PROJECT_NAME; ?>-<?php echo $main_title; ?></title>
        <meta name="description" content="Responsive, Bootstrap, BS4" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- for ios 7 style, multi-resolution icon of 152x152 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
        <link rel="apple-touch-icon" href="<?php echo ADMIN_IMAGES_PATH; ?>logo.svg">
        <meta name="apple-mobile-web-app-title" content="Flatkit">
        <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="shortcut icon" sizes="196x196" href="<?php echo ADMIN_FAV; ?>">

        <!-- style -->

        <link rel="stylesheet" href="<?php echo LIBS_PATH; ?>font-awesome/css/font-awesome.min.css" type="text/css" />

  <!-- build:css <?php echo ADMIN_CSS_PATH; ?>app.min.css -->
        <link rel="stylesheet" href="<?php echo LIBS_PATH; ?>bootstrap/dist/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>app.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo ADMIN_CSS_PATH; ?>style.css" type="text/css" />
        <!-- endbuild -->
        <style type="text/css">
            .err{color:red;}
        </style>
    </head>
    <body>

        <div class="app" id="app">

            <!-- ############ LAYOUT START-->

            <!-- ############ Aside START-->
            <?php (ADMIN_SIDEBAR_ENABLE == 1) ? $this->load->view(ADMIN_SIDEBAR_PATH) : ''; ?>
            <!-- ############ Aside END-->

            <!-- ############ Content START-->
            <?php $this->load->view(ADMIN_HEADER_PATH); ?>


            <!-- ############ Main START-->


            <div class="content-wrapper">
                <section class="content-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo $main_title; ?></h3>
                                </div>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-12 text-center" style="padding:0rem">
                                         <!--Display message module section code start -->
                                         <div class="col-lg-6 pull-left">
                                        <div class="display_message_class"></div>
                                        </div>
                                <!--Display message module section code end -->
                                           
                                       

                                        <div class="col-lg-8" >
                                            <h6></h6> 
                                            <?php
                                            $product_req = json_decode($product_details);
                                            if($product_req->code == 200){
                                                $pro_res = $product_req->product_result;
                                            ?>
                                            <form action="" method="post" name="update_product_form" id="update_product_form" enctype="multipart/form-data">
                                                <input type="hidden" name="productid" id="productid" value="<?php echo $pro_res->product_id; ?>">
                                                <div class='row'>
                                                    <div class='col-md-3'>
                                                        <select class='form-control-sm' name="fan_type" id="fan_type">
                                                            <option value="">-- select fan type--</option>
                                                            <?php
                                                            $data_req = json_decode($fantype_details);
                                                            if ($data_req->code == SUCCESS_CODE):
                                                                $sno = 1;
                                                                foreach ($data_req->fantype_result as $data_res):
                                                                    ?>
                                                                    <option <?php echo ($pro_res->fan_type==$data_res->fantype_id)?'selected':''; ?> value="<?php echo $data_res->fantype_id; ?>"><?php echo $data_res->fantype_title; ?></option>
                                                                    <?php
                                                                    $sno++;
                                                                endforeach;
                                                            endif;
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='title' class='form-control-sm' name="product_title" id="product_title" value="<?php echo $pro_res->product_title; ?>"/>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <select name="remote_check" class="form-control-sm">
                                                            <option value="">--Remote control--</option>
                                                            <option <?php echo ($pro_res->remote_control==1)?'selected':''; ?> value="1">YES</option>
                                                            <option <?php echo ($pro_res->remote_control==2)?'selected':''; ?> value="2">NO</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class='clearfix'>&nbsp;</div>
                                                <div class='row'>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='MRP' class='form-control-sm' name="mrp" id="mrp" value="<?php echo $pro_res->mrp_price; ?>"/>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='selling price' class='form-control-sm' name="selling_price" id="selling_price" value="<?php echo $pro_res->selling_price; ?>"/>
                                                    </div> 
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='Discount' class='form-control-sm' name="discount" id="discount" value="<?php echo $pro_res->discount; ?>"/>
                                                    </div>

                                                </div>
                                                <div class='clearfix'>&nbsp;</div>
                                                <h6>Technical Specifications</h6>
                                                <div class='row'>
                                                <div class='col-md-3'>
                                                        <select name="default_color" class="form-control-sm">
                                                            <option value="">--select color--</option>
                                                            <?php
                                                            $clor_req = json_decode($colors_list);
                                                            if ($clor_req->code == SUCCESS_CODE):
                                                                $sno = 1;
                                                                foreach ($clor_req->color_result as $color_res):
                                                                    ?>
                                                                    <option <?php echo ($pro_res->default_color==$color_res->color_title)?'selected':''; ?> value="<?php echo $color_res->color_title; ?>"><?php echo $color_res->color_title; ?></option>
                                                                    <?php
                                                                    $sno++;
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <select name="color" class="form-control-sm" multiple>
                                                            <option value="">--select available colors--</option>
                                                            <?php
                                                            $clor_req = json_decode($colors_list);
                                                            if ($clor_req->code == SUCCESS_CODE):
                                                                $sno = 1;
                                                                foreach ($clor_req->color_result as $color_res):
                                                                    ?>
                                                                    <option  <?php  echo in_array($color_res->color_title,explode(',',$pro_res->color))?'selected':''; ?> value="<?php echo $color_res->color_title; ?>"><?php echo $color_res->color_title; ?></option>
                                                                    <?php
                                                                    $sno++;
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <br/>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='wattage' class='form-control-sm' name="wattage" id="wattage" value="<?php echo $pro_res->wattage; ?>"/>
                                                    </div>

                                                </div>
                                                <div class='clearfix'>&nbsp;</div>
                                                <div class='row'>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='air delivery' class='form-control-sm' name="air_delivery" id="air_delivery" value="<?php echo $pro_res->air_delivery; ?>"/>
                                                    </div> 
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='rpm' class='form-control-sm' name="rpm" id="rpm" value="<?php echo $pro_res->rpm; ?>"/>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='sweep' class='form-control-sm' name="sweep" id="sweep" value="<?php echo $pro_res->sweep; ?>"/>
                                                    </div>

                                                </div>
                                                <div class='clearfix'>&nbsp;</div>
                                                <div class='row'>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='service value' class='form-control-sm' name="service_value" id="service_value" value="<?php echo $pro_res->service_value; ?>"/>
                                                    </div> 
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='phase' class='form-control-sm' name="phase" id="phase" value="<?php echo $pro_res->phase; ?>"/>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='frequency' class='form-control-sm' name="frequency" id="frequency" value="<?php echo $pro_res->frequency; ?>"/>
                                                    </div>
                                                </div>
                                                <div class='clearfix'>&nbsp;</div>
                                                <div class='row'>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='no_of_blades' class='form-control-sm' name="no_of_blades" id="no_of_blades" value="<?php echo $pro_res->no_of_blades; ?>"/>
                                                    </div> 
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='body_type' class='form-control-sm' name="body_type" id="body_type" value="<?php echo $pro_res->body_type; ?>"/>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='seller_rating' class='form-control-sm' name="seller_rating" id="seller_rating" value="<?php echo $pro_res->seller_rating; ?>"/>
                                                    </div>
                                                </div>
                                                <div class='clearfix'>&nbsp;</div>
                                                <div class='row'>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='bearings' class='form-control-sm' name="bearings" id="bearings" value="<?php echo $pro_res->bearings; ?>"/>
                                                    </div> 
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='warrenty' class='form-control-sm' name="warrenty" id="warrenty" value="<?php echo $pro_res->warrenty; ?>"/>
                                                    </div>
                                                    <div class='col-md-3'>
                                                        <input type='text' placeholder='winding' class='form-control-sm' name="winding" id="winding" value="<?php echo $pro_res->winding; ?>"/>
                                                    </div>
                                                </div>
                                                <div class='clearfix'>&nbsp;</div>
                                                <div class='row'>
                                                    <div class='col-md-9'>
                                                        <h6>Description Part will go here:</h6>
                                                        <textarea class="form-control" name="description" id="description"><?php echo $pro_res->description; ?></textarea>
                                                    </div> 
                                                    <div class="col-md-3">
                                                        <input type="hidden" name="app" vlaue="web"/>
                                                    </div>
                                                </div>

                                                <div class='clearfix'>&nbsp;</div>
                                                <div class='row'>
                                                    <div class='col-md-6 hideclass'>
                                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                                        <a href="<?php echo ADMIN_LINK; ?>Product/allfans" class="btn btn-danger">Cancel</a>
                                                    </div> 
                                                    <div class="disp_msg"></div>
                                                </div>
                                            </form>
                                                        <?php }  else { ?>
                                                        <div class="alert alert-danger text-center">
                                                        Product details not found..!
                                                        </div>
                                                        <?php } ?>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        
        <!-- Footer -->
        <?php $this->load->view(ADMIN_FOOTER_PATH); ?>
    </div>
    <!-- ############ Content END-->

    <!-- ############ LAYOUT END-->
</div>

<!-- ############ SWITHCHER START-->
<?php $this->load->view(ADMIN_SIDESWITCH_PATH); ?>
<!-- ############ SWITHCHER END-->

<!-- build:js <?php echo ADMIN_SCRIPTS_PATH; ?>app.min.js -->
<!-- jQuery -->
<script src="<?php echo LIBS_PATH; ?>jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo LIBS_PATH; ?>popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo LIBS_PATH; ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- core -->
<script src="<?php echo LIBS_PATH; ?>pace-progress/pace.min.js"></script>
<script src="<?php echo LIBS_PATH; ?>pjax/pjax.js"></script>

<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>lazyload.config.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>lazyload.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>plugin.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>nav.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>scrollto.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>toggleclass.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>theme.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>ajax.js"></script>
<script src="<?php echo ADMIN_SCRIPTS_PATH; ?>app.js"></script>
<script src="<?php echo ADMIN_PROJECT_PATH; ?>project.js"></script>

<!-- endbuild -->
</body>
<script>
</script>


<script type="text/javascript">
    function openImageForm(productid)
    {
        $('#openPopupImage').modal('show');
        var title = $('#title_' + productid).html();
        var imgpath = $('#image_' + productid).val();
        $('#pic_product_id').val(productid);
        $('#pic_dispsection').attr('src', imgpath);
        $('#pic_product_title').html(title);
        /*for side pics*/
        $('#product_id').val(productid);
         $('#image_section').html('');
        $.ajax({
            dataType: "JSON",
            type: "POST",
            url: "<?php echo ADMIN_LINK; ?>Product/sideimages/" + productid,
            contentType: false,
            cache: false,
            processData: false,
            success: function (s) {
                console.log(s);
                switch (s.code)
                {
                    case 200:
                        var html;
                        var data = s.side_images_result;
                        var len = s.side_images_result.length;
                        for (var i = 0, len = s.side_images_result.length; i < len; ++i) {
                            html += '<img src="' + data[i]['image_path'] + '" width="30%"/>';
                        }
                        $('#image_section').html(html);
                        break;
                    case 204:
                    $('#image_section').html(s.description).css({
                            'color': 'red', 'font-size':
                                    '15px'});
                    case 575:
                    case 301:
                    case 422:
                        $('#image_section').html(s.description).css({
                            'color': 'red', 'font-size':
                                    '15px'});
                        $('.hideclass').show();
//                            setTimeout(function () {
//                                $('.disp_msg').html('');
//                            }, 3000);
                        break;
                }
            },
            error: function (er) {
                console.log(er);
            }
        });
    }

    $('#update_product_form').on('submit', function (e) {
        e.preventDefault();
        str = true;
        if (str == true)
        {
            $('.hideclass').hide();
           $('.disp_msg').html('Please wait....').css({'color': 'blue'});
            var formdetails = JSON.stringify($('#update_product_form').serializeObject());
            $.ajax({
                dataType: "JSON",
                type: "POST",
                data: formdetails,
                url: "<?php echo ADMIN_LINK; ?>Product/updateFan",
                contentType: false,
                cache: false,
                processData: false,
                success: function (s) {
                    console.log(s);
                    switch (s.code)
                    {
                        case 200:
                            $('.hideclass').hide();
                            $('.disp_msg').html(s.description).css({'color': 'green', 'font-size':
                                        '15px'});
                            setTimeout(function () {
                                window.location = "<?php echo ADMIN_LINK.'Product/allfans'; ?>";
                            }, 2000);

                            break;
                        case 204:
                        case 575:
                        case 301:
                        case 422:
                            $('.disp_msg').html(s.description).css({
                                'color': 'red', 'font-size':
                                        '15px'});
                            $('.hideclass').show();
//                            setTimeout(function () {
//                                $('.disp_msg').html('');
//                            }, 3000);
                            break;
                    }
                },
                error: function (er) {
                    console.log(er);
                }
            });
        }
        return str;
    });
    $("#uploadImage").on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            dataType: "JSON",
            type: "POST",
            data: new FormData(this),
            url: "<?php echo ADMIN_LINK; ?>Product/uploadProductImage",
            contentType: false,
            cache: false,
            processData: false,
            success: function (s) {
                console.log(s);
                if (s.code == 200) {
                    alert(s.description);
                    setTimeout(function () {
                        window.location = location.href;
                    }, 2000);
                } else {
                    alert(s.description);
                }
            },
            error: function (er) {
                console.log(er)
            }

        });
    });
    $("#uploadSideImage").on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            dataType: "JSON",
            type: "POST",
            data: new FormData(this),
            url: "<?php echo ADMIN_LINK; ?>Product/uploadProductsideImage",
            contentType: false,
            cache: false,
            processData: false,
            success: function (s) {
                console.log(s);
                if (s.code == 200) {
                    alert(s.description);
                    setTimeout(function () {
                        window.location = location.href;
                    }, 2000);
                } else {
                    alert(s.description);
                }
            },
            error: function (er) {
                console.log(er)
            }

        });
    });
</script>
</html>

