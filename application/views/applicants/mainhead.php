<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link rel='stylesheet' href= <?php echo base_url()."/v2includes/style/applicants/applicants_style.css"; ?> />

<div class='middlediv'>

	<h5> Mindanao Development Authority (MinDA) </h5>
	<h2> Assessment </h2>
	
	<?php 
		$secsegment = $this->uri->segment(2);
	?>
	
	<div class='navigation'>
		<ul>
			<li
				<?php if ($secsegment==NULL){ echo "class='selectedli'";} ?>
			> <a href='<?php echo base_url(); ?>applicants'> Personal Information</a> </li>
			<li
				<?php if ($secsegment=="trainings"){ echo "class='selectedli'";} ?>
			> <a href='<?php echo base_url(); ?>applicants/trainings/'>Trainings</a> </li>
			<li
				<?php if ($secsegment=="workexperiences"){ echo "class='selectedli'";} ?>
			> <a href='<?php echo base_url(); ?>applicants/workexperiences'> Work Experiences </a> </li> 
			<li class="btn btn-info" style="float: right; padding: 10px 21px;margin: 0px;color: #fff;"> 
				<a href='<?php echo base_url();?>applicants/submit_application'> Submit Application </a>
			</li>
		</ul>
	</div>
	
	<div class='middlecontent'>
		<?php echo $display; ?>
	</div>
	<hr/>
	<p style='text-align:center;'> <a href='<?php echo base_url(); ?>applicants/logoff'> sign out </a> </p>
</div>

<script>
	var burl 	= '<?php echo base_url(); ?>';
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
		
<script src='<?php echo base_url(); ?>v2includes/js/applicant/applicantscript.js'></script>