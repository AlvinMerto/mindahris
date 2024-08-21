  <div class="content-wrapper" style='padding-top:0px;'>
    <!-- Content Header (Page header) -->
    <!--section class="content-header"-->
      <div class='leavecabinet'>
		<ul> <!--  class="btn btn-default" background: #ffffff; color: #0d5179; -->
			<li style=''> 
				<p id='applyleave'> 
					<!--i style='' class="fa fa-paint-brush" aria-hidden="true"></i--> 
						<span> &nbsp; APPLY </span>
				</p> 
			</li>
			<li> 
				<p id='addaccom'> 
					<!--i style='color: #3c8dbc;' class="fa fa-tasks" aria-hidden="true"></i--> 
					<span> &nbsp; ADD ACCOMPLISHMENT </span>
				</p> 
			</li>
			<!--li> <p> <i style='color: #3c8dbc;' class="fa fa-times-circle" aria-hidden="true"></i> &nbsp; Cancel Leave </p> </li-->
			<!--li> <p> <i style='color: #3c8dbc;' class="fa fa-book" aria-hidden="true"></i> &nbsp; My Leave Applications </p> </li-->
			<!--li> <p> <i style='color: #3c8dbc;' class="fa fa-book" aria-hidden="true"></i> &nbsp; MinDa Calendar of Leave</p> </li-->
		</ul>
      </div>
      <!--ol class="breadcrumb">
        <li class="active"><img style="margin-top:-14px;" src="<?php // echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
      </ol-->
    <!--/section-->

    <!-- Main content -->
    <section class="content" style="padding-top: 0px;">
      <!-- Info boxes -->
      <div class="row">
        <div class=""> <!-- col-md-6 -->
          <div class="box_1">
            <!--div class="box-header with-border">
              <h3 class="box-title">MinDA Calendar of Events</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div-->
            <!-- /.box-header -->
            <div class="box-body" style='background: #ffffff; margin-top:15px;'>
              <div class="row">
                <div class="col-md-12">
                      <!-- THE CALENDAR -->
                      <div id="calendar"></div>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6" style="display:none;">
			<div style="margin-top:10px;" id="jqx_list_remaining_dtr_cover"></div>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Time Tracker</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                <pre>
                      <?php print_r($this->session->userdata()); ?>
                </pre>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
        </div>
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- DTR CODE BELOW -->
 <div style='display:none;'>
<link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/hr_dtr_style.css'/>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 style='font-size: 21px; padding: 9px 0px;'>
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Daily Time Records
		
		<div style='float:right;'>
			<!--div class='btn_group_btm'-->
			  	<button class='mindabtnstyle' id='countersignbtn'>  <i class="fa fa-paper-plane" aria-hidden="true"></i> Notify Division Chief</button>
				<button id="jqx_print_admin" class='mindabtnstyle'>  <i class="fa fa-print" aria-hidden="true"></i> Print</button>
			<!--/div-->
			<button id='showfilterwindow' class='mindabtnstyle'> <i class="fa fa-filter" aria-hidden="true"></i> Filter </button>
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
                                    <div style="margin-top:10px;" id="jqx_list_remaining_dtr_cover"></div>
                                    <p id="date_covered_note_label" style="display:none; margin-top:5px; color:green; font-style: italic; font-size: 15px; line-height: 22px;" >Note: Date covered already submitted...  </p>
                                    <button style="display:none;" id="btn_proceed_hr_submission" class="btn btn-sm btn-primary">SUBMIT TO HR</button>  
                                    <input style=" display:none;" type="button" class="btn btn-sm btn-success" value="PRINT PREVIEW" id="jqxprint"/>
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
   <section class="content" style="">
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
</div>
</div> <!-- END DTR CODEs -->



<!-- printed area -->


<?php $this->load->view('admin/reports/dtr_print_view'); ?>
<?php //$this->load->view('admin/forms/passlip_view'); ?>
<?php //$this->load->view('admin/forms/paf_view'); ?>
<?php //$this->load->view('admin/forms/leave_form_view'); ?>
<?php //$this->load->view('admin/forms/special_form_view'); ?>
<?php //$this->load->view('admin/forms/ot_form_view'); ?>

<!-- end printed area -->



<!-- /#page-wrapper -->



<!-- Modal for reports Exceptions / leaves, passlips etc -->


