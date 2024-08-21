<div class="content-wrapper">

   <section class="content-header">
    <h1>
        Personnel
    </h1>
    <ol class="breadcrumb">
       <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
    </ol>
 </section>

 <section class="content">

   <div class="row">

	 <div class="col-md-12">
    	<div class="form-group" style='padding: 0px 12px; margin-bottom:7px;'>
    			<a  id="btn_add_employee" class="" style='border-bottom: 2px solid; padding: 6px; cursor:pointer; margin-right:8px;'><i class="fa fa-plus-circle"></i> Add </a>
    			<a  id="changesig" class="" style='border-bottom: 2px solid; padding: 6px; cursor:pointer;'><i class="fas fa-users-cog"></i> Change Signatory </a>
    			<!--a href="<?php //base_url();?> employee/import" class="">Import</a-->
    	</div>
	 </div>

     <div class="col-md-12">
       <div class="box" style='border-top: 1px solid #3c8cbb;'>
           <div class="box-header with-border">
              <h3 class="box-title"> Employee List</h3>
              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                   <div id="jqxgridemployees"></div>
                 </div>
              </div>
              <!-- /.row -->
           </div>
           <!-- ./box-body -->
           <!-- /.box-footer -->
        </div>
     </div>
    </div>
 </section>

</div>  



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-lg modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel" id="modal_header" >Add Employee</h4>
            </div>
            <div class="modal-body">

            	<?php  $this->load->view('hrmis/personnel/employee_update_view'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-success" id="btn_save_employees" >Save all changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalchangepersonel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-lg modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel" id="modal_header" >Change Signatory</h4>
            </div>
            <div class="modal-body" style='padding:0px;'>
				<p class='offdivunits'> Offices and Divisions/Units </p>
				<div class='content_wrapperbody'>
					<div class='leftdivbox'>
						<p class='changesigs'> Change office/Division Signatories </p>
						<ul class='leftullist'>
							<?php 
								foreach(array_keys($off_divs) as $k) {
									echo "<li>"; //{$off_divs_desc[$k]}
										echo "<div class='headdiv retdata' data-roomid='u-0_o-{$k}'>";
											echo "<p> {$off_divs_desc[$k]} </p>";
											echo "<select class='btn btn-default btn-xs headchange' data-chngid = 'u-0_o-{$k}'>";
													echo "<option>--SELECT</option>";
													foreach($empdata as $ed) {
														$isselected = null;
												
														if ($k == $ed->DBM_Pap_id && $ed->Division_id == 0 && $ed->is_head == 1) {
															$isselected = " selected ";
														}
														
														echo "<option value='{$ed->employee_id}' {$isselected}>";
															echo $ed->f_name;
														echo "</option>";
														
													}
													
											echo "</select>";
										echo "</div>";
										
										
											echo "<div class='divsunits'>";
												echo "<ol>";
													foreach($off_divs[$k] as $d) {
														if ($d != NULL && strlen($d[0])!=0){
															echo "<li>";
																echo "<div class='olwrapdiv retdata' data-roomid='u-{$d[1]}_o-{$k}'>";
																	echo "<p> {$d[0]} </p>";
																	
																	echo "<select class='btn btn-default btn-xs headchange'  data-chngid = 'u-{$d[1]}_o-{$k}'>";
																		echo "<option>--SELECT</option>";
																		foreach($empdata as $em) {
																			
																			$sel = null;
																			if ($d[1] == $em->Division_id && $em->is_head == 1) {
																				$sel = " selected ";
																			}
																				
																			echo "<option value='{$em->employee_id}' {$sel}>";
																				echo $em->f_name;
																			echo "</option>";
																				
																		}
																	echo "</select>";
																echo "</div>";
															echo "</li>";
														}
													}
											echo "</div>";
									echo "</li>";
								}
							?>
							
						</ul>
					</div>
					<div class='rightdivbox'>
						<p class='offdivsaffs' style='border-bottom: 1px solid #ccc;'> Change Office/Division Affiliation </p>
						<table id='ftable'>
							<tr>
								<td colspan=2 style='padding-left:10px;'> <span id='divoptionlbl'> &nbsp; </span>
									<select class='btn btn-default' id='divoption' style='float:right;'>
										<!--optgroup label="Select Office/Division"-->
											<option> -- Select </option>
											<?php 
												foreach(array_keys($off_divs) as $od) {
													echo "<option value='u-0_o-{$od}'>";
														echo $off_divs_desc[$od];
													echo "</option>";
														
														foreach($off_divs[$od] as $dd) {
															if ($dd != NULL && strlen($dd[0])!=0){
																echo "<option value='u-{$dd[1]}_o-{$od}'>";
																	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-".$dd[0];
																echo "</option>";
															}
														}
												}
											?>
										<!--/optgroup-->
									</select>
									</td>
							</tr>
							<tr>
								<td> Job Order Personnel </td>
								<td> Plantilla </td>
							</tr>
							<tr>
								<td> 
									<span class='liner'></span>
									<label id='jos_select'>
										<div class='thetickbox'></div> <span style='position:relative; top:-2px;'> Select All </span>
									</label>
								</td>
								<td> 
									<span class='liner'></span>
									<label id='reg_select'>
										<div class='thetickbox'></div> <span style='position:relative; top:-2px;'> Select All </span>
									</label>
								</td>
							</tr>	
							<tr>
								<td class='contenttd'> 
									<div class='scroller'>
										<table id='jostable'>
											<!--tr>
												<td> 
													<span class='liner'></span>
													<label><input type='checkbox'/> <span> Alvin Jay Merto  </span></label>
												</td>
											</tr-->
										</table>
									</div>
								</td>
								<td class='contenttd'> 
									<div class='scroller'>
										<table id='regstable'>
											<!--tr>
												<td> 
													<span class='liner'></span>
													<label><input type='checkbox'/> <span> Alvin Jay Merto - plantilla </span></label>
												</td>
											</tr-->
										</table>
									</div>
								</td>
							</tr>
						</table>
						
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-success" id="btn_save_employees" >Save all changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

	

<!-- /#page-wrapper -->
<script src='<?php echo base_url(); ?>v2includes/js/empview_script.js'></script>
<script type="text/javascript">
	
		var BASE_URL = '<?php echo base_url(); ?>';

        $(document).ready(function () {
			
				

        		employees = <?php echo json_encode($employees);?>; 

        		var source =
	            {
	                localdata: employees,
	                datatype: "json",
	                   dataFields: [
	                      { name: 'employee_id', type: 'number' },
	                      { name: 'id_number', type: 'string' },
	                      { name: 'biometric_id', type: 'number' },
	                      { name: 'f_name', type: 'string' },
	                      { name: 'area_name', type: 'string' },
	                      { name: 'gender', type: 'string' },
	                      { name: 'office_division_name', type: 'string' },
	                      { name: 'is_active', type: 'string' },
	                      { name: 'employment_type', type: 'string' },
	                      { name: 'p_name', type: 'string' }
	                   ],
	            };

	            var dataAdapter = new $.jqx.dataAdapter(source, {
	                loadComplete: function (data) { },
	                loadError: function (xhr, status, error) { }      
	            });


	            $("#jqxgridemployees").jqxGrid(
	            {
	                source: dataAdapter,
	                width: '100%' ,
	                height: 600,
	              
	                 groupable: true,
	                 sortable: true,
              		  filterable: true,
                showfilterrow: true,
                	altrows: true,
	                columns: [
	                  { text: 'Employee ID' , datafield: 'employee_id' ,width: 110 ,  align: 'left' , cellsalign: 'left'},
	                  { text: 'Company ID' , datafield: 'id_number' ,width: 120 ,  align: 'left' , cellsalign: 'left'},
	                  { text: 'Device ID' , datafield: 'biometric_id' ,width: 100 ,  align: 'left' , cellsalign: 'left'},
                      { text: 'Fullname', datafield: 'f_name' , width: 320 ,  align: 'left' , cellsalign: 'left' } , 
                      { text: 'Area' , datafield: 'area_name' ,width: 100 ,  align: 'left' , cellsalign: 'left' },
                      { text: 'Office & Division' , datafield: 'office_division_name' ,width: 300 ,  align: 'left' , cellsalign: 'left' },
                      { text: 'Position' , datafield: 'p_name' ,width: 200 ,  align: 'left' , cellsalign: 'left' },
                      { text: 'Gender' ,width: 100 ,  datafield: 'gender' , align: 'center' , cellsalign: 'center' }, 
                      { text: 'E Type' ,width: 100 ,  datafield: 'employment_type' , align: 'center' , cellsalign: 'center' }, 
                      { text: 'Status' ,width: 100 , datafield: 'is_active' , align: 'center' , cellsalign: 'center' }, 

	               ]
	            });


	            $('#btn_add_employee').on('click',function(){

  					$('#myModalLabel').html('Add Employee');

  					 $('#jqxgridemployees').jqxGrid('clearselection');

	            	$('#textbox_employee_id').val('');
	            	$('#textbox_id_no').val('');
	            	$('#text_box_device_id').val('');
	            	$('#textbox_lastname').val('');
	            	$('#textbox_firstname').val('');
	            	$('#textbox_middlename').val('');
	            	$('#textbox_home_address').val('');
	            	$('#textbox_personal_email').val('');
	            	$('#textbox_company_email').val('');
	            	$('#textbox_mobile_number').val('');
	            	$('#textbox_tin_number').val('');
	            	$('#textbox_sss_number').val('');
	            	$('#textbox_username').val('');
	            	$('#textbox_new_password').val('');
	            	$('#textbox_confirm_password').val('');


	            	$('#myModal').modal('show');



	            });




	             $('#jqxgridemployees').on('rowdoubleclick', function (event) {
				     // event.args.rowindex is a bound index.

				     var args  = event.args;

				     var row = args.rowindex;


				      var selectedRowData = $('#jqxgridemployees').jqxGrid('getrowdata', row);


					$('#textbox_employee_id').val(selectedRowData.employee_id);
					$('#text_box_device_id').val(selectedRowData.biometric_id);


					info = {};
					info['employee_id'] = selectedRowData.employee_id;

					var getemployees  = postdata(BASE_URL + 'personnel/getemployees' , info);

					if(getemployees){
		


/*						  DBM_Pap_id = ".$DBM_Pap_id.",
						  Division_id = ".$Division_id.",
						  Level_sub_pap_div = ".$Level_sub_pap_div.",
*/
							
						$('#textbox_id_no').val(getemployees[0].id_number);
						$('#dropdown_status').val(getemployees[0].status);
						$('#textbox_lastname').val(getemployees[0].l_name);
						$('#textbox_firstname').val(getemployees[0].firstname);


						if($('#textbox_lastname').val() == ''){
							$('#textbox_lastname').val(getemployees[0].f_name);
						}

						$('#textbox_middlename').val(getemployees[0].m_name);
						$('#dropdown_gender').val(getemployees[0].gender);
						$('#dropdown_position').val(getemployees[0].position_id);
						$('#dropdown_area').val(getemployees[0].area_id);

						$('#textbox_home_address').val(getemployees[0].address_1);
	             		$('#textbox_personal_email').val(getemployees[0].email_1);
	             		$('#textbox_company_email').val(getemployees[0].email_2);
	             		$('#textbox_mobile_number').val(getemployees[0].contact_1);
	             		$('#textbox_tin_number').val(getemployees[0].tin_number);
	             		$('#textbox_sss_number').val(getemployees[0].sss_number);

	             		if(getemployees[0].is_head == 1){
	             			$('#input_is_head').prop('checked' , true);
	             		}else{
							$('#input_is_head').prop('checked' , false);
	             		}
						
						if(getemployees[0].isfocal == 1){
	             			$('#isfocal').prop('checked' , true);
	             		}else{
							$('#isfocal').prop('checked' , false);
	             		}

	             	
	             		$('#text_box_user_id').val(getemployees[0].u_id);
	             		$('#textbox_username').val(getemployees[0].uname);
	             		$('#dropdown_levels').val(getemployees[0].usertype);

	             		$('#textbox_new_password').val('');
	             		$('#textbox_confirm_password').val('');



							var image = getemployees[0].employee_image;


							if(image){
									$("#id_img_personnel").attr("src",BASE_URL + 'assets/profiles/' +image);
							}else{
									$("#id_img_personnel").attr("src",BASE_URL + 'assets/images/userImage.gif');
	             			}
	             	

							var image = getemployees[0].e_signature;



							if(image){
									$("#_e_sig_status").html("E-signature already added");
									$("#_e_sig_status").css("color" ,"green");
							}else{
									$("#_e_sig_status").html("No e-signature yet");
									$("#_e_sig_status").css("color" ,"red");
	             			}



	             		$('#numericInput').val(getemployees[0].daily_rate);


						$('#jqxbirthday').jqxDateTimeInput('setDate', new Date(getemployees[0].birthday));

	             			$('#jqxdropdownbutton').jqxDropDownButton('setContent', ''); 
							$("#treeGrid").jqxTreeGrid('clearSelection');
							$("#treeGrid").jqxTreeGrid('collapseAll');


					     var subpaptree_1 = <?php echo json_encode($sub_pap_division_tree); ?>;
					      for (i in subpaptree_1) {


					      	if(getemployees[0].Division_id == 0){

					      		if(getemployees[0].DBM_Pap_id == subpaptree_1[i].master_id && subpaptree_1[i].db_table == 'DBM_Sub_Pap'){
					      			$("#treeGrid").jqxTreeGrid('selectRow', i);
					      		}

					      		 

					      	}else{
						  		if(subpaptree_1[i].master_id == getemployees[0].DBM_Pap_id && subpaptree_1[i].db_table == 'DBM_Sub_Pap'){
	 									$("#treeGrid").jqxTreeGrid('expandRow', i);
	 		
						  		}

						  		if(subpaptree_1[i].master_id == getemployees[0].Division_id && subpaptree_1[i].db_table == getemployees[0].Level_sub_pap_div) {
						  			 $("#treeGrid").jqxTreeGrid('selectRow', i);

						  		}					      		
					      	}






					      }




					       //$("#treeGrid").jqxTreeGrid('expandRow', 2);
					       




	             		$('#dropdown_employment_type').val(getemployees[0].employment_type);


					}

				     $('#myModalLabel').html('Edit Employee');
					 $('#myModal').modal('show');

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
	                              info['employee_id'] = $('#textbox_employee_id').val();
	                              info['attachments'] = attachments;

	                              var result = postdata(BASE_URL + 'personnel/saveprofile' , info);


	                            if(result){

	                            		showmessage('User profile picture  updated.' , 'success'); 
	                     				$("#id_img_personnel").attr("src",BASE_URL + 'assets/profiles/' +result);

	                            }

	                      },
	                      data: formData,
	                      cache: false,
	                      contentType: false,
	                      processData: false
	                  });
				 });




				 $('#btn_upload_e_signature').on('click',function(){


           		  var formData = new FormData($('#form_attachments')[0]);

	                  $.ajax({
	                      url: BASE_URL + 'personnel/uploaesingature',
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
	                              info['employee_id'] = $('#textbox_employee_id').val();
	                              info['attachments'] = attachments;

	                              var result = postdata(BASE_URL + 'personnel/saveesignature' , info);


	                            if(result){

	                            showmessage('User e-signature  updated.' , 'success'); 	
	                     		$("#_e_sig_status").html("E-signature added");
	                     		$("#_e_sig_status").css("color" , "green");

	                           }

	                      },
	                      data: formData,
	                      cache: false,
	                      contentType: false,
	                      processData: false
	                  });

				 });


	             $('#btn_save_employees').on('click',function(){
	             		info={};

	             		info['date_started'] = '';
		                info['date_ended'] = '';

	             		var m_initial = $('#textbox_middlename').val();


	             		if($('#textbox_id_no').val() == ''){
	             			showmessage('ID NO. is required' , 'danger');
	             			return false;
	             		}


	             		if($('#text_box_device_id').val() == ''){
	             			showmessage('Device ID is required' , 'danger');
	             			return false;
	             		}


	             		if($('#textbox_lastname').val() == ''){
	             			showmessage('Lastname required' , 'danger');
	             			return false;
	             		}

	             		if($('#textbox_firstname').val() == ''){
	             			showmessage('Firstname required' , 'danger');
	             			return false;
	             		}	             		

	             		if($('#textbox_middlename').val() == ''){
	             			showmessage('Midlle name required' , 'danger');
	             			return false;
	             		}


	             		if($('#textbox_username').val() == ''){
	             			showmessage('Please create username.' , 'danger');
	             			return false;
	             		}



	             		info['employee_id'] = $('#textbox_employee_id').val();
	             		info['id_number'] = $('#textbox_id_no').val();
	             		info['biometric_id'] = $('#text_box_device_id').val() ? $('#text_box_device_id').val() : ''; 
	             		info['gender'] = $('#dropdown_gender').val() ? $('#dropdown_gender').val() : ''; 
	             		info['employment_type'] = $('#dropdown_employment_type').val() ? $('#dropdown_employment_type').val() : ''; 


	             		info['birthday'] = $('#jqxbirthday').val();
	             		info['daily_rate'] = $('#numericInput').val() ? $('#numericInput').val() : 0; 

		                var selection = $("#jqxemployement_date").jqxDateTimeInput('getRange');
		                if (selection.from != null) {

		                    var sdate = selection.from.toLocaleDateString();
		                    var edate = selection.to.toLocaleDateString();

		                  info['date_started'] = sdate;
		                  info['date_ended'] = edate;

		                }



	             		info['employment_type_date'] = sdate + ' - '  + edate;
	             		info['status'] = $('#dropdown_status').val() ? $('#dropdown_status').val() : ''; 
	             		info['l_name'] = $('#textbox_lastname').val() ? $('#textbox_lastname').val() : '';
	             		info['m_name'] = $('#textbox_middlename').val() ? $('#textbox_middlename').val() : '';
	             		info['firstname'] = $('#textbox_firstname').val() ? $('#textbox_firstname').val() : '';
	             		info['f_name'] = $('#textbox_lastname').val() + ', ' + $('#textbox_firstname').val()  + ' ' +  m_initial.charAt(0);
	             		info['area_id'] = $('#dropdown_area').val() ? $('#dropdown_area').val() : '';
	             		info['position_id'] = $('#dropdown_position').val() ? $('#dropdown_position').val() : '';
	             		info['address_1'] = $('#textbox_home_address').val() ? $('#textbox_home_address').val() : '';
	             		info['email_1'] = $('#textbox_personal_email').val() ? $('#textbox_personal_email').val() : '';
	             		info['email_2'] = $('#textbox_company_email').val() ? $('#textbox_company_email').val() : '';
	             		info['contact_1'] = $('#textbox_mobile_number').val() ? $('#textbox_mobile_number').val() : '';
	             		info['tin_number'] = $('#textbox_tin_number').val() ? $('#textbox_tin_number').val() : '';
	             		info['sss_number'] = $('#textbox_sss_number').val() ? $('#textbox_sss_number').val() : '';
						// info['isfocal']	= $(


	             		if($('#input_is_head').prop('checked')){
	             			info['is_head'] = 1;
	             		}else{
	             			info['is_head'] = 0;
	             		}

						if ( $("#isfocal").prop('checked') ){
							info['isfocal']	= 1;
						} else {
							info['isfocal']	= 0;
						}
	
	             		info['user_id'] = $('#text_box_user_id').val() ? $('#text_box_user_id').val() : '';
	             		info['username'] = $('#textbox_username').val() ? $('#textbox_username').val() : '';


	             		info['new_password'] = $('#textbox_new_password').val() ? $('#textbox_new_password').val() : '';
	             		info['confirm_password'] = $('#textbox_confirm_password').val() ? $('#textbox_confirm_password').val() : '';

	             		info['usertype'] = $('#dropdown_levels').val() ? $('#dropdown_levels').val() : '';

							var selection = $("#treeGrid").jqxTreeGrid('getSelection');


							if(selection.length <= 0){
								showmessage('Please select offices/division' , 'danger');
								return false;
							}


							for (var i = 0; i < selection.length; i++) {

							  info['table_name'] = selection[i].db_table;
					          info['master_id'] = selection[i].master_id;
					          info['parent_id'] = selection[i].parentid;

							}

								var username = $('#textbox_username').val();
								var password = $('#textbox_new_password').val();
								var new_password = $('#textbox_confirm_password').val();


								if(password != ''){
								  if(password == new_password){
								  	var update = postdata(BASE_URL + "personnel/updateemployees" , info);   	
								  }else{
								    showmessage('Password not match' , 'danger');
								    return false;
								  }
								}else{	
								  var update = postdata(BASE_URL + "personnel/updateemployees" , info);
								}


	             		if(update){

	             			    var rowindex = $('#jqxgridemployees').jqxGrid('getselectedrowindex');
	             			    var active = '';

	             			    $("#jqxgridemployees").jqxGrid('setcellvalue', rowindex , "gender", info['gender']);
	             			    $("#jqxgridemployees").jqxGrid('setcellvalue', rowindex , "employment_type", info['employment_type']);
	             			    $("#jqxgridemployees").jqxGrid('setcellvalue', rowindex , "id_number", info['id_number']);
	             			    $("#jqxgridemployees").jqxGrid('setcellvalue', rowindex , "f_name", info['f_name'].toUpperCase());

	             			    if(info['status'] == 1){
	             			    	active = '<span style="background-color:#449d44;color:#fff!important;padding:2px;border-radius:2px;">Active</span>';
	             			    }else{
	             			    	active = '<span style="background-color:#d9534f;color:#fff!important;padding:2px;border-radius:2px;">Inactive</span>';
	             			    }

	             			    $("#jqxgridemployees").jqxGrid('setcellvalue', rowindex , "is_active", active);
	             			    $("#jqxgridemployees").jqxGrid('setcellvalue', rowindex , "office_division_name", $('#jqxdropdownbutton').val());

	             			   	 $('#myModal').modal('hide');
	             			   	 showmessage('Employee added/updated.', 'success');

	             		}


	             });






        });  /* end document */






</script>