					<div id='contenttop'>
						<table style='background: #efefef;'>
							<tr>
								<th> Fullname </th>
								<td> <?php echo $info[0]; ?> </td>
							</tr>
							<!--tr>
								<th> Position </th>
								<td> <?php // echo $info[1]; ?> </td>
							</tr>
							<tr>
								<th> Division </th>
								<td> <?php // echo $info[2]; ?> </td>
							</tr-->
							</tbody>
						</table>
					</div>
					<div id='contentpop'>
						<table class='thepopupcontent'>
							<thead>
								<th> About the training </th>
								<th> Inclusive dates </th>
								<th style='width: 0px;'> Hours </th>
								<th style='width: 0px;'> Type of L&D </th>
								<th> Conducted / Sponsored </th>
							</thead>
							<tbody>
								<?php 
									if (count($ret) > 0) {
										foreach($ret as $r) {
											echo "<tr>";
												echo "<td> {$r[0]} </td>";
												echo "<td>".date("F d, Y", strtotime($r[1])) ." - ".date("F d, Y", strtotime($r[2]))."</td>";
												echo "<td> {$r[3]} </td>";
												echo "<td> {$r[4]} </td>";
												echo "<td> {$r[5]} </td>";
											echo "</tr>";
										}
									} else {
										echo "<tr>";
											echo "<td> no entry found </td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
