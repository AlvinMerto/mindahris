<link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/hr_dtr_style.css'/>

<div class="content-wrapper  
	<?php 
		/*
		if (isset($get_margin)){ 
			// echo "style=margin:0px;";
			echo " getmarginleft";
		} elseif (isset($margin_left)) {
			// echo "style='margin-left: 230px !important;'";
			echo " marginleft";
		}
		*/
	?> ">
   <!-- Content Header (Page header) -->
<div class="content_wrapper">
   <section class="content-header">
      <h1 style='font-size: 21px; padding: 9px 0px;'>
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Daily Time Records <span id='showpopupwindow' style='display:none;' class="btn btn-default" ><i class="fa fa-expand" aria-hidden="true"></i> Show Pop up window </span><!--span id='statmsg'>--</span-->
			<span id='findingshere'>
				<!--div class='findingsclass'>
					<p class='notifytext'> The HR questions some of the documents you attached in your DTR.
					<button class='btn btn-danger'> Click here to see those</button>
					 </p>
				</div-->
			</span>
		<div style='float:right;'>
			<div class='btn-group'>
			<!--div class='btn_group_btm'-->
			  	<!--button class='mindabtnstyle' id='countersignbtn'>  <i class="fa fa-paper-plane" aria-hidden="true"></i> Notify Division Chief</button-->
				<?php 
					//if (isset($verificationcode)) {
						if (!isset($print_hide)) {
						//if($retwat != 2){
							?>
								<button id="jqx_print_admin" class='btn btn-default mindabtnstyle'>  <i class="fa fa-print" aria-hidden="true"></i> Print</button>
							<?php
						}
					//}
				?>
			<button id="printdtr" class='btn btn-default mindabtnstyle'>  <i class="fa fa-print" aria-hidden="true"></i> Print (beta)</button>
			<!--a class='mindabtnstyle'> Accomplishment Report </a-->
			<!--/div-->
			<?php if (!isset($retwat)): ?>
				<button id='showfilterwindow' class='btn btn-default mindabtnstyle'> <i class="fa fa-filter" aria-hidden="true"></i> Filter </button>
			<?php endif; // verificationcode ?>
		
			<?php if (isset($verificationcode)) {
				$approvelink = base_url()."dtr/approval/{$verificationcode}/{$upwd}/{$uname}"; ?>	
				<?php if($retwat != 2): ?>
				<a id='approvebtn' class='btn btn-default mindabtnstyle' href='<?php echo $approvelink; ?>' target='_blank'> Approve this DTR </a>
				<?php endif; ?>
				<?php // if($this->session->userdata('employment_type') == "JO"): ?>
				<a id='' class='btn btn-default mindabtnstyle' href='<?php echo $accom_report; ?>' target='_blank'> Accomplishment Report </a>
				<?php // endif; ?>
			<?php } ?>
			<?php if (isset($retwat) && $retwat != 2): ?>
				<!--button id='showdtrcover' class='mindabtnstyle'> Show this month's Coverage </button-->
			<?php endif; ?>
			</div>
		</div>
		<div id='rightfloatwindow' style='display:none;'> <!-- right float window -->
		<div class='blackerdiv'></div>
			<div class="col-md-12" style='height: 100%; padding:0px; box-shadow: -4px 0px 10px #8c8c8c; border-left: 1px solid #737373;'>
            <div class="box innerwrap_float">
               <div class="box-header with-border" style='display:none;'>
                  <h3 class="box-title">Filter</h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group" id="view_admin_form" style="display:block;">
                           <div class="row">
                              <div class='dropbox_div'>
                                 <label class='dropbox_label'>SELECT OFFICES & DIVISION:</label> 
                                 <div style="margin-top:10px; margin-bottom:10px;" id="jqxdropdownbutton">
                                    <div id='jqx_office_division_tree'></div>
                                 </div>
                              </div>
                              <div class='dropbox_div'>
                                 <label class='dropbox_label'>SELECT EMPLOYMENT TYPE:</label> 
                                 <div style="margin-top:10px;" id="jqx_employment_type"></div>
                              </div>
                              <div class='dropbox_div'>
                                 <label class='dropbox_label'>SELECT EMPLOYEE:</label>
                                 <div style="margin-top:10px; margin-bottom:10px;" id='jqxcombo'></div>
                                 <input  type="hidden" value="231" id="jqxuserid" />
                                 <input  type="hidden" value="231" id="jqxfullname" />                                              
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div>
                                 <label class='dropbox_label'>SELECT DATE:</label>
                                 <div style="margin-top:10px;" id='jqxdaterange'></div>
                                 <input  type="hidden" value="" id="jqxemployee_id" />
                              </div>
                              <div>
                                 <div style="margin-top:27px;">
                                    <input style="display:none;" type="button" class="btn btn-sm btn-danger" value="Submit to Division Chief Head" id="jqxprintback"/>
									
                                    <input type="button" class="btn btn-sm btn-warning" value="VIEW ALL DATE COVERED" id="jqx_buttonsubmitted_to_hr"/>&nbsp;
									<input type='button' class='btn btn-default' value='Close' id='closewindow'/>
                                    <div style="margin-top:10px;" id="jqx_list_remaining_dtr_cover"></div>
                                    <p id="date_covered_note_label" style="display:none; margin-top:5px; color:green; font-style: italic; font-size: 15px; line-height: 22px;" > <!--Note: Date covered already submitted... --> </p>
									<!-- 1.a: mark here -->
									<?php if(!isset($cantsubmit)): ?>
										<button style="display:none;" id="btn_proceed_hr_submission" class="btn btn-sm btn-primary">Submit DTR</button>  
									<?php endif; ?>
                                    <input style=" display:none;" type="button" class="btn btn-sm btn-success" value="PRINT PREVIEW" id="jqxprint"/>
									<input style='display:none;' type='button' class='btn btn-sm btn-default' value='Send to a new signatory' id='resend_new_email_'/>
                                    <button id="btn_cancel_hr_submmision" class="btn btn-sm btn-danger" style="display:none; ">CANCEL</button>
                                 </div>
                              </div>
                              <div>
                                 <div style="margin-top:27px;">
                                    <!--button style="display:none;" class="btn btn-sm btn-success" id="jqx_print_admin"><i class="fa fa-print"></i> PRINT</button-->
                                 </div>
                              </div>
                           </div>
                        </div>
                     
                     </div>
                  </div>
                  <!-- /.row -->
               </div>
               <!-- ./box-body -->
               <!-- /.box-footer -->
            </div>
			
         </div>
		</div> <!-- right float window -->
      </h1>
   </section>
   <!-- Main content -->
   
<!--div class="content-wrapper"-->
	<section class="content" style='padding:0px; min-height: inherit;'>
   <!--section class="content" style=""-->

      <div class="row">
         <div class="col-md-12">
            <div class="box">
               <div class="box-header with-border" style='display:none;'>
                  <h3 class="box-title">Result</h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="padding:0px;">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row" style="display:none; background: rgba(51,51,51,.19) !important; border: 1px solid #c1c1c1 !important; padding-top: 15px;  margin-left: 0px;margin-right: 0px;">
                           <div class="col-md-3">
                              <p style="color: rgb(96, 102, 107);margin:0px">TIME SHIFT / SCHEDULE: <strong><span id="total_time_shift_sched"></span></strong></p>
                              <div style=' padding-top: 10px; font-size: 13px; font-family: calibiri; display:none;' id='selection' ></div>
                              <p id="total_temporary_shift" style="font-size:11px; color: rgb(96, 102, 107);"></p>
                              <p style="color: rgb(96, 102, 107);">LEGEND:</p>
                              <p style="color: rgb(96, 102, 107); font-weight: bold; font-size: 12px;">
                              <strong>  <span class="text-muted"> H = HOLIDAY </span> <br> <span class="text-muted" >A = ABSENT </span>  <br>  <span  class="text-muted">N/A = NOT ABSENT </span>  <br> <span  class="text-muted"> IC = INCOMPLETE </span>  <br>  </strong></p>
                           </div>
                           <div class="col-md-3">
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px">NO. OF WORKING DAYS: <strong><span class="text-green" style="text-decoration: underline;font-size:18px;"  id="total_working_days"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px">SERVICES RENDERED: <strong><span class="text-green" style="text-decoration: underline;font-size:18px;"  id="total_services_r"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px">TARDINESS & UNDERTIME: <strong><span class="text-red" style="text-decoration: underline;font-size:18px;"  id="total_tardiness_undertime"></span></strong></p>
                           </div>
                           <div class="col-md-3">
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px">NO. OF HOLIDAYS: <strong><span class="text-light-blue" style="text-decoration: underline;font-size:18px;" id="total_holidays"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px">SERVICES RENDERED: <strong><span class="text-muted" id="total_holiday_services_r" style="text-decoration: underline;font-size:18px;"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px">TARDINESS & UNDERTIME: <strong><span  class="text-muted"id="total_holiday_tardiness_undertime" style="text-decoration: underline;font-size:18px;"></span></strong></p>
                           </div>
                           <div class="col-md-3">
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px;">TOTAL LATES:  <strong><span class="text-red" style="text-decoration: underline;font-size:18px;" id="total_lates_input_display"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px;">TOTAL UNDERTIME:  <strong><span class="text-red" style="text-decoration: underline;font-size:18px;" id="total_undertime_input_display"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px;">TOTAL PS:  <strong><span class="text-red" style="text-decoration: underline;font-size:18px;" id="total_ps_input_display"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px;">TOTAL ABSENCES:  <strong><span class="text-red" style="text-decoration: underline;font-size:18px;" id="total_absences_input_display"></span></strong></p>
                              <p style="color: rgb(96, 102, 107); font-size:13px;margin:0px;">TOTAL:  <strong><span class="text-red" style="text-decoration: underline;font-size:18px;" id="total_input_display"></span></strong></p>


                           </div>
                        </div>
                        <div style="display:none; border-top: 1px solid rgb(204, 204, 204); margin-top: 28px;margin-bottom: 28px;"></div>
                        <div class="row">
                           <div class="col-md-12">
                              <div id="jqxgrid" style="zoom:90% !important;"> loading attendance... </div>
                           </div>
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
</div> <!-- end of section content wrapper second -->
   <!--/div> 
</div>




<!-- printed area -->
<?php
	// prepare the data to be send to dtr_print_view
?>

<?php 

	if (isset($signature)) {
		$this->load->view('admin/reports/dtr_print_view', $signature); 
	} else {
		$this->load->view('admin/reports/dtr_print_view'); 
	}

	
?>
<?php //$this->load->view('admin/forms/passlip_view'); ?>
<?php //$this->load->view('admin/forms/paf_view'); ?>
<?php //$this->load->view('admin/forms/leave_form_view'); ?>
<?php //$this->load->view('admin/forms/special_form_view'); ?>
<?php //$this->load->view('admin/forms/ot_form_view'); ?>

<!-- end printed area -->



<!-- /#page-wrapper -->

<div class="modal fade" id="findingsmodal" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style="display: none;">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h3> Please fix the following: </h3>
			</div>
			<div class='modal-body'>
				<ul id='errorsonff'>
					<li> 
						<strong> March 1, 2520 </strong>
						<p> --- </p>
					</li>
				</ul>
				<p style='text-align: center; font-size: 15px;'> Your DTR was checked by: <strong> <span id='correctedby'> </span> </strong> </p>
			</div>
			<div class='modal-footer'>
				<button class='btn btn-primary' id='resubmittohr'> Re-Submit to HR </button>
			</div>
		</div>
	</div>
</div>

<!-- Modal for reports Exceptions / leaves, passlips etc -->


