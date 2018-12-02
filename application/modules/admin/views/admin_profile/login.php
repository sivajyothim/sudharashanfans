<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo PROJECT_NAME;?> | Admin</title>
        <meta name="description" content="Responsive, Bootstrap, BS4" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- for ios 7 style, multi-resolution icon of 152x152 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
        <link rel="apple-touch-icon" href="<?php echo ADMIN_FAV;?>">
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
    </head>
    <body>


        <div class="d-flex flex-column flex">
            <div class="navbar light bg pos-rlt box-shadow">
                <div class="mx-auto">
                    <!-- brand -->
                    <a href="" class="navbar-brand">
                        
                        <img src="<?php echo ADMIN_LOGO;?>" alt="."/>
                        <span class="hidden-folded d-inline"><?php echo PROJECT_NAME; ?> - Super admin</span>
                    </a>
                    <!-- / brand -->
                </div>
            </div>
            <div id="content-body">
                <div class="py-5 text-center w-100">
                    <div class="mx-auto w-xxl w-auto-xs">
                        <div class="px-3">
                            <div>

                            <form class="login-form" action="" id="admin_login_form" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" placeholder="Email" name="username">
                                        <div class="text-danger pull-left" id="username_error"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="userpassword" placeholder="password" name="userpassword">
                                        <div class="text-danger pull-left" id="userpassword_error"></div>
                                     </div>
                                     <div class="clearfix"></div>
                                     <div class="submissionMessage pull-left"></div>
                                    <button type="submit" class="btn primary" id="signin_submit">Sign in</button>
                                </form>
                                <div class="my-4 hide">
                                    <a href="forgot-password.html" class="text-primary _600">Forgot password?</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ############ SWITHCHER START-->
            

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
    <script type="text/javascript">
   $('#admin_login_form').on('submit',function(e){
       e.preventDefault();
       str=true;
       $('#username_error,#userpassword_error').html('');
       var username=$('#username').val();
       var userpassword=$('#userpassword').val();
       if(username==''){$('#username_error').html('Please enter email/mobile');str=false;}
       if(userpassword==''){$('#userpassword_error').html('Please enter password');str=false;}
       if(userpassword!='' && (userpassword.length<6)){$('#userpassword_error').html('Enter password with min 6 characters');str=false;}
       if(username!='')
       {
           if(isNaN(username) && email_check(username)==0)
           {
                $('#username').focus();
                $('#username_error').html('Entered email is invalid');str=false;
           }
           if(!isNaN(username) && mobile_check(username)==0)
           {
                $('#username').focus();
                $('#username_error').html('Entered mobile is invalid');str=false;
           }
        }
        
        if(str==true)
        {
            var formdetails = JSON.stringify($('#admin_login_form').serializeObject());
            // alert(formdetails);
              $.ajax({
                        dataType:"JSON",
                        type:"POST",
                        data: formdetails,
                        url:"<?php echo ADMIN_LINK; ?>Welcome/adminLogin",
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(s){
                        console.log(s);
                        switch(s.code)
                        {
                          case 200:
                                    $('#signin_submit').hide();
                                    $('.submissionMessage').html(s.description).css({'color':'green','font-size':'15px'});
                                    window.location="<?php echo ADMIN_LINK; ?>";
                              break;
                          case 204:
                                $('.submissionMessage').html(s.description).css({'color':'red','font-size':'15px'});
                                $('#signin_submit').show();
                                    break;
                          case 575:
                          case 301:$('.submissionMessage').html(s.description).css({'color':'red','font-size':'15px'});
                                    $('#signin_submit').show();
                              break;
                        }
                },
                error:function(er){
                    console.log(er);
                }
            });
        }
        return str;
   });     
   </script>
</html>
