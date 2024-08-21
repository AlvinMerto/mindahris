<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	Class Accounts extends CI_Controller{
	

		public function __construct(){
			parent::__construct();
			// $this->load->library('session');
			$this->load->model('admin_model');
		}

		public function index(){
			$data['main_content'] = 'admin/dashboard';
			$this->load->view('login_view',$data);
		}

		public function login(){
			if ($this->session->userdata('is_logged_in') == TRUE) {
				redirect(base_url(),"refresh");
			}
			
			$data['err'] = null;
			if (isset($_POST['loginbtn'])) {
				/*
				$DB2 = $this->load->database('sqlserver', TRUE);
				
				$pword = md5($_POST['password']);
				$sql = "select 
							u.Username,
							u.usertype,
							e.*,
							d.Division_Desc as office_division_name,
							p.position_name,
							a.area_name
							from Users as u 
							LEFT JOIN employees as e 
								on u.employee_id = e.employee_id
							LEFT JOIN areas as a 
								on e.area_id = a.area_id
							LEFT JOIN Division as d 
								on e.Division_id = d.Division_Id 
							LEFT JOIN positions as p 
								on e.position_id = p.position_id
							where u.Username = '{$_POST['text']}' and u.Password = '{$pword}'";
				$q 		= $DB2->query($sql);
				$query  = $q->result();
				*/
				$info['username'] = $_POST['text'];
				$info['password'] = md5($_POST['password']);

				$this->load->model("login_model");
				
				$query = $this->login_model->authorizeUser($info);

				if (count($query)==0) {
					$data['err']	 = "<p style='margin: 0px; text-align: center; background: #fcc8c8; padding: 11px;'> User not recognized. </p> ";
					//die("user not recognized");
					// return;
				} else {
					$DB2 = $this->load->database('sqlserver', TRUE);
					$sql = "select 
							u.Username,
							u.usertype,
							e.*,
							d.Division_Desc as office_division_name,
							p.position_name,
							a.area_name
							from Users as u 
							LEFT JOIN employees as e 
								on u.employee_id = e.employee_id
							LEFT JOIN areas as a 
								on e.area_id = a.area_id
							LEFT JOIN Division as d 
								on e.Division_id = d.Division_Id 
							LEFT JOIN positions as p 
								on e.position_id = p.position_id
							where u.Username = '{$query[0]->username}' and u.Password = '{$info['password']}'";
					$q 		= $DB2->query($sql);
					$query  = $q->result();

					// create session
						// ==============================================================================
							$_SESSION['employee_id'] 			= $query[0]->employee_id;
							$_SESSION['username'] 				= $query[0]->Username;
							$_SESSION['usertype'] 				= $query[0]->usertype;
							$_SESSION['full_name'] 				= $query[0]->f_name;
							$_SESSION['first_name'] 			= $query[0]->firstname;
							$_SESSION['last_name'] 				= $query[0]->l_name;
							$_SESSION['biometric_id'] 			= $query[0]->biometric_id;
							$_SESSION['area_id'] 				= $query[0]->area_id;
							$_SESSION['area_name']				= $query[0]->area_name;
							$_SESSION['ip_address'] 			= $_SERVER["REMOTE_ADDR"];
							$_SESSION['is_logged_in'] 			= TRUE;
							$_SESSION['database_default'] 		= 'sqlserver';
							$_SESSION['employment_type'] 		= $query[0]->employment_type;
							$_SESSION['employee_image']			= $query[0]->employee_image;
							$_SESSION['level_sub_pap_div'] 		= $query[0]->Level_sub_pap_div;
							$_SESSION['division_id'] 			= $query[0]->Division_id;
							$_SESSION['dbm_sub_pap_id'] 		= $query[0]->DBM_Pap_id;
							$_SESSION['is_head'] 			    = $query[0]->is_head;
							$_SESSION['office_division_name']   = $query[0]->office_division_name;
							$_SESSION['position_name'] 			= $query[0]->position_name;
							$_SESSION['isfocal'] 			    = $query[0]->isfocal;
						// ==============================================================================
					// end creation of session 
					
					// $this->session->set_userdata($user_session);
					// $this->session->set_flashdata($user_session);
					
					// print_r($this->session->set_userdata());
					redirect(base_url(),"refresh");
				}
			}
			/*
			$this->load->model("Globalvars");
			
			$emp_id    = $this->Globalvars->employeeid;
			
			if ($emp_id != null) {
				redirect('http://office.minda.gov.ph:9003','refresh');
			}
			*/
	      	$data['main_content'] = 'login_view';
			$this->load->view('hrmis/login_view',$data);
      
		}

		public function logout(){

			$this->session->unset_userdata('is_logged_in');
	      	$this->session->unset_userdata('employee_id');
		    $this->session->unset_userdata('username');
		    $this->session->unset_userdata('usertype');
		    $this->session->unset_userdata('full_name');

		    $this->session->unset_userdata('area_id');
		    $this->session->unset_userdata('ip_address');
		    $this->session->unset_userdata('area_name');
		    $this->session->unset_userdata('database_default');

		    $this->session->sess_destroy();

			redirect('/accounts/login/', 'refresh');
		}
		
		public function checklogin() {
			if ($this->session->userdata('is_logged_in') == TRUE) {
				echo json_encode(true);
			} else {
				echo json_encode(false);
			}
		}
		
		public function test() {
			// session_start();
			$_SESSION['sample'] = "sample";
			
			redirect(base_url()."accounts/here","refresh");
			
		}
		
		public function here() {
			echo $_SESSION['sample'];
		}

}