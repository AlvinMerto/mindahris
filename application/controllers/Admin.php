<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	Class Admin extends CI_Controller{
		


		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');

		}

		public function index(){
			$data['main_content'] = 'admin/dashboard_view';
			$this->load->view('admin/admin_view',$data);
		}


		/*testing */

		public function sbadmin(){
			$data['main_content'] = 'admin/dashboard';
			$this->load->view('admin/sbadmin',$data);
		}



		public function generatedtr(){

			$sdate =  $_POST["sdate"];
			$edate =  $_POST["edate"];
			$userid =  $_POST["userid"];

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


		public function reports(){

			$getusers = $this->admin_model->getusers();
			$getusers123 = $this->admin_model->getusers123();

			$users = array();
		
			foreach ($getusers as $rr) {
				$users[] = array('userid' => $rr->USERID , 'name' => htmlentities($rr->Name, ENT_QUOTES, 'UTF-8'));
			}


			$data['dtrformat'] = $this->admin_model->getdtrformat();
			$data['dbusers'] = $users;
			$data['dbusers123'] = $getusers123;
	
			$data['main_content'] = 'admin/report_view';
			$this->load->view('admin/admin_view',$data);
		}


		public function printprev(){

			$data['test'] = 'test';
			$this->load->view('admin/reports/test',$data);
		}


	}