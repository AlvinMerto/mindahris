<?php

Class Leave_model extends CI_Model{


		public function __construct(){
			parent::__construct();
			$this->load->model('main/main_model');

		}	



		function get_holidays(){

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);


			$result = $DB2->query("SELECT * FROM holidays");
			return $result->result();
		}




		function update_holiday($info){

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);


			$holiday_id = $info['holiday_id'];
			$holiday_name = $DB2->escape($info['holiday_name']);
			$holiday_date = $DB2->escape($info['holiday_date']);

			if($holiday_id == ''){ /* insert */

				$query = "";
				$query .= "INSERT INTO 
						  dbo.holidays
						(
						  holiday_date,
						  holiday_name
						) 
						VALUES (
						  ".$holiday_date.",
						  ".$holiday_name."
						);";

				$insert = $DB2->query($query);

				if($insert){
					return true;
				}



			}else{ /* update */


				$query = '';
				$query .="UPDATE 
							  dbo.holidays  
							SET 
							  holiday_date = ".$holiday_date.",
							  holiday_name = ".$holiday_name."
							WHERE  holiday_id = ".$holiday_id.";";


				$update = $DB2->query($query);

				if($update){
					return true;
				}	

			}

		}




		function update_ot($info){

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);


			$checkexact_ot_id = $info['checkexact_ot_id'];
			$employee_id = $info['employee_id'];

			$checkdate = $DB2->escape($info['checkdate']);
			$task_to_be_done = $DB2->escape($info['task_to_be_done']);
			$remarks = $DB2->escape($info['remarks']);
			$r_time_in = $DB2->escape($info['r_time_in']);
			$r_time_out = $DB2->escape($info['r_time_out']);
			$ot_type = $DB2->escape($info['ot_type']);
			$reasons_if_rw = $DB2->escape($info['reasons_if_rw']);
			$recommending_approval_id = $DB2->escape($info['recommending_approval_id']);
			$approved_by_id = $DB2->escape($info['approved_by_id']);


			if(empty($checkexact_ot_id)){ /*insert */


				$query = "";

					$query = "INSERT INTO 
							  dbo.checkexact_ot
							(
							  employee_id,
							  ot_checkdate,
							  ot_task_done,
							  ot_remarks,
							  ot_requested_time_in,
							  ot_requested_time_out,
							  date_added,
							  is_ot_type,
							  ot_reasons_if_rw,
							  div_is_approved,
							  div_chief_id,
							  act_div_is_approved,
							  act_div_chief_id,
							  act_div_a_chief_id,
							  act_div_a_is_approved
							) 
							VALUES (
							  ".$employee_id.",
							  ".$checkdate.",
							  ".$task_to_be_done.",
							  ".$remarks.",
							  ".$r_time_in.",
							  ".$r_time_out.",
							  CAST(GETDATE() AS DATETIME),
							  ".$ot_type.",
							  ".$reasons_if_rw.",
							  0,
							  ".$recommending_approval_id.",
							  0,
							  ".$approved_by_id.",
							  ".$approved_by_id.",
							  0
							);";


						$insert = $DB2->query($query);

						if($insert){

							$query = $DB2->query("SELECT IDENT_CURRENT('checkexact_ot') as last_id");
							$res = $query->result();

							$ot_id = $res[0]->last_id;
	
							return $ot_id;
				
						}

					

			}else{ /*update */


				$query = "";

					$query = "UPDATE 
								  dbo.checkexact_ot  
								SET 
								  ot_task_done = ".$task_to_be_done.",
								  ot_remarks = ".$remarks.",
								  ot_requested_time_in = ".$r_time_in.",
								  ot_requested_time_out = ".$r_time_out.",
								  is_ot_type = ".$ot_type.",
								  ot_reasons_if_rw = ".$reasons_if_rw.",
								  div_chief_id = ".$recommending_approval_id.",
								  act_div_chief_id = ".$approved_by_id.",
								  act_div_a_chief_id = ".$approved_by_id."
								WHERE 
								  checkexact_ot_id = ".$checkexact_ot_id.";";

						$update = $DB2->query($query);

						if($update){
							return $checkexact_ot_id;
						}				  

			}



		}



		function get_all_file_ots_by_date($checkdate ,$employee_id){

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);

			$result = $DB2->query("SELECT co.*FROM dbo.checkexact_ot co WHERE co.ot_checkdate = '{$checkdate}' AND co.employee_id = '$employee_id';");
			return $result->result();
		}



		function get_ot_info($info){

			$ot_id = $info['ot_id'];

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);

			$result = $DB2->query("SELECT co.*,
									DATENAME(month, co.ot_checkdate) + ' ' +  CAST(DAY(co.ot_checkdate) AS VARCHAR(2)) + ', ' +  CAST(YEAR(co.ot_checkdate) AS VARCHAR(4)) + '  (' + DATENAME(dw, co.ot_checkdate) + ')'  as new_ot_checkdate,
									LTRIM(STUFF(RIGHT(CONVERT(VarChar(19), co.ot_requested_time_in, 0), 7), 6, 0, ' ')) as new_requested_time_in,
									LTRIM(STUFF(RIGHT(CONVERT(VarChar(19), co.ot_requested_time_out, 0), 7), 6, 0, ' ')) as new_requested_time_out,
									(SELECT e.firstname + ' ' + LEFT(e.m_name, 1) + '. ' + e.l_name FROM employees e WHERE e.employee_id = co.employee_id) as employee_full_name,
									(SELECT e.firstname + ' ' + LEFT(e.m_name, 1) + '. ' + e.l_name FROM employees e WHERE e.employee_id = co.div_chief_id) as division_chief_full_name ,
									(SELECT e.e_signature FROM employees e WHERE e.employee_id = co.div_chief_id) as division_chief_e_signature,
									(SELECT e.e_signature FROM employees e WHERE e.employee_id = co.act_div_chief_id) as act_division_chief_e_signature,
									(SELECT p.position_name FROM positions p LEFT JOIN employees e ON p.position_id = e.position_id  WHERE e.employee_id = co.div_chief_id) as div_position ,
									(SELECT e.firstname + ' ' + LEFT(e.m_name, 1) + '. ' + e.l_name FROM employees e WHERE e.employee_id = co.act_div_chief_id) as ot_approved_name ,
									(SELECT p.position_name FROM positions p LEFT JOIN employees e ON p.position_id = e.position_id  WHERE e.employee_id = co.act_div_chief_id) as act_div_position , 
									CAST(MONTH(co.div_date_approved) AS VARCHAR(2)) + '/' +  CAST(DAY(co.div_date_approved) AS VARCHAR(2)) + '/' +  CAST(YEAR(co.div_date_approved) AS VARCHAR(4)) + ' ' + LTRIM(STUFF(RIGHT(CONVERT(VarChar(19), co.div_date_approved , 0), 7), 6, 0, ' '))   as new_ot_recommending_date,
									CAST(MONTH(co.act_div_date_approved) AS VARCHAR(2)) + '/' +  CAST(DAY(co.act_div_date_approved) AS VARCHAR(2)) + '/' +  CAST(YEAR(co.act_div_date_approved) AS VARCHAR(4)) + ' ' + LTRIM(STUFF(RIGHT(CONVERT(VarChar(19), co.act_div_date_approved , 0), 7), 6, 0, ' '))   as new_ot_act1_date,
									CAST(MONTH(co.act_div_a_date_approved) AS VARCHAR(2)) + '/' +  CAST(DAY(co.act_div_a_date_approved) AS VARCHAR(2)) + '/' +  CAST(YEAR(co.act_div_a_date_approved) AS VARCHAR(4)) + ' ' + LTRIM(STUFF(RIGHT(CONVERT(VarChar(19), co.act_div_a_date_approved , 0), 7), 6, 0, ' '))   as new_ot_act2_date,
									CASE e.Level_sub_pap_div
									WHEN 'Division' THEN d.Division_Desc
									WHEN 'DBM_Sub_Pap' THEN dsp.DBM_Sub_Pap_Desc
									END as office_division_name
									FROM dbo.checkexact_ot co 
									LEFT JOIN employees e ON e.employee_id = co.employee_id 
									LEFT JOIN positions p ON p.position_id = e.position_id 
									LEFT JOIN Division d ON e.Division_id = d.Division_Id
									LEFT JOIN DBM_Sub_Pap dsp ON e.DBM_Pap_id = dsp.DBM_Sub_Pap_id
								   
								    WHERE co.checkexact_ot_id = '$ot_id';");
			return $result->result();

		}




		function update_ot_signatories($info){


			$ret = false;

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);


			$exact_id = $info['exact_id'];
			$is_hash = $info['is_hash'];
			$password = $info['password'];
			$approval = $info['approval'];
			$approval_date = $info['approval_date'];
			$type = $info['type'];


			$query = "SELECT u.employee_id , u.user_id FROM users u ";

            $query = $DB2->query($query);
            $result = $query->result();
           
           	foreach ($result as $row) {

           		if($is_hash === md5($row->employee_id)){

           			$user_id = $row->user_id;

           			$query ="";
           			$query = "SELECT 1 as success FROM users u WHERE u.user_id = '{$user_id}' AND u.Password = '{$password}'";
           			$query = $DB2->query($query);
         			$result = $query->result();

         			if($result){

         				if($result[0]->success == 1){

         					if($type == 'OT'){ 

	       							$query = "";
									$query = "UPDATE 
												  dbo.checkexact_ot  
												SET
												  ".$approval." = 1,
												  ".$approval_date." = CAST(GETDATE() AS DATETIME)
												WHERE 
												  checkexact_ot_id = ".$exact_id.";";

										$update = $DB2->query($query);

										if($update){
											$ret = true;
											break;
										}  						

         					}else if ($type == 'PS' || $type == 'PAF' || $type == 'LEAVE'){


	       							$query = "";
									$query = "UPDATE 
												  dbo.checkexact_approvals  
												SET
												  ".$approval." = 1,
												  ".$approval_date." = CAST(GETDATE() AS DATETIME)
												WHERE 
												  exact_id = ".$exact_id.";";

										$update = $DB2->query($query);

										if($update){
											$ret = true;
											break;
										}

         					}


         				} /* end result success == 1*/

         			} /*end of result  */

           		} /* end of is hash ==  to employee_id */

           	} /* end of foreach result */



           	return $ret;

		}



		function update_credits($info){

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);


			$employee_id = $info['employee_id'];
			$elc_id = $info['elc_id'];

			$vl_value = $DB2->escape($info['vl_input']);
			$fl_value = $DB2->escape($info['fl_input']);
			$sl_value = $DB2->escape($info['sl_input']);
			$spl_value = $DB2->escape($info['spl_input']);
			$coc_value = $DB2->escape($info['coc_input']);
			$credits_as_of = $DB2->escape($info['as_of_credit']);
			$is_beggining = $DB2->escape($info['is_beggining']);
			$is_current = $DB2->escape($info['is_current']);



			if($elc_id == ''){ /* insert */

				$query = "";
				$query .= "INSERT INTO 
						  dbo.employee_leave_credits
						(
						  employee_id,
						  vl_value,
						  fl_value,
						  sl_value,
						  spl_value,
						  coc_value,
						  credits_as_of,
						  is_beggining,
						  is_current
						) 
						VALUES (
						  ".$employee_id.",
						  ".$vl_value.",
						  ".$fl_value.",
						  ".$sl_value.",
						  ".$spl_value.",
						  ".$coc_value.",
						  ".$credits_as_of.",
						  ".$is_beggining.",
						  ".$is_current."
						);";

				$insert = $DB2->query($query);

				if($insert){
					return true;
				}


			}else{ /* update */


				$query = '';
				$query .="UPDATE 
							  dbo.employee_leave_credits  
							SET 
							  vl_value = ".$vl_value.",
							  fl_value = ".$fl_value.",
							  sl_value = ".$sl_value.",
							  spl_value = ".$spl_value.",
							  coc_value = ".$coc_value.",
							  credits_as_of = ".$credits_as_of.",
							  is_beggining = ".$is_beggining.",
							  is_current = ".$is_current."
							WHERE  elc_id = ".$elc_id.";";


				$update = $DB2->query($query);

				if($update){
					return true;
				}	

			}	
		}



		function get_employee_with_credits($employee_id = ''){

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);

				$query = '';
				$query .="SELECT e.employee_id , e.f_name ,  elc.elc_id, e.biometric_id , e.area_id,
												  elc.vl_value,
												  elc.fl_value,
												  elc.sl_value,
												  elc.spl_value,
												  elc.coc_value,
												  elc.credits_as_of,
												  elc.is_beggining,
												  elc.is_current 
  										FROM employees e 
									   LEFT JOIN employee_leave_credits elc ON elc.employee_id = e.employee_id ";


				if($employee_id != ''){
					$query .="WHERE e.employee_id = '$employee_id'";
				}

				$query .="ORDER BY e.f_name ASC;";

				$query =$DB2->query($query); 

				$result = $this->array_utf8_encode_recursive($query->result());
				return $result;
		}

		
			function array_utf8_encode_recursive($dat) 
	        { if (is_string($dat)) { 
	            return utf8_encode($dat); 
	          } 
	          if (is_object($dat)) { 
	            $ovs= get_object_vars($dat); 
	            $new=$dat; 
	            foreach ($ovs as $k =>$v)    { 
	                $new->$k=$this->array_utf8_encode_recursive($new->$k); 
	            } 
	            return $new; 
	          } 
	          
	          if (!is_array($dat)) return $dat; 
	          $ret = array(); 
	          foreach($dat as $i=>$d) $ret[$i] = $this->array_utf8_encode_recursive($d); 
	          return $ret; 
	        } 



	        function get_h_m_conversions(){

				$session_database = $this->session->userdata('database_default');			
				$DB2 = $this->load->database($session_database, TRUE);

	        	$query = $DB2->query('SELECT * FROM hours_minutes_conversation_fractions'); 

	        	$result = $query->result();

	        	return $result; 
	        		
	        }

}