<h6 class='headertext'> Work Experiences </h6>
<small class='headsmall' style='margin-left: 15px;'> (Include private employment.  Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet. </small>
<hr/>

<div class='row'>
	<div class='col-md-12'>
		<div class='row'>
			<div class='col-md-6 inputdiv fullwidth removepad'>
				<h4 class='subhead'> Inclusive Dates 

				</h4>
				<p> From: <strong><span id='fromedit'> </span></strong> </p>
				<input type='date' id='from_'/>
			</div>
			<div class='col-md-6 inputdiv fullwidth removepad'>
				<h4 class='subhead'> &nbsp; </h4>
				<p> To: <strong><span id='toedit'> </span> </strong> <span style='float:right;'> <label style='margin:0px;'> <input type='checkbox' id='presentchck'/> present </span> </label> </p>
				<input type='date' id='to_'/>
			</div>
			
			<small class='useonly resetlink' style='color:red;'> reset </small>
				<small class='useonly'> | </small>
			<small class='useonly usetexttodate' data-use='monyear'> use month and year </small>
				<small class='useonly'> | </small>
			<small class='useonly usetexttodate' data-use='year'> use only year </small>
		</div>
		<hr/>
		<div class='inputdiv fullwidth'>
			<p> Position Title - <i> (Write in full/Do not abbreviate) </i> </p>
			<input type='text' id='postitle'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Department/Agency/Office/Company  - <i> (Write in full/Do not abbreviate) </i> </p>
			<input type='text' id='dept'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Monthly Salary </p>
			<input type='text' id='monthsal'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Salary/Job/Pay Grade (if applicable) & STEP (Format "00-0")/ INCREMENT </p>
			<input type='text' id='paygrade'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Status of Appointment </p>
			<input type='text' id='statofapp'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Goverment Service </p>
			<select id='govserv'>
				<option> -- select </option>
				<option> Yes </option>
				<option> No </option>
			</select>
		</div>
		<!--hr/-->
		<div id="divholder">
			<button class='btn btn-primary' id='addworkexp'> Add </button>
		</div>
	</div>
	<div class='col-md-12' style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 10px;">
		<div class='inputdiv fullwidth'>
			<h4 class='subhead'>List of Work Experiences </h4>
			<table class="table ">
				<thead>
					<th> Job Title </th>
					<th> Inclusive Dates </th>
					<th> &nbsp; </th>
				</thead>
				<tbody id='listofwexp'>
					<?php echo $loc; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>