<div class='readybox'>
	<h4 class='rstat'> Your DTR is ready </h4>
	<div class='midbox'>
		<!--h6> RECOMMENDING APPROVAL </h6-->
			<?php if ($numofsigs == 2 ) { ?>
			<select class='btn btn-default' id='recomappr'>
				<?php 
					foreach($emps as $es) {
						$selected = null;
							
						if (count($recom)>0) {
							if ($recom == $es->employee_id) {
								$selected = "selected";
							}
						}
							
						echo "<option value='{$es->employee_id}' {$selected}>";
							echo $es->f_name;
						echo "</option>";
					}
				?>
			</select>
			<?php } else {?>
				<!--p> Recommending approval is not needed. </p-->
			<?php } ?>
		<h6> APPROVER </h6>
		<select class='btn btn-default' id='finalappr'>
			<?php 
				foreach($emps as $es) {
					$selected = null;
					
					if (count($dir)>0) {
						if ($dir == $es->employee_id) {
							$selected = "selected";
						}
					}
					
					echo "<option value='{$es->employee_id}' {$selected}>";
						echo $es->f_name;
					echo "</option>";
				}
			?>
		</select>
		
		<h6> DEADLINE </h6>
		<p> 
			<?php 
				if (isset($deadline)) {
					echo $deadline;
				}
			?> 
		</p>
	</div>
	
	<div class='btmdiv'>
		<button id='submitnow' class='btn btn-primary'> Submit </button>
	</div>
</div>