<div class="modal fade" id="modal_exceptions" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style="display: none;">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button style="display:none;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<!-- opacity: 1 !important;  -->
                <div style="opacity: 1 !important; display:block !important;" class="close"id="jqxcheckexact_approval"></div>
                <h4 class="modal-title" id="label_exceptions" id="modal_header" >


                <span id="label_on_process" style="display:none; font-size:11px;  background-color:#ec971f; color:#fff; padding:5px;">ON PROCESS</span>
                <span id="label_approved" style="display:none; font-size:11px;  background-color:green; color:#fff; padding:5px;">APPROVED</span>
                <span id="label_disapproved" style="display:none; font-size:11px;  background-color:#c9302c; color:#fff; padding:5px;">Remove</span>
                <span id="label_remarks" style="display:none; font-size:11px; font-style: italic;"> Remarks: HR approved this document</span>

                <span id="date_select" style="margin-left:10px; font-size:14px; display:none;"d>05/16/2016 Mon</span>
                <span id="date_select_1" style="margin-left:10px; font-size:14px;">05/16/2016 Mon</span>


                 <!-- admin previlage -->


                 <!-- admin previlage -->

                </h4>
            </div>

            <div class="modal-body">


                <ul class="nav nav-tabs" id="tab_exceptions_">
                    <li id="tab_app" is_select="app" class="active"><a aria-expanded="false" href="#home" data-toggle="tab">Attach <span id="file_name_as">AMS</span></a></li>
                    <!--li id="tab_ot" is_select="ot" class=""><a aria-expanded="true" href="#profile" data-toggle="tab">File Overtime</a>
                    </li-->
					<li id="tab_ot" is_select="ot" class="">
						<a aria-expanded="true" href="#profile" data-toggle="tab">
							Attached Overtime form
						</a>
					</li>
                </ul>

            <div class="tab-content"> 
                                <div class="tab-pane fade active in" id="home" style="padding-top: 20px;"> 

                                      <?php $this->load->view('admin/reports/exception_modal_view'); ?>

                                </div>

                                <div class="tab-pane" id="profile">
									
									<div class='newot_form'>
										<div id='when_attaching'>
											
										</div>
										<div id='when_theres_attachment' >
											<div class='viewapplication'> 
												<div class='btn-group'>
													<a class='btn btn-default' href='#' id='viewappform' target='_blank'> View application form </a>
													<a class='btn btn-default' href='#' id='viewaccomform' target='_blank'> View OT accomplishment form </a>
												</div>
											</div>
										</div>
									</div>
								
								<!-- dont erase -->
									<div style="display: none;" id="ot_form" style="margin-top: 20px;">

                                          <input type="hidden" id="text_hidden_ot_id"/> 
                                          <h5>Task/s &nbsp; to be done</h5>
                                          <textarea id="jqx_task_to_be_done" s="" class="form-control"></textarea>

                                           <div class="row" style="margin-bottom: 20px;">
                                            <div class="col-md-3">
                                               <h5>Requested time in: </h5>
                                               <div id="jqx_r_time_in"></div>
                                            </div>
                                            <div class="col-md-3">
                                               <h5>Requested time out: </h5>
                                               <div id="jqx_r_time_out"></div>
                                            </div>
                                           </div>


                                           <div class="row" style="margin-bottom: 20px;">
                                              <div class="col-md-6">
                                                 <input id="ot_rw" name="ot_type" checked="" value="1" type="radio"> REGULAR WORK (RW) &nbsp;
                                                 <input id="ot_st" name="ot_type" value="2" type="radio"> SPECIAL TASK (ST) 
                                              </div>
                                           </div>


                                           <h5>Reasons for extra hours if column RW is checked</h5>
                                          <textarea id="jqx_reasons_rw" s="" class="form-control"></textarea>


                                          <h5>Remarks/Comments:</h5>
                                          <textarea id="jqx_ot_remarks_comment" s="" class="form-control"></textarea>


                                           <div class="row">
                                            <div class="col-md-4">
                                               <h5>Recommending Approval: </h5>
                                               <div id="jqx_recommending_approval"></div>
                                            </div>
                                            <div class="col-md-4">
                                               <h5>Approved by : </h5>  
                                               <div id="jqx_approved_by_ot"></div>
                                            </div>
                                              
                                           </div>

									</div>
								<!-- end of dont erase -->


                                </div>
                            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" style='display:none;'>Close</button>
                <button type="button" class="btn btn-sm btn-primary" id="btn_save_attachment_only">Save Attachment/s Only</button>
                <button type="button" class="btn btn-sm btn-success" id="btn_save_checklogs">Save All Changes</button>
                <button type="button" class="btn btn-sm btn-default" id="btn_close_checklogs">Close</button>
                <button type="button" class="btn btn-sm  btn-warning" id="btn_print_form_preview">Print Preview</button>
                <a class="btn btn-sm btn-info" target="_blank"  id="btn_link_application" href="">Go to Application Page </a>
				<!--a href='' id='link_to_form'>sample</a-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    
	<!--div id='towhom_div'>
		<div id='inner_whom'-->
	<div class="modal fade in" id="modal_proceed_submit" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style='z-index: 10000;'>
		<div class="modal-lg modal-dialog">
			<div class="modal-content small_width">
				<div class='modal-header'>
					<h3 class='notice_text'> Select your approving official(s). </h3>
				</div>
				<div class='modal-body'>
					<table class='notice_table'>
						<tr>
							<td class='division_chief_td'>	
								<p> Division: </p>
								<select class='btn btn-default' id='division_selectopt'>
									<?php 
										for($i = 0;$i<=count($signatories['division_other'])-1;$i++) {
											$selected = null;
											
											if ($signatories['division_other'][$i]['emp_id'] == $signatories['division']['div_empid']) {
												$selected = " selected ";
											}
											echo "<option value='{$signatories['division_other'][$i]['emp_id']}' {$selected}>";
												echo $signatories['division_other'][$i]['fname'];
											echo "</option>";
										}
									?>
								</select>
							</td>
							<td class='last_approving_td'>
								<p> Last Approving Official: </p>
								<?php // var_dump($signatories['dbm_other']); ?>
								<select class='btn btn-default' id='dbm_selectopt'>
									<?php 
										for($o = 0 ; $o <= count($signatories['dbm_other'])-1; $o++) {
											$sel = null;
											
											if ($signatories['dbm_other'][$o]['emp_id'] == $signatories['dbm']['dbm_empid']) {
												$sel = " selected ";
											}
											echo "<option value='{$signatories['dbm_other'][$o]['emp_id']}' {$sel}>";
												echo $signatories['dbm_other'][$o]['fname'];
											echo "</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<?php if($this->session->userdata('employment_type_') == "JO"): ?>
						<tr>
							<td colspan=2> 
								<div class='jo_notice'> 
									<p> TO JOB ORDER PERSONNEL: </p>
									<p> 
										Please make it sure that you have completed your accomplishment report. 
										It will automatically be attached here once you proceed the submission.
										If you haven't created one, please click <a href='<?php echo base_url(); ?>my/accomplishments' target='_blank'>here</a> to create.
									</p>
								</div> 
							</td>
						</tr>
						<?php endif; ?>
					</table>
					<?php if($ischief == 1 || $isdirector == 1): ?>
						<script>
							jQuery(document).find(".division_chief_td").hide();
						</script>
					<?php endif; ?>
					<?php if($isdirector == 1): ?>
						<script>
							jQuery(document).find(".last_approving_td").hide();
						</script>	
					<?php endif; ?>
					
					<?php if($isamo != 1 && $ischief != 1): ?>
						<script>
							jQuery(document).find(".last_approving_td").hide();
						</script>	
					<?php endif; ?>
					
					<?php if($division_id == 0): ?>
						<script>
							jQuery(document).find(".division_chief_td").hide();
						</script>
					<?php endif; ?>
				</div>
				<div class='modal-footer'>
					<button class='btn btn-primary' id='proceed_sending'> Proceed Submit </button>
					<button class='btn btn-default' id='cancelsending'> Cancel </button>
				</div>
			</div>
		</div>
	</div>
		<!--/div>
	</div-->

<!-- end modal -->
<script type="text/javascript">


    var SES_USERTYPE = '<?php echo $usertype; ?>';
    var ses_biometric_id = '<?php echo $biometric_id; ?>';
    var ses_employee_id = '<?php echo $employee_id; ?>';
    var ses_employment_type = '<?php echo $employment_type; ?>';
    var ses_dbm_sub_pap_id = '<?php echo $dbm_sub_pap_id; ?>';
    var ses_division_id = '<?php echo $division_id; ?>';
    var ses_level_sub_pap_div = '<?php echo $level_sub_pap_div; ?>';
    var ses_is_head = '<?php echo $is_head; ?>';

    var x =1;
    var SHIFT_DATA = '';
    var TEMPORARY_SHIFT = '';
    var LIST_COVER_DTR = ''; 


    var SUMMARY_REPORT_TARDINESS = ''; 
    var SUMMARY_REPORT_UNDERTIME = ''; 
    var SUMMARY_REPORT_PS_PERSONAL = ''; 

    var LIST_USERS = '';

	var selectedcoverid = null;

    var BASE_URL = '<?php echo base_url(); ?>';

    $(document).ready(function () {
		
		$(document).on("click","#showpopupwindow",function(){
			$(this).hide();
			$(document).find(".notification_div").fadeIn();
		})
		/*
		if (getdate__ == true) {
			$('#jqxfullname').val( empname );
			processdtr(datefrom , dateto , bioid , areaid , empid);
		}
		*/
				
		// hide button 
			$(document).on("click","#hidewindow",function(){
				/*
				c(".notification_div").animate({
					"bottom":"-100"
				});
				*/
				$(document).find("#showpopupwindow").show();
				$(document).find(".notification_div").fadeOut();
			});
		// end hide button
		
		// cancel DTR
		var c_clicked = false;
			$(document).on("click","#canceldtr",function(){
				if (c_clicked == false) {
					
					var conf = confirm("Are you sure wanted to 'DELETE' your submitted DTR. The HR might not have printed it yet. Wait for this RED BOX to disappear before sending a new one.");
					
					if (conf) {
						$(document).find("#canceldtr").html("cancelling...")
						var sumrep = $(this).data("dtrsumrep"),
							cntid  = $(this).data("cntid");
							
							performajax(["My/canceldtr",{ cntid_ : cntid , sumrep_ : sumrep }], function(data){
								if (data == true) {
									c_clicked = true;
									$(document).find("#canceldtr").html("DELETED");
									
									setTimeout(function(){
										window.location.reload();
									},1000)
									
								}
							})
					}
				} else {
					alert("Error encountered. Please refresh the page.")
				}
			})
		// end cancel of dtr
		
		// submit to new chief 
			$(document).on("click","#sendtonewchief",function() {
			//	alert("This facility is temporarily disabled."); return;
				/*
				$(".notification_div").fadeOut();
				
				$("#rightfloatwindow").animate({
					"width":"400px",
				},300).show();
				*/
              info 				  = {};
              info['employee_id'] = $('#jqxemployee_id').val();
              info['view_all'] 	  = 1;

              $("#jqx_list_remaining_dtr_cover").jqxDropDownList('clear'); 

              var getaremaining_dtr_cover = postdata(BASE_URL + 'reports/getremaining_dtr_cover' , info);
			  var submitted_coverid 	  = postdata(BASE_URL + 'reports/getthecoverid', $(this).data("dtrsumrep") );
				  
              if(getaremaining_dtr_cover != ""){
                  LIST_COVER_DTR = getaremaining_dtr_cover;
				  
                      var list = new $.jqx.dataAdapter(getaremaining_dtr_cover);
					  
					  var selectedindex = null;
					  for(var i = 0; i <= getaremaining_dtr_cover.length-1; i++) {
						if ( getaremaining_dtr_cover[i].dtr_cover_id == submitted_coverid ) {
							selectedindex   = i;
							selectedcoverid = $(this).data("dtrsumrep");
							break;
						}
					  }
					  
                      $("#jqx_list_remaining_dtr_cover").jqxDropDownList({ source: list, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: selectedindex, width: '330px' ,height: '25px' });

                        var dtr_cover_id = $('#jqx_list_remaining_dtr_cover').val();
						
                        var date_started 	    = getaremaining_dtr_cover[selectedindex].date_started;
                        var date_ended 		    = getaremaining_dtr_cover[selectedindex].date_ended;
                        var is_allow_to_submit  = getaremaining_dtr_cover[selectedindex].is_allow_to_submit;
						
						// opening the window for the signatories
							// $(".notification_div").fadeOut();
							$("#modal_proceed_submit").modal("show");
						// end window for signatories
			  }
			})
			
			$(document).on("click","#resend_new_email",function(){
				// $("#modal_proceed_submit").modal("show");
			})
		// end submit to new chief
		
		$(document).on("click","#cancelsending",function() {
			//$(document).find("#towhom_div").fadeOut();
			$("#modal_proceed_submit").modal("hide");
		})
		
		jQuery(document).on("click","#resubmittohr",function() {
			var conf = confirm("Proceed?");
			
			if (conf) {
				var db_from = jQuery(this).data("db_from");
				var as_id   = jQuery(this).data("as_id");
				
				jQuery(this).html("...sending back");
				performajax(['Dtr/resubmit',{ details : as_id , com_from : db_from }], function(data) {
					console.log(data);
					if (data == true) {
						window.location.reload();
					}
				})
			}
		})
		
		jQuery(document).on("click","#sendtochief, #sendtolast",function(){
			var cntid  = jQuery(this).data("cntid");
			var sendto = jQuery(this).data("sendto");
			
			var conf = confirm("Proceed?");
			
			if (conf) {
				jQuery(document).find(".sendingstatushere").html("...sending your DTR. Please wait.");
				console.log( cntid + " - " + sendto )
				performajax(["Dtr/senddtrtoemail",{cntid_ : cntid , sendto_ : sendto }], function(data){
					if (data) {
						jQuery(document).find(".sendingstatushere").html("You just successfully sent a new DTR. Clicking this again will trigger another process of emailing.");
					}
				})
			}
		})
		
		// new print function :: printdtr
			jQuery(document).on("click","#printdtr",function(){
				var d 	  = jQuery(document).find("#inputjqxdaterange").val();
				var empid = jQuery(document).find("#jqxemployee_id").val();
			
				jQuery.ajax({
					url 		: BASE_URL+"Hr/newdtrview",
					type 		: "post",
					data 		: { empid : empid,
									date_ : d },
					dataType 	: "html",
					success 	: function(data) {
						var newwindow = window.open('','','width=800','height=200'),
							doc 	  = newwindow.document.open(),
							cont 	  = data;
							
							doc.write(cont);
							doc.close();
							
							setTimeout(function(){
								newwindow.print();
							},1000)
					},error 	: function() {
						alert("error on printdtr line number 672");
					}
				})
				
				
			})
		// end 
		
		/*
		jQuery(document).on("click","#sendtolast",function(){
			var cntid  = jQuery(this).data("cntid");
			var sendto = jQuery(this).data("sendto");
			
			performajax(["Dtr/senddtrtoemail",{cntid_ : cntid , sendto_ : sendto }], function(data){
				console.log(data);
			})
		})
		*/
		
		function get_the_attendance(sumid,empid) {
				
		}
		
		// 2:mark here
		function gettheform(){
		var loadingimage = "<div class='loader_image lds-css ng-scope'><div style='width:100%;height:100%' class='lds-ball'><div></div></div></div>";
		
		//$("#countersignbtn").on("click", function() {
            var win_dow   = "#showwindow";
			var load_here = "#pop_upwindow";
			
			$(load_here).text("");
			
			$(win_dow).fadeIn();
			$("<div class='cs_div_style' style='padding: 15px;text-align: center;'> <h4> Please wait while we are collecting your data. This may take a while. Thank you. </h4> </div>").appendTo(load_here);
			
				setTimeout(function(){
					$(document).find(".cs_div_style").append("<p style='color: red; font-size: 15px;'> The loading took a real while to process. DO NOT CLOSE THE PAGE but reload it and see if there is an error. </p>"+
															 "<p style='font-style:italic;'> This page will reload in 10 seconds </p>"+
															 "<button class='btn btn-primary' id='reloadbtn'> Reload </button>");
						/*
						 window.onbeforeunload = function() {
							return "There is error found and yet you have attempted to leave this page. Please reload the page.";
						 }
						*/
						$(document).on("click","#reloadbtn",function(){
							window.location.reload();
						})
						
							// auto reload 
								setTimeout(function(){
									window.location.reload();
								},10000)
							// auto reload 
						
				},120000) // 60000
				
			$('#body_wrap').show();

              var stedate = $('#startenddate').html();

              $('#sdateend').html($('#startenddate').html());
              $("#jqxgrid").jqxGrid('hidecolumn', 'total_hours_rendered');
              $("#jqxgrid").jqxGrid('hidecolumn', 'lates');
              $("#jqxgrid").jqxGrid('hidecolumn', 'undertime');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ps');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ot');

				//  margin-bottom: 40px !important; width: 90%; height: 630px;
				$("<p>",{ html : $("#jqxgrid").jqxGrid('exportdata', 'html'), id : "jqxgrid_text" }).hide().appendTo(document.body);
				
				// $("#jqxgrid").jqxGrid('exportdata', 'html')  border-collapse: collapse;
				$(document).find("#jqxgrid_text table").attr( "style","border-collapse: collapse;" ); 
				$(document).find("#jqxgrid_text table tbody tr td").attr( "style","border: 1px solid #ccc !important; padding: 7px; font-size: 15px !important;" );
				var thetable = $(document).find("#jqxgrid_text").html();
				
				//$(document).find("#jqxgrid_text table tbody tr td").attr({"border-right":"1px solid #c5c5c5", "border-bottom":"1px solid #c5c5c5"})
                var gridContent = '<div id="body" style="margin-top:0px !important; padding:0; margin:auto; background: #fff;">' + thetable + '</div>';
					
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'types_md');
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'is_appro');

                var header = $('#headers').html();
                var footer = $('#footers').html();

                  $('#body_wrap').hide();

                //var header = "<?php echo $dtrformat['header']; ?>";
                //var footer = "<?php echo $dtrformat['footer']; ?>";

                //var newWindow = window.open('', '', 'width=800, height=500'),
                // document = newWindow.document.open(),
				/*
                pageContent =
                    '<!DOCTYPE html>\n' +
                    '<html>\n' +
                    '<head>\n' +
                    '<meta charset="utf-8" />\n' +
                    '<style>  @media print{@page {size: Letter Portrait;  }} #body table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ border:none !important; font-size:12px !important;  height: 15px !important;margin: 0px !important; } </style>'  +
                    '</head>\n' +
                    '<body style="width: 770px;height: 900px;margin:auto;font-family:calibri; background: #efecec;">\n' + header + '\n' + gridContent + '\n' + footer + '\n</body>\n</html>';
				*/
				// width: 770px;height: 900px;
				 pageContent =
                    '<!DOCTYPE html>\n' +
                    '<html>\n' +
                    '<head>\n' +
                    '<meta charset="utf-8" />\n' +
                    '<style>  @media print{@page {size: Letter Portrait;  }} #body table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ border:none !important; font-size:12px !important;  height: 15px !important;margin: 0px !important; } </style>'  +
                    '</head>\n' +
                    '<body style="margin:auto;font-family:calibri; background: #efecec;">\n' + '\n' + gridContent + '\n' + '\n</body>\n</html>';
					
			// 	pageContent = gridContent;
			   /*
				document.write(pageContent);
                document.close();
                newWindow.print();
				*/
				
				//pageContent = pageContent;

                    $('#body_wrap').hide();
                        $("#jqxgrid").jqxGrid('showcolumn', 'total_hours_rendered');
                           $("#jqxgrid").jqxGrid('showcolumn', 'lates');
                          $("#jqxgrid").jqxGrid('showcolumn', 'undertime');
                          $("#jqxgrid").jqxGrid('showcolumn', 'ps');
                          $("#jqxgrid").jqxGrid('showcolumn', 'ot');
			
			/*
			performajax(["Hr/sendNotificationToChief",{htmlcode:pageContent}], function(response) {
				console.log(response);
			})
			*/
			return pageContent;
		//})
		}
	
       /* load default */


        $("#jqx_list_remaining_dtr_cover").jqxDropDownList({  width: '330px' ,height: '25px' }); 
        $("#jqx_list_remaining_dtr_cover").hide(); 

        $('#checkbox_view_only').removeAttr('checked');

        var data_e = [{'id' : '1' , 'name' : 'ALL'},{'id':'JO' , 'name' : 'Job Order'},{'id':'REGULAR' , 'name' : 'Plantilla'}];

        var sss = new $.jqx.dataAdapter(data_e);

        $("#jqx_employment_type").jqxDropDownList({source: sss, displayMember: "name", valueMember: "id", width: '200px' ,height: '25px' ,selectedIndex: 0 }); 


        /* OFFICES AND DIVISION TREE */


      var subpaptree = <?php echo json_encode($sub_pap_division_tree); ?>;



                var filter_substree = [];


                for (i in subpaptree) {


                  if(ses_division_id == 0){

                    if(ses_dbm_sub_pap_id == subpaptree[i].master_id && subpaptree[i].db_table == 'DBM_Sub_Pap' || subpaptree[i].parentid == ses_dbm_sub_pap_id && subpaptree[i].db_table == 'Division'){

                        filter_substree.push(subpaptree[i]);
                    }

                  }else{
                     filter_substree.push(subpaptree[i]);
                  }

                }


                if(SES_USERTYPE == 'admin'){
                    filter_substree = subpaptree;
                }



      var source =
            {
                dataType: "json",
                dataFields: [
                    { name: 'parentid', type: 'number' },
                    { name: 'id', type: 'number' },
                    { name: 'master_id', type: 'number' },
                    { name: 'db_table', type: 'string' },
                    { name: 'name', type: 'string' }
                ],
                hierarchy:
                {
                    keyDataField: { name: 'id' },
                    parentDataField: { name: 'parentid' }
                },
                localData: filter_substree
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            // create Tree Grid
            $("#jqx_office_division_tree").jqxTreeGrid(
            {
                width: 380,
                source: dataAdapter,
                hierarchicalCheckboxes: true,
                checkboxes: false,
                ready: function()
                {   
                     $("#jqx_office_division_tree").jqxTreeGrid('hideColumn', 'master_id');
                     $("#jqx_office_division_tree").jqxTreeGrid('hideColumn', 'db_table');
                     $("#jqx_office_division_tree").jqxTreeGrid('hideColumn', 'master_id');
                     $("#jqx_office_division_tree").jqxTreeGrid('hideColumn', 'parentid');

                }, 
                columns: [
                  { text: '', dataField: 'name', width: 380 },
                  { text: 'master_id', dataField: 'master_id', width: 50 },
                  { text: 'parentid', dataField: 'parentid', width: 50 },
                  { text: 'db_table', dataField: 'db_table', width: 100 }
                ]
            });






         $("#jqxdropdownbutton").jqxDropDownButton({ width: 300 , autoOpen: true , disabled : false});  
         $('#jqxdropdownbutton').jqxDropDownButton('setContent', 'ALL'); 
    

         

            $('#jqx_office_division_tree').on('rowSelect', function (event){
                // event args.
                var args = event.args;
                // row data.
                var row = args.row;
                // row key.
                var key = args.key;

                var filter_data = [];


                var db_table = row.db_table;
                var employment_type = $('#jqx_employment_type').val();
                $('#jqxdropdownbutton').jqxDropDownButton('setContent', row.name); 


                if(db_table == 'DBM_Sub_Pap'){


                             for (i in users){

                                if(row.master_id == users[i].DBM_Pap_id  &&  employment_type == 1){
                                    filter_data.push(users[i]);
                                }else if(row.master_id == users[i].DBM_Pap_id  &&  employment_type == users[i].employment_type){
                                   filter_data.push(users[i]);
                                }

                             }

            
                }else{/* division*/

                     
                           for (i in users){

                                if(users[i].office_division_name == row.name &&  employment_type == 1){
                                   filter_data.push(users[i]);
                                }else if (users[i].office_division_name == row.name && users[i].employment_type == employment_type){
                                   filter_data.push(users[i]);
                                }
                           }   


                }



                        var source =
                        {
                            datatype: "array",
                            datafields: [
                                { name: 'employee_id' },
                                { name: 'f_name' }
                            ],
                            localdata: filter_data,

                        };


                      var dataAdapter = new $.jqx.dataAdapter(source);
                      $("#jqxcombo").jqxComboBox({ searchMode: 'containsignorecase' , source: dataAdapter, displayMember: "f_name", valueMember: "employee_id", width: 250, height: 25 });


            });


       $('#jqx_employment_type').on('select', function (event) {

             var args = event.args;
             if (args) {

                 // index represents the item's index.                          
                 var index = args.index;
                 var item = args.item;
                 // get item's label and value.
                 var label = item.label;
                 var value = item.value;


                 var offices_division = $('#jqxdropdownbutton').val();


                  var rows = $("#jqx_office_division_tree").jqxTreeGrid('getSelection');
                  var employment_type = $('#jqx_employment_type').val();
             

                  for (var i = 0; i < rows.length; i++) {

                     var db_table = rows[i].db_table;
                     var master_id = rows[i].master_id;
                     var name = rows[i].name;

                  }

                  var filter_data = [];
                      
                    if(db_table == 'DBM_Sub_Pap'){


                                 for (i in users){

                                    if(master_id == users[i].DBM_Pap_id  &&  employment_type == 1 && users[i].status_1 == 1){
                                        filter_data.push(users[i]);
                                    }else if(master_id == users[i].DBM_Pap_id  &&  employment_type == users[i].employment_type && users[i].status_1 == 1){
                                       filter_data.push(users[i]);
                                    }

                                 }   

                
                    }else if (db_table == 'Division'){/* division*/

                         
                               for (i in users){

                                    if(users[i].office_division_name == name &&  employment_type == 1 && users[i].status_1 == 1){
                                       filter_data.push(users[i]);
                                    }else if (users[i].office_division_name == name && users[i].employment_type == employment_type && users[i].status_1 == 1){
                                       filter_data.push(users[i]);
                                    }
                               }   


                    }else{

                               for (i in users){

                                    if(employment_type == 1 && users[i].status_1 == 1 && users[i].status_1 == 1){
                                       filter_data.push(users[i]);
                                    }else if (users[i].employment_type == employment_type && users[i].status_1 == 1){
                                       filter_data.push(users[i]);
                                    }
                               }   

                    }
                 
                  var source =
                  {
                      datatype: "array",
                      datafields: [
                          { name: 'employee_id' },
                          { name: 'f_name' }
                      ],
                      localdata: filter_data,

                  };

                var dataAdapter = new $.jqx.dataAdapter(source);
                $("#jqxcombo").jqxComboBox({ searchMode: 'containsignorecase' , source: dataAdapter, displayMember: "f_name", valueMember: "employee_id", width: 250, height: 25 });


              } 

          });







        /* PREPARE DATA */
      users = <?php echo json_encode($dbusers);?>;
      LIST_USERS = users;

         /*USERS LIST */

      var source =
      {
          datatype: "json",
          datafields: [
            { name: 'employee_id' },
            { name: 'f_name' }
        ],        
          localdata: users,

      };



      var dataAdapter = new $.jqx.dataAdapter(source);
      // Create a jqxComboBox
      $("#jqxcombo").jqxComboBox({ searchMode: 'containsignorecase' , source: dataAdapter, displayMember: "f_name", valueMember: "employee_id", width: 250, height: 25});

      $("#jqxcombo").on('select', function (event) {
        
          if (event.args) {
              var item = event.args.item;
              if (item) {
                  
                 var employee_id = item.value;
                 var fullbane = item.label;


                 var area_id = '';
                 var biometric_id  = ''; 

                
                 $('#jqxfullname').val(fullbane);

                 for (i in users){

                    if(users[i].employee_id == employee_id){

                      biometric_id = users[i].biometric_id;
                      area_id = users[i].area_id;
                        
                    }   
                }

                  $('#jqxuserid').val(biometric_id);
                  $('#jqxemployee_id').val(employee_id);  


                  if(ses_employee_id == employee_id || SES_USERTYPE == 'admin'){
                     $('#jqx_buttonsubmitted_to_hr').show();
                  }else{
                     $('#jqx_buttonsubmitted_to_hr').hide();
                  }


                var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');


                var from_date = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
                var to_date = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();
					
                   processdtr(from_date , to_date , biometric_id , area_id , employee_id);

              }
          }
      });
 


 
    

    /* AUTO CURRENT DATE */
      

      $("#jqxdaterange").jqxDateTimeInput({ width: 250, height: 25,  selectionMode: 'range' , template: 'primary' , formatString: "M/d/yyyy"});

            var date = new Date();
            var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
            var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

            var date1 = new Date();
            date1.setFullYear(firstDay.getFullYear(), firstDay.getMonth(), firstDay.getDate());
            var date2 = new Date();
            date2.setFullYear(lastDay.getFullYear(), lastDay.getMonth(), lastDay.getDate());

            $("#jqxdaterange").jqxDateTimeInput('setRange', date1, date2)
            var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');
            $("#selection").html("<div id='startenddate'>Start Date: " + selection.from.toLocaleDateString() + " <br/>End Date: " + selection.to.toLocaleDateString() + "</div>");
            $("#jqxdaterange").jqxDateTimeInput({ width: 250, height: 25,  selectionMode: 'range' , template: 'primary'});

         /*DATE RANGE*/

 
          $("#jqxdaterange").on('change', function (event) {
                var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');

                if (selection.from != null) {
					
                    $("#selection").html("<div id='startenddate'>Start Date: " + selection.from.toLocaleDateString() + " <br/>End Date: " + selection.to.toLocaleDateString() + "</div>");
	

                var from_date = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
                var to_date   = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();

                    var employee_id = $('#jqxcombo').val();
						
                    var biometric_id = '';
                    var area_id = '';

                    for (i in users){

                    if(users[i].employee_id == employee_id){

                      biometric_id = users[i].biometric_id;
                      area_id = users[i].area_id;
                        
                    }
                       
                }
					// 
                    processdtr(from_date,to_date,biometric_id , area_id , employee_id);

                }
            });





       /*AREA  LIST */


      var UPLOADEDCSV = ""; 



         /*PRINT button click */

             $("#jqxprint").click(function () {

              $('#body_wrap').show();

              var stedate = $('#startenddate').html();

              $('#sdateend').html($('#startenddate').html());
              $("#jqxgrid").jqxGrid('hidecolumn', 'total_hours_rendered');
              $("#jqxgrid").jqxGrid('hidecolumn', 'lates');
              $("#jqxgrid").jqxGrid('hidecolumn', 'undertime');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ps');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ot');


                var gridContent = '<div id="body" style="margin-top:0px !important; margin-bottom: 40px !important; width: 90%; height: 630px; padding:0; margin:auto;">' + $("#jqxgrid").jqxGrid('exportdata', 'html') + '</div>';
             
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'types_md');
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'is_appro');

                var header = $('#headers').html();
                var footer = $('#footers').html();

                  $('#body_wrap').hide();

                //var header = "<?php echo $dtrformat['header']; ?>";
                //var footer = "<?php echo $dtrformat['footer']; ?>";

                var newWindow = window.open('', '', 'width=800, height=500'),
                document = newWindow.document.open(),
                pageContent =
                    '<!DOCTYPE html>\n' +
                    '<html>\n' +
                    '<head>\n' +
                    '<meta charset="utf-8" />\n' +
                    '<style>  @media print{@page {size: Letter Portrait;  }} #body table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ border:none !important; font-size:12px !important;  height: 15px !important;margin: 0px !important; } </style>'  +
                    '</head>\n' +
                    '<body style="width: 770px;height: 900px;margin:auto;font-family:calibri;">\n' + header + '\n' + gridContent + '\n' + footer + '\n</body>\n</html>';
                document.write(pageContent);
                document.close();
                 newWindow.print();
                
                    $('#body_wrap').hide();
                        $("#jqxgrid").jqxGrid('showcolumn', 'total_hours_rendered');
                           $("#jqxgrid").jqxGrid('showcolumn', 'lates');
                          $("#jqxgrid").jqxGrid('showcolumn', 'undertime');
                          $("#jqxgrid").jqxGrid('showcolumn', 'ps');
                          $("#jqxgrid").jqxGrid('showcolumn', 'ot');
                
              
            });





             /* print all for admin only */
			// mark 2
             $("#jqx_print_admin").click(function () {

              $('#body_wrap').show();

              var stedate = $('#startenddate').html();

              $('#sdateend').html($('#startenddate').html());
              $("#jqxgrid").jqxGrid('hidecolumn', 'total_hours_rendered');
            //  $("#jqxgrid").jqxGrid('hidecolumn', 'lates');
            //  $("#jqxgrid").jqxGrid('hidecolumn', 'undertime');
			  $("#jqxgrid").jqxGrid('hidecolumn', 'TIME5');
              $("#jqxgrid").jqxGrid('hidecolumn', 'TIME6');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ps');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ot');


                var gridContent = '<div id="body" style="margin-top:0px !important; margin-bottom: 40px !important; width: 90%; height: 630px; padding:0; margin:auto;">' + $("#jqxgrid").jqxGrid('exportdata', 'html') + '</div>';
             
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'types_md');
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'is_appro');

                var header = $('#headers').html();
                var footer = $('#footers').html();

                  $('#body_wrap').hide();

                //var header = "<?php echo $dtrformat['header']; ?>";
                //var footer = "<?php echo $dtrformat['footer']; ?>";

                var newWindow = window.open('', '', 'width=800, height=500'),
                document = newWindow.document.open(),
                pageContent =
                    '<!DOCTYPE html>\n' +
                    '<html>\n' +
                    '<head>\n' +
                    '<meta charset="utf-8" />\n' +
                    '<style>  @media print{@page {size: Letter Portrait;  }} #body table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ border:none !important; font-size:12px !important;  height: 15px !important;margin: 0px !important; } </style>'  +
                    '</head>\n' +
                    '<body style="width: 770px;height: 900px;margin:auto;font-family:calibri;">\n' + header + '\n' + gridContent + '\n' + footer + '\n</body>\n</html>';
                document.write(pageContent);
                document.close();
				
				setTimeout(function(){
					newWindow.print();
				},1000);


                    $('#body_wrap').hide();
                        $("#jqxgrid").jqxGrid('showcolumn', 'total_hours_rendered');
                        $("#jqxgrid").jqxGrid('showcolumn', 'lates');
                        $("#jqxgrid").jqxGrid('showcolumn', 'undertime');
                        $("#jqxgrid").jqxGrid('showcolumn', 'ps');
                        $("#jqxgrid").jqxGrid('showcolumn', 'ot');

	//	console.log("source: "+source.datafields.name);
