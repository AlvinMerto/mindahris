<?php if(isset($notloggedin)) {
	if($notloggedin == false) { ?>
<div class='profilepic'>
	<div class='thepic'>
		<img src='<?php echo base_url()."assets/profiles/".$this->session->userdata("employee_image"); ?>'/>
	</div>
	<p class='nametext'> <?php 
			// var_dump($this->session);
			echo $this->session->userdata('full_name')."."; 
				echo "<br/>";
			echo "<small>".$this->session->userdata('position_name').",</small> ";
				echo "<br/>";
			echo "<small>".$this->session->userdata('office_division_name')."</small>";
		?> 
	</p>
</div>
	<hr/>
<?php }} ?>
<div class='navigationlist'>
	<?php 
		// c1 
		$pi = $fb = $eb = null;

		// c2
		$e  = $we = null;

		// c3
		$i = $t = $ot = null;

		// c4
		$a = $r = $id = null;
		
		switch($smalltab) {
			case "personalinformation":
				$pi = "selectedli";
				break;
			case "familybackground":
				$fb = "selectedli";
				break;
			case "educationalbackground":
				$eb = "selectedli";
				break;
			case "eligibility":
				$e = "selectedli";
				break;
			case "workexperience":
				$we = "selectedli";
				break;
			case "involvement":
				$i = "selectedli";
				break;
			case "trainings":
				$t = "selectedli";
				break;
			case "questionnaire":
				$a = "selectedli";
				break;
			case "references":
				$r = "selectedli";
				break;
			case "identification":
				$id = "selectedli";
				break;
			case "otherinfo":
				$ot = "selectedli";
				break;
		}

	?>

	<?php if ($bigtab == "c1") { ?>
		<!-- c1 -->
		<ul>
			<a href='<?php base_url(); ?>/pds/c1/personalinformation'> <li class='<?php echo $pi; ?>'> Personal Information </li> </a>
			<a href='<?php base_url(); ?>/pds/c1/familybackground'> <li class='<?php echo $fb; ?>'> Family Background </li> </a>
			<a href='<?php base_url(); ?>/pds/c1/educationalbackground'> <li class='<?php echo $eb; ?>'> Educational Background </li> </a>
		</ul>
		<hr/>
		<a href='<?php echo base_url(); ?>/Pds/printc1' class='btn btn-primary' style='width:100%;' target='_blank'> View page C1 </a>
		<hr/>
	<?php } ?>

	<?php if ($bigtab == "c2") { ?>
		<!-- c2 -->
		<ul> 
			<a href='<?php base_url(); ?>/pds/c2/eligibility'> <li class='<?php echo $e; ?>'>  Eligibility </li> </a>
			<a href='<?php base_url(); ?>/pds/c2/workexperience'> <li class='<?php echo $we; ?>'>  Work Experience </li> </a>
		</ul>
		<hr/>
		<a href='<?php echo base_url(); ?>/Pds/printc2' class='btn btn-primary' style='width:100%;' target='_blank'> View page C2</a>
		<hr/>
	<?php } ?>

	<?php if ($bigtab == "c3") { ?>
		<!-- c3 -->
		<ul> 
			<a href='<?php base_url(); ?>/pds/c3/involvement'> <li class='<?php echo $i; ?>'> Voluntary work or Involvement </li> </a>
			<a href='<?php base_url(); ?>/pds/c3/trainings'> <li class='<?php echo $t; ?>'> Learning and Development </li> </a>
			<a href='<?php base_url(); ?>/pds/c3/otherinfo'> <li class='<?php echo $ot; ?>'> Other Information </li> </a>
		</ul>
		<hr/>
		<a href='<?php echo base_url(); ?>/Pds/printc3' class='btn btn-primary' style='width:100%;' target='_blank'> View page C3</a>
		<hr/>
	<?php } ?>

	<?php if ($bigtab == "c4") { ?>
		<ul> 
			<a href='<?php base_url(); ?>/pds/c4/questionnaire'> <li class='<?php echo $a; ?>'> Questionnaire </li> </a>
			<a href='<?php base_url(); ?>/pds/c4/references'> <li class='<?php echo $r; ?>'> References </li> </a>
			<a href='<?php base_url(); ?>/pds/c4/identification'> <li class='<?php echo $id; ?>'> Identification </li> </a>
		</ul>
		<hr/>
		<a href='<?php echo base_url(); ?>/Pds/printc4' class='btn btn-primary' style='width:100%;' target='_blank'> View page C4</a>
		<hr/>
	<?php } ?>
</div>