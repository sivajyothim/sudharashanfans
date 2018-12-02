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
                               
                                <div class="clearfix">&nbsp;</div>
                                <div class="box-body">
                                    <div class="row">

                                         <!--Display message module section code start -->
                                         <div class="col-lg-6 pull-left">
                                        <div class="display_message_class"></div>
                                        </div>
                                <!--Display message module section code end -->
                                <div class="col-lg-12 pull-left">
                                <?php 
                                if($order_type!='complete'){
                                ?>
                                        <button onclick="activateData(1, 'order');" type="button" class="btn btn-sm btn-success statusActivate">Deliver</button>
                                <?php } ?>
                                        </div>                                       
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
                                                        <th><input type="checkbox" class="multi_select" />S.No</th>
                                                            <th>Order ID</th>
                                                            <th>Price</th>
                                                            <th>Order Qty</th>
                                                            <th>User Details</th>
                                                            <th>Deliver Location</th>
                                                            <th>City</th>
                                                            <th>Payment Mode</th>
                                                            <th>Order Status</th>
                                                            <th>Created On</th>
                                                            <th>Expected Deliver Date</th>
                                                            <!-- <th>Delivered Date</th> -->

                                                        </tr>
                                                        <?php $order_res= json_decode($order_details);
                                                        if($order_res->code==SUCCESS_CODE){
                                                            foreach ($order_res->order_list as $data_res):?>
                                                                
                                                        <tr>
                                                        <td>
                                                        <?php if($data_res->order_status==0){ ?>
                                                        <input type="checkbox" name="multiple[]" value="<?php echo $data_res->order_id; ?>"/>
                                                        <?php } ?>
                                                        </td>
                                                            <td><a href="<?php echo base_url().'view-order/'.$data_res->order_id;?>"><?php echo $data_res->order_number;?></a></td>
                                                            <td>Rs.<?php echo $data_res->price;?>/-</td>
                                                            <td><?php echo $data_res->item_qty;?></td>
                                                            <td><?php echo $data_res->shipping_name.'<br/><br/>'.$data_res->shipping_mobile.'<br/><br/>'.$data_res->shipping_email;?></td>
                                                            <td>Address : <?php echo $data_res->shipping_address;?><br/><br/>
                                                                <?php echo $data_res->shipping_landmark;?><br/><br/>
                                                                <?php echo $data_res->shipping_area;?><br/><br/>
                                                                
                                                                
                                                                <?php echo $data_res->shipping_pincode;?>
                                                            </td>
                                                            <td>City&nbsp;:&nbsp;<?php echo $data_res->shipping_city;?><br/><br/>State&nbsp;:&nbsp;<?php echo $data_res->shipping_state;?></td>
                                                            <td><?php echo $data_res->payment_mode;?></td>
                                                            <td style="color:<?php echo $data_res->order_status==0?'orange':'green';?>"><?php echo $data_res->order_status==0?'Order Placed':'Delivered';?></td>
                                                            <td><?php echo $data_res->created_on;?></td>
                                                            <td><?php echo $data_res->deliver_date;?></td>
                                                            
                                                            <!-- <td><?php echo ($data_res->order_status==1)?date('d-M-Y H:i:s',strtotime($data_res->order_delivered_date)):'--';?></td> -->
                                                        </tr>  
                                                                <?php
                                                                
                                                            endforeach;
                                                        
                                                        ?>
                                                        
                                                    </thead>
                                                        <?php }else{?>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="11">
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


</html>

