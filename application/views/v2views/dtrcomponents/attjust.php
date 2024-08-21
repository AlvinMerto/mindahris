<div style='padding: 15px 0px; overflow: hidden;'>
	<div class='col-md-12'>
		<select class='btn btn-default' id='remarks' style='width:100%; font-size: 16px; padding: 10px;'>
			<option> Forgot to login/logout to biometric device </option>
		</select>
	</div>
	<hr style='clear:both; position: relative; top: 16px;'/>
	<div class='col-md-12'>
		<h4 style='margin-bottom: 1px;'> Please enter the Time </h4>
		<h6 style='color: #afadad; margin-top: 2px;'> Refer your time from the logbook </h6>
		
		<div class='col-md-2 removepadd'>
			<input type='text' class='timetxt' id='timevalue'/>
		</div>
		<div class='col-md-10'>
			<select class='btn btn-default' id='timeofday'> 
				<option value='amin'> Morning IN </option>
				<option value='amout'> Morning OUT </option>
				<option value='pmin'> Afternoon IN </option>
				<option value='pmout'> Afternoon Out </option>
			</select>
		</div>
	</div>
	
	<div style='clear:both;'></div>
	
	<h5 style='margin-top: 100px; text-align: center;'> Please secure a certification proving your attendance. </h5>
</div>

<script>
	$(".timetxt").jqxDateTimeInput({ width: '100%', height: '30px', formatString: 't', showTimeButton: true, showCalendarButton: false});
</script>