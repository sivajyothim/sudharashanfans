<!---Login,Signup,Forgot password pop up section code start -->
<!--model start here-->
<div id="login-signup-modal" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
    
     <!-- login modal content -->
        <div class="modal-content" id="login-modal-content">
        
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Login Now!</h4>
          </div>
        
          <div class="modal-body">
          <form action="" method="post" id="user_signin" name="user_signin">
          <input type="hidden" name="app" value="web"/>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="loginusername" id="login_username" type="text" class="form-control input-lg" placeholder="Enter Email / mobile" required data-parsley-type="email" >
                </div>    
                <span class="text-danger" id="login_username_error"></span>
                  
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="loginpassword" id="login_password" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                 </div>  
                 <span class="text-danger" id="login_password_error"></span>
                  <input type="hidden" name="cur_url" value="<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";; ?>">  
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="loginBtnSection btn btn-success btn-block btn-lg">LOGIN</button>
          </form>
          <div class="loginHideSection"></div>
        </div>
        
        <div class="modal-footer">
          <p>
          <a id="FPModal" href="javascript:void(0)">Forgot Password?</a> | 
          <a id="signupModal" href="javascript:void(0)">Register Here!</a>
          </p>
        </div>
        
       </div>
        <!-- login modal content -->
        
        <!-- signup modal content -->
        <div class="modal-content" id="signup-modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Signup Now!</h4>
        </div>
                
        <div class="modal-body">
        <form action="" method="post" id="user_singup" name="user_signup">
          <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                <input name="username" id="username" type="text" class="form-control input-lg" placeholder="Enter user name" required data-parsley-type="email">
                </div> 
                <span class="text-danger" id="username_error"></span>                    
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="useremail" id="useremail" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                </div>  
                <span class="text-danger" id="useremail_error"></span>
                   
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-iphone"></span></div>
                <input name="usermobile" id="usermobile" type="text" class="form-control input-lg" placeholder="Enter Mobile Number" required data-parsley-type="email">
                </div>   
                <span class="text-danger" id="usermobile_error"></span>
                  
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="userpassword" id="userpassword" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>  
                <span class="text-danger" id="userpassword_error"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                <input name="confirm_password" id="confirm_password" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>  
                <span class="text-danger" id="confirm_password_error"></span>
            </div>
            <button type="submit" class="submitBtnSection btn btn-success btn-block btn-lg">CREATE ACCOUNT!</button>
          </form>
          <div class="signupHideSection"></div>
        </div>
        <div class="modal-footer">
          <p>Already a Member ? <a id="loginModal" href="javascript:void(0)">Login Here!</a></p>
        </div>
       </div>
       <!-- signup modal content -->
        
       <!-- forgot password content -->
       <div class="modal-content" id="forgot-password-modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Recover Password!</h4>
        </div>
        
        <div class="modal-body">
          <form method="post" id="Forgot-Password-Form" role="form">
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                <input name="username" id="forget_username" type="text" class="form-control input-lg" placeholder="Enter Email/ mobile" required data-parsley-type="email">
                </div>   
                <span class="text-danger" id="forgot_error"></span>
            </div>         
            <button type="submit" class="forgotBtnSection btn btn-success btn-block btn-lg">
              <span class="glyphicon glyphicon-send"></span> SUBMIT
            </button>
            <div class="forgotHideSection"></div>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>Remember Password ? <a id="loginModal1" href="javascript:void(0)">Login Here!</a></p>
        </div>
        
       </div>        
       <!-- forgot password content -->
  
  </div>
</div>
<!--model end here-->
<!---Login,Signup,Forgot password pop up section code end -->
<script src="<?php echo FRONT_JS_PATH; ?>jquery.min.js"></script>
<script src="<?php echo FRONT_JS_PATH; ?>bootstrap.js"></script>	
<footer>
<div class="container">
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<h3>Quick Links</h3>
<ul>
<li><a href="#">Company Profile</a></li>
<li><a href="#">Vision & Mission</a></li>
<li><a href="#">Our Team</a></li>
</ul>
</div>	
	
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<h3>Catering Service </h3>
<ul>
<li><a href="#">Marriage </a></li>
<li><a href="#">Betrothal</a></li>
<li><a href="#">Birth Day Party</a></li>
<li><a href="#">Grahapravesam</a></li>
<li><a href="#">Seemandham</a></li>
</ul>
</div>	
	


