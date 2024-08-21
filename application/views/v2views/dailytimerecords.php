<div class="content-wrapper">
	<section class="content" style='padding:0px; min-height: inherit;'>
		<div class='dtr_div'>
			<div class='floatdiv leftdtr_div'>
				<p class='dtimerecs'> Daily Time Records [ <strong> <span id='periodate'> <?php echo date("F j, Y", strtotime($from)); ?> - <?php echo date("F j, Y", strtotime($to)); ?> </span> </strong>]  
					<span id='thename'> <?php echo $empname; ?>. </span>
				</p>
				<div class='timeholder'>
					<div class='timetbl_holder' id='timetbl_holder'>
						<!-- load here -->
					</div>
				</div>
			</div>
			<div class='floatdiv rightdtr_div'>
				<div class='rightbox_div'>
					<div class='right_filterdiv'>
						<p class='header'> Filter 
							<?php 
								$url_date_f = $this->uri->segment(5);
								$url_date_t = $this->uri->segment(6);
								if($url_date_f != NULL && $url_date_t != NULL): ?>
									<a href='<?php echo base_url(); ?>/my/dailytimerecords/' style='font-weight:normal; font-size: 14px; color: #a4deff;'> &nbsp; [clear filter]</a>
							<?php endif; ?>
						</p>
						<select class='btn btn-default filterselect' id='filterselect'>
							<option> --- please select date coverage --- </option>
							<?php
								foreach($dates as $ds) {
									$selected = null;
									if ($url_date_f != NULL && $url_date_t != NULL) {
										if ($url_date_f == date("Y-m-d",strtotime($ds->date_started)) && $url_date_t == date("Y-m-d",strtotime($ds->date_ended))) {
											$selected = " selected";
										}
									}
									
									echo "<option value='".date("Y-m-d",strtotime($ds->date_started))." | ".date("Y-m-d",strtotime($ds->date_ended))."' {$selected}>";
										echo date("M. d, Y", strtotime($ds->date_started)) . " - " . date("M. d, Y", strtotime($ds->date_ended));
									echo "</option>";
								}
							?>
						</select>
						<small id='usecalendar'> USE CALENDAR </small>
					</div>
					<div class='needssupdocs'>
						<p class='header' 
							style='background: #fff; 
									color:#4b4747; 
									padding: 9px;
									border-bottom-color: #a5a5a5;
									margin-bottom:0px;'> DTR STATUS </p>
						<div class='suppdocsinnerdiv' id='dtrstatus'>
							<p class='loadingstatus'> loading status please wait... </p>
						</div>
						<!--button id='printthisdtr'> Print </button-->
					</div>
				</div>
			</div>
		</div>
		
	<div class="modal fade" id="modaldtrpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-lg modal-dialog" style="width: 50%;">
			<div class="modal-content">
				<div class="modal-header" style='background: #ffffff;border-bottom-color: #ffffff;color: #6d6d6d;'>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="modal_header" style='font-size: 15px;'>Selected date(s): <span id="checkdates"> -- </span> </h4>
				</div>
				<div class="modal-body" style='padding:0px;'>
						<div class='dtrmodalwrap'>
							<div class='floatdiv dtrleftfloat'>
								<div class='midlaner'>
									<h4 style="text-align: center; margin-top: 8px; font-size: 15px; color: #757272;">Select attachment:</h4>
									<select class='btn btn-default attachmentselect' id='attachmentselect'>
										<option value='def'> Please select from below </option>
										<optgroup label = 'Attachments'>
											<option value='att_ob'> [OB]    - Official Business </option>
											<option value='att_js'> [J]		  - Justification </option>
											<option value='att_pf'> [PAF]	  - Personal Attendance Form </option>
										</optgroup>
										<optgroup label='No Attachment'>
											<option value='att_ab'> [A] - Absent </option>
										</optgroup>
										
										<!--option value='att_ca'> [ CA ]    - Certificate of Appearance </option>
											<option value='att_ps'> [ PS ]    - Pass Slip </option>
										<!--option value='att_am'> [ AMS ]   - Attendance Monitoring Sheet </option-->
										<!--option value='att_lv'> [ LEAVE ] - Leave Application </option-->
										<!--option value='att_pf'> [ PAF ]   - Personal Attendance Form </option-->
										<!--option value='just'> Justification </option-->
									</select>
									<hr style='margin: 10px;'/>
									<!--button class='btn btn-danger absentbtn'> ABSENT </button-->	
								</div>
								
								<!--div id='attacheddocs'>
									<p class='smallheader' style='padding-left: 21px;'> Attachments </p>
									<ul class='attachmentsul' id='attachmentsul'>
										
									</ul>
								</div-->
								
							</div>		
							<div class='floatdiv dtrrightfloat'>

								<div class='therightwrapper'>
									<p class='attachmenttitle_m'>
										&nbsp;
									</p>
									<span id='rightwindow'> &nbsp; </span>
								<!--
									<p class='attachmenttitle_m'> &nbsp;
										<span  id='attachmenttitle'> </span>
									<span id='removeattach' class='hidethis'> remove </span> </p>
									
									<div id='CA_box' class='attachelement hidethis'>
										<div class='midlaner'>
											<p class='smallheader'> Time: </p>
											<select class='ca_select btn btn-default' id='ca_timeselect'>
												<option value='def'> --SELECT-- </option>
												<option value='whole'> Whole Day </option>
												<option value='morning'> Morning </option>
												<option value='afternoon'> Afternoon </option>
											</select>
										</div>
									</div>
									
									<div id='AMS_box' class='attachelement hidethis'>
										<div class='midlaner'>
											<p class='smallheader'> Time: </p>
											<table id='ams_table'>
												<tr>
													<th colspan=2> Morning </th>
													<th colspan=2> Afternoon </th>
													<th rowspan=2> Remarks </th>
												</tr>
												<tr>
													<th class='amin'> IN </th>
													<th class='amout'> OUT </th>
													<th class='pmin'> IN </th>
													<th class='pmout'> OUT </th>
												</tr>
												<tr>
													<td class='amin' id='amin'> --:-- </td>
													<td class='amout' id='amout'> --:-- </td>
													<td class='pmin' id='pmin'> --:-- </td>
													<td class='pmout' id='pmout'> --:-- </td>
													<td id='remarkshere'> &nbsp; </td>
												</tr>
												<tr>
													<td class='amin'> <div class='circletick'></div> </td>
													<td class='amout'> <div class='circletick'></div> </td>
													<td class='pmin'> <div class='circletick'></div> </td>
													<td class='pmout'> <div class='circletick'></div> </td>
													<td> &nbsp; </td>
												</tr>
											</table>
											<hr style="margin: 10px; border-top: 1px solid #b9b8b8; border-bottom: 1px solid #fff;"/>
												<p class='smallheader'> Your Remarks: </p>
												<textarea class='yourremtext' id='remtextarea'></textarea>
											<hr style="margin: 10px; border-top: 1px solid #b9b8b8; border-bottom: 1px solid #fff;">
										</div>
									</div>
									
									<div id='ps_box' class='attachelement hidethis'>
										<div class="midlaner">
											<p class="smallheader"> Pass Slip type: </p>
											<select class="ca_select btn btn-default" id="ps_type_select">
												<option value='def'> --SELECT-- </option>
												<option value='personal'> Personal </option>
												<option value='official'> Official </option>
											</select>
										</div>
									</div>
									
								-->	
								</div>
							
							<div class='rightbottomdiv' id='rightbottomdiv'> 
								&nbsp;
							</div>
								
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
		<div class="modal fade" id="lightroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-lg modal-dialog" style="width: 50%;">
				<div class="modal-content">
					<div class="modal-header" style='background: #ececec; border-bottom-color: #f3f3f3; color: #777;'>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="modal_header" style='font-size: 15px;'> PREVIEW </h4>
					</div>
					<div class="modal-body" style='padding:0px;'>
						<div id='previewarea'>
							<iframe name='previewarea'></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="modal fade in" id="selectcalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-lg modal-dialog" style="width: 20%;">
				<div class="modal-content">
					<div class="modal-header" style="background: #377ba2; border-bottom-color: #0770ad; color: #fff;">
						<h4> Please select date </h4>
					</div>
					<div class='modal-body'>
						<input type='text' id='calendarselect'/>
						<script>
							var calendarvar = null;
							$(document).find("#calendarselect").jqxCalendar({ 
								value: new Date(2017, 7, 7), width: "100%", height: 220, selectionMode: 'range' 
							});
							$(document).find("#calendarselect").on('change', function (event) {
								var selection = event.args.range;
								// $("#selection").html("<div>From: " + selection.from.toLocaleDateString() + " <br/>To: " + selection.to.toLocaleDateString() + "</div>");
								// hrview.calendar = selection.from.toLocaleDateString()+" - "+selection.to.toLocaleDateString();
								calendarvar = selection.from.toLocaleDateString()+" - "+selection.to.toLocaleDateString();
							});
							
							var date1   = new Date();
								date1.setFullYear( date1.getFullYear() , date1.getMonth() , date1.getDate());
								
							 var date2 = new Date();
								 date2.setFullYear( date2.getFullYear() , date2.getMonth() , date2.getDate());
							// var fromdate = date_.getFullYear()+" "+date_.getMonth()+ ""+
							
							$(document).find("#calendarselect").jqxCalendar('setRange', date1, date2);
						</script>
					</div>
					<div class='modal-header'>
						<button class='btn btn-primary' style='width:100%;' id='showdates'> Show </button>
					</div>
				</div>
			</div>
		</div>
		
	</section>
</div>
