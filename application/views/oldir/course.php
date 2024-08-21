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
										$kkkk = ["gradstud"   => "Graduate Studies",
												 "college"    => "Undergraduate Studies",
												 "voctrd"     => "Vocational / Trade Course",
												 "secondary"  => "Secondary",
												 "elementary" => "Elementary",
												 "unspec"	  => "Unspecified"];
										
										foreach($kkkk as $key => $k ) {
											echo "<tr>";
												echo "<th colspan=10 style='text-align:left;'> {$k} </th>";
											echo "</tr>";
											echo "<tr>";
												echo "<th style='text-align:left;'> Name of School </th>";
												echo "<th style='text-align:left;'> Basic education/degree/course </th>";
												echo "<th style='text-align:left;'> Date (mm/dd/YYYY)</th>";
												echo "<th style='text-align:left;'> HIGHEST LEVEL/UNITS EARNED (if not graduated) </th>";
												echo "<th style='text-align:left;'> Year Graduated </th>";
												echo "<th style='text-align:left;'> Scholarship / Academic Honors Received </th>";
											echo "</tr>";
											if (count($ret[$key]) > 0) {
												foreach($ret[$key] as $rr) {
													echo "<tr>";
														echo "<td>".$rr['nameofsch']."</td>";
														echo "<td>".$rr['course']."</td>";
														echo "<td>".$rr['from_']." - ".$rr['to_']."</td>";
														echo "<td>".$rr['hlevel_unitsearned']."</td>";
														echo "<td>".$rr['yeargrad']."</td>";
														echo "<td>".$rr['scho_honorrec']."</td>";
													echo "</tr>";
												}
												echo "<tr>";
													echo "<td colspan=20> <hr style='border: 0px;border-bottom: 1px solid #ccc;width: 50%;margin: 12px auto;'/> </td>";
												echo "</tr>";
											} else {
												echo "<tr>";
													echo "<td> no information found </td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td colspan=20> <hr style='border: 0px;border-bottom: 1px solid #ccc;width: 50%;margin: 12px auto;'/> </td>";
												echo "</tr>";
											}
										}
									?>
							</tbody>
						</table>
					</div>
