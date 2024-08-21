<h6 class='headertext' data-boxbelong="personalinformation" id='headertext'> Personal Information </h6>
<hr/>
<?php 
	$sname  = null;
	$fname  = null;
	$n_ext  = null;
	$mname  = null;
	$dbirth = null;
	$pbirth = null;
	$height = null;
	$weight = null;
	$btype  = null;
	$gsis   = null;
	$love   = null;
	$phic   = null;
	$sssn   = null;
	$btin   = null;
	$empnum = null;
	$telno  = null;
	$mobno  = null;
	$eadd   = null;
	$sex    = null;
	$civstat  = null;
	$dualcity = null;
	$isfil    = null;
	$bybirth  = null; 
	$bycit 	  = null;
	
	if (count($details) > 0) {
		$sname  = $details[0]->surname;
		$fname  = $details[0]->firstname;
		$n_ext  = $details[0]->nameext;
		$mname  = $details[0]->midname;
		$dbirth = $details[0]->dateofbirth;
		$pbirth = $details[0]->placeofbirth;
		$height = $details[0]->height;
		$weight = $details[0]->weight;
		$btype  = $details[0]->bloodtype;
		$gsis   = $details[0]->gsisnum;
		$love   = $details[0]->lovenum;
		$phic   = $details[0]->philhnum;
		$sssn   = $details[0]->sssnum;
		$btin   = $details[0]->tin;
		$empnum = $details[0]->empnum;
		$telno  = $details[0]->telnum;
		$mobno  = $details[0]->mobnum;
		$eadd   = $details[0]->emailadd;
		$sex    = $details[0]->sex;
		$civstat = $details[0]->civilstat;
		$dualcity = $details[0]->dualcity;
		$isfil    = $details[0]->isfilipino;
		$bybirth  = $details[0]->bybirth;
		$bycit 	  = $details[0]->bycit;
	}
