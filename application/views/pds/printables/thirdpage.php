<link rel='stylesheet' href='<?php echo base_url(); ?>/v2includes/pds/style/printstyle.css'/>
<h4> VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S </h4>
	<div class='marginit'>
		<table class='pi2'>
					<thead>
						<tr>
							<th rowspan="2" class='bgme'> 27 </th>
							<th rowspan="2" class='bgme'> NAME & ADDRESS OF ORGANIZATION </th>
							<th colspan="2" class='bgme'> INCLUSIVE DATES <br/>
								<small> (mm/dd/yyyy) </small>
							</th>
							<th rowspan="2" class='bgme'> NUMBER OF HOURS </th>
							<th rowspan="2" colspan="2" class='bgme'> POSITION / NATURE OF WORK </th>
						</tr>
						<tr>
							<th class='bgme'> from </th>
							<th class='bgme'> to </th>
						</tr>
					</thead>
					<tbody>
						<?php
							if (count($inv)>0) {
								$count = 0;
								foreach($inv as $i) {
									$to = date("m/d/Y", strtotime($i->to_));
									
									if ($i->to_ == "present") {
										$to = $i->to_;
									}
									
									$from = $i->from_;
									
									//date("m/d/Y", strtotime($i->from_));
									
									if (strlen($from)>7) {
										$from  = date("m/d/Y", strtotime($i->from_));
									}
									// 
									
									echo "<tr class='border_b educbgtd'>";
										echo "<td colspan='2' class='border_r' style='text-align:center;'> {$i->org} - {$i->addroforg} </td>";
										echo "<td class='border_r' style='text-align:center;'> ".$from."</td>";
										echo "<td class='border_r' style='text-align:center;'> ".$to."</td>";
										echo "<td class='border_r'> {$i->numofhrs} </td>";
										echo "<td> {$i->post_natofwork} </td>";
									echo "</tr>";
									$count++;
								}
								
								for($a = 0 ; $a <= 7-$count ; $a++) {
									echo "<tr class='border_b educbgtd'>";
										echo "<td colspan='2' class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r'> &nbsp; </td>";
										echo "<td> &nbsp; </td>";
									echo "</tr>";
								}
							} else {
								echo "<tr class='border_b educbgtd'>";
										echo "<td colspan='2' class='border_r' style='text-align:center;'> N/A </td>";
										echo "<td class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r'> &nbsp; </td>";
										echo "<td> &nbsp; </td>";
								echo "</tr>";
								for($a = 0 ; $a <= 6 ; $a++) {
									echo "<tr class='border_b educbgtd'>";
										echo "<td colspan='2' class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r' style='text-align:center;'> &nbsp; </td>";
										echo "<td class='border_r'> &nbsp; </td>";
										echo "<td> &nbsp; </td>";
									echo "</tr>";
								}
							}
							
							echo "<tr class='border_b educbgtd'>";
								echo "<td colspan=10> <p style='color:red; text-align:center; font-style:italic; font-size: 12px;'> (Continue on separate sheet if necessary) </p> </td>";								
							echo "</tr>";
						?>
					</tbody>
				</table>
				<h4> VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED </h4>
				<table class='pi2'>
					<thead>
						<tr>
							<th rowspan="2" class='bgme'> 27 </th>
							<th rowspan="2" class='bgme'> TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS 
								<br/> <small> (write in full) </small>
							</th>
							<th colspan="2" class='bgme'> INCLUSIVE DATES <br/>
								<small> (mm/dd/yyyy) </small>
							</th>
							<th rowspan="2" class='bgme'> NUMBER OF HOURS </th>
							<th rowspan="2" colspan="2" class='bgme'> Type of LD 
								<br/> <small>  ( Managerial/Supervisory/Technical/etc) </small>
							</th>
							<th rowspan="2" class='bgme'>  CONDUCTED/ SPONSORED BY 
								<br/> <small> (Write in full) </small>
							</th>
						</tr>
						<tr>
							<th class='bgme'> from </th>
							<th class='bgme'> to </th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(count($sems)>0) {
							// var_dump($sems);
								$count = 0;
								//foreach($sems as $s) {
								for($ss = 0 ; $ss <= count($sems)-1; $ss++) {
									if ($ss == count($sems)) {
										break;
									}
										echo "<tr class='border_b educbgtd'>";
											echo "<td colspan='2' class='border_r'> {$sems[$ss]->titleofprog} </td>";
											echo "<td class='border_r'>".date("m/d/Y", strtotime($sems[$ss]->from_))." </td>";
											echo "<td class='border_r'>".date("m/d/Y", strtotime($sems[$ss]->to_))."</td>";
											echo "<td class='border_r'> {$sems[$ss]->numofhrs} </td>";
											echo "<td colspan='2' class='border_r'> {$sems[$ss]->typeofsem} </td>";
											echo "<td> {$sems[$ss]->conductedby} </td>";
										echo "</tr>";
										
									//	unset($sems[$ss]);
										$count++;
									
								}
								
								for($x = 0; $x <= 21 - $count ; $x++) {
									echo "<tr class='border_b educbgtd'>";
										echo "<td colspan='2' class='border_r'> &nbsp; </td>";
										echo "<td class='border_r'>&nbsp;</td>";
										echo "<td class='border_r'>&nbsp;</td>";
										echo "<td class='border_r'>&nbsp;</td>";
										echo "<td colspan='2' class='border_r'>&nbsp;</td>";
										echo "<td>&nbsp;</td>";
									echo "</tr>";
								}
							} else {
								echo "<tr class='border_b educbgtd'>";
									echo "<td colspan='2' class='border_r'> N/A </td>";
									echo "<td class='border_r'>&nbsp;</td>";
									echo "<td class='border_r'>&nbsp;</td>";
									echo "<td class='border_r'>&nbsp;</td>";
									echo "<td colspan='2' class='border_r'>&nbsp;</td>";
									echo "<td>&nbsp;</td>";
								echo "</tr>";
								for($x = 0; $x <= 20 ; $x++) {
									echo "<tr class='border_b educbgtd'>";
										echo "<td colspan='2' class='border_r'> &nbsp; </td>";
										echo "<td class='border_r'>&nbsp;</td>";
										echo "<td class='border_r'>&nbsp;</td>";
										echo "<td class='border_r'>&nbsp;</td>";
										echo "<td colspan='2' class='border_r'>&nbsp;</td>";
										echo "<td>&nbsp;</td>";
									echo "</tr>";
								}
							}
							
								echo "<tr class='border_b educbgtd'>";
									echo "<td colspan=10> <p style='color:red; text-align:center; font-style:italic; font-size: 12px;'> (Continue on separate sheet if necessary) </p> </td>";
								echo "</tr>";
							
						?>
					</tbody>
				</table>
				<h4> VIII. OTHER INFORMATION </h4>
				<table class='pi2'>
					<thead>
						<tr>
							<th class="remborr bgme"> 31 </th>
							<th class='bgme'> SPECIAL SKILLS and HOBBIES </th>
							<th class="remborr bgme"> 32 </th>
							<th class='bgme'> NON-ACADEMIC DISTINCTIONS / RECOGNITION   <br/>
								<small> (Write in full) </small>
							</th>
							<th class="remborr bgme"> 33 </th>
							<th class='bgme'> MEMBERSHIP IN ASSOCIATION/ORGANIZATION 
								<br/> <small>  (Write in full) </small>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							foreach($oi as $o) {
								${$o->typeofoi}[] = (array) $o;
							}
							
							$count = 0;
							for($i = 0; $i <= count($oi)-1; $i++) {
								echo "<tr class='educbgtd border_b'>";
									// ssh 
									
										if(isset($ssh[$i])) {
											echo "<td colspan='2' class='border_r'>";
												echo $ssh[$i]['theinfo'];
											echo "</td>";
											$count++;
										}
									
									
									// nadr 
									
										if (isset($nadr[$i])) {
											echo "<td colspan='2' class='border_r'>";
												echo $nadr[$i]['theinfo'];
											echo "</td>";
											$count++;
										}
									
									
									// miao 
									
										if (isset($miao[$i])) {
											echo "<td colspan='2' class='border_r'>";
												echo $miao[$i]['theinfo'];
											echo "</td>";
											$count++;
										}
									
								echo "</tr>";
								
							}
							//echo $count;
							for($z = 0; $z<=7-$count;$z++) {
								echo "<tr class='educbgtd border_b'>";
									echo "<td colspan='2' class='border_r'> &nbsp; </td>";
									echo "<td colspan='2' class='border_r'> &nbsp; </td>";
									echo "<td colspan='2' class='border_r'> &nbsp; </td>";
								echo "</tr>";
							}
							
							echo "<tr class='educbgtd border_b'>";
								echo "<td colspan=10> <p style='color:red; text-align:center; font-style:italic; font-size: 12px;'> (Continue on separate sheet if necessary) </p> </td>";
							echo "</tr>";
						?>
						<tr class='border_t'>
							<th style='padding: 10px;' colspan='2' class='bgme'> SIGNATURE </th>
							<th colspan="2"> &nbsp; </th>
							<th colspan="" class='bgme'> DATE </th>
							<th colspan="10"> &nbsp; </th>
						</tr>
						
					</tbody>
				</table>
	</div>
<div class='page_break'> </div>