<!DOCTYPE html>
<html data-vide-bg="<?php // echo base_url(); ?>assets/videos/application of leave">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MinDATa | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_new/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_new/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_new/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div> <!-- start video background -->

<div class="login-box">
  <div class="login-logo">
      <a href="<?php echo base_url(); ?>"><img style="width:100px;"; src="<?php echo base_url(); ?>assets/images/minda_logo.png"/>  <b>MinDA</b><span style="font-size:20px;">Time & Attendance</span></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method='POST' action=''>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="user_name" name="text" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> &nbsp; Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <!--button id="btnLogIn" type="button"  class="btn btn-primary btn-block btn-flat">Sign In</button-->
		  <input type='submit' id='btnLogIn' class='btn btn-primary btn-block btn-flat' value='Sign In' name='loginbtn'/>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!--a href="#">I forgot my password</a><br-->
	<?php echo $err; ?> 
	<!--p class="log_message" style='margin: 0px;'> </p-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div> <!-- video -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets_new/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets_new/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets_new/plugins/iCheck/icheck.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/mindata.js"></script>
<script src="<?php echo base_url(); ?>assets/js/md5.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>


<!--script type="text/javascript">

var BASE_URL = '<?php // echo base_url(); ?>';
    $(document).ready(function(){

            $(document).keypress(function(e) {
                if(e.which == 13) {
                
                  $('#btnLogIn').html('<i class="fa fa-refresh fa-spin"></i>');
                  var value = $('#password').val();
                  if($('#user_name').val() != '' && $('#password').val() != ''){                   
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
                  }else{
                        $('.log_message').html('<span style="color:red;">No username or password</span>');
                        $('#btnLogIn').html('Sign In');         
                  }

                }
            });


         //Click login btn
        $('#btnLogIn').click(function(){
            $('.log_message').html('Logging in...');
            $('#btnLogIn').html('<i class="fa fa-refresh fa-spin"></i>');
            var value = $('#password').val();
            info = {};
            info['username'] = $('#user_name').val();
            info['password'] = CryptoJS.MD5(value).toString();

            if($('#user_name').val() != '' && $('#password').val() != ''){
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
            }else{
                 $('.log_message').html('<span style="color:red;">No username or password</span>');
                  $('#btnLogIn').html('Sign In');
            }
          
        });
   
    });
        
</script-->

<script src="<?php echo base_url(); ?>assets/js/v2js/jquery.vide.min.js"></script><!--video-js-->
</body>
</html>
