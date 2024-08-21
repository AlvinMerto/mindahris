<table class='trainingtbl'>
<thead>
	<tr>
		<th colspan=20 style='font-size: 13px;'> Seminars and Trainings attended </th>
	</tr>
	<tr>
		<th> About the Training </th>
		<th> Inclusive Dates </th>
		<th> Number of Hours </th>
		<th> Type of L&D </th>
		<th> Conducted / Sponsored By </th>
	</tr>
</thead>
<?php 
	
	
	foreach($seminars as $s) {
		$datefrom = date("F d, Y", strtotime($s->from_));
		$dateto   = date("F d, Y", strtotime($s->to_));
		echo "<tr>";
			echo "<td> {$s->titleofprog} </td>";
			echo "<td> {$datefrom} - {$dateto} </td>";
			echo "<td> {$s->numofhrs} </td>";
			echo "<td> {$s->typeofsem} </td>";
			echo "<td> {$s->conductedby} </td>";
		echo "</tr>";
	}

?>
</table>
<?Php 
	
	if ($afilters['ebgrnd'] != null) {
		?>
			<table class='trainingtbl'>
				
				<thead>
					<tr>
						<th colspan=20 style='font-size: 13px;'>  Educational Background </th>
					</tr>
					<tr>
						<th> Level </th>
						<th> Name of School </th>
						<th> Course </th>
						<th> From </th>
						<th> To </th>
						<th> Highest Level / Units earned </th>
						<th> Year Graduated </th>
						<th> Honors </th>
					</tr>
				</thead>
		<?php
		
			foreach($afilters['ebgrnd'] as $eb) {
				$datefrom = date("F d, Y", strtotime($eb->from_));
				$dateto   = date("F d, Y", strtotime($eb->to_));
				
				echo "<tr>";
					echo "<td> {$eb->educbgtype} </td>";
					echo "<td> {$eb->nameofsch} </td>";
					echo "<td> {$eb->course} </td>";
					echo "<td> {$datefrom} </td>";
					echo "<td> {$dateto} </td>";
					echo "<td> {$eb->hlevel_unitsearned} </td>";
					echo "<td> {$eb->yeargrad} </td>";
					echo "<td> {$eb->scho_honorrec} </td>";
				echo "</tr>";
			}
		echo "</table>";
	}

	if ($afilters['oskil'] != null) {
		?>
			<table class='trainingtbl'>
				<thead>
					<tr>
						<th colspan=20 style='font-size: 13px;'>  Special Skills and Hobbies</th>
					</tr>
					<tr>
						<th> Description </th>
						<th> The information </th>
					</tr>
				</thead>
		<?php
			foreach($afilters['oskil'] as $ok) {
				echo "<tr>";
					echo "<td> {$ok->oidescription} </td>";
					echo "<td> {$ok->theinfo} </td>";
				echo "</tr>";
			}
		echo "</table>";
	}
	
?>