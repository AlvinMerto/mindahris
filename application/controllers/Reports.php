<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	Class Reports extends CI_Controller{
		

		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('attendance_model');
			$this->load->model('reports_model');
			$this->load->model('personnel_model');
			$this->load->model('leave_model');

		}

		public function index(){
			$this->dtr();
		}

		public function generatedtr(){

			$sdate =  $_POST["sdate"];

			$edate =  $_POST["edate"];
			$userid =  $_POST["userid"];


			//$getemployee_id = $this->admin_model->get_employee_id($userid , $area = 1);

			$getreport = $this->admin_model->getdailytimerecords($userid ,  date('Y/m/d',strtotime($sdate)) ,  date('Y/m/d',strtotime($edate)));
			$generateddate = $this->admin_model->createDateRangeArray( date('Y/m/d',strtotime($sdate)),  date('Y/m/d',strtotime($edate)));


			foreach ($generateddate as $row){
				$daterange[] = $row;
			} 

			$data['getdtrs'] = $daterange;

			foreach ($daterange  as $row){

				$this_date = date('n/j/Y',strtotime($row));
				$date = substr(date('l',strtotime($row)), 0, 2);

					$checkinarr = array();

					foreach ($getreport as $crow){

						$count = 1;

						$date_checktime = date('n/j/Y',strtotime($crow->CHECKTIME));


						if($this_date == $date_checktime){

								$checktype = $crow->CHECKTYPE;
								$checktime = date('h:i A',strtotime($crow->CHECKTIME));

								$checkinarr[] = array('TIME' => $checktime);
						
						}else{
							 	$checktype = "";
							 	$checktime = "";
						}
			
					}

				$dtr_array[] = array('CHECKDATE' => $this_date.' '.$date , 'CHECKINOUT' => $checkinarr);
		
			}

			$data['dtr_array'] = $dtr_array;

			echo json_encode($dtr_array);
		}


		public function dtr(){

			$data['title'] = '| Daily Time Records';

			if($this->session->userdata('is_logged_in')!=TRUE){
				  redirect('/accounts/login/', 'refresh');
			}else{

			$data['biometric_id'] = $this->session->userdata('biometric_id');
			$data['employee_id'] = $this->session->userdata('employee_id');
			$data['usertype'] = $this->session->userdata('usertype');
			$data['dbm_sub_pap_id'] = $this->session->userdata('dbm_sub_pap_id');
			$data['division_id'] = $this->session->userdata('division_id');
			$data['level_sub_pap_div'] = $this->session->userdata('level_sub_pap_div');
			$data['employment_type'] = $this->session->userdata('employment_type');
			$data['is_head'] = $this->session->userdata('is_head');
			

			$getemployees = $this->admin_model->getemployees();

			$getareas = $this->admin_model->getareas();

			$users = array();
		
			foreach ($getemployees as $rr) {
				$users[] = array('userid' => $rr->biometric_id , 'name' => $rr->f_name);
			}



			$data['areas'] = $getareas;


			$data['sub_pap_division_tree'] = $this->personnel_model->getsubpap_divisions_tree();
			$data['dtrformat'] = $this->admin_model->getdtrformat();
			$data['dbusers'] = $getemployees;


			$data['main_content'] = 'hrmis/reports/dtr_view';
			$this->load->view('hrmis/admin_view',$data);


			}

		}


		/*create to test data from sql */

		public function summary(){

				if($this->session->userdata('is_logged_in')!=TRUE){
					  redirect('/accounts/login/', 'refresh');
				}else{

				$data['title'] = '| Summary Reports';
				$data['usertype'] = $this->session->userdata('usertype');

				$this->load->model('personnel_model');
				$data['main_content'] = 'hrmis/reports/summary_view';
				$this->load->view('hrmis/admin_view',$data);


			}

		}

		public function testtesttest($id = '', $name= '') {
			echo $id;
			echo $name;
		}

		public function applications($exact_id = '' , $type_mode = ''){
		//	$this->load->model("Globalvars");
		//	$data['admin'] = ($this->Globalvars->usertype != "user")?true:false;
		
			if($this->session->userdata('is_logged_in')!=TRUE){
				redirect('/accounts/login/', 'refresh');
			}else{
				// echo $exact_id; return;
				$this->load->model("v2main/Globalproc");
				
				// get the display of signature settings 
					$data['sig_data'] = $this->Globalproc->getsettings("signature");
				// end 
				
				$url 		= base_url();
				$inf 		= $this->Globalproc->gdtf("checkexact",["exact_id"=>$exact_id],["grp_id"]);
				
				$grp_id = null;
				if (count($inf) >= 1) {
					$grp_id 	= $inf[0]->grp_id;
				}
				
				if ($type_mode == "OT"){
					$grp_id = $exact_id;
				}
				
				/*
				if ($grp_id == null) {
					die(" <p style='text-align: center;
									background: pink;
									padding: 33px;
									width: 50%;
									margin: auto;
									box-shadow: 0px 2px 1px #737373;
									font-size: 19px;
									font-family: arial;'> This application was applied manually. Please ask for the approved hard copy. Thanks. </p> ");
				}
				*/
				/*
				window.location.href = "http://office.minda.gov.ph:9003/reports/applications/"+data[1]+"/PS";
					break;
				case "PAF":
					window.location.href = "http://office.minda.gov.ph:9003/reports/applications/"+data[1]+"/PAF";
					break;
				case "OT":
					window.location.href = "http://office.minda.gov.ph:9003/reports/applications/"+data[1]+"/OT";
				case "LEAVE":
					window.location.href = "http://office.minda.gov.ph:9003/view/form/"+grp_id;
					break;
				case "CTO":
					window.location.href = "http://office.minda.gov.ph:9003/view/form/"+grp_id;
				*/
				
				$baseurl = base_url();
				echo "<script>";
					switch($type_mode) {
						case "PS":
							echo "window.location.href = '{$baseurl}reports/applications/".$exact_id."/PS'; ";
							echo "return;";
							break;
						case "PAF":
							echo "window.location.href = '{$baseurl}reports/applications/".$exact_id."/PAF'; ";
							echo "return;";
							break;
						case "OT":
							echo "window.location.href = '{$baseurl}reports/applications/".$exact_id."/OT'; ";
							echo "return;";
							break;
						case "LEAVE":
							if ($grp_id == null) {
								echo "alert('This is a manual application. Please ask for the softcopy of the application form.');";
								echo "window.close();";
							} else {
								echo "window.location.href = '{$baseurl}view/form/".$grp_id."'; ";
							}
							break;
						case "CTO":
							echo "window.location.href = '{$baseurl}view/form/".$grp_id."';	";
							break;
					}
					//echo "window.location.href='".base_url()."view/form/{$grp_id}'";
				echo "</script>";
				// end here 
		
				if ($type_mode == "LEAVE" || $type_mode == "CTO") {
					// redirect($baseurl."view/form/{$grp_id}",'refresh');
				} 
				
					$data['title'] 				= '| Applications';
					$data['biometric_id'] 		= $this->session->userdata('biometric_id');
					$data['employee_id'] 		= $this->session->userdata('employee_id');
					$data['usertype'] 			= $this->session->userdata('usertype');
					$data['dbm_sub_pap_id'] 	= $this->session->userdata('dbm_sub_pap_id');
					$data['division_id'] 		= $this->session->userdata('division_id');
					$data['level_sub_pap_div']  = $this->session->userdata('level_sub_pap_div');
					$data['employment_type'] 	= $this->session->userdata('employment_type');
					$data['is_head'] 			= $this->session->userdata('is_head');
					$data['type_mode'] 			= $type_mode;

					if(empty($exact_id)){
						$data['main_content'] = 'hrmis/reports/applications_view';
						$this->load->view('hrmis/admin_view',$data);

					}else{


						if($type_mode == 'OT'){

							$info['ot_id'] = $exact_id;

							$data['checkexactinfo'] =  $this->leave_model->get_ot_info($info);
							$data['main_content'] = 'hrmis/reports/applications_details_view';


							$details = $data['checkexactinfo'];



							if($details){
								
									if($details[0]->employee_id == $data['employee_id'] || $details[0]->div_chief_id == $data['employee_id'] || $details[0]->act_div_chief_id == $data['employee_id'] || $this->session->userdata('usertype')  == 'admin'){

									$this->load->view('hrmis/admin_view',$data);

								}else{
										echo 'page not found';
								}	

							}else{
								echo 'page not found';
							}


						}else{

							$data['checkexactinfo'] = $this->admin_model->getcheckexactinfo($exact_id);
							
							// get the display of signature settings 
								$data['sig_data'] = $this->Globalproc->getsettings("signature");
							// end 
							
							$data['main_content'] = 'hrmis/reports/applications_details_view';

							$details = $data['checkexactinfo'];
							
							if($details){
								
								if($details[0]->employee_id == $data['employee_id'] || $details[0]->division_chief_id == $data['employee_id'] || $details[0]->leave_authorized_official_id == $data['employee_id'] || $details[0]->paf_approved_by_id == $data['employee_id'] || $details[0]->hrmd_approved_id == $data['employee_id'] || $details[0]->paf_recorded_by_id ==  $data['employee_id'] || $this->session->userdata('usertype')  == 'admin'){
									
									$this->load->view('hrmis/admin_view',$data);

								}else{
										echo 'page not found';
								}	

							}else{
								echo 'page not found';
							}


						}

					}

			}

		}

	

		public function generatedtrs(){

			$sdate =  $_POST["sdate"];
			$edate =  $_POST["edate"];
			$userid =  $_POST["userid"];
			$area_id =  $_POST["area_id"];
			$employee_id =  $_POST["employee_id"];

/*	
			$sdate 		 =  "07/23/2018";
			$edate 		 =  "08/06/2018";
			$userid 	 =  181;
			$area_id 	 =  1;
			$employee_id =  389;
	*/		
			// echo date("m/d/Y h:i A",strtotime("6/8/2018 12:18"));
			
			$getemployee_id = $employee_id;

			$getreport = $this->admin_model->getdailytimerecordss($userid , $area_id , $employee_id , date('Y/m/d',strtotime($sdate)) ,  date('Y/m/d',strtotime($edate)));
						
		//	var_dump($getreport);
			
			$generateddate = $this->admin_model->createDateRangeArray( date('Y/m/d',strtotime($sdate)),  date('Y/m/d',strtotime($edate)));


			$holidays = $this->attendance_model->getholidays($sdate , $edate);

			$count_holidays = count($holidays);


			foreach ($generateddate as $row){
				$daterange[] = $row;
			} 


			$data['getdtrs'] = $daterange;


			$count_total_working_days = 0;
			$count_lates = 0;

			$count_undertime = 0;
			$count_ot = 0;

			$count_absences = 0;
			$count_halfday_absences = 0;

			$total_rendered_abscences = 0;

			$leave_code = '';

			$display_total_hours_rendered = '';


			$count_ps = 0;


			$compute_lates = 0;
			$compute_undertime = 0;
			$compute_ot = 0;
			$compute_absences = 0;
			$compute_ps = 0;
			$compute_halfday_absences = 0;

			$count_sl = 0;
			$count_vl = 0;

			$summary_report_tardiness = array();
			$summary_report_undertime = array();
			$summary_report_ps_personal = array();



			$shift_list = '';
			$shift_id_in = '';
			$shift_name = '';
			$current_shift = '';
			$temporary_shifts = array();

			foreach ($daterange  as $row){


				$this_date = date('n/j/Y',strtotime($row));
				$date = substr(date('l',strtotime($row)), 0, 2);



				/* check if file as ot */

				$check_ot = $this->getfileot($this_date , $getemployee_id);



				/* shifting  data */


				$shift = $this->getemployeeshifts($getemployee_id , $this_date);
				$shift_1 = $shift;

				if($shift_1[0]->is_temporary == 1){
					$temporary_shifts[] = array('date' => $this_date , 'temp_shift' => $shift_1);
				}


				if($shift_id_in != $shift_1[0]->shift_id && $shift_1[0]->is_temporary == 1){


					if($shift_1[0]->date_sch_started == $shift_1[0]->date_sch_ended){
						$date_1_1  = date('m/d/Y' , strtotime($shift_1[0]->date_sch_started));
					}else{
						$date_1_1 = date('m/d/Y' , strtotime($shift_1[0]->date_sch_started)) .' - '. date('m/d/Y' , strtotime($shift_1[0]->date_sch_ended));
					}

					$tempo_shift = '('.$date_1_1 . ') - '.$shift_1[0]->shift_name;
					$shift_list .= $tempo_shift.'<br>';

				}

				if($shift_id_in != $shift_1[0]->shift_id && $shift_1[0]->is_temporary != 1){

					$shift_name =  $shift_1[0]->shift_name;
					$current_shift = $shift_1;
				}
			
				

				$shift_id_in = $shift_1[0]->shift_id;
				$data['shifting_msg'] = 'testing';


			   /*  end shifting  data */


				if($date == 'Sa' || $date == 'Su'){
					if($this->checkifholiday($holidays ,$this_date) == TRUE){
						$is_holiday = 1;
					}else{
						$is_holiday = 0;
					}

				}else{

					if($this->checkifholiday($holidays ,$this_date) == TRUE){
						$is_holiday = 1;
					}else{
						$is_holiday = 0;
						$count_total_working_days++;
					}
					
				}


				$flag_absences = 0;
				$total_rendered_abscences = 0;
				$count_absences_float = 0;
	

				$in_am = "00:00";
				$out_am = "00:00";

				$in_pm = "00:00";
				$out_pm = "00:00";



				$total_lates = "00:00";
				$total_late_am = "00:00";
				$total_late_pm = "00:00";



				$total_undertime = "00:00";
				$total_undertime_am = "00:00";
				$total_undertime_pm = "00:00";
				$total_ot_pm = "00:00";




				$final_late = "";
				$final_undertime = "";
				$final_ot = "";
				$final_ps = "";
				$test = 0;

				$checkinarr = array();


				$array_type_mode = array();	
				$res_type_mode = array();


				$array_exact_id = array();
				$res_exact_id = array();
				$leave_codes = array();
				$leave_code_array = array();


						
					foreach ($shift_1 as $time){


									$times = "";
									$type_1 = "";
									$type_mode = "";
									$is_approved = "";
									$exact_id = 0;
									$exact_log_id = "0";
									

									$type = $time->type;

									$shift_type = $time->shift_type;


									$timeshift = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.$time->time_start);

									$time_end = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.$time->time_end);


										$is_original = '';
										$is_modified = '';	

										foreach ($getreport as $crow){

												// echo $crow->checktime."<br/>";
													$is_approved = "";
													$exact_id = "0";
													$exact_log_id = "0";

													$date_checktime = date('n/j/Y',strtotime($crow->checktime));
												//	echo $date_checktime."<br/>";
													
													$formatted = date("n/j/Y h:i: A", strtotime($crow->checktime));
												//	$login  = DateTime::createFromFormat('n/j/Y H:i A', $crow->checktime);
													$login  = DateTime::createFromFormat('n/j/Y H:i A', $formatted);
												// 	$login  = DateTime::createFromFormat('Y-m-d H:i A', $crow->checktime);
												//	$login  = date('n/j/Y H:i A', strtotime($crow->checktime));
												// 	echo $crow->checktime."<br/>";
												//	echo $login."<br/>";
												//	echo $crow->checktime."==".$login."<br/>";
													
													$type_mode = $crow->type_mode;

													$leave_code = $crow->leave_code;


													$is_approved = $crow->is_approved;
													$exact_id = $crow->exact_id;
													$exact_log_id = $crow->exact_log_id;
						
													if($this_date == $date_checktime){
														$crochecktime  = date('h:i A',strtotime($crow->checktime));
															
															if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type == "AM_START"){
																// echo $this_date."==".$date_checktime." :: ".$crochecktime." - ".$crow->checktype."<br/>"; 
																$times  = $crochecktime;
																	
																	// edits for monday
																		// holiday = $holidays[0]->holiday_date;
																		
																		$benchmark_date  =  null;
																		
																	// 	$yesterday = date('m/d/Y', strtotime('-1 day', strtotime($this_date)));
																		
																		// mark me here
																		// checkifholiday($holidays, $this_date); n/j/Y
																		$benchmark_date  =  $this_date.' '.$shift_1[0]->time_flexi_exact;
																		
																		if ( strtoupper(date("D", strtotime($crow->checktime))) == "MON" &&
																				$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false ) {
																			$benchmark_date = $this_date.' '."8:00 AM";
																		} 

																		if ( strtoupper(date("D",strtotime($this_date))) == "TUE" && 
																					$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true ) {
																			$benchmark_date = $this_date.' '."8:00 AM";
																		} 

																		if ( strtoupper(date("D",strtotime($this_date))) == "WED" && 
																					$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true && 
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-2 day', strtotime($this_date)))) == true) {
																			$benchmark_date = $this_date.' '."8:00 AM";
																		} 

																		if ( strtoupper(date("D",strtotime($this_date))) == "THU" && 
																					$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true && 
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-2 day', strtotime($this_date)))) == true &&
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-3 day', strtotime($this_date)))) == true	) {
																			$benchmark_date = $this_date.' '."8:00 AM";
																		}

																		if ( strtoupper(date("D",strtotime($this_date))) == "FRI" && 
																					$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true && 
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-2 day', strtotime($this_date)))) == true &&
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-3 day', strtotime($this_date)))) == true && 
																					$this->checkifholiday($holidays, date('n/j/Y', strtotime('-4 day', strtotime($this_date)))) == true ) {
																			$benchmark_date = $this_date.' '."8:00 AM";
																		} 
																		/*
																		if (  ) {
																			$benchmark_date  =  $this_date.' '.$shift_1[0]->time_flexi_exact;
																		}
																		*/
																		
																		
																	// end for mondays 
			
																	$total_late_am = $this->calculatetoseconds($this->calculatelates($crow->checktime, $benchmark_date, '%H:%I'));


																	$in_am = $crow->checktime;


																
																$type_1 = $crow->checktype;
																break;

															}else if ($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/Out" && $type === "C/Out"  &&  $shift_type == "AM_END" ){
																$times  = $crochecktime;

																	$total_undertime_am = $this->calculatetoseconds($this->calculateundertime($crow->checktime, $this_date.' '.$shift_1[1]->time_flexi_exact, '%H:%I'));



																	$out_am = $crow->checktime;



																$type_1 = $crow->checktype;
																break;

															}else if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type === "PM_START" ){
																$times  = $crochecktime;


																	$total_late_pm = $this->calculatetoseconds($this->calculatelates($crow->checktime, $this_date.' '.$shift_1[2]->time_flexi_exact, '%H:%I'));
																	$in_pm = $crow->checktime;


																$type_1 = $crow->checktype;
																break;
															}else if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/Out" && $type === "C/Out" &&  $shift_type === "PM_END"){
																$times  = $crochecktime;

																// calculateundertime_flexi($checktime_pm , $time_exact_pm , $time_flexi_exact_pm , $checktime_am , $time_exact_am , $time_flexi_exact_am){
																// mark me here undertime 
																
																$time_exact_pm 		 = $this_date.' '.$shift_1[3]->time_exact;
																$time_flexi_exact_pm = $this_date.' '.$shift_1[3]->time_flexi_exact;
																$time_exact_am 		 = $this_date.' '.$shift_1[0]->time_exact;
																$time_flexi_exact_am = $this_date.' '.$shift_1[0]->time_flexi_exact;
																
																if ( strtoupper(date("D", strtotime($crow->checktime))) == "MON" &&
																	$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false ) {
																		$time_exact_pm 		 = $this_date.' '."5:00 PM";
																		$time_flexi_exact_pm = $this_date.' '."5:00 PM";
																		$time_exact_am 		 = $this_date.' '."8:00 AM";
																		$time_flexi_exact_am = $this_date.' '."8:00 AM";
																} 

																if ( strtoupper(date("D",strtotime($this_date))) == "TUE" && 
																	$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true ) {
																		$time_exact_pm 		 = $this_date.' '."5:00 PM";
																		$time_flexi_exact_pm = $this_date.' '."5:00 PM";
																		$time_exact_am 		 = $this_date.' '."8:00 AM";
																		$time_flexi_exact_am = $this_date.' '."8:00 AM";
																} 

																if ( strtoupper(date("D",strtotime($this_date))) == "WED" && 
																	$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true && 
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-2 day', strtotime($this_date)))) == true) {
																		$time_exact_pm 		 = $this_date.' '."5:00 PM";
																		$time_flexi_exact_pm = $this_date.' '."5:00 PM";
																		$time_exact_am 		 = $this_date.' '."8:00 AM";
																		$time_flexi_exact_am = $this_date.' '."8:00 AM";
																} 

																if ( strtoupper(date("D",strtotime($this_date))) == "THU" && 
																	$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true && 
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-2 day', strtotime($this_date)))) == true &&
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-3 day', strtotime($this_date)))) == true	) {
																		$time_exact_pm 		 = $this_date.' '."5:00 PM";
																		$time_flexi_exact_pm = $this_date.' '."5:00 PM";
																		$time_exact_am 		 = $this_date.' '."8:00 AM";
																		$time_flexi_exact_am = $this_date.' '."8:00 AM";
																} 

																if ( strtoupper(date("D",strtotime($this_date))) == "FRI" && 
																	$this->checkifholiday($holidays, date("n/j/Y",strtotime($this_date))) == false &&
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-1 day', strtotime($this_date)))) == true && 
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-2 day', strtotime($this_date)))) == true &&
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-3 day', strtotime($this_date)))) == true && 
																	$this->checkifholiday($holidays, date('n/j/Y', strtotime('-4 day', strtotime($this_date)))) == true ) {
																		$time_exact_pm 		 = $this_date.' '."5:00 PM";
																		$time_flexi_exact_pm = $this_date.' '."5:00 PM";
																		$time_exact_am 		 = $this_date.' '."8:00 AM";
																		$time_flexi_exact_am = $this_date.' '."8:00 AM";
																}
																
																	// $total_undertime_pm = $this->calculatetoseconds($this->calculateundertime_flexi($crow->checktime, $this_date.' '.$shift_1[3]->time_exact, $this_date.' '.$shift_1[3]->time_flexi_exact , $in_am , $this_date.' '.$shift_1[0]->time_exact , $this_date.' '.$shift_1[0]->time_flexi_exact ));
																	$total_undertime_pm = $this->calculatetoseconds($this->calculateundertime_flexi($crow->checktime, $time_exact_pm, $time_flexi_exact_pm , $in_am , $time_exact_am , $time_flexi_exact_am ));


																	$ot_total = $this->calculateot($this_date.' '.$shift_1[0]->time_exact , $this_date.' '.$shift_1[0]->time_flexi_exact , $this_date.' '.$shift_1[3]->time_exact , $this_date.' '.$shift_1[3]->time_flexi_exact , $in_am , $crow->checktime);


																	$total_ot_pm = $this->calculatetoseconds($ot_total['ot_total']);


																	$out_pm = $crow->checktime;

																$type_1 = $crow->checktype;
																break;
															}	
					

													}else{
														$type_mode = '0';
														$final_late = '';
														$final_undertime = '';

													}

										} /*  end loop $getreport $crow*/




										if ($this->in_multiarray($shift_type, $checkinarr,"shift")) 
										{

										}
										else
										{


											if($type_mode != '0'){

												$array_type_mode[]  = $type_mode;
												$res_type_mode = array_unique($array_type_mode , SORT_REGULAR );

												$array_exact_id[] = $exact_id;
												$res_exact_id = array_unique($array_exact_id , SORT_REGULAR ); 

												$leave_code_array[] = $leave_code;
												$leave_codes = array_unique($leave_code_array , SORT_REGULAR ); 

											}







											if($in_am != '00:00' && $out_am != '00:00'){
												$total_hours_rendered_seconds_am = $this->calculatetoseconds($this->totalhours($in_am, $out_am, '%H:%I'));
												
											}else{
												$total_hours_rendered_seconds_am = '00:00';
											}


											if($in_pm != '00:00' && $out_pm != '00:00'){
												$total_hours_rendered_seconds_pm = $this->calculatetoseconds($this->totalhours($in_pm, $out_pm, '%H:%I'));
												
											}else{
												$total_hours_rendered_seconds_pm = '00:00';
											}


											/* FOR TOTAL RENDERED  A IC H N/A */
							
											$compute_total_rendered = $this->compute_total_rendered($this_date , $date, $in_am , $out_am , $in_pm , $out_pm , $holidays , $total_hours_rendered_seconds_am , $total_hours_rendered_seconds_pm);

											$flag_absences = $compute_total_rendered['flag_absences'];
											$display_total_hours_rendered = $compute_total_rendered['display_total_hours_rendered'];




											if($date === 'Sa' || $date  === 'Su'){


												if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am + $total_hours_rendered_seconds_pm);
												}else if($total_hours_rendered_seconds_am == '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_pm);
												}else if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm == '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am);
												}


											}else{


												if($this->checkifholiday($holidays ,$this_date) == TRUE){


														if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am + $total_hours_rendered_seconds_pm);
														}else if($total_hours_rendered_seconds_am == '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_pm);
														}else if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm == '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am);
														}


												}else{

														if($total_late_am != '00:00' || $total_late_pm != '00:00'){
															$final_late =  $this->computetotaldhm($total_late_am + $total_late_pm);														
														}

														if($total_undertime_am != '00:00' || $total_undertime_pm != '00:00'){
															$final_undertime = $this->computetotaldhm($total_undertime_am + $total_undertime_pm);
														}

														if($total_ot_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_ot_pm);
														}

												}


											}






											$checkinarr[] = array( 'TIME' => $times , 'CHECKTYPE' => $type_1 , 'shift' => $shift_type , 'TYPE_MODE' => $type_mode  , 'IS_APPROVED' => $is_approved , 'exact_id' => $exact_id , 'exact_log_id' => $exact_log_id);


										}  /* end function in_multiarray*/

						

					} /* end loop shifting */




				/* compute totals */


				if($final_late != ''){

					$summary_report_tardiness[] = array('date_late' => date('j-M-y',strtotime($this_date)) , 'final_late' => '0:'.$final_late);

					$compute_lates+= $this->calculatetoseconds($final_late);
			
					$count_lates++;
				}	




				if($final_undertime != ''){

					$summary_report_undertime[] = array('date_undertime' => date('j-M-y',strtotime($this_date)) , 'final_undertime' => '0:'.$final_undertime);
					$compute_undertime+= $this->calculatetoseconds($final_undertime);
					$count_undertime++;
				}



