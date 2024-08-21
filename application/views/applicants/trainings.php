<p class='stats'> Please indicate all the trainings attended indicated in your submitted Personal Data Sheet (PDS) </p>
<form method="post"> 
<div class='row'>
	<div class='col-md-12'>
		<h6> Training </h6>
		<input type'text' class='form-control' name='thetraining'/>
	</div>
</div>

<br/>

<div class='row'>
	<div class='col-md-12'>
		<h6> Brief description of the training </h6>
		<textarea class='form-control' name='brfdesctr'></textarea>
	</div>
</div>

<br/>

<div class='row'>
	<div class='col-md-4'>
		<h6> Classification </h6>
		<select class='form-select' name='classtcn'>
			<?php 
				$classi = ["Foundation","Technical","Supervisory/Managerial"];
				
				foreach($classi as $c) {
					echo "<option> {$c} </option>";
				}
			?>
		</select>
	</div>
	<div class='col-md-4'>
		<h6> Participation </h6>
		<select class='form-select' name='parttcn'>
			<?php
				$parti = ["Participant","Facilitator","Organizer","Speaker"];
				
				foreach($parti as $p) {
					echo "<option>{$p}</option>";
				}
			?>
		</select>
	</div>
	<div class='col-md-4'>
		<h6> Intended for </h6>
		<select class='form-select' name='intendtcn'>
			<?php 
				$intend = ["Managers","Supervisor","Technical Staff","Rank and Files"];
				
				foreach($intend as $i) {
					echo "<option>{$i}</option>";
				}
			?>
		</select>
	</div>
</div>

<br/>

<div class='row'>
	<div class='col-md-4'>
		<h6> Training hours </h6>
		<input type='text' class='form-control' name='trhrs'/>
	</div>
	<div class='col-md-8'>
		<h6> Total number of managerial/supervisory training hours (if applicable) </h6>
		<input type='text' class='form-control' name='tottrhrs'/>
	</div>
</div>
	
	<hr style="margin: 6% 15% 30px;">
	
	<?php
		if ($msg!=null) {
			echo "<p class='su_correct'>{$msg}</p>";
		}
	?>
	
	
	<p style='text-align:center;'> <input type='submit' class='btn btn-primary' style='width:300px;' value='Save to add new' name='subtran'/> </p>
</form>