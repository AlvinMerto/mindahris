<?php
	// var_dump($data);
?>
<style>
	.ledgertbl tr th,.ledgertbl tr td{
		border:1px solid #d8d8d8;
		text-align:center;
		padding:5px;
	}

	.liselected {
		background: #3c8dbc !important;
		color: #fff;
	}
	
	.liselected:after {
		/*
		content: "\f0da";
		font-family: fontAwesome;
		position: absolute;
		right: -10px;
		color: #3c8dbc;
		font-size: 34px;
		margin-top: -13px;
		*/
	}
</style> <!-- margin-left: 230px !important; -->
<div class="content-wrapper" style='padding-top:0px; background: rgb(249, 249, 249);'>
	<section class="content" style=''>
	
	<?php if(count($employees) > 0): ?>
		<div class='theempsdiv'>
			<span class='closewin'></span>
			<div class='thenames'>
				<ul>
					<?php 
						$from_url = $this->uri->segment(3);
						foreach($employees as $e) {
							$class = null;
							
							if ($from_url == $e->employee_id) {
								$class = "class='liselected'";
							}
							
							echo "<a href='".base_url()."/leave/management/{$e->employee_id}/#{$e->employee_id}'>";
								echo "<li {$class} id='{$e->employee_id}'>";
									echo strtoupper($e->f_name);
								echo "</li>";
							echo "</a>";
						}
					?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ($noemp == false): ?>
