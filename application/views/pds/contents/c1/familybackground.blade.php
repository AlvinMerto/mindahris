<h6 class='headertext' data-boxbelong="familybg" id='headertext'> Family Background </h6>
<hr/>
<?php 
	$sp_surname	 = null;
	$sp_fname	 = null;
	$sp_n_ext	 = null;
	$sp_mname	 = null;
	$occupation  = null;
	$empbname	 = null;
	$baddr		 = null;
	$telnum		 = null;
	$fsurname	 = null;
	$ffirstname	 = null;
	$fnameext	 = null;
	$fmidname	 = null;
	$mmaidenname = null;
	$msurname	 = null;
	$mfirstname	 = null;
	$mmidname	 = null;
	
	if (count($details) > 0) {
		$sp_surname	 = $details[0]->sp_surname;
		$sp_fname	 = $details[0]->sp_fname;
		$sp_n_ext	 = $details[0]->sp_n_ext;
		$sp_mname	 = $details[0]->sp_mname;
		$occupation  = $details[0]->occupation;
		$empbname	 = $details[0]->empbname;
		$baddr		 = $details[0]->baddr;
		$telnum		 = $details[0]->telnum;
		$fsurname	 = $details[0]->fsurname;
		$ffirstname	 = $details[0]->ffirstname;
		$fnameext	 = $details[0]->fnameext;
		$fmidname	 = $details[0]->fmidname;
		$mmaidenname = $details[0]->mmaidenname;
		$msurname	 = $details[0]->msurname;
		$mfirstname	 = $details[0]->mfirstname;
		$mmidname	 = $details[0]->mmidname;
	}
?>
<div class='row'>
	<div class='col-md-6'>
		<h4 class='subhead'> Spouse </h4>
		<div class='inputdiv fullwidth'>
			<p> Spouse's Surname </p>
			<input type='text' class='boxprocs' id='sp_surname' value='<?php echo $sp_surname; ?>'/>
		</div>

			<div class='row'>
				<div class='col-md-6 removepadleft'>
					<div class='inputdiv fullwidth'>
						<p> First Name </p>
						<input type='text' class='boxprocs' id='sp_fname' value='<?php echo $sp_fname; ?>'/>
					</div>
				</div>
				<div class='col-md-6 removepad'>
					<div class='inputdiv fullwidth'>
						<p> Name Extension </p>
						<input type='text' class='boxprocs' id='sp_n_ext' value='<?php echo $sp_n_ext; ?>'/>
					</div>
				</div>
			</div>
		<div class='inputdiv fullwidth'>
			<p> Middle Name </p>
			<input type='text' class='boxprocs' id='sp_mname' value='<?php echo $sp_mname; ?>'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Occupation </p>
			<input type='text' class='boxprocs' id='occupation' value='<?php echo $occupation; ?>'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Employers Business Name </p>
			<input type='text' class='boxprocs' id='empbname' value='<?php echo $empbname; ?>'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Business Address </p>
			<input type='text' class='boxprocs' id='baddr' value='<?php echo $baddr; ?>'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Telephone No. </p>
			<input type='text' class='boxprocs' id='telnum' value='<?php echo $telnum; ?>'/>
		</div>
		<hr/>

		<h4 class='subhead'> Father </h4>
		<div class='inputdiv fullwidth'>
			<p> Fathers Surname </p>
			<input type='text' class='boxprocs' id='fsurname' value='<?php echo $fsurname; ?>'/>
		</div>

			<div class='row'>
				<div class='col-md-6 removepadleft'>
					<div class='inputdiv fullwidth'>
						<p> First name </p>
						<input type='text' class='boxprocs' id='ffirstname' value='<?php echo $ffirstname; ?>'/>
					</div>
				</div>
				<div class='col-md-6 removepad'>
					<div class='inputdiv fullwidth'>
						<p> Name Extension </p>
						<input type='text' class='boxprocs' id='fnameext' value='<?php echo $fnameext; ?>'/>
					</div>
				</div>
			</div>

		<div class='inputdiv fullwidth'>
			<p> Middle name </p>
			<input type='text' class='boxprocs' id='fmidname' value='<?php echo $fmidname; ?>'/>
		</div>
		<hr/>

		<h4 class='subhead'> Mother's Maiden Name </h4>
		<!--div class='inputdiv fullwidth'>
			<p> Mother's Maiden Name </p>
			<input type='text' class='boxprocs' id='mmaidenname' value='<?php echo $mmaidenname; ?>'/>
		</div-->
		<div class='inputdiv fullwidth'>
			<p> Surname </p>
			<input type='text' class='boxprocs' id='msurname' value='<?php echo $msurname; ?>'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> First Name </p>
			<input type='text' class='boxprocs' id='mfirstname' value='<?php echo $mfirstname; ?>'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Middle Name </p>
			<input type='text' class='boxprocs' id='mmidname' value='<?php echo $mmidname; ?>'/>
		</div>
	</div>
	<div class='col-md-6'>
		<h4 class='subhead'> Children </h4>
		<div class='inputdiv fullwidth'>
			<p> Name of Children (Write full name and list all) </p>
			<input type='text' id='childname'/>
		</div>
		<div class='inputdiv fullwidth'>
			<p> Date of Birth </p>
			<input type='date' id='childbdate'/>
		</div>
		<div class='inputdiv fullwidth' id='childbtndiv'>
			<button class='btn btn-primary btn-sm' id='addchild'> Add </button>
		</div>
		<hr/>
		<div class='inputdiv fullwidth'>
			<p> List of Children </p>
			<table class="table ">
				<thead>
					<th> Name </th>
					<th> Birthdate </th>
					<th> &nbsp; </th>
				</thead>
				<tbody id='listofchild'>
					<?php 
						echo $loc;
					?>
				</tbody>
		</div>
	</div>
</div>