//=========================================================================================
/*	record the activity */															 /*||*/
/*||*/	// var d 		   = new Object();											 /*||*/
/*||*/	//	d.activity = ["activity"=>"printed DTR", "src" => source];				 /*||*/
/*||*/																				 /*||*/
/*||*/	//	savetoactivity(0,d,"countersign",0);					 				 /*||*/
/*  end recording activity */														 /*||*/
//=========================================================================================

            });



             $('#tab_app').on('click',function(){

                var exception_name = $('#jqxexceptions').val();

                if(exception_name == 'AMS' || exception_name == 'OB'){
                    $('#btn_print_form_preview').hide();
                }else{
                    $('#btn_print_form_preview').hide();
                }
				

                if($('#jqx_check_exact_id').val() != 0){
					
				   // /view/form/42d94f-a34ab5
				   //$('#btn_link_application').attr('href',BASE_URL + "view/form/" + $('#jqx_check_exact_id').val());
				   //$('#btn_link_application').attr('href',BASE_URL + "view/form/" + $('#jqx_check_exact_id').val());
					
					
					   $('#btn_link_application').show();
					   $('#btn_link_application').attr('href',BASE_URL + "reports/applications/" + $('#jqx_check_exact_id').val() + '/' + exception_name);
				   
                   $('#btn_save_attachment_only').show();
                   $('#cancel_attached').show();
                 }else{
                   $('#btn_link_application').hide();
                 }

             });

		
			 
             $('#tab_ot').on('click',function(){

                 $('#btn_print_form_preview').hide();
                 $('#btn_save_attachment_only').hide();
                 $('#cancel_attached').hide();

                 if($('#text_hidden_ot_id').val() != ''){
                   // $('#btn_link_application').show();
				   // http://office.minda.gov.ph:9003/my/ot/accomplishment/1109
				   $('#viewaccomform').attr('href',BASE_URL + "my/ot/accomplishment/" + $('#text_hidden_ot_id').val() );
                   $('#viewappform').attr('href',BASE_URL + "reports/applications/" + $('#text_hidden_ot_id').val() + '/OT');
                 }else{
                   $('#btn_link_application').hide();
                 }
				 
             });



          /* dtr double click exceptions */

          $('#jqxgrid').on('rowdoubleclick', function (event) {
			// mark dbl click
			
			 $("#jqxcheckexact_approval").css({"display":"block"})
             $('#tab_app').attr('class' , 'active');
             $('#tab_app a').attr('aria-expanded' , 'true');
             $('#home').attr('class', 'tab-pane fade active in');

             $('#tab_ot').attr('class' , '');
             $('#tab_ot a').attr('aria-expanded' , 'false');
             $('#profile').attr('class', 'tab-pane');

			

                  var result = [];

                  var rows = $("#jqxgrid").jqxGrid('selectedrowindexes');                  
                  var selectedRecords = new Array();
				
                    for (var m = 0; m < rows.length; m++) {

                        var row = $("#jqxgrid").jqxGrid('getrowdata', rows[m]);

                        var data = selectedRecords[selectedRecords.length] = row;
                            result.push(data);
                    }
					
					if (row['ot'].length == 0) {
						$(document).find("#tab_ot").hide();
					} else {
						$(document).find("#tab_ot").show();
					}
					
					console.log(result);
					
					if (result[0].types_md.length >= 1 && result[0].types_md[0] == "CTO") {
						// CTO link here
						// https://office.minda.gov.ph:9003/view/form/5a4160-66448a
						// https://office.minda.gov.ph:9003/reports/applications/16364/LEAVE
						$(document).find("#cto_link_a")
							.attr("href",BASE_URL+"/reports/applications/"+result[0].exact_id+"/LEAVE").show();
						$(document).find("#btn_print_form_preview").hide(); // print preview
					}
					

                        for(i in users){

                          if(users[i].employee_id == $('#jqxemployee_id').val()){
                              var division_id = users[i].Division_id;
                              var dbm_sub_pap_id = users[i].DBM_Pap_id;
                          }

                        }


                        var filter_division_heads = [];
                        var filter_active_employees = [];


                         for(i in l_users){


                          if(l_users[i].is_head == 1 && l_users[i].Division_id  == division_id || l_users[i].is_head == 1 && l_users[i].DBM_Pap_id  == dbm_sub_pap_id){
                            filter_division_heads.push(l_users[i]);
                          } 

                         
                          if (l_users[i].is_status == 1 ){
                            filter_active_employees.push(l_users[i]);
                          }

                         }


                      var dataadapt = new $.jqx.dataAdapter(filter_division_heads);
                      $("#jqx_approved_list").jqxDropDownList({source: dataadapt, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});
                      $("#jqx_approved_list_paf").jqxDropDownList({source: dataadapt, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});
                      $("#jqx_approved_list_paf_1").jqxDropDownList({source: dataadapt, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});
                      $("#jqx_approved_list_leave").jqxDropDownList({source: dataadapt, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});
                      $("#jqx_recommending_approval").jqxDropDownList({source: dataadapt, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});
                      $("#jqx_approved_by_ot").jqxDropDownList({source: dataadapt, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});


                      var dataAdapter_1 = new $.jqx.dataAdapter(filter_active_employees);
                      $("#jqx_recorded_by_paf").jqxDropDownList({source: dataAdapter_1, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});
                      $("#jqx_autho_official_leave").jqxDropDownList({source: dataAdapter_1, displayMember: "f_name", valueMember: "employee_id" , selectedIndex: 0, width: '200px', height: '25'});

// console.log(result);
       
                    if(result.length  != 0){
                      dtrgriddoubleclickprocess(result);
						// ses_employee_id
						console.log(visitoremp)
						if (visitoremp != ses_employee_id) {
							$("#btn_save_attachment_only").hide();
							$("#btn_save_checklogs").hide();
							$("#form_attachments").hide();
						} else {
							
						}
						
						var attachments = $("#attachments_view").children().length;
							if (attachments >= 1) {
								$("#btn_link_application").hide();
							} else {
								// $("#btn_link_application").show();
							}
						
                    }

      

                  
           });


          /* end dtr double click exceptions */

      

            $('#btn_save_attachment_only').on('click',function(){


              var exact_id = $('#jqx_check_exact_id').val();

              var formData = new FormData($('#form_attachments')[0]);



                  $.ajax({
                      url: BASE_URL + 'attendance/uploadattachment/ams',
                      type: 'POST',
                      dataType: 'json', 
                      xhr: function() {
                          var myXhr = $.ajaxSettings.xhr();
                          return myXhr;
                      },
                      success: function (data) {

                           var attachments = data.filenames;
                    
          
                            if(data.success == 0){
                                attachments = '';
                            }


                              var info 			  = {};
                              info['exact_id']    = exact_id;
                              info['attachments'] = attachments;

                              if(attachments){

                                    var result = postdata(BASE_URL + 'attendance/saveattachmentsonly' , info);
									console.log(result);
                                    if(result){
                                         var s_attach = '';
                                         if(result){

                                             if(result.length != 0){ 
                                      
                                               for (i in result){
                                                  s_attach += '<a href="'+BASE_URL+'assets/attachments/'+result[i]+'" target=_"blank" ">'+result[i]+'</a> ';  
                                               }                  
                                             }else{
                                                s_attach = '';
                                             }
                
                                         }else{
                                             s_attach = '';
                                         }   

                                          $('#attachments_view').html(s_attach);
                                          $('#file_reset').trigger('click');

                                  }                 
                            }else{
                              showmessage('No attachments added' ,'warning');
                            }



                      },
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false
                  });
				
				
				
            });
  
			
			$("#btn_close_checklogs").on("click",function(){
				$("#modal_exceptions").modal("hide");
			})



              $('#btn_save_checklogs').on('click',function(){
				  
                  var is_select  = '';
                  var tab_active = $('#tab_exceptions_ li');

                  $.each(tab_active, function(key, element) {           
                      var is_active =  $(element).attr('class');
                      if(is_active == 'active'){
                        is_select = $(element).attr('is_select'); 
                      }   
                  });

                  if(is_select == 'app'){

                    var type_mode = $('#jqxexceptions').val();
                    var formData = new FormData($('#form_attachments')[0]);
// error here
                    $.ajax({
                        url: BASE_URL + 'attendance/uploadattachment/ams',
                        type: 'POST',
                        dataType: 'json', 
                        xhr: function() {
                            var myXhr = $.ajaxSettings.xhr();
                            return myXhr;
                        },
                        success: function (data) {
                          var attachments = data.filenames;
                      
                              if(data.success == 0)
                              {
                                  attachments = '';
							}
						// mark 1
                              if(type_mode == 'AMS' || type_mode == 'PS' || type_mode == 'PAF' || type_mode == 'CA' || type_mode == "CTO" || type_mode == 'OT'){
                                 saveamspspaf(attachments);
                              }else if (type_mode == 'OB'){
                                  saveob(attachments);
                              }else if (type_mode == 'LEAVE'){
                                  saveleaves(attachments);
                              }else{
                                showmessage('There is something wrong with your inputs. Please try again', 'danger');
                              }

                        },
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false

                    });                  

                  }else if (is_select == 'ot'){

                            var today = new Date();
                            var date_select = $('#date_select').html();
                            var checkdate = date_select.substring(0, date_select.length - 3);

                            var this_date  = new Date(checkdate);

                            var date1 = new Date();
                            date1.setFullYear(today.getFullYear(), today.getMonth(), today.getDate());
                            var date2 = new Date();
                            date2.setFullYear(this_date.getFullYear(), this_date.getMonth(), this_date.getDate());

                            var ot_id = $('#text_hidden_ot_id').val();

                            if(date1 <= date2){
                                 saveot();
                            }else{
                                if(ot_id == ''){
                                    showmessage('You cannot file overtime after the date today.', 'danger');
                                }else{
                                    saveot();
                                }
                                
                            }
                  }


               }); /* end btn_save_checklogs*/

          var source_app = [
                { 'label' : 'ON PROCESS' , 'value' : 0 },
              //  { 'label' : 'APPROVED' , 'value' : 1 },
                { 'label' : 'REMOVE' , 'value' : 2 }
          ];



       var dataAdapter1 = new $.jqx.dataAdapter(source_app);
      // Create a jqxComboBox  

        $("#jqxcheckexact_approval").jqxDropDownList({source: dataAdapter1, displayMember: "label", valueMember: "value" , selectedIndex: 0, width: '200px', height: '25'});
        $('#jqxcheckexact_approval').on('select', function (event) {

             var args = event.args;
             if (args) {
                 // index represents the item's index.                          
                 var index = args.index;
                 var item = args.item;
                 // get item's label and value.
                 var label = item.label;
                 var value = item.value;

                 info = {};
                 info['exact_id'] = $('#jqx_check_exact_id').val();
                 info['approve_id'] = ses_employee_id;
                 info['is_approved'] = value;

                 var update = postdata(BASE_URL + 'attendance/checexactapproved',info); 

                 if(update){

                    var employee_id = $('#jqxcombo').val();
                    var biometric_id = '';
                    var area_id = '';

                   for (i in users){

                      if(users[i].employee_id == employee_id){

                        biometric_id = users[i].biometric_id;
                        area_id = users[i].area_id;
                          
                      }
                         
                   }

                    var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');


                  var from_date = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
                  var to_date = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();

                    processdtr(from_date , to_date , biometric_id  , area_id , employee_id);
                    $('#modal_exceptions').modal('hide');
                 }

              } 

          });



                for (i in filter_substree) {


                  if(ses_division_id == 0){

                    if(ses_dbm_sub_pap_id == filter_substree[i].master_id && filter_substree[i].db_table == 'DBM_Sub_Pap'){
                      $("#jqx_office_division_tree").jqxTreeGrid('selectRow', i);
                    }
        
                  }else{

                    if(filter_substree[i].master_id == ses_dbm_sub_pap_id && filter_substree[i].db_table == 'DBM_Sub_Pap'){
                      $("#jqx_office_division_tree").jqxTreeGrid('expandRow', i);
        
                    }

                    if(filter_substree[i].master_id == ses_division_id && filter_substree[i].db_table == ses_level_sub_pap_div) {
                       $("#jqx_office_division_tree").jqxTreeGrid('selectRow', i);

                    }    

                  }

                }




        






          /* print form preview */
         $('#btn_print_form_preview').on('click',function(){


              var is_select  = '';

              var tab_active = $('#tab_exceptions_ li');

              $.each(tab_active, function(key, element) {
                
                var is_active =  $(element).attr('class');
                
                if(is_active == 'active'){
                  is_select = $(element).attr('is_select'); 
                }
               
              });



            if(is_select == 'app'){


                var header  = '';
                var footer = '';

                $('#ps_date').html($('#date_select').html());  
                $('#input_reason').html($('#jqxinput_reasons').val());


               var item = $("#jqx_approved_list").jqxDropDownList('getSelectedItem');
               var item_employee = $("#jqxcombo").jqxComboBox('getSelectedItem');
               var approved_by = item.label;
               var full_name = item_employee.label;


                $('#leave_division_chief_name').html( $("#jqx_approved_list_leave").jqxDropDownList('getSelectedItem').label);
                $('#leave_authorized_official').html( $("#jqx_autho_official_leave").jqxDropDownList('getSelectedItem').label);



                  var employee_id = $('#jqxcombo').val();
                  var ps_approved_id = $('#jqx_approved_list').val();

                  var position_name = '';
                  var office_division_name = '';

                  var first_name = '';
                  var last_name = '';
                  var middle_name = '';


                 for (i in users){

                    if(users[i].employee_id == employee_id){

                      position_name = users[i].p_name;
                      office_division_name = users[i].office_division_name;
                      first_name = users[i].firstname;
                      last_name = users[i].l_name;
                      middle_name = users[i].m_name;
                        
                    }

                    if(users[i].employee_id == ps_approved_id){

                      ps_a_position_name = users[i].p_name;
                      ps_a_office_division_name = users[i].office_division_name;
                      ps_a_first_name = users[i].firstname;
                      ps_a_last_name = users[i].l_name;
                      ps_a_middle_name = users[i].m_name;
                        
                    }




                       
                 }

                 $('#leave_position_name').html(position_name);
                 $('#leave_office_division').html(office_division_name);
        



                var exceptions = $('#jqxexceptions').val();

                if(exceptions == "PS"){

                   var ps_type = $('input[name="ps_type"]:checked').val();
                   $('#input_emp_fullname').html(first_name + ' ' + middle_name + '. ' + last_name);
                   $('#input_approved_id').html(ps_a_first_name + ' ' + ps_a_middle_name + '. ' + ps_a_last_name);
                   $('#input_position_approved_name').html(ps_a_position_name);


                  if(ps_type == 1){
                     $("#check_1").attr('checked', true);  
                     $("#check_2").attr('checked', false);  
                  }else{
                     $("#check_1").attr('checked', false);  
                     $("#check_2").attr('checked', true);  
                  }

                  var forms = $('#print_passlip_view').html();



                }else if (exceptions == "PAF"){



                  var item = $("#jqx_approved_list_paf").jqxDropDownList('getSelectedItem');
                  var item_1 = $("#jqx_approved_list_paf_1").jqxDropDownList('getSelectedItem');
                  var item_2 = $("#jqx_recorded_by_paf").jqxDropDownList('getSelectedItem');


                   $('#input_date_paf').html($('#date_select').html());

                  $('#input_division_oic').html(item.label);
                  $('#input_paf_approved').html(item_1.label);
                  $('#input_paf_recorded').html(item_2.label);


                  $('#input_paf_in').html($('#jqxtime_in_paf').val());
                  $('#input_paf_out').html($('#jqxtime_out_paf').val());

                  $('#input_justification').html($('#jqxinput_reason_justification').val());
                  $('#input_employee_paf').html(full_name);
                  $('#input_remarks_paf').html($('#jqxinput_remarks_paf').val());


                  $('#input_position').html(position_name);
                  $('#input_division').html(office_division_name);




                  var forms = $('#print_paf_view').html();

                }else if (exceptions == "LEAVE"){


                    var leave_id = $('#jqxexceptions_leave').val();
                    var no_of_days = $("#jqxgrid").jqxGrid('selectedrowindexes');



                    $('#leave_full_name').html(full_name);
                    $('#input_no_of_days').html(no_of_days.length);
                    $('#input_no_of_days').html(no_of_days.length);

                    if(leave_id == 1){ /*sick*/


                        $('#others_leave').hide();
                        $('#sick_leave').show();
                        $('.is_sick').hide();


                        $sick_leave_application_type = $('input[name="sl_type"]:checked').val();
                        $('#input_specify_sick_leave').html($('#jqx_input_sl_specify').val());

              
                        if($sick_leave_application_type == 1){
          
                               $("#sl_out").attr('checked', true);  
                               $("#sl_in_hos").attr('checked', false);  
              
                        }else{
                               $("#sl_out").attr('checked', false);  
                               $("#sl_in_hos").attr('checked', true);  
                        }


                       var forms = $('#print_leave_view').html();

                    }else if (leave_id == 2){ /* vacation */


                       $('#others_leave').show();
                       $('#sick_leave').hide();
                       $('.is_sick').show();

                        $('#vl_check_form').attr('checked' , true);
                        $('#leave_maternity').attr('checked' , false);
                        $('#leave_others').attr('checked' , false);

                        $('#input_specify_vacation_leave').html($('#jqx_input_vl_specify').val());
                        $('#input_specify_maternity_leave').html('');

                          vacation_leave_application_type = $('input[name="vl_type"]:checked').val();

                          if(vacation_leave_application_type == 1){
                            $('#vl_ph').attr('checked',true);
                            $('#vl_abroad').attr('checked',false);
                          }else{
                            $('#vl_ph').attr('checked',false);
                            $('#vl_abroad').attr('checked',true);                      
                          }

                       


                        var forms = $('#print_leave_view').html();
        

                    } else if (leave_id == 4){ /*special*/


                       $('#spl_division_chief').html( $("#jqx_approved_list_leave").jqxDropDownList('getSelectedItem').label);
                       $('#spl_authorized_official').html( $("#jqx_autho_official_leave").jqxDropDownList('getSelectedItem').label);

                        var value = true;

                        $('#p_check_milestone').attr('checked' , value ==  $('#spcl_c_1').is(':checked'));
                        $('#f_check_obligations').attr('checked' , value ==  $('#spcl_c_2').is(':checked'));
                        $('#p_check_transactions').attr('checked' , value ==  $('#spcl_c_3').is(':checked'));

                        $('#p_check_obligations').attr('checked' , value ==  $('#spcl_c_4').is(':checked'));
                        $('#d_check_emergencies').attr('checked' , value ==  $('#spcl_c_5').is(':checked'));
                        $('#c_check_accident').attr('checked' , value ==  $('#spcl_c_6').is(':checked'));


                        $('#display_special_last_name').html(last_name); 
                        $('#display_special_first_name').html(first_name); 
                        $('#display_special_m_initial').html(middle_name); 

                        $('#display_division').html(office_division_name); 
                        $('#display_position').html(position_name); 


                       var forms = $('#print_spc_leave_view').html();

                    }else if (leave_id == 3){ /* maternity*/

                       $('#others_leave').show();
                       $('#sick_leave').hide();
                       $('.is_sick').show();


                       $('#input_specify_maternity_leave').html($('#jqx_input_ol_specify').val());

                       $('#vl_check_form').attr('checked' , false);
                       $('#leave_maternity').attr('checked' , true);

                         $('#vl_ph').attr('checked',false);
                         $('#vl_abroad').attr('checked',false);


                       var forms = $('#print_leave_view').html();


                    }else{

                       $('#others_leave').show();
                       $('#sick_leave').hide();
                       $('.is_sick').show();

                        $('#input_specify_vacation_leave').html('');
                        $('#input_specify_maternity_leave').html('');
                        $('#input_all_leave').html($('#jqx_input_ol_specify').val());

                       $('#vl_check_form').attr('checked' , false);
                       $('#leave_maternity').attr('checked' , false);
                       $('#leave_others').attr('checked' , true);


                         $('#vl_ph').attr('checked',false);
                         $('#vl_abroad').attr('checked',false);

                       var forms = $('#print_leave_view').html();
                    }



                }


                    var newWindow = window.open('', '', 'width=800, height=500'),
                    document = newWindow.document.open(),
                    pageContent =
                        '<!DOCTYPE html>\n' +
                        '<html>\n' +
                        '<head>\n' +
                        '<meta charset="utf-8" />\n' +
                        '<style> #body table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ border:none !important; font-size:12px !important;  height: 15px !important;margin: 0px !important; } </style>'  +
                        '</head>\n' +
                        '<body style="width: 700px;height: 900px;margin:auto;font-family:calibri;">\n' + header + '\n' + forms + '\n' + footer + '\n</body>\n</html>';
                    document.write(pageContent);
                    document.close();
                     newWindow.print();




            }else if (is_select == 'ot'){

                  var recommending_approval_id = $('#jqx_recommending_approval').val();
                  var approved_id = $('#jqx_approved_by_ot').val();
                  var employee_id = $('#jqxcombo').val();
                  var position_name = '';
                  var office_division_name = '';

                  var first_name = '';
                  var last_name = '';
                  var middle_name = '';


                 for (i in users){

                    if(users[i].employee_id == employee_id){

                      position_name = users[i].p_name;
                      office_division_name = users[i].office_division_name;
                      first_name = users[i].firstname;
                      last_name = users[i].l_name;
                      middle_name = users[i].m_name;
                        
                    }

                      if(users[i].employee_id == recommending_approval_id){

                        r_first_name = users[i].firstname;
                        r_last_name = users[i].l_name;
                        r_middle_name = users[i].m_name;
                        r_position_name = users[i].p_name;

                      }


                   if(users[i].employee_id == approved_id){

                        a_first_name = users[i].firstname;
                        a_last_name = users[i].l_name;
                        a_middle_name = users[i].m_name;
                        a_position_name = users[i].p_name;

                      }            
                             
                 }


                   $('#ot_name_employee').html(first_name + ' ' + middle_name + '. '  + last_name);
                   $('#ot_division_name').html(office_division_name);
                   $('#ot_task_to_be_done').html($('#jqx_task_to_be_done').val());
                   $('#ot_requested_time_inout').html($('#jqx_r_time_in').val() + ' - ' + $('#jqx_r_time_out').val());

                   $('#ot_reasons_if_rw').html($('#jqx_reasons_rw').val());
                   $('#ot_comments_remarks').html($('#jqx_ot_remarks_comment').val());


                   var ot_type = $('input[name="ot_type"]:checked').val();

                   if (ot_type == 1){
                      $('#ot_rw_select').html('X');
                      $('#ot_st_select').html('');
                   }else{
                      $('#ot_st_select').html('X');
                      $('#ot_rw_select').html('');
                   }

                   $('#ot_date_overtime').html($('#date_select').html());

                   $('#ot_recommend_name').html(r_first_name + ' ' + r_middle_name + '. '  + r_last_name);
                   $('#ot_recommending_name').html(r_first_name + ' ' + r_middle_name + '. '  + r_last_name);
                   $('#ot_recommending_position_name').html(r_position_name);


                   $('#ot_r_approved_by_name').html(a_first_name + ' ' + a_middle_name + '. '  + a_last_name);
                   $('#ot_a_approved_by_name').html(a_first_name + ' ' + a_middle_name + '. '  + a_last_name);
                   $('#ot_r_position_name').html(a_position_name);
                   $('#ot_a_position_name').html(a_position_name);



               var forms = $('#ot_form_print_view').html();


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


            }




         });

		
		/*re-send to email*/
		$(document).on("click","#resend_email", function() {
			var dtr_cover_id = $('#jqx_list_remaining_dtr_cover').val();
			
			alert(dtr_cover_id);
		})
		
		/*end*/


         /* button submit to hr */



        $('#jqx_list_remaining_dtr_cover').on('select', function (event) {

               var args = event.args;
               if (args) {
                   // index represents the item's index.                          
                   var index = args.index;
                   var item = args.item;
                   // get item's label and value.
                   var label = item.label;
                   var value = item.value;

                   var dtr_cover_list = LIST_COVER_DTR;


                   for(i in dtr_cover_list){

                      if(value == dtr_cover_list[i].dtr_cover_id){

                            var date_started = dtr_cover_list[i].date_started;    
                            var date_ended = dtr_cover_list[i].date_ended;
                            var is_allow_to_submit = dtr_cover_list[i].is_allow_to_submit;
                            var is_submitted = dtr_cover_list[i].is_submitted;
                            var date_deadline = dtr_cover_list[i].date_deadline;
                            var nwe_date_submission = dtr_cover_list[i].nwe_date_submission;
                              $('#btn_proceed_hr_submission').show();


                             var new_sch_date_cover = dtr_cover_list[i].new_sch_date_cover;

 
                         
    
                             $('#label_daterange').html(new_sch_date_cover);
                             $('#label_date_of_submission').html(nwe_date_submission);



                            if(is_submitted != 0){
                              
                              $('#btn_cancel_hr_submmision').show();
                              $('#btn_proceed_hr_submission').hide();
                              $('#date_covered_note_label').show();
                              $('#date_covered_note_label').html('Note: You have already submitted to HR, You may print the DTR again if you want but you cannot send another DTR without completing the previous one.');
                              $('#date_covered_note_label').css('color' , 'green');
							 $("#resend_email").show();
                              $('#jqxprint').show();
							  $('#resend_new_email').show();

                            }else{

                              $('#jqxprint').hide();
							  $('#resend_new_email').hide();
                              $('#btn_cancel_hr_submmision').show();
                              $('#btn_proceed_hr_submission').show();
                              $('#date_covered_note_label').show();
                           //   $('#date_covered_note_label').html('<strong> Note: </strong> <br/> You can now submit to HR <br/> (Please settle all incomplete requirements)<br/><br/><strong>DEADLINE OF SUBMISSION:</strong> <br/>'+ date_deadline);
                              $('#date_covered_note_label').css('color' , 'red');


                              if(is_allow_to_submit == 0){  
                                 $('#date_covered_note_label').html('Note: HR disabled the submission of DTR. Please check again later.. ');
                                 $('#date_covered_note_label').css('color' , 'red');  
                                 $('#btn_proceed_hr_submission').hide();     
                              }


                            }


                        
                            var date = new Date();
                            var firstDay = new Date(date_started);
                            var lastDay = new Date(date_ended);

                            var date1 = new Date();
                            date1.setFullYear(firstDay.getFullYear(), firstDay.getMonth(), firstDay.getDate());
                            var date2 = new Date();
                            date2.setFullYear(lastDay.getFullYear(), lastDay.getMonth(), lastDay.getDate());

                            $("#jqxdaterange").jqxDateTimeInput('setRange', date1, date2);

                            if(firstDay.getMonth() != lastDay.getMonth()){
                               var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');

                               var from_date = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
                               var to_date = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();



                              var employee_id = $('#jqxcombo').val();
                              var biometric_id = '';
                              var area_id = '';


                             for (i in users){

                                if(users[i].employee_id == employee_id){

                                  biometric_id = users[i].biometric_id;
                                  area_id = users[i].area_id;
                                    
                                }
                                   
                             }


                               processdtr(from_date  , to_date , biometric_id , area_id , employee_id);
                            }
 


                      }

                   }

                }

         });  




         $('#btn_cancel_hr_submmision').on('click' , function(){
            $(this).hide();
            $('#btn_proceed_hr_submission').hide();
            $("#jqx_list_remaining_dtr_cover").jqxDropDownList('clear'); 
            $("#jqx_list_remaining_dtr_cover").hide();
            $("#jqxprint").hide();
			$('#resend_new_email').hide();
            $('#date_covered_note_label').hide();
			
			$("#jqxdaterange").css({"margin-left":"0px"});
         });





          $('#jqx_buttonsubmitted_to_hr').on('click',function(){
              info 				  = {};
              info['employee_id'] = $('#jqxemployee_id').val();
              info['view_all'] 	  = 1;

              $("#jqx_list_remaining_dtr_cover").jqxDropDownList('clear'); 
				
              var getaremaining_dtr_cover = postdata(BASE_URL + 'reports/getremaining_dtr_cover' , info);
				// console.log( getaremaining_dtr_cover )
              if(getaremaining_dtr_cover != ""){

                    $('#jqx_cancel_it').show();
                    $('#jqx_list_remaining_dtr_cover').show();
                    $('#display_dtr_cover_process').show();
				

                    $('#btn_cancel_hr_submmision').show();
                    $('#btn_proceed_hr_submission').hide();
                    $('#jqxprint').hide();
					$('#resend_new_email').hide();

                      LIST_COVER_DTR = getaremaining_dtr_cover;

                      var list = new $.jqx.dataAdapter(getaremaining_dtr_cover);
                      $("#jqx_list_remaining_dtr_cover").jqxDropDownList({ source: list, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: 0, width: '330px' ,height: '25px' });

                        var dtr_cover_id = $('#jqx_list_remaining_dtr_cover').val();
						
                        var date_started = getaremaining_dtr_cover[0].date_started;
                        var date_ended = getaremaining_dtr_cover[0].date_ended;
                        var is_allow_to_submit = getaremaining_dtr_cover[0].is_allow_to_submit;
						
						/*
						// newly added function
						performajax(["Dtr/getstatus",{ dci : dtr_cover_id , emp : info['employee_id'] }], function(data) {
							// mark status
							var as_id = null;
							if (data != "false") {
								jQuery("<div class='findingsclass'>"+
											"<p class='notifytext'> The HR questions some of the documents you attached in your DTR. "+
												"<button class='btn btn-danger' id='findingswindow'> Click here to see those</button>"+
											"</p>"+
										"</div>").appendTo("#findingshere");
								
								jQuery(document).on("click","#findingswindow",function(){
									jQuery("#findingsmodal").modal("show");
									// findings: "[{"date":"March 12, 2018","msg":"uiouio"}]"
									// errorsonff
									
									as_id = data[0].as_id;
									jQuery(document).find("#correctedby").html(data[0].f_name);
									var findings = JSON.parse( data[0].findings );
									
									jQuery(document).find("#errorsonff").children().remove();
									for(var i=0;i<=findings.length-1;i++) {
										// <button class='btn btn-default btn-xs' id='replybtn'> Add Message </button> 
										// "<button class='btn btn-primary btn-xs'> this is ok </button>"+
										jQuery("<li id='li_id_"+i+"'>"+
													"<strong> "+findings[i].date+" </strong>"+
													"<p> "+findings[i].msg+" </p>"+
													"<div id ='replybox'>"+
														"<hr/>"+
														"<input type='text' class='form-control'/> <button class='btn btn-default btn-xs'> Reply </button>"+
													"</div>"+
											   "</li>").appendTo("#errorsonff");
										jQuery("<button>",{ class : "btn btn-primary btn-xs ", text : "This is OK"})
											.appendTo("#li_id_"+i)
												.on("click",function(){
													jQuery(this).parent("li").css({"background":"rgb(222, 218, 218)"});
												});
									}
								})
								
								jQuery(document).on("click","#resubmittohr",function() {
									var conf = confirm("Proceed?");
									
									if (conf) {
										performajax(['Dtr/resubmit',{ details : as_id }], function(data) {
											if (data == true) {
												window.location.reload();
											}
										})
									}
								})
								
								jQuery(document).on("click","#replybtn",function(){
									jQuery(document).find("#replybox").show();
								})
							}
							
						})
						
						*/
						// end 
				$("#jqxdaterange").css({"margin-left":"-20000px"});
              }else{
				 
                showmessage('Inactive employee' , 'danger');
              }

          });
		  
		  
		  
		  $("#showdtrcover").on("click",function() {
			  info = {};
              info['employee_id'] = $('#jqxemployee_id').val();
              info['view_all'] = 1;

              $("#jqx_list_remaining_dtr_cover").jqxDropDownList('clear'); 
 

              var getaremaining_dtr_cover = postdata(BASE_URL + 'reports/getremaining_dtr_cover' , info);


              if(getaremaining_dtr_cover != ""){

					
                    $('#jqx_cancel_it').show();
                    $('#jqx_list_remaining_dtr_cover').show();
                    $('#display_dtr_cover_process').show();


                    $('#btn_cancel_hr_submmision').show();
                    $('#btn_proceed_hr_submission').hide();
                    $('#jqxprint').hide();
					$('#resend_new_email').hide();

                      LIST_COVER_DTR = getaremaining_dtr_cover;

                      var list = new $.jqx.dataAdapter(getaremaining_dtr_cover);
                      $("#jqx_list_remaining_dtr_cover").jqxDropDownList({ source: list, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: 0, width: '330px' ,height: '25px' });

             
                        var dtr_cover_id = $('#jqx_list_remaining_dtr_cover').val();

                        var date_started = getaremaining_dtr_cover[0].date_started;
                        var date_ended = getaremaining_dtr_cover[0].date_ended;
                        var is_allow_to_submit = getaremaining_dtr_cover[0].is_allow_to_submit;
						$("#approvebtn").fadeIn();
              }else{
                showmessage('Inactive employee' , 'danger');
              }
		  })

		
		$("#btn_proceed_hr_submission").on("click",function() {
			//$(document).find("#towhom_div").fadeIn();
			$('#modal_proceed_submit').modal('show');
		})


        // $('#btn_proceed_hr_submission').on('click',function(){
         $(document).find('#proceed_sending').on('click',function(){
				$(this).attr({"disabled":"disabled"});
				
		          var info = {};

                  var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');

                  info['employee_id'] = $('#jqxemployee_id').val();

                  info['dtr_cover_id'] = $('#jqx_list_remaining_dtr_cover').val();
                  info['dtr_coverage'] = selection.from.toLocaleDateString() + ' - ' + selection.to.toLocaleDateString();
                  info['date_start_cover'] = selection.from.toLocaleDateString();
                  info['date_end_cover'] = selection.to.toLocaleDateString();
                  info['tardiness_undertime'] = $('#total_tardiness_undertime').html();
                  info['services_rendered'] = $('#total_services_r').html();

                  var deductions = {'tardiness' : SUMMARY_REPORT_TARDINESS , 'undertime' :SUMMARY_REPORT_UNDERTIME , 'ps' : SUMMARY_REPORT_PS_PERSONAL };

                  info['summary_report_deductions'] = JSON.stringify(deductions);

                  info['remarks'] = '';
                  info['leaves_on'] = '';  

                    var flag = 0;


                    var rows = $('#jqxgrid').jqxGrid('getrows');
                    var result = "";
                    for(var i = 0; i < rows.length; i++)
                    {
                        
                       var row = rows[i];
                       var exact_id =  row.exact_id;
                       var is_approved = row.is_appro;


                       if(exact_id != 0){ // && is_approved == 0
                          flag = 1;
                         // break;
                       }else{
                        flag =1;
                       }
                       
                    }

                    if(flag == 0){
					  // flag variable is always set to 1 to make sure this line don't run.
					  // edit at your own risk
                      showmessage('Incomplete requirements. You cannot submit it to the HR.' , 'warning');
                    }else {
						var exist  = postdata(BASE_URL + 'reports/getthe_countersign_id',selectedcoverid);
						
						// console.log( exist ); return; 
						if (exist == "new") {
							var result = postdata(BASE_URL + 'reports/updatesummaryreports',info); 
						} else {
							result 	   = selectedcoverid;
						}
						
						if(result){
							// notify the division chief by email
							// 1: mark here
							// use "unescape('string')" to decode
									
							var divisionchief = $(document).find("#division_selectopt").val();
							var dbmchief      = $(document).find("#dbm_selectopt").val();
								
							// return;
			
							var theform = encodeURI(gettheform());
							// var theform = JSON.stringify(gettheform());
							
							// var ttform  = get_the_attendance("","");
							// 1: mark here  
							// return;
							performajax(["My/sendNotificationToChief",{htmlcode:theform, sum_id:result , divchief:divisionchief , dbm:dbmchief }], function(ret) {
								if (ret == true || ret == "true"){
									$(".cs_div_style").html("<h4> Your DTR has been sent. </h4>  <br/> <button id='okbtndtr' class = 'btn btn-primary'> OK </button>");
									$('#date_covered_note_label').html('Your DTR has been sent.');
									
									$(document).on("click","#okbtndtr",function() {
										window.location.reload();
										// $(document).find("#showwindow").fadeOut();
									});
								}
							});
							
							//============================================================================================
							/*	record the activity */																/*||*/
							/*||*/	var d 		   = new Object();												    /*||*/
							/*||*/		d.activity = "Submitted DTR to division chief for countersigning";			/*||*/
							/*||*/																					/*||*/
							/*||*/		savetoactivity(0,d,"dtr_summary_reports",result);							/*||*/
							/*  end recording activity */															/*||*/
							//============================================================================================
							
							
							//__email_the_form(details);
							
						  $('#btn_proceed_hr_submission').hide();
						  $('#jqxprint').show();
						  $('#resend_new_email').show();
		  
						  info = {};
						  info['employee_id'] = $('#jqxemployee_id').val();
						  info['view_all'] = 1;
						  var getaremaining_dtr_cover = postdata(BASE_URL + 'reports/getremaining_dtr_cover' , info);
						  LIST_COVER_DTR = getaremaining_dtr_cover;
						  //$('#date_covered_note_label').html('Note: Congratulations, You may now print your DTR. <br/><br/> Please wait while we are collecting your data to send to your division chief. This may take a while. Thank you.');
						  //$('#date_covered_note_label').css('color' , 'green');
		 
						}
						
                    }

         });






        /*previlage conditions*/
		
		//$('#jqxcheckexact_approval').show();
		
        if(SES_USERTYPE == 'admin')
        {

          $('#view_admin_form').show();
          $('#jqxcheckexact_approval').show();
          $('#jqx_print_admin').show();

        }
        else if(ses_is_head == 1)
        {

           $('#view_admin_form').show();
           $('#jqxcheckexact_approval').show();
        //   $('#jqx_print_admin').hide(); // allowing employee to print his own DTR

           if(ses_level_sub_pap_div == 'Division'){
               $("#jqxdropdownbutton").jqxDropDownButton({ width: 300 , autoOpen: false , disabled : true});  
           }else{
               $("#jqxdropdownbutton").jqxDropDownButton({ width: 300 , autoOpen: true , disabled : false});  
           }

        }
        else 
        {

           //$('#view_admin_form').show();
           $('#view_admin_form').hide();
		   //$('#jqxcheckexact_approval').show();
           //$('#jqxcheckexact_approval').hide();
           
        //    $('#jqx_print_admin').hide();  // allowing employee to print his own DTR

        }
		
         $('#jqx_employment_type').val(ses_employment_type);  
         $('#jqxcombo').val(ses_employee_id); 
		 $("#jqxemployee_id").val(ses_employee_id);
        }); /*end document ready*/


        /*FUNCTIONS ===============================================================================================================================*/

        function saveob(attachments){


            var employee_id = 0;
            var leave_id = $('#jqxexceptions_leave').val();
            var exact_id = $("#jqx_check_exact_id").val();

            if(SES_USERTYPE == 'admin'){ 
              employee_id = $('#jqxemployee_id').val();
            }else{
                employee_id = ses_employee_id;
            }

   

                      var type_mode = $('#jqxexceptions').val();
                      var date_select = $('#date_select').html();


                      checkdate = date_select.substring(0, date_select.length - 3);


                      checkexact = {}
                      checkexact['exact_id'] = exact_id;
                      checkexact['ps_type'] = '';
                      checkexact['remarks'] = $('#jqx_remarks_ob').val();
                      checkexact['reasons'] = '';
                      checkexact['employee_id'] = employee_id;
                      checkexact['type_mode'] = type_mode;
                      checkexact['type_mode_details'] = $('#jqx_exceptions_ob').val();
                      checkexact['checkdate'] = checkdate;
                      checkexact['leave_id'] = 0;
                      checkexact['attachments'] = attachments;  



                      checkexact['division_chief_id'] = '';  
                      checkexact['paf_recorded_by_id'] = '';   
                      checkexact['paf_approved_by_id'] = '';   
                      checkexact['leave_authorized_official_id'] = ''; 
                      checkexact['hrmd_approved_id'] = '';  


                      checkexact['time_in'] = $('#jqxtime_in_ob').val();
                      checkexact['time_out'] = $('#jqxtime_out_ob').val();

                      var obj_checkexact_logs = [];


                      var rows = $("#jqxgrid").jqxGrid('selectedrowindexes');
                      var selectedRecords = new Array();

                      for (var m = 0; m < rows.length; m++) {

                          var row = $("#jqxgrid").jqxGrid('getrowdata', rows[m]);
                          var data = selectedRecords[selectedRecords.length] = row;

          
                          var date_select = data.this_date;

                          var date = date_select.substring(0, date_select.length - 3);
                          var days = date_select.slice(-2);

                              var checkexact_logs = [];  


                                var time = "";

                                var generate_shift = SHIFT_DATA;
                                for (i in generate_shift){

                                      var objCols = {
                                        checktype : generate_shift[i].type,
                                        shift_type : generate_shift[i].shift_type,
                                        // checktime : date + ' ' +  generate_shift[i].time_flexi_exact
                                        checktime : date + ' ' +  generate_shift[i].time_exact
                                      };  

                                     checkexact_logs.push(objCols); 
                                }


                                 var c_objCols = {
                                  data:checkexact_logs
                                 }

                              obj_checkexact_logs.push(c_objCols);
                           
                      }

    
                        savecheckexact(checkexact , obj_checkexact_logs);
                  

        }

		
		function savecto(attachments) {
			var _details = new Object();
				_details.checkdate = "";
				_details.attachments = attachments;
				
			performajax(["Leave/savecto",{ details : _details }], function(data){
				console.log(data);
			})
		}


        function saveleaves(attachments){

        
            var employee_id = 0;
            var leave_id = $('#jqxexceptions_leave').val();
            var exact_id = $("#jqx_check_exact_id").val();

            if(SES_USERTYPE == 'admin'){ 
              employee_id =  $('#jqxemployee_id').val();
            }else{
                employee_id = ses_employee_id;
            }

                      var type_mode = $('#jqxexceptions').val();
                      var date_select = $('#date_select').html();


                      checkdate = date_select.substring(0, date_select.length - 3);
                      checkexact = {}

                      checkexact['exact_id'] = exact_id;
                      checkexact['ps_type'] = '';
                      checkexact['time_in'] = '';
                      checkexact['time_out'] = '';
                      checkexact['type_mode_details'] = '';
                      checkexact['employee_id'] = employee_id;
                      checkexact['type_mode'] = type_mode;
                      //checkexact['checkdate'] = checkdate;
                      checkexact['remarks'] = '';
                      checkexact['reasons'] ='';
                      checkexact['leave_id'] = leave_id;
                      checkexact['attachments'] = attachments;



                      checkexact['division_chief_id'] = $('#jqx_approved_list_leave').val();  
                      checkexact['paf_recorded_by_id'] = '';   
                      checkexact['paf_approved_by_id'] = '';   
                      checkexact['leave_authorized_official_id'] = $('#jqx_autho_official_leave').val()
                      checkexact['hrmd_approved_id'] = 29 ; /* herlyn gallo hrmd */


                      var obj_checkexact_logs = [];

                      var rows = $("#jqxgrid").jqxGrid('selectedrowindexes');
                      var selectedRecords = new Array();


                      checkexact['no_days_applied'] = rows.length;
                      checkexact['leave_application_details'] = '';
                      checkexact['spl_personal_milestone'] = '';
                      checkexact['spl_filial_obligations'] = '';
                      checkexact['spl_personal_transaction'] = '';
                      checkexact['spl_parental_obligations'] = '';
                      checkexact['spl_domestic_emergencies'] = '';
                      checkexact['spl_calamity_acc'] = '';
                      checkexact['spl_first'] = '';
                      checkexact['spl_second'] = '';
                      checkexact['spl_third'] = '';

                      var is_halfday = 0;
                      var am_pm_select = '';

                      if(leave_id == 1){ /*  SICK */

                          checkexact['is_halfday'] = $('#input_halfday').prop('checked')  ? 1 : 0;
                          checkexact['am_pm_select'] = $('input[name="am_pm_select"]:checked').val();

                          checkexact['reasons'] = $('#jqx_input_sl_specify').val();
                          checkexact['leave_application_details'] = $('input[name="sl_type"]:checked').val();

                          is_halfday = checkexact['is_halfday'];
                          am_pm_select = checkexact['am_pm_select'];

                      }else if (leave_id == 2){ /* VACATION */

                         checkexact['is_halfday'] = $('#input_halfday').prop('checked')  ? 1 : 0;
                         checkexact['am_pm_select'] = $('input[name="am_pm_select"]:checked').val();

                         checkexact['reasons'] = $('#jqx_input_vl_specify').val();
                         checkexact['leave_application_details'] = $('input[name="vl_type"]:checked').val();

                          is_halfday = checkexact['is_halfday'];
                          am_pm_select = checkexact['am_pm_select'];                         

                      }else if(leave_id == 4){ /* SPECIAL */

                        checkexact['spl_personal_milestone'] = $('#spcl_c_1').prop('checked')  ? 1 : 0;
                        checkexact['spl_filial_obligations'] =  $('#spcl_c_2').prop('checked')  ? 1 : 0;
                        checkexact['spl_personal_transaction'] =  $('#spcl_c_3').prop('checked')  ? 1 : 0;
                        checkexact['spl_parental_obligations'] = $('#spcl_c_4').prop('checked')  ? 1 : 0;
                        checkexact['spl_domestic_emergencies'] = $('#spcl_c_5').prop('checked')  ? 1 : 0;
                        checkexact['spl_calamity_acc'] = $('#spcl_c_6').prop('checked')  ? 1 : 0;

                        checkexact['spl_first'] = '';
                        checkexact['spl_second'] = '';
                        checkexact['spl_third'] = '';

                      }else{

                          checkexact['reasons'] = $('#jqx_input_ol_specify').val();  
                      }

          

                    var allow_to_leave = true;

                    var obj_inclusive_dates = [];





                      for (var m = 0; m < rows.length; m++) {
                      
                          var row = $("#jqxgrid").jqxGrid('getrowdata', rows[m]);
                          var data = selectedRecords[selectedRecords.length] = row;


        
                          var date_select = data.this_date;
                          var date = date_select.substring(0, date_select.length - 3);


                          var inclusive_dates = {'date' : date };
                          obj_inclusive_dates.push(inclusive_dates);

                          var days = date_select.slice(-2);

                          if(days == 'Sa' || days == 'Su'){ 

                            allow_to_leave = false;

                          }else{

                              var checkexact_logs = [];  
                              var time = "";
                              var generate_shift = SHIFT_DATA;

                                for (i in generate_shift){


                                    if(is_halfday == 1 && am_pm_select == 'AM' && generate_shift[i].shift_type == 'AM_START' || is_halfday == 1 && am_pm_select == 'AM' && generate_shift[i].shift_type == 'AM_END'){

                                      var objCols = {
                                        checktype : generate_shift[i].type,
                                        shift_type : generate_shift[i].shift_type,
                                        // checktime : date + ' ' +  generate_shift[i].time_flexi_exact
                                        checktime : date + ' ' +  generate_shift[i].time_exact
                                      };  

                                      checkexact_logs.push(objCols); 

                                    }else if(is_halfday == 1 && am_pm_select == 'PM' && generate_shift[i].shift_type == 'PM_START' || is_halfday == 1 && am_pm_select == 'PM' && generate_shift[i].shift_type == 'PM_END'){

                                      var objCols = {
                                        checktype : generate_shift[i].type,
                                        shift_type : generate_shift[i].shift_type,
                                        // checktime : date + ' ' +  generate_shift[i].time_flexi_exact
                                        checktime : date + ' ' +  generate_shift[i].time_exact
                                      };  

                                      checkexact_logs.push(objCols); 

                                    }else if(is_halfday == 0){

                                      var objCols = {
                                        checktype : generate_shift[i].type,
                                        shift_type : generate_shift[i].shift_type,
                                        // checktime : date + ' ' +  generate_shift[i].time_flexi_exact
                                        checktime : date + ' ' +  generate_shift[i].time_exact
                                      };  


                                      checkexact_logs.push(objCols); 
                                    }


                                   
                                }

                                 var c_objCols = {
                                  data:checkexact_logs
                                 }

                              obj_checkexact_logs.push(c_objCols);
                          }   
                      }



                      /* SAVING */

                      if(allow_to_leave == true){


                          /* sort dates ascending */
                          obj_inclusive_dates.sort(function (a, b) {
                              var key1 = new Date(a.date);
                              var key2 = new Date(b.date);

                              if (key1 < key2) {
                                  return -1;
                              } else if (key1 == key2) {
                                  return 0;
                              } else {
                                  return 1;
                              }
                          }); 


                        var datedetails = date_details(obj_inclusive_dates);

                        checkexact['checkdate'] = datedetails;

                        var first_day_leave = obj_inclusive_dates[0].date;

                          var f_day_leave  = new Date(first_day_leave);
        
                          startDate = new Date();
                          var today_add_5 = "", noOfDaysToAdd = 5, count = 0;
                          while(count < noOfDaysToAdd){
                              today_add_5 = new Date(startDate.setDate(startDate.getDate() + 1));
                              if(today_add_5.getDay() != 0 && today_add_5.getDay() != 6){
                                 count++;
                              }
                          }


                            var date1 = new Date();
                            date1.setFullYear(today_add_5.getFullYear(), today_add_5.getMonth(), today_add_5.getDate());
                            var date2 = new Date();
                            date2.setFullYear(f_day_leave.getFullYear(), f_day_leave.getMonth(), f_day_leave.getDate());

                          
							console.log( obj_checkexact_logs );
                            if(date1 <= date2){
                              savecheckexact(checkexact , obj_checkexact_logs); 
                               
                            }else{
                              if(exact_id != 0){
                                  savecheckexact(checkexact , obj_checkexact_logs); 
                              }else if (leave_id == 1){ 
                                  savecheckexact(checkexact , obj_checkexact_logs); 
                              }else{
								// mark 2
                                  savecheckexact(checkexact , obj_checkexact_logs); 
                                  //showmessage('Sorry! You may file a leave after 5 days', 'warning');
                              }
                            }

                      }else{
                         showmessage('You cannot file leaves saturday or sunday', 'danger');
                      }

              
        }



        function date_details(data){

                  var monthNames = [
                    "Jan", "Feb", "Mar",
                    "Apr", "May", "Jun", "Jul",
                    "Aug", "Sep", "Oct",
                    "Nov", "Dec"
                  ];

                  var m_inc = '';
                  var d_inc = '';
                  var y_inc = '';

                  var gg = [];


                  var month_ = ''
                  var year_ = ''
                  var c_year = ''
                  for( i in data){
                     
                    var date = new Date(data[i].date);
                    var month = date.getMonth();
                    var day = date.getDate();
                    var year = date.getFullYear();
                    
                    if(year != year_){
                      y_inc = year;
                   
                      if(month != month_){
                         m_inc += '' + monthNames[month] + ' ' + day + ',';  
                        
                         month_ = month;

                       }else if (month == month_){
                        
                          d_inc += '' + day + ',' ;       
                       }  
                      
                      year_ = year;
                     
                    }else if (year == year_){
                        
                      if(month != month_){
                          m_inc += '' + monthNames[month] + ' ' + day + ',' ;        
                         month_ = month;
                       }else if (month == month_){      
                          m_inc +=  + ' ' + day + ',';  
                         
                       }        
                    }
                     
                  }

              return m_inc + ' ' + d_inc + ' ' + year;
        }




        function saveot(){


            var date_select = $('#date_select').html();
            var checkdate = date_select.substring(0, date_select.length - 3);


            info = {};
            info['checkexact_ot_id'] = $('#text_hidden_ot_id').val();
            info['employee_id'] = $('#jqxcombo').val();
            info['task_to_be_done'] = $('#jqx_task_to_be_done').val();
            info['remarks'] = $('#jqx_ot_remarks_comment').val();


            info['r_time_in'] = checkdate +  ' ' + $('#jqx_r_time_in').val();
            info['r_time_out'] = checkdate + ' ' + $('#jqx_r_time_out').val();

            info['checkdate'] = checkdate;

            info['recommending_approval_id'] = $('#jqx_recommending_approval').val();
            info['approved_by_id'] = $('#jqx_approved_by_ot').val();

            info['reasons_if_rw'] = $('#jqx_reasons_rw').val();


            info['ot_type'] = $('input[name="ot_type"]:checked').val();


            var rows = $("#jqxgrid").jqxGrid('selectedrowindexes');

            if(rows.length == 1){ 

                var update_ot = postdata(BASE_URL + 'leaveadministration/updateot' , info);

                  if(update_ot){

                         var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');

                         var from_date = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
                         var to_date = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();


                         for (i in users){

                            if(users[i].employee_id == $('#jqxcombo').val()){

                              biometric_id = users[i].biometric_id;
                              area_id = users[i].area_id;
                                
                            }   
                        }


                         processdtr(from_date  , to_date , biometric_id ,area_id , $('#jqxcombo').val());

                          //var ot_id = update_ot.replace(/"/g, '');           
                          window.open(BASE_URL + 'reports/applications/'+ parseInt(update_ot) +'/'+'OT'); 
                   
                          $('#modal_exceptions').modal('hide');
                          $('#file_reset').trigger('click');
                          $('#btn_save_checklogs').prop('disabled', false);

                  }

            }else{

              showmessage('You can only file one overtime per day!' , 'danger');

            }

        }



        /* insert ams , pass slip ,  paf , CA, CTO*/

        function saveamspspaf(attachments){


            if(SES_USERTYPE == 'admin'){
                employee_id =  $('#jqxemployee_id').val();
            }else{
                employee_id = ses_employee_id;
            }

            var exact_id = $("#jqx_check_exact_id").val();


            checkexact = {};

                      var type_mode = $('#jqxexceptions').val();
                      var remarks = $('#jqxinput_remarks').val();
                      var reasons = $('#jqxinput_reasons').val();
                      var date_select = $('#date_select').html();

                      checkdate = date_select.substring(0, date_select.length - 3);

                      checkexact['exact_id'] = exact_id;


                       /* default */
                      checkexact['time_in'] = '';
                      checkexact['time_out'] = '';
                      checkexact['type_mode'] = type_mode;
                      checkexact['type_mode_details'] = '';
                      checkexact['leave_id'] =  0;
                      checkexact['employee_id'] = employee_id;
                      checkexact['type_mode'] = type_mode;
                      checkexact['remarks'] = remarks;
                      checkexact['reasons'] = reasons;
                      checkexact['checkdate'] = checkdate; 
                                            
                      checkexact['ps_type'] = $('input[name="ps_type"]:checked').val();


                      checkexact['attachments'] = attachments;  


                      checkexact['division_chief_id'] = '';  
                      checkexact['paf_recorded_by_id'] = '';   
                      checkexact['paf_approved_by_id'] = '';   
                      checkexact['leave_authorized_official_id'] = ''; 
                      checkexact['hrmd_approved_id'] = '';  

                      if(type_mode == "PS"){
                        checkexact['time_in'] = $('#jqxtime_in_ps').val();
                        checkexact['time_out'] = $('#jqxtime_out_ps').val();
                        checkexact['division_chief_id'] = $('#jqx_approved_list').val();

                      }else if (type_mode == "PAF"){
                        checkexact['time_in'] = $('#jqxtime_in_paf').val();
                        checkexact['time_out'] = $('#jqxtime_out_paf').val();

                        checkexact['paf_recorded_by_id'] = $('#jqx_recorded_by_paf').val();
                        checkexact['division_chief_id'] = $('#jqx_approved_list_paf').val();
                        checkexact['paf_approved_by_id'] = $('#jqx_approved_list_paf_1').val();

                        checkexact['reasons'] = $('#jqxinput_reason_justification').val();
                        checkexact['remarks'] = $('#jqxinput_remarks_paf').val();
                      } else if (type_mode == "CA") {
						checkexact['reasons'] = $('#jqxinput_ca_reasons').val();  
					  } else if (type_mode == "CTO") {
						checkexact['time_in']  = $('#jqxtime_in_cto').val();
                        checkexact['time_out'] = $('#jqxtime_out_cto').val();
					  } else if (type_mode == "OT") {
						 checkexact['is_approved'] = 1;   
					  }


                      var checkexact_logs = [];  

                      if (type_mode  == 'AMS'){

                       var time = "";

                        for (i = 1; i<5 ; i++){
                           var time = "";
                           var checktype = $('#jqx_hide_'+i).attr('c_type');
                           var shift_type = $('#jqx_hide_'+i).attr('s_type');
                              time = $('#jqxtime_'+i).jqxDateTimeInput('val');
                                if($('#jqxtime_'+i+'_check:checked').val() == 'on'){

                                     var objCols = {
                                      checktype : checktype,
                                      shift_type : shift_type,
                                      checktime : checkdate + ' ' + time
                                    };  
                                  checkexact_logs.push(objCols);   
                              }
                        }
						
                      }else{

                        var flag = 0;
                        var generate_temp_shift = TEMPORARY_SHIFT;

                        for (i in generate_temp_shift){

                            if(generate_temp_shift[i].date == checkdate){

                               var tempshift =  generate_temp_shift[i].temp_shift;

                                for (l in tempshift){

                                    var objCols = {
                                      checktype : tempshift[l].type,
                                      shift_type : tempshift[l].shift_type,
                                      checktime : checkdate + ' ' +  tempshift[l].time_flexi_exact
                                      // checktime : checkdate + ' ' +  tempshift[l].time_exact
                                    };  

                                   checkexact_logs.push(objCols);   
                                }

                                flag = 1;
                            }

                        }


                          if(flag == 0){

                               var generate_shift = SHIFT_DATA;
                                for (x in generate_shift){

                                      var objCols = {
                                        checktype : generate_shift[x].type,
                                        shift_type : generate_shift[x].shift_type,
                                        checktime : checkdate + ' ' +  generate_shift[x].time_flexi_exact
                                        // checktime : checkdate + ' ' +  generate_shift[x].time_exact
                                      };  

                                     checkexact_logs.push(objCols); 
                                }
                          }

                      }

                     var rows = $("#jqxgrid").jqxGrid('selectedrowindexes');
                      
					 
                     if(rows.length == 1){

                        if(checkexact_logs.length > 0){
                           savecheckexact(checkexact , checkexact_logs); 
                        }else{
                           showmessage('No AMS found', 'danger');
                        }
                       
                     }else{
						showmessage('You can only file 1 ams, ps and paf per day.', 'danger');
                     }
					 

        }



	// mark savecheckexact
        function savecheckexact(checkexact , checkexact_logs){
			
             $.ajax({
               type: 'POST',
               url: BASE_URL + 'attendance/savecheckexact',
               data: { 'checkexact' : checkexact , 'checkexact_logs' : checkexact_logs},
               dataType : 'json',
               beforeSend: function(){

                  $('#btn_save_checklogs').prop('disabled', true);
                
               },
               success: function (data) {
				 
                    var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');


                   var from_date = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
                   var to_date = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();


                    var employee_id = $('#jqxcombo').val();
                    var biometric_id = '';
                    var area_id = '';


                   for (i in users){

                      if(users[i].employee_id == employee_id){

                        biometric_id = users[i].biometric_id;
                        area_id = users[i].area_id;
                          
                      }
                         
                   }
					
					// processdtr function is found in v2.mindajsmodel.js
						processdtr(from_date  , to_date , biometric_id ,area_id , employee_id);
					// end
					
                    var type_mode = checkexact['type_mode'];
					
                    if (type_mode == 'PS' || type_mode == 'PAF' || type_mode == 'LEAVE'){ 
						
					var win_dow   = "#showwindow";
					var load_here = "#pop_upwindow";
					
                      if(data.type == 'insert'){
                          info = {};
                          info['employee_id'] = employee_id;
                          info['exact_id'] = parseInt(data.exact_id);
                          info['description'] = 'requested';

                          notifyMe(info);
						  
                      }
						//window.open(BASE_URL + 'reports/applications/'+ parseInt(data.exact_id) +'/'+type_mode); 
                    }
					
                    $('#modal_exceptions').modal('hide');
                    $('#file_reset').trigger('click');
                    $('#btn_save_checklogs').prop('disabled', false);

               },
			   error : function(a,b,c) {
				   alert(a+b+c)
			   }
           });  

        }

        function savemodifiedchecklogs(data_logs){

             $.ajax({
               type: 'POST',
               url: BASE_URL + 'reports/savelogs',
               data: { 'data' : data_logs },
               dataType : 'json',
               beforeSend: function(){
                
               },
               success: function (data) {
                alert('success');   
               }
           });  
        }