<div class="modal fade" id="modal_exceptions" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style="display: none;">
    <div class="modal-lg modal-dialog">
        <div class="modal-content small_width">
            <div class="modal-header">
                <button style="display:none;" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div style="opacity: 1 !important;"class="close"id="jqxcheckexact_approval"></div>
                <h4 class="modal-title" id="label_exceptions" id="modal_header">
					<span id="date_select" style="margin-left:10px; font-size:14px;"></span>
                </h4>
            </div>
			<div class="modal-footer">
				<div id='statustext'> </div>
				<button class='modal_btn_style' id='cancel_application' style='float: left;' title='Cancel the application'> 
					<i class="fa fa-eraser"></i> Cancel Application </button>
				
				<!--a href='<?php // echo base_url(); ?>/view/' style='margin-left: 5px; float: left;'/--> 
					<button class='modal_btn_style' title='View the form' id='viewform'> <i class="fa fa-eye" aria-hidden="true"></i> View Form </button>
					<button class='modal_btn_style' title='Resend Application form' id='resendform'> <i class="fa fa-paper-plane"></i> Resend form </button>
					<!--button class='modal_btn_style' title='Resend Application form' id='reqrecall'> <i class="fa fa-refresh"></i> Request for recall </button-->
				<!--/a-->
				
				<button id='attach_sig_submit' class='sendapplication'> <i class="fa fa-save"></i> Send Application </button>
				<button id='sendapl' class='sendapplication'> <i class="fa fa-save"></i> Send Application </button>

				<!--button class='btn btn-primary' id='attach_sig_update'> <i class="fa fa-pencil-square" aria-hidden="true"></i> Update </button-->
			    <button class='modal_btn_style' id='application_cancel'> <i class="fa fa-times"></i> Close </button>
			</div>
		   
            <div class="modal-body">
				<div id='notification_cancel'>
					<p style='margin:0px; font-size: 17px;'> Choose what to do with your application. </p>
				</div>
				<div class='filefor_div'>
					<table>
						<tr>
							<!--td> File for: </td-->
							<td> 
								<p class='p_head'> File For: </p>
								<select class='btn btn-default fileforselect' id='selectleavetype'>
									<!--option value='AMS'> AMS (Attendance Monitoring Sheet) </option-->
									<option value='def'> -- CHOOSE -- </option>
									<option value='PS'> PS (Pass Slip) </option>
									<option value='PAF'> PAF (Personal Attendance Form) </option>
									<?php if($this->session->userdata('employment_type') == "JO"): ?>
										<!--option value='CTO_PAF'> PAF (for Overtime Offsetting) </option-->
									<?php endif; ?>
									<!--option value='OB'> OB ( Official Business ) </option-->
									<?php if($this->session->userdata('employment_type') != "JO"): ?>
										<option value='LEAVE'> Leave </option>
									<?php endif; ?>
									<option value='OT'> OT ( Overtime ) </option>
										<option value='CTO'> 
											<?php if($this->session->userdata('employment_type') == "JO"){ ?>
												PAF ( Compensatory Time-Off ) 
											<?php } else if($this->session->userdata('employment_type') == "REGULAR") { ?>
												CTO ( Compensatory Time-Off )
											<?php } ?>
										</option>
								</select>
							</td>
						</tr>
					</table>
				</div>
				<div class='filefor_content'>
					<!-- file for CTO -->
						<!-- file for OT -->
					<div class='fileforcontent_div' id='CTO_div' style='display:none;'>
						<hr/>
						<h3> 
							<?php if($this->session->userdata('employment_type') == "JO") { ?>
								Applying for PAF (used as an offset to CTO)
							<?php } else if ($this->session->userdata('employment_type') == "REGULAR") { ?>
								Applying for Compensatory Time-Off (CTO)
							<?php } ?>
						</h3>
						<hr/>
							<table class='fullwidth_table' >
								<tr>
									<td colspan=3> 
										<p> Remaining COC: </p>
										<table class='remcoctbl'>
											<tr>
												<td>
													<p> <?php echo $hours; ?> </p>
													<small> HOURS </small>
												</td>
												<td>
													<p> : </p>
													<small> &nbsp; </small>
												</td>
												<td>
													<p> <?php echo $mins; ?> </p>
													<small> MINUTES </small>
												</td>
											</tr>
										</table>
										<?php  // echo $cocvalue; /*echo $coc_clean_val;*/?>
										<?php // echo "hello"; var_dump($coc_clean_val); ?>
										
										<?php 
											// ($coc_clean_val == 0 || $coc_clean_val == "0")?"00:00":$coc_clean_val
											/*
											$coc = "00:00";
											if ($coc_clean_val != "0"){
												$coc = $coc_clean_val;
											}
											
											list($hours, $mins) = explode(":",$coc); 
											*/
										?>
										
										<!--table class='coc_table'>
											<!--tr>
												<td> Day(s) </td>
												<td> </td>
												<td> Hour(s) </td>
												<td> </td>
												<td> Minute(s) </td>
											</tr-->
											<!--tr>
												<!--td> <?php // echo $days; ?> </td>
												<td> : </td>
												<td> <?php // echo $hours ?> </td>
												<td> : </td>
												<td> <?php // echo $mins; ?> </td-->
												<!--td colspan=5> Please refer to your leave ledger for the remaining COC </td-->
												<!--td colspan=5>  </td>
											</tr>
										</table-->
										<!--p class='message_alert_coc'> The day(s) is equivalent to 24hours. </p-->
										<?php $jsval = ($coc_clean_val != "0")?$coc_clean_val:"00:00:00"; ?>
										<input type='hidden' value='<?php echo $jsval; ?>' id='coc_clean_val'/>
									</td>
								</tr>
								<tr>
									<td>
										<p> Number of hours: </p>
										<select class='numofhrs' id='numofhrs'>
											<?php
												$enough = false;
												for($i = 3; $i <= 8 ; $i++) {
													if ($i <= $hours) {
														$enough = true;
														echo "<option value='{$i}'>";
															echo $i." hours";
														echo "</option>";
													}
												}
												
											?>
										</select>
										
										<?php 
											if (!$enough) {
												echo "<p style='margin: 0px; text-align: center; padding: 12px 0px; background: #ffafbd; box-shadow: 0px 2px 2px #5a5858;'> Your remaining COC is below the minimum allowed. You cannot apply. </p>";
											} 
										?>
									</td>
								</tr>
								
								<!-- not displayed for some reason -->
								<tr id='ctotable' class='displaynone'>
									<td> &nbsp; </td>
									<td> Time Start: <input type='text' id='cto_start' class='timetxtbox'/> 
										
									</td>
									<td style='font-weight: normal;'>  
										Time end: <input type='text' id='cto_end' class='timetxtbox'/>
									</td>
								</tr>
								<!-- not displayed for some reason -->
								
								<?php // if ($employment_type == "REGULAR"): ?>
									<!--tr>
										<td colspan=3>
											<p style='margin: 16px 0px 0px 0px; 
													  text-align: center; 
													  color: #bc2626; 
													  font-size: 17px; 
													  background: pink; 
													  padding: 18px; 
													  border: 1px solid #e79292; 
													  box-shadow: 0px 3px 2px #d7c6c9; 
													  font-weight: normal;'> Please use your time flexi when you're applying for a whole day CTO. </p>
										</td>
									</tr-->
								<?php // endif; ?>
								<!--tr id='ctofordays'>
									<td style='width: 120px;'> Days: </td>
									<td id='numofdays'> </td>
								</tr-->
								<tr>
									<td colspan=3> <hr/> </td>
								</tr>
								<tr>
									<!--td> Remarks: </td-->
									<td colspan=3> <p> Remarks: </p><textarea class='full_width_textarea' id='cto_remarks'></textarea> </td>
								</tr>
							</table>
					</div>
					<!-- end CTO -->
					
					<!-- file for OT -->
					<div class='fileforcontent_div' id='OT_div' style='display:none;'>
						<hr/>
						<h3> Applying for Overtime (OT) </h3>
						<hr/>
							<table class='fullwidth_table'>
								<tbody>
									<tr> 
										<td> Task to be Done </td>
										<td> <textarea class='full_width_textarea' id='task_to_be_done'></textarea> </td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<td> Requested Time In: </td>
										<td> <input type='text' id='ot_timein'/> </td>										
									</tr>
									<tr>
										<td> Requested Time Out: </td>
										<td> <input type='text' id='ot_timeout'/> </td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<td> &nbsp; </td>
										<td> 
											<label class='btn btn-default'> <input type='radio' name='typeoftask[]' class='task_type_radio' value='1'/> REGULAR WORK (RW) </label> 
											<label class='btn btn-default'> <input type='radio' name='typeoftask[]' class='task_type_radio' value='2'/> SPECIAL TASK (ST) </label>
											<input type='hidden' id='task_type' value=''/>
										</td>
									</tr>
								</tbody>
								<tbody>
									<tr> <td colspan=2><hr/></td> </tr>
								</tbody>
								<tbody id='reason_rw_tbody' style='display:none;'>
									<tr>
										<td colspan=2>
											<p> Reasons for extra hours if column RW is checked </p>
											<textarea class='full_width_textarea' id='reason_rw'></textarea>
										</td>
									</tr>
								</tbody>
								<tbody>
									<tr>
										<td colspan=2>
											<p> Remarks/Comments: </p>
											<textarea class='full_width_textarea' id='remarks_ot'></textarea>
										</td>
									</tr>
								</tbody>
							</table>
					</div>
					<!-- end of filing of OT -->
					
					<!-- AMS -->
					<div class='fileforcontent_div' id='PS_div' style='display:none;'>
						<hr/>
						<h3> Applying for Pass Slip </h3>
						<hr/>
						<!--p class='noticetothepublic'> 
									REMINDER: dili na kinahanglan e print ang pass slip. Kung na aprubahan na imong pass slip, e scan lang ang imong ID sa biometrics device sa my entrance.
									After scanning, mangayo siya ug approval gikan sa imoha kung gamiton na ba nimo ang imong pass slip or dili; click lang ang YES kung oo, ug NO kung dili. 
						</p-->
						<p style='margin: 5px 0px 0px 0px; 
								  text-align: center; 
								  font-style: italic;'> Your pass slip will then automatically be attached to your DTR. </p>
						<hr/> 
						<table class='fullwidth_table'>
							<tr> 
								<td> Pass Slip Type: </td>
								<td> 
									<select class='btn btn-default signatory_select' id='ps_type'>
										<option value='1'> OFFICIAL </option>
										<option value='2'> PERSONAL </option>
									</select>
								</td>
							</tr>
							<!--tr>
								<td> Time OUT: </td>
								<td> <input type='text' id='ps_time_out'/> </td>
							</tr>
							<tr> 
								<td> Time IN: </td>
								<td> <input type='text' id='ps_time_in'/> </td>
							</tr-->
							<tr>
								<td> Reason: </td>
								<td> <textarea class='full_width_textarea' id='ps_reason'></textarea> </td>
							</tr>
							<!--tr>
								<td> To be Approved by:</td>
								<td> <h4> Juan De la Cruz </h4> </td>
							</tr>
							<tr> 
								<td> &nbsp; </td>
								<td> 
									<p style='font-size: 12px;'> If different, please choose from here: </p>
									<select>
										<option> Juan Dela Cruz </option>
										<option> Juan Dela Cruz </option>
									</select> 
								</td>
							</tr-->
						</table>
					</div>
					<!-- AMS -->
					
					<!-- PAF to offset CTO -->
						<!--div class='fileforcontent_div' id='PAF_div_coc' style='display:none;'>
							<hr/>
							<h3> Personal Attendance Form (PAF) - <i> used for CTO offsetting </i> </h3>
							<hr/>
							<table class='fullwidth_table'>
								<tr>
									<td> Reason / Justification: </td>
									<td> 	  
										<textarea class='full_width_textarea' id='paf_reason_just'></textarea> </td>
								</tr>
								<tr>
									<td> Start: </td>
									<td> <input type='text' class='timetxtbox' id='pafcto_timestart'/> </td>
								</tr>
								<tr>
									<td> End: </td>
									<td> <input type='text' class='timetxtbox' id='pafcto_timeend'/> </td>
								</tr>
								<tr>
									<td> Remarks: </td>
									<td> 
									<textarea class='full_width_textarea' id='paf_remarks'></textarea> </td>
								</tr>
							</table>
						</div-->
					<!-- PAF for COC-->
					
					<!-- PAF -->
					<div class='fileforcontent_div' id='PAF_div' style='display:none;'>
						<hr/>
						<h3> Personal Attendance Form (PAF)</h3>
						<hr/>
						<table class='fullwidth_table'>
							<tr>
								<td> Reason / Justification: </td>
								<td> 	  
									<textarea class='full_width_textarea' id='paf_reason_just'></textarea> </td>
							</tr>
							<tr style='display:none;'>
								<td> From: </td>
								<td> <input type='text' id='paf_timein'/> </td>
							</tr>
							<tr style='display:none;'>
								<td> To: </td>
								<td> <input type='text' id='paf_timeout'/> </td>
							</tr>
							<tr>
								<td> Schedule: </td>
								<td> 
									<select class='btn btn-default signatory_select' id='paf_time'>
										<option value='morning'> 08:00 AM - 12:00 NN - Morning </option>
										<option value='wholeday'> 08:00 AM - 05:00 PM - Whole day</option>
										<!--option> 12:00 NN - 05:00 PM - Afternoon</option-->
									</select>
								</td>
							</tr>
							<tr>
								<td> Remarks: </td>
								<td> 
								<textarea class='full_width_textarea' id='paf_remarks'></textarea> </td>
							</tr>
						</table>
					</div>
					<!-- PAF -->
					
					<!-- OB -->
					<!--div class='fileforcontent_div' id='OB_div' style='display:none;'>
						<hr/>
						<h3> Applying for OB </h3>
						<hr/>
						<table class='fullwidth_table'>
							<tr> 
								<td> OB Type: </td>
								<td> 
									<select class='btn btn-default signatory_select' id='ob_type'>
										<option value='ACTIVITIES'> ACTIVITY </option>
										<option value='TRAVEL'> TRAVEL </option>
									</select>
								</td>
							</tr>
							<tr>
								<td> Reason: </td>
								<td> <textarea class='full_width_textarea' id='ob_reason'></textarea> </td>
							</tr>
						</table>
					</div-->
					<!-- OB -->
					
					<!-- LEAVE -->
					<div class='fileforcontent_div' id='LEAVE_div' style='display:none;'>
						<hr/>
						<h3> Applying for LEAVE </h3>
						<hr/>
						<table class='fullwidth_table' id='leave_id_table'>
							<tr> 
								<td> Leave Type: </td>
								<td> 
									<select class='btn btn-default signatory_select' id='leaveselect'>
										<option> -- Choose from the list-- </option>
										<option value='1'> Sick Leave </option>
										<option value='2'> Vacation Leave </option>
										<option value='3'> Maternity Leave </option>
										<option value='4'> Special Leave </option>
										<option value='6'> Forced Leave </option>
										<option value='7'> Rehabilitation Leave </option>
										<option value='8'> RA 9710 s. 2010 and CSC </option>
										<option value='9'> Gynaecological Disorder </option>
										<option value='10'> Solo Parent </option>
										<option value='11'> Paternity </option>
										<option value='12'> Anti-Violence Against Women </option>
										<option value='13'> Terminal Leave </option>
										<!--option value='14'> Maternity / Paternity Leave </option-->
										<option value='15'> Study Leave </option>
										<!--option value='generic'> Special Emergency Leave </option-->
									</select>
								</td>
							</tr>
							<!-- sick leave -->
							<tbody id='sickleave' class='hallow_child' style='display:none;'>
							<tr> 
								<td colspan=2>
									<hr/>
								</td> 
							</tr>
							
							<tr style='display:none;'>
								<td>  </td>
								<td> 
									<button class='btn btn-default' id='halfdaysl'> Apply for halfday sick leave </button>
									<div id='halfday_div'>
										<table class='halfdaytbl'>
											<tr>
												<td> 
													<select class='btn btn-default' id='hd_sl_select'> 
														<option> Morning </option>
														<option> Afternoon </option>
													</select> 
												</td>
												<td> 
													<p> Time Start: </p>
													<input type='text' class='timetext_' id='time_start'/>
												</td>
												<td>
													<p> Time End: </p>
													<input type='text' class='timetext_' id='time_end'/>
												</td>
											</tr>
										</table>
									</div>
								</td>
							</tr>
							
							<tr> 
								<td>
									<strong> Remaining Credits </strong> 
								</td>
								<td> <?php // if(isset($slcount)){echo $slcount;} ?> 
									<p style="margin: 0px;"> Day(s) </p>
									<p style="font-size: 30px;margin: 0px;"> <?php echo $slcount; ?> </p>
								</td> 
							</tr>
							
							<tr>
								<td colspan=2>
									<hr/>
								</td>
							</tr>
							<tr>
								<td> Specifics: </td>
								<td>
									<label class='btn btn-default' for='outpatient'> <input type='radio' id='outpatient' class='sick_leave_spec' value='1' name='sick_val[]'/>  OUT Patient </label>
									<label class='btn btn-default' for='inpatient'> <input type='radio' id='inpatient' class='sick_leave_spec' value='2' name='sick_val[]'/> IN Patient </label>
								</td>
							</tr>
							<tr> 
								<td> Specify: </td>
								<td> <textarea class='full_width_textarea' id='sick_leave_spec'></textarea> </td>
							</tr>
							</tbody>
							<!-- sick leave -->
							
							<!-- vacation leave -->
							<tbody id='vacationleave' class='hallow_child' style='display:none;'>
								<tr> <td colspan=2><hr/></td> </tr>
								<tr>
									<td>
										<strong> Remaining Credits </strong> 
									</td>
									<td> <?php // if(isset($vlcount)){echo $vlcount;} ?> 
										<p style="margin: 0px;"> Day(s) </p>
										<p style="font-size: 30px;margin: 0px;"> <?php echo $vlcount; ?> </p>
									</td> 
								</tr>
								
								<tr>
									<td colspan=2>
										<hr/>
									</td>
								</tr>
							
								<tr>
									<td> Specifics: </td>
									<td>
										<label class='btn btn-default'> <input type='radio' class='vl_specs' value = '1' id='within_phil' name='vl_specs[]'/> Within the Philippines </label>
										<label class='btn btn-default'> <input type='radio' class='vl_specs' value = '2' id='abroad' name='vl_specs[]'/> Abroad(<i> specify </i>) </label>
										<input type='hidden' id='vl_spec_val' value='0'/>
									</td>
								</tr>
								<tr> 
									<td> Specify: </td>
									<td> <textarea class='full_width_textarea' id = "vl_specific"></textarea> </td>
								</tr>
							</tbody>
							<!-- vacation leave -->
							
							<!-- Generic leave || maternity, forced, rehabilitation ... -->
							<tbody id='genericleave' class='hallow_child'  style='display:none;'>
								<tr> <td colspan=2><hr/></td> </tr>
								<tr> <td><strong id='genericleave_name'> Maternity Leave </strong> </td><td> </td> </tr>
								<tr> 
									<td> Specify: </td>
									<td> <textarea class='full_width_textarea' id='generic_spec_txt'></textarea> </td>
								</tr>
							</tbody>
							<!-- Generic leave || maternity, forced, rehabilitation ... -->
							
							<!-- Special Leave -->
							<tbody id='specialleave' class='hallow_child'  style='display:none;'>
								<tr> <td colspan=2><hr/></td> </tr>
								<tr> 
									<td> 
										<!--strong> Remaining SPL credit </strong-->
									</td> 
									<td>
										<span id='rem_spl'> <?php // echo $splcount; ?> </span>
									</td>
								</tr>
								<tr> <td colspan=2><hr/></td> </tr>
								<tr> <td><strong> Special Leave </strong> </td><td> Types of special leave privileges applied for </td> </tr>
								<tr>
									<td>  </td>
									<td>
										<label for='pm' class='btn btn-default spl_radio_label'> <input type='radio' class='spl_radio' id='pm' name='spl[]' value='spl_personal_milestone'/>  Personal Milestone </label>
									</td>
								</tr>
								<tr>
									<td>  </td>
									<td>
										<label for='po' class='btn btn-default spl_radio_label'> <input type='radio' class='spl_radio' id='po' name='spl[]' value='spl_parental_obligations'/> Parental Obligations </label>
									</td>
								</tr>
								<tr>
									<td>  </td>
									<td>
										<label for='fo' class='btn btn-default spl_radio_label'> <input type='radio' class='spl_radio'  id='fo' name='spl[]' value='spl_filial_obligations'/> Filial Obligations </label>
									</td>
								</tr>
								<tr>
									<td>  </td>
									<td>
										<label for='de' class='btn btn-default spl_radio_label'> <input type='radio' class='spl_radio'  id='de' name='spl[]' value='spl_domestic_emergencies'/> Domestic Emergencies </label>
									</td>
								</tr>
								<tr>
									<td>  </td>
									<td>
										<label for='pt' class='btn btn-default spl_radio_label'> <input type='radio' class='spl_radio'  id='pt' name='spl[]' value='spl_personal_transaction'/> Personal Transactions </label>
									</td>
								</tr>
								<tr>
									<td>  </td>
									<td>
										<label for='cahl' class='btn btn-default spl_radio_label'> <input type='radio' class='spl_radio'  id='cahl' name='spl[]' value='spl_calamity_acc'/>  Calamity, Accident, Hospitalization Leave </label>
										<input type='hidden' id='spl_specific'/>
									</td>
								</tr>

							</tbody>
						</table>
						
					</div>
					<!-- LEAVE -->
					<?php // echo "chief:".$isdiv_chief; echo "-"; echo "dbm:".$isdbm_chief; ?>

					<div class='signatories dbmchief'>
						<table>
							<tbody>
								<tr> 
									<td colspan=2 style='font-size: 16px; padding: 0px 0px 11px;  border-bottom: 1px solid #ccc;'>
										<p id='signatories_text'> Signatories 
											<span style='float:right;' id='icon_sign'> 
												<i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 
											</span> 
										</p>
									</td>
								</tr>
								<?php //if ($isdiv_chief != 1 && $isdbm_chief != 1): ?>
								<tr class='divisionchief'>
									<!--td> &nbsp; </td-->
									<td id='td_division' style='padding-top: 15px;'> Division Chief/OIC:</td>
								</tr>
								<tr class='divisionchief'>
									<!--td> &nbsp; </td-->
									<td> 
										<h4 id='div_name' style='margin-bottom: 5px;'> <i class="fa fa-user" aria-hidden="true"></i> <?php echo $division['div_name']; ?> </h4>
										<span id='div_email'> <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $division['div_email']; ?> </span>
										<input type='hidden' id= 'division_chief_id' value='<?php echo $division['div_empid']; ?>'/>
										<input type='hidden' id= 'division_chief_email' value='<?php echo $division['div_email']; ?>'/>
									</td>
								</tr>
								<tr class='divisionchief'> <td colspan=2><hr class='hori_line'/></td> </tr>
								<tr class='divisionchief'> 
									<!--td> &nbsp; </td-->
									<td> 
										<p style='font-size: 12px; margin:0px 0px 0px 0px;'> If different, please choose from here: 
											<button class='btn btn-default' id='show_div_sign'> Show </button>
										</p>
										
										<div id='division_sign' style='display:none; margin: 7px 0px;'>
											<select class='btn btn-default signatory_select' id='division_signatory'>
												<?php 
													for($i = 0; $i<=count($division_other)-1; $i++) {
														echo "<option value='{$division_other[$i]['emp_id']}' data-div_email='{$division_other[$i]['email']}'> {$division_other[$i]['fname']} </option>";
													}
												?>
											</select> 
										</div>
									</td>
								</tr>
								
								<tr class='divisionchief'> <td colspan=2><hr/></td> </tr>
								<?php //endif; ?>
								
								<?php //if( $isdbm_chief != 1): ?>
								<tr class='dbmchief'>
									<td id='td_dbm'> To be Approved by: </td>
								</tr>
								<tr class='dbmchief'>
									<td> 
										<h4 id='dbm_name' style='margin-bottom: 5px;'> <i class="fa fa-user" aria-hidden="true"></i> <?php echo $dbm['dbm_name']; ?> </h4> 		
										<span id='dbm_email'> <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $dbm['dbm_email'] ?> </span>
										<input type='hidden' id= 'dbm_chief_id' value='<?php echo $dbm['dbm_empid']; ?>'/>
										<input type='hidden' id= 'dbm_chief_email' value='<?php echo $dbm['dbm_email']; ?>'/>
									</td>
								</tr>
								
								<tr class='dbmchief'> <td colspan=2><hr class='hori_line'/></td> </tr>
								<tr class='dbmchief'> 
									<!--td> &nbsp; </td-->
									<td> 
										<p style='font-size: 12px; margin:0px 0px 0px 0px;'> If different, please choose from here:  
											<button class='btn btn-default' id='show_last_sign'> Show </button>
										</p>
										
										<div id='last_div_sign' style='display:none; margin: 7px 0px;'>
											<select class='btn btn-default signatory_select' id='dbm_signatory'>
												<?php 
													
													for($a = 0 ; $a <= count($dbm_other)-1; $a++) {
														echo "<option value='{$dbm_other[$a]['emp_id']}' data-dbm_other_email='{$dbm_other[$a]['email']}'> {$dbm_other[$a]['fname']} </option>";
													}
													
												?>
											</select> 
										</div>
									</td>
								</tr>
								<?php //endif; ?>
							</tbody>
						</table>
					</div>
					
					<?php if ($isdiv_chief != 1 && $isdbm_chief != 1): ?>
						<?php if($division_id != 0): ?>
							<script>
								jQuery(document).find(".divisionchief").show();
							</script>
						<?php endif; ?>
					<?php endif; ?>
						
					<?php if( $isdbm_chief != 1): ?>
						<script>
							jQuery(document).find(".dbmchief").show();
						</script>
					<?php endif; ?>
					
				</div>
				
				<!-- OT accom report -->
					<div class='ot_accom_divbox'>
						<?php //var_dump($OT_data); ?>
						<table class='with_border'>
							<tr>
								<td colspan=2 style='background: #e4e3e3; text-align:center; font-size:19px;'> OVERTIME ACCOMPLISHMENT REPORT </td>
							</tr>
							<tr>
								<td> Date: <strong> <?php echo $OT_data['ddate']; ?> </strong> </td>
							</tr>
							<tr>
								<td> Day: <strong> <?php echo $OT_data['dday']; ?> </strong></td>
							</tr>
							<tr>
								<td> Name: <strong> <?php echo $OT_data['name']; ?> </strong></td>
							</tr>
							<tr>
								<td> Position: <strong> <?php echo $OT_data['position']; ?> </strong> </td>
							</tr>
							<tr> 
								<td>
									<p style='text-align: center;
											  font-style: italic;'> I certify to the following accomplishment(s) during overtime rendered per attached Memorandum Order for Rendering Overtime Services and Work Program: </p>
								</td>
							</tr>
						</table>
						<table class='td_border'>
							<tbody>
								<tr>
									<td colspan=2 style='text-align:center;'> <h4 style='font-size: 18px;'> <i class="fa fa-clock"></i> Actual Time </h4> </td>
								</tr>
								<tr>
									<td colspan=2 style='background: #e4e3e3; text-align: right;'> 
										<button class='btn btn-default' id='isam_lbl'> Morning </button>
										<!--label class='btn btn-default' id='isam_lbl'> <input type='checkbox' id='isam_ot'/> A.M. </label--> 
									</td>
								</tr>
								<tr id='morningtime'>
									<td> 
										<p> Time In </p>
										<input type='text' class='ottime_txt' id='am_timein'/>
									</td>
									<td> 
										<p> Time Out </p>
										<input type='text' class='ottime_txt' id='am_timeout'/>
									</td>
								</tr>
								<tr>
									<td colspan=2 style='background: #e4e3e3; text-align: right;'>
										<button class='btn btn-default' id='ispm_lbl'> Afternoon </button>
										<!--label class='btn btn-default' id='ispm_lbl'> <input type='checkbox' id='ispm_ot'/> P.M.  </label-->
									</td>
								</tr>
								<tr id='afternoontime'>
									<td> 
										<p> Time In </p>
										<input type='text' class='ottime_txt' class='ottime_txt' id='pm_timein'/>
									</td>
									<td> 
										<p> Time Out </p>
										<input type='text' class='ottime_txt' class='ottime_txt' id='pm_timeout'/>
									</td>
								</tr>
								<tr>
									<td colspan=2 style='background: #e4e3e3;'>
										Work Accomplishment
									</td>
								</tr>
								<tr>
									<td style='vertical-align:top;' colspan=2>
										<textarea class='accom_text' placeholder='...' id='accom_report'></textarea>
									</td>
								</tr>
								<!--tr>
									<td colspan=2>
										<p style='text-align: center; font-style: italic;'> This Overtime Accomplishment Report will be attached to September 2X, 20XX overtime.</p>
									</td>
								</tr-->
								<tr>
									<td colspan=2 style='text-align:right;'>
										<div style='float:left;' id='report_status'>  </div>
										<button class='btn btn-primary' id='submit_ot_accom'> Submit Report </button> <!--&nbsp; | &nbsp; <a href='#'/> View Form </a-->
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div id='ot_accom_added'>
						
					</div>
					
				<!-- end -->
				
            </div>
			<div class="modal-footer">

			</div>
            <!--div class="modal-footer">
				<div id='statustext'> </div>
				<button class='btn btn-danger' id='cancel_application' style='float: left;' title='Cancel the application'> <i class="fa fa-ban" aria-hidden="true"></i> Cancel Application</button>
				
				<!--a href='<?php // echo base_url(); ?>/view/' style='margin-left: 5px; float: left;'/--> 
					<!--p class='btn btn-default' title='View the form' id='viewform' style='margin-left: 5px; float: left;'> <i class="fa fa-eye" aria-hidden="true"></i> View Form </p>
					<p class='btn btn-default' title='Resend Application form' id='resendform' style='margin-left: 5px; float: left;'> <i class="fa fa-paper-plane"></i> Resend form</p-->
				<!--/a-->
				
				<!--button class='btn btn-primary' id='attach_sig_submit'> (E)-Sign and Submit </button-->

				<!--button class='btn btn-primary' id='attach_sig_update'> <i class="fa fa-pencil-square" aria-hidden="true"></i> Update </button-->
			    <!--button class='btn btn-default' id='application_cancel'> Close </button-->
		   <!--/div-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="addaccom_modal" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style="display: none;">
	<div class="modal-lg modal-dialog">
        <div class="modal-content small_width">
			<div class='modal-header'>
				<strong style='font-size: 20px;'> Add Accomplishment </strong> <br/>
				<div id='dates_accom'>  </div>
			</div>
			<div class='modal-footer'>
				<button class='modal_btn_style' style='float:left; margin-left: 8px;' id='saveaccom'>Save</button>
				<div class='alterclass'>
					<button class='modal_btn_style' style='float:left; margin-left: 8px;' id='updateaccom'>Update</button>
					<button class='modal_btn_style' style='float:left; margin-left: 8px;' id='deleteaccom'>Delete</button>
				</div>
				<button class='modal_btn_style' id='app_close'> <i class="fa fa-times"></i> Close </button>
			</div>
			<div class='modal-content'>
				<div class='modal_center_margin'>
					<textarea id='add_accom_modal_text'></textarea>
				</div>
			</div>
			<div class='modal-footer' id='footerdetails'>
				<span id='addaccom_status'>&nbsp;</span>
				<!-- OT Signatory -->
				
				<!-- OT signatory -->
			</div>
		</div>
	</div>
