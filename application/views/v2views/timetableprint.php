<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		* {
			font-family:arial;
		}
		
		body {
			margin:auto;
			padding:0px;
		}
		
		.header {
			height:160px;
		}
		
		.headtable {
			border-collapse:collapse;
			width: 100%;
			margin-top: 10px;
		}
		
		.headtable tr{
			
		}
	
		.headtable tr th,
		.headtable tr td{
			    border: 1px solid #ccc;
		}
		
		.middlecontent {
			min-height: 900px;
			/* margin-bottom: 72px; */
			margin-bottom:0px;
			position:relative;
		}
		
		.middlecontent table {
			width: 100%;
		}
		
		.middlecontent table tr td{
			font-size: 12px;
			padding: 3px 6px;
		}
		
		.middlecontent table tr th{
			font-size: 13px;
			font-weight: bold;	
			padding: 10px 0px;
		}
		
		.rightside {
			width: 39%; 
			float: left; 
			/*border-bottom: 2px solid #333; */
			border-left: 2px dashed #333;
			padding-left: 7px;
			background: #e4e4e4;
		}
		
		.leftside {
			width: 60%;
			float: left;
			background:#fff;
			/* border-right: 2px dashed #333; */
		}
		
		.headtable tr th {
			font-size: 9px;
			padding: 5px;
		}
		
		.headtable tr td {
			font-size: 11px;
			padding: 4px;
		}
		
		.addremtbl {
			border-collapse: collapse;
		}
		
		.addremtbl tbody tr{
			/*border-bottom:1px solid #ccc; */
		}
		
		.addremtbl tbody tr td{
			/*width:100%; */
			padding-top:5px;
			position: relative;
		}
		
		.addremtbl tbody tr td hr {
			margin: 0px;
			position: absolute;
			bottom: 0px;
			width: 92%;
			border: 0px;
			border-bottom: 1px solid #333;
		}
		
		.remarksfeeds {
			margin-top: 10px;
			position: absolute;
			width: 100%;
			bottom: 6px;
		}

		.remarksfeeds table{
		    width: 95%;
			/* margin: auto; */
			border-collapse: collapse;
		}

		.remarksfeeds table tr{
			
		}

		.remarksfeeds table tr th, 
		.remarksfeeds table tr td {
			border:1px solid #ccc;
			padding: 6px;
			font-size: 12px;
		}
		
		.remarksfeeds table tr td{
			text-align: left;
			background: #fff;
		}
		
		.remarksfeeds table tr td:last-child{
			font-weight:bold;
			text-align:center;
		}
		
		.footercontent {
			background:#fff;
		    padding-top: 10px;
		}
		
		.belowcontent {
			padding-top: 10px;
		}
		
		.atmtext {
		    font-size: 9px;
			color: #333;
			margin-left: 4px;
			font-weight: bold;
			text-transform:uppercase;
		}
		
		.logodivbox {
			overflow:hidden;
		}
		
		@media print {
			@page {
				size: A4 portrait;
			}			
			
			body {
				margin:0px !Important;
				padding:0px !Important;
			}
			
			.middlecontent {
				min-height: 950px;
				margin-bottom: 72px;
			}
			
		}
	</style>
