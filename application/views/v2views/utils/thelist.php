
<table class='tableutil'>
			<thead>
					<th> Date Filed </th>
					<th> Control no. </th>
					<th> Name of traveller/s </th>
					<th> Date of travel </th>
					<th> Nature of travel </th>
					<th> Destination </th>
					<th> Purpose </th>
					<th> Requested by </th>
					<th> Encoded by </th>
					<th> Status </th>
			</thead>
			<tbody>
				<?php 
					if (count($dets)>0) {
						foreach($dets as $d) {
							$class = null;
							
							if ($d->status == 1) {
								$class = "class='cancelled'";
							}
							
							echo "<tr data-toid='{$d->toid}' {$class}>";
								echo "<td> ". date("F d, Y", strtotime($d->datefiled)) ." </td>
									<td> {$d->controlno} </td>
									<td> {$d->nameoftravs} </td>
									<td> ". date("F d, Y", strtotime($d->dateoftrav)) . " - " .date("F d, Y", strtotime($d->dateoftrav_to)). "</td>
									<td> {$d->natoftrav} </td>
									<td> {$d->destination} </td>
									<td> {$d->purpose} </td>
									<td> {$d->reqby} </td>
									<td> {$d->encodedby} </td>
									<td> "; ?>
								
								<?php
										if ($d->status==0) {
											echo "continue";
										} elseif ($d->status == 1) { 
											echo "Cancelled";
										}
									" </td>";
							echo "</tr>";
						}
					} else {
						echo "<tr>";
							echo "<th colspan='10' style='background:#fff; text-align:center; font-weight:normal;'>";
								echo "No travel orders found";
							echo "</th>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>







