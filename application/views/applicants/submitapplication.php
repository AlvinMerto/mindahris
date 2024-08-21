<div>
	
	<?php
		if ($stat == 0) {
			echo "<p class='su_wrong'>{$msg}</p>";
		} else if ($stat == 1) {
			echo "<p class='su_correct'>{$msg}</p>";
	?>
		<hr/>
			
			<p style='text-align:center;'> <a href='<?php echo base_url(); ?>applicants/submit_application/proceed'><button class='btn btn-primary'> Submit now </button> </a></p>
		<hr/>
	<?php
		}
	?>
		
</div>