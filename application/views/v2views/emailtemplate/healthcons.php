
<table style='border-collapse:collapse;'>
	<thead>
		<tr>
			<th colspan='5' style='border:1px solid #f1f1f1; padding:5px;'> 
				<?php echo date("l M d, Y"); ?>
			</th>
		</tr>
		<tr>
			<th style='border:1px solid #f1f1f1; padding:5px;'> ID Number </th>
			<th style='border:1px solid #f1f1f1; padding:5px;'> name </th>
			<th style='border:1px solid #f1f1f1; padding:5px;'> Timelog </th>
			<th style='border:1px solid #f1f1f1; padding:5px;'> Temperature </th>
			<th style='border:1px solid #f1f1f1; padding:5px;'> Health Issues </th>
		</tr>
	</thead>
	
	<?php 
		foreach($data as $d) {
			echo "<tr>";
				echo "<td style='border:1px solid #f1f1f1; padding:5px;'>";
					echo $d['idnumber'];
				echo "</td>";
				echo "<td style='border:1px solid #f1f1f1; padding:5px;'>";
					echo $d['name'];
				echo "</td>";
				echo "<td style='border:1px solid #f1f1f1; padding:5px;'>";
					echo $d['timelog'];
				echo "</td>";
				echo "<td style='border:1px solid #f1f1f1; padding:5px;'>";
					echo $d['temp'];
				echo "</td>";
				echo "<td style='border:1px solid #f1f1f1; padding:5px;'>";
					echo $d['hiss'];
				echo "</td>";
				
			echo "</tr>";
		}
	?>
</table>