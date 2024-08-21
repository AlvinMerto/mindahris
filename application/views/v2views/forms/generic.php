<div class='content-wrapper' style='padding-top:0px;'> <!-- content wrapper -->
	<div class='navigation_area'>
		<ul>
			<li id='printgeneric'> <i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print </li>
			<li> 
				<i class="fa fa-download" aria-hidden="true"></i>&nbsp; Save 
				<ul>
					<li> <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; as Picture </li>
					<li> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp; as PDF </li>
				</ul>
			</li>
		</ul>
	</div>
	
	<script>
		$(document).ready(function() {
			 var divToPrint=document.getElementById('printthis');
			
			console.log(divToPrint);
			
			$("#printgeneric").on("click", function() {
				/*
				var newWindow = window.open('', '', 'width=800, height=500'),
					 document = newWindow.document.open()
				*/		  
			  var newWin=window.open('','Print-Window');
				  newWin.document.open();
				 // newWin.document.write("<html> <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/> <link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/generic.style.css'/> <body onload='window.print()' style='font-family: \"Source Sans Pro:\",\"Helvetica Neue\",Helvetica,Arial,sans-serif;'>"+divToPrint.innerHTML+"</body></html>");
			      newWin.document.write('<!DOCTYPE html>\n'+
										'<html>\n' +
										'<head>\n' +
										'<meta charset="utf-8" />\n' +
										'<style> @media print{@page {size: Legal landscape; margin-top:-100px !important; } .form_wrapper_div { margin-left:0px !important; margin-right:0px !important; }} </style>'  +
										'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>' +
										'<link rel="stylesheet" href="<?php echo base_url(); ?>v2includes/style/generic.style.css"/>' +
										'</head>\n' +
										'<body onload="window.print()" style="width: 1405px; height: 816px; margin:0px !important; font-family:calibri;">\n' + divToPrint.innerHTML +  '\n</body>\n</html>');
				  newWin.document.close();
				  // margin-right: 1.5in
			})
		})
	</script>
	
	<section class="content" style='background: #f0f0f0;'> <!-- section class content -->
      <div class='content_wrapper'>
		<div id='printthis'>
			<div class='form_wrapper_div'>
		
			<h5> <strong> <u> CSC Form No. 6. (Revised 1998) </strong> </u> </h5>
			<table class='formtable_style'>
			<thead>
				<tr>
					<th style='text-align:center;'> MINDANAO DEVELOPMENT AUTHORITY (MinDa) </th>
					<th style='text-align:center; border-left: 1px solid #333333 !important;'> APPLICATION FOR LEAVE </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<p style='font-size: 10px; margin: 7px 3px;'> CSC FORM NO. 6(Revised 1998) <span style='float:right;'> <?php echo $information['specialcode']; ?> </span> </p>
						<table class='emp_details_table'>
							<tr>
								<td> 
									<div style='position:relative; width:auto; height:auto;'>
										Signature:
										<?php if ($sig_data[0]->settingvalue == 1) { ?>
											<img style='display: table; margin: 0px auto -30px;' class='' src='<?php echo base_url()."assets/esignatures/".$information[0]["signature"]; ?>'/>
										<?php } else { ?>
											<div style='padding: 10px 0px;'></div>
										<?php } ?>
										
										<!--p style='margin: 30px 0px;'> &nbsp; </p-->
										<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
									</div>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Name: </p>
									 <p>
										<?php echo $information[0]['fullname']; ?> 
									 </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Monthly Salary: </p>
									 <p> <?php echo $information[0]['month_sal']; ?> </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Office/Division: </p>
									 <p> <?php echo $information[0]['off_div']; ?> </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Date of Filing: </p>
									 <p> <?php echo $information[0]['dateoffiling']; ?> </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> No. of Working days applied: </p>
									 <p> 
										 <?php 
											echo $information[0]['noofdays']; 
											if( isset($information['lt']) && $information['lt'] == "vl" ) {
												echo " day(s)";
											}
										 ?> 
									 </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Inclusive Date: </p>
									 <p> <?php echo $information[0]['inclusive_dates']; ?> </p>
								</td>
							</tr>
							<!--tr>
								<td> Commutation: </td>
								<td> 
									<input type='radio' id='requested' name='commutation[]' value='requested'/> <label for='requested'> Requested </label>
									<input type='radio' id='notrequested' name='commutation[]' value='not requested'/> <label for='notrequested'> Not Requested </label>
								</td>
							</tr-->
						</table> 
						
						<table class='bordered_table'>
							<tr>
								<th colspan=5> Personnel Use Only: </th>
							</tr>
							<tr>
								<th> Leave Credits as of </th>
								<th> Vacation </th>
								<th> Sick </th>
								<th> COC </th>
								<th> TOTAL </th>
							</tr>
							<tr style='font-style:italic;'>
								<td> <?php echo date("l, F d, Y", strtotime($information[0]['dateoffiling'])); ?> </td>
								<td> <?php echo $information['rem_vl']; ?> days </td>
								<td> <?php echo $information['rem_sl']; ?> days </td>
								<td>
									<?php
										if (isset($information['rem_cc'])) {
											echo $information['rem_cc'] ." hour(s)";
										}
									?>
								</td>
								<td> <?php 
										if (isset($information['total']) && isset($information['rem_cc'])) {
											echo "<b>".$information['total']."</b> days "; 
											echo " and <b>" . $information['rem_cc']."</b> hour(s)";
										}
									?> </td>
							</tr>
							<?php
								// compute this leave
									$numof_d  = $information[0]['noofdays'];
									$factor   = 1.25;
									
									$vl_this_leave    = 0; // $information['rem_vl'];
									$sl_this_leave    = 0; // $information['rem_sl'];
									$total_this_leave = $information['rem_vl'] + $information['rem_sl'];
									
									if ($information[0]["typeofleave"] == "Vacation Leave") {
										$vl_this_leave = 1.25 * $numof_d;
									}
								// end 	
							?>
							<tr>
								<td> Less: THIS LEAVE </td>
								<td> <?php if (isset($information['lt']) && $information['lt'] == "vl") { echo ($information['lt'] == "vl")?$information['theleave']." day(s)":""; } ?> </td>
								<td> <?php if (isset($information['lt']) && $information['lt'] == "sl") { echo ($information['lt'] == "sl")?$information['theleave']." day(s)":""; } ?> </td>
								<td> <?php if (isset($information['lt']) && $information['lt'] == "coc") { echo ($information['lt'] == "coc")?$information['theleave']."hour(s)":""; }?> </td>
								<td> <?php if (isset($information['theleave'])) { echo $information['theleave']; } ?> day(s) </td>
							</tr>
							<tr style='font-weight:bold;'>
								<td> LEAVE BALANCE </td>
								<td> <?php 
										$l_bal = $information['rem_vl'] - $vl_this_leave;
										//echo $l_bal;  
										if (isset($information['lt'])) {
											echo ($information['lt'] == "vl")?$information['theless']:$information['rem_vl'];
										}
									?> day(s) </td>
								<td> <?php if(isset($information['rem_sl'])) { echo $information['rem_sl']; } ?> day(s) </td>
								<td> 
									<?php 
										if (isset($information['lt']) && $information['lt'] == "coc"){
											echo ($information['lt'] == "coc")?$information['theless']:$information['rem_cc'];
										}
									?>
									hour(s)
								</td>
								<td> <?php 
										$t_bal = $l_bal + $information['rem_sl'];
										// echo $t_bal; 
										if (isset($information['rem_sl']) && isset($information['theless'])) {
											echo $information['rem_sl'] + $information['theless'];
										}
									?> day(s) and 
									<?php 
										if (isset($information['tot_rem'])) {
											echo $information['tot_rem']." hour(s)";
										}
									?>
									</td>
							</tr>
							
							<tbody>
								<td class='hr_class' colspan=5 style='border-bottom: 0px;'> 
								<p style='font-weight:bold;'> Certified By:</p>
								<!-- 	<p class='approved'> approved  </p> -->
									<div class='sigimg'>
										<?php if ($sig_data[0]->settingvalue == 1) { ?>
											<img class='signature_pic' style='margin-bottom: -40px;' src="<?php echo $information['hr']['signature']; ?>"/>
										<?php } else { ?>
											<div style='padding: 35px 0px;'></div>
										<?php } ?>
										<!--div style='position:absolute; top:0px; width:100%; height:100%;'></div-->
									</div>
									<p class='sigabovename'> 
										<?php echo $information['hr']['name']; ?>
										<br/>
										<span class='namecaption'>HRMD Unit</span>
									</p>									
								</td>
							</tbody>
						</table> 
						
					</td>
					<td style='vertical-align: top; border-left: 1px solid #333333 !important; padding-right: 10px;'>
						 <table style='width: 100%;'>
							<thead>
								<th class='head_type'>
									TYPE OF LEAVE
								</th>
							</thead>
							<tbody>
							<!-- vacation start -->
								<tr>
									<td style='vertical-align: top; padding: 12px;text-align: center;font-size: 16px; border: 0px;'>
										<table class='inside_table_td'>
											<tr>
												<td style='vertical-align:top; text-align:left;'>
													( <?php if ( $information[0]["typeofleave"] == "Vacation Leave"): ?>
														<i class="fa fa-check" aria-hidden="true"></i>
													  <?php else: ?>
														&nbsp;
													  <?php endif; ?>
													) Vacation Leave
												</td>
												<td style='text-align:left;'> 
													<p> ( <?php if ( isset( $information[0]["vl_det"]) && $information[0]["vl_det"] == 1): ?>
														<i class="fa fa-check" aria-hidden="true"></i>
													  <?php else: ?>
														&nbsp;
													  <?php endif; ?>
													) Within the Philippines </p>
													<p> ( <?php if ( isset( $information[0]["vl_det"]) && $information[0]["vl_det"] == 2): ?>
														<i class="fa fa-check" aria-hidden="true"></i>
													  <?php else: ?>
														&nbsp;
													  <?php endif; ?>
													) Abroad(specify) </p>
													<p class='specs_vac'> 
														<?php if ( isset( $information[0]["vl_det"]) && $information[0]["vl_det"] == 2): ?>
															<?php echo $information[0]['abroad_dets']; ?>
													  <?php else: ?>
														&nbsp;
													  <?php endif; ?>
													</p>
												</td>
											</tr>
											<tr>
												<td style='vertical-align:top; text-align:left;'>
													( <?php if ( $information[0]["typeofleave"] != "Vacation Leave" && 
																 $information[0]["typeofleave"] == "Maternity Leave"): ?>
														<i class="fa fa-check" aria-hidden="true"></i>
													  <?php else: ?>
														&nbsp;
													  <?php endif; ?>
													) MATERNITY 
												</td>
												<td>
													<p class='specs_vac'> &nbsp; </p>
												</td>
											</tr>
											<tr>
												<td style='vertical-align:top; text-align:left;'>
													( <?php if ( $information[0]["typeofleave"] != "Vacation Leave"): ?>
														<i class="fa fa-check" aria-hidden="true"></i>
													  <?php endif; ?>
													) OTHERS (Specify) 
												</td>
												<td>
													<p class='specs_vac'> 
														<?php if ( $information[0]["typeofleave"] != "Vacation Leave"): ?> 
															<?php echo $information[0]["typeofleave"]; ?>
														<?php else: ?>
															&nbsp;
														<?php endif; ?>
													</p>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</tbody>	
						</table>
						
						<p style='text-align: center;'> ACTION ON APPLICATION </p>
						<table class='divisionbottom'>
							<thead>
								<th style='border: 0px;'> Recommending: </th>
							</thead>
							<tbody>
								<tr>
									<td style='border:0px;'>
										<?php // echo "hello".$approvals[0]['division'][3]; 
											  // if($Division_id != 0 || $ischief == 0 || $isdbm == 0): ?>
										<p> ( <?php if ($browsed_emp_id != $approvals[0]['division'][4]): ?> 
													<?php if( $approvals[0]['division'][4] != $approvals[1]['last'][4] ): ?>
														<?php if ( $approvals[0]['division'][3] == 1): ?>
															<i class="fa fa-check" aria-hidden="true"></i>
														<?php else: ?>
															&nbsp;
														<?php endif; ?>
													<?php else: ?>
															&nbsp;
													<?php endif; ?>
											<?php else: ?>
												&nbsp;
											<?php endif; ?>
											) Approval </p>
											
										<p> ( <?php if ($browsed_emp_id != $approvals[0]['division'][4]): ?>
												  <?php //if ( $approvals[0]['division'][3] == 0 ): ?>
												  <?php if ( $remarks_div != NULL ): ?>
													<i class="fa fa-check" aria-hidden="true"></i>
												  <?php else: ?>
													&nbsp;
												  <?php endif; ?>
											  <?php else: ?>
												&nbsp;
											  <?php endif; ?>	
											) Disapproval due to </p> 
										<p class='disapp_due_to'> 
											<?php 
												if ( $approvals[0]['division'][3] == 0) {
													echo $remarks_div;
												} else {
													echo "&nbsp;";
												}
											?>	
										</p>
								<?php // var_dump($approvals); ?>
										<div class='action_on_app_tbl' style=''> 
										<?php //echo $isdbm; // $approvals[0]['division'][4] ?>
											<?php //if($Division_id != 0 && $ischief == 0 && $isdbm == 0): ?>
											<?php if ($browsed_emp_id != $approvals[0]['division'][4]): ?>
												<?php if( $approvals[0]['division'][4] != $approvals[1]['last'][4] ): ?>
													<?php // if( $approvals[0]['division'][3] != 0 ): ?>
													<?php if( $approvals[0]['division'][3] == 1 ): ?>
														<div class='sigimg' style="position:relative;">
															<?php if ($sig_data[0]->settingvalue == 1) { ?>
																<img class='signature_pic' style='margin-bottom: -18px;' src="<?php echo $approvals[0]['division'][1]; ?>"/>
															<?php } else { ?>
																<div style='padding: 10px 0px;'></div>
															<?php } ?>
															<p style='font-size: 12px; color: green; margin-top: 30px;'> approved online: <?php echo $this->uri->segment(3)."-".$approvals[0]['division'][4]; ?> </p>
															<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
														</div>
													<?php endif; ?>
														<p class='thename' style='text-transform:uppercase;'> <?php echo $approvals[0]['division'][0]; ?></p>
														<p class='namecaption'>
															<?php echo $approvals[0]['division'][2]; ?>
														</p>
												<?php endif; ?>	
											<?php endif; ?>				
														<p class='official_title'> Chief/OIC Chief of Office </p>
											
											
										</div>
									</td>
								</tr>
							</tbody>
						</table> 

						<table class='divisionbottom'>
							<tbody>
								<tr class='noborder_tds'>
									<td style='vertical-align:top;'>
										( <?php if ( $approvals[1]['last'][3] == 1): ?>
												<i class="fa fa-check" aria-hidden="true"></i>
											  <?php else: ?>
												&nbsp;
											  <?php endif; ?>
										) Approved 		
									</td>
									<td>
										( <?php // if ( $approvals[1]['last'][3] == 0): ?>
										  <?php if ( $remarks != NULL ): ?>
												<i class="fa fa-check" aria-hidden="true"></i>
											  <?php else: ?>
												&nbsp;
											  <?php endif; ?>
										) Disapproved due to:
										<p class='specs_vac'> <?php if ( $approvals[1]['last'][3] == 0) {echo $remarks;} else { echo "&nbsp;"; } ?> </p>
									</td>
								</tr>
								<tr class='noborder_tds centertd'>
									<td colspan=2>
										<div class='line-div'>
											<p> Days w/Pay </p>
										</div>
									</td>
								</tr>
								<tr class='noborder_tds centertd'>
									<td colspan=2>
										<div class='line-div'>
											<p> Days w/o Pay </p>
										</div>
									</td>
								</tr>
								<tr>
									<td style='border:0px;' colspan=2>
										<div class='action_on_app_tbl' style=''> 
											<?php if($approvals[1]['last'][3] != 0): ?>
												<div class='sigimg' style="position:relative;">
													<?php if ($sig_data[0]->settingvalue == 1) { ?>
														<img class='signature_pic' style='margin-bottom: -35px;' src="<?php echo $approvals[1]['last'][1]; ?>"/>
													<?php } else { ?>
														<div style='padding: 10px 0px;'></div>
													<?php } ?>
													<p style='font-size: 12px; color: green; margin-top: 30px;'> approved online: <?php echo $this->uri->segment(3)."-".$approvals[1]['last'][4]; ?> </p>
													<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
												</div>
											<?php endif; ?>
											
												<p class='thename' style='text-transform:uppercase;'> <?php echo $approvals[1]['last'][0]; ?></p>
												<p class='namecaption'>
													<?php echo $approvals[1]['last'][2]; ?>
												</p>
												<p class='official_title'> Authorized Official </p>
											</div>
									</td>
								</tr>
							</tbody>
						</table> 
						
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		</div>
	</div>
</section>
</div>