/*
        function processdtr(sdate, edate , biometric_id , area_id , employee_id){
			// refer to v2.mindajsmodel.js
            $.ajax({
               type: 'POST',
               url: BASE_URL + 'reports/generatedtrs',
               data: { 'sdate' : sdate , 'edate' : edate , 'userid' : biometric_id , 'area_id' : area_id , 'employee_id' : employee_id },
               dataType : 'json',
               beforeSend: function(){
                
               },
               success: function (data) {
					
                 generatedtr(data.dtr_array);
				
                 var compute_lates = data.compute_lates;
                 $("#late_times").html(data.count_lates);
                 $("#late_d").html(compute_lates.day);
                 $("#late_h").html(compute_lates.hours);
                 $("#late_m").html(compute_lates.minutes);

                /* total lates display */
			/*
                 $('#total_lates_input_display').html(data.count_lates + 'x ' + compute_lates.day +':'+compute_lates.hours+':'+compute_lates.minutes);

                var compute_undertime = data.compute_undertime;
                 $("#un_times").html(data.count_undertime);
                 $("#un_d").html(compute_undertime.day);
                 $("#un_h").html(compute_undertime.hours);
                 $("#un_m").html(compute_undertime.minutes);


                $('#total_undertime_input_display').html(data.count_undertime + 'x ' + compute_undertime.day +':'+compute_undertime.hours+':'+compute_undertime.minutes);

                 var compute_absences = data.compute_absences;
                 $("#ab_times").html(data.count_absences);
                 $("#ab_d").html(compute_absences.day);
                 $("#ab_h").html(compute_absences.hours);
                 $("#ab_m").html(compute_absences.minutes);

                 $('#total_absences_input_display').html(data.count_absences + 'x ' + compute_absences.day +':'+compute_absences.hours+':'+compute_absences.minutes);

                 var compute_ps = data.compute_ps;
                 $('#ps_no_times').html(data.count_ps);
                 $('#ps_d_').html(compute_ps.day);
                 $('#ps_h_').html(compute_ps.hours);
                 $('#ps_m_').html(compute_ps.minutes);

                 $('#total_ps_input_display').html(data.count_ps + 'x ' + compute_ps.day +':'+compute_ps.hours+':'+compute_ps.minutes);               
                        

                 var compute_total = data.compute_total;
                 $("#to_times").html(data.count_total);
                 $("#to_d").html(compute_total.day);
                 $("#to_h").html(compute_total.hours);
                 $("#to_m").html(compute_total.minutes);

                 $('#total_input_display').html(data.count_total + 'x ' + compute_total.day +':'+compute_total.hours+':'+compute_total.minutes);   

                 $('#total_working_days').html(data.count_total_working_days);   
                 $('#total_services_r').html(data.count_total_services_rendered);   


                 $('#total_time_shift_sched').html(data.time_shift_schedule); 

                 if(data.temporary_time_shifts != ''){
                  $('#total_temporary_shift').html('TEMPORARY SHIFT/S: <br>'  + data.temporary_time_shifts);
                 }else{
                  $('#total_temporary_shift').html('');
                 }
					
 
                 $('#total_tardiness_undertime').html(data.tardiness_undertime);   


                 $('#total_holidays').html(data.total_holidays);   
                 $('#total_holiday_services_r').html(data.total_holiday_services_r);   
                 $('#total_holiday_tardiness_undertime').html(data.total_holiday_tardiness_undertime);   


                 $('#label_official_hours').html(data.time_shift_schedule);

                 var employee_details = data.employee_details;

                 if(employee_details[0].employment_type == 'JO'){
                   $('.regular_table').hide();
                 }else{
                  $('.regular_table').show();
                 }


                 var shift = data.shift;
                 SHIFT_DATA = shift;
                 TEMPORARY_SHIFT = data.temporary_shift;
				

                 SUMMARY_REPORT_TARDINESS = data.summary_report_tardiness;
                 SUMMARY_REPORT_UNDERTIME = data.summary_report_undertime;
                 SUMMARY_REPORT_PS_PERSONAL = data.summary_report_ps_personal;
             
                var am_start = covertampmto24hour(shift[0].time_flexi_exact);
                var am_end  = covertampmto24hour(shift[1].time_flexi_exact);
                var pm_start = covertampmto24hour(shift[2].time_flexi_exact);
                var pm_end = covertampmto24hour(shift[3].time_flexi_exact);

          

                /* fill shifting */
