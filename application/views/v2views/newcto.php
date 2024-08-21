<div class='content-wrapper' style='padding:0px;'> <!-- content wrapper -->
	<section class="content" style='padding:0px;'> <!-- section class content -->
      <div class='content_wrapper'>
		<p class='otcto_text'> <i class="fa fa-clipboard-list"></i> Table of Overtime and Compensatory Time-Off </p>
		<table class='cto_ot_tbl'>
			<tr> 
				<td colspan=19 id='thename'> <?php echo $emp_name; ?> </td>
			</tr>
			<tr>
				<td colspan=12 class='overtimeclass' >
					Overtime 
				</td>
				<td colspan=3 class='ctoclass'>
					Compensatory Time-Off
				</td>
			</tr>
			<tr>
				<th rowspan=3 class='overtimeclass' > Date of Overtime </th>
				<th rowspan=3 class='overtimeclass' > Day </th>
				<th colspan=2 class='overtimeclass' > AM </th>
				<th colspan=2 class='overtimeclass' > PM </th>
				<th rowspan=3 class='overtimeclass' > Total </th>
				
				<th colspan=5 class='overtimeclass' > Credits </th>
								
				<th rowspan=3 class='ctoclass' > Date of CTO </th>
				
				<th colspan=2 class='ctoclass'> Used COC's </th>
				
				<th rowspan=3> Remaining COC <br/> (hours:minutes) </th>
				<!--th rowspan=3> Excess OT </th-->
				<th rowspan=3> Action </th>
			</tr>
			<tr>
				<th rowspan=2 class='overtimeclass' > IN </th>
				<th rowspan=2 class='overtimeclass' > OUT </th>
				<th rowspan=2 class='overtimeclass' > IN </th>
				<th rowspan=2 class='overtimeclass' > OUT </th>
				
				<th colspan=2 class='overtimeclass' > 1x </th>
				<th colspan=2 class='overtimeclass' > 1.5x </th>
				<th rowspan=3 class='overtimeclass' > Total Credits <br/> (days:hours:mins)</th>
				
				<th rowspan=2 class='ctoclass'> Hrs </th>
				<th rowspan=2 class='ctoclass'> Mins </th>
			</tr>
			<tr>
				<th class='overtimeclass' style='font-weight:normal;'> hh </th>
				<th class='overtimeclass' style='font-weight:normal;' > mm </th>
				<th class='overtimeclass' style='font-weight:normal;' > hh </th>
				<th class='overtimeclass' style='font-weight:normal;' > mm </th>
			</tr>
			
			<tbody id='tbody_contents'>
				<?php // var_dump($ctodata); ?>
				<?php 
					// foreach($ctodata as $cd) {
					if (count($ctodata) > 0) {
						for($x = count($ctodata)-1 ; $x >= 0 ; $x--) {
							echo "<tr>";
								echo "<td style='text-align:right; padding-right: 12px;'>";
									if ($ctodata[$x]['day'] != null) {
										echo date("F d, Y", strtotime($ctodata[$x]['day']));
									}
								echo "</td>";
								echo "<td>";
									if ($ctodata[$x]['day'] != null) {
										echo date("l",strtotime($ctodata[$x]['day']));
									}
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['amin'];
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['amout'];
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['pmin'];
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['pmout'];
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['totalovertime'];
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['creditsx1hh'];
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['creditsx1mm'];
								echo "</td>";
								echo "<td>";
									echo $ctodata[$x]['creditsx15xhh'];
								echo "</td>";
									echo "<td>";
									echo $ctodata[$x]['creditsx15xmm'];
								echo "</td>";
									echo "<td>";
									echo $ctodata[$x]['totalcreditswithx'];
								echo "</td>";
								
								// for CTO
									echo "<td>";
										if ($ctodata[$x]['daycto'] != null) {
											echo date("F d, Y", strtotime($ctodata[$x]['daycto']));
										}
									echo "</td>";
									echo "<td>";
										echo $ctodata[$x]['usedcochr'];
									echo "</td>";
									echo "<td>";
										echo $ctodata[$x]['usedcocmm'];
									echo "</td>";
									echo "<td>";
										echo $ctodata[$x]['remaining'];
									echo "</td>";
									echo "<td>";
										if ($usertype == "admin") {
											echo "<button data-otid = '{$ctodata[$x]['otctoid']}' class='recallctoot'> Recall </button>";
										}
									echo "</td>";
								// for CTO
							echo "</tr>";
						}
					} else {
						echo "<p style='text-align: center; font-size: 16px; margin: 0px; padding: 21px; background: #ffacac; text-transform: capitalize;color: #ab3030;'> no data found. </p> ";
					}
				?>
			</tbody>
		</table>	
	  </div>
	</section>
</div>