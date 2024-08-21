
<div class="content-wrapper" style='background:#f1f1f1; overflow:auto;'>
	<section class="content" style='padding:0px; min-height: inherit;'>
	<div class='dashboard_wrap'>
		<div class='navigation_course'>
				<?php 
					if (count($openpos)>0) {
						echo "<ul>";
						foreach($openpos as $op) {
							echo "<li>";
								echo "<a href='".base_url()."pds/applicants/applying/{$op['positioncode']}'>";
									echo $op['position'];
								echo "</a>";
							echo "</li>";
						}
						echo "</ul>";
					} else {
						echo "<p> no open position </p>";
					}
				?>
			
		</div>

		<div class='div_search'>
			<section class='icondiv'>
				<i class="fa fa-search" aria-hidden="true"></i>
				<form method='post' name='searchform'> 
					<input type='text' placeholder='Search for the names of applicants' name='namesearch' id='namesearch' value='<?php if (isset($searchfor)) { echo $searchfor; } ?>'/>
				</form>
			</section>
		</div>

		<div class='listwrap'>
			<div class='listofapps'>
				<h4> List of applicants 
					<?php if (!isset($display_as)) { ?>
					<span id='exporttoexcel'> export to excel </span> 
					<?php } ?>
					<span> <a href='<?php echo base_url(); ?>pds/applicants/openposition'> open a position </a> </span> 
					<?php if (isset($display_as)) { ?>
						<span> <a href='?display=table'> Display as table </a> </span>
					<?php } else { ?>
						<span> <a href='?display=names'> Display as names </a> </span>
					<?php }  ?>
				</h4>
				<small> showing results of your action </small>	
			</div>
			<div class='openposition 
				<?php 
					if (isset($displayopen)) {
						echo "forcedisplay";
					}
				?>
			'>
				<div class='row'>
					<div class='col-md-4'>
						<h4> Open a position</h4>
						<hr/>
						<form method='post'>
							<p> Enter the position you want to open </p>
							<input type='text' class='form-control' name='postitle'/>
							<?php
								if (isset($openmsg)) {
									echo "<p> {$openmsg} </p>";
								}
							?>
							<hr/>
							<input type='submit' value='Open' name='openpostbtn' class='btn btn-primary'/> <a style='margin-left: 16px;' href='<?php echo base_url(); ?>pds/applicants'> close </a>
						</form>
					</div>
					<div class='col-md-8'>
						<h4> List of opened positions </h4> 
						<hr/>
						<div class='listofposts'>
							<?php 
								if (count($openpos)>0) {
									echo "<ul>";
										foreach($openpos as $op) {
											echo "<li>";
												echo $op['position'];
												echo "<a href='".base_url()."/pds/applicants/openposition/delete/{$op['positioncode']}'> delete </a>";
											echo "</li>";
										}
									echo "</ul>";
								}
							?>	
						</div>
					</div>
				</div>
			</div>
			<div class='listtable'>
				<?php $d = true; 
					if (!isset($display_as)) { ?>
				
				<table id='theapplicants'>
					<thead>
					<tr>
						<th> Full Name </th>
						<th> Date Applied </th>
						<th> Eligibility </th>
						<th> Applying for </th>
						
						<!-- hidden -->
								<th class='hidethis'>age</th>
								<th class='hidethis'>sex</th>
								<th class='hidethis'>marital status</th>
								<th class='hidethis'>address</th>
								<th class='hidethis'>mobile number</th>

								<th class='hidethis'>course</th>
								<th class='hidethis'>school</th>
								<th class='hidethis'>From</th>
								<th class='hidethis'>to</th>

								<th class='hidethis'>the training</th>
								<th class='hidethis'>brief description of training</th>
								<th class='hidethis'>classification</th>
								<th class='hidethis'>participation</th>
								<th class='hidethis'>intended for</th>
								<th class='hidethis'>training hours</th>
								<th class='hidethis'>Total number of managerial/supervisory training hours</th>

								<th class='hidethis'>position title</th>
								<th class='hidethis'>company name</th>
								<th class='hidethis'>sector</th>
								<th class='hidethis'>status of appointment </th>
								<th class='hidethis'>number of persons supervised</th>
								<th class='hidethis'>From</th>
								<th class='hidethis'>to</th>
								<th class='hidethis'>number of work experience </th>
								<th class='hidethis'>Total Years of Managerial & Supervisory Experience </th>
						<!-- end of hidden -->
					</tr>
					</thead>
					<tbody>
						<?php
							if (count($values)>0) {
								foreach($values as $key => $v) {

										echo "<tr class=''>";
											foreach($v as $vv) {
												echo "<td>{$vv['personal']['firstname']}</td>";
												echo "<td>". date("M. d, Y", strtotime($vv['personal']['datesubmitted'])). "</td>";
												echo "<td> {$vv['personal']['etype']} </td>"; // eligibility type 
												echo "<td> {$vv['personal']['position']} </td>"; // applying for the position
												echo "<td class='hidethis'>{$vv['personal']['age']}</td>";
												echo "<td class='hidethis'>{$vv['personal']['sex']}</td>";
												echo "<td class='hidethis'>{$vv['personal']['civilstat']}</td>";
												echo "<td class='hidethis'>{$vv['personal']['addr']}</td>";
												echo "<td class='hidethis'>{$vv['personal']['mobnum']}</td>";
												
												$count_eb = 0;
												foreach($vv['educbg'] as $eb) {
													if ($count_eb == 0) {
														$count_eb++;
													} else {
														echo "</tr>";
														echo "<tr>";
															for($aa = 0; $aa <= 8; $aa++) {
																echo "<td> </td>";
															}
													}
													
													echo "<td class='hidethis'>{$eb['course']}</td>";
													echo "<td class='hidethis'>{$eb['nameofsch']}</td>";
													echo "<td class='hidethis'>{$eb['from_']}</td>";
													echo "<td class='hidethis'>{$eb['to_']}</td>";
												
												}
												
												$count_tr = 0;
												foreach($vv['trainings'] as $tr) {
													if ($count_tr == 0) {
														$count_tr++;
													} else {
														echo "</tr>";
														echo "<tr>";
															for($aa = 0; $aa <= 12; $aa++) {
																echo "<td> </td>";
															}
													}
													
													echo "<td class='hidethis'>{$tr['titleofprog']}</td>";
													echo "<td class='hidethis'>{$tr['brfdesc']}</td>";
													echo "<td class='hidethis'>{$tr['typeofsem']}</td>";
													echo "<td class='hidethis'>{$tr['participation']}</td>";
													echo "<td class='hidethis'>{$tr['intendedfor']}</td>";
													echo "<td class='hidethis'>{$tr['numofhrs']}</td>";
													echo "<td class='hidethis'>{$tr['totnummansuptrhrs']}</td>";
													
												}
												
												$count_we = 0;
												foreach ($vv['workexp'] as $we) {
													if ($count_we==0) {
														$count_we++;
													} else {
														echo "</tr>";
														echo "<tr>";
															for($aa = 0; $aa <= 19; $aa++) {
																echo "<td> </td>";
															}
													}
													
													echo "<td class='hidethis'>{$we['postitle']}</td>";
													echo "<td class='hidethis'>{$we['dept']}</td>";
													echo "<td class='hidethis'>{$we['govserv']}</td>";
													echo "<td class='hidethis'>{$we['statofapp']}</td>";
													echo "<td class='hidethis'>{$we['numofperssup']}</td>";
													echo "<td class='hidethis'>{$we['from_']}</td>";
													echo "<td class='hidethis'>{$we['to_']}</td>";
													echo "<td class='hidethis'>{$we['numofworkexp']}</td>";
													echo "<td class='hidethis'>{$we['totyrmansupexp']}</td>";
												}
										}
									echo "</tr>";
								}
							} else {
								echo "<tr>";
									echo "<td colspan=5> no applicant found </td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
				
				<?php } else { ?>
					<ul>
						<?php 
							$id_in = [];
							foreach($values as $v) {
								foreach($v as $vv) {
									if (count($id_in)==0) {
										array_push($id_in,$vv['personal']['firstname']);
									} else {
										if (!in_array($vv['personal']['firstname'],$id_in)) {
											array_push($id_in,$vv['personal']['firstname']);
										}
									}
								}
							}
							
							foreach($id_in as $names) {
								echo "<li>";
									echo strtolower($names);
									// echo "<small> applied: Month 2x, 2xxx </small>";
								echo "</li>";
							}
						?>
					</ul>
				<?php } ?>
			</div>
		</div>

	</div>
	</section>
</div>