<table class='ledgertbl'>
	<thead>
		<tr>
			<th colspan='2' class='thename' style='padding-left: 25px !important;'> <?php if (isset($ledger[0][2]['fullname'])) { echo $ledger[0][2]['fullname']; } ; ?>  
				
			</th>
			<th colspan='4' style='background: #fff;'> 
				<p class='tholder'> 
					<span class='thcap'> Forced Leave <small> as of <?php echo date("Y"); ?> </small> </span> 
					<span class='thdets'> <?php echo $fl; ?> </span>
				</p>
			</th>
			<th colspan='4' style='background: #fff;box-shadow: 0px 4px 5px #c7c7c7;'>
				<p class='tholder'> 
					<span class='thcap'> Special Leave <small> as of <?php echo date("Y"); ?> </small> </span> 
					<span class='thdets'> <?php echo $spl; ?> </span>
				</p>	
			</th>
			<th colspan='2'>
				<a href='<?php echo base_url(); ?>my/newledger/<?php echo $this->uri->segment(3); ?>/coc/'> CTO Ledger </a>
			</th>
			<th colspan='40'>
				<?php if (!isset($notadmin) || !$notadmin): ?>
					<button class='btn btn-default addleave btn-sm' id='show_addleave' data-empid='<?php echo $this->uri->segment(3); //$ledger[0][2]['empid']; ?>'> 
						<i class='fa fa-plus-square' aria-hidden='true'></i> &nbsp; Add credits
					</button> 
					<a id='printlink'> <i class="fa fa-print" aria-hidden="true"></i> Print </a>
					<!--button class='btn btn-primary btn-sm' id='addleavecredit' data-empid='<?php // echo $this->uri->segment(3); // $ledger[0][2]['empid']; ?>'> 
						<i class='fa fa-trophy' aria-hidden='true'></i> Award Credit 
					</button-->
				<?php endif; ?>
			</th>
			
		</tr>
		<tr style='background: #fff;'>
			<th rowspan=2 style='width: 200px;'> Period </th>
			<th colspan=5> Particulars </th>
			<th colspan=4 class='vacation'> Vacation Leave </th>
			<th colspan=4 class='sick'> Sick Leave </th>
			<th rowspan=2> Action </th>
		</tr>
		<tr style='background: #fff;'>
			<th> &nbsp; </th>
			<th> &nbsp; </th>
			<th> Day/s </th>
			<th> hrs </th>
			<th> mins </th>
			
			<!-- vacation leave -->
				<th class='vacation'> Earned </th>
				<th class='vacation'> With Pay </th>
				<th class='vacation'> Balance </th>
				<th class='vacation'> W/o pay </th>
			<!-- vacation leave -->
			
			<!-- sick leave -->
				<th class='sick'> Earned </th>
				<th class='sick'> With Pay </th>
				<th class='sick'> Balance </th>
				<th class='sick'> W/o pay </th>
			<!-- sick leave -->
		</tr>
	</thead>
	
	<tbody>
		<?php 
			$vlroot   = 0;
			$slroot   = 0;
			
			$count    = 1;
			
			// vacation leave variables 
				$vlearned  = 0;
				$vlminus   = 0;
				$vlbalance = 0;
			// end vacation leave variables
		
			$isearned 	   = null;
			$other 	  	   = null;
		
			for($i = 0, $l = count($ledger)-1; $i <= count($ledger)-1; $i++, $l--) {
				if($ledger[$l][2]['desc'] == "earned" || strtolower($ledger[$l][2]['desc']) == "forwarded balance") {
					$isearned = "editthis";
					$other 	  = null;
				} else if ( strtolower($ledger[$l][2]['desc']) == "tardiness" || strtolower($ledger[$l][2]['desc']) == "undertime") {
					$other 	  = "editthis";
					$isearned = null;
				} else {
					$isearned = null;
					$other 	  = "editthis";
				}
				
				if (isset($notadmin) && $notadmin) {
					$isearned 	   = null;
					$other 	  	   = null;
				}
				
				echo "<tr data-elctr = '{$ledger[$l][2]['elc']}'>";
						echo "<td>";
							echo $ledger[$l][2]['period'];
						echo "</td>";
						echo "<td> <span class='labeltext'>";
								if ($ledger[$l][2]['specs'] != null) {
									echo $ledger[$l][2]['specs']." - ";
								}
						echo " {$ledger[$l][2]['desc']} </span> </td>";
						echo "<td> &nbsp; </td>";
						
						echo "<td>";
							//var_dump($ledger[$l][2]['days']);
							echo ($ledger[$l][2]['days']==0)?"&nbsp;":$ledger[$l][2]['days'];
						echo "</td>";
						echo "<td class='{$other}' data-field='hrs'>";
							echo ($ledger[$l][2]['hrs']==0)?"":$ledger[$l][2]['hrs'];
						echo "</td>";
						echo "<td class='{$other}' data-field='mins'>";
							echo ($ledger[$l][2]['mins']==0)?"":$ledger[$l][2]['mins'];
						echo "</td>";
						
							// vacation leave 
								echo "<td class='vacation {$isearned}' data-field='vl_earned'>";
									echo ($ledger[$l][0]['earned']==0)?"":$ledger[$l][0]['earned'];
								echo "</td>";
									
								echo "<td class='vacation'>";
									echo ($ledger[$l][0]['withpay']==0)?"":$ledger[$l][0]['withpay'];
								echo "</td>";
								
								echo "<td class='vacation'>";
									// echo ($ledger[$l][0]['balance']==0)?"":$ledger[$l][0]['balance'];
									echo $ledger[$l][0]['balance'];
								echo "</td>";
								
								echo "<td class='vacation'>";
									echo ($ledger[$l][0]['withopay']==0)?"":$ledger[$l][0]['withopay'];
								echo "</td>";
							// end vacation
							
							// sick leave 
								echo "<td class='sick {$isearned}' data-field='sl_earned'>";
									echo ($ledger[$l][1]["earned"]==0)?"":$ledger[$l][1]["earned"];
								echo "</td>";
								
								echo "<td class='sick'>";
									echo ($ledger[$l][1]["withpay"]==0)?"":$ledger[$l][1]["withpay"];
								echo "</td>";
									
								echo "<td class='sick'>";
									// echo ($ledger[$l][1]["withpay"]==0)?"":$ledger[$l][1]["balance"];
									echo $ledger[$l][1]["balance"];
								echo "</td>";
									
								echo "<td class='sick'>";
									echo ($ledger[$l][1]["withopay"]==0)?"":$ledger[$l][1]["withopay"];
								echo "</td>";
							
							// remarks 
							
								echo "<td>";
									if (!isset($notadmin) || !$notadmin) {
										echo "<button class='btn btn-danger recallbtn' 
												data-grpid='{$ledger[$l][2]['grpid']}'  
												data-elcid='{$ledger[$l][2]['elc']}' 
												data-count=''> <i class='fa fa-edit'></i> adjust </button>";
									}
								echo "</td>";
					echo "</tr>";
					
			}
			
		?>
	</tbody>
</table>
	<?php endif; ?>
	</section>
</div>

<div class="modal fade in" id="modalrecall" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			  <h4> Application(s) </h4>
			</div> 
			<div class="modal-body">
				<ul id = 'apps'></ul>
				<div id='editwindow'>
					<p id='editthistext'> ---- </p>
					<div class='theeditwin'>
						<input type='text' class='edittext' id='editthisval'/>
						<button class='btn btn-primary' id='updatethis'> ------ </button>
					</div>
				</div>
            </div>
            <div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>


