<html>
	<head>
		<!--link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'/-->
		<link rel='stylesheet' href='<?php echo base_url(); ?>/v2includes/pds/style/printstyle.css'/>
	</head>
	<body>
	<?php // var_dump($pifb); ?>
		<div class='pdswrap'>
			<div class='headwrap'>
				<p class='cf'> CS Form No. 212 </p>
				<p class='revnum'> Revised 2017 </p>
				<h3> PERSONAL DATA SHEET </h3>
				<p class='war'> WARNING: Any misrepresentation made in the PErsonal Data Sheet and the Work Experience Sheet shall cause the filling of administrative/criminal case/s against the person concerned.</p>
				<p class='g1'> READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (pds) BEFORE ACCOMPLISHING THE PDS FORM. </p>
				
				<p class='pl'> Print Legibly. Tick the appropriate boxes (  ) and use separate sheet if necessary. Indicate N/A if not applicable. DO NOT ABBREVIATE 
					<g> <small class='csid'> <i> 1. CS. ID. No. </i>  </small> <i class='df'> (Do not fill up. For CSC use only) </i> </g> </p>
			</div>
			<div class='bodywrap'>
				<h4> I. PERSONAL INFORMATION </h4>
				<table class='pnew1'>
					<tr>
						<td class='bgme'> 2 </td>
						<td class='bgme'> SURNAME </td>
						<td colspan="20"> <?php echo @$pifb[0]->surname; ?> </td>
					</tr>
					<tr> 
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> FIRST NAME </td>
						<td colspan="17" style="width:100px;"> <?php echo @$pifb[0]->firstname; ?> </td>
						<td colspan="3" class='bgme'> 
							NAME EXTENSION (JR, SR)
							<p> <?php echo @$pifb[0]->nameext; ?> </p>
						</td>
					</tr>
					<tr> 
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> MIDDLE NAME </td>
						<td colspan="20"> <?php echo @$pifb[0]->midname; ?> </td>
					</tr>
					<tr>
						<td class='bgme'> 3 </td>
						<td class='bgme'> DATE OF BIRTH </td>
						<td colspan="" style='width: 15%;'> <?php echo date("F d, Y", strtotime( @$pifb[0]->dateofbirth )); ?> </td>
						<td rowspan="" class="verttop bgme"> 
							16. CITIZENSHIP
						</td>
						<td colspan="10" style='border-right: 1px solid #fff !important;'>
							<!--input type='checkbox' <?php // if ($pifb[0]->isfilipino == true){echo"checked";} ?>/> Filipino-->
							<?php if ($pifb[0]->isfilipino == true){echo "<input type='checkbox' checked/> Filipino";} ?>
						</td>
						<td colspan="10" class='paddtop'>
							<input type='checkbox'/> Dual Citizenship <br/>
							<input type="checkbox" name="" <?php if (@$pifb[0]->bybirth == true){echo"checked";} ?>> By Birth 
							<input type="checkbox" name="" <?php if (@$pifb[0]->bycit == true){echo"checked";} ?>> By Naturalization
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> PLACE OF BIRTH </td>
						<td colspan=""> <?php echo @$pifb[0]->placeofbirth; ?> </td>
						<td rowspan="2" class='bgme'>
							if holder of dual citizenship, please indicate the details
						</td>
						<td rowspan="2" colspan="20" style='padding:0px;'>
							<?php  
								echo "<select style='width: 100%; padding: 10px 0px; border: none; outline: none;'>";
									echo "<option>".@$pifb[0]->dualcity."</option>"; 
								echo "</select>";
								?>
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> SEX </td>
						<td colspan="" class='paddtop'>
							<?php
								// @$pifb[0]->sex; ?>
							<input type='checkbox' <?php if (@$pifb[0]->sex == "male"){echo"checked";} ?>/> Male
							<input type='checkbox' <?php if (@$pifb[0]->sex == "female"){echo"checked";} ?>/> Female
						</td>
					</tr>
					<tr>
						<td colspan="" rowspan="4" class='bgme'> &nbsp; </td>
						<td colspan="" rowspan="4" class="verttop bgme"> CIVIL STATUS </td>
						<td colspan="" rowspan="4" class="verttop paddtop">
							<?php // echo @$pifb[0]->civilstat; ?>
							<table class='twotdtbl'>
								<tr>
									<td> <input type='checkbox' <?php if ($pifb[0]->civilstat == "single"){echo"checked";} ?>/> Single </td>
									<td> <input type='checkbox' <?php if ($pifb[0]->civilstat == "married"){echo"checked";} ?>/> Married </td>
								</tr>
								<tr>
									<td> <input type='checkbox' <?php if ($pifb[0]->civilstat == "widowed"){echo"checked";} ?>/> Widowed </td>
									<td> <input type='checkbox' <?php if ($pifb[0]->civilstat == "separated"){echo"checked";} ?>/> Separated </td>
								</tr>
								<tr>
									<td> <input type='checkbox' <?php if ($pifb[0]->civilstat == "other"){echo"checked";} ?>/> Other/s: </td>
									<td> &nbsp; </td>
								</tr>
							</table>
						</td>
						<td rowspan="4" class='verttop bgme'>
							17. RESIDENTIAL ADDRESS
						</td>
					</tr>
					<?php
						foreach($addr as $ad) {
							${$ad->addrtype} = $ad;
						}
					?>
							<tr>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'><?php echo @$residential->houseblklot; ?></div>
									<p class='bgme botcap'> HOUSE/BLOCK/LOT NO. </p>
								</td>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$residential->street; ?> </div>
									<p class='bgme botcap'> Street </p>
								</td>
							</tr>
							<tr>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$residential->subdvill; ?> </div>
									<p class='bgme botcap'> Subdivision/Village </p>
								</td>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$residential->brgy; ?> </div>
									<p class='bgme botcap'> Barangay </p>
								</td>
							</tr>
							<tr>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$residential->city; ?> </div>
									<p class='bgme botcap'> City/Municipality </p>
								</td>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$residential->prov; ?> </div>
									<p class='bgme botcap'> Province </p>
								</td>
							</tr>	
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> HEIGHT (m) </td>
						<td> <?php echo @$pifb[0]->height; ?>m</td>
						<td rowspan="2" class='bgme'> 
							ZIP CODE
						</td>
						<td colspan="20" rowspan="2"> 
							<?php echo @$residential->zcode; ?>
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> WEIGHT (kg) </td>
						<td> <?php echo @$pifb[0]->weight; ?>kg </td>
					</tr>
					<tr>
						<td rowspan="4" class='bgme'> &nbsp; </td>
						<td rowspan="4" class='bgme'> BLOOD TYPE </td>
						<td rowspan="4" > <?php echo @$pifb[0]->bloodtype; ?> </td>
						<td rowspan="4" class='verttop bgme'>
							18. PERMANENT ADDRESS
						</td>
					</tr>

							<tr>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$permanent->houseblklot; ?> </div>
									<p class='bgme botcap'> HOUSE/BLOCK/LOT NO. </p>
								</td>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$permanent->street; ?> </div>
									<p class='bgme botcap'> Street </p>
								</td>
							</tr>
							<tr>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$permanent->subdvill; ?> </div>
									<p class='bgme botcap'> Subdivision/Village </p>
								</td>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$permanent->brgy; ?> </div>
									<p class='bgme botcap'> Barangay </p>
								</td>
							</tr>
							<tr>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$permanent->city; ?>  </div>
									<p class='bgme botcap'> City/Municipality </p>
								</td>
								<td colspan="10" class='centerit width50px remborr rempad'> 
									<div class='detailsdiv'> <?php echo @$permanent->prov; ?> </div>
									<p class='bgme botcap'> Province </p>
								</td>
							</tr>	

					<tr>	
						<td class='bgme'> 10. </td>
						<td class='bgme'> GSIS ID NO. </td>
						<td> <?php echo @$pifb[0]->gsisnum; ?> </td>
						<td rowspan="3"> 
							Zip Code
						</td>
						<td rowspan="3" colspan="20"> <?php echo @$permanent->zcode; ?> </td>
					</tr>
					<tr>	
						<td class='bgme'> 11. </td>
						<td class='bgme'> PAG-IBIG ID NO. </td>
						<td> <?php echo @$pifb[0]->lovenum; ?> </td>
					</tr>
					<tr>	
						<td class='bgme'> 12. </td>
						<td class='bgme'> PHILHEALTH NO. </td>
						<td> <?php echo @$pifb[0]->philhnum; ?> </td>
					</tr>
					<tr>	
						<td class='bgme'> 13. </td>
						<td class='bgme'> SSS NO. </td>
						<td> <?php echo @$pifb[0]->sssnum; ?> </td>
						<td> 19. TELEPHONE NO. </td>
						<td colspan="20"> <?php echo @$pifb[0]->pitelnum; ?> </td>
					</tr>
					<tr>	
						<td class='bgme'> 14. </td>
						<td class='bgme'> TIN </td>
						<td> <?php echo @$pifb[0]->tin; ?> </td>
						<td> 20. MOBILE NO. </td>
						<td colspan="20"> <?php echo @$pifb[0]->mobnum; ?> </td>
					</tr>
					<tr>	
						<td class='bgme'> 15. </td>
						<td class='bgme'> AGENCY EMPLOYEE NO. </td>
						<td> <?php echo @$pifb[0]->empnum; ?> </td>
						<td> 21. E-MAIL ADDRESS (if any) </td>
						<td colspan="20"><?php echo @$pifb[0]->emailadd; ?></td>
					</tr>
				</table>
				<h4> II. FAMILY BACKGROUND </h4>
				<table class='pi1'>
					<tr>
						<td class='bgme'> 22 </td>
						<td class='bgme'> SPOUSE'S SURNAME </td>
						<td> <?php echo @$pifb[0]->sp_surname; ?> </td>
						<td rowspan="15" class='ftbl' style='background: #eaeaea;'> 
							<table class='innertbl fulltbl halftd'> 
								<tr class='border_b'>
									<td class="border_r bgme"> 23. NAME of CHILDREN </td>
									<td class='bgme'> DATE OF BIRTH (mm/dd/yyyy) </td>
								</tr>
								<?php 
									if (count($chr)>0) {
										$count = 0;
										foreach($chr as $c) {
											echo "<tr class='border_b' style='background: #fff;'>";
												echo "<td class='border_r' style='background: #fff;'>".@$c->childname."</td>";
												echo "<td style='background: #fff;'>".date("F d, Y", strtotime(@$c->childbdate))."</td>";
											echo "</tr>";
											$count++;
										}
										
										for($i = 0; $i <= 12-$count; $i++) {
											echo "<tr class='border_b' style='background: #fff;'>";
												echo "<td class='border_r' style='background: #fff;'>&nbsp;</td>";
												echo "<td style='background: #fff;'>&nbsp;</td>";
											echo "</tr>";
										}
										
										echo "<tr class='border_b' style='background: #fff;'>";
											echo "<td class='border_r' style='background: #fff;' colspan=2> <p style='color:red; text-align:center; font-style:italic;'> (Continue on separate sheet if necessary) </p> </td>";
										echo "</tr>";
									} else {
										echo "<tr class='border_b' style='background: #fff;'>";
											echo "<td class='border_r' style='background: #fff;'> N/A </td>";
											echo "<td style='background: #fff;'>&nbsp;</td>";
										echo "</tr>";
										
										for($i = 0; $i <= 11; $i++) {
											echo "<tr class='border_b' style='background: #fff;'>";
												echo "<td class='border_r' style='background: #fff;'>&nbsp;</td>";
												echo "<td style='background: #fff;'>&nbsp;</td>";
											echo "</tr>";
										}
									}
									
									echo "<tr class='border_b' style='background: #fff;'>";
										echo "<td class='border_r' style='background: #fff;' colspan=2> <p style='color:red; text-align:center; font-style:italic;'> (Continue on separate sheet if necessary) </p> </td>";
									echo "</tr>";
								?>
								
							</table>
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> SPOUSE'S FIRST NAME </td>
						<td> <?php echo @$pifb[0]->sp_fname; ?>
							<div class='insertdiv floarright border_l paddleft paddright bgme'>
								<small>NAME EXTENSION (JR, SR)</small>
								<p> <?php echo @$pifb[0]->sp_n_ext; ?> </p>
							</div>
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> SPOUSE'S MIDDLE NAME </td>
						<td> <?php echo @$pifb[0]->sp_mname; ?> </td>
					</tr>
				<!-- below -->
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> OCCUPATION </td>
						<td> <?php echo @$pifb[0]->occupation; ?> </td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> EMPLOYER/BUSINESS NAME </td>
						<td> <?php echo @$pifb[0]->empbname; ?> </td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> BUSINESS ADDRESS </td>
						<td> <?php echo @$pifb[0]->baddr; ?> </td>
					</tr>
					<!--tr>
						<td> &nbsp; </td>
						<td> BUSINESS ADDRESS </td>
						<td> &nbsp; </td>
					</tr-->
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> TELEPHONE NO. </td>
						<td> <?php echo $pifb[0]->fbtelnum; ?> </td>
					</tr>
					<tr>
						<td class='bgme'> 24 </td>
						<td class='bgme'> FATHER'S SURNAME </td>
						<td> <?php echo @$pifb[0]->fsurname; ?> </td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> FIRST NAME </td>
						<td> <?php echo @$pifb[0]->ffirstname; ?> 
							<div class='insertdiv floarright border_l paddleft paddright bgme'>
								<small>NAME EXTENSION (JR, SR)</small>
								<p> <?php echo @$pifb[0]->fnameext; ?> </p>
							</div>
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> MIDDLE NAME </td>
						<td> <?php echo @$pifb[0]->fmidname; ?> </td>
					</tr>
					<tr>
						<td class='bgme'> 25 </td>
						<td class='bgme'> MOTHER'S MAIDEN NAME </td>
						<td> <?php  ?> </td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> SURNAME </td>
						<td> <?php echo @$pifb[0]->msurname; ?>
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> FIRST NAME </td>
						<td> <?php echo @$pifb[0]->mfirstname; ?>
						</td>
					</tr>
					<tr>
						<td class='bgme'> &nbsp; </td>
						<td class='bgme'> MIDDLE NAME </td>
						<td> <?php echo @$pifb[0]->mmidname; ?> </td>
					</tr>
				</table>
				<h4> III. EDUCATIONAL BACKGROUND </h4>
				<table class='pi2'>
					<thead>
						<tr>
							<th rowspan="2" class='remborr bgme'> 26 </th>
							<th rowspan="2" class='bgme'> LEVEL </th>
							<th rowspan="2" style='width: 700px;' class='bgme'> NAME OF SCHOOL <br/>
								<small> Write in full </small>
							</th>
							<th rowspan="2" style='' class='bgme'> BASIC EDUCATION / DEGREE / COURSE <br/>
								<small> Write in full </small>
							</th>
							<th colspan="2" class='bgme'> PERIOD OF ATTENDANCE </th>
							<th rowspan="2" class='bgme'> HIGHEST LEVEL / UNITS EARNED <br/>
								<small> (if not graduated) </small>
							</th>
							<th rowspan="2" class='bgme'> YEAR GRADUATED </th>
							<th rowspan="2" class='bgme'> SCHOLARSHIP / ACADEMIC HONORS RECEIVED </th>
						</tr>
						<tr class=''> 
							<th style='width: 50px;' class='bgme'> From </th>
							<th style='width: 50px;' class='bgme'> to </th>
						</tr>
					</thead>
					<tbody>
						<?php
							// var_dump($educbg);
							$educttype = ["elementary"=>"ELEMENTARY",
										  "secondary"=> "SECONDARY",
										  "voctrd"	 => "VOCATIONAL/TRADE COURSE",
										  "college"	 => "COLLEGE",
										  "gradstud" => "GRADUATE STUDIES"];
							$posted = [];
							$indecestoremove = [];
							
							foreach($educttype as $key => $e) {
								$bypass = false;
								echo "<tr class='border_b educbgtd'>";
									echo "<td class='border_r bgme' colspan='2' style='text-align:center;'> {$e} </td>";
									$index = 0;
										foreach($educbg as $eb) {
											if ($key == $eb->educbgtype && !in_array($key,$posted)) {
												
												array_push($posted,$key);
												$fromyear = date("Y",strtotime($eb->from_));
												$toyear   = date("Y",strtotime($eb->to_));
												
											//	if ($fromyear == "1900") { $fromyear = null; }
											//	if ($toyear == "1900") { $toyear = null; }
												
												echo "<td class='border_r'> {$eb->nameofsch} </td>";
												echo "<td class='border_r'> {$eb->course} </td>";
												echo "<td class='border_r'> ".$eb->from_." </td>";
												echo "<td class='border_r'> ".$eb->to_." </td>";
												echo "<td class='border_r'> {$eb->hlevel_unitsearned} </td>";
												echo "<td class='border_r'> {$eb->yeargrad} </td>";
												echo "<td class='border_r'> {$eb->scho_honorrec} </td>";
												array_push($indecestoremove,$index);
												
												$bypass = false;
												break;
											} else {
												$bypass = true;
											}
										
											$index++;
										}
										
										if ($bypass == true) {
											echo "<td class='border_r'> &nbsp; </td>";
											echo "<td class='border_r'> &nbsp; </td>";
											echo "<td class='border_r'> &nbsp; </td>";
											echo "<td class='border_r'> &nbsp; </td>";
											echo "<td class='border_r'> &nbsp; </td>";
											echo "<td class='border_r'> &nbsp; </td>";
											echo "<td class='border_r'> &nbsp; </td>";
										}
								echo "</tr>";
							}
						?>
						<tr>
							<td colspan=10> <p style='color:red; text-align:center; font-style:italic; font-size: 12px;'> (Continue on separate sheet if necessary) </p> </td>
						</tr>
					</tbody>
					<tbody>
						<!--tr>
							<td> &nbsp; </td>
						</tr-->
						<tr class='border_t'>
							<!--th class='remborr bgme' > &nbsp; </th-->
							<th style='padding: 10px;' class='bgme' colspan='2'> SIGNATURE </th>
							<th colspan="2"> &nbsp; </th>
							<th colspan="2" class='bgme'> DATE </th>
							<th colspan="10"> &nbsp; </th>
						</tr>
					</tbody>
				</table>

				<div class='page_break'> </div>
				
				<?php 
					$tosepsheet = [];
					for($e = 0; $e <= count($educbg)-1; $e++) {
						if (!in_array($e,$indecestoremove)) {
							array_push($tosepsheet,$educbg[$e]);
						}
					}
					
					/*
					if (count($tosepsheet) > 0) {
						$ccnt = count($tosepsheet)/40;
						if ($ccnt > 1) {
							
						}
					}
					*/
				if (count($tosepsheet)>0) {
					$this->load->view("pds/printables/separatesheets/edulist.php",["data" => $tosepsheet]); 
				}
				?>