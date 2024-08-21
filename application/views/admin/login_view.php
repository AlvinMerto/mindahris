<?php $this->load->view('admin/includes/header_admin'); ?>

    <div class="container">



        <div class="row">

            <div style=" text-align: center; margin-top:120px;">

                 <img style="width:100px;"; src="<?php echo base_url(); ?>assets/images/minda_logo.png"/>
                 <h1 class="">MinDA Time Attendance Web</h1>
            </div>

            <div class="col-md-4 col-md-offset-4">
                <div style="margin-top:10% !important; "class="login-panel  panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" id="user_name" name="text" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="button" id="btnLogIn" class="btn btn-lg btn-success btn-block">Login</button>
                                 <p class="forgot-password"><a href="#" class="log_message">Forgot your password?</a></p> 
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">

var BASE_URL = '<?php echo base_url(); ?>';
    $(document).ready(function(){

            $(document).keypress(function(e) {
                if(e.which == 13) {
                
                    $('#btnLogIn').html('<i class="icon-spinner3 spin block-inner"></i> Signing in...');
                    var value = $('#password').val();
                    info = {};
                    info['username'] = $('#user_name').val();
                    info['password'] = CryptoJS.MD5(value).toString();
                    var result = postdata(BASE_URL + 'login/authorize',info); 

                    if(result){
                        var success = result[0].success;

                       if(success == 1){
                            $('.log_message').html('Redirecting...');
                            var employee_id = result[0].employee_id;
                            var success = postdata(BASE_URL + 'login/createsession',result);
                            if(success){
                               window.location.href =  BASE_URL + "dashboard"; 
                            }else{

                            }
                        }else{
                            $('.log_message').html('No username or password match! ');
                        }
                    }else{
                         $('.log_message').html('No username or password match! ');
                    }

                }
            });


         //Click login btn
        $('#btnLogIn').click(function(){
			
            $('.log_message').html('Logging in...');
            $('#btnLogIn').html('<i class="icon-spinner3 spin block-inner"></i> Signing in...');
            var value = $('#password').val();
            info = {};
            info['username'] = $('#user_name').val();
            info['password'] = CryptoJS.MD5(value).toString();
            var result = postdata(BASE_URL + 'login/authorize',info); 
			
            if(result.length != 0){
                var success = result[0].success;

               if(success == 1){
                    $('.log_message').html('Redirecting...');
                    var employee_id = result[0].employee_id;
                    var success = postdata(BASE_URL + 'login/createsession',result);
					
                    if(success){
                         window.location.href =  BASE_URL + "dashboard"; 
                    }else{
                       $('.log_message').html('No username or password match! '); 
                    }
                }else{
                    $('.log_message').html('No username or password match! ');
                }

            }else{

                 $('.log_message').html('<span style="color:red;">Invalid username & password</span>');
            }
               


        });
   
    });
        
</script>



<?php $this->load->view('admin/includes/footer_admin'); ?> 