?>
							<div class='col-md-12 inputdiv fullwidth removepadright'>
								<h4 class='subhead'> About You </h4>
								<p> Surname </p>
								<input type='text' class='boxprocs' id='surname' value='<?php echo $sname; ?>'/>
							</div>
							<div class='row'>
								<div class='col-md-6'>
									<div class='inputdiv fullwidth'>
										<p> First name </p>
										<input type='text' class='boxprocs' id='firstname' value='<?php echo $fname; ?>'/>
									</div>
								</div>
								<div class='col-md-6 removepad'>
									<div class='inputdiv fullwidth'>
										<p> Name Extension (<small> use space if you don't have one </small>) </p>
										<input type='text' class='boxprocs' id='nameext' value='<?php echo $n_ext; ?>'/>
									</div>
								</div>
							</div>

							<div class='row'>
								<div class='col-md-6'>
									<div class='inputdiv fullwidth'>
										<p> Middle Name </p>
										<input type='text' class='boxprocs' id='midname' value='<?php echo $mname; ?>'/>
									</div>
									<div class='inputdiv fullwidth'>
										<p> Date of Birth</p>
										<input type='date' class='boxprocs' id='dateofbirth' value='<?php echo $dbirth; ?>'/>
									</div>
									<div class='inputdiv fullwidth'>
										<p> Place of birth </p>
										<textarea class='boxprocs' id='placeofbirth'><?php echo $pbirth; ?></textarea>
									</div>

									<div class='row'>
										<div class='col-md-6 removepadleft'>
											<div class='inputdiv fullwidth'>
												<p> Sex </p>
												<select class='btn btn-default selecttype' id='sex'>
													<option>--select-- </option>
													<option value='male' <?php if($sex == "male") { echo "selected"; } ?>> Male </option>
													<option value='female' <?php if($sex == "female") { echo "selected"; } ?>> Female </option>
												</select>
											</div>
										</div>
										<div class='col-md-6 removepad'>
											<div class='inputdiv fullwidth'>
												<p> Civil Status </p>
												<select class='btn btn-default selecttype' id='civilstat'>
													<option>--select-- </option>
													<option value='single' <?php if ($civstat == 'single'){echo "selected";} ?>> Single </option>
													<option value='widowed' <?php if ($civstat == 'widowed'){echo "selected";} ?>> Widowed </option>
													<option value='married' <?php if ($civstat == 'married'){echo "selected";} ?>> Married </option>
													<option value='separated' <?php if ($civstat == 'separated'){echo "selected";} ?>> Separated </option>
													<option value='other' <?php if ($civstat == 'other'){echo "selected";} ?>> Other </option>
												</select>
											</div>
										</div>
									</div>

									<div class='row'>
										<div class='col-md-4 removepadleft'>
											<div class='inputdiv fullwidth'>
												<p> Height (m) </p>
												<input type='text' class='boxprocs' id='height' value='<?php echo $height; ?>'/>
											</div>
										</div>
										<div class='col-md-4 removepadleft'>
											<div class='inputdiv fullwidth'>
												<p> Weight (kgs) </p>
												<input type='text' class='boxprocs' id='weight' value='<?php echo $weight; ?>'/>
											</div>											
										</div>
										<div class='col-md-4 removepad'>
											<div class='inputdiv fullwidth'>
												<p> Bloodtype </p>
												<input type='text' class='boxprocs' id='bloodtype' value='<?php echo $btype; ?>'/>
											</div>
										</div>
									</div>

									<hr/>
									<h4 class='subhead'> Government ID </h4>
									<div class='inputdiv fullwidth'>
										<p> GSIS No. </p>
										<input type='text' class='boxprocs' id='gsisnum' value='<?php echo $gsis; ?>'/>
									</div>
									<div class='inputdiv fullwidth'>
										<p> Pagibig No. </p>
										<input type='text' class='boxprocs' id='lovenum' value='<?php echo $love; ?>'/>
									</div>
									<div class='inputdiv fullwidth'>
										<p> Philhealth No. </p>
										<input type='text' class='boxprocs' id='philhnum' value='<?php echo $phic; ?>'/>
									</div>
									<div class='inputdiv fullwidth'>
										<p> SSS No. </p>
										<input type='text' class='boxprocs' id='sssnum' value='<?php echo $sssn; ?>'/>
									</div>
									<div class='inputdiv fullwidth'>
										<p> T.I.N. </p>
										<input type='text' class='boxprocs' id='tin' value='<?php echo $btin; ?>'/>
									</div>
									<div class='inputdiv fullwidth'>
										<p> Agency Employee No. </p>
										<input type='text' class='boxprocs' id='empnum' value='<?php echo $empnum; ?>'/>
									</div>
									<hr/>
								</div>

								<div class='col-md-6'>
									<hr/>
									<h4 class='subhead'> Contact Information </h4>
									<div class='row'>
										<div class='col-md-6 removepadleft'>
											<div class='inputdiv fullwidth'>
												<p> Telephone No. </p>
												<input type="text" class='boxprocs' id='telnum' value='<?php echo $telno; ?>'/>
											</div>
										</div>
										<div class='col-md-6 removepad'>
											<div class='inputdiv fullwidth'>
												<p> Mobile No. </p>
												<input type="text" class='boxprocs' id='mobnum' value='<?php echo $mobno; ?>'/>
											</div>
										</div>
									</div>

									<div class='inputdiv fullwidth'>
										<p> Email Address </p>
										<input type="text" class='boxprocs' id='emailadd' value='<?php echo $eadd; ?>'/>
									</div>
									<hr/>
									<div class='inputdiv fullwidth'>
										<h4 class='subhead'> Citizenship </h4>
										<ol class='citizenshipselect'>
											<label> <li> <input type='checkbox' class='chckbox' id='isfilipino' <?php if ($isfil == true){echo"checked";} ?>/> Filipino </li> </label> 
											<label> <li> <input type='checkbox' class='chckbox' id='isdual' <?php $display = null; if ($bybirth == true || $bycit == true){ $display = "style=display:block;"; echo"checked";} ?>/> Dual Citizenship </li> </label> 
										</ol>
										<div class='disappearing wrapbox' <?php echo $display; ?>>
											<div class='actchcksel'>
												<?php  ?>
												<label for='bybirth'> <input type='checkbox' class='chckbox' id='bybirth' <?php if ($bybirth == true){echo"checked";} ?>/> By Birth </label>
											</div>
											<hr style="margin: 4px 0px;">
											<div class='actchcksel'>
												<label for='bycit'> <input type='checkbox' class='chckbox' id='bycit' <?php if ($bycit == true){echo"checked";} ?>/> By Citizenship </label>	
											</div>
											<hr style="margin: 4px 0px 13px">
											<div class='actchcksel'>
												<p> Please indicate the country: </p>
												<select class='btn btn-default selecttype' id='dualcity'>
													<?php $countries = ["Afghanistan",
																		"Albania",
																		"Algeria",
																		"Andorra",
																		"Angola",
																		"Antigua and Barbuda",
																		"Argentina",
																		"Armenia",
																		"Australia",
																		"Austria",
																		"Azerbaijan",
																		"Bahamas",
																		"Bahrain",
																		"Bangladesh",
																		"Barbados",
																		"Belarus",
																		"Belgium",
																		"Belize",
																		"Benin",
																		"Bhutan",
																		"Bolivia",
																		"Bosnia and Herzegovina",
																		"Botswana",
																		"Brazil",
																		"Brunei",
																		"Bulgaria",
																		"Burkina Faso",
																		"Burundi",
																		"Cabo Verde",
																		"Cambodia",
																		"Cameroon",
																		"Canada",
																		"Central African Republic (CAR)",
																		"Chad",
																		"Chile",
																		"China",
																		"Colombia",
																		"Comoros",
																		"Congo, Democratic Republic of the",
																		"Congo, Republic of the",
																		"Costa Rica",
																		"Cote dIvoire",
																		"Croatia",
																		"Cuba",
																		"Cyprus",
																		"Czechia",
																		"Denmark",
																		"Djibouti",
																		"Dominica",
																		"Dominican Republic",
																		"Ecuador",
																		"Egypt",
																		"El Salvador",
																		"Equatorial Guinea",
																		"Eritrea",
																		"Estonia",
																		"Eswatini (formerly Swaziland)",
																		"Ethiopia",
																		"Fiji",
																		"Finland",
																		"France",
																		"Gabon",
																		"Gambia",
																		"Georgia",
																		"Germany",
																		"Ghana",
																		"Greece",
																		"Grenada",
																		"Guatemala",
																		"Guinea",
																		"Guinea-Bissau",
																		"Guyana",
																		"Haiti",
																		"Honduras",
																		"Hungary",
																		"Iceland",
																		"India",
																		"Indonesia",
																		"Iran",
																		"Iraq",
																		"Ireland",
																		"Israel",
																		"Italy",
																		"Jamaica",
																		"Japan",
																		"Jordan",
																		"Kazakhstan",
																		"Kenya",
																		"Kiribati",
																		"Kosovo",
																		"Kuwait",
																		"Kyrgyzstan",
																		"Laos",
																		"Latvia",
																		"Lebanon",
																		"Lesotho",
																		"Liberia",
																		"Libya",
																		"Liechtenstein",
																		"Lithuania",
																		"Luxembourg",
																		"Madagascar",
																		"Malawi",
																		"Malaysia",
																		"Maldives",
																		"Mali",
																		"Malta",
																		"Marshall Islands",
																		"Mauritania",
																		"Mauritius",
																		"Mexico",
																		"Micronesia",
																		"Moldova",
																		"Monaco",
																		"Mongolia",
																		"Montenegro",
																		"Morocco",
																		"Mozambique",
																		"Myanmar (formerly Burma)",
																		"Namibia",
																		"Nauru",
																		"Nepal",
																		"Netherlands",
																		"New Zealand",
																		"Nicaragua",
																		"Niger",
																		"Nigeria",
																		"North Korea",
																		"North Macedonia (formerly Macedonia)",
																		"Norway",
																		"Oman",
																		"Pakistan",
																		"Palau",
																		"Palestine",
																		"Panama",
																		"Papua New Guinea",
																		"Paraguay",
																		"Peru",
																		"Philippines",
																		"Poland",
																		"Portugal",
																		"Qatar",
																		"Romania",
																		"Russia",
																		"Rwanda",
																		"Saint Kitts and Nevis",
																		"Saint Lucia",
																		"Saint Vincent and the Grenadines",
																		"Samoa",
																		"San Marino",
																		"Sao Tome and Principe",
																		"Saudi Arabia",
																		"Senegal",
																		"Serbia",
																		"Seychelles",
																		"Sierra Leone",
																		"Singapore",
																		"Slovakia",
																		"Slovenia",
																		"Solomon Islands",
																		"Somalia",
																		"South Africa",
																		"South Korea",
																		"South Sudan",
																		"Spain",
																		"Sri Lanka",
																		"Sudan",
																		"Suriname",
																		"Sweden",
																		"Switzerland",
																		"Syria",
																		"Taiwan",
																		"Tajikistan",
																		"Tanzania",
																		"Thailand",
																		"Timor-Leste",
																		"Togo",
																		"Tonga",
																		"Trinidad and Tobago",
																		"Tunisia",
																		"Turkey",
																		"Turkmenistan",
																		"Tuvalu",
																		"Uganda",
																		"Ukraine",
																		"United Arab Emirates (UAE)",
																		"United Kingdom (UK)",
																		"United States of America (USA)",
																		"Uruguay",
																		"Uzbekistan",
																		"Vanuatu",
																		"Vatican City",
																		"Venezuela",
																		"Vietnam",
																		"Yemen",
																		"Zambia",
																		"Zimbabwe"]; 
																		
																foreach($countries as $c) {
																	$vals = strtolower(str_replace(" ","_",$c));
																	
																	$selected = null;
																	if ($dualcity == $vals) {
																		$selected = "selected";
																	}
																	
																	echo "<option value='{$vals}' {$selected}>{$c}</option>";
																}										
																?>
												</select>
											</div>
										</div>
									</div>
									<hr/>
									<div class='inputdiv fullwidth'>
										<h4 class='subhead'> Address </h4>
										<ol class='tabselect'>
											<li data-citselect='residential'> Residential Address </li>
											<li data-citselect='permanent'> Permanent Address </li>
										</ol>
										<div class='disappearing actiondiv' id='addrbox'>
											<p> Please select.. </p>
										</div>
									</div>

								</div>
							</div> <!-- contenttabs start -->