/*				if($final_ot != ''){
					$compute_ot+= $this->calculatetoseconds($final_ot);
					$count_ot++;
				}*/


			
				if($flag_absences == 1){
					$count_absences++;
					$compute_absences+= $this->calculatetoseconds('08:00');

				}else if ($flag_absences == 2){
					$count_halfday_absences += .5;
					$compute_halfday_absences+= $this->calculatetoseconds('04:00');
				}


				if(current($res_type_mode) == 'PS'){
					$count_ps++;

					$summary_report_ps_personal = array();

					$summary_ps = $this->calculateps(current($res_exact_id), $shift_1);
					if($summary_ps != '00:00'){
						$summary_report_ps_personal[] = array('date_ps' => date('j-M-y',strtotime($this_date)) , 'compute_ps' => '0:'.$summary_ps);
					}

					$compute_ps += $this->calculatetoseconds($this->calculateps(current($res_exact_id), $shift_1));

				

					$final_ps = $this->calculatepsall(current($res_exact_id) , $shift_1);
					if($final_ps == '00:00'){
						$final_ps = '';
					}
				}


				if(current($res_type_mode) == 'LEAVE'){
					$display_exception = current($leave_codes);

					if($display_exception == 'SL'){
						$count_sl++;
					}else if($display_exception == 'VL'){
						$count_vl++;
					}



				}else{

					$display_exception = $res_type_mode;
				}



				if(current($res_exact_id) != 0){
					$this->load->model('reports_model');
					$is_approved_result =  $this->reports_model->checkexact_isapproved(current($res_exact_id));
				}else{
					$is_approved_result = 0;
				}




				$dtr_array[] = array('CHECKDATE' => $this_date.' '.$date , 'CHECKINOUT' => $checkinarr , 'EXCEPTION' => $display_exception, 'IS_APPROVED' => $is_approved_result , 'lates' => $final_late , 'undertime' => $final_undertime , 'exact_id' => current($res_exact_id) , 'total_hours_rendered' => $display_total_hours_rendered , 'final_ps' => $final_ps , 'final_ot' => $final_ot , 'ot_id' => $check_ot['ot_id'] , 'div_is_approved' => $check_ot['div_is_approved'] , 'is_holiday' => $is_holiday);





			} /* end loop daterange */




			$tot_count = $count_lates + $count_undertime + $count_ps;

			$tot_lates = $this->calculatetoseconds($this->computetotaldhm($compute_lates , '%H:%I'));
			$tot_undertime = $this->calculatetoseconds($this->computetotaldhm($compute_undertime , '%H:%I'));
			$tot_absences = $this->calculatetoseconds_1($this->computetotaldhm($compute_absences + $compute_halfday_absences , '%a:%H:%I'));
			$tot_ps = $this->calculatetoseconds_1($this->computetotaldhm($compute_ps , '%a:%H:%I'));

			$data['summary_report_tardiness'] = $summary_report_tardiness;
			$data['summary_report_undertime'] = $summary_report_undertime;
			$data['summary_report_ps_personal'] = $summary_report_ps_personal;

			$data['dtr_array'] = $dtr_array;
			$data['employee_id'] = $getemployee_id;

			$data['shift'] = $current_shift;
			$data['temporary_shift'] = $temporary_shifts;

			$data['count_sl'] = $count_sl;
			$data['count_vl'] = $count_vl;


			$data['count_ps'] = $count_ps; 
			$data['compute_ps'] = $this->timeformat_8hours($this->computetotaldhm($compute_ps , '%a:%H:%I'),2);


			$data['count_lates'] = $count_lates;
			$data['compute_lates'] =  $this->timeformat_8hours($this->computetotaldhm($compute_lates , '%a:%H:%I'),2);

			$data['count_undertime'] = $count_undertime;
			$data['compute_undertime'] = $this->timeformat_8hours($this->computetotaldhm($compute_undertime , '%a:%H:%I'),2);

			$data['count_absences'] = $count_absences + $count_halfday_absences ;
			$data['compute_absences'] = $this->timeformat_8hours($this->computetotaldhm($compute_absences + $compute_halfday_absences, '%a:%H:%I'),2);


			$data['count_total']  = $tot_count + $count_absences + $count_halfday_absences;
			$data['compute_total']  = $this->timeformat_8hours($this->computetotaldhm($tot_lates + $tot_undertime + $tot_absences + $tot_ps , '%a:%H:%I'),2);

			$data['count_total_working_days'] = $count_total_working_days;

			$format = $count_total_working_days - $data['count_absences'];

			if($this->is_decimal($format)){
				$data['count_total_services_rendered'] = floor($format).':04:00';

			}else{
				$data['count_total_services_rendered'] = $format.':00:00';
			}


			$data['total_holidays'] = $count_holidays;
			$data['total_holiday_services_r'] = '0:00:00';
			$data['total_holiday_tardiness_undertime'] = '0:00:00';


			$data['time_shift_schedule'] = $shift_name;
			$data['temporary_time_shifts'] = $shift_list;
			$data['tardiness_undertime'] =  $this->timeformat_8hours($this->computetotaldhm($tot_lates + $tot_undertime  + $tot_ps,  '%a:%H:%I'));


			$info['employee_id'] = $getemployee_id;
			$data['employee_details'] = $this->personnel_model->get_employees($info);


			echo json_encode($data);
		}




		






		function is_decimal( $val )
		{
		    return is_numeric( $val ) && floor( $val ) != $val;
		}




		function calculatepsall($exact_id , $shift ){

			$checkexactinfo = $this->admin_model->getcheckexactinfo($exact_id);

			$checkexact =  json_decode(json_encode($checkexactinfo), true);


			//if($checkexact[0]['ps_type'] == 2 ){

					$date = $checkexact[0]['checkdate'];
					$time_out = $date.' '.$checkexact[0]['time_out'];
					$time_in = $date.' '.$checkexact[0]['time_in'];


					$time_out_1  = DateTime::createFromFormat('n/j/Y H:i A', $time_out);
					$time_in_1  = DateTime::createFromFormat('n/j/Y H:i A', $time_in);


					foreach ($shift as $row) {
						$name = $row->shift_type;
						$$name = $date.' '.$row->time_flexi_exact;
					}


		    	  $amstart = DateTime::createFromFormat('n/j/Y H:i A',$AM_START);	
		    	  $amend = DateTime::createFromFormat('n/j/Y H:i A', $AM_END);
		    	  $pmstart = DateTime::createFromFormat('n/j/Y H:i A',$PM_START);
		    	  $pmend = DateTime::createFromFormat('n/j/Y H:i A', $PM_END);


		    	  $minus_1_hour = 0;


		    	  if($time_out_1 >= $amend && $time_out_1 <= $pmstart && $time_in_1 >= $amend && $time_in_1 <= $pmstart ){

		    	  	/* if wala sa range */
		    	  	$value = '00:00';
		    	  	
		    	  }else{

					   	  if($time_out_1 < $amend && $time_in_1 > $amend){

					   	  		if($time_in_1 > $amend && $time_in_1 < $pmstart){
					   	  				$time_in  = $AM_END;
					   	  		}else{

					   	  			if($time_in_1 > $pmend){
					   	  				//echo 'minus 1 hour and minus time in end pm';
					   	  				 $minus_1_hour = $this->calculatetoseconds('01:00');
					   	  				 $time_in  = $PM_END;
					   	  			}else{
										//echo 'minus 1 hour'; /* 12 - 1PM */
										 $minus_1_hour = $this->calculatetoseconds('01:00');
					   	  			}

					   	  		}
				    	  		
				    	  }else{
				    	  		if($time_out_1 > $amend && $time_out_1 < $pmstart){
					   	  			//echo 'time in minues am end1';
					   	  			$minus_1_hour = $this->calculatetoseconds('01:00');
					   	  			$time_out = $AM_END;

					   	  			if($time_in_1 > $pmend){
					   	  				$time_in = $PM_END;
					   	  			}


					   	  		}else{

					   	  			if($time_in_1 > $pmend){
					   	  				//echo 'time in minutes end';
					   	  				//$minus_1_hour = $this->calculatetoseconds('01:00');
					   	  				$time_in = $PM_END;
					   	  			}else{

					   	  				if($time_out_1 > $pmend){
					   	  					//echo 'minus 1 hour';
					   	  					 //$minus_1_hour = $this->calculatetoseconds('01:00');
					   	  				}else{
					   	  					
					   	  				}
					   	  				
					   	  			}
					   	  			
					   	  		}
				    	  }



				    $differenceFormat = '%H:%I';

		    		$datetime1 = date_create($time_out);
				    $datetime2 = date_create($time_in);
				

					$interval = date_diff($datetime1, $datetime2);

					$test =  $interval->format($differenceFormat);

					$total_hours = $this->calculatetoseconds($test) - $minus_1_hour;

					$value = $this->computetotaldhm($total_hours , '%H:%I');
		    	  }



		    	  return   $value;
/*		   }else{
		    	 return  '00:00';
		    }*/
		  
			
		}


		function calculateps($exact_id , $shift ){

			$checkexactinfo = $this->admin_model->getcheckexactinfo($exact_id);

			$checkexact =  json_decode(json_encode($checkexactinfo), true);


			if($checkexact[0]['ps_type'] == 2 ){

					$date = $checkexact[0]['checkdate'];
					$time_out = $date.' '.$checkexact[0]['time_out'];
					$time_in = $date.' '.$checkexact[0]['time_in'];


					$time_out_1  = DateTime::createFromFormat('n/j/Y H:i A', $time_out);
					$time_in_1  = DateTime::createFromFormat('n/j/Y H:i A', $time_in);


					foreach ($shift as $row) {
						$name = $row->shift_type;
						$$name = $date.' '.$row->time_flexi_exact;
					}


		    	  $amstart = DateTime::createFromFormat('n/j/Y H:i A',$AM_START);	
		    	  $amend = DateTime::createFromFormat('n/j/Y H:i A', $AM_END);
		    	  $pmstart = DateTime::createFromFormat('n/j/Y H:i A',$PM_START);
		    	  $pmend = DateTime::createFromFormat('n/j/Y H:i A', $PM_END);


		    	  $minus_1_hour = 0;


		    	  if($time_out_1 >= $amend && $time_out_1 <= $pmstart && $time_in_1 >= $amend && $time_in_1 <= $pmstart ){

		    	  	/* if wala sa range */
		    	  	$value = '00:00';
		    	  	
		    	  }else{

					   	  if($time_out_1 < $amend && $time_in_1 > $amend){

					   	  		if($time_in_1 > $amend && $time_in_1 < $pmstart){
					   	  				$time_in  = $AM_END;
					   	  		}else{

					   	  			if($time_in_1 > $pmend){
					   	  				//echo 'minus 1 hour and minus time in end pm';
					   	  				 $minus_1_hour = $this->calculatetoseconds('01:00');
					   	  				 $time_in  = $PM_END;
					   	  			}else{
										//echo 'minus 1 hour'; /* 12 - 1PM */
										 $minus_1_hour = $this->calculatetoseconds('01:00');
					   	  			}

					   	  		}
				    	  		
				    	  }else{
				    	  		if($time_out_1 > $amend && $time_out_1 < $pmstart){
					   	  			//echo 'time in minues am end1';
					   	  			$minus_1_hour = $this->calculatetoseconds('01:00');
					   	  			$time_out = $AM_END;

					   	  			if($time_in_1 > $pmend){
					   	  				$time_in = $PM_END;
					   	  			}


					   	  		}else{

					   	  			if($time_in_1 > $pmend){
					   	  				//echo 'time in minutes end';
					   	  				//$minus_1_hour = $this->calculatetoseconds('01:00');
					   	  				$time_in = $PM_END;
					   	  			}else{

					   	  				if($time_out_1 > $pmend){
					   	  					//echo 'minus 1 hour';
					   	  					 //$minus_1_hour = $this->calculatetoseconds('01:00');
					   	  				}else{
					   	  					
					   	  				}
					   	  				
					   	  			}
					   	  			
					   	  		}
				    	  }



				    $differenceFormat = '%H:%I';

		    		$datetime1 = date_create($time_out);
				    $datetime2 = date_create($time_in);
				

					$interval = date_diff($datetime1, $datetime2);

					$test =  $interval->format($differenceFormat);

					$total_hours = $this->calculatetoseconds($test) - $minus_1_hour;

					$value = $this->computetotaldhm($total_hours , '%H:%I');
		    	  }



		    	  return   $value;
		   }else{
		    	 return  '00:00';
		    }
		  
			
		}	




		function in_multiarray($elem, $array,$field)
		{
		    $top = sizeof($array) - 1;
		    $bottom = 0;
		    while($bottom <= $top)
		    {
		        if($array[$bottom][$field] == $elem)
		            return true;
		        else 
		            if(is_array($array[$bottom][$field]))
		                if(in_multiarray($elem, ($array[$bottom][$field])))
		                    return true;

		        $bottom++;
		    }        
		    return false;
		}





		function timeformat_8hours($input, $type = 1){


			$add_day = 0;

		    list($dd  , $hr, $min) = explode(':',$input);


	  		$time = 0;

	  		$dd = $dd * 3;


	  		if($hr >= 0 && $hr <= 8){

	  			if($hr == 8){

		  			$add_day = 1;
		  			$hr = '0';
	  			}

	  		
	  		}else if($hr >= 9 && $hr <= 16){

	  			if($hr == 16){

		  			$add_day = 2;
		  			$hr = '0';
	  			}else{
	  				$add_day = 1;
	  				$tot = $hr - 8;
	  				 $hr = '0'.$tot;
	  				
	  			}

	  		}else if($hr >= 17 && $hr <= 24){

	  			if($hr == 24){

		  			$add_day = 3;
		  			$hr = '0';
	  			}else{
	  				$add_day = 2;
	  			     $tot = $hr - 16;
	  			     $hr = '0'.$tot;
	  			}

	  		}

	  		if($type == 1){
	  			return  $input_2 = $dd + $add_day .':'.$hr.':'.$min;
	  		}else if ($type == 3){
	  			return  $input_2 = $dd + $add_day .'-'.$hr.'-'.$min;
	  		}else{
	  			return array('day'=> $dd + $add_day , 'hours' => $hr , 'minutes' => $min);
	  		}	
	  			


		}




		function calculatetoseconds_1($time){


		    list ($dd , $hr, $min) = explode(':',$time);

		    $time = 0;

		    //$ts = (int)$dd) * 60 ;

		    $seconds = (((int)$dd) * 24 * 60 * 60 ) + (((int)$hr) * 60 * 60) + (((int)$min) * 60);

		    return $seconds;

		}




		function calculatetoseconds($time){


		    list ($hr, $min) = explode(':',$time);

		    $time = 0;

		    $seconds = (((int)$hr) * 60 * 60) + (((int)$min) * 60);

		    return $seconds;

		}



		function computetotaldhm_array($seconds){

		 	$dtF = new \DateTime('@0');
		    $dtT = new \DateTime("@$seconds");


		    return array('day'=> $dtF->diff($dtT)->format('%a'), 'hours' => $dtF->diff($dtT)->format('%H') , 'minutes' => $dtF->diff($dtT)->format('%I'));

		}




		function computetotaldhm($seconds, $format='%H:%I'){

		 	$dtF = new \DateTime('@0');
		    $dtT = new \DateTime("@$seconds");

		   	return $dtF->diff($dtT)->format($format);

		   
		}





		function calculatelates($checktime  ,$shift_start , $differenceFormat  = '%a'){

				   $datetime1 = date_create($checktime);
	 			   $datetime2 = date_create($shift_start);

		    	   if($datetime1 > $datetime2){
		    	   	   $interval = date_diff($datetime1, $datetime2);
		    	   	     return $interval->format($differenceFormat);
		    	   }else{
		    	   		return '00:00';
		    	   }
		}




		function calculateundertime($checktime , $shift_end, $differenceFormat  = '%a' ){

				$datetime1 = date_create($checktime);
 			    $datetime2 = date_create($shift_end);

	    	   if($datetime1 < $datetime2){
	    	   	   $interval = date_diff($datetime1, $datetime2);
	    	   	    return $interval->format($differenceFormat);
	    	   }else{
	    	   		 return '00:00';
	    	   }
		}



		function calculateundertime_flexi($checktime_pm , $time_exact_pm , $time_flexi_exact_pm , $checktime_am , $time_exact_am , $time_flexi_exact_am){
			//function calculateundertime_flexi(){

/*			$time_exact_am = 	'5/24/2016 8:00 AM';	
			$time_flexi_exact_am = 	'5/24/2016 8:15 AM';

			$time_exact_pm = '5/24/2016 5:00 PM';
			$time_flexi_exact_pm = '5/24/2016 5:15 PM';

			$checktime_am = '5/24/2016 7:59 AM';*/


			if($checktime_am == '00:00'){
				$checktime_am = $time_exact_am;
			}
			
		
	/*		$checktime_pm = '5/24/2016 4:59 PM';
*/

			
			$checktime_am_l = DateTime::createFromFormat('n/j/Y H:i A', $checktime_am);
			$checktime_pm_l = DateTime::createFromFormat('n/j/Y H:i A', $checktime_pm);

			$time_exact_pm_l = DateTime::createFromFormat('n/j/Y H:i A', $time_exact_pm);
			$time_flexi_exact_pm_l = DateTime::createFromFormat('n/j/Y H:i A', $time_flexi_exact_pm);

			$time_exact_am_l = DateTime::createFromFormat('n/j/Y H:i A', $time_exact_am);
			$time_flexi_exact_am_l = DateTime::createFromFormat('n/j/Y H:i A', $time_flexi_exact_am);



			$time_new_exact  =  date('n/j/Y h:i A', strtotime('+9 hours', strtotime($checktime_am)));
			$time_new_exact_l = DateTime::createFromFormat('n/j/Y H:i A', $time_new_exact);




			if($time_exact_am_l == $time_flexi_exact_am_l){ /* if JO */

					$shift_end  = $time_exact_pm;

			}else{ /* if regular flex time schedule */

				if($checktime_am_l <= $time_flexi_exact_am_l && $checktime_am_l >= $time_exact_am_l){
					$shift_end  = $time_new_exact;
				}else{

					if($checktime_am_l > $time_exact_am_l){ /* if above 8:15 */
						$shift_end  = $time_flexi_exact_pm;

					}else if ($checktime_am_l < $time_exact_am_l){ /* if below 8:00 */

						$shift_end  = $time_exact_pm;
					}
		
					
				}

			}


			$differenceFormat = '%H:%I';

				$datetime1 = date_create($checktime_pm);
 			    $datetime2 = date_create($shift_end);

	    	   if($datetime1 < $datetime2){
	    	   	   $interval = date_diff($datetime1, $datetime2);
	    	   	    return  $interval->format($differenceFormat);
	    	   }else{
	    	   		 return '00:00';
	    	   }
		}


		function totalhours($date_1 , $date_2 , $differenceFormat = '%a'  , $type = '')
		{

		    		$datetime1 = date_create($date_1);
				    $datetime2 = date_create($date_2);
		

			$interval = date_diff($datetime1, $datetime2);
    	   	return $interval->format($differenceFormat);
    	  
		}





		function updatesummaryreports(){

			$info = $this->input->post('info');	

			$this->load->model('reports_model');

			$result = $this->reports_model->update_summary_reports($info);
			
			if($result){
				// EMAIL
				$this->load->model("v2main/Globalproc");
				$deductionlogs  = $this->Globalproc->gdtf("dtr_summary_reports",["sum_reports_id"=>$result],["deduction_logs","employee_id"]);
				$empid 			= $deductionlogs[0]->employee_id;
				$deductionlogs = $deductionlogs[0]->deduction_logs;
				
				$a = json_decode($deductionlogs);
				
				$ret = false;
				
				if (count($a->tardiness) > 0) {
					
					for( $i = 0; $i <= count($a->tardiness)-1 ; $i++ ) {
						$late = $a->tardiness[$i]->final_late;
						list($d,$h,$mins) = explode(":",$late);
						$type_details = [
							"typemode"		 => "t",
							"leave_value"    => 0,
							"hrs"  			 => $h,
							"mins" 			 => $mins,
							"date_inclusion" => date("M d, Y",strtotime($a->tardiness[$i]->date_late)),
							"formonet"		 => 0
						];

						$cont = false;
						
						if ($h==0) {
							if($mins==0) {
								$cont = false;
							} else {
								$cont = true;
							}
						} else {
							$cont = true;
						}
						
						if ($cont) {
							$ret = $this->Globalproc->calc_leavecredits($empid, $result, $type_details);
						}
					}
					
				}
			
				if (count($a->undertime) > 0) {
					
					for($m = 0 ; $m <= count($a->undertime)-1;$m++) {
						$under = $a->undertime[$m]->final_undertime;
							
						list($d,$h,$mins) = explode(":",$under);
						$type_details = [
							"typemode"		 => "ut",
							"leave_value"    => 0,
							"hrs"  			 => $h,
							"mins" 			 => $mins,
							"date_inclusion" => date("M d, Y",strtotime($a->undertime[$m]->date_undertime)),
							"formonet"		 => 0
						];

						$cont = false;
						
						if ($h==0) {
							if($mins==0) {
								$cont = false;
							} else {
								$cont = true;
							}
						} else {
							$cont = true;
						}
						
						if ($cont) {
							$ret = $this->Globalproc->calc_leavecredits($empid, $result, $type_details);
						}
					}
				}
			//	return;
				//if($ret){
					echo json_encode($result);
				//}
			}


		}
		
		public function testdedlog() {
			$this->load->model("v2main/Globalproc");
				// 2154 = 0
				// 2149 > 0
			$deductionlogs = $this->Globalproc->gdtf("dtr_summary_reports",["sum_reports_id"=>2149],"deduction_logs")[0]->deduction_logs;
			$a = json_decode($deductionlogs);

			$ret = false;
			
			if (count($a->tardiness) > 0) {
				
				for( $i = 0; $i <= count($a->tardiness)-1 ; $i++ ) {
					$late = $a->tardiness[$i]->final_late;
					list($h,$mins,$sec) = explode(":",$late);
					$type_details = [
						"typemode"		 => "t",
						"leave_value"    => 0,
						"hrs"  			 => $h,
						"mins" 			 => $mins,
						"date_inclusion" => date("M d, Y",strtotime($a->tardiness[$i]->date_late))
					];

					$cont = false;
					
					if ($h==0) {
						if($mins==0) {
							$cont = false;
						} else {
							$cont = true;
						}
					} else {
						$cont = true;
					}
					
					if ($cont) {
						$ret = $this->Globalproc->calc_leavecredits(62, null, $type_details);
					}
				}
				
			}
			
			if (count($a->undertime) > 0) {
				for($m = 0 ; $m <= count($a->undertime)-1;$m++) {
					$under = $a->undertime[$m]->final_late;
					
					list($h,$mins,$sec) = explode(":",$under);
					$type_details = [
						"typemode"		 => "ut",
						"leave_value"    => 0,
						"hrs"  			 => $h,
						"mins" 			 => $mins,
						"date_inclusion" => date("M d, Y",strtotime($a->undertime[$i]->date_late))
					];

					$cont = false;
					
					if ($h==0) {
						if($mins==0) {
							$cont = false;
						} else {
							$cont = true;
						}
					} else {
						$cont = true;
					}
					
					if ($cont) {
						$ret = $this->Globalproc->calc_leavecredits(62, null, $type_details);
					}
				}
			}
			
			echo $ret;
		}


		function getdtrsummaryreports(){

			$info = $this->input->post('info');	
			$this->load->model('reports_model');

			$result = $this->reports_model->get_dtr_summary_reports($info);

			if($result){
				echo json_encode($result);
			}else{
				echo json_encode(false);
			}

		}

		function get_dtr_summary_reportsjo_notsubmitted(){
			$info = $this->input->post('info');	
			$this->load->model('reports_model');

			$result = $this->reports_model->get_dtr_summary_reportsjo_notsubmitted($info);

			if($result){
				echo json_encode($result);
			}else{
				echo json_encode(false);
			}
		}


		function cancelapplications(){

			$info = $this->input->post('info');	

			$result = $this->reports_model->cancel_applications($info);

			if($result){
				echo json_encode($result);
			}else{
				echo json_encode(false);
			}

		}




		function getemployeeshifts($employee_id , $this_date){

/*	function getemployeeshifts(){

		$employee_id = 62;
			$this_date = '6/10/2016';*/

			$result = $this->attendance_model->getemployeeshift($employee_id , $this_date);
			$result_shift  = array();
			$result_temporary = array();
			$result_1 = array();

			if($result['result'] != 0){

				$shifts = $result['result'];
				foreach ($shifts as $row) {

					if($row->is_temporary == 1){
						$result_temporary[] = $row;
					}else{
						$result_shift[] = $row;
					}
				}
			}


			if(count($result_temporary)){
				$result_1 = $result_temporary;
			}else{
				$result_1 = $result_shift;
			}


/*			echo  '<pre/>';
			print_r($result_1);
*/
			return $result_1;
		}	







		function checkifholiday($holidays, $this_date){

		//function test(){

			//$this_date = '7/6/2016';

			//$holidays = $this->attendance_model->getholidays('07/01/2016' , '07/16/2016');	



			$holidays_array = array();

			
			foreach ($holidays as $rows) {
				$holidays_array[] = date('n/j/Y', strtotime($rows->holiday_date));;
			}



			if (in_array($this_date, $holidays_array)) {
			   return  true;
			}else{
			   return false;
			}


		}





		function calculateot($time_exact_am , $time_flexi_exact_am , $time_exact_pm , $time_flexi_exact_pm , $checktime_am , $checktime_pm) {


	/*			$time_exact_am = 	'5/24/2016 8:00 AM';	
				$time_flexi_exact_am = 	'5/24/2016 8:15 AM';

				$time_exact_pm = '5/24/2016 5:00 PM';
				$time_flexi_exact_pm = '5/24/2016 5:15 PM';

				$checktime_am = '5/24/2016 8:15 AM';

				$checktime_pm = '5/24/2016 5:50 PM';*/


				if($checktime_am == '00:00'){
					$checktime_am = $time_flexi_exact_am;
				}
				

				
				$checktime_am_l = DateTime::createFromFormat('n/j/Y H:i A', $checktime_am);
				$checktime_pm_l = DateTime::createFromFormat('n/j/Y H:i A', $checktime_pm);

				$time_exact_pm_l = DateTime::createFromFormat('n/j/Y H:i A', $time_exact_pm);
				$time_flexi_exact_pm_l = DateTime::createFromFormat('n/j/Y H:i A', $time_flexi_exact_pm);

				$time_exact_am_l = DateTime::createFromFormat('n/j/Y H:i A', $time_exact_am);
				$time_flexi_exact_am_l = DateTime::createFromFormat('n/j/Y H:i A', $time_flexi_exact_am);



				$time_new_exact  =  date('n/j/Y h:i A', strtotime('+9 hours', strtotime($checktime_am)));
				$time_new_exact_l = DateTime::createFromFormat('n/j/Y H:i A', $time_new_exact);



				if($time_exact_am_l == $time_flexi_exact_am_l){ /* if JO */

						$shift_end  = $time_exact_pm;

				}else{ /* if regular flex time schedule */

					if($checktime_am_l <= $time_flexi_exact_am_l && $checktime_am_l >= $time_exact_am_l){
						$shift_end  = $time_new_exact;
					}else{

						if($checktime_am_l > $time_exact_am_l){ /* if above 8:15 */
							$shift_end  = $time_flexi_exact_pm;

						}else if ($checktime_am_l < $time_exact_am_l){ /* if below 8:00 */

							$shift_end  = $time_exact_pm;
						}
			
						
					}

				}


				$differenceFormat = '%H:%I';

					$datetime1 = date_create($checktime_pm);
	 			    $datetime2 = date_create(date('n/j/Y h:i A', strtotime('+30 minutes', strtotime($shift_end))));

		    	   if($datetime1 > $datetime2){
		    	   	   $interval = date_diff($datetime1, $datetime2);
		    	   	     return array('ot_total' => $interval->format($differenceFormat) , 'ot_actual_time_in_out' => date('h:i A', strtotime('+30 minutes', strtotime($shift_end))) . ' - ' . date('h:i A',strtotime($checktime_pm))); 
		    	   		
		    	   }else{
		    	   	 return array('ot_total' => '00:00', 'ot_actual_time_in_out' => '');
		    	   }

			}



			function compute_total_rendered($this_date , $date, $in_am , $out_am , $in_pm , $out_pm , $holidays , $total_hours_rendered_seconds_am , $total_hours_rendered_seconds_pm){


							$flag_absences = 0;
							$display_total_hours_rendered ='';

						if($in_am == '00:00' && $out_am == '00:00' && $in_pm == '00:00' && $out_pm == '00:00'){	

							$flag_absences = 0;

							if($date == 'Sa' || $date == 'Su'){

								$display_total_hours_rendered = '';	

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = '(H)';	
								}else{
									$display_total_hours_rendered = '';		
								}

							}else{

									$current_date = date("n/j/Y");
									$date_to_compare = $this_date;

									if (strtotime($date_to_compare) < strtotime($current_date)) {


											if($this->checkifholiday($holidays ,$this_date) == TRUE){
												$display_total_hours_rendered = '(H)';	
											}else{
												$flag_absences = 1;
												$display_total_hours_rendered = 'A';		
											}

									}else{


											if($this->checkifholiday($holidays ,$this_date) == TRUE){
												$display_total_hours_rendered = '(H)';	
											}else{
												$display_total_hours_rendered = '';		
											}
									
									}

							}



						}else if($in_am == '00:00' && $out_am == '00:00' && $in_pm != '00:00' && $out_pm != '00:00'){


							if($date == 'Sa' || $date == 'Su'){

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = '(H) | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);	
								}else{
									$display_total_hours_rendered = 'N/A | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}


							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = '(H) | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);	
								}else{
									$flag_absences = 2;
									$display_total_hours_rendered = 'A | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}

							}



						}else if($in_am != '00:00' && $out_am != '00:00' && $in_pm == '00:00' && $out_pm == '00:00' ){


							if($date == 'Sa' || $date == 'Su'){


								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | (H)';
								}else{
									$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | N/A';
								}


							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | (H)';
								}else{
									$flag_absences = 2;
									$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | A';
								}

							}

						}else if ($in_am != '00:00' && $out_am == '00:00'  && $in_pm == '00:00' && $out_pm == '00:00'){
							
							

							if($date == 'Sa' || $date == 'Su'){

								
								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='IC | (H)';
								}else{
									$display_total_hours_rendered ='IC | N/A';
								}

							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='IC | (H)';
								}else{
									$flag_absences = 1;	
									$display_total_hours_rendered ='IC | A';
								}

							}


						}else if ($in_am == '00:00' && $out_am != '00:00' && $in_pm == '00:00' && $out_pm == '00:00'){
							
							

							if($date == 'Sa' || $date == 'Su'){

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='IC | (H)';
								}else{
									$display_total_hours_rendered ='IC | N/A';
								}

							}else{
								
								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='IC | (H)';
								}else{
									$flag_absences = 1;	
									$display_total_hours_rendered ='IC | A';
								}
							}


						}else if ($in_am == '00:00' && $out_am == '00:00' && $in_pm != '00:00' && $out_pm == '00:00'){
							
							

							if($date == 'Sa' || $date == 'Su'){

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='(H) | IC';
								}else{
									$display_total_hours_rendered ='N/A | IC';
								}

							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='(H) | IC';
								}else{
									$flag_absences = 1;	
									$display_total_hours_rendered ='A | IC';
								}


							}


						}else if ($in_am == '00:00' && $out_am == '00:00' &&  $in_pm == '00:00' && $out_pm != '00:00'){
							
							

							if($date == 'Sa' || $date == 'Su'){
								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='(H) | IC';
								}else{
									$display_total_hours_rendered ='N/A | IC';
								}
							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='(H) | IC';
								}else{
									$flag_absences = 1;	
									$display_total_hours_rendered ='A | IC';
								}

							}


						}else if ($in_am !== '00:00' && $out_am != '00:00' && $in_pm != '00:00' && $out_pm != '00:00'){

							$flag_absences = 0;	

							if($this->checkifholiday($holidays ,$this_date) == TRUE){
								$display_total_hours_rendered = '(H)'.$this->computetotaldhm($total_hours_rendered_seconds_am).' | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
							}else{
								$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
							}

							

						}else if($in_am == '00:00' && $out_am != '00:00' && $in_pm != '00:00' && $out_pm != '00:00'){
							

							if($date == 'Sa' || $date == 'Su'){
								
								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='(H) | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}else{
									$display_total_hours_rendered ='N/A | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}

							}else{


								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = '(H) IC | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}else{
									$flag_absences = 2;	
									$display_total_hours_rendered = 'IC | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}

							}	

							

						}else if($in_am != '00:00' && $out_am == '00:00' && $in_pm != '00:00' && $out_pm != '00:00'){
							

							if($date == 'Sa' || $date == 'Su'){

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered ='(H) | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}else{
									$display_total_hours_rendered ='N/A | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}

							}else{


								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = '(H) IC | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}else{
									$flag_absences = 2;	
									$display_total_hours_rendered = 'IC | '.$this->computetotaldhm($total_hours_rendered_seconds_pm);
								}



							}

							
						}else if($in_am != '00:00' && $out_am != '00:00' && $in_pm != '00:00' && $out_pm == '00:00'){
							

							if($date == 'Sa' || $date == 'Su'){

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
										$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | (H)';
								}else{
										$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | N/A';
								}	

							
							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | (H)';
								}else{
									$flag_absences = 2;	
									$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | IC';
								}	


							}


						}else if($in_am != '00:00' && $out_am != '00:00' && $in_pm == '00:00' && $out_pm != '00:00'){


							if($date == 'Sa' || $date == 'Su'){

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
										$display_total_hours_rendered = '(H) '.$this->computetotaldhm($total_hours_rendered_seconds_am).' | IC';
								}else{
										$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | N/A';
								}

							
							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
									$display_total_hours_rendered = '(H) '.$this->computetotaldhm($total_hours_rendered_seconds_am).' | IC';
								}else{
									$flag_absences = 2;	
									$display_total_hours_rendered = $this->computetotaldhm($total_hours_rendered_seconds_am).' | IC';
								}													

							}



						}

						else{

							if($date == 'Sa' || $date == 'Su'){

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
										$display_total_hours_rendered = '(H) IC';
								}else{
										$display_total_hours_rendered = 'IC';
								}	
									
								
							}else{

								if($this->checkifholiday($holidays ,$this_date) == TRUE){
										$display_total_hours_rendered = '(H) IC';
								}else{
									$flag_absences = 1;	
									$display_total_hours_rendered = 'IC';
								}	

							}	
								

						}



						return array('flag_absences' => $flag_absences , 'display_total_hours_rendered' => $display_total_hours_rendered);


			}






		/* testing functions ===================================================================================================================*/


		function testing(){


		//////////////////////////////////////////////////////////////////////
		//PARA: Date Should In YYYY-MM-DD Format
		//RESULT FORMAT:
		// '%y Year %m Month %d Day %h Hours %i Minute %s Seconds'        =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
		// '%y Year %m Month %d Day'                                    =>  1 Year 3 Month 14 Days
		// '%m Month %d Day'                                            =>  3 Month 14 Day
		// '%d Day %h Hours'                                            =>  14 Day 11 Hours
		// '%d Day'                                                        =>  14 Days
		// '%h Hours %i Minute %s Seconds'                                =>  11 Hours 49 Minute 36 Seconds
		// '%i Minute %s Seconds'                                        =>  49 Minute 36 Seconds
		// '%h Hours                                                    =>  11 Hours
		// '%a Days                                                        =>  468 Days



			$sdate= '4/1/2016 12:00:01 AM';
			$edate= '4/30/2016 11:59:59 PM';
			$userid = '40';

			$userid = '40';

			/*checkinout  am */

			$sdate_am = '4/1/2016 8:00:00 AM';
			$edate_am = '4/1/2016 12:01:00 AM';

			/*checkinout pm */
			$sdate_pm = '4/1/2016 1:00:00 PM';
			$edate_pm = '4/1/2016 5:00:00 PM';



			/* flexi shift AM */

			$shift_start_am_in = '4/1/2016 8:00:00 AM';
			$shift_end_am_in =	'4/1/2016 8:15:00 AM';

			$shift_start_am_out = '4/1/2016 12:00 PM';
			$shift_end_am_out =  '4/1/2016 12:00 PM'; 


			/* flexi shift PM */

			$shift_start_pm_in = '4/1/2016 1:00:00 PM';
			$shift_end_pm_in =	'4/1/2016 1:00:00 PM';



			$shift_start_pm_out = '4/1/2016 5:00 PM';
			$shift_end_pm_out =  '4/1/2016 5:15 PM'; 








			/*calculate lates & undertime AM & PM */

			$am_start = $this->calculatelates($sdate_am , $shift_end_am_in, '%d Day %h Hour/s %i Minute/s');
			$am_end = $this->calculateundertime($edate_am, $shift_end_am_out, '%d Day %h Hour/s %i Minute/s');


			$pm_start = $this->calculatelates($sdate_pm, $shift_end_pm_in, '%d Day %h Hour/s %i Minute/s');
			$pm_end = $this->calculateundertime($edate_pm, $shift_end_pm_out, '%d Day %h Hour/s %i Minute/s');



			$totalhoursam = $this->totalhours($sdate_am, $edate_am, '%H:%I', 'AM');
			$totalhourspm = $this->totalhours($sdate_pm, $edate_pm, '%d  %h  %i Minute/s' ,'PM');








			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
					



		echo "<br>";


		$time_1 = $this->calculatetoseconds($this->calculateundertime($edate_am , $shift_end_am_out, '%H:%I:%S'));
		$time_2 = $this->calculatetoseconds($this->calculatelates($sdate_am , $shift_end_am_in, '%a:%H:%I'));



		echo $this->computetotaldhm($this->calculatetoseconds_1($time_2), '%a:%H:%I');






			echo "<br>";

			echo "<br>";
			echo "<br>";




			$am_shift =	'( '.date('h:i A',strtotime($shift_start_am_in)).' - '.date('h:i A',strtotime($shift_end_am_in)). ' )  -  ( 	'.date('h:i A',strtotime($shift_start_am_out)). ' - '.date('h:i A',strtotime($shift_end_am_out)).' )'; 
			
			$pm_shift =	'( '.date('h:i A',strtotime($shift_start_pm_in)).' - '.date('h:i A',strtotime($shift_end_pm_in)). ' )  -  ( '.date('h:i A',strtotime($shift_start_pm_out)). ' - '.date('h:i A',strtotime($shift_end_pm_out)).' )'; 



			echo 'FLEXI SCHEDULE';
			echo "<hr>";
			echo "<br>";
			echo 'MORNING SHIFT';
			echo "<br>";
			echo $am_shift;


			echo "<hr>";
			echo "IN";
			echo "<br>";
			echo $am_start;
			echo "<br>";
			echo "OUT";
			echo "<br>";
			echo $am_end;
			echo "<br>";
			echo "<br>";

			echo $totalhoursam .' =  Total hours rendered';
			echo "<br>";
			echo "<br>";
			echo "<br>";

			echo 'AFTERNOON SHIFT';
			echo "<br>";
			echo $pm_shift; 

			echo "<hr>";
			echo "IN";
			echo "<br>";
			echo $pm_start;
			echo "<br>";
			echo "OUT";
			echo "<br>";
			echo $pm_end;
			echo "<br>";
			echo "<br>";

			echo $totalhourspm .' =  Total hours rendered';
			echo "<br>";
			echo "<br>";
			echo "<br>";
		

			echo 'NON FLEXI SCHEDULE';
			echo "<hr>";
			echo "<br>";








			$sdate= '4/1/2016 12:00:01 AM';
			$edate= '4/30/2016 11:59:59 PM';
			$userid = '120';



			/* flexi shift AM */

			$shift_start_am_in = '4/1/2016 8:00:00 AM';
			$shift_end_am_in =	'4/1/2016 8:15:00 AM';

			$shift_start_am_out = '4/1/2016 12:00 PM';
			$shift_end_am_out =  '4/1/2016 12:00 PM'; 


			$shift_start_am_in_1 = date('h:i A',strtotime($shift_start_am_in));
 			$shift_start_am_out_1 =  date('h:i A',strtotime($shift_start_am_out));

			$getreport = $this->admin_model->getdailytimerecordss($userid ,  date('Y/m/d',strtotime($sdate)) ,  date('Y/m/d',strtotime($edate)));
			$generateddate = $this->admin_model->createDateRangeArray( date('Y/m/d',strtotime($sdate)),  date('Y/m/d',strtotime($edate)));


			foreach ($generateddate as $row){
				$daterange[] = $row;
			} 

			$data['getdtrs'] = $daterange;


			$shift = array(array('time'=> '7:00 AM' , 'type' => 'IN' , 'shift_type' => 'AM_START'), array('time' => '12:00 PM','type'=> 'OUT' , 'shift_type' => 'AM_END') , array('time' => '12:04 PM' , 'type' => 'IN' , 'shift_type' => 'PM_START') , array ('time' => '5:00 PM' , 'type' => 'OUT' ,  'shift_type' => 'PM_END'));


			$shift_1 = array(array('time'=> '7:00 AM' , 'type' => 'C/In' , 'shift_type' => 'AM_START'), array('time' => '12:00 PM','type'=> 'C/Out' , 'shift_type' => 'AM_END') , array('time' => '12:04 PM' , 'type' => 'C/In' , 'shift_type' => 'PM_START') , array ('time' => '5:00 PM' , 'type' => 'C/Out' ,  'shift_type' => 'PM_END'));


			$logs = array(array('time' => '4/1/2016 7:58 AM','type'=> 'IN') , array('time' => '4/1/2016 7:59 AM','type'=> 'IN') , array('time' => '4/1/2016 12:02 PM','type'=> 'OUT') ,  array('time' => '4/1/2016 12:04 PM' , 'type' => 'IN' ) , array ('time' => '4/1/2016 5:20 PM' , 'type' => 'OUT'));



			$checkinarrs = array();

			foreach ($shift as $time){

				$times = "";
				$type_1 = "";

				$type = $time['type'];
				$shift_type = $time['shift_type'];

/*				$timeshift = DateTime::createFromFormat('H:i A', $time['time']);

				$timesendam = DateTime::createFromFormat('H:i A', '10:00 AM');

				$timesendam_end = DateTime::createFromFormat('H:i A', '2:00 PM');

				$timesendpm = DateTime::createFromFormat('H:i A', '2:00 PM');

				$timesendpm_end  = DateTime::createFromFormat('H:i A', '11:00 PM');*/


				$timeshift = DateTime::createFromFormat('n/j/Y H:i A', '4/1/2016 '.$time['time']);

				$timesendam = DateTime::createFromFormat('n/j/Y H:i A', '4/1/2016 10:00 AM');

				$timesendam_end = DateTime::createFromFormat('n/j/Y H:i A', '4/1/2016 2:00 PM');

				$timesendpm = DateTime::createFromFormat('n/j/Y H:i A', '4/1/2016 2:00 PM');

				$timesendpm_end  = DateTime::createFromFormat('n/j/Y H:i A', '4/1/2016 11:00 PM');





				foreach ($logs as $lr){

					$login  = DateTime::createFromFormat('n/j/Y H:i A', $lr['time']);


					if($login >= $timeshift && $login <= $timesendam && $lr['type'] === "IN" && $type === "IN" &&  $shift_type == "AM_START"){
						$times  = $lr['time'];
						$type_1 = $lr['type']; 
						break;

					}else if ($login >= $timeshift && $login <= $timesendam_end && $lr['type'] === "OUT" && $type === "OUT"  &&  $shift_type == "AM_END" ){
						$times  = $lr['time'];
						$type_1 = $lr['type']; 
						break;

					}else if($login >= $timeshift && $login <= $timesendpm && $lr['type'] == "IN" && $type === "IN" &&  $shift_type == "PM_START" ){
						$times  = $lr['time'];
						$type_1 = $lr['type']; 
						break;
					}else if($login >= $timeshift && $login <= $timesendpm_end && $lr['type'] == "OUT" && $type === "OUT" &&  $shift_type == "PM_END"){
						$times  = $lr['time'];
						$type_1 = $lr['type']; 
						break;
					}

				}
					

					//$checkinarrs[] = array('TIME' => $times , 'CHECKTYPE' => $type_1 , 'shift' => $shift_type);

					if ($this->in_multiarray($shift_type, $checkinarrs,"shift")) {

					}else{

						$checkinarrs[] = array('TIME' => $times , 'CHECKTYPE' => $type_1 , 'shift' => $shift_type);
					}
		

			}



			echo "<pre/>";
			//print_r($checkinarrs);





			foreach ($daterange  as $row){

				$this_date = date('n/j/Y',strtotime($row));
				$date = substr(date('l',strtotime($row)), 0, 2);

					$checkinarr = array();



					foreach ($shift_1 as $time){


									$times = "";
									$type_1 = "";

									$type = $time['type'];

									$shift_type = $time['shift_type'];


									$timeshift = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.$time['time']);

									$timesendam = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.'10:00 AM');

									$timesendam_end = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.'2:00 PM');

									$timesendpm = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.'2:00 PM');

									$timesendpm_end  = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.'11:00 PM');



										foreach ($getreport as $crow){



													$date_checktime = date('n/j/Y',strtotime($crow->checktime));

													$login  = DateTime::createFromFormat('n/j/Y H:i A', $crow->checktime);
									
								
													if($this_date == $date_checktime){


				
															if($login >= $timeshift && $login <= $timesendam && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type == "AM_START"){
																$times  = $crow->checktime;
																$type_1 = $crow->checktype;
																break;

															}else if ($login >= $timeshift && $login <= $timesendam_end && $crow->checktype === "C/Out" && $type === "C/Out"  &&  $shift_type == "AM_END" ){
																$times  = $crow->checktime;
																$type_1 = $crow->checktype;
																break;

															}else if($login >= $timeshift && $login <= $timesendpm && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type === "PM_START" ){
																$times  = $crow->checktime;
																$type_1 = $crow->checktype;
																break;
															}else if($login >= $timeshift && $login <= $timesendpm_end && $crow->checktype === "C/Out" && $type === "C/Out" &&  $shift_type === "PM_END"){
																$times  = $crow->checktime;
																$type_1 = $crow->checktype;
																break;
															}		

													}

										}



										if ($this->in_multiarray($shift_type, $checkinarr,"shift")) {

										}else{

											$checkinarr[] = array('TIME' => $times , 'CHECKTYPE' => $type_1 , 'shift' => $shift_type);
										}


					}				




				$dtr_array[] = array('CHECKDATE' => $this_date.' '.$date , 'CHECKINOUT' => $checkinarr);
		
			}



			echo "<pre/>";
			//print_r($dtr_array);
			//print_r($getreport);

		}



			function passlip(){

				$data = [];
				$data['test'] = $data;

				$this->load->view('admin/forms/leave_form_view',$data);
			}



			function calculatehoursrendered_within_shifts(){


				echo 'tets';


			}


			function getactivedtrcoverage(){

				$info = $this->input->post('info');

				$result = $this->reports_model->get_active_dtrcoverage($info);

				if($result){

					echo json_encode($result);
				}else{
					echo json_encode('');
				}

			}



		function getremaining_dtr_cover(){
				$info = $this->input->post('info');

				$result = $this->reports_model->get_remaining_dtr_cover($info);

				if($result){
					echo json_encode($result);
				}else{
					echo json_encode('');
				}
		}		

		function getthecoverid() {
			$info = $this->input->post("info");
			
			$this->load->model("v2main/Globalproc");
			
			$where = ["sum_reports_id"=>$info];
			
			$data = $this->Globalproc->gdtf("dtr_summary_reports",$where,["dtr_cover_id"])[0]->dtr_cover_id;
			
			echo json_encode($data);
		}
		
		function getthe_countersign_id() {
			$info = $this->input->post("info");
			
			$this->load->model("v2main/Globalproc");
			
			$where = ["dtr_summary_rep"=>$info];
			
			$data = $this->Globalproc->gdtf("countersign",$where,["countersign_id"]);
			
			if ( count($data) == 0 ) {
				echo json_encode("new");
			} else {
				echo json_encode($data[0]->countersign_id);
			}
			
		}


			function updatedtrcoverage(){

				$info = $this->input->post('info');

				$update = $this->reports_model->update_dtr_coverage($info);

				if($update){
					echo json_encode($update);
				}

			}


			function getdtrcoverages(){

				$info = $this->input->post('info');

				$result = $this->reports_model->getdtrcoverages($info);

				if($result){
					echo json_encode($result);
				}
			}


			function insertnewdatecover(){

				$info = $this->input->post('info');

				$insert = $this->reports_model->insertnewdatecover($info);

				if($insert){
					echo json_encode($insert);
				}
				
			}


			function getsubpap_divisions_tree_employees($dtr_cover_id){

				//$info = $this->input->post('info');

				$info['dtr_cover_id'] = $dtr_cover_id;

				$result = $this->reports_model->getsubpap_divisions_tree_employees($info);

				if($result){
					echo json_encode($result);
				}

			}


			function getsubpap_divisions_tree_employees_ams(){


				$input_date = $this->input->get('date_covered');

				$result = $this->reports_model->getsubpap_divisions_tree_employees_ams($input_date);

				if($result){
					echo json_encode($result);
				}

			}



			function getallapplications(){

				$info = $this->input->post('info');

				$result = $this->reports_model->get_all_applications($info);

				if($result){
					echo json_encode($result);
				}else{
					echo json_encode(false);
				}

			}




			function datetesting(){

				$date = '6/1/2016';

				//echo $date;
				$days = 1;

				echo date("m/d/Y", strtotime($date));


			}


			//function getfileot(){
			function getfileot($this_date , $employee_id){

/*				$this_date = '8/2/2016';
				$employee_id = 146;
*/
				$check_ot = $this->leave_model->get_all_file_ots_by_date($this_date , $employee_id);

				if(empty($check_ot)){

					$result = array('ot_id' => 0 , 'div_is_approved' => 0);
				
				}else{
						
					$result = array('ot_id' => $check_ot[0]->checkexact_ot_id , 'div_is_approved' => $check_ot[0]->div_is_approved);

				}

				return $result;


			}






			function testotform(){

				$this->load->view('admin/forms/ot_form_view');
			}










		/* TEST LNG SA */


		public function generatedtrs_copy(){


/*			$sdate =  $_POST["sdate"];
			$edate =  $_POST["edate"];
			$userid =  $_POST["userid"];
			$area_id =  $_POST["area_id"];
			$employee_id =  $_POST["employee_id"];*/

/*			$sdate =  '8/5/2016';
			$edate =  '8/5/2016';
			$employee_id =  146;*/


			$info = $this->input->post('info');


			$employee_id = $info['employee_id'];

			$sdate =  $info["sdate"];
			$edate =  $info["edate"];

			$info = [];
			$info['employee_id'] = $employee_id;

			$employee_details = $this->personnel_model->get_employees($info);

			$userid = $employee_details[0]->biometric_id;
			$area_id = $employee_details[0]->area_id;


			$getemployee_id = $employee_id;

			$getreport = $this->admin_model->getdailytimerecordss($userid , $area_id , $employee_id , date('Y/m/d',strtotime($sdate)) ,  date('Y/m/d',strtotime($edate)));
			$generateddate = $this->admin_model->createDateRangeArray( date('Y/m/d',strtotime($sdate)),  date('Y/m/d',strtotime($edate)));


			$holidays = $this->attendance_model->getholidays($sdate , $edate);

			$count_holidays = count($holidays);


			foreach ($generateddate as $row){
				$daterange[] = $row;
			} 


			$data['getdtrs'] = $daterange;


			$count_total_working_days = 0;
			$count_lates = 0;

			$count_undertime = 0;
			$count_ot = 0;

			$count_absences = 0;
			$count_halfday_absences = 0;

			$total_rendered_abscences = 0;

			$leave_code = '';

			$display_total_hours_rendered = '';


			$count_ps = 0;


			$compute_lates = 0;
			$compute_undertime = 0;
			$compute_ot = 0;
			$compute_absences = 0;
			$compute_ps = 0;
			$compute_halfday_absences = 0;

			$count_sl = 0;
			$count_vl = 0;

			$summary_report_tardiness = array();
			$summary_report_undertime = array();
			$summary_report_ps_personal = array();


			$shift_list = '';
			$shift_id_in = '';
			$shift_name = '';
			$current_shift = '';
			$temporary_shifts = array();
			$actual_ot_timeinout = '';

			foreach ($daterange  as $row){


				$this_date = date('n/j/Y',strtotime($row));
				$date = substr(date('l',strtotime($row)), 0, 2);



				/* check if file as ot */

				$check_ot = $this->getfileot($this_date , $getemployee_id);



				/* shifting  data */


				$shift = $this->getemployeeshifts($getemployee_id , $this_date);
				$shift_1 = $shift;

				if($shift_1[0]->is_temporary == 1){
					$temporary_shifts[] = array('date' => $this_date , 'temp_shift' => $shift_1);
				}


				if($shift_id_in != $shift_1[0]->shift_id && $shift_1[0]->is_temporary == 1){


					if($shift_1[0]->date_sch_started == $shift_1[0]->date_sch_ended){
						$date_1_1  = date('m/d/Y' , strtotime($shift_1[0]->date_sch_started));
					}else{
						$date_1_1 = date('m/d/Y' , strtotime($shift_1[0]->date_sch_started)) .' - '. date('m/d/Y' , strtotime($shift_1[0]->date_sch_ended));
					}

					$tempo_shift = '('.$date_1_1 . ') - '.$shift_1[0]->shift_name;
					$shift_list .= $tempo_shift.'<br>';

				}

				if($shift_id_in != $shift_1[0]->shift_id && $shift_1[0]->is_temporary != 1){

					$shift_name =  $shift_1[0]->shift_name;
					$current_shift = $shift_1;
				}
			
				

				$shift_id_in = $shift_1[0]->shift_id;
				$data['shifting_msg'] = 'testing';


			   /*  end shifting  data */


				if($date == 'Sa' || $date == 'Su'){

					if($this->checkifholiday($holidays ,$this_date) == TRUE){
						$is_holiday = 1;
					}else{
						$is_holiday = 0;
					}

				}else{

					if($this->checkifholiday($holidays ,$this_date) == TRUE){
						$is_holiday = 1;
					}else{
						$is_holiday = 0;
						$count_total_working_days++;
					}
					
				}


				$flag_absences = 0;
				$total_rendered_abscences = 0;
				$count_absences_float = 0;
	

				$in_am = "00:00";
				$out_am = "00:00";

				$in_pm = "00:00";
				$out_pm = "00:00";



				$total_lates = "00:00";
				$total_late_am = "00:00";
				$total_late_pm = "00:00";



				$total_undertime = "00:00";
				$total_undertime_am = "00:00";
				$total_undertime_pm = "00:00";
				$total_ot_pm = "00:00";




				$final_late = "";
				$final_undertime = "";
				$final_ot = "";
				$final_ps = "";
				$test = 0;

				$checkinarr = array();


				$array_type_mode = array();	
				$res_type_mode = array();


				$array_exact_id = array();
				$res_exact_id = array();
				$leave_codes = array();
				$leave_code_array = array();


						
					foreach ($shift_1 as $time){


									$times = "";
									$type_1 = "";
									$type_mode = "";
									$is_approved = "";
									$exact_id = 0;
									$exact_log_id = "0";
									

									$type = $time->type;

									$shift_type = $time->shift_type;


									$timeshift = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.$time->time_start);

									$time_end = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.$time->time_end);


										$is_original = '';
										$is_modified = '';	

										foreach ($getreport as $crow){

												
													$is_approved = "";
													$exact_id = "0";
													$exact_log_id = "0";


			
													$date_checktime = date('n/j/Y',strtotime($crow->checktime));


													$login  = DateTime::createFromFormat('n/j/Y H:i A', $crow->checktime);

													$type_mode = $crow->type_mode;

													$leave_code = $crow->leave_code;


													$is_approved = $crow->is_approved;
													$exact_id = $crow->exact_id;
													$exact_log_id = $crow->exact_log_id;


								
													if($this_date == $date_checktime){

															
															
														$crochecktime  = date('h:i A',strtotime($crow->checktime));

					
															if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type == "AM_START"){
	
																
																$times  = $crochecktime;
														
			
																	$total_late_am = $this->calculatetoseconds($this->calculatelates($crow->checktime, $this_date.' '.$shift_1[0]->time_flexi_exact, '%H:%I'));


																	$in_am = $crow->checktime;


																
																$type_1 = $crow->checktype;
																break;

															}else if ($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/Out" && $type === "C/Out"  &&  $shift_type == "AM_END" ){
																$times  = $crochecktime;

																	$total_undertime_am = $this->calculatetoseconds($this->calculateundertime($crow->checktime, $this_date.' '.$shift_1[1]->time_flexi_exact, '%H:%I'));



																	$out_am = $crow->checktime;



																$type_1 = $crow->checktype;
																break;

															}else if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type === "PM_START" ){
																$times  = $crochecktime;


																	$total_late_pm = $this->calculatetoseconds($this->calculatelates($crow->checktime, $this_date.' '.$shift_1[2]->time_flexi_exact, '%H:%I'));
																	$in_pm = $crow->checktime;


																$type_1 = $crow->checktype;
																break;
															}else if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/Out" && $type === "C/Out" &&  $shift_type === "PM_END"){
																$times  = $crochecktime;

																// calculateundertime_flexi($checktime_pm , $time_exact_pm , $time_flexi_exact_pm , $checktime_am , $time_exact_am , $time_flexi_exact_am){
										
																	$total_undertime_pm = $this->calculatetoseconds($this->calculateundertime_flexi($crow->checktime, $this_date.' '.$shift_1[3]->time_exact, $this_date.' '.$shift_1[3]->time_flexi_exact , $in_am , $this_date.' '.$shift_1[0]->time_exact , $this_date.' '.$shift_1[0]->time_flexi_exact ));


																	$ot_total = $this->calculateot($this_date.' '.$shift_1[0]->time_exact , $this_date.' '.$shift_1[0]->time_flexi_exact , $this_date.' '.$shift_1[3]->time_exact , $this_date.' '.$shift_1[3]->time_flexi_exact , $in_am , $crow->checktime);


																	$total_ot_pm = $this->calculatetoseconds($ot_total['ot_total']);
																	$actual_ot_timeinout = $ot_total['ot_actual_time_in_out'];


																	$out_pm = $crow->checktime;

																$type_1 = $crow->checktype;
																break;
															}	
					

													}else{
														$type_mode = '0';
														$final_late = '';
														$final_undertime = '';

													}

										} /*  end loop $getreport $crow*/




										if ($this->in_multiarray($shift_type, $checkinarr,"shift")) 
										{

										}
										else
										{



											if($type_mode != '0'){

												$array_type_mode[]  = $type_mode;
												$res_type_mode = array_unique($array_type_mode , SORT_REGULAR );

												$array_exact_id[] = $exact_id;
												$res_exact_id = array_unique($array_exact_id , SORT_REGULAR ); 

												$leave_code_array[] = $leave_code;
												$leave_codes = array_unique($leave_code_array , SORT_REGULAR ); 

											}







	



											if($in_am != '00:00' && $out_am != '00:00'){
												$total_hours_rendered_seconds_am = $this->calculatetoseconds($this->totalhours($in_am, $out_am, '%H:%I'));
												
											}else{
												$total_hours_rendered_seconds_am = '00:00';
											}


											if($in_pm != '00:00' && $out_pm != '00:00'){
												$total_hours_rendered_seconds_pm = $this->calculatetoseconds($this->totalhours($in_pm, $out_pm, '%H:%I'));
												
											}else{
												$total_hours_rendered_seconds_pm = '00:00';
											}


											/* FOR TOTAL RENDERED  A IC H N/A */
							
											$compute_total_rendered = $this->compute_total_rendered($this_date , $date, $in_am , $out_am , $in_pm , $out_pm , $holidays , $total_hours_rendered_seconds_am , $total_hours_rendered_seconds_pm);

											$flag_absences = $compute_total_rendered['flag_absences'];
											$display_total_hours_rendered = $compute_total_rendered['display_total_hours_rendered'];




											if($date === 'Sa' || $date  === 'Su'){


												if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am + $total_hours_rendered_seconds_pm);
												}else if($total_hours_rendered_seconds_am == '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_pm);
												}else if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm == '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am);
												}


											}else{


												if($this->checkifholiday($holidays ,$this_date) == TRUE){


														if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am + $total_hours_rendered_seconds_pm);
														}else if($total_hours_rendered_seconds_am == '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_pm);
														}else if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm == '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am);
														}


												}else{

														if($total_late_am != '00:00' || $total_late_pm != '00:00'){
															$final_late =  $this->computetotaldhm($total_late_am + $total_late_pm);														
														}

														if($total_undertime_am != '00:00' || $total_undertime_pm != '00:00'){
															$final_undertime = $this->computetotaldhm($total_undertime_am + $total_undertime_pm);
														}

														if($total_ot_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_ot_pm);
														}

												}


											}






											$checkinarr[] = array( 'TIME' => $times , 'CHECKTYPE' => $type_1 , 'shift' => $shift_type , 'TYPE_MODE' => $type_mode  , 'IS_APPROVED' => $is_approved , 'exact_id' => $exact_id , 'exact_log_id' => $exact_log_id);



										}  /* end function in_multiarray*/

						

					} /* end loop shifting */




				/* compute totals */


				if($final_late != ''){


					$summary_report_tardiness[] = array('date_late' => date('j-M-y',strtotime($this_date)) , 'final_late' => '0:'.$final_late);

					$compute_lates+= $this->calculatetoseconds($final_late);
			
					$count_lates++;
				}				

				if($final_undertime != ''){

					$summary_report_undertime[] = array('date_undertime' => date('j-M-y',strtotime($this_date)) , 'final_undertime' => '0:'.$final_undertime);
					$compute_undertime+= $this->calculatetoseconds($final_undertime);
					$count_undertime++;
				}


