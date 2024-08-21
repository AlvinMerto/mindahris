<div class='content-wrapper' style='padding-top:0px;'> <!-- content wrapper -->
	<div class='navigation_area'>
		<ul>
			<li id='printspl'> <i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print </li>
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
						
			$("#printspl").on("click", function() {
			  var newWin=window.open('','Print-Window');
				  newWin.document.open();
				//  newWin.document.write("<html> <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/> <link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/spl.style.css'/> <body onload='window.print()' style='font-family: \"Source Sans Pro\",\"Helvetica Neue\",Helvetica,Arial,sans-serif;'> <style> .spl_wrap {width:100% !Important;} </style>"+divToPrint.innerHTML+"</body></html>");
				  newWin.document.write('<!DOCTYPE html>\n'+
										'<html>\n' +
										'<head>\n' +
										'<meta charset="utf-8" />\n' +
										'<style> @media print{@page {size: Legal portrait; margin-top:-100px !important; } .spl_wrap { margin-top:0px !important; margin-left:0px !important; margin-right:0px !important; }} </style>'  +
										'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>' +
										'<link rel="stylesheet" href="<?php echo base_url(); ?>v2includes/style/spl.style.css"/>' +
										'</head>\n' +
										'<body onload="window.print()" style="width: 1550px; height: 816px; margin:0px !important; font-family:calibri;">\n' + divToPrint.innerHTML +  '\n</body>\n</html>');
				  newWin.document.close();
			})
		})
	</script>
	
	<section class="content"> <!-- section class content -->
	
      <div class='content_wrapper'>
		
		<div id='printthis'>
		<!--div class='super_spl_wrap'-->
			<div class='spl_wrap'>
			<p class='repphil'> Republic of the Philippines </p>
			<p class='mda'> MINDANAO DEVELOPMENT AUTHORITY </p>
			<p class='regs'> Regions IX, X, XI, XII, XIII and ARMM </p>
			
			<div class='table_wrap_spl'>
			<table class='spl_table'>
				<tbody class='topdoms_div'>
					<tr>
						<td>
							<p class='scnd_tbl_lbl_head'> Name </p>
							<p class='nametxt' id='last_name'> <?php echo $information['lname']; ?> </p>
							<p class='lbl_caption'> (Last) </p>
						</td>
						<td>
							<p class='scnd_tbl_lbl_head'> &nbsp; </p>
							<p class='nametxt' id='first_name'> <?php echo $information['fname']; ?> </p>
							<p class='lbl_caption'> (First) </p>
						</td>
						<td>
							<p class='scnd_tbl_lbl_head'> &nbsp; </p>
							<p class='nametxt' id='middle_name'> <?php echo $information['mname']; ?> </p>
							<p class='lbl_caption'> (Middle Name) </p>
						</td>
					</tr>	
					<tr>
						<td>
							<p class='scnd_tbl_lbl_head'> Staff/Division </p>
							<p class='scnd_tbl_lbl'> <?php echo $information['officediv']; ?> </p>
						</td>
						<td>
							<p class='scnd_tbl_lbl_head'> Position </p>
							<p class='scnd_tbl_lbl'> <?php echo $information['position']; ?> </p>
						</td>
						<td>
							<p class='scnd_tbl_lbl_head'> Date of Filing </p>
							<p class='scnd_tbl_lbl'> <?php echo $information['dateoffiling']; ?> </p>
						</td>
					</tr>
				</tbody>
				<tbody>
					<th colspan='3' class='tabletitle'>
						<p class='doa'> DETAILS OF APPLICATION </p>
						<p class='doa_det'> TYPE OF SPECIAL LEAVE PRIVILEDGES APPLIED FOR </p>
					</th>
				</tbody>
				<tbody>
					<tr class='hoverclass'>
						<!-- personal milestone -->
						<td class=''> 
							<?php 
								$bg   = "";
								$icon = "";
								if ($information['spl_items']['spl_personal_milestone'] == 1) {
									$icon = "selected_icon";
									$bg   = "style=''"; //background: #f0f081;'
								} else {
									$icon = "not_selected_icon";
								}
							?>
							<table <?php echo $bg; ?>>
								<tr>
									<td> 
										<p class='<?php echo $icon; ?>'> </p>
										<label for ='personalmilestone'>
											<strong> PERSONAL MILESTONE </strong>
											<p> (b-day/wedding/wedding anniversary celebrations and other similar milestones, including death anniversaries) </p>
										</label>
									</td>
								</tr>
							</table>
						</td>
						<!-- end -->

						<!-- filial obligations -->
						<td class=''> 
							<?php 
								$bg   = "";
								$icon = "";
								if ($information['spl_items']['spl_filial_obligations'] == 1) {
									$icon = "selected_icon";
									$bg   = "style=''"; //background: #f0f081;
								} else {
									$icon = "not_selected_icon";
								}
							?>
							<table <?php echo $bg; ?>>
								<tr>
									<td> 
										<p class='<?php echo $icon; ?>'></p>
										<label for='filialobligation'>
											<strong> FILIAL OBLIGATIONS </strong>
											<p> (employee's moral obligaton toward his parents and siblings for their medical & social needs.) </p>
										</label>
									</td>
								</tr>
							</table>
						</td>
						<!-- end -->

						<!-- personal transactions -->
						<td class=''> 
							<?php 
								$bg   = "";
								$icon = "";
								if ($information['spl_items']['spl_personal_transaction'] == 1) {
									$icon = "selected_icon";
									$bg   = "style=''"; //background: #f0f081;
								} else {
									$icon = "not_selected_icon";
								}
							?>
							<table <?php echo $bg; ?>>
								<tr>
									<td> 
										<p class='<?php echo $icon; ?>'></p>
										<label for='personaltransaction'>
											<strong> PERSONAL TRANSACTIONS </strong>
											<p> (entire range of transactions as individual does with government and private offices such as paying taxes, court appearances, arranging a housing load, etc.) </p>
										</label>
									</td>
								</tr>
							</table>
						</td>
						<!-- end -->
					</tr>

					<!-- next row -->
					<tr class='hoverclass'>
						<!-- parental obligations -->
						<td class=''> 
							<?php 
								$bg   = "";
								$icon = "";
								if ($information['spl_items']['spl_parental_obligations'] == 1) {
									$icon = "selected_icon";
									$bg   = "style=''"; // background: #f0f081;
								} else {
									$icon = "not_selected_icon";
								}
							?>
							<table <?php echo $bg; ?>>
								<tr>
									<td> 
										<p class='<?php echo $icon; ?>'></p>
										<label for='parentobligation'>
											<strong> PARENTAL OBLIGATIONS </strong>
											<p> (Attendance in school programs, PTA meetings, graduations, First Communions, medical needs, among others, where a child of government employee is involved.) </p>
										</label>
									</td>
								</tr>
							</table>
						</td>
						<!-- end -->

						<!-- domestic emergencies -->
						<td class=''> 
							<?php 
								$bg   = "";
								$icon = "";
								if ($information['spl_items']['spl_domestic_emergencies'] == 1) {
									$icon = "selected_icon";
									$bg   = "style=''"; //background: #f0f081;
								} else {
									$icon = "not_selected_icon";
								}
							?>
							<table <?php echo $bg; ?>>
								<tr>
									<td> 
										<p class='<?php echo $icon; ?>'></p>
										<label for='domesticemergency'>
											<strong> DOMESTIC EMERGENCIES </strong>
											<p> (Urgent repairs needed at home, sudden absence of a yaya or maid and the like) </p>
										</label>
									</td>
								</tr>
							</table>
						</td>
						<!-- end -->

						<!-- calamity, accident, hospitalization leave -->
						<td class=''> 
							<?php 
								$bg   = "";
								$icon = "";
								if ($information['spl_items']['spl_calamity_acc'] == 1) {
									$icon = "selected_icon";
									$bg   = "style=''"; //background: #f0f081;
								} else {
									$icon = "not_selected_icon";
								}
							?>
							<table <?php echo $bg; ?>>
								<tr>
									<td> 
										<p class='<?php echo $icon; ?>'></p>
										<label for="cahl">
											<strong> CALAMITY, ACCIDENT, HOSPITALIZATION LEAVE </strong>
											<p> (Force majure events that affect the life, limb and property of the employee or his immediate family.) </p>
										</label>
									</td>
								</tr>
							</table>
						</td>
						<!-- end -->
					</tr>
					<!-- end -->
					<tr class='center_doms'>
						<td>
							<p> No. of days applied for </p>
							<p style='font-size: 35px;'> <?php echo $information['numofdays']; ?> </p>
						</td>
						<td>
							<p> Inclusive Date </p>
							<p> 
								<?php 
									echo $information['dates'];
								?>							
							</p>
						</td>
						<td style='padding: 13px 0px;'>
							<div style='position:relative; width:auto; height:auto;'>
								<?php if ($sig_data[0]->settingvalue == 1) { ?>
									<img src='<?php echo $information['signature']; ?>'/>
								<?php } else { ?>
									<div style='padding: 10px 0px;'></div>
								<?php } ?>
								
								<p style='margin:20px 0px;'> &nbsp; </p>
								<div style='position:absolute; width:100%; height:100%; top:0px;'></div>
							</div> 
							<p> Signature of applicant </p>
						</td>
					</tr>
				</tbody>
				
				<tbody>
					<tr>
						<th colspan='3'>
							<p class='act_on_app'> ACTION ON APPLICATION </p>
						</th>
					</tr>
				</tbody>
			</table>
			
			<table class='table_footer'>
				<tbody>
					<tr>
						<td style='width:50%;'> 
							<div class='statusofspl'>
								<div class='<?php // echo $class; ?> __statuslbl'>
									<p> 
										<?php if ($information['remaining'] == 1):?>
											<i class="fa fa-check-square-o" aria-hidden="true" style='margin-right: 5px;'></i>
										<?php else: ?>
											<i class="fa fa-square-o" aria-hidden="true" style='margin-right: 5px;'></i>
										<?php endif; ?>
										FIRST OF THREE 
									</p>
									
									<p> 
										<?php if ($information['remaining'] == 2):?>
											<i class="fa fa-check-square-o" aria-hidden="true" style='margin-right: 5px;'></i>
										<?php else: ?>
											<i class="fa fa-square-o" aria-hidden="true" style='margin-right: 5px;'></i>
										<?php endif; ?>
										SECOND OF THREE 
									</p>
									
									<p> 
										<?php if ($information['remaining'] == 3):?>
											<i class="fa fa-check-square-o" aria-hidden="true" style='margin-right: 5px;'></i>
										<?php else: ?>
											<i class="fa fa-square-o" aria-hidden="true" style='margin-right: 5px;'></i>
										<?php endif; ?>
										THIRD OF THREE 
									</p>
									<!--strong> <?php //echo $information['remaining']; ?></strong> out of <strong> 3 </strong-->
								</div>
								<div class='approvedhr'>
									<div style='position:relative; width:auto; height:auto; margin-bottom: -45px;'>
										<?php if ($sig_data[0]->settingvalue == 1) { ?>
											<img style='margin-bottom: -20px;' src='<?php echo $information['hr']['signature']; ?>'/>
										<?php } else { ?>
											<div style='padding: 40px 0px;'></div>
										<?php } ?>		
										<p> &nbsp; </p>
										<div style='position:absolute; width:100%; height:100%; top:0px;'></div>
									</div>
									<p style='font-weight: bold;'> <span> <?php echo $information['hr']['name']; ?> </span> </p>
									<p> <i> HRMD UNIT </i> </p>
									<p> Date: 
										<span style='border-bottom: 1px solid #333;'> 
											<?php echo $hr_date; ?>
										</span> 
									</p>
								</div>
							</div>
						</td>
						<td style='width:50%;'> 
							<div>
								<p style='text-align: left;'> Recommending Approval: </p>
										
								<?php if($Division_id != 0 && $ischief == 0 && $isdbm == 0): ?>
									<?php if ($approvals[0]['division'][3] == 1): ?>
										<div style='position:relative; width:auto; height:auto; margin-bottom: -35px;'>
											<?php if ($sig_data[0]->settingvalue == 1) { ?>
												<img src='<?php echo $approvals[0]['division'][1]; ?>'/>
											<?php } else { ?>
												<div style='padding: 40px 0px;'></div>
											<?php } ?>
											<p style='color:green; position: relative; top: -30px;'> approved online: <?php echo $this->uri->segment(3)."-".$approvals[0]['division'][4]; ?> </p>
											<div style='position:absolute; width:100%; height:100%; top:0px;'></div>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								<p class='div_sig'> Signature </p>
								
								<?php if($Division_id != 0 && $ischief == 0 && $isdbm == 0): ?>
									<span style='font-size: 20px; font-weight:bold;'> <?php echo $approvals[0]['division'][0]; ?> </span>
								<?php endif; ?>
								
								<p class='div_lbl'> Division Chief / OIC </p>
								<p> Date: 
									<span id=''> 
									<?php if($Division_id != 0 && $ischief == 0 && $isdbm == 0): ?>
										<?php 
											if ($div_date != null) {
												echo date("l, F d, Y", strtotime($div_date));
											} 
										?> 
									<?php endif; ?>
									</span>
								</p>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			
			<table class='table_footer tbl_approvals'>
				<tbody>
					<tr>
						<?php 
							if ($approvals[1]['last'][3] == 1) {
								$ics  = "selected_icon";	
								$td_b = ""; // background: #f2f2b1;
							} else {
								$ics = "not_selected_icon";	
							}
						?>			 
						<td style='width:50%; <?php echo $td_b; ?>'> 
							<p class='<?php echo $ics; ?> dis_ap_text'> Approved </p>
						</td>
						
						<?php 
							if ($approvals[1]['last'][3] == 0 && $remarks != null) {
								$ics_1  = "selected_icon";
								$td_b_1 = ""; //background: #f2f2b1;
							} else {
								$ics_1 = "not_selected_icon";
							}
						?>
						<td style='width:50%; <?php echo $td_b_1; ?>'> 
							<p class='<?php echo $ics_1; ?> dis_ap_text'>
								Disapproved due to: <br/>
								<span class='dis_ap_span'> 
									<?php 
										if ($remarks != null) { echo $remarks; }
									?>
								</span>
							</p>
						</td>	
					</tr>
					<tr>
						<td colspan='2' style='padding: 35px 0px;'>
							<?php 
								if ($approvals[1]['last'][3] != 0):
							?>
								<div style='position:relative; width:auto; height:auto; margin-bottom: -35px;'>
									<?php if ($sig_data[0]->settingvalue == 1) { ?>
										<img src='<?php echo $approvals[1]['last'][1]; ?>'/>
									<?php } else { ?>
										<div style='padding: 40px 0px;'></div>
									<?php } ?>									
									<p style='color:green; position:relative; top:-30px;'> approved online: <?php echo $this->uri->segment(3)."-".$approvals[1]['last'][4]; ?> </p>
									<div style='position:absolute; width:100%; height:100%; top:0px;'></div>
								</div>	
							<?php 
								endif;
							?>
								
								<span class='last_app_off'> <?php echo $approvals[1]['last'][0]; ?> </span>
							<p style='font-size: 15px;'> Authorized Official </p>
							<p> Date: 
								<span>
									<?php
										if ($last_date != null) {
											echo date("l, F d, Y", strtotime($last_date));
										}
									?>
								</span> 
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			<!-- approved state -->
			<?php 
				// var_dump($approvals);
			?>
			<p style='padding: 10px 15px;'> doc. #: <?php echo $this->uri->segment(3); ?> </p> 
		</div>
		<!--/div-->
		</div>
	</div>
</section>
</div>
