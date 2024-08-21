<link rel='stylesheet' href='<?php echo base_url(); ?>/v2includes/pds/style/printstyle.css'/>
<div class='marginit'>
<h4> IV. CIVIL SERVICE ELIGIBILITY </h4>
				<table class='pi2'>
					<thead>
						<tr>
							<th rowspan="2" class='remborr bgme'> 27 </th>
							<th rowspan="2" style='width: 285px;' class='bgme'> CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE/BARANGAY ELIGIBILITY/DRIVER'S LICENSE </th>
							<th rowspan="2" class='bgme'> RATING <br/>
								<small> (if applicable) </small>
							</th>
							<th rowspan="2" style='width: 135px;' class='bgme'> DATE OF EXAMINATION/CONFERMENT	</th>
							<th rowspan="2" class='bgme' style='width: 320px;'> PLACE OF EXAMINATION </th>
							<th colspan="2" class='bgme'> LICENSE <small> (if applicable) </small> </th>
						</tr>
						<tr>
							<th class='bgme'> NUMBER </th>
							<th class='bgme'> Date of Validity </th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$count = 0;
							foreach($el as $e) {
								echo "<tr class='border_b educbgtd'>";
									echo "<td colspan='2' class='border_r'> {$e->etype} </td>";
									echo "<td class='border_r'> {$e->rating} </td>";
									echo "<td class='border_r'> ".date("F d, Y", strtotime($e->dateofexam))."</td>";
									echo "<td class='border_r'> {$e->placeofexam} </td>";
									echo "<td class='border_r'> {$e->licnum} </td>";
									echo "<td class=''> {$e->dateofval} </td>";
								echo "</tr>";
								$count++;
							}
							
							for($o = 0 ; $o <= 7-$count ; $o++) {
								echo "<tr class='border_b educbgtd'>";
									echo "<td colspan='2' class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class=''> &nbsp; </td>";
								echo "</tr>";
							}
							
								echo "<tr class='border_b educbgtd'>";
									echo "<td colspan='10' class='border_r'> <p style='color:red; text-align:center; font-style:italic; font-size: 12px;'> (Continue on separate sheet if necessary) </p> </td>";
								echo "</tr>";
						?>
					</tbody>
				</table>
				<h4> V. WORK EXPERIENCE <br/> 
					<small style="font-size: 10px;"> (Include private employment.  Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet. </small>
				</h4>
				<table class='pi2'>
					<thead>
						<tr>
							<th rowspan="2" class='bgme'> 27 </th>
							<th colspan="2" style='width: 285px;' class='bgme'> INCLUSIVE DATES <br/> (mm/dd/yyyy) </th>
							<th rowspan="2" class='bgme'> POSITION TITLE <br/>
								<small> (write in full/do not abbreviate) </small>
							</th>
							<th rowspan="2" style='width: 285px;' class='bgme'> DEPARTMENT / AGENCY / OFFICE / COMPANY <br/>
								<small> (Write in full/Do not abbreviate) </small>
							</th>
							<th rowspan="2" class='bgme'> MONTHLY SALARY </th>
							<th rowspan="2" class='bgme'> SALARY/ JOB/ PAY GRADE (if applicable)& STEP  (Format "00-0")/ INCREMENT </th>
							<th rowspan='2' class='bgme'> STATUS OF APPOINTMENT </th>
							<th rowspan='2' class='bgme'> GOV'T SERVICE (Y/ N) </th>
						</tr>
						<tr>
							<th class='bgme'> from </th>
							<th class='bgme'> to </th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$count = 0;
							
							foreach($wp as $w) {
								$to__ = $w->to_;
								
								// date("m/d/Y", strtotime($w->to_));
						
								if ($w->to_ == "present") {
									$to__ = $w->to_;
								} else {
									if(strlen($to__)>7) {
										$to__ = date("m/d/Y", strtotime($w->to_));
									}
								}
								
								$from = $w->from_;
								// date("m/d/Y", strtotime($w->from_))
									
								if (strlen($from)>7){
									$from = date("m/d/Y", strtotime($w->from_));
								}
								
								echo "<tr class='border_b educbgtd'>";
									echo "<td>  </td>";
									echo "<td class='border_r'> ".$from."</td>";
									echo "<td class='border_r'> ".$to__."</td>";
									echo "<td class='border_r'> {$w->postitle} </td>";
									echo "<td class='border_r'> {$w->dept} </td>";
									echo "<td class='border_r'> {$w->monthsal} </td>";
									echo "<td class='border_r'> {$w->paygrade} </td>";
									echo "<td class='border_r'> {$w->statofapp} </td>";
									echo "<td class='border_r'> {$w->govserv} </td>";
								echo "</tr>";
								$count++;
							}
							
							for($u = 0; $u <= 28-$count; $u++) {
								echo "<tr class='border_b educbgtd'>";
									echo "<td>  </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
									echo "<td class='border_r'> &nbsp; </td>";
								echo "</tr>";
							}
							
							echo "<tr class='border_b educbgtd'>";
								echo "<td colspan=10> <p style='color:red; text-align:center; font-style:italic; font-size: 12px;'> (Continue on separate sheet if necessary) </p> </td>";
							echo "</tr>";	
								
						?>
						<tr class='border_t'>
							<th style='padding: 10px;' colspan="3" class='bgme'> SIGNATURE </th>
							<th colspan="3"> &nbsp; </th>
							<th colspan="" class='bgme'> DATE </th>
							<th colspan="10"> &nbsp; </th>
						</tr>
					</tbody>
				</table>
</div>
<div class='page_break'> </div>