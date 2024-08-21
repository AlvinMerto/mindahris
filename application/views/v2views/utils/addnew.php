<?php 
	if (isset($fromemps)) {
		echo "
			<div class='content-wrapper' style='padding-top:0px; background: rgb(249, 249, 249);'>
				<section class='content' style=''>
				<h3 style='margin-bottom: 20px;'> Add travel order </h3>
			";
	}
?>

<form method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>/Googlecalendar/addtocal'>

<table class='addnewtbl'>
	<?php if(isset($fromemps)) { ?>
		<tr>
			<th> Charge to: </th>
			<td>   
				<input list="thelists" name="chargeto" id="chargeto" style='width: 100%;font-size: 18px;border: 0px;padding: 6px 6px 6px 18px;color: #000;'>
				<datalist id='thelists'>
					<?php 
						foreach($datalist['dbm'] as $ta) {
							$dbm = strtoupper($ta->abbr_dbm);
							echo "<option value='{$dbm}'>";
						}
						
						foreach($datalist['div'] as $td) {
							$div = $td->abbr;
							echo "<option value='{$div}'>";
						}
					?>
				</datalist>
			</td>
		</tr>
	<?php } ?>
	<tr>
		<th> Control No. </th>
		<td>
		<?php if (isset($fromemps)) { ?>
			<input type='hidden' id='contnum' name='contnum' value='<?php echo $first."-".$theanchor."-".$year."-".$month."-".$start; ?>'>
			<p class='thetotext' id='contdisplay'> <?php echo $first."-".$theanchor."-".$year."-".$month."-".$start; ?> </p>
		<?php } else { ?>
			<input type='text' id='contnum' name='contnum' placeholder='Indicate the control number'>
		<?php } ?>
		</td>
	</tr>
	<tr>
		<th> foreign travel? </th>
		<td style='padding-Left:20px;vertical-align: middle;'> <input type='checkbox' id='isforeign' name='isforeign' value='yes'/> </td>
	</tr>
	<tr>
		<th> Office under </th>
		<td> 
			<select name='officeunder'>
				<option> OC </option>
				<option> OED </option>
				<option> DED </option>
				<option> OFAS </option>
				<option> PPPDO </option>
				<option> IPPAO </option>
				<option> AMO </option>
				<option> IPURE </option>
			</select>
		</td>
	</tr>
	<tr>
		<th> Name of traveller/s <small> separate by comma if multiple </small> </th>
		<td>
			<!--input type='text' placeholder='Name of traveller/s' id='nmoftravs'/-->
			<textarea id='nmoftravs' name='nmoftravs'></textarea>
		</td>
	</tr>
	<tr>
		<th> Date of travel </th>
		<td style='padding-Left:20px;'>
			<label> FROM: <input type='date' id='dtoftrav' name='dtoftrav'/> </label>
			<label> TO: <input type='date' id='dtoftrav_to' name='dtoftrav_to'/> </label>
		</td>
	</tr>
	<tr>
		<th> Nature of travel </th>
		<td>
			<select id='natoftrav' name='natoftrav'>
				<option selected> Official </option>
				<option> Personal </option>
			</select>
		</td>
	</tr>
	<tr>
		<th> Destination </th>
		<td>
			<input type='text' id='dest' name='dest'/>
		</td>
	</tr>
	<tr>
		<th> Purpose </th>
		<td>
			<textarea id='purpose' name='purpose'></textarea>
		</td>
	</tr>
	<tr>
		<th> Requested by </th>
		<td>
			<input type='text' id='reqby' name='reqby'/>
		</td>
	</tr>
	<!--tr>
		<th> Attach file </th>
		<td> 
			<!--label class='btn btn-default'>
				Attach file
				<input type='file' id='attfile' name='attfile' style='display:none;'/> 
			</label-->
			<!--form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
				<label class="btn btn-primary" id="openwindow" for="file"> Open Window </label>
				<input type="file" name="file" id="file" style="display:none;">
			</form>
			<span id ='savethefile'> </span>
			<span id ='output'> </span>
			<p class="uploadstext"> Files: <span id="listofattachments"> -- no files -- </span> </p>
			
		</td>
	</tr-->
	<tr>
		<td> &nbsp; </td>
		<td colspan='10'>
			<!--button  class='btn btn-primary' id='savenewentry' style='width: 160px;'> Save </button-->
			<input type='submit' name='submit' value='Save' class='btn btn-primary'/>
			<!--input type='submit' class='btn btn-primary' id='savenewentry' name='savenewentry' style='width:160px' value='Save'/-->
			
			<?php if(!isset($fromemps)): ?>
				<button class='btn btn-default' id='closeentry'> Close </button> &nbsp;
			<?php endif; ?>
		</td>
	</tr>
</table>

</form>

<?php 
	if (isset($fromemps)) {
		echo "
				</section>
			</div>
			";
	}
?>