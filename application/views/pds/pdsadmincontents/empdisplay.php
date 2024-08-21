<table style='margin-top: 7px; margin-bottom: 7px; width: 100%;'>
<?php 
	
	foreach($emps as $e) {
		echo "<tr>";
			echo "<td>";
				echo "<p class='empclick' data-pidn='{$e->employee_id}'>".$e->f_name."</p>";
				echo "<span id='emp_{$e->employee_id}'></span>";
			echo "</td>";
		echo "</tr>";
	}
	
?>
<table>