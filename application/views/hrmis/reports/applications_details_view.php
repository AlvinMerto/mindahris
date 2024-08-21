 
<div id="jqxLoader"></div>  
<div id="jqxPopover" style="display:none;">
      <center>
          <div class="alert bg-gray disabled color-palette" id="warning_msg" >
              <div class="row">

                  <div class="col-md-12">
                        <div class="form-group">
                        <p style="font-size: 9px;" for="device_id" class="col-md-4 control-label">ENTER PASSWORD:</p>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="text_box_password" >
                        </div>
                      </div>
                  </div>

              </div>
          </div>
          <button id="btn_continue_" class="btn btn-xs btn-success"> <i class="fa fa-check-circle-o"></i> Approved & Sign</button>
          <button id="btn_cancel_" class="btn btn-xs btn-danger">Cancel</button>
      </center>
  </div>

<div class="content-wrapper">
         <section class="content-header">
          <h1>
              Applications
          </h1>
          <ol class="breadcrumb">
             <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
          </ol>
       </section>

        <section class="content">
           <div class="row">
             <div class="col-md-12">
               <div class="box" style="margin-bottom: 0px !important;">
                   <div class="box-header with-border">
                      <h3 class="box-title">Form type : <?php echo $type_mode; ?></h3>
                      <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                   </div>
						<div class="box-footer clearfix">
							<a id="btn_print_form_preview" class="btn btn-sm btn-default"><i class="fa fa-print"></i> PRINT PREVIEW</a>
							<!--button type="button"  id="btn_cancel_application" class="btn btn-danger btn-sm pull-right"><i class="fa  fa-close "></i> CANCEL APPLICATION</button-->
							<a href="<?php echo base_url(); ?>reports/applications" class="btn btn-primary  btn-sm pull-left" style="margin-right: 5px;"><i class="fa fa-angle-left"></i> BACK </a>
						</div>
                   <!-- /.box-header -->
                   <div class="box-body">
                      <div class="row">

                         <div class="col-md-12">
							

                                                <div  id="container_ps" style="border:solid 1px #ddd; width: 1000px; display:none; padding:20px; margin:auto; background-color:#f5f5f5;">

                                                    <?php $this->load->view('admin/forms/passlip_view'); ?>

                                                </div>

                                                 <div id="container_paf" style="border:solid 1px #ddd; width: 1000px;display:none; padding:20px; margin:auto; background-color:#f5f5f5;">

                                                    <?php $this->load->view('admin/forms/paf_view'); ?>
                                                   
                                                </div>


                                                <div id="container_leave" style="border:solid 1px #ddd; width: 1000px;display:none; padding:20px;  margin:auto;">
													

                                                  <?php $this->load->view('admin/forms/leave_form_view'); ?>
                                                  <?php $this->load->view('admin/forms/special_form_view'); ?>


                                                </div>

                                                <div id="container_ot" style="border:solid 1px #ddd; width: 100%; display:none; padding:20px;  margin:auto; background-color:#f5f5f5;">

                                                      <?php $this->load->view('admin/forms/ot_form_view'); ?>

                                                </div>
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



