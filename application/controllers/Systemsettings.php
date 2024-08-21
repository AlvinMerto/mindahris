<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	Class Systemsettings extends CI_Controller{
		

		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');

		}

		public function index(){
			
		}

		public function databasesettings(){

			$data['title'] = '| Database Settings';
			$data['get_database'] = $this->session->userdata('database_default');
			$data['main_content'] = 'hrmis/systemsettings/database_settings_view';
			$this->load->view('hrmis/admin_view',$data);

		}


		function setdatabase(){

			$info = $this->input->post('info');
			$database = $info['database'];
			$this->session->set_userdata('database_default', $database);
			echo json_encode(true);

		}

		public function importexport(){

			$data['main_content'] = 'admin/systemsettings/importexport_settings_view';
			$this->load->view('admin/admin_view',$data);

		}
		
		public function deletebio() {
			
			$this->load->model("v2main/Globalproc");
			
			$info = $this->input->post("info");
			
			$del = "delete from areas where area_code = '{$info['del']}'";
			
			if( $this->Globalproc->run_sql($del) ) {
				echo json_encode(true);
			} else {
				echo json_encode(false);
			}
			
		}
		
		public function ping() {
			$this->load->model("v2main/Globalproc");
			
			$area_1 = $this->input->post("info");
			$area 	= $area_1['area_code'];
			
			$ip   = $this->Globalproc->get_details_from_table("areas",["area_code"=>$area],["ipaddress"]);
			$ip =   $ip['ipaddress'];
			
			exec("/bin/ping -c2 -w2 $ip", $outcome, $status); 
			
			if ($status == 0) {
				$status = "<span style='color:green;'>ALIVE!</span>";
			} else {
				$status = "<span style='color:red;'>DEAD!</span>";
			}
			
			echo json_encode("The machine is ".$status);
			
		}
		
		public function biometricsettings() {
			$this->load->model("v2main/Globalproc");
			$info   = $this->input->post("info");
			
			if ( empty($info) ) {
				$data['title'] = '| Biometric Device Settings';
				// $data['get_database'] = $this->session->userdata('database_default');

				$sql   		   = "select * from areas";
				$data['areas'] = $this->Globalproc->__getdata($sql);
				
				$data['headscripts']['js'][0] = base_url()."assets/js/v2js/v2.mindajsmodel.js";
				$data['headscripts']['js'][1] = base_url()."v2includes/js/biometric.procs.js";
				
				$data['main_content'] = 'v2views/biometricsettings';
				$this->load->view('hrmis/admin_view',$data);
			} else {
					// for update
					$for_update 	 = $info['update'];
					$to_table_update = false;
					
					if (count($for_update) != 0) {
						for($i=0;$i<=count($for_update)-1;$i++) {
							$to_table_update = $this->Globalproc->__update("areas",["ipaddress"=>$for_update[$i][1]],["area_code"=>$for_update[$i][0]]);
						}
					}
					// end updates
					
					// for new entries
					$new_entry  	 = $info['new'];
					$to_table_insert = false;	

					if (count($new_entry) != 0) {
						for($m=0;$m<=count($new_entry)-1;$m++) {
							$to_table_insert = $this->Globalproc->__save("areas",["area_name"=>$new_entry[$m][0],
																				  "ipaddress"=>$new_entry[$m][1],
																				  "area_code"=>substr($new_entry[$m][0],0,3),
																				  ]);
						}
					}
					// end new entry
					
					if ($to_table_insert || $to_table_update) {
						echo json_encode(true);
					} else {
						echo json_encode(false);
					}
				
			}
		}

	}