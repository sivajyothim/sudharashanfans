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
    </head>
    <body>


        <div class="app" id="app">

            <!-- ############ LAYOUT START-->

            <!-- ############ Aside START-->
            <?php $this->load->view(ADMIN_SIDEBAR_PATH); ?>
            <!-- ############ Aside END-->

            <!-- ############ Content START-->
            <?php $this->load->view(ADMIN_HEADER_PATH); ?>


            <!-- ############ Main START-->


            <div>
                <div class="p-3 light lt box-shadow-0 d-flex">
                    <div class="flex">
                        <h1 class="text-md mb-1 _400">Welcome back, <?php echo $this->session->userdata(ADMIN_SESS_CODE . 'username'); ?>.</h1>
                        <!-- <small class="text-muted">Last logged in: 03:00 21, July</small> -->
                    </div>
                    <div>
                        <small class="text-muted d-block">Status</small>
                        <div class="mb-1 peity" data-plugin="peity" data-title="Status" data-option="
                             'bar',
                             {
                             height: 20,
                             width: 60,
                             fill: [app.color.primary]
                             }">56,32,21,16,25,23,42,24,6,10,44,27,34,52,54,59,61,68,78
                        </div>
                    </div>
                </div>
                <div class="padding">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="box list-item">
                                <span class="avatar w-40 text-center rounded primary">
                                    <span class="fa fa-dollar"></span>
                                </span>
                                <div class="list-body">
                                    <h4 class="m-0 text-md"><a href="#">0 <span class="text-sm">Projects</span></a></h4>
                                    <small class="text-muted">0 waiting payment.</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="box list-item">
                                <span class="avatar w-40 text-center rounded info theme">
                                    <span class="fa fa-female"></span>
                                </span>
                                <div class="list-body">
                                    <h4 class="m-0 text-md"><a href="#">0 <span class="text-sm">Orders</span></a></h4>
                                    <small class="text-muted">  </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="box list-item">
                                <span class="avatar w-40 text-center rounded success">
                                    <span class="fa fa-bookmark"></span>
                                </span>
                                <div class="list-body">
                                    <h4 class="m-0 text-md"><a href="#">0 Vendors </a></h4>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="box list-item">
                                <span class="avatar w-40 text-center rounded warning">
                                    <span class="fa fa-comment"></span>
                                </span>
                                <div class="list-body">
                                    <h4 class="m-0 text-md"><a href="#">0 <span class="text-sm">Comments</span></a></h4>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>








                </div>
            </div>


            <!-- ############ Main END-->

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
<!-- endbuild -->
</body>
</html>
