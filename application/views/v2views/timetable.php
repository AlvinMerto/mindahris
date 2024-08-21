<table id='timetable'>
	<thead>
		<tr>
			<th rowspan=2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
			<th rowspan=2> File </th>
			<th rowspan=2> Date </th>
			<th colspan=2> Morning </th>
			<th colspan=2> Afternoon </th>
			<th colspan=2> Late </th>
			<th colspan=2> Undertime </th>
			<!--th rowspan=2> Pass Slip </th>
			<th rowspan=2> Hours Rendered </th>
			<th rowspan=2> Total Hours for the week </th>
			<th rowspan=2> Total Undertime </th>
			<th rowspan=2> Total Tardiness </th-->
		</tr>
		<tr>
			<th> IN </th>
			<th> OUT </th>
						
			<th> IN </th>
			<th> OUT </th>
			
			<th> AM </th>
			<th> PM </th>
			
			<th> AM </th>
			<th> PM </th>
		</tr>
	</thead>
	<tbody> 
		<?php 
		/*
		foreach($dtr as $weekkey => $perweek) {
			foreach($period as $thedates) {
				$td = $thedates->format("m/d/Y");
				if (isset($perweek[$td])) {
					echo "<tr>";
						echo "<td> </td>";
						echo "<td> </td>";
						echo "<td> {$thedates->format("m/d/Y")} </td>";
						echo "<td>".$perweek[$td][2]['am_in']."</td>";
						echo "<td>".$perweek[$td][2]['am_out']."</td>";
						echo "<td>".$perweek[$td][2]['pm_in']."</td>";
						echo "<td>".$perweek[$td][2]['pm_out']."</td>";
						// echo "<td>".$perweek[$td][2][."</td>";
					echo "</tr>";
				}
			}
		}
		*/
			// for($i = 0, $c = 1; $i <= 6; $i++, $c++): 
			foreach($dtr as $ds => $val) {
				// var_dump($val['attachment']['ret']);
				// var_dump($val); echo "<br/><br/><br/>";
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
					echo "<td> <!--i class='fa fa-check'></i-->  </td>";
					echo "<td>";
						// var_dump($val['attachment']['ret']);
						if (count($val['attachment']['ret']) != 0) {
							foreach($val['attachment']['ret'] as $vr) {
							
								if (count($files)==0){array_push($files,[$vr->type_mode,
																		 $vr->attachments,
																		 $vr->exact_id,
																		 $vr->grp_id,
																		 $vr->leave_name,
																		 $vr->modify_by_id]);}
								
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
													   $vr->leave_name,
													   $vr->modify_by_id]);
								}
								
							}
							//var_dump($files);
							foreach($files as $f) {
								//if ($f[0] !== "AMS"){
									if ($f[0] === "LEAVE"){
										echo "<span class='atmtext' title='click to open/close the attached file window'>".$f[4]."</span>";
									} else {
										$apd = null;
										if ($f[0]=="PS") {
											if ($val['passslip']['personal'] != null) {
												$apd = " [P]";
											} else if ($val['passslip']['official'] != null) {
												$apd = " [O]";
											}
										}
										echo "<span class='atmtext'>".$f[0].$apd."</span>";
									}
								//}
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
					echo "<td class='atmclue' data-clue='{$clue}'>";
						echo "<small>".date("D", strtotime($val['nicename']))."</small> - ". date("M. d, Y", strtotime($val['nicename']));
					echo "</td>";
					echo "<td>";
						if (!$bypass) {
							echo $val[0]['am_in'];
						}
					echo "</td>";
					echo "<td>";
						if (!$bypass) {
							echo $val[0]['am_out'];
						}
					echo "</td>";
					echo "<td>";
						if (!$bypass) {
							echo $val[0]['pm_in'];
						}
					echo "</td>";
					echo "<td>";
						if (!$bypass) {
							echo $val[0]['pm_out'];
						}
					echo "</td>";
					echo "<td style='font-weight:bold;'>";
						if (!$bypass) {
							echo $t_am; 
						}
					echo "</td>";
					echo "<td style='font-weight:bold;'>";
						if (!$bypass) {
							echo $t_pm;
						}
					echo "</td>";
					echo "<td style='font-weight:bold;'>";
						if (!$bypass) {
							echo $u_am;
						}
					echo "</td>";
					echo "<td style='font-weight:bold;'>";
						if (!$bypass) {
							echo $u_pm;
						}
					echo "</td>";
					
					// pass slip
					/*
						echo "<td>";
							
							if (isset($val['passslip'])) {
								if ($val['passslip']['personal'] != null) {
									echo $val['passslip']['personal'];
								} 
								
								if ($val['passslip']['official'] != null) {
									echo $val['passslip']['official'];
								}
							}
						
						echo "</td>"; 
					*/
					// used in pass slip 
					
					// echo "<td>  </td>"; // overtime 
				echo "</tr>";
		
				if (count($files) !=0) {
					echo "<tr class='attachmenttbl' style='display:none;'>
							<td colspan='120' style=''>";
							echo "<h3> Attachments </h3>";
							$a = json_decode( json_encode($files) );
							$f = $a[0][1];
						foreach($files as $fs) {
						//	var_dump($fs); echo "<br/><br/><br/>";
							$vlink   	 = $fs[2];
							$thefilelink = $fs[1];
							$tfl_arr     = json_decode($thefilelink);
							
							echo "<div class='atm_tbl'>";
								echo "<h4> {$fs[0]} ";
									if ( gettype($fs[5]) != "NULL" ) {
										echo "<span class='removethisatm' data-exactid='{$fs[2]}'> <i class='fa fa-trash-o' aria-hidden='true'></i> REMOVE </span> ";
										
										if (count($tfl_arr)>0) {
											echo "<div style='margin-top: 17px;'>";
												foreach($tfl_arr as $ff) {
													echo "<p style='font-size: 13px; font-weight: normal;'> <a href='".base_url()."uploads/{$ff}' target='_blank'> {$ff} </a> </p>";
												}
											echo "</div>";
										}
									} else {
										echo "<span class='cbr'> <i class='fa fa-trash-o' aria-hidden='true'></i> Cannot remove attachment. </span> ";
									}
									echo "</h4>";
									
									if ( strtoupper($fs[0]) != "AMS") {
										$atm_link = null;
										switch(strtoupper($fs[0])) {
											case "PS":
												if ($fs[1] == NULL || $fs[1] == null){
													$atm_link = "reports/applications/".$fs[2]."/{$fs[0]}'";
												} else {
													$atm_link = "Atts/show/".$vlink;
												}
												break;
											case "OB":
											case "CA":
												$atm_link = "Atts/show/".$vlink;
												break;
											case "PAF":
											case "OT":
												$atm_link = "reports/applications/".$fs[2]."/{$fs[0]}'";
												break;
											case "LEAVE":
											case "CTO":
												$atm_link = "view/form/".$fs[3];
												break;
										}
										/* --- remove temporarily 
										echo "<p class='btn-default' style='margin: 10px 0px 0px; text-align: center; border: 1px solid #dcdcdc; padding: 5px;'>";
											// echo "<a href='".base_url().$atm_link."' target='_blank'>".strtoupper($fs[0])."</a>";
											echo "<a href='".base_url().$atm_link."' target='_blank'> open </a>";
										echo "</p>";
										/*
										
										/*
										$fs1 = json_decode($fs[1]);	
										if ($fs1 != NULL) {
											foreach($fs1 as $x) {
												$ext  = substr($x,strlen($x)-3, strlen($x)) ;
												$info =  pathinfo(base_url()."uploads/{$x}");
												
												$en_link = urlencode(base_url()."uploads/{$x}");
												$link    = base_url()."uploads/{$x}";
												// echo $en_link;
												if (strtoupper($info['extension']) == "JPG" || 
													strtoupper($info['extension']) == "JPEG" || 
													strtoupper($info['extension']) == "BMP" ||
													strtoupper($info['extension']) == "PNG" || 
													strtoupper($info['extension']) == "GIF" ||
													strtoupper($info['extension']) == "PDF" ||
													strtoupper($info['extension']) == "TIF") {
														echo "<a href='{$link}' target='previewarea' class='lightroom'> 
																<img src='{$link}' data-href='{$link}' style='width: 165px; margin-top: 11px; border: 1px solid #ccc;'/>
															  </a>";
													} else {
														echo "<p data-href='{$link}' class='lightroom'>{$x}</p>";
													}
											}
										} else {
											echo "<p class='noatm'> No attachment </p>";
										}
										*/
										
									} else {
										echo "<p onclick='dp.remindi(this,{$vlink})' id='remtimeindi' class='btn-default' style='margin: 10px 0px 0px; text-align: center; border: 1px solid #dcdcdc; padding: 5px;'>";
											echo "Remove time individually";
										echo "</p>";
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