<div class="modal fade in" id="modal_addleave" tabindex="-1" role="dialog" aria-labelledby="show_addleave" aria-hidden="true" style="padding-right: 17px;">
    <div class="modal-lg modal-dialog" style='width: 22%; '>
        <div class="modal-content">
            <div class="modal-header">
				<button class='btn btn-primary btn-sm' id='addleavecredit' data-empid='<?php echo $this->uri->segment(3); // $ledger[0][2]['empid']; ?>'> 
					<i class='fa fa-trophy' aria-hidden='true'></i> Award Credit 
				</button>
				<h4 style='margin: 0px 0px 30px 0px;'> 
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
						
						<!-- not displayed -->
						<tr class='vlslflspl' style='display:none;'>
							<td> 
								<span> Forced Leave </span>
								<input type='text' class='form-control' id='fl_balance'/>
							</td>
						</tr>
						<tr class='vlslflspl' style='display:none;'>
							<td> 
								<span> SPL </span>
								<input type='text' class='form-control' id='spl_balance'/>
							</td>
						</tr>
						<!-- end -->
						
						<tr style='display:none;'>
							<td> 
								<span> COC (dd:hh:mm) </span>
								<input type='text' class='form-control' id='coc_balance'/>
							</td>
						</tr>
						
						<tr id='otbalance_row' style='display:none;'>
							<td> 
								<span> Add COC (dd:hh:mm) </span>
								<input type='text' class='form-control' id='coc_ot_balance'/>
							</td>
						</tr>
					</table>
				</div>
				<div style='padding: 8px 0px 14px;' class='deduction_group' style='background: #eaeaea; border-top: 1px solid #d2d2d2;'>
					<table class='leavetable'>
						<tr>
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
							<td colspan=3>
								<span> type </span>
								<select class='form-control btn btn-default' id='typeofleave' >
									<option> --Choose-- </option>
									<option value='2'> (VL)  - Vacation Leave </option>
									<option value='1'> (SL)  - Sick Leave </option>
									<option value='4'> (SPL) - Special Leave</option>
									<option value='6'> (FL)  - Force Leave</option>
									<option value='3'> (ML)  - Maternity Leave</option>
									<option value='7'> (RL)   - Rehabilitation Leave</option>
									<option value='11'> (PL)   - Paternity Leave</option>
									<option value='8'> RA 9710 s. 2010 and CSC MC 25 s. 2010</option>
									<option value='9'> Gynaecological Disorder </option>									
									<option value='10'> Solo Parent </option>
									<option value='12'> Anti-Violence Against women </option>
									<option value='13'> Terminal Leave </option>
									<option value='15'> Study Leave </option>
								</select>
							</td>
						</tr>
						
						<tr id='formonet'>
							<td colspan=3>
								<span> for monetization </span>
								<select class='form-control btn btn-default' id='formonetselect'>
									<option value='0'> NO </option>
									<option value='1'> YES </option>
								</select>
							</td>
						</tr>
						
						<tr id='range_calendar'>
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
							<!--  half day sick leave -->
								<tr id='halfdaysick'>
									<td colspan=3>
										<span> half day </span>
										<select class='form-control btn btn-default' id='ishalfday'>
											<option value='no'> NO </option>
											<option value='yes'> YES </option>
										</select>
									</td>
								</tr>
							<!-- ###### -->
							
							<!-- for pass slip -->
								<tr id='pssliprow' style='background: rgb(241, 241, 241);display: none;border-top: 3px dotted #e0e0e0;border-bottom: 3px dotted #e0e0e0;'>
									<td colspan='3' style='padding: 8px 15px;'>
										<p> <strong> Pass Slip </strong> </p>
										<span> Time OUT </span>
										<input type='text' class='cto_time_txt' id='timeout'/>
										<span> Time IN </span>
										<input type='text' class='cto_time_txt' id='timebackin'/>
										<button class='btn btn-primary btn-xs' id='compbtn' style='margin-top: 5px;'> Compute </button>
									
										<hr style='margin: 8px 0px;'/>
										<p> <strong> Send file </strong> </p>
										<input type='file' class='btn-default'/> 
										<button class='btn btn-primary btn-xs' style='margin-top: 5px;' id='sendps'> Send </button>
									</td>
								</tr>
							<!-- ############# -->
						<tr id='dhm_row'>
							<td> 
								<span> Days </span>
								<input class='form-control' type='text' id='days_deds' disabled='disabled'/> 
							</td>
							<td> 
								<span> Hrs </span>
								<input class='form-control' type='text' id='hrs_deds' disabled = 'disabled' /> 
							</td>
							<td>
								<span> Mins </span> 
								<input class='form-control' type='text' id='mins_deds' disabled = 'disabled' /> 
							</td>
						</tr>
						
						<tr id='cto_row'>
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

					</table>
				</div>

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