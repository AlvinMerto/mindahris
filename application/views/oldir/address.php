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
							<tbody>
									<?php
										$kkkk = ["permanent"    => "Permanent Address",
												 "residential"  => "Residential Address",];
										
										foreach($kkkk as $key => $k) {
											echo "<tr>";
												echo "<th colspan='20' style='text-align:left;'> {$k} </th>";
											echo "</tr>";
											
											if (count($ret[$key])>0) {
												foreach($ret[$key] as $rr) {
													echo "<tr>";
														echo "<td>";
															echo $rr['brgy']." ";
															echo $rr['houseblklot']." ";
															echo $rr['street']." ";
															echo $rr['subdvill']." ";
															echo $rr['city']." ";
															echo $rr['prov']." ";
															echo $rr['zcode'];
														echo "</td>";
													echo "</tr>";
												}
											} else {
												echo "<tr>";
													echo "<td> no entries found </td>";
												echo "</tr>";
											}
										}
									?>
							</tbody>
						</table>
					</div>
