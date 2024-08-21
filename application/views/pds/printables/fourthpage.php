<link rel='stylesheet' href='<?php echo base_url(); ?>/v2includes/pds/style/printstyle.css'/>
<?php 
	for($a=1;$a<=12;$a++) {
		$txt 	 = "q".$a;
		${$txt}  = null;
		
	//	$dets 	 = "d".$a;
	//	${$dets} = null;
		${"dq".$a}  = null;
	}
	
	foreach($qs as $q) {
		${$q->fld} 		= $q->val_u;
		
		if ($q->val_u == "yes") {
			${"d".$q->fld}  = $q->details;
		}
	}
?>
				<table class='pi3'>
					<tbody>
						<tr>
							<td> 34. </td>
							<td class='border_r'>
								Are you related by consanguinity or affinity to the appointing or recommending authority, or to the			
								chief of bureau or office or to the person who has immediate supervision over you in the Office,
								Bureau or Department where you will be apppointed,
							</td>
							<td>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td> &nbsp; </td>
							<td class='border_r'>
								a. within the third degree?
							</td>
							<td>
								<input type='checkbox'<?php if($q1=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox'<?php if($q1=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'>
									<?php echo $dq1; ?>
								</div>
							</td>
						</tr>
						<tr class='border_b'>
							<td> &nbsp; </td>
							<td class='border_r'>
								b. within the fourth degree (for Local Government Unit - Career Employees)?
							</td>
							<td>
								<input type='checkbox' <?php if($q2=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q2=="no"){echo "checked";} ?>/> NO 
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'>
									<?php echo $dq2; ?>
								</div>
							</td>
						</tr>
					</tbody>
					<tbody>
						<tr>
							<td> 35. </td>
							<td class='border_r'>
								a. Have you ever been found guilty of any administrative offense?
							</td>
							<td>
								<input type='checkbox' <?php if($q3=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q3=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'>
									<?php echo $dq3; ?>
								</div>
							</td>
						</tr>
						<tr class="border_b">
							<td> &nbsp; </td>
							<td class='border_r'>
								b. Have you been criminally charged before any court?
							</td>
							<td>
								<input type='checkbox' <?php if($q4=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q4=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'>
									<?php echo $dq4; ?>
								</div>
							</td>
						</tr>
						<tr class='border_b'>
							<td> 36 </td>
							<td class='border_r'>
								Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
							</td>
							<td>
								<input type='checkbox' <?php if($q5=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q5=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq5; ?></div>
							</td>
						</tr>
					</tbody>
					<tbody>
						<tr class="border_b">
							<td> 37. </td>
							<td class='border_r'>
								Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?
							</td>
							<td>
								<input type='checkbox' <?php if($q6=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q6=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq6; ?></div>
							</td>
						</tr>
						<tr class="border_b">
							<td> 38. </td>
							<td class='border_r'>
								a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
							</td>
							<td>
								<input type='checkbox' <?php if($q7=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q7=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq7; ?></div>
							</td>
						</tr>
						<tr class='border_b'>
							<td> &nbsp; </td>
							<td class='border_r'>
								b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?
							</td>
							<td>
								<input type='checkbox' <?php if($q8=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q8=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq8; ?></div>
							</td>
						</tr>
					</tbody>
						<tbody>
						<tr class="border_b">
							<td> 39. </td>
							<td class='border_r'>
								Have you acquired the status of an immigrant or permanent resident of another country?
							</td>
							<td>
								<input type='checkbox' <?php if($q9=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q9=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq9; ?></div>
							</td>
						</tr>
						<tr>
							<td> 40. </td>
							<td class='border_r'>
								Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
							</td>
							<td>
								<!--input type='checkbox'/> yes 
								<input type='checkbox'/> no
								<br/>
								<p> if YES, give details: </p>
								<div class='detailsdiv border_b'><?php// echo $dq10; ?></div-->
							</td>
						</tr>
						<tr class=''>
							<td> a. </td>
							<td class='border_r'>
								Are you a member of any indigenous group?
							</td>
							<td>
								<input type='checkbox' <?php if($q10=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q10=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq10; ?></div>
							</td>
						</tr>
						<tr>
							<td> b. </td>
							<td class='border_r'>
								Are you a person with disability?
							</td>
							<td>
								<input type='checkbox' <?php if($q11=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q11=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq11; ?></div>
							</td>
						</tr>
						<tr class=''>
							<td> c. </td>
							<td class='border_r'>
								Are you a solo parent?
							</td>
							<td>
								<input type='checkbox' <?php if($q12=="yes"){echo "checked";} ?>/> YES 
								<input type='checkbox' <?php if($q12=="no"){echo "checked";} ?>/> NO
								<br/>
								<p> If YES, give details: </p>
								<div class='detailsdiv border_b'><?php echo $dq12; ?> </div>
							</td>
						</tr>
					</tbody>
				</table>
				<table class='pi4'>
					<tr>
						<td style='width: 78%;vertical-align: top;'>
							<table class='intbl'>
								<tr>
									<td colspan="3"> 41. REFERENCES <small>(Person not related by consangyunity or affinity to applicant/appointee)</small> </td>
								</tr>
								<tr>
									<td style='text-align:center;'> NAME </td>
									<td> ADDRESS </td>
									<td> TEL. NO. </td>
								</tr>
								<tbody>
									<?php 
										asort($ref);
										$count = count($ref)-1;
										$until = 0;
										do {
											echo "<tr>";
												echo "<td>";
													echo @$ref[$count]->name;
												echo "</td>";
												echo "<td>";
													echo @$ref[$count]->addr;
												echo "</td>";
												echo "<td>";
													echo @$ref[$count]->telnum;
												echo "</td>";
											echo "</tr>";
											$count--;
											$until++;
										} while($until <= 2)
									?>
									<tr>
										<td colspan="3" style='padding: 3px;'> 
											I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, corrent and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. I agree that any misrepresentation amde in this document and its attachmetns shall cause the filing of administrative/criminal case/s against me.
										</td>
									</tr>
								</tbody>
							</table>
							<table class='inbelowtbl'>
								<tr>
									<td> 
										<?php // echo count($id)."<br/>"; echo count($id)-1; ?>
										<div class='govid'>
											<p> Government Issued ID <small> (i.e. Passport, GSIS, SSS, PRC, Driver's License, etc.) </small> PLEASE INDICATE ID Number and Date of Issuance</p>
											<p> Government issued ID: <span> <?php echo @$id[count($id)-1]->issuedid; ?> </span> </p>
											<p> ID/License/Passport No.: <span> <?php echo @$id[count($id)-1]->idnum; ?> </span> </p>
											<p> Date/Place of issuance: <span> <?php echo @$id[count($id)-1]->placeofiss; ?> </span> </p>
										</div>
									</td>
									<td> 
										<div class='signdiv'>
											<div class='signbotdiv'>
												<p style='margin-bottom: 28px;'> Signature (Sign inside the box) </p>
												<p> Date Accomplished </p>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</td>
						<td style='width: 25%;vertical-align: top;'>
							<div class='idpicture'>
								<p> ID picture taken within the last 6 months 4.5 cm. X 3.5 cm <br/>(passport size) <br/><br/>
									<small> Computer generated or photocopied picture is not acceptable</small>
								</p>
							</div>

							<div class='rthumb'>
								<p> Right Thumbmark </p>
							</div>	
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<p class='sworntxt'> SUBSCRIBED AND SWORN to before me this <span style='border-bottom:1px solid #333;'> &nbsp; </span> , affiant exhibiting his/her validly issued government ID as indicated above.</p>
							<div class='pao'>
								<p class='border_t'> Person Administering Oath </p>
							</div>
						</td>
					</tr>
					
				</table>
			</div>
		</div>
	</body>
</html>
