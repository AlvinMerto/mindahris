

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $title; ?></h3>
        </div>
        <!-- /.col-lg-12 -->

<div class="row">
         <div class="col-lg-12">

			<div class="panel-group" id="accordion">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#" href="#collapseOne" aria-expanded="true" class="">Personnel Profile</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                        <div class="panel-body">


								<form enctype="multipart/form-data" action="upload.php" method="post" id="form_attachments" class="form-horizontal" role="form">

									<div class="row">

										<div class="col-md-2">

											<div class="form-group" style="text-align: center; margin-top:20px;">
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
					                              							<input style="width: 136px; margin-left: 68px;margin-top: 5px;margin-bottom: 9px;" name="file[]" type="file" />	
																		    <button class="btn btn-xs btn-primary" type="button" id="btn_upload_image">Upload</button>		
											</div>

										</div>



										<div class="col-md-4">

										    <div class="form-group">
										      <p  style="text-align:left !important; " for="personnel_id" class="col-md-2 control-label">ID NO.</p>
										      <div class="col-md-6">
										         <p style="text-align:left !important; font-weight: bold" class="col-md-8 control-label"><?php echo $employees[0]->id_number;?></p>
										      </div>
										    </div>

										    <div class="form-group">
										      <p style="text-align:left !important; " for="personnel_id" class="col-md-2 control-label">Fullname:</p>
										      <div class="col-md-8">
										        	<p style="text-align:left !important;font-weight: bold ; text-transform: uppercase;" class="col-md-10 control-label">
										        	
										        	<?php echo $employees[0]->l_name.', ' ?> 
										        	<?php echo $employees[0]->firstname.' '; ?> 
										       		<?php echo $employees[0]->m_name; ?>
										       		
										       			</p>
										      </div>
										    </div>





										    <div class="form-group">
										      <p style="text-align:left !important; " for="e_type" class="col-md-2 control-label">Employment Type</p>
										      <div class="col-md-6">
												<p style="text-align:left !important;font-weight: bold" class="col-md-4 control-label"><span><?php echo $employees[0]->employment_type; ?></span></p>
										      </div>
										    </div>


										   <div class="form-group">
										      <p style="text-align:left !important; " for="device_id" class="col-md-2 control-label"><?php echo $employees[0]->employment_type; ?> Coverage</p>
										      <div class="col-md-6">
										        <p  style="text-align:left !important;font-weight: bold" class="col-md-10 control-label"><?php echo $employees[0]->employment_type_date; ?></p>
										      </div>
										    </div>
										 
										   <div class="form-group">
										      <p style="text-align:left !important; " for="gender" class="col-md-2 control-label">Status</p>
										      <div class="col-md-6">
										      	<p style="text-align:left !important;font-weight: bold" class="col-md-4 control-label"><?php echo $employees[0]->is_active; ?></p>
										      </div>
										    </div>


										</div>

										<div class="col-md-4">



										   <div class="form-group">
										      <p style="text-align:left !important; " for="gender" class="col-md-2 control-label">Office & Division</p>
										      <div class="col-md-8">
										         <p  style="text-align:left !important;font-weight: bold"class="col-md-10 control-label"><span style="text-transform: uppercase;"><?php echo $employees[0]->office_division_name; ?></span></p>
										      </div>
										    </div>
										    
										   <div class="form-group">
										      <p style="text-align:left !important; " for="gender" class="col-md-2 control-label">Position</p>
										      <div class="col-md-6">
										           <p  style="text-align:left !important;font-weight: bold"class="col-md-10 control-label"><span style="text-transform: uppercase;"><?php echo $employees[0]->position_name; ?></span></p>
										      </div>
										    </div>										

 											 <div class="form-group">
										      <p style="text-align:left !important; " for="gender" class="col-md-2 control-label">Gender</p>
										      <div class="col-md-6">
												<p style="text-align:left !important;font-weight: bold" class="col-md-4 control-label"><span><?php echo $employees[0]->gender; ?></span></p>
										      </div>
										    </div>


										     <div class="form-group">
										      <p style="text-align:left !important; " for="e_type" class="col-md-2 control-label">Area</p>
										      <div class="col-md-6">
												<p style="text-align:left !important;font-weight: bold" class="col-md-4 control-label"><span><?php echo $this->session->userdata('area_name'); ?></span></p>
										      </div>
										    </div>







										</div>		


									</div>
								</form>


                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#" href="#collapseTwo" class="collapsed" aria-expanded="true">Personnel Details</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" aria-expanded="true">
                        <div class="panel-body">

								<form class="form-horizontal" role="form">

									<div class="row">
										<div class="col-md-5">

										    <div class="form-group">
										      <p for="personnel_id" class="col-md-4 control-label">Home Address</p>
										      <div class="col-md-8">
										          <input type="text" class="form-control" id="txt_home_address" value="<?php echo $employees[0]->address_1; ?>" placeholder="">
										      </div>
										    </div>

										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Email:	</p>
										      <div class="col-md-8">
														<input type="text" class="form-control" id="txt_personal_email" value="<?php echo $employees[0]->email_1; ?>" placeholder="">
										      </div>
										    </div>

										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Company Email:	</p>
										      <div class="col-md-8">
														<input type="text" class="form-control" id="txt_company_email" value="<?php echo $employees[0]->email_2; ?>" placeholder="">
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

										    <br>
										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label"></p>
										      <div class="col-md-6">
										      	<p id="label_profile_msg" style="display:none; color:green;">Successfully Update Changes</p>
										      	<button id="btn_update_profile" type="button" class="btn btn-sm btn-success">Update All Changes</button>
										      </div>
										    </div>


										</div>		

										<div class="col-md-3">

										</div>
									</div>
								</form>


                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#" href="#collapseThree" class="collapsed" aria-expanded="true">Attendance Settings</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse in" aria-expanded="true">
                        <div class="panel-body">
                 
								<form class="form-horizontal" role="form">

									<div class="row">
										<div class="col-md-5">


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
										      <div class="col-md-6">
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
                    </div>
                </div>
            </div>

        </div>
</div>








    </div>
</div>
<!-- /#page-wrapper -->



<script type="text/javascript">

var BASE_URL = '<?php echo base_url(); ?>';

    $(document).ready(function () {


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


	                     		$("#id_img_personnel").attr("src",BASE_URL + 'assets/profiles/' +result);

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