/*				if($final_ot != ''){
					$compute_ot+= $this->calculatetoseconds($final_ot);
					$count_ot++;
				}*/


			
				if($flag_absences == 1){
					$count_absences++;
					$compute_absences+= $this->calculatetoseconds('08:00');

				}else if ($flag_absences == 2){
					$count_halfday_absences += .5;
					$compute_halfday_absences+= $this->calculatetoseconds('04:00');
				}


				if(current($res_type_mode) == 'PS'){
					$count_ps++;

					$summary_report_ps_personal = array();

					$summary_ps = $this->calculateps(current($res_exact_id), $shift_1);
					if($summary_ps != '00:00'){
						$summary_report_ps_personal[] = array('date_ps' => date('j-M-y',strtotime($this_date)) , 'compute_ps' => '0:'.$summary_ps);
					}

					$compute_ps += $this->calculatetoseconds($this->calculateps(current($res_exact_id), $shift_1));

				

					$final_ps = $this->calculatepsall(current($res_exact_id) , $shift_1);
					if($final_ps == '00:00'){
						$final_ps = '';
					}
				}


				if(current($res_type_mode) == 'LEAVE'){
					$display_exception = current($leave_codes);

					if($display_exception == 'SL'){
						$count_sl++;
					}else if($display_exception == 'VL'){
						$count_vl++;
					}

				}else{
					$display_exception = $res_type_mode;
				}



				if(current($res_exact_id) != 0){
					$this->load->model('reports_model');
					$is_approved_result =  $this->reports_model->checkexact_isapproved(current($res_exact_id));
				}else{
					$is_approved_result = 0;
				}




				$dtr_array[] = array('CHECKDATE' => $this_date.' '.$date , 'CHECKINOUT' => $checkinarr , 'EXCEPTION' => $display_exception, 'IS_APPROVED' => $is_approved_result , 'lates' => $final_late , 'undertime' => $final_undertime , 'exact_id' => current($res_exact_id) , 'total_hours_rendered' => $display_total_hours_rendered , 'final_ps' => $final_ps , 'final_ot' => $final_ot , 'ot_id' => $check_ot['ot_id'] , 'div_is_approved' => $check_ot['div_is_approved']);

		

			} /* end loop daterange */




			$tot_count = $count_lates + $count_undertime + $count_ps;

			$tot_lates = $this->calculatetoseconds($this->computetotaldhm($compute_lates , '%H:%I'));
			$tot_undertime = $this->calculatetoseconds($this->computetotaldhm($compute_undertime , '%H:%I'));
			$tot_absences = $this->calculatetoseconds_1($this->computetotaldhm($compute_absences + $compute_halfday_absences , '%a:%H:%I'));
			$tot_ps = $this->calculatetoseconds_1($this->computetotaldhm($compute_ps , '%a:%H:%I'));

			$data['summary_report_tardiness'] = $summary_report_tardiness;
			$data['summary_report_undertime'] = $summary_report_undertime;
			$data['summary_report_ps_personal'] = $summary_report_ps_personal;

			$data['dtr_array'] = $dtr_array;
			$data['employee_id'] = $getemployee_id;

			$data['shift'] = $current_shift;
			$data['temporary_shift'] = $temporary_shifts;

			$data['count_sl'] = $count_sl;
			$data['count_vl'] = $count_vl;


			$data['count_ps'] = $count_ps; 
			$data['compute_ps'] = $this->timeformat_8hours($this->computetotaldhm($compute_ps , '%a:%H:%I'),2);


			$data['count_lates'] = $count_lates;
			$data['compute_lates'] =  $this->timeformat_8hours($this->computetotaldhm($compute_lates , '%a:%H:%I'),2);

			$data['count_undertime'] = $count_undertime;
			$data['compute_undertime'] = $this->timeformat_8hours($this->computetotaldhm($compute_undertime , '%a:%H:%I'),2);

			$data['count_absences'] = $count_absences + $count_halfday_absences ;
			$data['compute_absences'] = $this->timeformat_8hours($this->computetotaldhm($compute_absences + $compute_halfday_absences, '%a:%H:%I'),2);


			$data['count_total']  = $tot_count + $count_absences + $count_halfday_absences;
			$data['compute_total']  = $this->timeformat_8hours($this->computetotaldhm($tot_lates + $tot_undertime + $tot_absences + $tot_ps , '%a:%H:%I'),2);

			$data['count_total_working_days'] = $count_total_working_days;

			$format = $count_total_working_days - $data['count_absences'];

			if($this->is_decimal($format)){
				$data['count_total_services_rendered'] = floor($format).':04:00';

			}else{
				$data['count_total_services_rendered'] = $format.':00:00';
			}


			$data['total_holidays'] = $count_holidays;
			$data['total_holiday_services_r'] = '0:00:00';
			$data['total_holiday_tardiness_undertime'] = '0:00:00';


			$data['time_shift_schedule'] = $shift_name;
			$data['temporary_time_shifts'] = $shift_list;
			$data['tardiness_undertime'] =  $this->timeformat_8hours($this->computetotaldhm($tot_lates + $tot_undertime  + $tot_ps,  '%a:%H:%I'));


			$info['employee_id'] = $getemployee_id;
			$data['employee_details'] = $this->personnel_model->get_employees($info);






				$dtr_ = $dtr_array[0]['CHECKINOUT'];

				if($dtr_[0]['shift'] == 'AM_START' && $dtr_[0]['TIME'] != ''){
					$actual_ot_time_in= $dtr_[0]['TIME'];
				}else{
					$actual_ot_time_in = $dtr_[2]['TIME'];
				}

				if($dtr_[1]['shift'] == 'AM_END' && $dtr_[1]['TIME'] != '' && $dtr_[3]['shift'] == 'PM_END' && $dtr_[3]['TIME'] == ''){
					$actual_ot_time_out = $dtr_[1]['TIME'];
				}else{
					$actual_ot_time_out = $dtr_[3]['TIME'];
				}


				if($actual_ot_time_in == '' || $actual_ot_time_out == ''){
					$actual_ot_time_in_out = '';
				}else{
					$actual_ot_time_in_out = $actual_ot_time_in . ' - ' . $actual_ot_time_out;
				}



				$date = substr(date('l',strtotime($sdate)), 0, 2);

				if($count_holidays){
					$data['ot_actual_time'] = $actual_ot_time_in_out;
				}else if($date == 'Sa' || $date == 'Su'){
					$data['ot_actual_time'] = $actual_ot_time_in_out;
				}else{
					$data['ot_actual_time'] = $actual_ot_timeinout;	
				}