</head>
<body style='width:900px;'>
	<div style="width: 1000px; margin: auto; background: #fff; overflow:hidden;" class='overallbox'>
		<div class='leftside'>
			<div class='header'>
				<div style='float: left; width: 35%;'>
					<div class='logodivbox'>
						<img src='<?php echo base_url(); ?>/assets/images/minda_logo.png' 
							style='width: 50px; float: left; margin-top: 30px; margin-right: 10px;'/>
						<p style='margin-bottom: 0px; font-weight: bold; font-size: 16px; margin-top: 29px;'> 	
							MINDANAO DEVELOPMENT AUTHORITY 
						</p>
					</div>
					<p style='margin: 0px; margin-top: 7px; font-size: 14px;'> <?php echo $coverage; ?> </p>
				</div>
				<div style='width: 64%; float: left;'>
					<table class='headtable'>
						<thead>
							<th> PARTICULARS </th>
							<th> No. of times </th>
							<th colspan=3> DD-HH-MM </th>
							
							<!-- plantilla -->
								<?php if ($emptype === "regular"): ?>
									<th> VACATION </th>
									<th> &nbsp; </th>
								<?php endif; ?>
							<!-- end -->
						</thead>
						<tbody>
							<tr>
								<td> TARDINESS </td>
								<td style='text-align:center; width: 28px;'> 
									<!--span id='latecount_<?php // echo $empid; ?>'> &nbsp; </span--> 
								</td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								
								<!-- plantilla -->
									<?php if ($emptype === "regular"): ?>
										<td style='width: 80px;'> Sick </td>
										<td style='width: 115px;'> &nbsp; </td>
									<?php endif; ?>
								<!-- end -->
							</tr>
							<tr>
								<td> UNDERTIME </td>
								<td style='text-align:center; width: 15px;'>
									<!--span id='undercount_<?php // echo $empid; ?>'> &nbsp; </span--> 
								</td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								
								<!-- plantilla -->
									<?php if ($emptype === "regular"): ?>
										<td> CTO </td>
										<td> &nbsp; </td>
									<?php endif; ?>
								<!-- end -->
							</tr>
							<tr>
								<td> PS </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								
								<!-- plantilla -->
									<?php if ($emptype === "regular"): ?>
										<td> others </td>
										<td> &nbsp; </td>
									<?php endif; ?>
								<!-- end -->
							</tr>
							<tr>
								<td> ABSENCES </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								
								<!-- plantilla -->
									<?php if ($emptype === "regular"): ?>
										<td rowspan=2> Official hours of arrival and departure </td>
										<td rowspan=2>
											<?php 
												echo $sked;
											?>
										</td>
									<?php endif; ?> 
								<!-- end -->
							</tr>
							<tr>
								<td> TOTAL </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
							
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class='middlecontent'>
				<table>
					<thead>
						<th style='text-align:left;'> 
							<?php echo strtoupper($name); ?>
						</th>
						<th> IN </th>
						<th> OUT </th>
						<th> IN </th>
						<th> OUT </th>
						<!--th> T </th>
						<th> UT </th>
						<th> PS </th-->
					</thead>

					<tbody>
						<?php
						// var_dump($dtr['08/01/2019']['attachment']['ret'][0]->type_mode);
							$blanks = [];
							$latecount  = 0;
							$undercount = 0;
							
							foreach($dtr as $datekey => $d) {
								$bypasstime_display = true;
							//	echo count($dtr[$datekey]['attachment']['ret'][0]->type_mode);
								if (count($dtr[$datekey]['attachment']['ret']) > 0) {
									if ($dtr[$datekey]['attachment']['ret'][0]->type_mode != "AMS"){
										// $bypasstime_display = false;
									} else {
										// $bypasstime_display = true;
									}
								}
								if (date("w",strtotime($datekey)) > 0 || date("w",strtotime($datekey)) < 6){
									if ( strlen($d[0]['am_in'])==0 ) {
										if ( !isset($blanks[$datekey]) ){
											$blanks[$datekey] = [];
										}
										array_push($blanks[$datekey],'am_in');
									}
									
									if ( strlen($d[0]['am_out']) == 0 ) {
										if ( !isset($blanks[$datekey]) ){
											$blanks[$datekey] = [];
										}
										array_push($blanks[$datekey],'am_out');
									}
									
									if ( strlen($d[0]['pm_in']) == 0 ) {
										if ( !isset($blanks[$datekey]) ) {
											$blanks[$datekey] = [];
										}
										array_push($blanks[$datekey],"pm_in");
									}
									
									if ( strlen($d[0]['pm_out']) == 0 ) {
										if ( !isset($blanks[$datekey]) ) {
											$blanks[$datekey] = [];
										}
										array_push($blanks[$datekey],'pm_out');
									}
								}
								echo "<tr>";
									echo "<td> {$datekey} <small>".substr(date("D",strtotime($datekey)),0,2)."</small>";
									
									// holiday 
										if (isset($d['holiday'])) {
											echo "<span class='atmtext'>H</span>";
										}
									// end holiday
									
									// attachment 
									$files = [];
									if (count($d['attachment']['ret']) != 0) {
										foreach($d['attachment']['ret'] as $vr) {
											if (count($files)==0){array_push($files,[$vr->type_mode,
																					 $vr->attachments,
																					 $vr->exact_id,
																					 $vr->grp_id,
																					 $vr->leave_name]);}
											
											$found = null;
											foreach($files as $f){
												if ($f[0] == $vr->type_mode) {
													// found
													$found = true;
													break;
												} else {
													// not found 
													$found = false;
													continue;
												}
											}
											if (!$found) {
												array_push($files,[$vr->type_mode,
																   $vr->attachments,
																   $vr->exact_id,
																   $vr->grp_id,
																   $vr->leave_name]);
											}
											
										}
										
										foreach($files as $f) {
											if ($f[0] !== "AMS"){
												echo "<span class='atmtext'>[";
													if ($f[0] === "LEAVE") {
														echo $f[4];
													} else {
														$apd = null;
														if ($f[0]=="PS") {
															if ($d['passslip']['personal'] != null) {
																$apd = " -P";
															} else if ($d['passslip']['official'] != null) {
																$apd = " -O";
															}
														}
														
														echo $f[0].$apd;
													}
												echo "] </span>";
											}
										}
									}
									// end attachment 
									
								echo "</td>";
									echo "<td>";
										if ($bypasstime_display) {
											echo $d[0]['am_in'];
										}
									echo "</td>";
									echo "<td>";
										if ($bypasstime_display) {
											echo $d[0]['am_out'];
										} 
									echo "</td>";
									echo "<td>";
										if ($bypasstime_display) {
											echo $d[0]['pm_in'];
										}
									echo "</td>";
									echo "<td>";
										if ($bypasstime_display) {
											echo $d[0]['pm_out'];
										}
									echo "</td>";
									/*
									echo "<td>";
										if (isset($d['tardiness_am'])) {
											$latecount++;
											echo "<small>".$d['tardiness_am']."</small>";
										} else {
											echo "&nbsp;";
										}
										
										if (isset($d['tardiness_pm'])) {
											if (isset($d['tardiness_am'])) {
												echo " - ";
											}
											$latecount++;
											echo "<small>".$d['tardiness_pm']."</small>";
										} else {
											echo "&nbsp;";
										}
									echo "</td>";
									echo "<td>";
										if (isset($d['undertime_am'])) {
											$undercount++;
											echo "<small>".$d['undertime_am']."</small>";
										} else {
											echo "&nbsp;";
										}
										
										if (isset($d['undertime_pm'])) {
											$undercount++;
											echo "<small>".$d['undertime_pm']."</small>";
										} else {
											echo "&nbsp;";
										}
										
									echo "</td>";
									echo "<td>";
										if (isset($d['passslip'])) {
											if ($d['passslip']['personal'] != null) {
												echo $d['passslip']['personal'];
											} 
											
											if ($d['passslip']['official'] != null) {
												
											}
										}
									echo "</td>";
									*/
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
			<div class='footercontent'>
				<div style='overflow:hidden;'>
					<div style='float: left; width: 46%; margin-right: 25px;'>
						<p style='margin: 0px; font-size: 14px; line-height: 19px; text-align: justify;'>
							I CERTIFY on my honor that the above is a true and correct report of the hours of work performed,
							record of which was made daily at the time of arrival and departure from office.
						</p>
						
						<p style='margin: 0px; margin-top: 60px; border-top: 1px solid; font-size: 12px;'> EMPLOYEE'S SIGNATURE </p>
					</div>
					<div>
						<p style='margin: 0px; font-size: 14px; font-weight: bold;'> Certified Correct by: </p>
					</div>
				</div>
			</div>
		</div>
		<div class='rightside' style=''>
			<div class='header'>
				<h3 style='margin: 0px;padding-top: 25px;text-align:center;'> <?php echo strtoupper($name)."."; ?> </h3>
				<h4 style='margin: 0px; text-align: center; font-size: 12px; font-weight: normal; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding: 4px 0px;'> 
					<?php echo strtoupper($pos); ?> 
				</h4>
				<p style='margin: 4px 0px; text-align: center; font-size: 13px;'> <?php echo $coverage; ?> </p>
				<h2 style='TEXT-ALIGN: CENTER; font-size: 20px; padding-top: 18px;'> ANNEX A </h2>
			</div>
			<div class='middlecontent'>
				<table class='addremtbl'>
					<thead>
						<th> &nbsp; </th>
						<th> AM IN </th>
						<th> AM OUT </th>
						<th> PM IN </th>
						<th> PM OUT </th>
						<th> &nbsp; </th>
						<th> &nbsp; </th>
					</thead>
					<tbody>
						<?php 
							foreach($dtr as $datekey => $ddata) {
								echo "<tr>";
									echo "<td style='width: 80px;'>";
										echo $datekey." <small>".substr(date("D",strtotime($datekey)),0,2)."</small>";
									echo "</td>";
										if (isset($blanks[$datekey])){
											$heads = ["am_in","am_out","pm_in","pm_out"];
											foreach($heads as $hk) {
												echo "<td>";
													foreach($blanks[$datekey] as $vk) {
														if ($vk == $hk) {
															if (date("w",strtotime($datekey)) > 0 && date("w",strtotime($datekey)) < 6){
																echo "<hr/>";
															} else {
																echo "&nbsp;";
															}
														} else {
															echo "&nbsp;";
														}
													}
												echo "</td>";
											}
										}
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				<div class='remarksfeeds'>
					<table>
						<tr>
							<th colspan=2 style='text-align: left; border: none; border-bottom: 2px solid #6d6c6c;'> Summary: </th>
						</tr>
						<tr>
							<th style='text-align: left; background: #f9f7f7;'> PARTICULARS </th>
							<th style='background: #f9f7f7;'> VALUE </th>
						</tr>
						<tr>
							<td> Total lates </td>
							<td>
								<?php 
									/*
									if (isset($late)) {
										echo $late;	
									}
									*/
								?>
							</td>
						</tr>
						<tr>
							<td> Total under time </td>
							<td> 
								<?php 
									/*
									if (isset($under)) {
										echo $under;
									}									
									*/
								?>
							</td>
						</tr>
						<tr>
							<td> Total number of days present </td>
							<td> 
								<?php 
								/*
									if (isset($daysp)) {
										echo $daysp;
									}	
								*/
								?> 
							</td>
						</tr>
						<tr>
							<td> Total number of hours present </td>
							<td> 
								<?php 
								/*
									if (isset($hourp)) {
										// echo $hourp;
									}		
								*/
								?> 
							</td>
						</tr>
					</table>
				</div>
				<div class='remarksfeeds'>
					
				</div>
			</div>
			<div class='belowcontent'>
				<div style='overflow:hidden;'>
					<div style='float: left; width: 46%; margin-right: 25px;'>
						<p style='margin: 0px; font-size: 13px; line-height: 17px; text-align: justify;'>
							I CERTIFY on my honor that the above is a true and correct report of the hours of work performed,
							record of which was made daily at the time of arrival and departure from office.
						</p>
						
						<p style='margin: 0px; margin-top: 60px; border-top: 1px solid; font-size: 12px;'> EMPLOYEE'S SIGNATURE </p>
					</div>
					<div>
						<p style='margin: 0px; font-size: 14px; font-weight: bold;'> Certified Correct by: </p>
					</div>
				</div>
			</div>
		</div>
		<div style='clear:both;'></div>	
		
			
	</div>
	<script>
		var empid = '<?php echo $empid; ?>';
		document.getElementById("latecount_"+empid).innerHTML = '<?Php echo $latecount; ?>';
		document.getElementById("undercount_"+empid).innerHTML = '<?Php echo $undercount; ?>';
	</script>
</body>
</html>
