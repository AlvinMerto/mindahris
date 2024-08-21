<?php

Class Personnel_model extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->model('main/main_model');

		}

		function getsubpap_divisions_tree(){

			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database, TRUE);

			$query = "SELECT 
						s.* 
						FROM
						(
							SELECT 
					        sp.DBM_Sub_Pap_id as id,
					        '-1' as parentid,
					        sp.DBM_Sub_Pap_Desc as name,
					        sp.DBM_Sub_Pap_id as master_id,
					        'DBM_Sub_Pap' as db_table
					    FROM 
					        DBM_Sub_Pap sp 
					    UNION ALL
					    SELECT
					        dbo.increment_number(ROW_NUMBER() OVER (ORDER By division_id) ) as id, 	
					        d.DBM_Sub_Pap_Id as parentid,
					        d.Division_Desc as name,
					        d.division_id as master_id,
					        'Division' as db_table
					        FROM 
					        Division d 
					        ) s
						ORDER BY s.parentid ASC;
				         ";

			$result =  $DB2->query($query); 
			return $result->result();

		}


		function getpositions($id){
			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database,TRUE);

			$result = $DB2->query("EXEC dbo.getpositions @position_id = $id");
			return $result->result();

		}


		function getemployeeid($biometric_id , $area_id){
			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database,TRUE);

			$result = $DB2->query("SELECT employee_id FROM employees WHERE biometric_id = '{$biometric_id}' AND area_id = '{$area_id}'");

			return $result->result();

		}


		function get_employees($info){

			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database,TRUE);

			$employee_id = $info['employee_id'];

			$result = $DB2->query("SELECT e.* , p.position_name ,
													CASE e.status 
													WHEN 1 THEN '<span class=".'"label label-success"'.">Active</span>'
													ELSE 
													'<span class=".'"label label-danger"'.">Inactive</span>'
													END
													as is_active,
													CASE e.Level_sub_pap_div
													WHEN 'Division' THEN d.Division_Desc
													WHEN 'DBM_Sub_Pap' THEN dsp.DBM_Sub_Pap_Desc
													END as office_division_name ,
													u.Username  as uname,
													u.user_id  as u_id,	
													u.usertype as usertype
								FROM employees e 
								LEFT JOIN users u ON u.employee_id = e.employee_id  
								LEFT JOIN positions p ON p.position_id = e.position_id  
								LEFT JOIN Division d ON e.Division_id = d.Division_Id
								LEFT JOIN DBM_Sub_Pap dsp ON e.DBM_Pap_id = dsp.DBM_Sub_Pap_id
								WHERE e.employee_id = '{$employee_id}' ");

			$result = $this->main_model->array_utf8_encode_recursive($result->result());
			return $result;

		}	


		function get_team_members($info){

			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database,TRUE);

			$DBM_Pap_id = $info['dbm_sub_pap_id'];
			$division_id = $info['division_id'];
			$employee_id = $info['employee_id'];

			if($division_id){
				$result = $DB2->query("SELECT e.firstname , e.employee_id , e.employee_image 
								FROM employees e 
								WHERE e.status = 1 AND e.Division_id = '{$division_id}' AND e.employee_id != '{$employee_id}' ORDER BY e.is_head DESC");			
			}else{
				$result = $DB2->query("SELECT e.firstname , e.employee_id , e.employee_image 
								FROM employees e 
								WHERE e.status = 1 AND e.DBM_Pap_id = '{$DBM_Pap_id}' AND e.employee_id != '{$employee_id}' ORDER BY e.is_head DESC");	
			}



			$result = $this->main_model->array_utf8_encode_recursive($result->result());
			return $result;

		}	

		function update_employees($info){

				$session_database = $this->session->userdata('database_default');	
				$DB2 = $this->load->database($session_database, TRUE);

				$employee_id = $DB2->escape($info['employee_id']);
				$id_number = $DB2->escape($info['id_number']);
				$biometric_id = $DB2->escape($info['biometric_id']);
				$gender = $DB2->escape($info['gender']);
				$status = $DB2->escape($info['status']);
				$f_name = $DB2->escape(strtoupper($this->main_model->encode_special_characters($info['f_name'])));
				$l_name = $DB2->escape(strtoupper($this->main_model->encode_special_characters($info['l_name'])));
				$m_name = $DB2->escape(strtoupper($this->main_model->encode_special_characters($info['m_name'])));
				$firstname = $DB2->escape($this->main_model->encode_special_characters($info['firstname']));
				$employment_type = $DB2->escape($info['employment_type']);
				$employment_type_date = $DB2->escape($info['employment_type_date']);
				$position_id = $DB2->escape($info['position_id']);
				$area_id = $DB2->escape($info['area_id']);
				$address_1 = $DB2->escape($this->main_model->encode_special_characters($info['address_1']));
				$email_1 = $DB2->escape($info['email_1']);
				$email_2 = $DB2->escape($info['email_2']);
				$contact_1 = $DB2->escape($info['contact_1']);
				$tin_number = $DB2->escape($info['tin_number']);
				$sss_number = $DB2->escape($info['sss_number']);
				$birthday = $DB2->escape($info['birthday']);
				$daily_rate = $DB2->escape($info['daily_rate']);
				$is_head = $DB2->escape($info['is_head']);
				$isfocal = $DB2->escape($info['isfocal']);
				

				$table_name = $info['table_name'];
				$master_id = $info['master_id'];
				$parent_id = $info['parent_id'];


				if($table_name == 'DBM_Sub_Pap'){

					$DBM_Pap_id = $DB2->escape($master_id);
					$Division_id  =  $DB2->escape('');
					$Level_sub_pap_div = $DB2->escape($table_name);


					$department_id =  $DB2->escape($master_id);


				}else if ($table_name == 'Division'){

					$DBM_Pap_id = $DB2->escape($parent_id);
					$Division_id  = $DB2->escape($master_id);
					$Level_sub_pap_div = $DB2->escape($table_name);

					$department_id =  $DB2->escape($master_id);

				}else{

					$DBM_Pap_id =  $DB2->escape('');
					$Division_id  =  $DB2->escape('');
					$Level_sub_pap_div =  $DB2->escape('');
					$department_id =  $DB2->escape('');

				}


				if($info['employment_type'] == 'JO'){
					$department_id =  $DB2->escape('');	
				}



				if($info['employee_id'] == ''){ /* insert */

				$query = "";

				$query .="INSERT INTO 
				  dbo.employees
				(
				  id_number,
				  biometric_id,
				  f_name,
				  m_name,
				  l_name,
				  status,
				  birthday,
				  gender,
				  employee_image,
				  date_hired,
				  date_added,
				  date_modified,
				  address_1,
				  address_2,
				  city,
				  state,
				  zip,
				  email_1,
				  email_2,
				  contact_1,
				  contact_2,
				  area_id,
				  department_id,
				  position_id,
				  level_id,
				  employment_type,
				  employment_type_date,
				  DBM_Pap_id,
				  Division_id,
				  Level_sub_pap_div,
				  tin_number,
				  sss_number,
				  firstname,
				  daily_rate,
				  is_head,
				  employee_index_tree,
				  isfocal
				) 
				VALUES (
				  ".$id_number.",
				  ".$biometric_id.",
				  ".$f_name.",
				  ".$m_name.",
				  ".$l_name.",
				  ".$status.",
				  ".$birthday.",
				  ".$gender.",
				  '',
				  '',
				  CAST(GETDATE() AS DATETIME) ,
				  '',
				  ".$address_1.",
				  '',
				  '',
				  '',
				  '',
				  ".$email_1.",
				  ".$email_2.",
				  ".$contact_1.",
				  '',
				  ".$area_id.",
				  ".$department_id.",
				  ".$position_id.",
				  '',
				  ".$employment_type.",
				  ".$employment_type_date.",
				  ".$DBM_Pap_id.",
				  ".$Division_id.",
				  ".$Level_sub_pap_div.",
				  ".$tin_number.",
				  ".$sss_number.",
				  ".$firstname.",
				  ".$daily_rate.",
				  ".$is_head.",
				  '',
				  ".$isfocal."
				);";

				$insert = $DB2->query($query);

				if($insert){

					$query = $DB2->query("SELECT IDENT_CURRENT('employees') as last_id");
					$res = $query->result();
					$employee_id =  $res[0]->last_id;

					$username = $DB2->escape($this->main_model->encode_special_characters($info['username']));
					$new_password = $DB2->escape(md5($info['new_password']));
					$usertype = $DB2->escape($info['usertype']);


					$query = "";
					$query .="INSERT INTO 
							  dbo.users
							(
							  Username,
							  Password,
							  usertype,
							  employee_id,
							  e_add,
							  isfirsttime
							) 
							VALUES (
							  ".$username.",
							  ".$new_password.",
							  ".$usertype.",
							  ".$employee_id.",
							  ".$email_2.",
							  1
							);";

						$insert_users_details = $DB2->query($query);	

						if($insert_users_details){
							return true;
						}

				}


				}else{ /* update */


			
				$query = "";

				$query .="UPDATE 
						  dbo.employees  
						SET 
						  id_number = ".$id_number.",
						  biometric_id = ".$biometric_id.",
						  f_name = ".$f_name.",
						  firstname = ".$firstname.",
						  m_name = ".$m_name.",
						  l_name = ".$l_name.",
						  status = ".$status.",
						  gender = ".$gender.",
						  position_id = ".$position_id.",
						  area_id = ".$area_id.",
						  address_1 = ".$address_1.",
						  email_1 = ".$email_1.",
						  email_2 = ".$email_2.",
						  contact_1 = ".$contact_1.",
						  tin_number = ".$tin_number.",
						  sss_number = ".$sss_number.",
						  DBM_Pap_id = ".$DBM_Pap_id.",
						  Division_id = ".$Division_id.",
						  department_id = ".$department_id.",
						  Level_sub_pap_div = ".$Level_sub_pap_div.",
						  birthday = ".$birthday.",
						  daily_rate = ".$daily_rate.",
						  employment_type = ".$employment_type.",
						  employment_type_date = ".$employment_type_date.",
						  is_head = ".$is_head.",
						  isfocal = ".$isfocal."
						WHERE 
						  employee_id = ".$employee_id.";";

				$update = $DB2->query($query);	

				if($update){


					$user_id = $DB2->escape($info['user_id']);
					$username = $DB2->escape($this->main_model->encode_special_characters($info['username']));
					$new_password = $DB2->escape(md5($info['new_password']));
					$usertype = $DB2->escape($info['usertype']);



						if($info['user_id'] != ''){

						$activate_password = '';
						$isfirsttime = null;
						if($info['new_password'] != ''){
							$activate_password = 'Password = '.$new_password.',';
							$isfirsttime = ", isfirsttime = 1";
						}


							$query = "";
							$query .="UPDATE 
									  dbo.users  
									SET 
									  Username = ".$username.",
									  ".$activate_password."
									  usertype = ".$usertype.",
									  e_add = ".$email_2."
									  {$isfirsttime}
									WHERE 
									  user_id = ".$user_id.";";

								$update = $DB2->query($query);	

								if($update){
									return true;
								}	

						}else{

			
							$query = "";
							$query .="INSERT INTO 
									  dbo.users
									(
									  Username,
									  Password,
									  usertype,
									  employee_id,
									  e_add,
									  isfirsttime
									) 
									VALUES (
									  ".$username.",
									  ".$new_password.",
									  ".$usertype.",
									  ".$employee_id.",
									  ".$email_2.",
									  1
									);";

								$insert = $DB2->query($query);	

								if($insert){
									return true;
								}	
						}
	
				} /*end( update employees )*/

			}


		}




		function update_profile_picture($info){

			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database, TRUE);
			$employee_id = $info['employee_id'];

			$filename = $info['attachments'] ? $info['attachments'] : NULL;

			$file =  $DB2->escape($filename);


				$query = "";
				$query .="UPDATE 
							  dbo.employees  
							SET 
							  employee_image = ".$file."
							WHERE 
							  employee_id = ".$employee_id.";";

				$update = $DB2->query($query);	

				if($update){
					

					return $filename;

				}else{
					return false;
				}

		}



		function update_e_signature($info){

			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database, TRUE);
			$employee_id = $info['employee_id'];

			$filename = $info['attachments'] ? $info['attachments'] : NULL;

			$file =  $DB2->escape($filename);


				$query = "";
				$query .="UPDATE 
							  dbo.employees  
							SET 
							  e_signature = ".$file."
							WHERE 
							  employee_id = ".$employee_id.";";

				$update = $DB2->query($query);	

				if($update){
					
					return $filename;

				}else{
					return false;
				}


		}



		function update_password($info){
			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database, TRUE);


			$employee_id = $info['employee_id']; 
			$old_password =  $DB2->escape(md5($info['old_password'])); 
			$new_password = $DB2->escape(md5($info['new_password']));



				$check_query = "SELECT u.user_id FROM users u WHERE u.employee_id = '{$employee_id}' AND u.Password = ".$old_password.""; 

				$result = $DB2->query($check_query);

				$user_id = $result->result();

				if($user_id){

						$userid = $user_id[0]->user_id;

						$update = "UPDATE 
								    dbo.users  
								  SET 
								    Password = ".$new_password.",
									isfirsttime = 0
								  WHERE 
								    user_id = '{$userid}';";

						$update = $DB2->query($update);

						if($update){
							return true;
						}

				}else{
					return false;
				}

		}


		function update_profile($info){
			$session_database = $this->session->userdata('database_default');
			$DB2 = $this->load->database($session_database, TRUE);

			$employee_id = $info['employee_id'];
			$birthday = $DB2->escape($info['birthday']);
			$address_1 = $DB2->escape($info['address_1']);
			$email_1 = $DB2->escape($info['email_1']);
			$email_2 = $DB2->escape($info['email_2']);
			$contact_1 = $DB2->escape($info['contact_1']);
			$tin_number = $DB2->escape($info['tin_number']);
			$sss_number = $DB2->escape($info['sss_number']);


			$query = "";
			$query .="UPDATE 
						  dbo.employees  
						SET 
						  birthday = ".$birthday.",
						  address_1 = ".$address_1.",
						  email_1 = ".$email_1.",
						  email_2 = ".$email_2.",
						  contact_1 = ".$contact_1.",
						  tin_number = ".$tin_number.",
						  sss_number = ".$sss_number."
						WHERE 
						  employee_id = '{$employee_id}';";

				$update = $DB2->query($query);
				
				if($update){
					return true;
				}else{
					return false;
				}		  


		}


		function update_position($info){
			$session_database = $this->session->userdata('database_default');
	
			$DB2 = $this->load->database($session_database, TRUE);

			$position_id = $info['position_id'];
			$position_name = $DB2->escape($info['position_name']);

			if(empty($info['position_id'])){

				$query = "";
				$query.="INSERT INTO 
						  dbo.positions
						(
						  position_name
						) 
						VALUES (
						  ".$position_name."
						);";


				$insert = $DB2->query($query);

				if($insert){

					$query = $DB2->query("SELECT IDENT_CURRENT('positions') as last_id");
					$res = $query->result();
					$new_position_id = $res[0]->last_id;

					return $new_position_id;
				}

			}else{

				$query = "";
				$query.="UPDATE 
						  dbo.positions  
						SET 
						  position_name = ".$position_name."
						WHERE 
						  position_id = '{$position_id}';";


				$update = $DB2->query($query);

				if($update){
					return $position_id;
				}
			}


		}

}
