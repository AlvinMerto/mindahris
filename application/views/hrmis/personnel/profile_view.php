<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Profile
      </h1>

      <ol class="breadcrumb">
        <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content" style="">

   <div id="profile_container">
      <div class="row">
         <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box">
               <div class="box-body box-profile">
                  <?php
					   $employee_image = $employees[0]->employee_image;
					   if($employee_image){
						   $image_url = base_url().'/assets/profiles/'.$employee_image;
					   }else{
							$image_url =  base_url().'/assets/images/userImage.gif';
					   }
	               ?>

                  <img class="profile-user-img img-responsive img-circle" src="<?php echo $image_url; ?>" alt="User profile picture">
 				  <p class="text-muted text-center"><?php echo $employees[0]->id_number; ?></p>                 
                  <h3 class="profile-username text-center">
                        <?php echo ucwords(strtolower($employees[0]->firstname)).' '; ?>              
	                    <?php echo ucfirst(strtolower($employees[0]->m_name)).' '; ?>   
	                    <?php echo ucfirst(strtolower($employees[0]->l_name)); ?> 
                  </h3>
                  <p class="text-muted text-center"><?php echo $employees[0]->position_name; ?></p>
         
                  <p class="text-center"><span class="label label-warning">
                  <?php echo $employees[0]->office_division_name; ?></span>  
                  <span class="label label-success"><?php echo $employees[0]->employment_type; ?> </span> &nbsp;
                  <?php echo $employees[0]->is_active; ?> 

                  <?php
                   $session_employee_id = $this->session->userdata('employee_id');
                     if($employee_id == $session_employee_id){ ?>
                       <a href="#" id="button_edit_profile"> <span class="label label-primary">Edit Profile</span></p></a>
                  <?php } ?>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">About</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Home Address</strong>
                  <p class="text-muted"><?php echo $employees[0]->address_1; ?></p>
                  <hr style="margin-top:5px; margin-bottom:5px;">                  
                  <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                  <a href="#"><p style="margin: 0px;"class="text-muted"><?php echo $employees[0]->email_1; ?></p></a>
                  <a href="#"><p style="margin: 0px;"class="text-muted"><?php echo $employees[0]->email_2; ?></p></a>
                  <hr style="margin-top:5px; margin-bottom:5px;">  
                  <strong><i class="fa fa-birthday-cake margin-r-5"></i> Birthday </strong>
                  <p class="text-muted"><?php echo $employees[0]->birthday; ?></p>
                   <hr style="margin-top:5px; margin-bottom:5px;">  
                   <strong><i class="fa fa-mobile-phone margin-r-5"></i> Contact # </strong>
                  <p class="text-muted"><?php echo $employees[0]->contact_1; ?></p>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <div class="col-md-6">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Activity</a></li>
                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
               </ul>
               <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="activity" >
                     <!-- The timeline -->

                           <div class="callout callout-info" style="margin-bottom: 0!important;">
                             No recent activity yet......
                           </div>

                     <ul class="timeline timeline-inverse" style="display:none;">
                        <!-- timeline time label -->
                        <li class="time-label">
                           <span class="bg-gray">
                           11 Nov. 2016
                           </span>
                        </li>
                        <!-- /.timeline-label -->
         
                        <li>
                           <i class="fa fa-user bg-aqua"></i>
                           <div class="timeline-item">
                              <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                              <h3 class="timeline-header no-border"><a href="#">Marlo Sullano</a> approved your  PAF request.
                              </h3>
                           </div>
                        </li>

                        <li class="time-label">
                           <span class="bg-gray">
                           10 Nov. 2016
                           </span>
                        </li>
                        <!-- /.timeline-label -->
         
                        <li>
                           <i class="fa fa-user bg-aqua"></i>
                           <div class="timeline-item">
                              <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                              <h3 class="timeline-header no-border"><a href="#">Ryan Lucerna</a> assign you on his PAF request.
                              </h3>
                           </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                           <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                     </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                      <form class="form-horizontal" role="form">
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="form-group">
                                    <p for="gender" class="col-md-4 control-label">Username:</p>
                                    <div class="col-md-8">
                                       <input type="text" disabled="" class="form-control" id="device_id"  value="<?php echo $employees[0]->uname; ?>" placeholder="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <p for="device_id" class="col-md-4 control-label">Old Password</p>
                                    <div class="col-md-8">
                                       <input type="password" class="form-control" id="txt_input_old_password" placeholder="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <p for="device_id" class="col-md-4 control-label">New Password</p>
                                    <div class="col-md-8">
                                       <input type="password" class="form-control" id="txt_input_new_password" placeholder="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <p for="device_id" class="col-md-4 control-label">Confirm Password</p>
                                    <div class="col-md-8">
                                       <input type="password" class="form-control" id="txt_input_confirm_password" placeholder="">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <p for="device_id" class="col-md-4 control-label"></p>
                                    <div class="col-md-8">
                                       <p id="label_pass_change" style="display:none; color:green;">Successfully change password</p>
                                       <button type="button" id="btn_change_pass" class="btn btn-sm btn-success">Change Password</button>
                                       <button type="button" id="btn_clear_pass" class="btn btn-sm btn-danger">Clear</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-3">
                              </div>
                           </div>
                        </form>
                  </div>
                  <!-- /.tab-pane -->
               </div>
               <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
         </div>

         <!--div class="col-md-3">
				  <div class="box">
				                <div class="box-header with-border">
				                  <h3 class="box-title">Related Employees</h3>

				                  <div class="box-tools pull-right">
				                    <span class="label label-success"><?php //echo count($team_members) ?> members </span>
				                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				                    </button>
				                  </div>
				                </div>
				                <!-- /.box-header -->
				                <!--div class="box-body no-padding" style="display: block;">
				     
				                  <ul class="users-list clearfix">

				                  <?php /* foreach ($team_members as $row ){ 
										 $employee_image = $row->employee_image;
                                           if($employee_image){
                                               $image_url = base_url().'/assets/profiles/'.$employee_image;
                                           }else{
                                               $image_url =  base_url().'/assets/images/userImage.gif';
                                           }
										   */
				                  	?>


				                    <li>
				                      <img src="<?php //echo $image_url; ?>" alt="User Image" style="width:50px; height:50px;">
				                      <a  target="_blank" class="users-list-name" href="<?php //echo base_url().'personnel/profile/'.$row->employee_id; ?>"><?php //echo ucwords(strtolower($row->firstname)); ?></a>
				                    </li>

				                    <?php // } ?>
				       
				                  </ul>	
				                  <!-- /.users-list -->
				                <!--/div>
				                <!-- /.box-body -->
				                <!--div class="box-footer text-center" style="display: block;">
				                 
				                </div>
				                <!-- /.box-footer -->
				              <!--/div>       	
         </div-->
      </div>
    </div>

    <div id="edit_profile_container" style="display:none;">
      <div class="row">
      		<div class="col-md-12">
				<div class="box">
				            <div class="box-header with-border">
				              <h3 class="box-title">Edit Profile</h3>
				            </div>
				            <!-- /.box-header -->
				            <!-- form start -->
				             <form enctype="multipart/form-data" method="post" id="form_attachments" class="form-horizontal" role="form">
				              <div class="box-body">
		                           <div class="row">
		                              <div class="col-md-5">
		                                 <div class="form-group">
		                                    <p for="personnel_id" class="col-md-4 control-label">Home Address</p>
		                                    <div class="col-md-8">
		                                       <input type="text" class="form-control" id="txt_home_address" value="<?php echo $employees[0]->address_1; ?>" placeholder="">
		                                    </div>
		                                 </div>
		                                 <div class="form-group">
		                                    <p for="gender" class="col-md-4 control-label">Company Email:	</p>
		                                    <div class="col-md-8">
		                                       <input type="text" class="form-control" id="txt_personal_email" value="<?php echo $employees[0]->email_1; ?>" placeholder="" disabled='disabled'>
		                                    </div>
		                                 </div>
		                                 <div class="form-group">
		                                    <p for="gender" class="col-md-4 control-label">Email Address(es):	</p>
		                                    <div class="col-md-8">
		                                       <input type="text" class="form-control" id="txt_company_email" value="<?php echo $employees[0]->email_2; ?>" placeholder="">
											   <small> To add more email address, please use a comma(,).</small>
		                                    </div>
		                                 </div>
		                                 <div class="form-group">
		                                    <p for="device_id" class="col-md-4 control-label">Birthday</p>
		                                    <div class="col-md-6">
		                                       <div id="jqxbirthday"></div>
		                                    </div>
		                                 </div>
		                              </div>
		                              <div class="col-md-4">
		                                 <div class="form-group">
		                                    <p for="e_type" class="col-md-4 control-label">Mobile Number</p>
		                                    <div class="col-md-8">
		                                       <input type="text" class="form-control" id="txt_mobile_number" value="<?php echo $employees[0]->contact_1; ?>" placeholder="">
		                                    </div>
		                                 </div>
		                                 <div class="form-group">
		                                    <p for="personnel_id" class="col-md-4 control-label">TIN #</p>
		                                    <div class="col-md-8">
		                                       <input type="text" class="form-control" id="txt_tin_number" value="<?php echo $employees[0]->tin_number; ?>" placeholder="">
		                                    </div>
		                                 </div>
		                                 <div class="form-group">
		                                    <p for="device_id" class="col-md-4 control-label">SSS #</p>
		                                    <div class="col-md-8">
		                                       <input type="text" class="form-control" id="txt_sss_number" value="<?php echo $employees[0]->sss_number; ?>" placeholder="">
		                                    </div>
		                                 </div>
		                               </div>
                              <div class="col-md-2">
                                 <div class="form-group" style="text-align: center; margin-top:0px;">
                                    <div class="ar_r_t">
                                       <div id="photo_show_area" class="ar_l_t">
                                          <div class="ar_r_b">
                                             <div id="localImage" class="ar_l_b">
                                                <?php 
                                                   $employee_image = $employees[0]->employee_image;
                                                   if($employee_image){
                                                       $image_url = base_url().'/assets/profiles/'.$employee_image;
                                                   }else{
                                                        $image_url =  base_url().'/assets/images/userImage.gif';
                                                   }
                                                   ?>
                                                <img id="id_img_personnel" width="120px" height="140px" src="<?php echo $image_url; ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <span class="color_orange" style="padding-right:10px;">(Optimal Size 120×140 Pixel)</span>
                                    <input style="width: 136px; margin-left: 68px;margin-top: 0px;margin-bottom: 9px;" name="file[]" type="file" />   
                                    <button class="btn btn-xs btn-primary" type="button" id="btn_upload_image">Upload Profile Picture</button>      
                                 </div>
                              </div>

		                             </div>
				              </div>
				              <!-- /.box-body -->

				              <div class="box-footer">
			                        <p id="label_profile_msg" style="display:none; color:green;">Successfully Update Changes</p>
                                   <button id="btn_update_profile" type="button" class="btn btn-sm btn-success">Update All Changes</button>
                                   <button id="btn_update_profile_cancel" type="button" class="btn btn-sm btn-danger">Cancel</button>
				              </div>
				            </form>
				  </div>
      		</div>
      </div>
    </div>

   </section>


