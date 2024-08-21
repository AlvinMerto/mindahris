<h6 class='headertext'> Government Issued ID <small> (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.) 
	<br/><br/>PLEASE INDICATE ID Number and Date of Issuance </small>
</h6>
<hr/>
<div class='row'>
	<div class='col-md-12'>
		<div class='inputdiv'>
			<p> Government Issued ID: </p>
			<input type="text" id='issuedid'/>
		</div>
		<div class='inputdiv'>
			<p> ID Number (ID/License/Passport No.): </p>
			<input type="text" id='idnum'/>
		</div>
		<div class='inputdiv'>
			<p> Date of Issuance: </p>
			<input type="date" id='dateofiss'/>
		</div>
		<div class='inputdiv'>
			<p> Place of Issuance: </p>
			<textarea id='placeofiss'></textarea>
		</div>
		<!--hr/-->
		<div id='btnholder'>
			<button class='btn btn-primary btn-sm' id='addanid'> Add </button>
		</div>
	</div>
	<div class='col-md-12' style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 10px;">
		<div class='inputdiv fullwidth'>
			<h4 class='subhead'> List of IDs submitted </h4>
			<table class='table'>
				<thead>
					<th> Issued ID </th>
					<th> ID Number </th>
					<th> &nbsp; </th>
				</thead>
				<tbody id='idsissd'>
					<?php echo $loc; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-md-12'>
		<hr/>
		<center>
			<button class='btn btn-primary' id='saveandexit'> Save and Exit </button>
		</center>
		<hr/>
	</div>
</div>