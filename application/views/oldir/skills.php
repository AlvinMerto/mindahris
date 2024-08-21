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
								<tr> 
									<th style='text-align: left;'> Special Skill and hobbies </th>
								</tr>
									<?php
										if (count($ret['ssh']) > 0) {
											foreach($ret['ssh'] as $rr) {
												echo "<tr>";
													echo "<td> - ".$rr."</td>";
												echo "</tr>";
											}
										} else {
											echo "<tr>";
												echo "<td> no information found </td>";
											echo "</tr>";
										}
									?>
								<tr> 
									<th style='text-align: left;'> Membership in association / Organization </th>
								</tr>
									<?php
										if (count($ret['miao']) > 0) {
											foreach($ret['miao'] as $rr) {
												echo "<tr>";
													echo "<td> - ".$rr."</td>";
												echo "</tr>";
											}
										} else {
											echo "<tr>";
												echo "<td> no information found </td>";
											echo "</tr>";
										}
									?>
								<tr> 
									<th style='text-align: left;'> Non-Academic distinctions / recognition  </th>
								</tr>
									<?php
										if (count($ret['nadr']) > 0) {
											foreach($ret['nadr'] as $rr) {
												echo "<tr>";
													echo "<td> - ".$rr."</td>";
												echo "</tr>";
											}
										} else {
											echo "<tr>";
												echo "<td> no information found </td>";
											echo "</tr>";
										}
									?>
								<tr> 
									<th style='text-align: left;'> Unspecified  </th>
								</tr>
									<?php
										if (count($ret['unspec']) > 0) {
											foreach($ret['unspec'] as $rr) {
												echo "<tr>";
													echo "<td> - ".$rr."</td>";
												echo "</tr>";
											}
										} else {
											echo "<tr>";
												echo "<td> no information found </td>";
											echo "</tr>";
										}
									?>	
							</tbody>
						</table>
					</div>
