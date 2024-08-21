<style>
	#timetable {
	    border-collapse: collapse;
		font-family: arial;
		font-size: 14px;
	}
	
	#timetable tbody tr{
		
	}
	
	#timetable tbody tr td {
		border: 1px solid #ccc;
		padding: 6px 8px;
	}
	
	#timetable thead tr th{
	    border: 1px solid #ccc;
		padding: 5px 8px;
		font-size: 12px;
		background: #eaeaea;
	}
</style>

<table id='timetable' style='border-collapse: collapse; font-family: arial; font-size: 14px; background: #e8e8e8;'>
	<thead>
		<tr>
			<th rowspan=100 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'>
				&nbsp;
			</th>
			<th rowspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th rowspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> File </th>
			<th rowspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> Date </th>
			<th colspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> Morning </th>
			<th colspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> Afternoon </th>
			<th colspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> Late </th>
			<th colspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> Undertime </th>
			<th rowspan=2 style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> Overtime </th>
		</tr>
		<tr>
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> IN </th>
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> OUT </th>
						
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> IN </th>
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> OUT </th>
			
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> AM </th>
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> PM </th>
			
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> AM </th>
			<th style='border: 1px solid #ccc; padding: 5px 8px; font-size: 12px; background: #eaeaea;'> PM </th>
		</tr>
	</thead>
	<tbody> 
		<td rowspan='100' style='vertical-align:top;'>
			<div style='padding: 5px 11px;
						background: #ececec;'>
				<h2 style='margin: 8px 0px;'> <?php echo $empname; ?> </h2>
				<!--hr style='margin: 0px;
							border: 0px;
							border-bottom: 1px solid #ccc;'/-->
				<p style='margin: 8px 0px;' style='font-size: 13px;'> 
					<?php echo $from; ?>
							- 
					<?php echo $to; ?>
				</p>
				<hr style='margin: 15px 0px 15px 0px;
							border: 0px;
							border-bottom: 1px solid #ccc;'/>
				<a href='<?php echo $link; ?>'><p style='margin: 6px 0px;
							width: 100%;
							text-align: center;
							padding: 10px 0px;
							background: #0aca0a;
							color: #fff;
							border: 1px solid #19a22a;
							font-size: 13px;
							border-radius: 4px;'> Approve </p> </a>
				<p style='margin: 6px 0px;
							width: 100%;
							text-align: center;
							padding: 10px 0px;
							background: #afafaf;
							color: #fff;
							border: 1px solid #909090;
							font-size: 13px;
							border-radius: 4px;'> View on HRIS </p>
			</div>
		</td>
		<?php // for($i = 0, $c = 1; $i <= 6; $i++, $c++): 
			foreach($dtr as $ds => $val) {
				// var_dump($val); echo "<br/>";
				$bypass = false;
				//if ($val['attachment']->type_mode == "LEAVE" ) {
					
				//}
				
				$files = [];
				
				$needssup = null;
				
				if ($val[0]['am_in'] == NULL ||
					$val[0]['am_out'] == NULL ||
					$val[0]['pm_in'] == NULL ||
					$val[0]['pm_out'] == NULL) {
						// echo strtolower(date("D",strtotime($val['nicename'])));
						if ( strtolower(date("D",strtotime($val['nicename']))) != "sat" && 
							 strtolower(date("D",strtotime($val['nicename']))) != "sun" ) {
								if (!isset($val['holiday'])) {
									// var_dump($val['attachment']['ret']); echo "<br/>";
									if (count($val['attachment']['ret']) == 0) {
										$needssup = "needsupp";
									}
								}
								
							}
				} else {
					$needssup = null;
				}
				echo "<tr data-nicedate='{$ds}' class='{$needssup}'>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; background: #fff;'> <!--i class='fa fa-check'></i-->  </td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; background: #fff;'>";
						// var_dump($val['attachment']['ret']);
						if (count($val['attachment']['ret']) != 0) {
							foreach($val['attachment']['ret'] as $vr) {
							//	var_dump($vr);
							// if ($vr->type_mode != "AMS") {
								// $bypass = true;
							// } else{
								// $bypass = false;
							// }
								if (count($files)==0){array_push($files,[$vr->type_mode,
																		 $vr->attachments,
																		 $vr->exact_id,
																		 $vr->grp_id,
																		 $vr->leave_name]);}
								
								$found = null;
								foreach($files as $f){
									
									if ($f[0] == $vr->type_mode) {
										// found
										$found = true;
										break;
									} else {
										// not found 
										$found = false;
										continue;
									}
								}
								if (!$found) {
									array_push($files,[$vr->type_mode,
													   $vr->attachments,
													   $vr->exact_id,
													   $vr->grp_id,
													   $vr->leave_name]);
								}
								
							}
							//var_dump($files);
							foreach($files as $f) {
								if ($f[0] !== "AMS"){
									if ($f[0] === "LEAVE"){
										echo "<span class='atmtext'>".$f[4]."</span>";
									} else {
										echo "<span class='atmtext'>".$f[0]."</span>";
									}
								}
							}
						}
					
					if (isset($val['holiday'])) {
						echo "<small class='holiday'> HOLIDAY </small>";
					}
					
					$clue = (count($files)==0)?"no":"yes";
					// $t    = (isset($val[0]['tardiness_am'])) ? $val[0]['tardiness_am'] : null;
					$t_am = null;
					$t_pm = null;
					
					$u_am = null;
					$u_pm = null;
					
					if (isset($val['tardiness_am'])) {
						$t_am = $val['tardiness_am'];
					}
					
					if (isset($val['tardiness_pm'])) {
						if (isset($val['tardiness_am'])){
							$t_pm .= " - ";
						}
						$t_pm = $val['tardiness_pm'];
					}
					
					if (isset($val['undertime_am'])) {
						$u_am = $val['undertime_am'];
					}
					
					if (isset($val['undertime_pm'])) {
						if (isset($val['undertime_am'])){
							$u_pm .= " - ";
						}
						$u_pm = $val['undertime_pm'];
					}
					
					echo "</td>";
					echo "<td class='atmclue' data-clue='{$clue}' style='border: 1px solid #ccc; padding: 6px 8px; background: #fff;'>";
						echo date("M. d, Y", strtotime($val['nicename']))." - <small>".date("D", strtotime($val['nicename']))."</small>";
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $val[0]['am_in'];
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $val[0]['am_out'];
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $val[0]['pm_in'];
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $val[0]['pm_out'];
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $t_am; 
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $t_pm;
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $u_am;
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
						if (!$bypass) {
							echo $u_pm;
						}
					echo "</td>";
					echo "<td style='border: 1px solid #ccc; padding: 6px 8px; background: #fff;'>  </td>";
				echo "</tr>";
				
				if (count($files) !=0) {
					echo "<tr class='attachmenttbl' style='display:none;'>
							<td colspan='12' style='border: 1px solid #ccc; padding: 6px 8px; font-weight:bold; background: #fff;'>";
							echo "<h3> Attachments </h3>";
							$a = json_decode( json_encode($files) );
							$f = $a[0][1];
					//	var_dump($files);
						foreach($files as $fs) {
							echo "<div class='atm_tbl'>
									<h4> {$fs[0]} <span class='removethisatm' data-exactid='{$fs[2]}'> <i class='fa fa-trash-o' aria-hidden='true'></i> REMOVE </span> </h4>";
									if (strtoupper($fs[0]) != "AMS") {
										$atm_link = null;
										switch(strtoupper($fs[0])) {
											case "PS": 
											case "PAF":
											case "OT":
												$atm_link = "reports/applications/".$fs[2]."/{$fs[0]}'";
												break;
											case "LEAVE":
											case "CTO":
												$atm_link = "view/form/".$fs[3];
												break;
										}
										echo "<p style='margin: 10px 0px 0px; text-align: center; border: 1px solid #dcdcdc; padding: 5px;'>";
											echo "<a href='".base_url().$atm_link."' target='_blank'>".strtoupper($fs[0])."</a>";
										echo "</p>";
									} else {
										// var_dump($fs);
									}
							echo "</div>";
						}
					echo "	</td>
						</tr>";
					
				}
			}
		?>

		<?php // endfor; ?>
	</tbody>
</table>

