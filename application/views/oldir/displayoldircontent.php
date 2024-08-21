<!doctype html>
<html>
	<head>		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/oldirstyle/style.css'/>
		<title> Online Directory </title>
	</head>
	<body> 
		<main>
			<div class='wrapwhole'>
				<div class='leftwrap'>
					<div class='logodiv'>
						<h5 style='text-align:center;'> MinDA PDS </h5>
						<h6 style='text-align: center;'> Online Directory </h6>
					</div>
					<div class='leftnavigation'>
						<ul>
							<!--li class='<?php // echo (strtoLower($data["office"]) == "summary")?"selectedoffice":null; ?>'> <a href='<?php echo base_url(); ?>/onlinedirectory/minda/summary'> Summary <i class="fas fa-chevron-right"></i> </a> </li-->
							<li class='<?php echo (strtoLower($data["office"]) == "oed")?"selectedoffice":null; ?>'> <a href='<?php echo base_url(); ?>onlinedirectory/minda/oed'>  OED <i class="fas fa-chevron-right"></i></a></li> 
							<li class='<?php echo (strtoLower($data["office"]) == "pppdo")?"selectedoffice":null; ?>'> <a href='<?php echo base_url(); ?>onlinedirectory/minda/pppdo'> PPPDO <i class="fas fa-chevron-right"></i></a></li>
							<li class='<?php echo (strtoLower($data["office"]) == "ipiro")?"selectedoffice":null; ?>'> <a href='<?php echo base_url(); ?>onlinedirectory/minda/ipiro'> IPPAO <i class="fas fa-chevron-right"></i></a></li>
							<li class='<?php echo (strtoLower($data["office"]) == "ofas")?"selectedoffice":null; ?>'> <a href='<?php echo base_url(); ?>onlinedirectory/minda/ofas'>OFAS <i class="fas fa-chevron-right"></i></a></li>
							<li class='<?php echo (strtoLower($data["office"]) == "amo")?"selectedoffice":null; ?>'> <a href='<?php echo base_url(); ?>onlinedirectory/minda/amo'>AMO <i class="fas fa-chevron-right"></i></a></li>
						</ul>
					</div>
				</div>
				<div class='rightwrap' id='therightwrap-id'>
					<div id='thetopnavigation'>
						<div class='right-top-wrap'>
							<div class='filter-top-wrap'>
								<div class='filter-box'>
									<i class="fas fa-bars"></i>
								</div>
							</div>
							<div class='filter-top-label'>
								<h6> <!--Displaying divisions under--> <?php echo strtoupper($data['office']); ?> - <a href='?show=summary'> PDS Summary </a></h6>
							</div>
						</div>
						<div class='right-navigation-wrap'>
							<ul>
								<?php
									if (count($data['division']) > 0) {
										foreach($data['division'] as $d) {
											$class = null;
											if (isset($data['sel_div'])) {
												if ($d == $data['sel_div']) {
													$class = "class ='selecteddiv'";
												}
											}
											echo "<li {$class}>";
												echo "<a href='".base_url()."onlinedirectory/minda/{$data["office"]}/{$d}'>{$d}</a>";
											echo "</li>";
										}
									} else {
										echo "<li> no data found </li>";
									}
								?>
							</ul>
						</div>
						<div class='right-filter-wrap'>
							<!--div class='rightfilter'>
								<div class='thefilterbutton' id='thefiltbtn'>
									Show summary
								</div>
								<div class='filterdiv hidethis'>
									<select>
										<option> Development Management Officer II </option>
										<option> Development Management Officer II </option>
										<option> Development Management Officer II </option>
										<option> Development Management Officer II </option>
									</select>
								</div>
							</div-->
							<div class='thesearch'>
								<div class=''>
									<h6> Search </h6>
								</div>
								<div class='thesearchinputs'>
								<form method='post'>
									<select class='searchsel' name='searchcat'>
										<option value='training' <?php if(isset($_POST['searchcat'])){if($_POST['searchcat']=="training"){echo "selected";}} ?>> Training </option>
										<option value='course' <?php if(isset($_POST['searchcat'])){if($_POST['searchcat']=="course"){echo "selected";}} ?>> Course / Degree </option>
										<option value='skills' <?php if(isset($_POST['searchcat'])){if($_POST['searchcat']=="skills"){echo "selected";}} ?>> Expertise / Skills </option>
										<option> Involvements </option>
										<option> Work experience </option>
									</select>
									<input type='text' name='searchtext' <?php if(isset($_POST['searchtext'])){echo "value='".$_POST['searchtext']."'";} ?>/>
									<input type='submit' value='filter' class='filterbtn'/>
									<div class='thefilters'>
										<div class='filteroption'>
											<input type='checkbox' name='anyoftheword' id='anyoftheword' value='true' <?php if(isset($_POST['anyoftheword'])){echo "checked='checked'";} ?>/> <label for='anyoftheword'> chronological </label>
										</div>
									</div>
								</form>
									<!--form method='post'> 
										<input type='text' placeholder='Name' name='fullname' value='<?php // if (isset($_POST['fullname'])) { echo $_POST['fullname'];} ?>'/>
										<input type='text' placeholder='Contact Number' name='contactno'/>
										<input type='text' placeholder='Training' name='training'/>
										<input type='text' placeholder='Course/Degree' name='course'/>
										<input type='text' placeholder='Expertise/Skills' name='skills'/>
										<input type='submit' value='filter' name='filterbtn' class='filtbtn'/>
									</form-->
								</div>
							</div>
						</div>
					</div>
					<div class='right-thecontent' id='thecontentoftbl'>
						<table>
							<thead>
								<th> Name </th>
								<!--th> Office/Division </th-->
								<?php 
									if ( isset($_GET['show']) && $_GET['show'] == "summary") { 
										echo "  <th> addresses </th>
												<th> Educational Background </th>
												<th> Eligibility </th>
												<th> Identification </th>
												<th> Involvements </th>
												<th> other info </th>
												<th> Questionnaire </th>
												<th> Reference </th>
												<th> Weminars </th>
												<th> Work Experience </th>";
									} else {
										echo "
										<th> Position </th>
										<th style='width: 0px;'> Sex </th>
										<th> Contact No. </th>
										<th style='width: 0px;'> Address </th>
										<th style='width: 0px;'> Education </th>
										<th style='width: 0px;'> Expertise/Skills </th>
										<th style='width: 0px;'> Training </th>";
									}
								?>
								
							</thead>
							<tbody>
								<?php 
									foreach($data['emps'] as $emps) {
										echo "<tr>";
											echo "<td class='ellips'>".strtoupper($emps['name'])."</td>";
											// echo "<td class='ellips'> {$emps['division']} </td>";
											
											if ( isset($_GET['show']) && $_GET['show'] == "summary") { 
												$summary = $data['summary'];
												// [0]['addresses']
												//foreach($summary[$emps['id']]['dbs'] as $ee) {
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][0]['addresses'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][0]['addresses'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][1]['educbg'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][1]['educbg'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][2]['eligibility'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][2]['eligibility'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][3]['identification'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][3]['identification'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
									
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][4]['involvements'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][4]['involvements'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][5]['otherinfo'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][5]['otherinfo'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][6]['questiontbl'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][6]['questiontbl'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][7]['reference'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][7]['reference'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][8]['seminars'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][8]['seminars'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
													
													echo "<td>";
														if (!isset($summary[$emps['id']]['dbs'][9]['workexp'])) {
															echo "<small style='color:red;'> not updated </small>";
														} else {
															if ($summary[$emps['id']]['dbs'][9]['workexp'] > 0) {
																echo "updated";
															} else {
																echo "<small style='color:red;'> not updated </small>";
															}
														}
													echo "</td>";
												//}
											} else {
												echo "<td class='ellips'> {$emps['position']} </td>";
												echo "<td> {$emps['sex']} </td>";
												echo "<td class='ellips'> {$emps['contactno']} </td>";
												echo "<td> <button class='drawer' data-id='{$emps["id"]}' data-openwhat='address'> OPEN </button> </td>";
												echo "<td> <button class='drawer' data-id='{$emps["id"]}' data-openwhat='course'> OPEN </button> </td>";
												echo "<td> <button class='drawer' data-id='{$emps["id"]}' data-openwhat='skills'> OPEN </button> </td>";
												echo "<td> <button class='drawer' data-id='{$emps["id"]}' data-openwhat='training'> OPEN </button> </td>";
											}
										echo "</tr>";
									}									
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class='blacker hidethis' id='theblacker'>
				<div id='popupwhite'>
					
				</div> 
			</div>
		</main>
		<script> var baseurl = '<?php echo base_url(); ?>'; </script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
		<script src='<?php echo base_url(); ?>v2includes/js/oldirprocs/proc.js'></script>
	</body>
</html>
