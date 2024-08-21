<h6 class='headertext'> Voluntary work or involvement in civic / non-government / people / voluntary organization(s) </h6>
<small> </small>
<hr/>

<div class='row'>
	<div class='col-md-12'>
		<h4 class='subhead'> Involvements </h4>
		<div class='inputdiv fullwidth'>
			<p> Name of the Organization </p>
			<input type='text' id='org'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Address of the Organization </p>
			<textarea id='addroforg'></textarea>
		</div>

		<hr/>
			<h4 class='subhead'> Inclusive Dates 
				
			</h4>
			<div class='row'>
				<div class='col-md-6 removepad'>
					<div class='inputdiv fullwidth'>
						<p> From <strong id='from_text'> </strong> </p>
						<input type='date' id='from_'/>
					</div>
				</div>
				<div class='col-md-6 removepad'>
					<div class='inputdiv fullwidth'>
						<p> To <strong id='to_text'> </strong> <span style='float:right;'> <input type='checkbox' id='presentchckinv'/> <label style='margin:0px;' for='presentchckinv'> present </label> </span> </p>
						<input type='date' id='to_'/>
					</div>
				</div>
				<small class='useonly resetlink' style='color:red;'> reset </small>
					<small class='useonly'> | </small>
				<small class='useonly usetexttodate' data-use='monyear'> use month and year </small>
					<small class='useonly'> | </small>
				<small class='useonly usetexttodate' data-use='year'> use only year </small>
			</div>
		<hr/>
		<div class='inputdiv fullwidth'>
			<p> Number of Hours </p>
			<input type='text' id='numofhrs'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Position / Nature of Work </p>
			<input type='text' id='post_natofwork'/>
		</div>
		<!--hr/-->
		<div id='divholder'>
			<button class='btn btn-primary' id='addinv'> Save </button>
		</div>
	</div>
	<div class='col-md-12' style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 10px;">
		<h4 class='subhead'> Your Involvements </h4>
		<div class='inputdiv fullwidth'>
			<table class='table'>
				<thead>
					<th> Organization </th>
					<th> Inclusive Dates </th>
					<th> &nbsp;  </th>
				</thead>
				<tbody id='invs'>
					<?php echo $loc; ?>
				</tbody>	
			</table>
		</div>
	</div>
</div>