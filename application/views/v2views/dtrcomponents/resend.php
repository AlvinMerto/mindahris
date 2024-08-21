<div class='readybox'>
	<h4 class='aatat'> <?php echo $atstat; ?> </h4>
	
	<div class='midbox'>
		<!--h6> RECOMMENDING APPROVAL </h6>
		<?php if ($numofsigs == 2 ) { ?>
		<?php 
			if(isset($approval_stat)) {
				if ($approval_stat >= 1) {
		?>
				<p> APPROVED </p>
		<?php 
				}
			} else {
		?>
			<select class='btn btn-default' id='recomappr'>
				<?php 
					
					foreach($emps as $es) {
						$selected = null;
							
						if (count($recom)>0) {
							if ($recom['employee_id'] == $es->employee_id) {
								$selected = "selected";
							}
						}
							
						echo "<option value='{$es->employee_id}' {$selected}>";
							echo $es->f_name;
						echo "</option>";
					}
				?>
			</select>
			<?php } ?>
		<?php } else {?>
			<!--p> Recommending approval is not needed. </p-->
		<?php } ?>
		<h6> APPROVER </h6>
		
		<?php if(isset($approval_stat)) { 
				if ($approval_stat == 2) { ?>
					<p> APPROVED </p>
			<?php } else { goto selectdir; } ?>
		<?php } else { selectdir: ?>
			<select class='btn btn-default' id='finalappr'>
				<?php 
					foreach($emps as $es) {
						$selected = null;
						
						if (count($dir)>0) {
							if ($dir['employee_id'] == $es->employee_id) {
								$selected = "selected";
							}
						}
						
						echo "<option value='{$es->employee_id}' {$selected}>";
							echo $es->f_name;
						echo "</option>";
					}
				?>
			</select>
		<?php } ?>
		<h6> DEADLINE </h6>
		<p> 
			<?php 
				if (isset($deadline)) {
					echo $deadline;
				}
			?> 
		</p>
	</div>
	
	<?php if(isset($approval_stat)) {
			if ($approval_stat < 2) {
				goto resendbtn;
			}
		} else {
		resendbtn:
	?>
		<div class='btmdiv'>
			<button id='resendnow' class='btn btn-primary' data-dtrsumrep='<?Php echo $dtrsumrep; ?>'> Re-send </button>
		</div>
	<?php
		}
	?>
</div>