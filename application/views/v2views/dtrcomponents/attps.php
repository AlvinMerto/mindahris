<!--h4 class='labeltext'> Please attach the scanned copy of the pass slip </h4-->
<div>
	<div class='choices'>
		<div class='col-md-6 btn choicebtn personal' data-btnvalue='personal' onclick="dp.ticks('personal')"> 
			
			<p> Personal <br/>
				<span> Activities and Transactions </span>
			</p>
		</div>
		<div class='col-md-6 btn choicebtn official' data-btnvalue='official' onclick="dp.ticks('official')"> 
			<p> Official <br/>
				<span> Activities and Transactions </span>
			</p>
		</div>
	</div>
	<hr style='margin: 3px 0px; border-color: #ccc;'/>
	<div style='clear:both;'> </div>
	
	<div class='choices_details'>
		<p class='smalltxt'> As indicated on your printed pass slip form <span id='pstype'> </span> </p>
		<hr style='margin: 3px 0px 14px; border-color: #ccc;'/> <br/>
		<div style='clear:both;'> </div>
		
		<div class='col-md-12'>
			<div class='col-md-4 rightalign timelbl'>
				<p> Time Out <br/>
					<span> Time you came out of office </span>
				</p>
			</div>
			<div class='col-md-8 leftalign'> 
				<input type='text' class='timetxt' id='timeout'/>
			</div>
		</div>
		
		<div class='col-md-12'>
			<div class='col-md-4 rightalign timelbl'>
				<p> Time In  <br/>
					<span> Time you came back in to office </span>
				</p>
					<div style='clear:both;'> </div>
					
					<!--input type='checkbox' id='dncb' style='display:none;'/-->
			</div>
			<div class='col-md-8 leftalign'>
				<input type='text' class='timetxt' id='timein'/> 
				<label for ='dncb' id='lbldncb' class='btn btn-default btn-xs' style='margin-top: 9px;'> Did not came back
					<input type='checkbox' id='dncb' style='display:none;'/> <!--span class='dncbtxt'> Did not came back </span-->
				</label>
			</div>
		</div>
		
		<div style='clear:both;'> </div>
		<h4> (PLEASE SECURE A CERTIFICATE OF APPEARANCE FOR OFFICIAL PASS SLIP) </h4>
	</div>
</div>

<script>
	$(".timetxt").jqxDateTimeInput({ width: '100%', height: '30px', formatString: 't', showTimeButton: true, showCalendarButton: false});
</script>