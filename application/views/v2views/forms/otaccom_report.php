<div class="content-wrapper" style='padding-top:0px;'>
	<section class="content" style="padding-top: 0px;">
      <!-- Info boxes -->
      <div class="row">
        <div class=""> <!-- col-md-6 -->
		<div style='padding: 10px;'>
		 <button class='btn btn-primary' id='printot_accom'> Print </button>
		</div>
			<script>
				$(document).ready(function() {
					 var divToPrint=document.getElementById('otaccom_print');
					
					console.log(divToPrint);
					
					$("#printot_accom").on("click", function() {
					  var newWin=window.open('','Print-Window');
						  newWin.document.open();
						  newWin.document.write("<html> <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/> <link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/otaccom.style.css'/> <body onload='window.print()' style='font-family: \"Source Sans Pro:\",\"Helvetica Neue\",Helvetica,Arial,sans-serif;'>"+divToPrint.innerHTML+"</body></html>");
						  newWin.document.close();
					})
				})
		</script>
		<div id='printthisdiv'>
          <div class="box_1 otaccombox" id='otaccom_print'>
				<div class='headerbox'>
					<p class='countryname'> Republic of the Philippines </p>
					<p class='compname'> MINDANAO DEVELOPMENT AUTHORITY </p>
					<p class='regname'> Regions IX, X, XI, XII, CARAGA and ARMM </p>
				</div>
				
				<div class='contentbox'>
					<table class='emp_info_tbl'>
						<tr>
							<td style='vertical-align: bottom;'> 
								<p> Name: &nbsp; <strong> <u> <?php echo $personal['fname']; ?> </u> </strong> </p>
							</td>
							<td>
								<p> Date: <strong> <u><?php echo $details[0]->date_added; ?> </u> </strong> </p>
								<p> Day: <strong> <u><?php echo date("l", strtotime($details[0]->date_added)); ?> </u> </strong> </p>
								<p> Position: <strong> <u><?php echo $position; ?> </u> </strong> </p>
							</td>
						</tr>
					</table>
					<p style='margin: 18px 0px;'> 
						I certify to the following accomplishment(s) during overtime rendered per attached Memorandum Order for Rendering Overtime Services and Work Program:
					</p>
					<div class='det_table'>
						<table>
							<tr style='font-weight:bold;'>
								<td colspan=2> A.M. </td>
								<td colspan=2> P.M. </td>
								<td rowspan=2> Work Accomplishment </td>
							</tr>
							<tr style='font-weight:bold;'>
								<td> TIME IN </td>
								<td> TIME OUT </td>
								<td> TIME IN </td>
								<td> TIME OUT </td>
							</tr>
							<tr>
								<?php 
									// var_dump($signatories);
								?>
								<td> <?php echo $details[0]->am_timein; ?> </td>
								<td> <?php echo $details[0]->am_timeout; ?> </td>
								<td> <?php echo $details[0]->pm_timein; ?> </td>
								<td> <?php echo $details[0]->pm_timeout; ?> </td> 
								<td> 
									<?php
										$accom = substr(urldecode($details[0]->accomplishment),11 );
										echo $accom;
									?> 
								</td>
							</tr>
						</table>
					</div>
					<div class='det_footer_tbl'>
						<table>
							<tr>
								<td colspan=2 style='padding: 0px 38px 50px 0px;'>
									<div class='signature_emp'>
										<div>
											<div style='display:table; margin: auto;'>
												<img src='<?php echo base_url().'assets/esignatures/'.$personal['sign']; ?> ' style='margin: 0px auto -30px;'/>
												<p style='margin:30px 0px;'> &nbsp; </p>
											</div>
										</div>
										<p style='border-top: 1px solid #6b6666;  text-align: center; padding: 0px 40px;'> <?php echo $personal['fname']; ?> </p-->
										<p style='border-top: 1px solid #6b6666;  text-align: center; padding: 0px 40px;'> Signature </p>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<p style='margin:0px;'> Certified Correct: </p>
									<?php if ($signatories['fapproval']['fname'] != null): ?>
										<div>
											<?php // var_dump($signatories); ?>
											<div style='display:table;'>
												<img src='<?php echo base_url().'assets/esignatures/'.$signatories['fapproval']['signature']; ?> ' style='margin: 0px auto -30px;'/>
												<span style='color:green;'> <strong> Approved online: </strong> <?php echo $this->uri->segment(4)."-".substr(md5($signatories['fapproval']['fname']),0,6); ?> </span>
												<p style='margin:5px 0px;'> &nbsp; </p>
											</div>
										</div>
									<?php endif; ?>
									<p> 
										<?php 
											if ( $signatories['fapproval']['fname'] == null ) {
												echo "&nbsp;";
											} else {
												echo $signatories['fapproval']['fname'];
											}
										?> 	
									</p>
								</td>
								<td style='width: 40%;'>
									<p style='margin: 0px 0px 0px 0px;'> Approved By: </p>
									<div class='signatories_tbl'> 
										<?php if ($signatories['lapproval']['fname'] != null): ?>
											<div>
												<div style='display:table;'>
													<img src='<?php echo base_url().'assets/esignatures/'.$signatories['lapproval']['signature']; ?> ' style='margin: 0px auto -30px;'/>
													<span style='color:green;'> <strong> Approved online: </strong> <?php echo $this->uri->segment(4)."-".substr(md5($signatories['lapproval']['fname']),0,6); ?> </span>
													<p style='margin:15px 0px;'> &nbsp; </p>
												</div>
											</div>
										<?php endif; ?>
										<p style='text-align: center; border-top: 1px solid;'> 
											<?php 
												if ($signatories['lapproval']['fname'] == null) {
													echo "&nsbp;";
												} else {
													echo $signatories['lapproval']['fname'];
												}
											?> 
										</p>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
		  </div>
		  </div> <!-- print this div -->
		</div>
	</section>
</div>