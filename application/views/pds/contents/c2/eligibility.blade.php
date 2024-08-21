<h6 class='headertext'> Civil Service Eligibility </h6>
<hr/>

<div class='row'>
	<div class='col-md-12'>
		<div class='inputdiv fullwidth'>
			<p> Your Eligibility </p>
			<select id='etype'>
				<option value='Career Service'> Career Service </option>
				<option value='RA 1080 (BOARD/BAR) Under Special Laws'> RA 1080 (BOARD/BAR) Under Special Laws </option>
				<option value='CES'> Career Executive Service Eligibility </option>
				<option value='CSEE'> Career Service Executive Examinitation </option>
				<option value='CS-Prof'> Career Service Profesional</option>
				<option value='CS-subProf'> Career Service Sub-Profesional</option>
				<option value='BARANGAY ELIGIBILITY'> BARANGAY ELIGIBILITY </option>
				<option value='DRIVERS LICENSE'> DRIVERS LICENSE </option>
				<option value='others'> Others </option>
			</select>
			<div class='inputdiv fullwidth' id='eligothers'>
				<p> please specify your eligibility</p>
				<input type='text' id='eligotherstext'/>
			</div>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Rating (if applicable) </p>
			<input type="text" name="" id='rating' />
		</div>
		<div class='inputdiv fullwidth'>
			<p> Date of Examination / Conferment </p>
			<input type="date" name="" id ='dateofexam' />
		</div>
		<div class='inputdiv fullwidth'>
			<p> Place of Examination / Conferment </p>
			<input type="text" name="" id='placeofexam' />
		</div>
		<div class='inputdiv fullwidth'>
			<p> License Number (if applicable) </p>
			<input type="text" name="" id='licnum'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Date of Validity <span style='float:right;'> <input type='checkbox' id='notapp'/> <label style='margin:0px;' for='notapp'> Not Applicable </label> </span> </p>
			<input type="date" id = 'dateofval' name="" />
		</div>
		<!--hr/-->
		<div id='divholder'>
			<button class='btn btn-primary' id='addelig'> Add </button>
		</div>
	</div>
	<div class='col-md-12' style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 10px;">
		<div class='inputdiv fullwidth'>
			<h4 class='subhead'> List of your eligibilities </h4>
			<!--p> What you have </p-->
			<span id='listofeligs'> <?php echo $loc; ?> </span>
		</div>
	</div>
</div>

