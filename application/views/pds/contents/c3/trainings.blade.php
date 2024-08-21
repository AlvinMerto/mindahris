<h6 class='headertext'> Learning and Development (L&D) Interventions/Training programs attended </h6>
<small class='headsmall'> (Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions) </small>
<hr/>
<div class='row'>
	<div class='col-md-12'>
		<h4 class='subhead'> About the Training </h4>
		<div class='inputdiv fullwidth'>
			<p> Title of learning and Development Interventions/Training Programs </p>
			<!--input type='text' id='titleofprog'/-->
			<textarea id='titleofprog'></textarea>
		</div>
		<hr/>
			<h4 class='subhead'> Inclusive Dates </h4>
			<div class='row'>
				<div class='col-md-6 removepad'>
					<div class='inputdiv fullwidth'>
						<p> From </p>
						<input type='date' id='from_'/>
					</div>
				</div>
				<div class='col-md-6 removepad'>
					<div class='inputdiv fullwidth'>
						<p> To </p>
						<input type='date' id='to_'/>
					</div>
				</div>
			</div>
		<hr/>
		<div class='inputdiv fullwidth'>
			<p> Number of Hours </p>
			<input type='text' id='numofhrs'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Type of LD ( Managerial/ Supervisory/ Technical/etc) </p>
			<select id='typeofsem' class='btn btn-default'>
				<option> -- select </option>	
				<option> Managerial </option>
				<option> Supervisory </option>
				<option> Technical </option>
				<option> others </option>
			</select>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Conducted / Sponsored By <small> (write in full) </small></p> 
			<input type='text' id='conductedby'/>
		</div>

		<!--hr/-->
		<div id='btnholder'>
			<button class='btn btn-primary' id='addnewsem'> Add </button>
		</div>
	</div>
	<div class='col-md-12' style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 10px;">
		<h4 class='subhead'> Your trainings and seminars </h4>
		<div class='inputdiv fullwidth'>
			<table class='table'>
				<thead>
					<th> Training </th>
					<!--th> Inclusive Dates </th-->
					<th> &nbsp; </th>
				</thead>
				<tbody id='tands'>
					<?php echo $loc; ?>
				</tbody>	
			</table>
		</div>
	</div>
</div>