<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

<div>
<i class="fa fa-mobile-phone"></i>
<div class="f-right">
<?php echo SITE_PHONE; ?>
</div>
<div class="clearfix"></div>
</div>
<div>
<i class="fa fa-envelope"></i> 
<div class="f-right">
<a href="#"><?php echo SITE_EMAIL; ?></a>
</div>
<div class="clearfix"></div>	
</div>
<div>
<i class="fa fa-home"></i>
<div class="f-right">
test, <br>
Hyderabad - 500072.
</div> 
<div class="clearfix"></div>
</div>
</div>	

<div class="col-lg-5 col-md-4 col-sm-6 col-xs-12">
<div class="footer-logo">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d487295.0253577635!2d78.12784127953509!3d17.412153061691694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb99daeaebd2c7%3A0xae93b78392bafbc2!2sHyderabad%2C+Telangana!5e0!3m2!1sen!2sin!4v1518146655476" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>	
</div>
</div>
	
</div>
</footer>
<script type="text/javascript">
function  addItemToCart(itemid)
{
    $.ajax({
            dataType: 'JSON',
            type: 'post',
            data:{'itemid':itemid},
            url: "<?php echo base_url(); ?>itemaddtocart",
            success: function (s) { console.log(s); alert(s.description);
                if(s.code == 200)
                {
                    var cart_count = $('#cart_count_val').val(); 
                    var cartUpdate = parseInt(cart_count +1);
                    $('#header_chekout_count').html(cartUpdate);
                }
            },
            error:function(e){console.log(e);}
    });
}


</script>	
<!--copyright start-->
<div class="copy-right">All Rights Reserved © 2018. <?php echo DESIGNED_BY  ; ?></div>
<!--copyright end-->
<script type="text/javascript">
$(document).ready(function(){
      $('#signupModal').click(function(){         
       $('#login-modal-content').fadeOut('fast', function(){
          $('#signup-modal-content').fadeIn('fast');
       });
      });
      $('#loginModal').click(function(){          
       $('#signup-modal-content').fadeOut('fast', function(){
          $('#login-modal-content').fadeIn('fast');
       });
      });
      $('#FPModal').click(function(){         
       $('#login-modal-content').fadeOut('fast', function(){
          $('#forgot-password-modal-content').fadeIn('fast');
          });
      });
      $('#loginModal1').click(function(){          
       $('#forgot-password-modal-content').fadeOut('fast', function(){
          $('#login-modal-content').fadeIn('fast');
       });
      });
  });
