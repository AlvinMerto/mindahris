<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	Class Dashboard extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
		}

		public function index(){
			
			if($this->session->userdata('is_logged_in') != TRUE){
				redirect('/accounts/login/', 'refresh');
			}else{
					
				if ($this->session->userdata("username") == "admin") {
					redirect(base_url()."/ams",'refresh');
				}
				
				$this->load->model('personnel_model');
				$this->load->model('Globalvars');
				$this->load->model("v2main/Globalproc");
			
				$data['title'] = '| Dashboard';
				
				$this->load->model("v2main/Leavemgt");
				$emps = $this->Leavemgt->getemployees();
				
				$data['biometric_id'] 		= $this->session->userdata('biometric_id');
				$data['employee_id'] 		= $this->session->userdata('employee_id');
				$data['usertype'] 			= $this->session->userdata('usertype');
				$data['dbm_sub_pap_id'] 	= $this->session->userdata('dbm_sub_pap_id');
				$data['division_id'] 		= $this->session->userdata('division_id');
				$data['level_sub_pap_div']  = $this->session->userdata('level_sub_pap_div');
				$data['employment_type'] 	= $this->session->userdata('employment_type');
				$data['is_head'] 			= $this->session->userdata('is_head');

				$getemployees = $this->admin_model->getemployees();

				$getareas = $this->admin_model->getareas();

				$users = array();
			
				foreach ($getemployees as $rr) {
					$users[] = array('userid' => $rr->biometric_id , 'name' => $rr->f_name);
				}
				
				// for OT data 
					$sql   = "select e.f_name, p.position_name from employees as e 
							JOIN positions as p on e.position_id = p.position_id where e.employee_id = '{$data['employee_id']}'";
					
					$ddata = $this->Globalproc->__getdata($sql);
					$data['OT_data'] = [
							"ddate"	    => date("m/d/Y"),
							"dday"	    => date("l"),
							"name"	    => $ddata[0]->f_name,
							"position"  => $ddata[0]->position_name
						];
				// end for OT data 

				$data['areas'] = $getareas;
				$data['admin'] = ($this->Globalvars->usertype != "user")?true:false;

				$data['sub_pap_division_tree'] = $this->personnel_model->getsubpap_divisions_tree();
				$data['dtrformat'] = $this->admin_model->getdtrformat();
				$data['dbusers'] = $getemployees;
				
				$data['headscripts']['style'][0] = base_url()."v2includes/style/leave.cabinet.css";
				$data['headscripts']['js'][0] 	 = base_url()."v2includes/js/leave.calendar.js";
				$data['headscripts']['js'][] 	 = base_url()."v2includes/js/apply.calendar.js";
				
				$spl			    			 = $this->Globalproc->get_spl_count($data['employee_id']);
				
				$data['splcount']	 			 = 3 - $spl;
				
				if ($data['employment_type'] == "REGULAR" || $data['employment_type'] == "JO" ) {
					$remsss 			 	 = $this->Globalproc->getleavecredits($data['employee_id']);
					//var_dump($remsss);
					
					@$remsss				 	 = $remsss[ count($remsss)-1 ];
					
					# echo $remsss[0]['balance']."- vacation";
					# echo "<br/>";
					# echo $remsss[1]['balance']."- sick";
					
					// $remsss						 = $this->Globalproc->getvl_count($data['employee_id']);
					$cocvalue 					     = $this->Globalproc->get_coc($data['employee_id']);
					
					if ($remsss[0]['balance'] > 0) { // vl
						$data['vlcount']			 = $remsss[0]['balance'];
					} else {
						$data['vlcount']			 = "<p class='danger_text'> You have 0 remaining vacation leave. Continue? </p>";
					}
					
					if ($remsss[1]['balance'] > 0) { // Sl
						$data['slcount']			 = $remsss[1]['balance'];
					} else {
						$data['slcount']			 = "<p class='danger_text'> You have 0 remaining sick leave. Continue? </p>";
					}
					
					$data['flcount']				 = "loading...";
					
					//
					
					if (count($cocvalue) > 0) {
						$this->load->model("v2main/Ctomodel");
						// $cocval 			= $cocvalue[0]->total_credit;
						// $cocval 			= $cocvalue[0]->cred_total;
						// $credtotal		= $cocvalue[0]->cred_total;
						
						// $exp 			= explode(":",$credtotal);
						/*
						
						$data['cocvalue']   = $coc_clean_val = $this->Ctomodel->standard_time($this->Ctomodel->consec($this->Ctomodel->returntotimeformat($cocval)));
						$data['hours']  	= explode(":",$data['cocvalue'])[0];
						$data['mins']  		= explode(":",$data['cocvalue'])[1];
						*/
						
						$result 			= $this->Ctomodel->compute_empcredits( $this->session->userdata('employee_id') );
						$data['cocvalue']   = $coc_clean_val = $result['ctodata'][count($result['ctodata'])-1]['remaining'];
						
						$data['hours']  	= explode(":",$data['cocvalue'])[0];
						$data['mins']  		= explode(":",$data['cocvalue'])[1];
						// var_dump($result['ctodata'][2]);
					} else if (count($cocvalue) == 0) {
						$data['cocvalue']	   = "<p class='danger_text'> You have 0 remaining COC. You cannot continue. </p>";
						$coc_clean_val 		   = "0";
						
						$data['hours']  	= "00";
						$data['mins']  		= "00";
					}
					
					$data['coc_clean_val'] = $coc_clean_val;
					
				}
				
				// get all signatories
				$signs 							 = $this->Globalproc->get_signatories( $data['employee_id'] );
				
				$data['isdiv_chief']			 = $this->Globalproc->is_chief("division",$data['employee_id']);
				$data['isdbm_chief'] 			 = $this->Globalproc->is_chief("director",$data['employee_id']);
				// end 
				
				// signatories
				$data['division']			 	 = $signs['division'];
				$data['dbm']			 	 	 = $signs['dbm'];
				// end
				
				// if other signatories
				$data['division_other']			 = $signs['division_other'];
				$data['dbm_other']			 	 = $signs['dbm_other'];
				// end 
				
				// is first time logged in?
					$data['isfirst']			 = $this->Globalproc->gdtf("users",["employee_id"=>$data['employee_id']],["isfirsttime"])[0]->isfirsttime;
				// end 
				
				$data['main_content'] 			 = 'hrmis/dashboard/dashboard_view';
				$this->load->view('hrmis/admin_view',$data);
			}
			
		}
		
		public function recordrem() {
			$exact = $this->input->post("info")['grpid_'];
			$empid = $this->input->post("info")['empid_'];
			
			$this->load->model("v2main/Globalproc");

			$ret = $this->Globalproc->__save("creditrecords",
											['vlrec'  	=> $this->Globalproc->return_remaining( "VL", $empid ),
											 'slrec'  	=> $this->Globalproc->return_remaining( "SL", $empid ),
											 'cocrec' 	=> $this->Globalproc->return_remaining( "COC", $empid ),
											 'exact_id'	=> $exact,
											 'empid'	=> $empid]);
						
			// echo json_encode($this->Globalproc->return_remaining( "COC", $empid));
			echo json_encode($ret);
		}
		
		public function test_view() {
			/*
			$this->load->model("v2main/Globalproc");
			$this->load->model("Globalvars");
			
			if ( $this->Globalproc->is_chief("director",$this->Globalvars->employeeid) ) {
						// get the details of the head of the OC
						$fordir 	 		 = "select email_2, employee_id from employees where DBM_Pap_id = '1' and is_head = '1' and Division_id = '0'";
						$fordir_data 		 = $this->Globalproc->__getdata($fordir);
						$sendto 			 = $fordir_data[0]->email_2;
						$approving_person_id = $fordir_data[0]->employee_id;
						$isfinal 			 = true;
						$subject 			 = "I need your approval";
						$proceed_email 		 = true;
						
					echo $fordir;
					echo "<br/>";
					echo $sendto;
					echo "<br/>";
					echo $approving_person_id;
					echo "<br/>";
					echo $isfinal;
					echo "<br/>";
					echo $subject;
					echo "<br/>";
					echo $proceed_email;
			}
			*/
			
			$this->load->model("v2main/Ctomodel");
			
			$a = $this->Ctomodel->compute_empcredits("99");
			
			var_dump($a);
		}
		
		public function remaining_spl() {
			$this->load->model('Globalvars');
			$this->load->model("v2main/Globalproc");
			
			$spl  			= $this->Globalproc->get_spl_count($this->Globalvars->employeeid);
			
			echo json_encode( ["count"=>(3-$spl)] );
		}
		
		public function applycalendar() {
			$this->load->model('Globalvars');
			$this->load->model("v2main/Globalproc");
			$this->load->model("v2main/Ctomodel");
						
			$details  = $this->input->post("dets");
			$hrs      = $details['numofhrs'].":00";
			
			$cocvalue = $this->Ctomodel->convertoseconds($hrs);
			
			/*
				date_of_application
				am_in
				am_out
				pm_in
				pm_out
				total			= total 
				mult
				cred_total		= previous total_credit before the deduction
				total_credit    = the equal
				cto_hours
				cto_mins
				emp_id
				cto_start
				cto_end
				credit_type
				exact_ot
			*/
			
			// save to checkexact
			// save to checkexact_logs
			
			echo json_encode($cocvalue);
		}
	
		public function testget() {
			$this->load->model('Globalvars');
			$this->load->model("v2main/Globalproc");
			$testrems 			 = $this->Globalproc->getleavecredits($this->Globalvars->employeeid);
			
			$a = $testrems[ count($testrems)-1 ];
			echo $a[0]['balance']."- vacation";
			echo "<br/>";
			echo $a[1]['balance']."- sick";
		}

	}