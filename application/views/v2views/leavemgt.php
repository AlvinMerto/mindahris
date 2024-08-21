<div class='content-wrapper' style='padding-top:0px;'> <!-- content wrapper -->
	<section class="content"> <!-- section class content -->
		<!--div class="row"> <!-- row div -->
      <div class='content_wrapper'>
		 
		  <?php 
			if ( !isset($notadmin) ):
		  ?>
          <div class='floatdiv leftbox'>
			<div class='leftcontent'>
				<div class='header-box'>
				  <p> Select an Employee </p>
				</div>
				<div class='search-box'>
				  <input type='text' placeholder="Search" id='searchemp'/>
				</div>
				<div class='employees-box'>
					<ul class='emps_list' id = 'emps_list'>
						
					</ul>
				</div>
			</div>
			
			<div class='leftcontrol'>
				<span class='close_to_left' id='closeemps'></span>
			</div>
			
          </div>
		  <?php endif; ?>
          <div class='floatdiv rightbox'>
           <div class='theheader' role='header'> <!-- header wrapper -->
            <div class='details-box-wrapper'>
              <!--p id='employeename'> </span> --- </p-->
			  <div style='border-bottom: 1px solid #a5a5a5;
						  position: relative;
						  z-index: 10;
						  width: 100%;
						  height: 60px;'> 
				<p id='the_name_of_emp'> --- </p>
				<div style='overflow: hidden;' id='name_div_box'> 
					<?php $isadmin = $this->session->userdata("usertype"); ?>
					<ul class='lvul_cl'>
						<?php if($isadmin == "admin" || $this->session->userdata('employment_type') == "REGULAR"):// if($this->session->userdata('employment_type') != "JO"): ?>
						<li> 
							<span class='lbl_span_val' id='fl_span_val'> N/A </span>  
							<span class='lbl_span'> Forced Leave </span> 
						</li>
						<li> 
							<span class='lbl_span_val' id='spl_span_val'> N/A </span>  
							<span class='lbl_span'> Special Leave </span> 
						</li>
						<?php endif; ?>
						<li style='background: none; border: none; box-shadow: none; padding: 15px;'> 
							<?php $link = base_url()."my/ledger/coc/"; ?>
							<a href='<?php echo $link; ?>' target='_blank' id='ctoottbl' class='btn btn-primary' style='border: 1px solid #2573a0;'> 
								<p> <i class="fa fa-leanpub"></i> OT and CTO Table </p>
							</a>
						</li>
					</ul>
				</div>
			  </div>
              <div class='header-details-box'>
                <div class='periodbox period-header floatdiv'>
                    <p> Period </p>
                </div> 
                <div class='particularsbox floatdiv'>
                    <div class='particular-header'>
                      <p> Particulars </p>
                    </div>
                    <div class='particular-small-heads'>
                      <div class='blankdiv particular-small-head-det floatdiv'>
                        <p> &nbsp; </p>
                      </div>
                      <div class='xdiv particular-small-head-det floatdiv'>
                        <p> X </p>
                      </div>
                      <div class='daysdiv particular-small-head-det floatdiv'>
                        <p> Days </p>
                      </div>
                      <div class='hrsdiv particular-small-head-det floatdiv'>
                        <p> hrs </p>
                      </div>
                      <div class='mindiv particular-small-head-det floatdiv'>
                        <p> mins </p>
                      </div>
                    </div>
                </div>
                <div class='vacationleavebox floatdiv'>
                  <div class='vacationleavebox-header'>
                      <p> Vacation Leave </p>
                  </div>
                    
                    <div class='vacationleave-small-heads'>
                      <div class='earnedvl vl-small-head-det floatdiv'>
                        <p> Earned </p>
                      </div>
                      <div class='absutwithpayvl vl-small-head-det floatdiv'>
                        <p> ABS/UT with pay </p>
                      </div>
                      <div class='balancevl vl-small-head-det floatdiv'>
                        <p> Balance </p>
                      </div>
                      <div class='absutwopayvl vl-small-head-det floatdiv'>
                        <p> ABS/UT w/o pay </p>
                      </div>
                    </div>  
                </div>
                <div class='sickleavebox floatdiv'>
                  <div class='sickleavebox-header'>
                    <p> Sick Leave </p>
                  </div>
                    <div class='sickleavebox-small-heads'>
                      <div class='earnedsl sl-small-head-det floatdiv'>
                        <p> Earned </p>
                      </div>
                      <div class='absutwithpaysl sl-small-head-det floatdiv'>
                        <p> ABS/UT with pay </p>
                      </div>
                      <div class='balancesl sl-small-head-det floatdiv'>
                        <p> Balance </p>
                      </div>
                      <div class='absutwopaysl sl-small-head-det floatdiv'>
                        <p> ABS/UT w/o pay </p>
                      </div>
                    </div>  
                </div>
                <div class='remarksdiv floatdiv'>
                    <p> Remarks </p>
                </div>
              </div>
            </div>
            </div> <!-- end header wrapper -->
            <!-- content wrapper -->
            <div class='thecontent' role='contents' id='leavetable'>
				<!-- data here -->
            </div>  
            
        </div>

		</div>  <!-- end content wrapper -->
    <!--/div>  <!-- end row div -->
	</section> <!-- section content -->
