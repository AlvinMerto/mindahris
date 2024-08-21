<?php
/*
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
*/
class Anjotest extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }


    public function testing(){
    	echo 'testing lng ni ha';
    }
	
	public function calcleave() {
		$this->load->model("v2main/Globalproc");
		
		$empid = 50;
		$exactid = 6493;
		
		$type_details = [
			"typemode" 	  => "SPL",
			"leave_value" => 4,
			"date_inclusion" => "Nov 2, 2017",
			"no_days_applied" => "1"
		];
		
		$a = $this->Globalproc->calc_leavecredits($empid, $exactid, $type_details);
		var_dump($a);
	}
	
	public function test_spl_count() {
		$this->load->model("v2main/Globalproc");
		
		$a = $this->Globalproc->get_spl_count("50");
		echo $a;
	}

	public function getsigns() {
		$this->load->model("v2main/Globalproc");
		
		$a  = $this->Globalproc->get_signatories("377");
		var_dump($a);
	}
	
	public function test_email() {
		$this->load->model("Attendance_model");
		$grpid = "e67444-3a054f";
		$empid = 408;
			
		$ret = $this->Attendance_model->send_email($grpid, $empid);
		
	}
	
	public function email_testing() {
		$this->load->model("v2main/Globalproc");
		
		$email 				= "alvinjay.merto@minda.gov.ph, merto.alvinjay@gmail.com";
		$details["to"]	    = $email;
		$details['subject'] = "test email 2";
		$details['message'] = "testing testing testing 2";
		$details["from"] 	= "minda testing email center";
			
		$ret = $this->Globalproc->sendtoemail($details);
		
		var_dump($ret);
	}
}