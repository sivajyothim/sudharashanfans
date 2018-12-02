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
                                <div class="" style="margin-right:3%;display:none" >
                                    <a class="btn btn-success btn-sm  pull-right" href="javascript:void(0);" onclick="updateStatus(1)">Active</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn btn-warning btn-sm pull-right" href="javascript:void(0);" onclick="updateStatus(0)">In-Active</a>
                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="box-body">
                                    <div class="row">

                                        <!--success message code start-->

                                        <!--success message code end-->                                             
                                        <div class="col-lg-12 col-md-12 text-center">
                                            <div class="table-responsive" style="line-height:0.5">
                                                <table id="datatable" class="table v-middle p-0 m-0 box" data-plugin="dataTable">
                                                    <tr class="trMsgSection">
                                                        <td colspan='8'>
                                                            <div class="alert alert-success" id="success" style="display:none;"><strong>Success : </strong><span id="successmessage"></span> </div>
                                                            <div class="alert alert-danger" id="fail" style="display:none;"> <strong>Error : </strong><span id="failmessage"></span></div>
                                                        </td>
                                                    </tr>
                                                    <thead>
                                                        <tr>
                                                            <th>Product code</th>
                                                            <th>product name</th>
                                                            <th>Image</th>
                                                            <th>price</th>
                                                            <th>color</th>
                                                            <th>qty</th>
                                                            <th>sub_total</th>
                                                            <th>View Details</th>
                                                        </tr>
                                                        <?php $order_res= json_decode($order_item_details);
                                                        if($order_res->code==SUCCESS_CODE){
                                                            foreach ($order_res->order_result as $data_res):
                                                                $qr_path=base_url().'uploads/orders/suborders_qrcodes/'.$data_res->suborder_id.'.png';
                                                                ?>
                                                        <tr>
                                                            <td><a href="<?php echo $data_res->product_id;?>"><?php echo $data_res->product_code;?></a></td>
                                                             <td><?php echo $data_res->item_name;?></td>
                                                             <td><img src="<?php echo $data_res->product_image;?>" width="12%"/></td>
                                                            <td>Rs.<?php echo $data_res->item_price;?>/-</td>
                                                            <td><?php echo $data_res->item_color;?></td>
                                                            <td><?php echo $data_res->item_qty;?></td>
                                                            <td><?php echo $data_res->sub_total;?></td>
                                                            <td><a download href="<?php echo $qr_path; ?>"><img src="<?php echo $qr_path; ?>" style="height:80px;width:80px;"/></a></td>
                                                            

                                                        </tr>  
                                                                <?php
                                                                
                                                            endforeach;
                                                        
                                                        ?>
                                                        
                                                    </thead>
                                                        <?php }else{?>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="10">
                                                                <div class="alert alert-warning">No bookings found..!</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                        <?php }?>
                                                </table>
                                            </div>
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
    /***Check Or Uncheck the Check box List Code Start*/
    $('#multiAction').click(function () {
        if ($('#multiAction').is(':checked')) {
            $('#multiAction').prop('checked', true);
            $('[name="multiple[]"]').prop('checked', true);
        } else {
            $('#multiAction').prop('checked', false);
            $('[name="multiple[]"]').prop('checked', false);
        }
    });
    /***Check Or Uncheck the Check box List Code End*/
</script>

<script type="text/javascript">
    function updateStatus(s)
    {
        $('#failmessage,#successmessage').text('');
        $('#fail').hide();
        var listarray = new Array();
        $('input[name="multiple[]"]:checked').each(function () {
            listarray.push($(this).val());
        });
        var checklist = "" + listarray;
        if (!isNaN(s) && (s == '1' || s == '0') && checklist != '')
        {
            $('#fail').hide();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                data: {'tablename': 'vendors', 'upldatelist': checklist, 'activity': s},
                url: "<?php echo ADMIN_LINK; ?>Welcome/changeStatus",
                success: function (u)
                {
                    console.log(u);
                    $('.trMsgSection').show();
                    if (u.code == '200') {
                        $('#success').show();
                        $('#successmessage').html(u.description);
                        setTimeout(function () {
                            window.location = location.href;
                        }, 3000);
                    }
                    else {
                        $('#fail').show();
                        $('#failmessage').html(u.description);
                    }
                }

            });
        }
        else
        {
            $('.trMsgSection').show();
            $('#fail').show();
            $('#failmessage').html('*  Please Select ');
            $('#fail').fadeOut("slow");
        }
    }
</script>
</html>