/*
                             $("#jqxtime_1").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                             var t = new Date(2016, 05, 16, am_start.hours , am_start.minutes, 0, 0);
                             $('#jqxtime_1').jqxDateTimeInput('setDate', t);


                             $("#jqxtime_2").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                             var t = new Date(2016, 05, 16, am_end.hours, am_end.minutes, 0, 0);     
                             $('#jqxtime_2').jqxDateTimeInput('setDate', t);  


                             $("#jqxtime_3").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                             var t = new Date(2016, 05, 16, pm_start.hours, pm_start.minutes, 0, 0);     
                             $('#jqxtime_3').jqxDateTimeInput('setDate', t);  


                             $("#jqxtime_4").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                             var t = new Date(2016, 05, 16, pm_end.hours, pm_end.minutes, 0, 0);     
                             $('#jqxtime_4').jqxDateTimeInput('setDate', t); 
 
        
  
                 $('#vl_times').html(data.count_vl);
                 $('#sl_times').html(data.count_sl);




                 $('#jqxemployee_id').val(employee_id);



                 if(data.shifting_msg){
                      console.log(data.shifting_msg);
                 }

               }, error : function(a,b,c) {
					alert(a+b+c)
			   }

           });  
        }
	*/


    function generatedtr(dtr_array){
		// mark gendtr
console.log(dtr_array);

        var data = new Array();

        var today = new Date();
        var mm = today.getMonth()+1
        var today = mm + '/' + today.getDate() + '/'+today.getFullYear();



        var id = $('#jqxcombo').val();
        var user_name =   $('#jqxfullname').val();

        var index = 0;
        var index_1 = '';
       
          for (i in dtr_array){
        
              var row = {};
              var color = ''; 
              var display_span_holiday = '';

            if(dtr_array[i].IS_APPROVED == 1){
                color = "green";
            }else if (dtr_array[i].IS_APPROVED == 0){
                color = "red";
            }

            if(dtr_array[i].is_holiday == 1){
              display_span_holiday = ' <span style="font-weight:bold; font-size:11px; color:#9C27B0; ">(H)</span>';
            }


            if(dtr_array[i].EXCEPTION != '0' && dtr_array[i].EXCEPTION != ''){
               row["CHECKDATE"] = dtr_array[i].CHECKDATE + ' <span style="font-size:11px; color:'+color+'"> (' +dtr_array[i].EXCEPTION+ ') ' + display_span_holiday + ' </span>' ;
            }else{
               row["CHECKDATE"] = dtr_array[i].CHECKDATE + display_span_holiday;
            }




            var this_date_1 = dtr_array[i].CHECKDATE;
            var checkdate_1 = this_date_1.substring(0, this_date_1.length - 3);

              

            if(checkdate_1 == today){
                 index_1 = index;
                 row["CHECKDATE"] = '<span style="font-weight:bold; color: blue ; padding:1px;  border-radius:2px 2px;">' + row["CHECKDATE"] + display_span_holiday + '</span>';
            }


             index++;

             



           
            row["this_date"] = dtr_array[i].CHECKDATE;
            row["types_md"] = dtr_array[i].EXCEPTION;
            row["is_appro"] = dtr_array[i].IS_APPROVED;
            row["lates"] = dtr_array[i].lates;
            row["undertime"] = dtr_array[i].undertime;
            row["ps"] = dtr_array[i].final_ps;





            var f_ot =  dtr_array[i].final_ot;
            var final_ot = '';



            




            row["ot_id"] = dtr_array[i].ot_id;
            row["div_is_approved"] = dtr_array[i].div_is_approved;
            row["total_hours_rendered"] = dtr_array[i].total_hours_rendered;





            if(dtr_array[i].ot_id == 0 && dtr_array[i].div_is_approved == 0){

               final_ot = f_ot;

            }else{


              if(dtr_array[i].div_is_approved == 1){

                    if(f_ot != ''){
                      final_ot = '<span style="color:green;">' + f_ot + ' </span>';
                    }else{
                      final_ot = '<span style="color:green;">OT</span>';
                    }
               
              }else{

                    if(f_ot != ''){
                      final_ot = '<span style="color:red;">' + f_ot + ' </span>';
                    }else{
                      final_ot = '<span style="color:red;">OT</span>';
                    }

              }


            }



            row["ot"] = final_ot;


            var res_exact_id = dtr_array[i].exact_id;

            if(res_exact_id == ''){
                res_exact_id = 0;
            }

    
          
            row["exact_id"] = res_exact_id;
    
            row["TIME1"] = "";
            row["TIME2"] = "";
            row["TIME3"] = "";
            row["TIME4"] = "";
            row["TIME5"] = "";
            row["TIME6"] = "";

            var srow = dtr_array[i].CHECKINOUT;


            var c = 1;

            var cc = 0;
            var types_md = "0";
			
            for (s in srow){

                  var types_md = "";
                  var exact_id = "0";
                 
                  types_md = srow[s].TYPE_MODE;
				  
                  var time_type_mode = '';

                    if(types_md == "0"){

                      time_type_mode = srow[s].TIME;
                    


                    }else if(types_md != '' && srow[s].TIME != ''){ 

                      var time = srow[s].TIME;
						// alert("here"+types_md)
                      if(types_md == "LEAVE" || types_md == "PS" || types_md == "PAF" || types_md == "CTO" || types_md == "OB" || types_md == "CA"){
                         time = '';
                      }

                       exact_id = srow[s].exact_id;
                       time_type_mode  = '<span id="'+srow[s].exact_id+'_'+srow[s].exact_log_id+'"style="color:'+color+';"> ' + time + ' </span>';

                    }


                    if (srow[s].TIME != ""){
                       cc++;
                    }



               row["TIME"+c] = time_type_mode;
               row['count'] = parseInt(cc) + parseInt(res_exact_id);

              c++;

            } 


                    data[i] = row;
          }

		// mark groupid

            var source =
            {
                localdata: data,
                datatype: "array"
            };
            var dataAdapter = new $.jqx.dataAdapter(source, {
                loadComplete: function (data) { },
                loadError: function (xhr, status, error) { }      
            });
			
            $("#jqxgrid").jqxGrid(
            {
                source: dataAdapter,
                autoheight:true,
                selectionmode: 'checkbox',
                //width:920,
                width:'100%',
                columns: [
                  { text: user_name, datafield: 'CHECKDATE'  ,width: 255},
                  { text: 'IN', datafield: 'TIME1' ,width: 120 ,  align: 'center' , cellsalign: 'center'},
                  { text: 'OUT', datafield: 'TIME2'  ,width: 120 ,  align: 'center' , cellsalign: 'center'},
                  { text: 'IN', datafield: 'TIME3' ,width: 120 ,  align: 'center' , cellsalign: 'center'},
                  { text: 'OUT', datafield: 'TIME4' ,width: 120 ,  align: 'center' , cellsalign: 'center'},
                  { text: 'IN', datafield: 'TIME5'   ,width: 120 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'OUT', datafield: 'TIME6' ,width: 120 ,   align: 'center' , cellsalign: 'center'},
                  { text: '<p style="margin:0px; font-size:9px; ">HOURS RENDERED</p><p style="font-size:9px; ">AM/PM</p>', datafield: 'total_hours_rendered' ,width: 130 ,   align: 'center' , cellsalign: 'center'},
                  { text: '<p style="margin:0px; font-size:9px; ">LATE</p><p style="font-size:9px; ">AM/PM</p>' ,width: 100 ,  datafield: 'lates' ,  align: 'center' , cellsalign: 'center'},
                  { text: '<p style="margin:0px; font-size:9px; ">UNDERTIME</p><p style="font-size:9px; ">AM/PM</p>' ,width: 100 , datafield: 'undertime' ,  align: 'center' , cellsalign: 'center'},
                  { text: '<p style="margin:0px; font-size:9px; ">PS</p><p style="font-size:9px; ">AM/PM</p>', datafield: 'ps' ,width: 100 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'OT', datafield: 'ot' ,width: 100 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'exact_id', datafield: 'exact_id' ,width: 50 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'count', datafield: 'count' ,width: 50 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'types_mode', datafield: 'types_md' ,width: 50 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'apprved', datafield: 'is_appro' ,width: 50 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'this_date', datafield: 'this_date' ,width: 100 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'ot_id', datafield: 'ot_id' ,width: 50 ,   align: 'center' , cellsalign: 'center'},
                  { text: 'ot_approved', datafield: 'div_is_approved' , width: 50 ,   align: 'center' , cellsalign: 'center'}                
                ]
            });   

    


            $("#jqxgrid").jqxGrid('hidecolumn', 'exact_id');
            $("#jqxgrid").jqxGrid('hidecolumn', 'count');
            $("#jqxgrid").jqxGrid('hidecolumn', 'types_md');
            $("#jqxgrid").jqxGrid('hidecolumn', 'is_appro');
            $("#jqxgrid").jqxGrid('hidecolumn', 'this_date');
            $("#jqxgrid").jqxGrid('hidecolumn', 'ot_id');
            $("#jqxgrid").jqxGrid('hidecolumn', 'div_is_approved');



            $('#jqxgrid').on('rowselect', function (event) {

                // event arguments.
                var args = event.args;
                // row's bound index.
                var rowBoundIndex = args.rowindex;
           
                var rowData = args.row;

                if (typeof rowBoundIndex === 'number') {
                    if (rowData.count === 4) {
                        $('#jqxgrid').jqxGrid('unselectrow', rowBoundIndex);
                    }
                } else if (typeof rowBoundIndex === 'object') {
                    var rows = $('#jqxgrid').jqxGrid('getrows');
                    for (var i = 0; i < rows.length; i++) {
                        if (rows[i].count === 4) {
                            $('#jqxgrid').jqxGrid('unselectrow', i);
                        }
                    }
                } 

                    var exact_id = rowData.exact_id;


                    if(exact_id != 0){

                        var rows = $('#jqxgrid').jqxGrid('getrows');
                        for (var i = 0; i < rows.length; i++) {
                            if (rows[i].exact_id == exact_id) {
                                $('#jqxgrid').jqxGrid('selectrow', i);
                            }else{
                                $('#jqxgrid').jqxGrid('unselectrow', i);
                            }
                        }
                   }



            });



            $('#jqxgrid').on('rowunselect', function (event) {

                // event arguments.
                var args = event.args;
                // row's bound index.
                var rowBoundIndex = args.rowindex;
    
                var rowData = args.row;

                  var exact_id = rowData.exact_id;


                    if(exact_id != 0){

                        var rows = $('#jqxgrid').jqxGrid('getrows');
                        for (var i = 0; i < rows.length; i++) {
                            if (rows[i].exact_id == exact_id) {
                                $('#jqxgrid').jqxGrid('unselectrow', i); 
                            }
                        }
                   }     


            });

/*
          if(index_1 != ''){
              $('#jqxgrid').jqxGrid('selectrow', index_1);
            }else{
               $('#jqxgrid').jqxGrid('clearselection');
            }*/

    }


    </script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dtr_module.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>v2includes/js/dtr_v2_js.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/v2js/v2.mindajsmodel.js"></script>