</div>

<!-- /#page-wrapper -->

<script type="text/javascript">

var BASE_URL = '<?php echo base_url(); ?>';
    $(document).ready(function () {

   
    		$('#profile_container').show();
    		$('#edit_profile_container').hide();

    		$('#button_edit_profile').on('click',function(){
    			$('#edit_profile_container').show();
	    			$('#profile_container').hide();
    		});


	    		$('#btn_update_profile_cancel').on('click',function(){
    			$('#profile_container').show();
    			$('#edit_profile_container').hide();
    		});



    		$('#btn_update_profile').on('click',function(){

	    		info = {};
	    		info['employee_id'] = '<?php echo $employee_id; ?>';
	    		info['birthday'] = $('#jqxbirthday').val();
	    		info['address_1'] = $('#txt_home_address').val();
	    		info['email_1'] = $('#txt_personal_email').val();
	    		info['email_2'] = $('#txt_company_email').val();
		    		info['contact_1'] = $('#txt_mobile_number').val();
		    		info['tin_number'] = $('#txt_tin_number').val();
	    		info['sss_number'] = $('#txt_sss_number').val();

	    		var result = postdata(BASE_URL + 'personnel/updateprofile' , info);

	    		if(result){
					//=========================================================================================
					/*	record the activity */																/*||*/
					/*||*/	var d 		   = new Object();												    /*||*/
					/*||*/		d.activity = "Updated the profile";			/*||*/
					/*||*/																					/*||*/
					/*||*/		savetoactivity(info['employee_id'],d,"employees",info['employee_id']);		/*||*/
					/*  end recording activity */															/*||*/
					//=========================================================================================
							
	    			$('#label_profile_msg').show();
	    			$('#label_profile_msg').fadeOut(5000);
	    		}
  		
    		});




    		$('#btn_clear_pass').on('click',function(){
    			$('#txt_input_old_password').val('');
	    		$('#txt_input_new_password').val('');
	    		$('#txt_input_confirm_password').val('');
    		});




	    	$('#btn_change_pass').on('click',function(){


	    		if($('#txt_input_new_password').val() == $('#txt_input_confirm_password').val()){


	    		info = {};
	    		info['employee_id'] = '<?php echo $employee_id; ?>';
	    		info['old_password'] = $('#txt_input_old_password').val();
	    		info['new_password'] = $('#txt_input_new_password').val();

	    		var update = postdata(BASE_URL + 'personnel/update_password' , info);

	    		if(update){
					//=========================================================================================
					/*	record the activity */															  /*|*/
					/*|*/	var d 		   = new Object();											 	  /*|*/
					/*|*/		d.activity = "password updated";				 						  /*|*/
					/*|*/																				  /*|*/
					/*|*/		savetoactivity(info['employee_id'],d,"users",info['employee_id']);		  /*|*/
					/*  end recording activity */														  /*|*/
					//=========================================================================================

	    		$('#label_pass_change').show();
	    		$('#label_pass_change').html('Successfully Change Password');
				$('#label_pass_change').css({'color' : 'green'});
				$('#label_pass_change').fadeOut(5000);

	    		}else{

	    		$('#label_pass_change').show();
	    		$('#label_pass_change').html('Incorrect old password');
	    		$('#label_pass_change').css({'color' : 'red'});
	    		$('#label_pass_change').fadeOut(5000);

	    		}


	    	}else{

	    	    $('#label_pass_change').show();
	    		$('#label_pass_change').html('Password not match. Please try again..');
	    		$('#label_pass_change').css({'color' : 'red'});	

	    		$('#label_pass_change').fadeOut(5000);	

	    		$('#txt_input_old_password').val('');
	    		$('#txt_input_new_password').val('');
	    		$('#txt_input_confirm_password').val('');	
	    	}



	    		
	    	});



				 $('#btn_upload_image').on('click',function(){

           		  var formData = new FormData($('#form_attachments')[0]);

	                  $.ajax({
	                      url: BASE_URL + 'personnel/uploadattachment',
	                      type: 'POST',
	                      dataType: 'json', 
	                      xhr: function() {
	                          var myXhr = $.ajaxSettings.xhr();
	                          return myXhr;
	                      },
	                      success: function (data) {

	                           var attachments = data.filename;

	          
	                            if(data.success == 0){
	                                attachments = '';
	                            }


	                              var info = {};
	                              info['employee_id'] = '<?php echo $employee_id; ?>';
	                              info['attachments'] = attachments;

	                              var result = postdata(BASE_URL + 'personnel/saveprofile' , info);


	                            if(result){
																
									//=========================================================================================
									/*	record the activity */																/*||*/
									/*||*/	var d 		   = new Object();												    /*||*/
									/*||*/		d.activity = "Changed Profile Picture";			/*||*/
									/*||*/																					/*||*/
									/*||*/		savetoactivity(info['employee_id'],d,"employees",info['employee_id']);							/*||*/
									/*  end recording activity */															/*||*/
									//=========================================================================================
									
	                     	    	$("#id_img_personnel").attr("src",BASE_URL + 'assets/profiles/' +result);
									showmessage('Successfully upload image. You need to sign out then sign in again for changes to take effect. Thank you' , 'success');
	                            }

	                      },
	                      data: formData,
	                      cache: false,
	                      contentType: false,
	                      processData: false
	                  });
				 });



				     	 $("#jqxbirthday").jqxDateTimeInput({width: '250px', height: '25px' , formatString: "MM/dd/yyyy" });

				     	 $('#jqxbirthday').jqxDateTimeInput('setDate', new Date('<?php echo $employees[0]->birthday; ?>'));


     
    });
</script>