</div>

<?php if ($isfirst == 1 || $isfirst >=7):  ?>
	<?php 
		$message = null;
		if ($isfirst == 1){
			$message = "Your password is new. Do you want to change it?";
		} else if ($isfirst >= 7) {
			$message = "It's already been your {$isfirst}th time to use HRIS. Do you want to change your password?";
		}
	?>
	
	<div class='isfirsttime'>
		<div class='mid_div'>
			<h4> <?php echo $message; ?> </h4>
			<hr/>
			<div class='changepasswordpanel'>
				<table>
					<tr>
						<td> New Password: </td>
						<td> <input type='password' class='form-control' id='newpassword'/> </td>
					</tr>
					<tr>
						<td> Confirm: </td>
						<td> <input type='password' class='form-control' id='confpassword'/> </td>
					</tr>
					<tr>
						<td> </td>
						<td> 
							<div class='btn-group'>
								<button class='btn btn-primary' id='changepassword'> Change password </button> 
								<button class='btn btn-default' id='imokwithmypass'> I'm okay with my password. </button> 
							</div>
						</td>
					</tr>
				</table>
			</div>
			<p style='text-align:right; margin:0px;'> <button class='btn btn-default' id='closechangepass'> Close </button> </p>
		</div>
	</div>
<?php endif; ?>

	<div id='loadingitems' style='display:none;top: 0px;
    position: fixed;
    width: 100%;
    z-index: 100000000000;
    text-align: center;'>
		<p style='margin: 0px auto;
    background: #47d465;
    padding: 8px;
    box-shadow: 0px 4px 4px #3a3a3a;
    font-size: 15px;'> Loading items... please wait </p>
	</div>
  <!-- end script from DTR view -->
  <script>
  var BASE_URL = '<?php echo base_url(); ?>';
  var SESSION_ID = '<?php echo $this->session->userdata('employee_id'); ?>';

    $( document ).ready(function() {

        $('#btn_test').on('click',function(){
          var info = {};
           info['title'] = SESSION_ID;
           info['msg'] = '<div>test</div>';
           info['profile_pic']
           var done = popupmes(info);

        });
       
    });
  </script>
  
  