/*			echo '<pre/>';
			print_r($data);
*/


			echo json_encode($data);
		}


		/* END TEST */



  /* test leave ledger */


		public function generateledger(){



			$info = $this->input->post('info');

			$employee_id = $info['employee_id'];
			//$employee_id = 62;

			if(isset($info["edate"])){
				$end_date = date( "n/j/Y", strtotime($info["edate"]));
			}else{
				$end_date  = date( "n/j/Y" );
			}

			$end_date  = date( "n/j/Y" );
			$e_credits = $this->leave_model->get_employee_with_credits($employee_id);

			$sdate = date( "n/j/Y", strtotime($e_credits[0]->credits_as_of. ' +1 day'));
			$edate = $end_date;


			$userid = $e_credits[0]->biometric_id;
			$area_id = $e_credits[0]->area_id;
			$b_balance = $e_credits[0]->credits_as_of;




			$getemployee_id = $employee_id;

			$getreport = $this->admin_model->getdailytimerecordss($userid , $area_id , $employee_id , date('Y/m/d',strtotime($sdate)) ,  date('Y/m/d',strtotime($edate)));
			$getledgerleaverecords = $this->admin_model->getledgerleaverecords( $employee_id , date('Y/m/d',strtotime($sdate)) ,  date('Y/m/d',strtotime($edate)));
			$generateddate = $this->admin_model->createDateRangeArray( date('Y/m/d',strtotime($sdate)),  date('Y/m/d',strtotime($edate)));


			$holidays = $this->attendance_model->getholidays($sdate , $edate);

			$count_holidays = count($holidays);


			foreach ($generateddate as $row){
				$daterange[] = $row;
			} 

			//$data['getdtrs'] = $daterange;

			$count_total_working_days = 0;
			$count_lates = 0;

			$count_undertime = 0;
			$count_ot = 0;

			$count_absences = 0;
			$count_halfday_absences = 0;

			$total_rendered_abscences = 0;

			$leave_code = '';

			$display_total_hours_rendered = '';


			$count_ps = 0;


			$compute_lates = 0;
			$compute_undertime = 0;
			$compute_ot = 0;
			$compute_absences = 0;
			$compute_ps = 0;
			$compute_halfday_absences = 0;

			$count_sl = 0;
			$count_vl = 0;

			$summary_report_tardiness = array();
			$summary_report_undertime = array();
			$summary_report_ps_personal = array();
			$summary_report_vl = array();
			$summary_report_sl = array();
			$summary_report_spl = array();



			$summart_report_vacation = array();


			$vl_leave_credits_earned = array();
			$sl_leave_credits_earned = array();


			$shift_list = '';
			$shift_id_in = '';
			$shift_name = '';
			$current_shift = '';
			$temporary_shifts = array();

			foreach ($daterange  as $row){


				$this_date = date('n/j/Y',strtotime($row));
				$date = substr(date('l',strtotime($row)), 0, 2);





				/* check if file as ot */

				$check_ot = $this->getfileot($this_date , $getemployee_id);



				/* shifting  data */


				$shift = $this->getemployeeshifts($getemployee_id , $this_date);
				$shift_1 = $shift;

				if($shift_1[0]->is_temporary == 1){
					$temporary_shifts[] = array('date' => $this_date , 'temp_shift' => $shift_1);
				}


				if($shift_id_in != $shift_1[0]->shift_id && $shift_1[0]->is_temporary == 1){


					if($shift_1[0]->date_sch_started == $shift_1[0]->date_sch_ended){
						$date_1_1  = date('m/d/Y' , strtotime($shift_1[0]->date_sch_started));
					}else{
						$date_1_1 = date('m/d/Y' , strtotime($shift_1[0]->date_sch_started)) .' - '. date('m/d/Y' , strtotime($shift_1[0]->date_sch_ended));
					}

					$tempo_shift = '('.$date_1_1 . ') - '.$shift_1[0]->shift_name;
					$shift_list .= $tempo_shift.'<br>';

				}

				if($shift_id_in != $shift_1[0]->shift_id && $shift_1[0]->is_temporary != 1){

					$shift_name =  $shift_1[0]->shift_name;
					$current_shift = $shift_1;
				}
						

				$shift_id_in = $shift_1[0]->shift_id;
				//$data['shifting_msg'] = 'testing';

			   /*  end shifting  data */


				if($date == 'Sa' || $date == 'Su'){

				}else{

					if($this->checkifholiday($holidays ,$this_date) == TRUE){
					}else{
						$count_total_working_days++;
					}
					
				}


				$flag_absences = 0;
				$total_rendered_abscences = 0;
				$count_absences_float = 0;
	

				$in_am = "00:00";
				$out_am = "00:00";

				$in_pm = "00:00";
				$out_pm = "00:00";



				$total_lates = "00:00";
				$total_late_am = "00:00";
				$total_late_pm = "00:00";



				$total_undertime = "00:00";
				$total_undertime_am = "00:00";
				$total_undertime_pm = "00:00";
				$total_ot_pm = "00:00";




				$final_late = "";
				$final_undertime = "";
				$final_ot = "";
				$final_ps = "";
				$test = 0;

				$checkinarr = array();


				$array_type_mode = array();	
				$res_type_mode = array();


				$array_exact_id = array();
				$res_exact_id = array();
				$leave_codes = array();
				$leave_code_array = array();
				$is_halfday_array = array();


						
					foreach ($shift_1 as $time){


									$times = "";
									$type_1 = "";
									$type_mode = "";
									$is_approved = "";
									$exact_id = 0;
									$exact_log_id = "0";
									$is_halfday = "0";
									

									$type = $time->type;

									$shift_type = $time->shift_type;


									$timeshift = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.$time->time_start);

									$time_end = DateTime::createFromFormat('n/j/Y H:i A', $this_date.' '.$time->time_end);


										$is_original = '';
										$is_modified = '';	

										foreach ($getreport as $crow){

												
													$is_approved = "";
													$exact_id = "0";
													$exact_log_id = "0";
													$is_halfday = "0";
													$z = "0";


			
													$date_checktime = date('n/j/Y',strtotime($crow->checktime));


													$login  = DateTime::createFromFormat('n/j/Y H:i A', $crow->checktime);

													$type_mode = $crow->type_mode;

													$leave_code = $crow->leave_code;


													$is_approved = $crow->is_approved;
													$exact_id = $crow->exact_id;
													$exact_log_id = $crow->exact_log_id;


								
													if($this_date == $date_checktime){

															
															
														$crochecktime  = date('h:i A',strtotime($crow->checktime));

					
															if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type == "AM_START"){
	
																
																$times  = $crochecktime;
														
			
																	$total_late_am = $this->calculatetoseconds($this->calculatelates($crow->checktime, $this_date.' '.$shift_1[0]->time_flexi_exact, '%H:%I'));


																	$in_am = $crow->checktime;


																
																$type_1 = $crow->checktype;
																break;

															}else if ($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/Out" && $type === "C/Out"  &&  $shift_type == "AM_END" ){
																$times  = $crochecktime;

																	$total_undertime_am = $this->calculatetoseconds($this->calculateundertime($crow->checktime, $this_date.' '.$shift_1[1]->time_flexi_exact, '%H:%I'));



																	$out_am = $crow->checktime;



																$type_1 = $crow->checktype;
																break;

															}else if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/In" && $type === "C/In" &&  $shift_type === "PM_START" ){
																$times  = $crochecktime;


																	$total_late_pm = $this->calculatetoseconds($this->calculatelates($crow->checktime, $this_date.' '.$shift_1[2]->time_flexi_exact, '%H:%I'));
																	$in_pm = $crow->checktime;


																$type_1 = $crow->checktype;
																break;
															}else if($login >= $timeshift && $login <= $time_end && $crow->checktype === "C/Out" && $type === "C/Out" &&  $shift_type === "PM_END"){
																$times  = $crochecktime;

																// calculateundertime_flexi($checktime_pm , $time_exact_pm , $time_flexi_exact_pm , $checktime_am , $time_exact_am , $time_flexi_exact_am){
										
																	$total_undertime_pm = $this->calculatetoseconds($this->calculateundertime_flexi($crow->checktime, $this_date.' '.$shift_1[3]->time_exact, $this_date.' '.$shift_1[3]->time_flexi_exact , $in_am , $this_date.' '.$shift_1[0]->time_exact , $this_date.' '.$shift_1[0]->time_flexi_exact ));



																	$ot_total = $this->calculateot($this_date.' '.$shift_1[0]->time_exact , $this_date.' '.$shift_1[0]->time_flexi_exact , $this_date.' '.$shift_1[3]->time_exact , $this_date.' '.$shift_1[3]->time_flexi_exact , $in_am , $crow->checktime);


																	$total_ot_pm = $this->calculatetoseconds($ot_total['ot_total']);


																	$out_pm = $crow->checktime;

																$type_1 = $crow->checktype;
																break;
															}	
					

													}else{
														$type_mode = '0';
														$final_late = '';
														$final_undertime = '';

													}

										} /*  end loop $getreport $crow*/




										if ($this->in_multiarray($shift_type, $checkinarr,"shift")) 
										{

										}
										else
										{



											if($type_mode != '0'){

												$array_type_mode[]  = $type_mode;
												$res_type_mode = array_unique($array_type_mode , SORT_REGULAR );

												$array_exact_id[] = $exact_id;
												$res_exact_id = array_unique($array_exact_id , SORT_REGULAR ); 

												$leave_code_array[] = $leave_code;
												$leave_codes = array_unique($leave_code_array , SORT_REGULAR ); 



											}







	



											if($in_am != '00:00' && $out_am != '00:00'){
												$total_hours_rendered_seconds_am = $this->calculatetoseconds($this->totalhours($in_am, $out_am, '%H:%I'));
												
											}else{
												$total_hours_rendered_seconds_am = '00:00';
											}


											if($in_pm != '00:00' && $out_pm != '00:00'){
												$total_hours_rendered_seconds_pm = $this->calculatetoseconds($this->totalhours($in_pm, $out_pm, '%H:%I'));
												
											}else{
												$total_hours_rendered_seconds_pm = '00:00';
											}


											/* FOR TOTAL RENDERED  A IC H N/A */
							
											$compute_total_rendered = $this->compute_total_rendered($this_date , $date, $in_am , $out_am , $in_pm , $out_pm , $holidays , $total_hours_rendered_seconds_am , $total_hours_rendered_seconds_pm);

											$flag_absences = $compute_total_rendered['flag_absences'];
											$display_total_hours_rendered = $compute_total_rendered['display_total_hours_rendered'];




											if($date === 'Sa' || $date  === 'Su'){


												if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am + $total_hours_rendered_seconds_pm);
												}else if($total_hours_rendered_seconds_am == '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_pm);
												}else if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm == '00:00'){
													$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am);
												}


											}else{


												if($this->checkifholiday($holidays ,$this_date) == TRUE){


														if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am + $total_hours_rendered_seconds_pm);
														}else if($total_hours_rendered_seconds_am == '00:00' && $total_hours_rendered_seconds_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_pm);
														}else if($total_hours_rendered_seconds_am != '00:00' && $total_hours_rendered_seconds_pm == '00:00'){
															$final_ot = $this->computetotaldhm($total_hours_rendered_seconds_am);
														}


												}else{

														if($total_late_am != '00:00' || $total_late_pm != '00:00'){
															$final_late =  $this->computetotaldhm($total_late_am + $total_late_pm);														
														}

														if($total_undertime_am != '00:00' || $total_undertime_pm != '00:00'){
															$final_undertime = $this->computetotaldhm($total_undertime_am + $total_undertime_pm);
														}

														if($total_ot_pm != '00:00'){
															$final_ot = $this->computetotaldhm($total_ot_pm);
														}

												}


											}






											$checkinarr[] = array( 'TIME' => $times , 'CHECKTYPE' => $type_1 , 'shift' => $shift_type , 'TYPE_MODE' => $type_mode  , 'IS_APPROVED' => $is_approved , 'exact_id' => $exact_id , 'exact_log_id' => $exact_log_id);



										}  /* end function in_multiarray*/

						

					} /* end loop shifting */




				/* compute totals */


				if($final_late != ''){


					$summary_report_tardiness[] = array('date' => date('j-M-y',strtotime($this_date)) , 'particular' => '0:'.$final_late , 'type' => 'T');

					$compute_lates+= $this->calculatetoseconds($final_late);
			
					$count_lates++;
				}				

				if($final_undertime != ''){

					$summary_report_undertime[] = array('date' => date('j-M-y',strtotime($this_date)) , 'particular' => '0:'.$final_undertime ,  'type' => 'U');
					$compute_undertime+= $this->calculatetoseconds($final_undertime);
					$count_undertime++;
				}