</div> <!-- end content-wrapper -->

<div class="modal fade in" id="modal_addleave" tabindex="-1" role="dialog" aria-labelledby="show_addleave" aria-hidden="true" style="padding-right: 17px;">
    <div class="modal-lg modal-dialog" style='width: 22%; '>
        <div class="modal-content">
            <div class="modal-header">
				<h4 style='margin: 0px 0px 15px 0px;'> 
					<span> <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Record a Leave </span> 
				</h4>
				<button class='btn btn-default' id='addbalance'> <i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Balance </button> 
				<button class='btn btn-default' id='adddeds'> <i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Deductions </button> 
			</div>
			
			<div class='modal-content'>
				<div class='add_balance_group'>
					<table class='leavetable'>
						<tr>
							<td colspan=3> 
								<span> Credits as of </span>
								<div id='addbalance_cal'></div>
							</td>
						</tr>
						<tr class='vlslflspl'>
							<td> 
								<span> Vacation Leave </span>
								<input type='text' class='form-control' id='vl_balance'/>
							</td>
						</tr>
						<tr class='vlslflspl'>
							<td> 
								<span> Sick Leave </span>
								<input type='text' class='form-control' id='sl_balance'/>
							</td>
						</tr>
						<tr class='vlslflspl'>
							<td> 
								<span> Forced Leave </span>
								<input type='text' class='form-control' id='fl_balance'/>
							</td>
						</tr>
						<tr class='vlslflspl'>
							<td> 
								<span> SPL </span>
								<input type='text' class='form-control' id='spl_balance'/>
							</td>
						</tr>
						<tr style='display:none;'>
							<td> 
								<span> COC </span>
								<input type='text' class='form-control' id='coc_balance'/>
							</td>
						</tr>
						
						<tr id='otbalance_row' style='display:none;'>
							<td> 
								<span> Add COC </span>
								<input type='text' class='form-control' id='coc_ot_balance'/>
							</td>
						</tr>
					</table>
				</div>
				<div style='padding: 8px 0px 14px;' class='deduction_group' style='background: #eaeaea; border-top: 1px solid #d2d2d2;'>
					<table class='leavetable'>
						<tr>
							<!--td> Deduction Type </td-->
							<td colspan=3>
								<span> Deduction Type </span>
								<select id='deductiontype' class='btn btn-default'>
									<option> --Choose-- </option>
									<option value='leave'> Leave </option>
									<option value='ps'> Pass Slip (PS) </option>
									<option value='ut'> Undertime (UT) </option>
									<option value='t'> Tardiness (T) </option>
									<option value='cto'> Compensatory Time-Off (CTO) </option>
								</select>
							</td>
						</tr>
						
						<tr id='ps_type'>
							<td colspan=3>
								<span> Pass Slip Type </span>
								<select id='ps_type_select' class='btn btn-default'>
									<option value='2'> Personal </option>
									<option value='1'> Official </option>
								</select>
							</td>
						</tr>
						
						<tr id='leavetypes'>
							<!--td> Type </td-->
							<td colspan=3>
								<span> type </span>
								<select class='form-control btn btn-default' id='typeofleave' >
									<option> --Choose-- </option>
									<option value='2'> (VL)  - Vacation Leave </option>
									<option value='1'> (SL)  - Sick Leave </option>
									<option value='4'> (SPL) - Special Leave</option>
									<option value='6'> (FL)  - Force Leave</option>
									<option value='3'> (ML)  - Maternity Leave</option>
									<option value=''> (RL)   - Rehabilitation Leave</option>
									<option value=''> (PL)   - Paternity Leave</option>
									<option value=''> (PL)   - RA 9710 s. 2010 and CSC MC 25 s. 2010</option>
									
									<!--Personnel Attendance Form(PAF) -- to follow...-->
									<!--Compensatory Time-Off (CTO) -- to follow... -->
									
									
									<!--
									Gynaecological Disorder
									Solo Parent
									Anti-Violence Againts Women and Their Children Act of 2004
									Terminal Leave
									Maternity/Paternity Leave for Adoptive Parents
									Study Leave
									Special Emergency Leave
									-->
								</select>
							</td>
						</tr>
						<tr id='range_calendar'>
							<!--td style='vertical-align:top;'> Inclusive Dates: </td-->
							<td colspan=3>
								<span style='float:left;'> Inclusive Dates &nbsp; </span>
								<div class='tooltip_tooltip'> 
									<span class='span_circle'> ? </span> 
									<span class='tooltip_msg'> PS, UT, T and CTO do not use range Calendar. Please choose only one date for these type of category. </span> 
								</div>
								
								<div style='margin-bottom:2px;clear:both;'></div>
								<div id='dates_calendar'></div>
								<input class='form-control' type='hidden' id='dates_deds' /> 
							</td>
						</tr>
												
						<tr id='dhm_row'>
							<!--td> Days </td-->
							<td> 
								<span> Days </span>
								<input class='form-control' type='text' id='days_deds' /> 
							</td>
							<td> 
								<span> Hrs </span>
								<input class='form-control' type='text' id='hrs_deds' /> 
							</td>
							<td>
								<span> Mins </span> 
								<input class='form-control' type='text' id='mins_deds' /> 
							</td>
						</tr>
						
						<tr id='cto_row'>
							<!--td> Days </td-->
							<td> 
								<span> Start </span>
								<input class='form-control cto_time_txt' type='text' id='cto_start' /> 
							</td>
							<td>
								<span> End </span> 
								<input class='form-control cto_time_txt' type='text' id='cto_end' /> 
							</td>
						</tr>
						
					</table>
				</div>
				<div class='add_ot'>
					<table class='leavetable'>
						<tr>
							<td colspan=2> 
								<label> Date: </label>
								<input type='text' id='ot_date'/> 
							</td>
						</tr>
						<tr>
							<td colspan=4> <hr/> </td>
						</tr>
						<tr>
							<td id='am_td'>
								<table>
									<tr>
										<td> 
											<label for = "am_chck" class='btn btn-default' >
												<input type='checkbox' value='am' id='am_chck'/> Morning 
											</label>
										</td>
									</tr>
									<tr>
										<td> 
											<label> IN </label> <input type='text' class='timeinput_ot' id='am_in'/>
											<label> OUT </label> <input type='text' class='timeinput_ot' id='am_out'/>
										</td>
									</tr>
								</table>
							</td>
							<td id='pm_td'>
								<table>
									<tr>
										<td>
											<label for = "pm_chck" class='btn btn-default' >
												<input type='checkbox' value='am' id='pm_chck'/> Afternoon 
											</label> 
										</td>
									</tr>
									<tr>
										<td> 
											<label> IN </label> <input type='text' class='timeinput_ot' id='pm_in'/>
											<label> OUT </label> <input type='text' class='timeinput_ot' id='pm_out'/>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan=4> <hr/> </td>
						</tr>
						<!--tr>
							<td colspan=4 style='text-align:center;'> <button class='btn btn-default'> <i class="fa fa-calculator"></i> Compute </button> </td>
						</tr-->
						
					</table>
				</div>
				<!--div class='add_ot'>
					<table class='leavetable' id='credits_table'>
						<tr>
							<td style='width:90px;'> Total </td>
							<td style='text-align:left;'> <strong> 24.5 </strong> </td>
						</tr>
					</table>
				</div-->
				<div class='add_ot'>
					<table class='leavetable' id='mult_table'>
						<tr>
							<td style='width:90px;'> Multiplier </td>
							<td style='text-align:left;'>
								<div class="btn-group">
									<button class="btn btn-default btn-sm" id='rw'> 
										<i class="fa fa-asterisk"></i> <strong> 1 </strong>
									</button> 
									<button class="btn btn-default btn-sm" id='st'> 
										<i class="fa fa-asterisk"></i> <strong> 1.5 </strong>
									</button>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<!--div class='add_ot'>
					<table class='leavetable' id='total_table'>
						<tr>
							<td style='width:90px;'> Total Credit</td>
							<td style='text-align:left;'> <strong> 4.5 </strong> </td>
						</tr>
					</table>
				</div-->
				<br/>
			</div>
			
			<div class='modal-footer'>
				<div class='deduction_group'>
					<button class='btn btn-default' id='add_ot_btn'><i class="fa fa-clock-o" aria-hidden="true"></i> Add OT </button>
					<button class='btn btn-primary' id='save_leave_credit'> Save </button>
					<button class='btn btn-default' id='modal_cancel'> Cancel </button>
				</div>
				
				<div class='add_balance_group'>
					<button class='btn btn-default' id='otherdeds' style='float: left;'><i class="fa fa-clock-o" aria-hidden="true"></i> OT Balance </button>
					<button class='btn btn-default' id='otbalance' style='float: left;'><i class="fa fa-clock-o" aria-hidden="true"></i> OT Balance </button>
					<button class='btn btn-primary' id='forwardbalance'> Forward Balance </button>
					<button class='btn btn-default' id='modal_cancel'> Cancel </button>
				</div>
				
				<div class='save_ot_action'>
					<button class='btn btn-default' id='adddeductions' style='float: left;'> Deduction </button>
					<button class='btn btn-primary' id='saveot_btn'> Save OT </button>
					<button class='btn btn-default' id='modal_cancel'> Cancel </button>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class="modal fade in" 
	 id="modal_remaining" 
	 tabindex="-1" role="dialog" aria-labelledby="show_addleave" aria-hidden="true" style="padding-right: 17px;">
    <div class="modal-lg modal-dialog" style='width: 22%; '>
        <div class="modal-content">
            <div class="modal-header">
				<p> Remaining Force Leave </p>
			</div>
			<div class='modal-content' style='padding-bottom: 1px;'>
				<div class='modal-middle-wrap'>
					<p id='remaining_date'> as of <?php echo date("l F d, Y"); ?> </p>
					<p id='remaining_number'> 59 </p>
					<p style='text-align:center;'> DAYS </p>
				</div>
			</div>
			<div class='modal-footer'>
				<button class='btn btn-primary'> Apply </button>
				<button class='btn btn-default' id='close_rem_win'> Close </button>
			</div>
		</div>
	</div>
</div>


<?php
	/*
	if ( !isset( $dont_display ) ) {
		if (isset($headscripts)) {
			if (isset($headscripts['style'])) {
			   if (is_array($headscripts['style'])) {
				 foreach($headscripts['style'] as $style) {
				   echo "<link rel='stylesheet' href='{$style}'/>";   
				 }   
			   } else {
				 echo "<link rel='stylesheet' href='".$headscripts['style']."'/>";
			   }
			}
			 
			if (isset($headscripts['js'])) {
			   if (is_array($headscripts['js'])) {
				 foreach($headscripts['js'] as $js){
				   echo "<script src='{$js}'></script>";   
				 }
			   } else {
				  echo "<script src='".$headscripts['js']."'></script>";   
			   }
			}
		}
	}
	*/
?>