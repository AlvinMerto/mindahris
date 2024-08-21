<div class='emplistdiv'>
	<button class='btn btn-primary' id='selectall'> SELECT ALL </button>
	<hr style='margin: 4px 0px; border-color: #cecbcb;'/>
	<ul id='empullist'>
		<?php 
			foreach($emps as $e) {
				echo "<li data-empdata='{$e->employee_id}'>";
					echo $e->f_name;
				echo "</li>";
			}
		?>
	</ul>
</div>

