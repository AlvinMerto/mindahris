<form method="post">
	<div class='row'>
		<div class='col-md-12'>
			<h6> Position Applied For 
				<?php 
					if (count($entry['apl']) > 0) {
						echo ": <span style='color:red;'> {$entry['apl'][0]['oppos']} </span>";
					}
				?>
			</h6>
			
			<select class="form-select" name='posapplied' style='padding: 20px 15px;'>
				<?php 
					if (count($entry['posts']>0)) {
						foreach($entry['posts'] as $ps) {
							$selected = null;
							if ($entry['apl'][0]['positioncode'] == $ps['positioncode']) {
								$selected = "selected";
							}
							echo "<option value='{$ps['positioncode']}' $selected> {$ps['position']} </option>";
						}
					}
				?>
			</select>
		</div>
	</div>
	
	<br/>
	
	<div class='row'>
		<div class='col-md-6'>
			<h6> Fullname (last name, first name, middle name) </h6>
			<input type='text' class='form-control' name='fullname' value='<?php if (count($entry['pi'])>=1) { echo $entry['pi'][0]['firstname'];} ?>'/>
		</div>
		<div class='col-md-2'>
			<h6> Age </h6>
			<input type='text' class='form-control' name='age' value='<?php if ($entry != null) { echo $entry['pi'][0]['age'];} ?>'/>
		</div> 
		<div class='col-md-2'>
			<h6> Sex </h6>
			<select class="form-select" name='sex'>
				<option <?php if ($entry!=null && $entry['pi'][0]['sex']=="male"){ echo "selected";} ?>> male </option>
				<option <?php if ($entry!=null && $entry['pi'][0]['sex']=="female"){ echo "selected";} ?>> female </option>
			</select>
		</div> 
		<div class='col-md-2'>
			<h6> Marital Status </h6> 
			<select class="form-select" name='marstat'>
			<?php 
				$civilstat = ["single","married","divorced","separated","widowed"];
				
				$selectedopt = null;
				foreach($civilstat as $cs) {
					if ($entry!=null) {
						if ($entry['pi'][0]['civilstat'] == $cs) {
							$selectedopt = "selected";
						} else {
							$selectedopt = null;
						}
					}
					echo "<option {$selectedopt}> {$cs} </option>";
				}
			?>
			</select>
		</div> 
	</div>
	
	<br/>
	
	<div class='row'>
		<div class='col-md-12'>
			<h6> Address </h6>
			<textarea class='form-control' name='addr'><?php if ($entry != null) { echo $entry['pi'][0]['addr'];} ?></textarea>
		</div>
	</div>
	
	<br/>
	
	<div class='row'>
		<div class='col-md-6'>
			<h6> Telephone number </h6>
			<input type='text' class='form-control' name='telnum' value='<?php if ($entry != null) { echo $entry['pi'][0]['mobnum'];} ?>'/>
		</div>
	</div>
	
	<br/>
	
	<div class='row'>
		<div class='col-md126'>
			<h6> Eligibility <?php if(count($entry['elig'])!=0){ echo ": <span style='color:red;'>".$entry['elig'][0]['etype']."</span>"; } ?> </h6> 
			<select class="form-select" name='elig'>
				<?php 
					$eligs = ["Career Service (sub-professional) 1st level",
							  "career service (professional) second level",
							  "Bar/Board Eligibility (RA1080)",
							  "Barangay Health Worker Eligibility (RA7883)",
							  "Barangay Nutrition Scholar Eligibility (PD1569)",
							  "Barangay Official Eligibility (RA 7160)",
							  "Electronic Data Processing Specialist Eligibility (CSC Res. 90-083)",
							  "Foreign School Honor Graduate Eligibility (CSC Res. 1302714)",
							  "Honor Graduate Eligibility (PD907)",
							  "Sanggunian Member Eligibility (RA 10156)",
							  "Scientific and Technological Specialist Eligibility (PD 997)",
							  "Skills Eligibility - Category II (CSC MC 11, s. 1996, as Amended)",
							  "Veteran Preference Rating (EO 132/790)"];
					
					foreach($eligs as $e) {
						$selected  = null;
						if($entry['elig'][0]['etype'] == $e) {
							$selected = "selected";
						}
						echo "<option {$selected}> {$e} </option>";
					}
				?>
			</select>
		</div>
	</div>
	<br/>
	<?php
		if  ($msg != null) {
			echo "<p class='su_correct'> {$msg} </p>";
		}
	?>
	
	<?php if ($stat == 1): ?>
		<p style='text-align:center;'> <input type='submit' class='btn btn-primary' style='width:300px;' value='Save information' name='pi_submit'/>  </p>
	<?php endif; ?>
	<?php if ($stat == 0): ?>
		<p style='text-align:center;'> <input type='submit' class='btn btn-primary' style='width:300px;' value='Update information' name='pi_update'/>  </p>
	<?php endif; ?>
	<hr style="margin: 4% 15% 30px;">
</form>	

	<div class='row schooldiv'>
		<h6> <strong> please add all your educational history from college to graduate studies.</strong> </h6>
		<hr/>
		<div class='col-md-4'>
			<h6> Course (do not abbreviate) </h6>
			<input type='text' class='form-control' name='course' id='course' value='<?php //if($entry!=null){ echo $entry['edb'][0]['course'];} ?>'/>
		</div>
		<div class='col-md-3'>
			<h6> School (do not abbreviate) </h6>
			<input type='text' class='form-control' name='school' id='school' value='<?php //if($entry!=null){ echo $entry['edb'][0]['nameofsch'];} ?>'/>
		</div>
		<div class='row col-md-5'>
			<h6> Date Attended </h6>
			<div class='col-md-6'>
				<input type='date' class='form-control' name='att_from' id='att_from' value='<?php //if($entry!=null){ echo $entry['edb'][0]['from_'];} ?>'/>
			</div>
			<div class='col-md-6'> 
				<input type='date' class='form-control' name='att_to' id='att_to' value='<?php //if($entry!=null){ echo $entry['edb'][0]['to_'];} ?>'/>
			</div>
		</div>
		<br/>
		<!--input type='submit' value='Save' name='saveschool' class='btn btn-secondary'/-->
		<button class='btn btn-primary' id='saveschool'> Save to add new </button>
	</div>
		<hr style="margin: 4% 15% 30px;">