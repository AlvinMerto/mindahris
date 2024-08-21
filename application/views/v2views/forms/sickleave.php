<div class='content-wrapper' style='padding:0px;'> <!-- content wrapper -->
	
	<div class='navigation_area'>
		<ul>
			<li id='printsick'> <i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print </li>
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
						
			$("#printsick").on("click", function() {
			  var newWin=window.open('','Print-Window');
				  newWin.document.open();
				  //newWin.document.write("<html> <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/> <link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/sickleave.style.css'/> <body onload='window.print()' style='font-family: \"Source Sans Pro\",\"Helvetica Neue\",Helvetica,Arial,sans-serif;font-weight: 400;'>"+divToPrint.innerHTML+"</body></html>");
				  newWin.document.write('<!DOCTYPE html>\n'+
										'<html>\n' +
										'<head>\n' +
										'<meta charset="utf-8" />\n' +
										'<style> @media print{@page {size: Legal landscape; margin-top:-100px !important; } .sickleave_form { margin-top:-10px !important; margin-left:0px !important; margin-right:0px !important; }} </style>'  +
										'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>' +
										'<link rel="stylesheet" href="<?php echo base_url(); ?>v2includes/style/sickleave.style.css"/>' +
										'</head>\n' +
										'<body onload="window.print()" style="width: 1465px; height: 816px; margin:0px !important; font-family:calibri;">\n' + divToPrint.innerHTML +  '\n</body>\n</html>');
				  newWin.document.close();
			})
		})
	</script>
	
	<section class="content"> <!-- section class content -->
	  <div id='printthis'>
		<div class='content_wrapper sickleave_form'>
		<?php 
			// var_dump($information['sl']);
		?>
		<h5> <strong> <u> CSC Form No. 6. (Revised 1998) </strong> </u> </h5>
		<table class='formtable_style'>
			<thead class='sick_thead'>
				<tr>
					<th> MINDANAO DEVELOPMENT AUTHORITY (MinDa) </th>
					<th style='border-left: 1px solid lightblue;'> APPLICATION FOR LEAVE </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style='border-right: 1px solid #333; padding: 0px 15px;'>
						<p style='font-size: 10px; margin: 7px 3px;'> CSC FORM NO. 6 (Revised 1998) <span style='float:right;'> <?php echo $information['specialcode']; ?> </span> </p>
						<table>
							<tr>
								<td> Signature: 
									<div style='position:relative; width:auto; height:auto; text-align: center;'>
										<?php if ($sig_data[0]->settingvalue == 1) { ?>
											<img src='<?php echo $information['signature']; ?>'/>
										<?php } else { ?>
											<div style='padding: 10px 0px;'></div>
										<?php } ?>
										<!--p style='margin:20px 0px;'> &nbsp; </p-->
										<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
									</div>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Name: </p>
									 <p> <?php echo $information['fname']; ?> </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Monthly Salary: </p>
									 <p> <?php echo $information['rate']; ?> </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Office/Division: </p>
									 <p> <?php echo $information['off_div']; ?> </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> Date of Filing: </p>
									<p> <?php echo $information['dateadded']; ?> </p>
								</td>
							</tr>
							<tr>
								<td> <p class='caption_td'> No. of Working days applied: 
									 <p> <?php echo $information['numofdays']; echo ($information['numofdays'] == 1)?" day":" days"; ?>  </p>
								</td>
							</tr> 
							<tr>
								<td> <p class='caption_td'> Inclusive Date: </p>
									 <p> <?php echo $information['checkdates']; ?> </p>
									<!--input type='text' name='incdates' id='incdates' value='<?php // echo $inclusivedate; ?>'/-->
								</td>
							</tr>
							<!--tr>
								<td> Commutation: </td>
								<td> 
									<input type='radio' value='requested' id='requested' name='commutation[]'/> <label for='requested'> Requested </label>
									<input type='radio' value='not requested' id='notrequested' name='commutation[]'/> <label for='notrequested'> Not Requested </label>
								</td>
							</tr-->
						</table>
						<hr  class='divisionbottom'/>
						<table class='bordered_table'>
							<tr>
								<th colspan=5> YOUR REMAINING LEAVE CREDITS: </th>
							</tr>
							<tr>
								<th> Leave Credits as of </th>
								<th> Vacation </th>
								<th> Sick </th>
								<th> COC </th>
								<th> TOTAL </th>
							</tr>
							<tr>
								<td> <?php echo $information['dateadded']; ?> </td>
								<td> <?php echo $information['rem_vl']; ?> day(s) </td>
								<td> <?php echo $information['rem_sl']; ?> day(s)</td>
								<td> <?php // echo $information['rem_cc']; ?> hour(s) </td>
								<td> <?php echo $information['total']. " day/s";// and ".$information['rem_cc']." hour(s)"; ?> </td>
							</tr>
							<tr>
								<td> Less: THIS LEAVE </td>
								<td> &nbsp; </td>
								<td> 
									<?php 
										// $sl_leave = 1.25 * $information['numofdays'];; 
										echo $information['theleave']. " day(s)";
									?>
								</td>
								<td> &nbsp; </td>
								<td> <?php echo $information['theleave']. " day(s)"; ?> </td>
							</tr>
							<tr>
								<td> LEAVE BALANCE </td>
								<td> <?php echo $information['rem_vl'] . " day(s)"; ?> </td>
								<td> <?php echo $information['rem_sl'] - $information['theleave'] . " day(s)"; ?> </td>
								<td> <?php // echo $information['rem_cc']; ?> hour(s)</td>
								<td> <?php echo $information['rem_vl'] + ($information['rem_sl']-$information['theleave']). " day(s)"; // and ". $information['rem_cc']." hour(s)"; ?> </td>
							</tr>
						</table>	
						
						 <table class='divisionbottom'>
							<thead>
								<th>
									Certified By:
								</th>
							</thead>
							<tbody>
								<td> 
									<!--p class='approved'> approved  </p--> 
									<div class='sigimg' style="position:relative;">
										<?php if ($sig_data[0]->settingvalue == 1) { ?>
											<img class='signature_pic' src="<?php echo $information['hr']['signature']; ?>"/>
										<?php } else { ?>
											<div style='padding: 35px 0px;'></div>
										<?php } ?>
										<!--div style='position:absolute; top:0px; width:100%; height:100%;'></div-->
									</div>
									<p class='sigabovename' style='margin-top:-35px;'> 
										<?php echo $information['hr']['name']; ?>
										<br/>
										<span class='namecaption'>HRMD Unit</span>
									</p>			
								</td>
							</tbody>
						</table> 
						
					</td>
					<td style='vertical-align: top; padding: 0px 15px;'>
					
						<table>
								<thead>
									<th colspan=2 style='text-align:center;'> TYPE OF LEAVE </th>
								</thead>
								<tbody class='other_dets_sick'>
									<tr>
										<?php 
											$td_bg = "";
											$icons = "";
											
											$td_bg1 = "";
											$icons1 = "";
											
											$out_patient  = null;
											$in_patient   = null;
											
											if ( $information['sl_details'] == 1 ) {
												$in_patient   = $information['reasons'];
												
												$icons = "<i class='fa fa-check-square-o' aria-hidden='true'></i>";
												$icons1 = "<i class='fa fa-square-o' aria-hidden='true'></i>";
												
												$td_bg = "style='background: #f0f0f0;'";
												$td_bg1 = "style='background: #f0f0f0;'";
											} else if ( $information['sl_details'] == 2 ){
												$out_patient  = $information['reasons'];
												
												$td_bg = "style='background: #f0f0f0;'";
												$td_bg1 = "style='background: #f0f0f0;'";
												
												$icons = "<i class='fa fa-square-o' aria-hidden='true'></i>";
												$icons1 = "<i class='fa fa-check-square-o' aria-hidden='true'></i>";
											}
										?>
										<td style='vertical-align:top;'>
											<p> <i class='fa fa-check-square-o' aria-hidden='true'></i> Sick </p>
										</td>
										
										<td>
											<p> <?php echo $icons; ?> Out Patient (Specify)</p>
											<div class='specs_vac'> <?php echo $in_patient; ?> </div>
											<p> <?php echo $icons1; ?> In Hospital (Specify)</p>
											<div class='specs_vac'> <?php echo $out_patient; ?> </div>
										</td>
									</tr>
								</tbody>	
							</table>
						
						 <table>
							<thead>
								<th colspan=2 style='text-align:center;'> ACTION ON APPLICATION </th>
							</thead>
							<tbody>
								<tr>
									<td> Recommending: </td>
								</tr>
								<tr>
									<td> 
										<p> (<?php if($Division_id != 0 && $ischief == 0 && $isdbm == 0): ?> 
												<?php if ( $approvals[0]['division'][3] == 1): ?>
													<i class="fa fa-check" aria-hidden="true"></i>
												  <?php else: ?>
													&nbsp;
												  <?php endif; ?>
											<?php endif; ?>
											) Approval </p>
										<p> ( <?php //if ( $approvals[0]['division'][3] == 0): ?>
												<?php if ( $remarks_div != NULL ): ?>
												<i class="fa fa-check" aria-hidden="true"></i>
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
										
										<div class='signbox'>
											<?php if($Division_id != 0 && $ischief == 0 && $isdbm == 0): ?> 	
												<?php if($approvals[0]['division'][3] != 0): ?>
													<div class='sigimg' style="position:relative;">
														<?php if ($sig_data[0]->settingvalue == 1) { ?>
															<img class='signature_pic' style='margin-bottom: -37px;' src="<?php echo $approvals[0]['division'][1]; ?>"/>
														<?php } else { ?>
															<div style='padding: 35px 0px;'></div>
														<?php } ?>
														<p style='font-size: 12px; color: green;'> approved online: <?php  echo $this->uri->segment(3)."-".$approvals[0]['division'][4]; ?> </p>
														<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
													</div>
												<?php endif; ?>
													<div class='action_on_app_tbl' style=''> 
														<p class='thename' style='text-transform:uppercase;'> <?php echo $approvals[0]['division'][0]; ?></p>
														<p class='namecaption'>
															<?php echo $approvals[0]['division'][2]; ?>
														</p>
														<p class='official_title'> Chief/OIC Chief of Office </p>
													</div>
												<?php endif; ?>
										</div>	
										<?php // if($approvals[0]['division'][3] == 1): ?>
											<!--div class='sigimg' style="position:relative; margin-bottom:-40px;">
												<img class='signature_pic' src="<?php //echo $approvals[0]['division'][1]; ?>"/>
												<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
											</div-->
										<?php //endif; ?>
											<!--div class='sigabovename' style='margin-top: 0px;'> 
												<p class='thename'> <?php //echo $approvals[0]['division'][0]; ?></p>
												<p class='namecaption'>
													<?php //echo $approvals[0]['division'][2]; ?>
												</p>
											</div-->							
									</td>
								</tr>
							</tbody>
						</table> 

						<table>
							<thead>
								<th></th>
							</thead>
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
										<p class='specs_vac'>
											<?php 
												if ( $approvals[1]['last'][3] == 0) {
													echo $remarks;
												} else {
													echo "&nbsp;";
												}
											?>
										</p>
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
									<td colspan=2> 
										<div class='signbox'>
											<?php if($approvals[1]['last'][3] != 0): ?>
												<div class='sigimg' style="position:relative;">
														<?php if ($sig_data[0]->settingvalue == 1) { ?>
															<img class='signature_pic' style='margin-bottom: -35px;' src="<?php echo $approvals[1]['last'][1]; ?>"/>
														<?php } else { ?>
															<div style='padding: 35px 0px;'></div>
														<?php } ?>
													
													<p style='font-size: 12px; color: green;'> approved online: <?php echo $this->uri->segment(3)."-".$approvals[1]['last'][4]; ?> </p>
													<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
												</div>
											<?php endif; ?>
												<div class='action_on_app_tbl' style=''> 
													<p class='thename' style='text-transform:uppercase;'> <?php echo $approvals[1]['last'][0]; ?></p>
													<p class='namecaption'>
														<?php echo $approvals[1]['last'][2]; ?>
													</p>
													<p class='official_title'> Authorized Official </p>
												</div>
										</div>	
										
										<?php // if($approvals[1]['last'][3] == 1): ?>
											<!--div class='sigimg' style="position:relative; margin-bottom:-40px;">
												<img class='signature_pic' src="<?php //echo $approvals[1]['last'][1]; ?>"/>
												<div style='position:absolute; top:0px; width:100%; height:100%;'></div>
											</div-->
										<?php // endif; ?>
											<!--div class='sigabovename' style='margin-top: 0px;'> 
												<p class='thename'> <?php //echo $approvals[1]['last'][0]; ?></p>
												<p class='namecaption'>
													<?php //echo $approvals[1]['last'][2]; ?>
												</p>
											</div-->
									</td>
								</tr>
							</tbody>
						</table> 
						
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
	  </div>
</div>