/*				if($final_ot != ''){
					$compute_ot+= $this->calculatetoseconds($final_ot);
					$count_ot++;
				}*/


			
				if($flag_absences == 1){
					$count_absences++;
					$compute_absences+= $this->calculatetoseconds('08:00');

				}else if ($flag_absences == 2){
					$count_halfday_absences += .5;
					$compute_halfday_absences+= $this->calculatetoseconds('04:00');
				}


				if(current($res_type_mode) == 'PS'){
					$count_ps++;

					$summary_report_ps_personal = array();

					$summary_ps = $this->calculateps(current($res_exact_id), $shift_1);
					if($summary_ps != '00:00'){
						$summary_report_ps_personal[] = array('date' => date('j-M-y',strtotime($this_date)) , 'particular' => '0:'.$summary_ps , 'type' => 'PS');
					}

					$compute_ps += $this->calculatetoseconds($this->calculateps(current($res_exact_id), $shift_1));

				

					$final_ps = $this->calculatepsall(current($res_exact_id) , $shift_1);
					if($final_ps == '00:00'){
						$final_ps = '';
					}
				}


				if(current($res_type_mode) == 'LEAVE'){
					$display_exception = current($leave_codes);


					if($display_exception == 'SL'){
						$count_sl++;
						$summary_report_sl[] = array('date' => date('j-M-y',strtotime($this_date)) , 'particular' => '0:08:00' , 'type' => 'SL');
						
						
					}else if($display_exception == 'VL'){
						$count_vl++;
							$summary_report_sl[] = array('date' => date('j-M-y',strtotime($this_date)) , 'particular' => '0:08:00' , 'type' => 'VL');

					}else if ($display_exception == 'SPL'){
						$summary_report_spl[] = array('date' => date('j-M-y',strtotime($this_date)) , 'particular' => '0:08:00' , 'type' => 'SPL' );	
					}

				}else{
					$display_exception = $res_type_mode;

				}



				if(current($res_exact_id) != 0){
					$this->load->model('reports_model');
					$is_approved_result =  $this->reports_model->checkexact_isapproved(current($res_exact_id));
				}else{
					$is_approved_result = 0;
				}



				$dtr_array[] = array('CHECKDATE' => $this_date.' '.$date , 'CHECKINOUT' => $checkinarr , 'EXCEPTION' => $display_exception, 'IS_APPROVED' => $is_approved_result , 'lates' => $final_late , 'undertime' => $final_undertime , 'exact_id' => current($res_exact_id) , 'total_hours_rendered' => $display_total_hours_rendered , 'final_ps' => $final_ps , 'final_ot' => $final_ot , 'ot_id' => $check_ot['ot_id'] , 'div_is_approved' => $check_ot['div_is_approved']);




				if(date('j',strtotime($row)) == 1){
					
					$vl_leave_credits_earned[] = array('date' => date('F j, Y' , strtotime( $row ) ), 'particular' => 'AE' , 'type' => 'VL' , 'earned' => '1.250' , 'pay' => '' , 'wpay' => '' , 'balance' => ' ' , 'index' => 2);
					$sl_leave_credits_earned[] = array('date' => date('F j, Y' , strtotime( $row ) ), 'particular' => 'AE' , 'type' => 'SL' , 'earned' => '1.250' , 'pay' => '' , 'wpay' => '' , 'balance' => ' ' , 'index' => 2);
				}



		

			} /* end loop daterange */



			$tot_count = $count_lates + $count_undertime + $count_ps;

			$tot_lates = $this->calculatetoseconds($this->computetotaldhm($compute_lates , '%H:%I'));
			$tot_undertime = $this->calculatetoseconds($this->computetotaldhm($compute_undertime , '%H:%I'));
			$tot_absences = $this->calculatetoseconds_1($this->computetotaldhm($compute_absences + $compute_halfday_absences , '%a:%H:%I'));
			$tot_ps = $this->calculatetoseconds_1($this->computetotaldhm($compute_ps , '%a:%H:%I'));



			$data['employee_credits'] = $e_credits;

			$data['summary_report_tardiness'] = $summary_report_tardiness;
			$data['summary_report_undertime'] = $summary_report_undertime;
			$data['summary_report_ps_personal'] = $summary_report_ps_personal;
			$data['summary_report_vl']  = $summary_report_vl;
			$data['summary_report_sl']  = $summary_report_sl;
			$data['summary_report_spl']  = $summary_report_spl;


			$abs_ut = 0;
			$rendered_time = array();
			$gg = array();
			$lg = array();


			$vl_balance = array('date' => date('F j, Y' , strtotime( $e_credits[0]->credits_as_of. ' +1 day' ) ), 'particular' => 'BF' , 'type' => 'VL' , 'earned' => '' , 'pay' => '' , 'wpay' => '' , 'balance' => $e_credits[0]->vl_value , 'index' => 1);
			$sl_balance = array('date' => date('F j, Y' , strtotime( $e_credits[0]->credits_as_of. ' +1 day' ) ), 'particular' => 'BF' , 'type' => 'SL' , 'earned' => '' , 'pay' => '' , 'wpay' => '' , 'balance' => $e_credits[0]->sl_value , 'index' => 1);


			$summary_report_leaves = array();

			foreach ($getledgerleaverecords as $row) {

				if($row->leave_is_halfday == 1){
					$hours = 4;
				}else{
					$hours = 8;
				}

				$count_day = $row->days;
				$total_hours = $count_day * $hours;
				$total_seconds = $total_hours * 3600;

				$particular = $this->computetotaldhm($total_seconds , '%a:%H:%I');
				$summary_report_leaves[] = array('date' => date('F j, Y' , strtotime($row->date_added) ), 'particular' => $particular , 'type' => $row->leave_code , 'earned' => '' , 'pay' => '' , 'wpay' => '' , 'balance' => $row->checkdate , 'index' => 4);
			}



			$balances = array('date' => date('F j, Y' , strtotime( $e_credits[0]->credits_as_of. ' +1 day' ) ) , 
						   'particular' => 'Bal. forwarded', 
						   'running_balance' => number_format( $e_credits[0]->vl_value  ,3), 
						   'abs_ut' => '' , 
						   'running_balance_sl' => number_format( $e_credits[0]->sl_value  ,3), 
						   'abs_ut_sl' => '',
						   'earned_vl' => '' , 
						   'earned_sl' => '',
						   'type' => ''

						   );



			$ldg_merge = array_merge($summary_report_tardiness , $summary_report_undertime , $summary_report_ps_personal , $summary_report_spl );

			foreach ($ldg_merge as $row) {

				$date = date('F j,Y ' , strtotime($row['date']));
				$lg[] = array('date' => $date, 'particular' => $row['particular'] , 'type' => $row['type'] , 'earned' => '' , 'pay' => '1.000' , 'wpay' => '' , 'balance' => ' ' ,'index' => 3);

			}


			$ledger = array(
							$vl_balance, 
							$sl_balance					
						);


			$c_table = $table =  $this->leave_model->get_h_m_conversions();

			$leave_log_ledger = array_merge($ledger, $vl_leave_credits_earned , $sl_leave_credits_earned ,  $summary_report_leaves , $lg );





			$parent_id = 0;		
			$id_ledger = 2;
			$current_id_ledger = 0;
			$this_date = '';
			$period = '';

			$running_balance_vl = 0;
			$running_balance_sl = 0;

			$display_balance_vl = 0;
			$display_balance_sl = 0;


			$display_balance_earned_vl = '';
			$display_balance_earned_sl = '';



			usort($leave_log_ledger,array($this,'date_compare'));
			foreach ($leave_log_ledger as $key => $row) {
			    $return_date[$key]  = strtotime($row['date']);
			    $return_particular[$key] = $row['particular'];
			    $return_index[$key] = $row['index'];
			}


			array_multisort( $return_date, SORT_ASC,  $return_index, SORT_ASC,  $return_particular, SORT_DESC, $leave_log_ledger);


			//echo "<pre/>";

			//print_r($leave_log_ledger);



						foreach ($leave_log_ledger as $row) {

							$display_abs_ut_sl = '';
							$display_abs_ut = '';
							$earned_vl = 0;
							$earned_sl = 0;

		

							$particular = $row['particular'];


							if($row['type'] == 'VL' ||  $row['type'] == 'FL' ||  $row['type'] == 'T' || $row['type'] == 'U' || $row['type'] == 'PS'){


									if($particular == 'BF'){

										$running_balance_vl = $row['balance'];
										$rendered_time = array();
										$gg = array();
										$abs_ut = '';


									}else if ($particular == 'AE'){

										//$running_balance_vl = $row['balance'];
										$rendered_time = array();
										$gg = array();
										$abs_ut = '';

										$earned_vl = $row['earned'];
										$running_balance_vl+=$earned_vl; 




									}else{

												$new_particular = $this->calculatetoseconds_1($particular);
												$rendered_time =  $this->timeformat_8hours($this->computetotaldhm($new_particular , '%a:%H:%I'),2);
									
												$value = 0;
												$d = 0;
												$h = 0;
												$m = 0;

														$day = $rendered_time['day'];
														$hours = $rendered_time['hours'];
														$minutes = $rendered_time['minutes'];

														if($day != '0'){

															$c = $day * 1.000;
															$d = number_format($c,3);
														}

														if($hours != '00'){
															$h = $this->conversion_table($c_table , 'h' , $hours);
														}

														if($minutes != '00'){
															$m = $this->conversion_table($c_table , 'm' , $minutes);
														}

														$abs_ut = number_format($d + $h + $m, 3);
														$running_balance_vl-=$abs_ut;

														$gg = array('day' => 0 , 'hours' =>  number_format($h, 3)  , 'minutes' => number_format($m , 3));
									
		
										}


										$display_balance_vl = $running_balance_vl;
										$display_abs_ut =  $abs_ut;
										$display_balance_earned_vl = $earned_vl;


							}else if ($row['type'] == 'SL'){



											if($particular == 'BF'){		
												$running_balance_sl =  $row['balance'];
												$rendered_time = array();
												$gg = array();
												$abs_ut_sl = '';


											}else if ($particular == 'AE'){

												//$running_balance_sl =  $row['balance'];
												$rendered_time = array();
												$gg = array();
												$abs_ut_sl = '';	

												$earned_sl = $row['earned'];	
												$running_balance_sl+=$earned_sl; 										

											}else{

												$new_particular = $this->calculatetoseconds_1($particular);
												$rendered_time =  $this->timeformat_8hours($this->computetotaldhm($new_particular , '%a:%H:%I'),2);
									
												$value = 0;
												$d = 0;
												$h = 0;
												$m = 0;
														
														$day = $rendered_time['day'];
														$hours = $rendered_time['hours'];
														$minutes = $rendered_time['minutes'];

														if($day != '0'){
															
															$c = $day * 1.000;
															$d = number_format($c,3);
														}

														if($hours != '00'){
															$h = $this->conversion_table($c_table , 'h' , $hours);
														}

														if($minutes != '00'){
															$m = $this->conversion_table($c_table , 'm' , $minutes);
														}

														$abs_ut_sl = number_format($d + $h + $m, 3);
														$running_balance_sl-=$abs_ut_sl;
									
											}



										$display_balance_sl = $running_balance_sl;
										$display_abs_ut_sl = $abs_ut_sl;

							
							}else if ($row['type'] == 'SPL'){

									$new_particular = $this->calculatetoseconds_1($particular);
									$rendered_time =  $this->timeformat_8hours($this->computetotaldhm($new_particular , '%a:%H:%I'),2);
							
										$d = 0;
										$h = 0;
										$m = 0;

											$day = $rendered_time['day'];
											$hours = $rendered_time['hours'];
											$minutes = $rendered_time['minutes'];

											if($day != '0'){
												$c = $day * 1.000;
												$d = number_format($c,3);
											}

											if($hours != '00'){
												$h = $this->conversion_table($c_table , 'h' , $hours);
											}

											if($minutes != '00'){
												$m = $this->conversion_table($c_table , 'm' , $minutes);
											}

											$abs_ut_spl = number_format($d + $h + $m, 3);
								
											$count_spl_	 = $abs_ut;
							}



								$log[] = array(	
									  	'period'=> $row['date'],
									  	'running_balance' => number_format($display_balance_vl ,3) ,
									  	'earned_vl' =>$earned_vl,
									  	'type' => $row['type'] ,
									    'particular' => $row['particular'] ,
									    'test' => $rendered_time ,
									    'check' => $gg ,
									    'abs_ut' => $display_abs_ut,
									    'abs_ut_sl' => $display_abs_ut_sl,
									    'running_balance_sl' => number_format($display_balance_sl ,3),
									    'earned_sl' =>  $earned_sl,
									    'additional_info' => $row['balance']
	
						   		 );



							$this_date = $row['date'];
							$current_id_ledger = $id_ledger;
							$id_ledger ++;


						}

			


			$date_tree = $this->year_month($sdate , $edate , $log , $balances);
			//echo "<pre/>";
			//print_r($date_tree);


			$num = 1;
			$parent_id = 1;
			$second_id = 1;
			$ctr = 0;
			$dat = array();


			$year_count = 0;

			$vacation_leave_remaining_balance = 0; 
			$sick_remaining_balance = 0; 

			$yearly_force = 0;
			$yearly_special = 0;

			$display_count_spl = '';




			foreach ($date_tree as $key => $value) {

			$year_count++;

			if($year_count == 1){

				$yearly_force = $e_credits[0]->fl_value;
				$yearly_special = $e_credits[0]->spl_value;
			}else{
				$yearly_force = 5;
				$yearly_special = 3;
			}



				$dat[] = array('id' => $num  , 
							   'period' => $key , 
							   'parent_id' => $ctr , 
							   'particular' => '' , 
							   'running_balance' => '' , 
							   'abs_ut' => '' ,
							   'abs_ut_wo' => '', 
							   'running_balance_sl' => '' , 
							   'abs_ut_sl' => '' ,
							   'abs_ut_wo_s' => '', 
							   'earned_vl' => '' , 
							   'earned_sl' => '',
							   );

				$parent_id = $num++;

				foreach ($value as $key => $value) {
					$second_id = $num;

					$dat_1[] = array('id' => $num++  , 
									 'period' => $key , 
									 'parent_id' => $parent_id , 
									 'particular' => '' , 
									 'running_balance' => '' , 
									 'abs_ut' => '' , 
									 'abs_ut_wo' => '',
									 'running_balance_sl' => '' ,
									 'abs_ut_sl' => '' ,  
									 'abs_ut_wo_s' => '' ,  
									 'earned_vl' => '' , 
									 'earned_sl' => '',
									 );

					   $t = $value['period'];

					
					foreach ($t as $key => $value) {

						$display_count_spl = '';
						$_tday = date('j -',strtotime($value['date']));
						$_twk = date('D',strtotime($value['date']));

						$_date = $_tday.' '.$_twk; 


						if($value['type'] == 'FL'){
							 $yearly_force -= $value['abs_ut'];
							 $display_count_spl = '';

						}else if ($value['type'] == 'SPL'){

							$str = $value['particular'];
							$str2 = substr($str, 4);
							$count_spl = $str2[0];
							$yearly_special -= $count_spl;

							$total_spl_rendered = 3 - $yearly_special;

							$display_count_spl = '<span style="font-size:9px; font-style:italic; font-weight:bold;">'.$total_spl_rendered.' of 3 </span>';
	
						}

						if($value['running_balance'] < 0){
							$abs_ut_wo = number_format(abs($value['running_balance']), 3);
						}else{
							$abs_ut_wo = '';
						}


						if($value['running_balance_sl'] < 0){
							$abs_ut_wo_s = number_format(abs($value['running_balance_sl']), 3);
						}else{
							$abs_ut_wo_s = '';
						}


						$dat_2[] = array('id' => $num++  ,
										 'period' => $_date , 
										 'parent_id' => $second_id , 
										 'particular' => '<span style="color:blue;">'.$value['particular'].'</span>	'.$display_count_spl, 
										 'running_balance' => $value['running_balance'] , 
										 'abs_ut' => '<span style="color:blue;">'.$value['abs_ut'].'</span>' , 
										 'abs_ut_wo' => '<span style="color:red;">'.$abs_ut_wo.'</span>', 
										 'running_balance_sl' => $value['running_balance_sl'] , 
										 'abs_ut_sl' => '<span style="color:blue;">'.$value['abs_ut_sl'].'</span>' ,  
										 'abs_ut_wo_s' => '<span style="color:red;">'.$abs_ut_wo_s.'</span>', 
										 'earned_vl' => $value['earned_vl'], 
										 'earned_sl' => $value['earned_sl'],
										 );
					}

					
				}

				$vacation_leave_remaining_balance =  $value['running_balance'];
				$sick_remaining_balance =  $value['running_balance_sl'];
				$force_remaining_balance = $yearly_force;
				$special_remaining_balance = $yearly_special;


			}





			$final_leave_ledger = array_merge($dat,$dat_1,$dat_2);

			//print_r($leave_log_ledger1);
