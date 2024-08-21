<div class='adminpaneldiv'>
	<small> STATUS </small>
	<h4>
		<?php 
			$button = null;
			if ($dets[0]->approval_status == 2) {
				echo "APPROVED";
				$button = "<p id='sendbackbtn'> Send Back </p>";
			} else if ($dets[0]->approval_status <= 1) {
				echo "Waiting for approval";
			}
		?>
	</h4>

	<br/>

	<small> DTR COVERAGE </small>
	<h4> 
		<?php 
			// echo $dets[0]->dtr_coverage;
			list($from,$to) = explode("-",$dets[0]->dtr_coverage);
			echo date("M. d, Y", strtotime($from));
				echo " - ";
			echo date("M. d, Y", strtotime($to));
		?>
	</h4>
</div>

<?php
	echo $button;
?>