<div class="row">
         <div class="col-lg-12">

			<div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#" href="#collapseOne" aria-expanded="true" class="">Personnel Profile</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                        <div class="panel-body">


								<form enctype="multipart/form-data" action="upload.php" method="post" id="form_attachments" class="form-horizontal" role="form">

									<div class="row">
										<div class="col-md-5">

										    <div class="form-group">
										      <p for="personnel_id" class="col-md-4 control-label">ID NO.</p>
										      <div class="col-md-6">
										          <input type="hidden" class="form-control" id="textbox_employee_id" placeholder="e.g. 03212016-241">
										          <input type="text" class="form-control" id="textbox_id_no" placeholder="e.g. 03212016-241">
										      </div>
										    </div>

										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">Device ID</p>
										      <div class="col-md-6">
										          <input type="text" class="form-control" id="text_box_device_id" placeholder="e.g. 241 ">
										      </div>
										    </div>

										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Gender</p>
										      <div class="col-md-6">
										         <select id="dropdown_gender" class="form-control">
										         <option value="Male">Male</option>
										         <option value="Female">Female</option>
										         </select>
										      </div>
										    </div>


										    <div class="form-group">
										      <p for="e_type" class="col-md-4 control-label">Employment Type</p>
										      <div class="col-md-6">
										         <select id="dropdown_employment_type" class="form-control">
										         <option value="REGULAR">Regular</option>
										         <option value="JO">Job Order</option>
										         </select>
										      </div>
										    </div>


										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">Employment Date</p>
										      <div class="col-md-6">
										      	<div id="jqxemployement_date"></div>
										      </div>
										    </div>

										     <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">Monthly/Daily Rate</p>
										      <div class="col-md-6">
										        	<div id="numericInput"></div>

										      </div>
										    </div>



										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Status</p>
										      <div class="col-md-6">
										         <select id="dropdown_status" class="form-control">
										         <option value="1"> Active</option>
										         <option value="0">Inactive</option>
										         </select>
										      </div>
										    </div>

										</div>

										<div class="col-md-4">

										    <div class="form-group">
										      <p for="personnel_id" class="col-md-4 control-label">Last Name</p>
										      <div class="col-md-8">
										          <input type="text" style="text-transform: uppercase;" class="form-control" id="textbox_lastname" placeholder="">
										      </div>
										    </div>

										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">First Name</p>
										      <div class="col-md-8">
										          <input type="text" style="text-transform: uppercase;"  class="form-control" id="textbox_firstname" placeholder="">
										      </div>
										    </div>


										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">Middle Name</p>
										      <div class="col-md-8">
										          <input type="text" style="text-transform: uppercase;"  class="form-control" id="textbox_middlename" placeholder="">
										      </div>
										    </div>

										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Area</p>

										      <div class="col-md-6">
										         <select id="dropdown_area" class="form-control">

										         <?php 
										         	foreach ($areas as $key => $value) {
										         		echo "<option value='".$value->area_id."'>".$value->area_name."</option>";
										         	}

										         ?>
										         </select>
										      </div>
										    </div>

										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Office & Division</p>
										      <div class="col-md-8">

															<?php $this->load->view('admin/personnel/office_division_tree_view' , $sub_pap_division_tree ); ?>
										      </div>
										    </div>

										   <div class="form-group">
										      <p for="gender" class="col-md-6 control-label">Division Chief / OIC </p>
										      <div class="col-md-6">

															<input style="margin-top:10px;" type="checkbox" id="input_is_head" checked="" />
										      </div>
										    </div>		
											
											<div class="form-group">
										      <p for="gender" class="col-md-6 control-label">Set as focal person </p>
										      <div class="col-md-6">
													<input style="margin-top:10px;" type="checkbox" id="isfocal"/>
										      </div>
										    </div>		
											
										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Position</p>
										      <div class="col-md-8">
										         <select id="dropdown_position" class="form-control">
										         <?php 
										         	foreach ($positions as $key => $value) {
										         		echo "<option value='".$value->position_id."'>".$value->position_name."</option>";
										         	}
										         ?>
										         </select>
												 <input type='text' placeholder='Add new position' class='form-control' id='newposition'/>
												 <span id='notice_span' style='display:none; position: absolute; font-size: 9px;right: 16px; background: #d46a6a; color: #fff; padding: 5px; margin-top: -1px;'></span>
												 <p class='btn btn-default btn-xs' id='addnewposition'> Add position </p>
										      </div>
										    </div>


										</div>		

										<div class="col-md-3">

											<div class="form-group" style="text-align: center; margin-top:20px;">
												<div class="ar_r_t">
					                            	<div id="photo_show_area" class="ar_l_t">
					                            		<div class="ar_r_b">
					                            			<div id="localImage" class="ar_l_b">


					                            			
					                            				<img id="id_img_personnel" width="120px" height="140px" src="<?php echo base_url(); ?>assets/images/userImage.gif">
					                            			</div>
					                            		</div>
					                            	</div>
					                            </div>
					                            <span class="color_orange" style="padding-right:10px;">(Optimal Size 120×140 Pixel)</span>

					                            		 	  	
																		    <input style="margin-left: 68px;margin-top: 5px;margin-bottom: 9px;" name="file[]" type="file" />	
																		    <button class="btn btn-xs btn-primary" type="button" id="btn_upload_image">Save & Upload</button>													 
                      
											</div>



											<div class="form-group" style="text-align: center; border-top: solid 1px #ddd;  margin-top:10px; padding-top: 10px; width: 200px; margin: auto">


												<p id="_e_sig_status"style="color:red;">No e-signature yet.</p>
					                            <span class="color_orange" style="padding-right:10px;">(Optimal Size 140x98 Pixel)</span>
                    		
											    <input style="margin-top: 5px;margin-bottom: 9px;" name="file[]" type="file" />	
											    <button class="btn btn-xs btn-primary" type="button" id="btn_upload_e_signature">Save & Upload E-Signature</button>													 
                      

											</div>

										</div>
									</div>
								</form>


                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#" href="#collapseTwo" class="collapsed" aria-expanded="true">Personnel Details</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="true">
                        <div class="panel-body">

								<form class="form-horizontal" role="form">

									<div class="row">
										<div class="col-md-5">

										    <div class="form-group">
										      <p for="personnel_id" class="col-md-4 control-label">Home Address</p>
										      <div class="col-md-8">
										          <input type="text" class="form-control" id="textbox_home_address" placeholder="">
										      </div>
										    </div>

										   <div class="form-group" style='display:none;'>
										      <p for="gender" class="col-md-4 control-label">Email:	</p>
										      <div class="col-md-8">
													<input type="text" class="form-control" id="textbox_personal_email" placeholder="">
										      </div>
										    </div>

										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Email(s):	</p>
										      <div class="col-md-8">
													<input type="text" class="form-control" id="textbox_company_email" placeholder="">
													<span style='font-size: 13px; font-style: italic;'> You can input two or more email addresses. <br/> Use a comma (,) to separate.</span>
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
													<input type="text" class="form-control" id="textbox_mobile_number" placeholder="">
										      </div>
										    </div>


										    <div class="form-group">
										      <p for="personnel_id" class="col-md-4 control-label">TIN #</p>
										      <div class="col-md-8">
										          <input type="text" class="form-control" id="textbox_tin_number" placeholder="">
										      </div>
										    </div>

										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">SSS #</p>
										      <div class="col-md-8">
										          <input type="text" class="form-control" id="textbox_sss_number" placeholder="">
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#" href="#collapseThree" class="collapsed" aria-expanded="true">Attendance Settings</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="true">
                        <div class="panel-body">
                 
								<form class="form-horizontal" role="form">

									<div class="row">
										<div class="col-md-5">

											<div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Username:</p>
										      <div class="col-md-8">
														<input type="hidden" class="form-control" id="text_box_user_id" placeholder="">
														<input type="text" class="form-control" id="textbox_username" placeholder="">
										      </div>
										    </div>

										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">New Password</p>
										      <div class="col-md-8">
										          <input type="password" class="form-control" id="textbox_new_password" placeholder="">
										      </div>
										    </div>

										    <div class="form-group">
										      <p for="device_id" class="col-md-4 control-label">Confirm Password</p>
										      <div class="col-md-8">
										          <input type="password" class="form-control" id="textbox_confirm_password" placeholder="">
										      </div>
										    </div>
											
											<div class="form-group">
											 <p for="device_id" class="col-md-4 control-label">&nbsp;</p>
											 <div class="col-md-8">
												<p class='btn btn-primary' id='sendacct_to_email'> Send account to email.</p> 
												<br/><br/>
												<span id='sendingemail'> </span> 
											 </div>
											</div> 

										</div>

										<div class="col-md-4">

										   <div class="form-group">
										      <p for="gender" class="col-md-4 control-label">Personnel Device Privilege</p>
										      <div class="col-md-8">
										         <select id="dropdown_levels" class="form-control">
										         <option value="admin" >Super Administrator</option>
										         <option value="admin">System Administrator</option>
										         <option value="admin">HR Administrator</option>
										         <option value="f-admin">Finance Administrator</option>
										         <option value="user">Employee</option>
										         </select>
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
            </div>

        </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
			
			$(document).on("click","#addnewposition" ,function() {
				var position_name = $("#newposition").val();
				
				if (position_name.length == 0){
					$("#notice_span").text("Position Name cannot be empty.").fadeIn();
				} else {
					performajax(['Personnel/add_new_position',{position_name:position_name}], function(data) {
						if(data != false){
							// dropdown_position
							$("<option value='"+data+"' selected>"+position_name+"</option>").prependTo("#dropdown_position");
							
							$("#newposition").val("");
							$("#notice_span").fadeOut();
						}
					});
				}
			})


           $("#jqxemployement_date").jqxDateTimeInput({ width: 250, height: 25,  selectionMode: 'range' , template: 'primary'});

             var date = new Date();
             var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
             var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

              var date1 = new Date();
              date1.setFullYear(firstDay.getFullYear(), firstDay.getMonth(), firstDay.getDate());
              var date2 = new Date();
              date2.setFullYear(lastDay.getFullYear(), lastDay.getMonth(), lastDay.getDate());

              $("#jqxemployement_date").jqxDateTimeInput('setRange', date1, date2)
              var selection = $("#jqxemployement_date").jqxDateTimeInput('getRange');
              //$("#selection").html("<div id='startenddate'>Start Date: " + selection.from.toLocaleDateString() + " <br/>End Date: " + selection.to.toLocaleDateString() + "</div>");


             $("#numericInput").jqxNumberInput({ width: '209px',  spinButtons: true });

              $("#jqxbirthday").jqxDateTimeInput({width: '250px', height: '25px' , formatString: "MM/dd/yyyy" });


      	    $("#jqxemployement_date").on('change', function (event) {
                var selection = $("#jqxemployement_date").jqxDateTimeInput('getRange');
                if (selection.from != null) {

                    var sdate = selection.from.toLocaleDateString();
                    var edate = selection.to.toLocaleDateString();

                }
            });




			$('body').on('click', '#upload', function(e){
		        e.preventDefault();
		    });
		       
				        
	            
     
    });
</script>

