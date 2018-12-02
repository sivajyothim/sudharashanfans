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
        <link rel="shortcut icon" sizes="196x196" href="<?php echo ADMIN_FAV;?>">

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
                                        <div class="col-lg-6 text-center" style="padding:0rem">
                                        <!--Display message module section code start -->
                                        <div class="col-lg-6 pull-left">
                                        <div class="display_message_class"></div>
                                        </div>
                                <!--Display message module section code end -->
                                        <div class="col-lg-6 pull-right">
                                        <button onclick="activateData(1, 'slider');" type="button" class="btn btn-sm btn-success statusActivate">Active</button>
                                        <button onclick="deActivateData(0, 'slider');" type="button" class="btn btn-sm btn-danger statusDeActivate">In-active</button>
                                        </div>
                                            <div class="table-responsive" style="line-height:0.5">
                                                <table id="datatable" class="table v-middle p-0 m-0 box" data-plugin="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" class="multi_select" />S.No</th>
                                                            <th>Slider Image</th>
                                                            <th>Slider Link</th>
                                                            <th>Status</th>
                                                            <th>Created On</th>
                                                            <th>Action</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $data_req = json_decode($slider_details);
                                                        if ($data_req->code == SUCCESS_CODE):
                                                            $sno = 1;
                                                            foreach ($data_req->slider_result as $data_res):
                                                              //  print_r($data_res);
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $sno; ?>
                                                                    <input type="checkbox" name="multiple[]" value="<?php echo $data_res->slider_id; ?>"/>
                                                                    </td>
                                                                    <td><img src="<?php echo base_url(); ?>uploads/slider/<?php echo $data_res->slider_image; ?>" alt="" style="height:80px;width:200px;"></td>
                                                                    <td><?php echo strtoupper($data_res->slider_link); ?></td>
                                                                    <td><?php echo ($data_res->flag_status == 1) ? 'Active' : 'In-active'; ?></td>
                                                                    <td><?php echo date('d (D)-M-Y h:i A', strtotime($data_res->created_on)); ?></td>
                                                                    <td><a onclick="return confirm('confirm to delete slider ?')" href="<?php echo ADMIN_LINK; ?>Settings/deleteslider/<?php echo $data_res->slider_id; ?>"  class="btn btn-danger btn-sm"><i class="fa fa-trash">&nbsp;Delete</a></td>
                                                                </tr>
                                                                <?php
                                                                $sno++;
                                                            endforeach;
                                                        else:
                                                            ?>
                                                            <tr>
                                                                <td colspan="6">
                                                                    <div class="alert alert-danger text-center" >
                                                                        No results found..
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endif;
                                                        ?>  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">&nbsp;</div>
                                        <div class="col-lg-5 pull-right" style="padding:0rem">
                                            <form action="" method="post" name="slider_form" id="slider_form" enctype="multipart/form-data" >

                                                <div class="form-row col-lg-12">
                                                    <table class="table table-bordered" id="workorder_table">
                                                        <tr>
                                                            <th>Slider Image <sup style="color:red">*</sup></th>
                                                            <th>Slider Link</th>
                                                            <th>Description</th>
                                                        </tr>
                                                        <tr id="1">
                                                            
                                                            <td>
                                                                <input type="file" accept="image/*" class="form-control col-lg-12" id="slider" name="slider" />
                                                                <span style="color:red" id="slider_error"></span>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control col-lg-12" id="slider_link" name="slider_link"  placeholder="Slider Link" />
                                                            </td>
                                                            <td>
                                                                <textarea name="slider_desc" id="slider_desc" cols="2" rows="2" class="form-control"></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-lg-4 pull-right hideclass">
                                                    <a class="btn btn-danger" href="<?php echo $form_details['redirection_link']; ?>">Cancel</a>&nbsp;
                                                    <button type="submit" class="btn btn-success">Add</button>
                                                </div>
                                                <div class="disp_msg">

                                                </div>
                                                <div class="clearfix">&nbsp;</div>


                                            </form>
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
    
</script>
<script type="text/javascript">
  $('#slider_form').on('submit',function(e){
        e.preventDefault();
       $('#slider_error').html('');
        str=true;
        var image=$('#slider').val();
        if(image == ''){$('#slider_error').html('Please upload slider'); str=false;}
        if(str==true)
        {
            $('.hideclass').hide();
            $('.disp_msg').html('Please wait....').css({'color': 'blue'});
            $.ajax({
                            dataType: 'JSON',
                            type: 'POST',
                            data: new FormData(this),
                            processData:false,
                            cache:false,
                            contentType:false,
                            url: "<?php echo ADMIN_LINK; ?>Settings/uploadSlider",
                            success: function (s) {
                                console.log(s);
                                if (s.code == 200)
                                {
                                    $('.disp_msg').html(s.description).css({'color': 'green'});
                                    setTimeout(function () {
                                        window.location =location.href;
                                    }, 3000);
                                } else
                                {
                                    $('.disp_msg').html(s.description).css({'color': 'red'});
                                    $('.hideclass').show('');
                                }
                            },
                            error:function(er){console.log(er);}
                        });
        }
        return str;
});
</script>
</html>

