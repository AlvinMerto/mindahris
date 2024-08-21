<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	Class Leaveadministration extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('attendance_model');
			$this->load->model('reports_model');
			$this->load->model('personnel_model');
			$this->load->model('leave_model');
		}



			public function holidays(){

				$data['title'] = '| Holidays';
				$data['get_holidays'] = $this->leave_model->get_holidays();
				// $data['main_content'] = 'hrmis/leaves/holiday_view';
				//$this->load->view('hrmis/admin_view',$data);
				$this->load->view('hrmis/leaves/holiday_view',$data);

			}
			
			function ledger(){
				$this->load->model("Globalvars");
				$data['admin'] = ($this->Globalvars->usertype != "user")?true:false;
			
				$getemployees = $this->leave_model->get_employee_with_credits('');

				$data['title'] = '| Ledger';
				
				$data['dbusers'] = $getemployees;
				$data['employee_id'] = $this->session->userdata('employee_id');
				$data['usertype'] = $this->session->userdata('usertype');
				$data['employment_type'] = $this->session->userdata('employment_type');
				$data['main_content'] = 'hrmis/leaves/ledger_view';
				$this->load->view('hrmis/admin_view',$data);

			}



			function updateholiday(){

				$info = $this->input->post('info');
				$result = $this->leave_model->update_holiday($info);

				echo json_encode($result);

			}

			
			function updateot(){


				$info = $this->input->post('info');
				$result = $this->leave_model->update_ot($info);

				echo json_encode($result);

			}


			function getotinfo(){

				$info = $this->input->post('info');
				$result = $this->leave_model->get_ot_info($info);

				echo json_encode($result);

			}


			function updateotsignatory(){

				$info = $this->input->post('info');
				$result = $this->leave_model->update_ot_signatories($info);
				echo json_encode($result);

			}


			function updatesignatories(){

				$info = $this->input->post('info');
				$result = $this->leave_model->update_signatories($info);
				echo json_encode($result);
			}



			function updatecredits(){

				$info = $this->input->post('info');
				$result = $this->leave_model->update_credits($info);
				echo json_encode($result);	

			}




			function getleaveledger(){



				$employee_id = 123;

				$getemployee_credits = $this->leave_model->get_employee_with_credits($employee_id);

				echo "<pre/>";
				print_r($getemployee_credits);

				$b_balance = $getemployee_credits[0]->credits_as_of;

				echo "<br>";

				echo $b_balance;


				$count_sick_leave = '';
				$count_vacation_leave = '';
				$count_special = '';
				$count_force_leave = '';

				$tardiness = '';
				$undertime = '';
				$ps = '';




			}





	}