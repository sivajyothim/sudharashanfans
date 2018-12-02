<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo PROJECT_NAME; ?></title>
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
        <link rel="shortcut icon" sizes="196x196" href="<?php echo ADMIN_IMAGES_PATH; ?>logo.svg">

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
                                    <h3 class="box-title">Manage Designations</h3>
<!--                                    <a  href="<?php echo ADMIN_LINK; ?>Settings/addunit" class="btn btn-sm btn-primary pull-right">Create</a>-->
                                </div>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-6 text-center" style="padding:0rem">
                                            <div class="table-responsive" style="line-height:0.5">
                                                <table id="datatable" class="table v-middle p-0 m-0 box" data-plugin="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Designation</th>
                                                            <th>Desingation Code</th>
                                                            <th>Status</th>
                                                            <th>Created On</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $data_req = json_decode($designation_details);
                                                        if ($data_req->code == SUCCESS_CODE):
                                                            $sno = 1;
                                                            foreach ($data_req->designation_result as $data_res):
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $sno; ?></td>
                                                                    <td><?php echo $data_res->designation; ?></td>
                                                                    <td><?php echo $data_res->designation_code; ?></td>
                                                                    <td><?php echo ($data_res->flag_status == 1) ? 'Active' : 'In-active'; ?></td>
                                                                    <td><?php echo date('d-M-Y', strtotime($data_res->created_on)); ?></td>
                                                                </tr>
                                                                <?php
                                                                $sno++;
                                                            endforeach;
                                                        else:
                                                            ?>
                                                            <tr>
                                                                <td colspan="5">
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
                                            <form action="" method="post" name="create_designation_form" id="create_designation_form" enctype="multipart/form-data" >

                                                <div class="form-row col-lg-12">
                                                    <table class="table table-bordered" id="workorder_table">
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Designation</th>
                                                            <th>Designation Code</th>
                                                            <th><button type="button" class="btn-sm btn-success"  onclick="addMore();"><i class="fa fa-plus"></i></button></th>
                                                        </tr>
                                                        <tr id="1">
                                                            <td>
                                                                <input type="hidden" name="table_sno[]" id="table_sno1" value="1"/>1
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control col-lg-12 cls_tower" id="designation1" name="designation[]" placeholder="Designation" maxlength="30"  autocomplete="off"/>
                                                            </td>
                                                            <td colspan="2">
                                                                <input type="text" class="form-control col-lg-12 cls_priority" id="designation_code1" name="designation_code[]" placeholder="Designation Code" maxlength="10"  autocomplete="off"/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-lg-4 pull-right hideclass">
                                                    <a class="btn btn-danger" href="<?php echo ADMIN_LINK; ?>Settings/designations">Cancel</a>&nbsp;
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
    function addMore()
    {
        var trData = '';
        var dispstr = true;
        var mainsno = $('#workorder_table tr:last').attr('id');
        var trData = '';
        mainsno = parseInt(mainsno);
        var sno = (mainsno > 0) ? (mainsno + 1) : 1;

        if (dispstr == true)
        {

            trData += '<tr id="' + sno + '">';
            trData += '<td>';
            trData += '<input type="hidden" name="table_sno[]" id="table_sno' + sno + '"  value="' + sno + '"/>'+sno+'';
            trData += '</td>';
            trData += '<td>';
            trData += '<input type="text" class="form-control col-lg-12 cls_tower" id="designation' + sno + '"  name="designation[]" placeholder="Desingation" maxlength="30"  autocomplete="off"/>';
            trData += '</td>';
            trData += '<td colspan="2">';
            trData += '<input type="text" class="form-control col-lg-12 cls_priority" id="designation_code' + sno + '"  name="designation_code[]" placeholder="Designation Code" maxlength="10"  autocomplete="off"/>';
            trData += '</td>';
        }
        $('#workorder_table > tbody:last-child').append(trData);
    }
</script>
<script type="text/javascript">
    $('#create_designation_form').on('submit', function (e) {
        e.preventDefault();
        str = true;
        /*$('#client_error,#project_error').html('');
        var client = $('#client').val();
        var project = $('#project').val();
        
        if (client == 0 || client == '') {
            $('#client_error').html('Please choose client');
            str = false;
        }
        if (project == 0 || project == '') {
            $('#project_error').html('Please choose project');
            str = false;
        }
      */
        
        if (str == true)
        {

            $('.hideclass').hide();
            $('.disp_msg').html('Please wait....').css({'color': 'blue'});
            $.ajax({
                dataType: "JSON",
                type: "POST",
                data: new FormData(this),
                url: "<?php echo ADMIN_LINK; ?>Settings/insertdesignation",
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
                                window.location = "<?php echo ADMIN_LINK . 'Settings/designations'; ?>";
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
                            setTimeout(function(){$('.disp_msg').html('');},3000);
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
</script>
</html>