<script type="text/javascript">

    var BASE_URL = '<?php echo base_url(); ?>';

    var type_mode = '<?php echo $type_mode; ?>';
	
	var esigallowed = '<?php echo $sig_data[0]->settingvalue; ?>';


    var details = <?php echo json_encode($checkexactinfo); ?>;


    var SES_USERTYPE = '<?php echo $usertype; ?>';
    var ses_biometric_id = '<?php echo $biometric_id; ?>';
    var ses_employee_id = '<?php echo $employee_id; ?>';
    var ses_employment_type = '<?php echo $employment_type; ?>';
    var ses_dbm_sub_pap_id = '<?php echo $dbm_sub_pap_id; ?>';
    var ses_division_id = '<?php echo $division_id; ?>';
    var ses_level_sub_pap_div = '<?php echo $level_sub_pap_div; ?>';
    var ses_is_head = '<?php echo $is_head; ?>';



        $(document).ready(function () {


                  $("#jqxLoader").jqxLoader({ isModal: true, width: 350, height: 60, imagePosition: 'top' });



                   $('#btn_print_form_preview').on('click',function (){

                     var forms  = "";

                      if(type_mode == 'PS'){
                        forms =  $('#container_ps').html();
                      }else if (type_mode == 'PAF'){
                         forms =  $('#container_paf').html();
                      }else if(type_mode == 'LEAVE'){
                          forms = $('#container_leave').html();
                      }else if(type_mode == 'OT'){
                         forms = $('#container_ot').html();
                      }



                      if(type_mode == 'OT'){

                          var newWindow = window.open('', '', 'width=800, height=500'),
                          document = newWindow.document.open(),
                          pageContent =
                              '<!DOCTYPE html>\n' +
                              '<html>\n' +
                              '<head>\n' +
                              '<meta charset="utf-8" />\n' +
                              '<style> @media print{@page {size: Legal landscape; margin-right: 1.5in }} </style>'  +
                              '</head>\n' +
                              '<body style="width: 1344px; height: 816px; margin:auto !important; font-family:calibri;">\n' + forms +  '\n</body>\n</html>';
                          document.write(pageContent);
                          document.close();
                           newWindow.print();


                      }else{

                          var newWindow = window.open('', '', 'width=800, height=500'),
                          document = newWindow.document.open(),
                          pageContent =
                              '<!DOCTYPE html>\n' +
                              '<html>\n' +
                              '<head>\n' +
                              '<meta charset="utf-8" />\n' +
                              '<style> #body table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ border:none !important; font-size:12px !important;  height: 15px !important;margin: 0px !important; } </style>'  +
                              '</head>\n' +
                              '<body style="width: 700px;height: 900px;margin:auto;font-family:calibri;">\n' + forms + '\n</body>\n</html>';
                          document.write(pageContent);
                          document.close();
                          newWindow.print();

                      }

            

                   });    


                   $('#btn_cancel_').on('click',function(){

                     $('#jqxPopover').jqxPopover('close');
                     $('#text_box_password').val('');

                   });


                   $('#btn_cancel_application').on('click',function(){

                      info = {};
                      info['exact_id'] = details[0].c_id;    

                      var canceld = postdata(BASE_URL + 'reports/cancelapplications' , info);

                      if(canceld){
                        showmessage('Cancelled', 'success');
                        location.href = BASE_URL + 'reports/applications';
                      }
        
                   });       


                   $('#btn_continue_').on('click',function(){
						
						// start
						
                        info = {};
                        var value =  $('#text_box_password').val();
                        
                        info['is_hash'] = $('#jqxbtnimport_1').attr('is_hash'); 
                        info['password'] = CryptoJS.MD5(value).toString();
                        info['type'] = type_mode;




                        if(type_mode == 'PS'){

                              info['exact_id']      = details[0].c_id;      
                              info['approval']      = 'division_chief_is_approved';    
                              info['approval_date'] = 'division_date';    

                              var qwstr =  postdata(BASE_URL + 'leaveadministration/updateotsignatory' , info);

                              if(qwstr){
                        
                                $('#jqxPopover').jqxPopover('close');
                                $('#text_box_password').val('');
                                info['description'] = 'approved';

                                info['employee_id'] = ses_employee_id;
                                notifyMe(info);
                                window.location.reload();

                              }


                        }else if (type_mode == 'PAF'){


                          info['exact_id'] = details[0].c_id;      


                           if($('#jqxbtnimport_1').attr('is_str') == 'active'){

                              info['approval'] = 'division_chief_is_approved';    
                              info['approval_date'] = 'division_date';  


                           }else if($('#jqxbtnimport_2').attr('is_str') == 'active'){

                              info['approval'] = 'paf_is_approved';    
                              info['approval_date'] = 'paf_date';  

                           }


                              var qwstr =  postdata(BASE_URL + 'leaveadministration/updateotsignatory' , info);


                              if(qwstr){
                               
                                $('#jqxPopover').jqxPopover('close');
                                $('#text_box_password').val('');

                                info['employee_id'] = ses_employee_id;
                                info['description'] = 'approved';
                                notifyMe(info);

                                window.location.reload();

                              }


                        }else if(type_mode == 'OT'){

                            info['exact_id'] = details[0].checkexact_ot_id;      


                            if($('#jqxbtnimport_1').attr('is_str') == 'active'){

                              info['approval'] = 'div_is_approved';    
                              info['approval_date'] = 'div_date_approved';    


                            }else if($('#jqxbtnimport_2').attr('is_str') == 'active'){


                              info['approval'] = 'act_div_is_approved';    
                              info['approval_date'] = 'act_div_date_approved';




                            }else if ($('#jqxbtnimport_3').attr('is_str') == 'active'){

                              info['approval'] = 'act_div_a_is_approved';    
                              info['approval_date'] = 'act_div_a_date_approved';


                           }


                          var qwstr =  postdata(BASE_URL + 'leaveadministration/updateotsignatory' , info);

                              if(qwstr){
                        
                                $('#jqxPopover').jqxPopover('close');
                                $('#text_box_password').val('');

                                info['employee_id'] = ses_employee_id;
                                info['description'] = 'approved';
                                notifyMe(info);

                                window.location.reload();

                          } 

                     }else if(type_mode == 'LEAVE'){

                       info['exact_id'] = details[0].c_id;  


                           if($('#jqxbtnimport_1').attr('is_str') == 'active'){

                              info['approval'] = 'division_chief_is_approved';    
                              info['approval_date'] = 'division_date';  


                           }else if($('#jqxbtnimport_2').attr('is_str') == 'active'){

                              info['approval'] = 'leave_authorized_is_approved';    
                              info['approval_date'] = 'leave_authorized_date';  

                          }else if($('#jqxbtnimport_3').attr('is_str') == 'active'){

                              info['approval'] = 'hrmd_is_approved';    
                              info['approval_date'] = 'hrmd_date'; 

                          }


                            var qwstr =  postdata(BASE_URL + 'leaveadministration/updateotsignatory' , info);

                            if(qwstr){
                      
                              $('#jqxPopover').jqxPopover('close');
                              $('#text_box_password').val('');

                                info['employee_id'] = ses_employee_id;
                                info['description'] = 'approved';
                                notifyMe(info);

                              window.location.reload();

                            }

                     }
						
						
						// end
						
						// send email 
			/*
				approval:"leave_authorized_is_approved"
				approval_date:"leave_authorized_date"
				exact_id:248
				is_hash:"c0c7c76d30bd3dcaefc96f40275bdc0a"
				password:"cf1c08d06a9c79cedc092ff5b0083a2c"
				type:"LEAVE"
			*/
							// 1.a : compute and save the updated leave credits to employee_leave_credits
							var d = {'exact_id': info['exact_id']};
								performajax(["Leave/update_leavecredits", {a:d}], function(d) {
									if (d == true || d == "true") {
										performajax(["Leave/__sendemail",{s:info}],function(d){
											console.log(d);
										})
									} else {
										alert("error on applications_details_view.php line 380");
									}
								})
							// end 1.a
							/*
							performajax(["Leave/__sendemail",{a:info}], function() {
								
							});
							*/
						// end send email 
                   });


            if(type_mode == 'PS'){

                $("#container_ps").show();
                $('#print_passlip_view').show();


                $('#input_reason').html(details[0].reasons);
                var ref_no_hash = CryptoJS.MD5('PS00' + details[0].c_id).toString();



                var is_hash_1 = ref_no_hash.substring(0, ref_no_hash.length - 29);
                var is_hash_2 = ref_no_hash.substring(32, 28);

                $('#ps_ref_no').html('REF #: PS-' + is_hash_1 + is_hash_2);

                if(details[0].ps_type == 1){
                        $('#check_1').prop('checked' , true);
                        $('#check_2').prop('checked' , false);
                        $('#check_1').attr("checked", "checked");
                        $('#check_2').removeAttr("checked");
                }else{
                        $('#check_1').prop('checked' , false);
                        $('#check_2').prop('checked' , true);
                        $('#check_1').removeAttr("checked");
                        $('#check_2').attr("checked", "checked");                        
                }


                $('#label_time_out').html(details[0].time_out);
                $('#label_time_in').html(details[0].time_in);
                $('#label_guard_name').html(details[0].guard_name);

                $('#ps_date').html(details[0].checkdate);

                  var div_chief_id = details[0].division_chief_id;
                  var div_chief_id_hash = CryptoJS.MD5(div_chief_id.toString()).toString(); 
                 

                   $('#input_position_approved_name').html(details[0].div_position);


                  if(details[0].division_chief_is_approved == 1){
// console.log(details);
                    if(details[0].division_chief_e_signature){
                      $('#cont_es_sig').show();
					  if (esigallowed == 1) {
						$('#ps_div_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].division_chief_e_signature);
					  }
					  $("#approvedps").html("<strong> Approved online: </strong>"+ details[0].checkexact_approval_id+"-"+ details[0].division_chief_id +"");
                    }else{
                      $('#cont_es_sig').hide();
                      $('#ps_div_chief_e_sig').attr('src' , '');
                    }  

                    $('#input_date_approved').html('Date Approved: ' + details[0].new_division_date);

                  }else{
                     $('#cont_es_sig').hide();
                    $('#ps_div_chief_e_sig').attr('src' , '');
                    $('#input_date_approved').html('');

                  }

				
                    if(details[0].e_signature){
                      $('#cont_emp_sig').show();
					  if (esigallowed == 1) {
						$('#ps_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].e_signature);
					  } else {
						$("#ps_e_sig").remove();
						}
                    }else{
                      $('#cont_emp_sig').hide();
                      $('#ps_e_sig').attr('src' , '');
                 
                    }

				// for 
				$("#for_name").html(details[0].leave_auth_by_full_name);
				// $("#for_position").html(details[0]);
				
				// employee 
                $('#input_emp_fullname').html(details[0].employee_full_name)
                $('#input_approved_id').html('<a id="jqxbtnimport_1" is_str=""  is_hash="'+div_chief_id_hash+'" >' + details[0].division_chief_full_name + '</a>')



               $('#jqxbtnimport_1').on('click',function(){

                  if(ses_employee_id == details[0].division_chief_id){

                   $('#jqxPopover').jqxPopover({
                        width: 400,
                        offset: {left: 0, top:0},
                        showArrow: true,
                        showCloseButton: false,
                        isModal: true,
                        selector: $("#jqxbtnimport_1"),
                        title: 'Approve & Sign'
                    });

                  }

              });


                $("#print_paf_view").hide();
                $("#container_paf").hide();
                $("#container_leave").hide();
                $("#container_ot").hide();


            }else if(type_mode == 'PAF'){


                var ref_no_hash = CryptoJS.MD5('PAF00' + details[0].c_id).toString();


                var is_hash_1 = ref_no_hash.substring(0, ref_no_hash.length - 29);
                var is_hash_2 = ref_no_hash.substring(32, 28);

                $('#paf_ref_no').html('REF #: PAF-' + is_hash_1 + is_hash_2);




                var div_chief_id = details[0].division_chief_id;
                    
                var div_chief_id_hash = CryptoJS.MD5(div_chief_id.toString()).toString(); 

                var paf_approved_id = details[0].paf_apprved_by_id;
                var div_approved_chief_id_hash = CryptoJS.MD5(paf_approved_id).toString(); 
             



                $("#print_paf_view").show();
                $("#container_paf").show();  

                $('#input_date_paf').html(details[0].checkdate);
                $('#input_employee_paf').html(details[0].employee_full_name);
                $('#input_justification').html(details[0].reasons);
                $('#input_paf_in').html(details[0].time_in);
                $('#input_paf_out').html(details[0].time_out);


                $('#input_paf_recorded').html(details[0].paf_recorded_by_full_name);
                $('#input_paf_approved').html('<a id="jqxbtnimport_2" is_str=""  is_hash="'+div_approved_chief_id_hash+'" >' + details[0].paf_approved_by_full_name + '</a>');

                $('#input_remarks_paf').html(details[0].remarks);
                $('#input_position').html(details[0].position_name);
                $('#input_division').html(details[0].office_division_name);


                $('#input_division_oic').html('<a id="jqxbtnimport_1" is_str=""  is_hash="'+div_chief_id_hash+'" >' + details[0].division_chief_full_name + '</a>');


                  if(details[0].e_signature){
                      $('#cont_paf_e_sig').show();
					  if (esigallowed == 1) {
						$('#paf_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].e_signature);
					  } else {
						$('#paf_e_sig').remove();
					  }

                  }else{
                    $('#cont_paf_e_sig').hide();
                    $('#paf_e_sig').attr('src' , '');
               
                  }

//console.log(details);
                  if(details[0].division_chief_is_approved == 1){

                    if(details[0].division_chief_e_signature){
                      $('#paf_div_sig').show();
					  if (esigallowed == 1) {
						$('#paf_div_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].division_chief_e_signature);
					  } else {
						 $("#paf_div_chief_e_sig").remove();
					  }
                    }else{
                      $('#paf_div_sig').hide();
                      $('#paf_div_chief_e_sig').attr('src' , '');
                    }  

                    $('#div_input_date_approved').html('Date Approved: ' + details[0].new_division_date);
					
					$('#approvalnumber').html("<strong>Approved online: </strong> "+details[0].checkexact_approval_id+"-"+details[0].division_chief_id);
                  }else{

                      $('#paf_div_sig').hide();
                      $('#paf_div_chief_e_sig').attr('src' , '');
                      $('#div_input_date_approved').html('');
                  }

			// console.log(details);
			
                  if(details[0].paf_is_approved == 1){
				
                    if(details[0].division_chief_e_signature){
						$('#paf_approved_sig').show();
						$("#lastappr").html("<strong>Approved online: </strong>"+details[0].checkexact_approval_id+"-"+details[0].aprroved_by_id+"");
						
						if (esigallowed == 1) {
							$('#paf_approved_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].paf_approved_e_signature);
						} else {
							$("#paf_approved_e_sig").remove();
						}
						
                    }else{
                      $('#paf_approved_sig').hide();
                      $('#paf_approved_e_sig').attr('src' , '');
                    }  

                    $('#div_input_paf_date_approved').html('Date Approved: ' + details[0].new_paf_date);

                  }else{

                      $('#paf_approved_sig').hide();
                      $('#paf_approved_e_sig').attr('src' , '');
                      $('#div_input_paf_date_approved').html('');
                  }



                   $('#jqxbtnimport_1').on('click',function(){

                      $('#jqxbtnimport_1').attr('is_str','active');
                      $('#jqxbtnimport_2').attr('is_str','');

                      if(ses_employee_id == details[0].division_chief_id){

                       $('#jqxPopover').jqxPopover({
                            width: 400,
                            offset: {left: 0, top:0},
                            showArrow: true,
                            showCloseButton: false,
                            isModal: true,
                            selector: $("#jqxbtnimport_1"),
                            title: 'Approve & Sign'
                        });

                      }

                  });




                $('#jqxbtnimport_2').on('click',function(){
                    $('#jqxbtnimport_2').attr('is_str','active');
                    $('#jqxbtnimport_1').attr('is_str','');


                    if(ses_employee_id == details[0].paf_approved_by_id){

                          $('#jqxPopover').jqxPopover({
                              width: 400,
                              offset: {left: 0, top:0},
                              showArrow: true,
                              showCloseButton: false,
                              isModal: true,
                              selector: $("#jqxbtnimport_2"),
                              title: 'Approve & Sign'
                          });

                    }

                });






                $("#container_ps").hide();
                $('#print_passlip_view').hide();
                $('#container_leave').hide();
                $("#container_ot").hide();
          
            }else if(type_mode == 'LEAVE'){

                var div_chief_id = details[0].division_chief_id;
                var div_chief_id_hash = CryptoJS.MD5(div_chief_id.toString()).toString();                 

                var leave_auth_id = details[0].leave_authorized_official_id;
                var leave_auth_id_hash = CryptoJS.MD5(leave_auth_id.toString()).toString();                

                var leave_hrmd_unit_id = details[0].hrmd_approved_id;
                var leave_hrmd_unit_hash = CryptoJS.MD5(leave_hrmd_unit_id.toString()).toString(); 




                if(details[0].leave_id == 1){ /* sick*/

                    $('#others_leave').hide();
                    $('#sick_leave').show();
                    $('#print_leave_view').hide();

                     //$('#container_leave').css('background-color' , 'rgb(119, 154, 171)');
					
					$(".tg").addClass("sickleave_form")

                    $('#leave_full_name').html(details[0].employee_full_name);

                   
                    $('#leave_division_chief_name').html('<a id="jqxbtnimport_1" is_str=""  is_hash="'+div_chief_id_hash+'" >' + details[0].division_chief_full_name + '</a>');
                    $('#leave_authorized_official').html('<a id="jqxbtnimport_2" is_str=""  is_hash="'+leave_auth_id_hash+'" >' + details[0].leave_auth_by_full_name + '</a>');
                    $('#hrmd_unit_name').html('<a id="jqxbtnimport_3" is_str=""  is_hash="'+leave_hrmd_unit_hash+'" >' + details[0].hrmd_approved_full_name + '</a>');

                    $('#input_specify_sick_leave').html(details[0].reasons);
                    $('#leave_office_division').html(details[0].office_division_name);
                    $('#leave_position_name').html(details[0].position_name);
                    $('#leave_date_filling').html(details[0].date_added);
                    $('#input_no_of_days').html(details[0].no_days_applied);
                    $('#leave_inclusive_date').html(details[0].checkdate);
                    $('#display_leave_credits_as_of').html(details[0].date_added);




                      var info = {};


                      info['employee_id'] = details[0].employee_id;
                      info['edate'] = details[0].date_added;

                      var get_ledger = postdata(BASE_URL + "reports/generateledger" , info);


                      if(get_ledger){

       

                        $('#display_vacation_balance').html(get_ledger.vacation_leave_remaining_balance);
                        $('#display_vacation_leave_credits').html(get_ledger.vacation_leave_remaining_balance);




                        $('#display_vacation_less_leave').html('0.000');

                        if(details[0].leave_is_halfday == 1){  
                           no_days_applied = 0.5;
                        }else{              
                           no_days_applied = details[0].no_days_applied;
                        }

                         $('#display_sick_less_leave').html(parseFloat(no_days_applied).toFixed(3));

                        var tt = parseFloat(get_ledger.sick_remaining_balance) + parseFloat(no_days_applied)
                        $('#display_sick_leave_leave_credits').html(tt.toFixed(3));
                       

                        $('#display_sick_balance').html(get_ledger.sick_remaining_balance);



                      }


                      $('#sl_check_form').prop('checked' , true);




                        if(details[0].leave_application_details == 1){
                                $('#sl_out').prop('checked' , true);
                                $('#sl_in_hos').prop('checked' , false);
                                $('#sl_out').attr("checked", "checked");
                                $('#sl_in_hos').removeAttr("checked");

                        }else{
                                $('#sl_out').prop('checked' , false);
                                $('#sl_in_hos').prop('checked' , true);
                                $('#sl_in_hos').attr("checked", "checked");
                                $('#sl_out').removeAttr("checked");                               
                        }



                        if(details[0].e_signature){
                            $('#leave_applicant_sig').show();
                            $('#leave_applicant_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].e_signature);

                        }else{
                          $('#leave_applicant_sig').hide();
                          $('#leave_applicant_e_sig').attr('src' , ''); 
                        }



                        if(details[0].division_chief_is_approved == 1){

                          if(details[0].division_chief_e_signature){
                            $('#leave_div_sig').show();
                            $('#leave_div_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].division_chief_e_signature);

                          }else{
                            $('#leave_div_sig').hide();
                            $('#leave_div_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_div_input_date_approved').html('Date Approved: ' + details[0].new_division_date);

                        }else{

                            $('#leave_div_sig').hide();
                            $('#leave_div_chief_e_sig').attr('src' , '');
                            $('#leave_div_input_date_approved').html('');
                        }



                        if(details[0].leave_authorized_is_approved == 1){

                          if(details[0].leave_auth_e_signature){
                            $('#leave_auth_sig').show();
                            $('#leave_auth_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].leave_auth_e_signature);

                          }else{
                            $('#leave_auth_sig').hide();
                            $('#leave_auth_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_auth_input_date_approved').html('Date Approved: ' + details[0].new_leave_auth_date);

                        }else{

                            $('#leave_auth_sig').hide();
                            $('#leave_auth_chief_e_sig').attr('src' , '');
                            $('#leave_auth_input_date_approved').html('');
                        }



                        if(details[0].hrmd_is_approved == 1){

                          if(details[0].leave_hrmd_e_signature){
                            $('#leave_hrmd_sig').show();
                            $('#leave_hrmd_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].leave_hrmd_e_signature);

                          }else{
                            $('#leave_hrmd_sig').hide();
                            $('#leave_hrmd_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_hrmd_input_date_approved').html('Date Approved: ' + details[0].new_leave_hrmd_date);

                        }else{

                            $('#leave_hrmd_sig').hide();
                            $('#leave_hrmd_chief_e_sig').attr('src' , '');
                            $('#leave_auth_input_date_approved').html('');
                        }




                         $('#jqxbtnimport_1').on('click',function(){

                            $('#jqxbtnimport_1').attr('is_str','active');
                            $('#jqxbtnimport_2').attr('is_str','');
                            $('#jqxbtnimport_3').attr('is_str','');

                            if(ses_employee_id == details[0].division_chief_id){

                             $('#jqxPopover').jqxPopover({
                                  width: 400,
                                  offset: {left: 0, top:0},
                                  showArrow: true,
                                  showCloseButton: false,
                                  isModal: true,
                                  selector: $("#jqxbtnimport_1"),
                                  title: 'Approve & Sign'
                              });

                            }
                        });



                      $('#jqxbtnimport_2').on('click',function(){
                          $('#jqxbtnimport_2').attr('is_str','active');
                          $('#jqxbtnimport_1').attr('is_str','');
                          $('#jqxbtnimport_3').attr('is_str','');


                          if(ses_employee_id == details[0].leave_authorized_official_id){

                                $('#jqxPopover').jqxPopover({
                                    width: 400,
                                    offset: {left: 0, top:0},
                                    showArrow: true,
                                    showCloseButton: false,
                                    isModal: true,
                                    selector: $("#jqxbtnimport_2"),
                                    title: 'Approve & Sign'
                                });

                          }

                      });



                    $('#jqxbtnimport_3').on('click',function(){
                          $('#jqxbtnimport_3').attr('is_str','active');
                          $('#jqxbtnimport_1').attr('is_str','');
                          $('#jqxbtnimport_2').attr('is_str','');


                          if(ses_employee_id == details[0].hrmd_approved_id){

                                $('#jqxPopover').jqxPopover({
                                    width: 400,
                                    offset: {left: 0, top:0},
                                    showArrow: true,
                                    showCloseButton: false,
                                    isModal: true,
                                    selector: $("#jqxbtnimport_3"),
                                    title: 'Approve & Sign'
                                });

                          }

                      });



                    $('#print_leave_view').show();
                    

                }else if (details[0].leave_id == 2 || details[0].leave_id == 6){ /* vacation*/ /* force*/

                //    $('#container_leave').css('background-color', 'rgb(181, 115, 151)');
					  $('#container_leave').css('border' , '5px solid rgb(181, 133, 159)');

                    $('#leave_full_name').html(details[0].employee_full_name);
                    $('#leave_office_division').html(details[0].office_division_name);
                    $('#leave_position_name').html(details[0].position_name);
                    $('#leave_date_filling').html(details[0].date_added);

                    $('#leave_division_chief_name').html('<a id="jqxbtnimport_1" is_str=""  is_hash="'+div_chief_id_hash+'" >' + details[0].division_chief_full_name + '</a>');
                    $('#leave_authorized_official').html('<a id="jqxbtnimport_2" is_str=""  is_hash="'+leave_auth_id_hash+'" >' + details[0].leave_auth_by_full_name + '</a>');
                    $('#hrmd_unit_name').html('<a id="jqxbtnimport_3" is_str=""  is_hash="'+leave_hrmd_unit_hash+'" >' + details[0].hrmd_approved_full_name + '</a>');

                    $('#input_no_of_days').html(details[0].no_days_applied);
                    $('#leave_inclusive_date').html(details[0].checkdate);
                    $('#display_leave_credits_as_of').html(details[0].date_added);






                      var info = {};


                      info['employee_id'] = details[0].employee_id;
                      info['edate'] = details[0].date_added;

                      var get_ledger = postdata(BASE_URL + "reports/generateledger" , info);


                      if(get_ledger){


                        
                        if(details[0].leave_is_halfday == 1){  
                           no_days_applied = 0.5;
                        }else{              
                           no_days_applied = details[0].no_days_applied;
                        }

                        $('#display_vacation_balance').html(get_ledger.vacation_leave_remaining_balance);

                        var vacation_credits = parseFloat(get_ledger.vacation_leave_remaining_balance) + parseFloat(no_days_applied);
                        $('#display_vacation_leave_credits').html(vacation_credits.toFixed(3));

                        var vacation_less_leave = parseFloat(no_days_applied) * 1.000;
                        

                        $('#display_vacation_less_leave').html(vacation_less_leave.toFixed(3));


                        $('#display_sick_leave_leave_credits').html(get_ledger.sick_remaining_balance);
                        $('#display_sick_balance').html(get_ledger.sick_remaining_balance);


                        var total_credits_as_of = parseFloat(get_ledger.vacation_leave_remaining_balance) + parseFloat(no_days_applied) + parseFloat(get_ledger.sick_remaining_balance);
                        var total_less_leave = parseFloat(vacation_less_leave) + parseFloat(0);
                        var total_leave_balance = parseFloat(get_ledger.vacation_leave_remaining_balance) + parseFloat(get_ledger.sick_remaining_balance);




                       $('#display_total_leave_credits').html(total_credits_as_of.toFixed(3));
                       $('#display_total_less_leave').html(total_less_leave.toFixed(3));
                       $('#display_total_balance').html(total_leave_balance.toFixed(3));

                      }
 



                     $('#vl_check_form').prop('checked' , true);
                     $('#leave_maternity').prop('checked' , false);
                     $('#leave_others').prop('checked' , false);


                     if(details[0].leave_application_details == 1){

                        $('#vl_ph').prop('checked', true);
                        $('#vl_abroad').prop('checked', false);
                        $('#vl_ph').attr("checked", "checked");
                        $('#vl_abroad').removeAttr("checked");

                     }else{
                        $('#vl_ph').prop('checked', false);
                        $('#vl_abroad').prop('checked', true);
                        $('#vl_abroad').attr("checked", "checked");
                        $('#vl_ph').removeAttr("checked");
                     }


                       if(details[0].leave_id == 6){ /* if force */

                        $('#leave_others').prop('checked', true);
                        $('#leave_others').attr("checked", "checked");

                        $('#leave_maternity').prop('checked', false);
                        $('#leave_maternity').removeAttr("checked");

                        $('#vl_check_form').prop('checked', false);
                        $('#vl_check_form').removeAttr("checked");

                        $('#vl_ph').prop('checked', false);
                        $('#vl_ph').removeAttr("");

                        $('#vl_abroad').removeAttr("");
                        $('#vl_abroad').prop('checked', false);

                        $('#input_specify_vacation_leave').html('FL - ' + details[0].reasons);

                       }else{
                         $('#input_specify_vacation_leave').html(details[0].reasons);
                       }



                      if(details[0].e_signature){
                          $('#leave_applicant_sig').show();
                          $('#leave_applicant_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].e_signature);

                      }else{
                        $('#leave_applicant_sig').hide();
                        $('#leave_applicant_e_sig').attr('src' , ''); 
                      }




                     


                    $('#others_leave').show();
                    $('#sick_leave').hide();




                        if(details[0].division_chief_is_approved == 1){

                          if(details[0].division_chief_e_signature){
                            $('#leave_div_sig').show();
                            $('#leave_div_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].division_chief_e_signature);

                          }else{
                            $('#leave_div_sig').hide();
                            $('#leave_div_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_div_input_date_approved').html('Date Approved: ' + details[0].new_division_date);

                        }else{

                            $('#leave_div_sig').hide();
                            $('#leave_div_chief_e_sig').attr('src' , '');
                            $('#leave_div_input_date_approved').html('');
                        }



                        if(details[0].leave_authorized_is_approved == 1){

                          if(details[0].leave_authorized_official_id){
                            $('#leave_auth_sig').show();
                            $('#leave_auth_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].leave_auth_e_signature);

                          }else{
                            $('#leave_auth_sig').hide();
                            $('#leave_auth_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_auth_input_date_approved').html('Date Approved: ' + details[0].new_leave_auth_date);

                        }else{

                            $('#leave_auth_sig').hide();
                            $('#leave_auth_chief_e_sig').attr('src' , '');
                            $('#leave_auth_input_date_approved').html('');
                        }



                        if(details[0].hrmd_is_approved == 1){

                          if(details[0].leave_hrmd_e_signature){
                            $('#leave_hrmd_sig').show();
                            $('#leave_hrmd_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].leave_hrmd_e_signature);

                          }else{
                            $('#leave_hrmd_sig').hide();
                            $('#leave_hrmd_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_hrmd_input_date_approved').html('Date Approved: ' + details[0].new_leave_hrmd_date);

                        }else{

                            $('#leave_hrmd_sig').hide();
                            $('#leave_hrmd_chief_e_sig').attr('src' , '');
                            $('#leave_hrmd_input_date_approved').html('');
                        }




                         $('#jqxbtnimport_1').on('click',function(){

                            $('#jqxbtnimport_1').attr('is_str','active');
                            $('#jqxbtnimport_2').attr('is_str','');
                            $('#jqxbtnimport_3').attr('is_str','');

                            if(ses_employee_id == details[0].division_chief_id){

                             $('#jqxPopover').jqxPopover({
                                  width: 400,
                                  offset: {left: 0, top:0},
                                  showArrow: true,
                                  showCloseButton: false,
                                  isModal: true,
                                  selector: $("#jqxbtnimport_1"),
                                  title: 'Approve & Sign'
                              });

                            }
                        });


                      $('#jqxbtnimport_2').on('click',function(){
                          $('#jqxbtnimport_2').attr('is_str','active');
                          $('#jqxbtnimport_1').attr('is_str','');
                          $('#jqxbtnimport_3').attr('is_str','');


                          if(ses_employee_id == details[0].leave_authorized_official_id){

                                $('#jqxPopover').jqxPopover({
                                    width: 400,
                                    offset: {left: 0, top:0},
                                    showArrow: true,
                                    showCloseButton: false,
                                    isModal: true,
                                    selector: $("#jqxbtnimport_2"),
                                    title: 'Approve & Sign'
                                });

                          }

                      });                      


                    $('#jqxbtnimport_3').on('click',function(){
                          $('#jqxbtnimport_3').attr('is_str','active');
                          $('#jqxbtnimport_1').attr('is_str','');
                          $('#jqxbtnimport_2').attr('is_str','');


                          if(ses_employee_id == details[0].hrmd_approved_id){

                                $('#jqxPopover').jqxPopover({
                                    width: 400,
                                    offset: {left: 0, top:0},
                                    showArrow: true,
                                    showCloseButton: false,
                                    isModal: true,
                                    selector: $("#jqxbtnimport_3"),
                                    title: 'Approve & Sign'
                                });

                          }

                      });






                    $('#print_leave_view').show();



                 }else if (details[0].leave_id == 3) { /* maternity */


                    $('#leave_full_name').html(details[0].employee_full_name);
                    $('#leave_office_division').html(details[0].office_division_name);
                    $('#leave_position_name').html(details[0].position_name);
                    $('#leave_date_filling').html(details[0].date_added);

                     $('#leave_division_chief_name').html('<a href="">' + details[0].division_chief_full_name + '</a>');
                    $('#leave_authorized_official').html('<a href="">' + details[0].leave_auth_by_full_name + '</a>');

                     $('#input_no_of_days').html(details[0].no_days_applied);


                     $('#vl_check_form').prop('checked' , false);
                     $('#leave_maternity').prop('checked' , true);
                     $('#leave_others').prop('checked' , false);


                     if(details[0].leave_application_details == 1){

                        $('#vl_ph').prop('checked', true);
                        $('#vl_abroad').prop('checked', false);

                     }else{
                        $('#vl_ph').prop('checked', false);
                        $('#vl_abroad').prop('checked', true);
                     }

                     $('#input_specify_vacation_leave').html(details[0].reasons);



                    $('#others_leave').show();
                    $('#sick_leave').hide();

                        if(details[0].division_chief_is_approved == 1){

                          if(details[0].division_chief_e_signature){
                            $('#leave_div_sig').show();
                            $('#leave_div_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].division_chief_e_signature);

                          }else{
                            $('#leave_div_sig').hide();
                            $('#leave_div_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_div_input_date_approved').html('Date Approved: ' + details[0].new_division_date);

                        }else{

                            $('#leave_div_sig').hide();
                            $('#leave_div_chief_e_sig').attr('src' , '');
                            $('#leave_div_input_date_approved').html('');
                        }



                        if(details[0].leave_authorized_is_approved == 1){

                          if(details[0].leave_authorized_official_id){
                            $('#leave_auth_sig').show();
                            $('#leave_auth_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].leave_auth_e_signature);

                          }else{
                            $('#leave_auth_sig').hide();
                            $('#leave_auth_chief_e_sig').attr('src' , '');
                          }  

                          $('#leave_auth_input_date_approved').html('Date Approved: ' + details[0].new_leave_auth_date);

                        }else{

                            $('#leave_auth_sig').hide();
                            $('#leave_auth_chief_e_sig').attr('src' , '');
                            $('#leave_auth_input_date_approved').html('');
                        }



                         $('#jqxbtnimport_1').on('click',function(){

                            $('#jqxbtnimport_1').attr('is_str','active');
                            $('#jqxbtnimport_2').attr('is_str','');

                            if(ses_employee_id == details[0].division_chief_id){

                             $('#jqxPopover').jqxPopover({
                                  width: 400,
                                  offset: {left: 0, top:0},
                                  showArrow: true,
                                  showCloseButton: false,
                                  isModal: true,
                                  selector: $("#jqxbtnimport_1"),
                                  title: 'Approve & Sign'
                              });

                            }
                        });


                      $('#jqxbtnimport_2').on('click',function(){
                          $('#jqxbtnimport_2').attr('is_str','active');
                          $('#jqxbtnimport_1').attr('is_str','');


                          if(ses_employee_id == details[0].leave_authorized_official_id){

                                $('#jqxPopover').jqxPopover({
                                    width: 400,
                                    offset: {left: 0, top:0},
                                    showArrow: true,
                                    showCloseButton: false,
                                    isModal: true,
                                    selector: $("#jqxbtnimport_2"),
                                    title: 'Approve & Sign'
                                });

                          }

                      });






                    $('#print_leave_view').show();


                }else if (details[0].leave_id == 4) { /* special */

                    $('#container_leave').css('background-color' , '#a7a20a');
                    $('#display_special_last_name').html(details[0].l_name);
                    $('#display_special_first_name').html(details[0].firstname);
                    $('#display_special_m_initial').html(details[0].m_name);

                    $('#display_division').html(details[0].office_division_name);
                    $('#display_position').html(details[0].position_name);
                    $('#input_date_of_filling').html(details[0].date_added);
                    $('#spl_checkdate').html(details[0].checkdate);


                     var value = true;

                  $('#p_check_milestone').attr('checked', value == details[0].spl_personal_milestone);
                  $('#f_check_obligations').attr('checked', value == details[0].spl_filial_obligations);
                  $('#p_check_transactions').attr('checked', value == details[0].spl_personal_transaction);
                  $('#p_check_obligations').attr('checked', value == details[0].spl_parental_obligations);
                  $('#d_check_emergencies').attr('checked', value == details[0].spl_domestic_emergencies);
                  $('#c_check_accident').attr('checked', value == details[0].spl_calamity_acc);



                    $('#spl_no_days').html(details[0].no_days_applied);
                    $('#spl_division_chief').html('<a id="jqxbtnimport_1" is_str=""  is_hash="'+div_chief_id_hash+'" >' + details[0].division_chief_full_name + '</a>');
                    $('#spl_division_chief_position').html(details[0].div_position);
                    $('#spl_authorized_official').html('<a id="jqxbtnimport_2" is_str=""  is_hash="'+leave_auth_id_hash+'" >' + details[0].leave_auth_by_full_name + '</a>');
                    $('#spl_hrmd_name').html('<a id="jqxbtnimport_3" is_str=""  is_hash="'+leave_hrmd_unit_hash+'" >' + details[0].hrmd_approved_full_name + '</a>');





                     $('#jqxbtnimport_1').on('click',function(){

                        $('#jqxbtnimport_1').attr('is_str','active');
                        $('#jqxbtnimport_2').attr('is_str','');
                        $('#jqxbtnimport_3').attr('is_str','');

                        if(ses_employee_id == details[0].division_chief_id){

                         $('#jqxPopover').jqxPopover({
                              width: 400,
                              offset: {left: 0, top:0},
                              showArrow: true,
                              showCloseButton: false,
                              isModal: true,
                              selector: $("#jqxbtnimport_1"),
                              title: 'Approve & Sign'
                          });

                        }
                    });



                  $('#jqxbtnimport_2').on('click',function(){
                      $('#jqxbtnimport_2').attr('is_str','active');
                      $('#jqxbtnimport_1').attr('is_str','');
                      $('#jqxbtnimport_3').attr('is_str','');


                      if(ses_employee_id == details[0].leave_authorized_official_id){

                            $('#jqxPopover').jqxPopover({
                                width: 400,
                                offset: {left: 0, top:0},
                                showArrow: true,
                                showCloseButton: false,
                                isModal: true,
                                selector: $("#jqxbtnimport_2"),
                                title: 'Approve & Sign'
                            });

                      }

                  });



                  $('#jqxbtnimport_3').on('click',function(){
                      $('#jqxbtnimport_3').attr('is_str','active');
                      $('#jqxbtnimport_1').attr('is_str','');
                      $('#jqxbtnimport_2').attr('is_str','');


                      if(ses_employee_id == details[0].hrmd_approved_id){

                            $('#jqxPopover').jqxPopover({
                                width: 400,
                                offset: {left: 0, top:0},
                                showArrow: true,
                                showCloseButton: false,
                                isModal: true,
                                selector: $("#jqxbtnimport_3"),
                                title: 'Approve & Sign'
                            });

                      }

                  });




                     var info = {};

                      info['employee_id'] = details[0].employee_id;
                      info['edate'] = details[0].date_added;

                      var get_ledger = postdata(BASE_URL + "reports/generateledger" , info);

                      if(get_ledger){
                        var special_remaing_balance = get_ledger.special_remaining_balance;
      

                        if(special_remaing_balance == 2){

                          $('#check_first').attr('checked' , 'checked');
                          $('#check_second').removeAttr('checked');
                          $('#check_third').removeAttr('checked');

                        }else if (special_remaing_balance == 1){
                          $('#check_first').attr('checked','checked');
                          $('#check_second').attr('checked','checked');
                          $('#check_third').removeAttr('checked');
                        }else{
                           $('#check_first').attr('checked' , 'checked');
                           $('#check_second').attr('checked' , 'checked');
                           $('#check_third').attr('checked' , 'checked');
                        }

                      }





                    if(details[0].e_signature){
                        $('#applicant_signature').show();
                        $('#applicant_signature_img').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].e_signature);

                    }else{
                      $('#applicant_signature').hide();
                      $('#applicant_signature_img').attr('src' , '');
                 
                    }



                    


                       if(details[0].division_chief_is_approved == 1){



                          if(details[0].division_chief_e_signature){
                            $('#spl_div_sig').show();
                            $('#spl_div_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].division_chief_e_signature);

                          }else{
                            $('#spl_div_sig').hide();
                            $('#spl_div_chief_e_sig').attr('src' , '');
                          }  

                          $('#spl_div_input_date_approved').html('Date Approved: ' + details[0].new_division_date);

                        }else{

                            $('#spl_div_sig').hide();
                            $('#spl_div_chief_e_sig').attr('src' , '');
                            $('#spl_div_input_date_approved').html('');
                        }


                        if(details[0].leave_authorized_is_approved == 1){

                          if(details[0].leave_authorized_official_id){
                            $('#spl_auth_sig').show();
                            $('#spl_auth_chief_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].leave_auth_e_signature);

                          }else{
                            $('#spl_auth_sig').hide();
                            $('#spl_auth_chief_e_sig').attr('src' , '');
                          }  

                          $('#spl_auth_input_date_approved').html('Date Approved: ' + details[0].new_leave_auth_date);

                        }else{


                            $('#spl_auth_sig').hide();
                            $('#spl_auth_chief_e_sig').attr('src' , '');
                            $('#spl_auth_input_date_approved').html('');
                        }


                        if(details[0].hrmd_is_approved == 1){

                          if(details[0].leave_hrmd_e_signature){
                            $('#hrmd_signature').show();
                            $('#hrmd_signature_img').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].leave_hrmd_e_signature);

                          }else{
                            $('#hrmd_signature').hide();
                            $('#hrmd_signature_img').attr('src' , '');
                          }  

                          $('#spl_hrmd_date_approved').html('Date Approved: ' + details[0].new_leave_hrmd_date);

                        }else{

                            $('#hrmd_signature').hide();
                            $('#hrmd_signature_img').attr('src' , '');
                            $('#spl_hrmd_date_approved').html('');
                        }



                     $('#print_leave_view').hide();
                     $('#print_spc_leave_view').show();

                }




                $("#container_leave").show();
                $("#container_ps").hide();
                $("#container_paf").hide();
                $("#container_ot").hide();

            }else if (type_mode == 'OT'){

                  info = {};
                  info['employee_id'] = details[0].employee_id;
                  info['sdate']  =  details[0].ot_checkdate;
                  info['edate'] =  details[0].ot_checkdate;
                  var ot_actual_data = postdata(BASE_URL + 'reports/generatedtrs_copy',info);

                  $('#actual_time_inout').html(ot_actual_data.ot_actual_time);


                  $('#ot_name_employee').html(details[0].employee_full_name);
                  $('#ot_division_name').html(details[0].office_division_name);

                   $('#ot_task_to_be_done').html(details[0].ot_task_done);
                   $('#ot_requested_time_inout').html(details[0].new_requested_time_in + ' - ' + details[0].new_requested_time_out);

                   $('#ot_reasons_if_rw').html(details[0].ot_reasons_if_rw);
                   $('#ot_comments_remarks').html(details[0].ot_remarks);


                   if(details[0].is_ot_type == 1){
                      $('#ot_rw_select').html('X');
                      $('#ot_st_select').html('');
                   }else{
                      $('#ot_st_select').html('X');
                      $('#ot_rw_select').html('');
                   }


                   $('#ot_date_overtime').html(details[0].new_ot_checkdate);



                    var div_chief_id = details[0].div_chief_id;
						
					if (div_chief_id != 0) {
						var div_chief_id_hash = CryptoJS.MD5(div_chief_id.toString()).toString(); 

					   $('#ot_recommend_name').html('<a href="">' + details[0].division_chief_full_name + '</a>');
					   $('#ot_recommending_name').html('<a id="jqxbtnimport_1"  is_str=""  is_hash="'+div_chief_id_hash+'"  href="#">' + details[0].division_chief_full_name + '</a>');
					   $('#ot_recommending_position_name').html(details[0].div_position);
					}

                    var act_div_chief_id = details[0].act_div_chief_id;
				   
					if (act_div_chief_id != 0) {	
					   var act_div_chief_id_hash = CryptoJS.MD5(act_div_chief_id.toString()).toString();


					  $('#ot_r_approved_by_name').html('<a id="jqxbtnimport_2" is_str="" is_hash="'+act_div_chief_id_hash+'" href="#">' + details[0].ot_approved_name + '</a>');
					  $('#ot_a_approved_by_name').html('<a id="jqxbtnimport_3" is_str="" is_hash="'+act_div_chief_id_hash+'" href="#">' + details[0].ot_approved_name + '</a>');
					  $('#ot_r_position_name').html(details[0].act_div_position);
					  $('#ot_a_position_name').html(details[0].act_div_position);
					}

                  if(details[0].div_is_approved == 1){

                    if(details[0].division_chief_e_signature && div_chief_id != 0){
                       $('#cont_e_sig').show();
					   if (esigallowed == 1) {
						$('#recommending_approval_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].division_chief_e_signature);
					   } else {
						$('#recommending_approval_e_sig').remove();
					   }
					   $("#recommapprove").html("Approved online: "+details[0].checkexact_ot_id+"-"+details[0].div_chief_id);
                    }else{

                      $('#cont_e_sig').hide();
                      $('#recommending_approval_e_sig').attr('src' , '');
                    }

                    $('#ot_recommending_date_approved').html('Date Approved: ' + details[0].new_ot_recommending_date);
                   

                  }else{
                    $('#cont_e_sig').hide();
                    $('#recommending_approval_e_sig').attr('src' , '');
                    $('#ot_recommending_date_approved').html('');

                  }



                  if(details[0].act_div_is_approved == 1){

                    if(details[0].act_division_chief_e_signature && act_div_chief_id != 0){
                      $('#a_cont_e_sig').show();
					  if (esigallowed == 1) {
						$('#act_approval_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].act_division_chief_e_signature);
					  } else {
						$('#act_approval_e_sig').remove();
					  }
					  $("#reqtimeappr").html("Approved online:"+details[0].checkexact_ot_id+"-"+details[0].act_div_chief_id);
                    }else{
                      $('#a_cont_e_sig').hide();
                      $('#act_approval_e_sig').attr('src' , '');
                    }  

                     $('#ot_act_1_date_approved').html('Date Approved: ' + details[0].new_ot_act1_date);
                  }else{
                     $('#a_cont_e_sig').hide();
                     $('#act_approval_e_sig').attr('src' , '');
                     $('#ot_act_1_date_approved').html('');

                  }



                   if(details[0].act_div_a_is_approved == 1){

                    if(details[0].act_division_chief_e_signature){
                      $('#a_a_cont_e_sig').show();
					  if (esigallowed == 1) {
						$('#act_a_approval_e_sig').attr('src' , BASE_URL + 'assets/esignatures/' + details[0].act_division_chief_e_signature);
					  } else {
						$('#act_a_approval_e_sig').remove();
					  }
					  $("#acttimeappr").html("Approved online:"+details[0].checkexact_ot_id+"-"+details[0].act_div_chief_id);
                    }else{
                      $('#a_a_cont_e_sig').hide();
                      $('#act_a_approval_e_sig').attr('src' , '');
                    }  

                      $('#ot_act_2_date_approved').html('Date Approved: ' + details[0].new_ot_act2_date);
                  }else{
                     $('#a_a_cont_e_sig').hide();
                    $('#act_a_approval_e_sig').attr('src' , '');
                    $('#ot_act_2_date_approved').html('');

                  }




               $('#jqxbtnimport_1').on('click',function(){

                  $('#jqxbtnimport_1').attr('is_str','active');
                  $('#jqxbtnimport_2').attr('is_str','');
                  $('#jqxbtnimport_3').attr('is_str','');


                  if(ses_employee_id == details[0].div_chief_id){

                   $('#jqxPopover').jqxPopover({
                        width: 400,
                        offset: {left: 0, top:0},
                        showArrow: true,
                        showCloseButton: false,
                        isModal: true,
                        selector: $("#jqxbtnimport_1"),
                        title: 'Approve & Sign'
                    });

                  }

              });


            $('#jqxbtnimport_2').on('click',function(){
                $('#jqxbtnimport_2').attr('is_str','active');
                $('#jqxbtnimport_1').attr('is_str','');
                $('#jqxbtnimport_3').attr('is_str','');


                if(ses_employee_id == details[0].act_div_chief_id){


                      $('#jqxPopover').jqxPopover({
                          width: 400,
                          offset: {left: 0, top:0},
                          showArrow: true,
                          showCloseButton: false,
                          isModal: true,
                          selector: $("#jqxbtnimport_2"),
                          title: 'Approve & Sign'
                      });

                }

            });

              $('#jqxbtnimport_3').on('click',function(){

                      
                    $('#jqxbtnimport_3').attr('is_str','active');
                    $('#jqxbtnimport_1').attr('is_str','');
                    $('#jqxbtnimport_2').attr('is_str','');


                    if(ses_employee_id == details[0].act_div_chief_id){


                          $('#jqxPopover').jqxPopover({
                              width: 400,
                              offset: {left: 0, top:0},
                              showArrow: true,
                              showCloseButton: false,
                              isModal: true,
                              selector: $("#jqxbtnimport_3"),
                              title: 'Approve & Sign'
                          });

                    }
              });



/*
                  if(ses_employee_id == details[0].div_chief_id){


                    $('#jqxbtnimport_1').on('click',function(){
                        $('#jqxbtnimport_1').attr('is_str','active');
                        $('#jqxbtnimport_2').attr('is_str','');
                        $('#jqxbtnimport_3').attr('is_str','');

                    });


                   $('#jqxPopover').jqxPopover({
                        width: 400,
                        offset: {left: 0, top:0},
                        showArrow: true,
                        showCloseButton: true,
                        isModal: true,
                        selector: $("#jqxbtnimport_1"),
                        title: 'Approve & Sign'
                    });


                  }

                  if (ses_employee_id == details[0].act_div_chief_id){


                          $('#jqxPopover').jqxPopover({
                              width: 400,
                              offset: {left: 0, top:0},
                              showArrow: true,
                              showCloseButton: false,
                              isModal: true,
                              selector: $("#jqxbtnimport_2"),
                              title: 'Approve & Sign'
                          });


                        $('#jqxbtnimport_2').on('click',function(){
                            $('#jqxbtnimport_2').attr('is_str','active');
                            $('#jqxbtnimport_1').attr('is_str','');
                            $('#jqxbtnimport_3').attr('is_str','');
                        });


                      $('#jqxPopover').jqxPopover({
                              width: 400,
                              offset: {left: 0, top:0},
                              showArrow: true,
                              showCloseButton: false,
                              isModal: true,
                              selector: $("#jqxbtnimport_3"),
                              title: 'Approve & Sign'
                          });

                      $('#jqxbtnimport_3').on('click',function(){

                          alert('test');
                          $('#jqxbtnimport_3').attr('is_str','active');
                          $('#jqxbtnimport_1').attr('is_str','');
                          $('#jqxbtnimport_2').attr('is_str','');
   
                      });


                  }
*/




                
                $("#container_ot").show();
                $("#container_leave").hide();
                $("#container_ps").hide();
                $("#container_paf").hide();

                $('#ot_form_print_view').show();

            }else{

                $("#container_ot").hide();
                $("#container_leave").hide();
                $("#container_ps").hide();
                $("#container_paf").hide();

            }

        });



        function follow_km_123_ast(){

        }




</script>