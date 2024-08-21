<h6 class='headertext'> REFERENCES <br/> <br/> <small> (Person not related by consanguinity or affinity to applicant /appointee) </small> </h6>
<hr/>
<div class='row'>
	<div class='col-md-12'>
		<div class='inputdiv fullwidth'>
			<p> Name </p>
			<input type='text' id='name'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Address </p>
			<textarea id='addr'></textarea>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Tel. No. </p>
			<input type='text' id='telnum'/>
		</div>
		<!--hr/-->
		<div id='divbtnholder'>
			<button class='btn btn-primary btn-sm' id='addref'> Add </button>
		</div>
	</div>
	<div class='col-md-12' style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 10px;">
		<h4 class='subhead'> Your References: </h4>
		<div class='inputdiv fullwidth'>
			<table class='table'>
				<thead>
					<th> Name </th>
					<th> Telephone No. </th>
					<th> &nbsp; </th>
				</thead>
				<tbody id='refs'>
					<?php echo $loc; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
