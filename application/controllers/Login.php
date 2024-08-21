<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {
        $this->data['title'] = 'Login Form';
        $this->load->view('admin/login_view', $this->data);
    }

    public function authorize() {
        $info = $this->input->post('info');
		
	//	$info['username'] = "maryann.verzosa@minda.gov.ph";
	//	$info['password'] = "a2796afc94a7b4c3040f82d0f27558d2";
		
		$result = $this->login_model->authorizeUser($info);
        echo json_encode($result);
    }

    public function createsession() {
        $info = $this->input->post('info');
        //Get functions of user

        $result2 = $this->login_model->getUserInformation($info[0]['employee_id']);

		/*
		employee_id: 389
		success: 1
		username: "amerto"
		usertype: "admin"
		*/
		
        $user_session = array(
            'employee_id' => $info[0]['employee_id'],
            'username' => $info[0]['username'],
            'usertype' => $info[0]['usertype'],

            //'first_name' => $result2[0]->first_name,
            'full_name' => $result2[0]->f_name,
            'first_name' => $result2[0]->firstname,
            'last_name' => $result2[0]->l_name,
            'biometric_id' => $result2[0]->biometric_id,
            //'user_email' => $result2[0]->email,
            //'user_position' => $result2[0]->position_name,
            'area_id' => $result2[0]->area_id,
            'area_name' => $result2[0]->area_name,
          
            //'display_name' => $result2[0]->display_name,
            'ip_address' => $_SERVER["REMOTE_ADDR"],
            //'theme_color' => $result2[0]->theme_color,
            //'bg_image' => $result2[0]->bg_image,
            //'font_color' => $result2[0]->font_color,
            //'ticket_log_order_start_on' => $result2[0]->ticket_log_order_start_on,
            'is_logged_in' => TRUE,
            'database_default' => 'sqlserver',
            'employment_type' => $result2[0]->employment_type,
            'employee_image' => $result2[0]->employee_image,
            'level_sub_pap_div' => $result2[0]->Level_sub_pap_div,
            'division_id' => $result2[0]->Division_id,
            'dbm_sub_pap_id' => $result2[0]->DBM_Pap_id,
			'is_head' => $result2[0]->is_head,
            'office_division_name' => $result2[0]->office_division_name,
            'position_name' => $result2[0]->position_name,
			'isfocal'	=> $result2[0]->isfocal

			//'profile_picture' => $result2[0]->image_path
        );
        $this->session->set_userdata($user_session);

        echo json_encode(array('success' => true));
    }

    public function getuserinformation() {
        $user_id = $this->session->userdata('user_id');
        $result = $this->login_model->getUserInformation($user_id);
        echo json_encode($result);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */