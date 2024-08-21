<?php 
	$this->load->view("hrmis/includes/header");
?>

<p id='nothingfound'> No such employee in the database </p>
	
<div class='ams_big_wrap'>
	<div class='left_div_box floatdiv'>
		<div class='mindalogo'>
			<div class='mindalogomider'>
				<img src='<?php base_url(); ?>assets/images/minda_logo.png'/>
			</div>
			<p> Attendance Monitoring System </p>
		</div>
		<div class='clockview'>
			<p class='mtime'> <span id='seconds'>--</span> Current MinDA Time </p>
			<p class='thehour'> 
				<!--span id='hours'>--</span> 
					<span>:</span>
				<span id='minutes'>--</span> 
					<span>:</span> 
				<span id='seconds'>--</span--> 
				<!-- 272px => camerabox div width -->
			</p>
			<p id='datetoday'> </p>
		</div>
		
		<div class='cameraboxdiv'>
			<div id='cameradiv'>
				<video id="video" width='100%;' height = '365px' autoplay></video>
				<canvas id="canvas" width='378px;' height = '365px' ></canvas>
				<input type='file' id='amspix' name='amspix' style='display:none;'/>
			</div><!--p id='qouteoftheday'> ( Face Recognition is not included just yet. But it does captures picture; so smile. ) </p-->
		</div>
	</div>
		
	<div class='center_div_box floatdiv'>
		<div class='center_wrapperbox'>
			<p class='ppi'> Please provide information </p>
			<div class='enterofempid'>
				<p style='margin: 0px;
						font-weight: normal;
						background: #e28427;
						padding: 8px 9px;
						text-align: center;
						border: 1px solid #939393;
						border-bottom: 0px;
						font-size: 16px;
						text-transform: uppercase;
						color: #fff;'> Enter your employee ID </p>
				<div class='inputbox'>
					<input type='text' placeholder='e.g. 06272017306' id='employeeid'/>
					<button id='logtime' class='logtimeweb'><i class="fa fa-clock-o" aria-hidden="true"></i></button>
				</div>
				<p style='margin: 3px 0px; font-size: 11px; text-align: right;'> smile to the camera. </p>
			</div>
			<br class='fordesktop'/>
			
			<div class='inputbox' id='legendtbl'>
				<table class='tbllegend'>
					<thead>
						<th colspan=4> AMS</th>
					</thead>
					<tbody>
						<tr id='am_in'>
							<td> <span> press </span> F1 </td>
							<td> Morning Time In </td>
						</tr>
						<tr id='am_out'>
							<td> <span> press </span> F2 </td>
							<td> Morning Time Out </td>
						</tr>
						<tr id='pm_in'>
							<td> <span> press </span> F3 </td>
							<td> Afternoon Time In </td>
						</tr>
						<tr id='pm_out'>
							<td> <span> press </span> F4 </td>
							<td> Afternoon Time Out </td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class='inputbox_mobile'>
				<table class='tbllegend_mobile'>
					<thead>
						<th colspan=4> Time Log choices </th>
					</thead>
					<tbody>
						<tr>
							<td> <button id='mob_amin' class="btn btn-default"> Morning: <br/>Time In </button> </td>
							<td> <button id='mob_amout' class="btn btn-default"> Morning: <br/>Time Out </button> </td>
							<td> <button id='mob_pmin' class="btn btn-default"> Afternoon: <br/>Time In </button> </td>
							<td> <button id='mob_pmout' class="btn btn-default"> Afternoon: <br/>Time Out </button> </td>
						</tr>
						<tr>
							<td colspan=4>
								<button id='logtime_mob'><i class="fa fa-clock-o" aria-hidden="true"></i> <span id='mobname'> </span> </button>
							</td>
						</tr>
					</tbody>
				</table>
				
			</div>
			
			<div class='forboth addborderbot_dotted addbordertop_dotted paddbot'>
				<button class='btn btn-default' id='addacomp' style='font-weight: bold; font-size: 16px;'> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> Activity </button> <span id='accstat' style='margin-left: 11px; font-weight: bold; color: green;'> </span>
				<div id='showaccom'>
					<textarea id='accomarea'></textarea>
					<button class='btn btn-primary' id='saveaccom'> Save </button> <span id='loadsave' style='margin-left: 10px;'> </span>
				</div>
			</div>
			
			<div class='inputbox' id='passtbl'>
				<table class='tbllegend'>
					<thead>
						<th colspan=4 style='color: #0cb3d7;'> Pass Slip </th>
					</thead>
					<tbody>
						<tr>
							<td colspan=2> scan your ID and select YES. When you come back, scan your ID again and select YES. </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div class='right_div_box floatdiv'>
		<div class='rightbox'>			
			<!--div class='empinformation'-->
			<div class='row'>
				<div class='col-md-6'>
					<p class='tbheader' style='background: #848484;'> Employee Information <span> </span> </p>
					<div class='empdiv'>
						<p id='empname'>  </p>
						<p id='empdesignation'>  </p>
					</div>
				</div>
				<div class='col-md-6' id='theid'>
					<img src='' id='sourcehere'/>
				</div>
			</div>
			
			<!--/div-->
			
			<hr style='border-bottom: 1px dotted #a2a2a2;'/>
			<div class='empinformation'>
				<p class='tbheader'> Attendance Information <span> </span> </p>
				<div class='thetimelog'>
					<table>
						<tr>
							<td colspan=2> MORNING </td>
							<td colspan=2> AFTERNOON </td>
						</tr>
						<tr>
							<td style='width: 25%;'> Time In </td>
							<td style='width: 25%;'> Time Out </td>
							<td style='width: 25%;'> Time In </td>
							<td style='width: 25%;'> Time Out </td>
						</tr>
						<tr>
							<td id='timein_am' class='time_logs'>  &nbsp; </td>
							<td id='timeout_am' class='time_logs'> &nbsp; </td>
							<td id='timein_pm' class='time_logs'>  &nbsp; </td>
							<td id='timeout_pm' class='time_logs'> &nbsp; </td>
						</tr>
						<tr>
							<td colspan=4 style='font-size: 16px;'> Check your DTR on HRIS to view your time logs for today. </td>
						</tr>
					</table>
				</div>
			</div>

			<hr style='border-bottom: 1px dotted #a2a2a2;'/>
			<div class='empinformation' id='psinfo'>
				<p class='tbheader' style='background: #0cb3d7;'> Pass Slip Information <span> </span> </p>
				<div class='thetimelog'>
					<table>
						<tr>
							<td style='width: 50%;'> OUT </td>
							<td style='width: 50%;'> IN </td>
						</tr>
						<tr>
							<td id='psout' class='time_logs'>  &nbsp; </td>
							<td id='psin' class='time_logs'> &nbsp; </td>
						</tr>
						<tr>
							<td colspan=4 style='font-size: 16px;'> Check your Pass Slip form on HRIS to view your time. </td>
						</tr>
						<!--tr id='success'>
							<td colspan=4 class='footnote'> ----- SUCCESS ----- </td>
						</tr-->
					</table>
				</div>
			</div>
			
			<p id='success' class='footnote'> ----- SUCCESS -----  </p>
		</div>
	</div>
</div>
<div id='theamspic'></div>

<div class='bigscreen' id='bscreen' style='display:none;'>
	<div class='tblscreen' id='theinnerscreen'>
		<!--p id='thenameappear'> Alvin Merto </p-->
		<div id='forams'>
			<p style='text-align: center;font-size: 45px;'> PLEASE GUIDE ME </p>
			<p class='notiftxt toptxt'> I need to know where should I put your timelog </p>
			<p class='notiftxt beltxt'> select from the choices provided below </p>
			
			<table id='theoptiontbl'>
				<thead>
					<tr>
						<th colspan=2> MORNING </th>
						<th colspan=2> AFTERNOON </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<!--td data-timeref='a_in'>
							<p> IN </p>
							<span> MORNING </span>
						</td-->
						<td data-timeref='a_out' colspan=2>
							<p> OUT </p>
							<span> MORNING </span>
						</td>
						<td data-timeref='p_in'>
							<p> IN </p>
							<span> AFTERNOON </span>
						</td>
						<td data-timeref='p_out'>
							<p> OUT </p>
							<span> AFTERNOON </span>
						</td>
					</tr>
				</tbody>
			</table>
			<p style='text-align: center; font-style: italic;'> Use the mouse to navigate. Thanks. </p>
				<!--p class='thebtnp'> <button id='therecbtn'> RECORD </button> </p-->
		</div>
		
		<div id='forps'>
			<p style='text-align: center;font-size: 45px;' id='thehmmm'> hmmmmmm... </p>
			<p class='notiftxt toptxt' id='wb_top'> &nbsp; </p>
			<p class='notiftxt beltxt' id='wb_bot'> &nbsp; </p>
			
			<div class='detailsofps'>
				<p> records as: <span id='recas'> --- </span> </p>
			</div>
			
			<table id=''>
				<tbody>
					<tr>
						<td style='width: 50%; background: #e28427; padding: 50px 0px; color:#fff;' class='psans' data-psval='1'>
							<p style='color:#fff;'> YES </p>
							<span> Proceed </span>
						</td>
						<td style='width: 50%; padding: 50px 0px;' class='psans nooption' data-psval='0'>
							<p> NO </p>
							<span> continue log as AMS </span>
						</td>
					</tr>
				</tbody>
			</table>
			
			<p style='text-align: center; font-style: italic;'> Use the mouse to navigate. Thanks. </p>
			<p id='loadingspan'>  </p>
		</div>
	</div>
</div>

<!--div class='bigscreen' id='bscreen' style='display:block;'>
	<div class='tblscreen' id='theinnerscreen'>
		<p style='text-align: center; font-size: 24px; letter-spacing: -1px;'> AMS is currently under maintenance. Please use the logbook. Thanks </p>
	</div>
</div-->