/*
			echo "<pre/>";
			print_r($leave_log_ledger1);*/


/*			echo "<pre/>";

			print_r($daterange);

			echo "<br>";
			echo "<br>";
			echo "<br>";	
			echo "<br>";
			echo "<br>";
			echo "<br>";

			echo "<hr>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";

			echo "<pre/>";

			print_r($data);*/


			echo json_encode(
							 array(
							 	'leave_log_ledger' => $final_leave_ledger , 
								   'vacation_leave_remaining_balance' => $vacation_leave_remaining_balance , 
								   'sick_remaining_balance' => $sick_remaining_balance , 
								   'special_remaining_balance' => $special_remaining_balance,
								   'force_remaining_balance' => $force_remaining_balance
								   )
							);




/*
			echo "<pre/>";

			print_r($year_count);*/


		}











	function date_compare($a, $b)
	{
	    $t1 = strtotime($a['date']);
	    $t2 = strtotime($b['date']);

	    return $t1 - $t2;
	}    





		function conversion_table($table , $type_mode , $val){

				$result = 0;

				foreach ($table as $row) {
						 $particular =  $row->particular;
						 $type  = $row->type;
						 $equi_day = $row->equi_day;


						 if($type == $type_mode && $particular == intval($val)){

						 		$result = $equi_day;

						 }
			

				}

				return $result;
		}


		function unique_multidim_array($array, $key) { 
		    $temp_array = array(); 
		    $i = 0; 
		    $key_array = array(); 
		    
		    foreach($array as $val) { 
		        if (!in_array($val[$key], $key_array)) { 
		            $key_array[$i] = $val[$key]; 
		            $temp_array[$i] = $val; 
		        } 
		        $i++; 
		    } 
		    return $temp_array; 
		} 



		public function year_month($start_date, $end_date ,$log , $balances)
			{



				$lgg  = array();
			    $begin = new DateTime( $start_date );
			    $end = new DateTime( $end_date);
			    $end->add(new DateInterval('P1D')); //Add 1 day to include the end date as a day
			    $interval = new DateInterval('P1D'); 
			    $period = new DatePeriod($begin, $interval, $end);
			    $aResult = array();

			  
			  
			    foreach ( $period as $dt )
			    {


  					$count = 1;
  					$count_e = 1;
  					$c_spl = 1;
			    	foreach ($log as $row) {

			    			if(date('F' , strtotime($row['period'])) ==  $dt->format('F'))	{


			    				if($row['particular'] == 'BF'){

			    					if($count == 1){
			    						$lgg[] = $balances;
			    					}
			    					$count++;

			    				}else if ($row['particular'] == 'AE'){

			    					if($count_e == 2){

					    				$lgg[] = array('date' => $row['period'] , 
				    							   'particular' => '', 
				    							   'running_balance' => $row['running_balance'] , 
				    							   'abs_ut' => $row['abs_ut'] , 
				    							   'running_balance_sl' => $row['running_balance_sl'], 
				    							   'abs_ut_sl' => $row['abs_ut_sl'], 
				    							   'earned_vl' => '1.250', 
				    							   'earned_sl' => '1.250',
				    							   'type' => ''
				    							   );	
			    					}


			    					$count_e++;

			    				}else{
 									
/*
			    					if($row['type'] == 'SPL'){

			    						$count_spl = '<span style="font-weight: bold; font-size:11px; font-style:italic; color:black !important;">('.$c_spl.' of 3)</span>';
			    						$c_spl++;
			    					}else{
			    						$count_spl = '';
			    					}
			    			*/



    								$new_particular = $this->calculatetoseconds_1($row['particular']);
									$rendered_time =  $this->timeformat_8hours($this->computetotaldhm($new_particular , '%a:%h:%i'),3);


				    				$lgg[] = array('date' => $row['period'] , 
			    							   'particular' => $row['type'].' '.$rendered_time.' <span style="font-size:10px; background:#fdfdaa; color:black; font-style:italic;">'.$row['additional_info'].'</span>', 
			    							   'running_balance' => $row['running_balance'] , 
			    							   'abs_ut' => $row['abs_ut'] , 
			    							   'running_balance_sl' => $row['running_balance_sl'], 
			    							   'abs_ut_sl' => $row['abs_ut_sl'] , 
			    							   'earned_vl' => $row['earned_vl'] ?: '', 
			    							   'earned_sl' => $row['earned_sl'] ?: '',
			    							   'type' => $row['type'],
			    							   );		    					
			    				}





			    			}
			    	}	


			        $aResult[$dt->format('Y')][$dt->format('F')] ['period'] = $lgg;

			        $lgg = array();
			    }

			    return $aResult;
			}
	
	}