</script>
<!-- user sign up start here -->
<script src="<?php echo VENDOR_APP_PATH; ?>project.js"></script>

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
$('#user_singup').on('submit',function(e){
e.preventDefault();
str = true;
        $('#username_error,#useremail_error,#usermobile_error,#userpassword_error,#confirm_password_error').html('');
        var fullname = $('#username').val();
        var email = $('#useremail').val(); 
        var mobile = $('#usermobile').val();
        var password = $('#userpassword').val();
        var confirm_password = $('#confirm_password').val();
       
        if(fullname==''){str=false;$('#username_error').html('Please enter username');}
        if(email==''){str=false;$('#useremail_error').html('Please enter email');}
        if(mobile==''){str=false;$('#usermobile_error').html('Please enter mobile');}
        if(password==''){str=false;$('#userpassword_error').html('Please enter password');}
        if(confirm_password==''){str=false;$('#confirm_password_error').html('Please enter confirm password');}
        
        if(fullname!='' && (alphabets_check(fullname)==0)){str=false;$('#username_error').html('Numbers & special characters not accepted');}
        if(email!='' && (email_check(email)==0)){str=false;$('#useremail_error').html('Enter valid email');}
        if(mobile!='' && (mobile_check(mobile)==0)){str=false;$('#usermobile_error').html('Enter valid mobile number');}
        if(password!='' && (password_check(password)==0)){str=false;$('#userpassword_error').html('Enter valid password with minimum 6 characters');}
        if(password!='' && confirm_password!='' && password!=confirm_password){str=false;$('#confirm_password_error').html('confirm password should be same with password');}
        if (str == true)
        {
           
            $('.submitBtnSection').hide('');
            $('.signupHideSection').html("<img style='height:100px' src='<?php echo LOOADING_IMAGE; ?>'>");

            var formdetails = JSON.stringify($('#user_singup').serializeObject());
            $.ajax({
                dataType: 'JSON',
                type: 'post',
                data:formdetails,
                url: "<?php echo base_url(); ?>api/signup",
                success: function (s) {
                    // alert(s.description);
                    console.log(s);
                    if (s.code == 200)
                    {
                        $('.signupHideSection').html(s.description).css({'color': 'green'});
                        setTimeout(function () {
                            window.location = '';
                        }, 2000);
                    } else
                    {
                        $('.signupHideSection').html(s.description).css({'color': 'red'});
                        
                            
                            $('.submitBtnSection').show('');
                    }

                },
                error: function (er) {
                    console.log(er);
                }
            });
        }
return str;

});
$('#user_signin').on('submit',function(e){
e.preventDefault();
str = true;
        $('#login_username_error,#login_password_error').html('');
        var username = $('#login_username').val();
        var password = $('#login_password').val(); 
        if(username==''){str=false;$('#login_username_error').html('Please enter email / mobile');}
        if(password==''){str=false;$('#login_password_error').html('Please enter password');}
        if(password!='' && (password_check(password)==0)){str=false;$('#login_password_error').html('Enter valid password with minimum 6 characters');}
        
        if (str == true)
        {
           $('.loginBtnSection').hide('');
           $('.loginHideSection').html("<img style='height:100px' src='<?php echo LOOADING_IMAGE; ?>'>");
          var formdetails = JSON.stringify($('#user_signin').serializeObject());
            $.ajax({
                dataType: 'JSON',
                type: 'post',
                data:formdetails,
                url: "<?php echo base_url(); ?>api/login",
                success: function (s) {
                    //alert(s.description);
                    console.log(s);
                    if (s.code == 200)
                    {
                        $('.loginHideSection').html(s.description).css({'color': 'green'});
                        setTimeout(function () {
                            window.location = s.redirection_link;
                        }, 2000);
                    } else
                    {
                        $('.loginHideSection').html(s.description).css({'color': 'red'});
                        
                            $('.loginBtnSection').show('');
                    }

                },
                error: function (er) {
                    console.log(er);
                }
            });
        }
return str;
});
$('#Forgot-Password-Form').on('submit',function(e){
e.preventDefault();
str = true;
        $('#forgot_error').html('');
        var username = $('#forget_username').val();
        if(username==''){str=false;$('#forgot_error').html('Please enter email / mobile');}
        if (str == true)
        {
           $('.forgotBtnSection').hide('');
           $('.forgotHideSection').html("<img style='height:100px' src='<?php echo LOOADING_IMAGE; ?>'>");
          var formdetails = JSON.stringify($('#Forgot-Password-Form').serializeObject());
            $.ajax({
                dataType: 'JSON',
                type: 'post',
                data:formdetails,
                url: "<?php echo base_url(); ?>api/forgotpassword",
                success: function (s) {
                    //alert(s.description);
                    console.log(s);
                    if (s.code == 200)
                    {
                        $('.forgotHideSection').html(s.description).css({'color': 'green'});
                        setTimeout(function () {
                            window.location = s.redirection_link;
                        }, 2000);
                    } else
                    {
                        $('.forgotHideSection').html(s.description).css({'color': 'red'});
                        
                            $('.forgotBtnSection').show('');
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
<!-- user signup end here -->