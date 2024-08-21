<p class='stats'> Please indicate all work experiences indicated in your submitted Personal Data Sheet (PDS) </p>
<form method='post'>
<div class='row'>
	<div class='col-md-12'>
		<h6> Position title </h6>
		<input type='text' class='form-control' name='postitle'/>
	</div>
</div>

<br/>

<div class='row'>
	<div class='col-md-12'>
		<H6> Company Name </h6>
		<input type='text' class='form-control' name='companyname'/>
	</div>
</div>

<br/>

<div class='row'>
	<div class='col-md-5'>
		<h6> Sector </h6>
		<select class='form-select' name='sectoropt'>
			<option value='No'> Private </option>
			<option value='Yes'> Government </option>
		</select>
	</div>
</div>

<br/>

<div class='row'>
	<div class='col-md-3'>
		<h6> Status of appointment </h6>
		<select class='form-select' name='statofapp'>
			<?php 
				$statofapp = ["Permanent",
							  "Contractual",
							  "Coterminous",
							  "Contract of Service",
							  "Job Order",
							  "Regular"];
				
				foreach($statofapp as $soa) {
					echo "<option> {$soa} </option>";
				}
			?>
		</select>
	</div>
	<div class='col-md-3'>
		<h6> No. of persons supervised </h6>
		<input type='text' class='form-control' name='numofpersup'/>
	</div>
	<div class='row col-md-6'>
		<h6> Inclusives dates </h6>
		<div class='col-md-6'>
			<input type='date' class='form-control' name='inc_from'/>
		</div>
		<div class='col-md-6'>
			<input type='date' class='form-control' name='inc_to'/>
		</div>
	</div> 
</div>

<br/>

<div class='row'>
	<div class='col-md-5'>
		<h6> no. of work experience (years) </h6>
		<input type='text' class='form-control' name='numofworkexp'/>
	</div>
	<div class='col-md-7'>
		<h6> Total Years of Managerial & Supervisory Experience (If applicable) </h6>
		<input type='text' class='form-control' name='totnumofworkexp'/>
	</div>
</div>



	<hr style="margin: 6% 15% 30px;">
	
	<?php 
		if ($msg != null) {
			echo "<p class='su_correct'>{$msg}</p>";
		}
	?>
	
	<p style='text-align:center;'> <input type='submit' class='btn btn-primary' style='width:300px;' value='Save to add new' name='workexpbtn'/> </p>
</form>