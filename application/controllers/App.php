<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('reports_model');
    }


    public function notify(){
        $config = array('auth_key'=>'569cc4a878a4b1de8ddc',
            'secret' => '3e9b1066c883822b599d',
            'app_id' => '242884');

        $this->load->library('pusher',$config);
        $data =  $this->input->get('info');
        $this->pusher->trigger('my_notifications', 'notification', $data);
    }


    function updateactivities(){

        $info =  $this->input->post('info');
        $updateactivities = $this->reports_model->update_activities($info);

        if($updateactivities){
            echo json_encode(true);
        }

    }


    function getactivities(){
       $info =  $this->input->post('info');

       $session_employee_id = $this->session->userdata('employee_id');
       $info['employee_id'] = $session_employee_id;

        $getactivities = $this->reports_model->get_activities($info);

        $data = [];


       if($getactivities){

          $is_viewed = 0;

         foreach ($getactivities as $key => $value) {

                $creator_name =  ucwords(strtolower($value->creator_name));
                $owner_name =  ucwords(strtolower($value->owner_name));
                $assign_name =  ucwords(strtolower($value->assign_name));

                if($value->creator_image){
                  $creator_image = base_url().'/assets/profiles/'.$value->creator_image;
                }else{
                  $creator_image =  base_url().'/assets/images/userImage.gif';
                }

                if($value->owner_image){
                   $owner_image = base_url().'/assets/profiles/'.$value->owner_image;
                }else{
                   $owner_image = base_url().'/assets/images/userImage.gif';
                }
               
                if($value->assign_image){
                   $assign_image = base_url().'/assets/profiles/'.$value->assign_image;
                }else{
                   $assign_image = base_url().'/assets/images/userImage.gif';
                }
   
                if($value->exact_id){
                  $link =  base_url(). 'reports/applications/'.$value->exact_id.'/'.$value->type_mode;
                }else{
                  $link = '#';
                }


                if($value->creator_id == $session_employee_id){
                    $fullname = 'You';
                }else{
                    $fullname = $creator_name;
                }

                if($value->owner_id == $session_employee_id){
                    $your = '';
                }else if($value->owner_id == $value->creator_id) {
                    $your = '';
                }else{
                   $your = $owner_name;
                }

                if($value->owner_id == $session_employee_id && $value->description == 'approved' || $value->description == 'rejected'){
                  $your = 'your';
                }
          
                $content = '<b>'.$fullname.'</b> '.$value->description.' <b>'.$your.'</b> <b>'.$value->new_type_mode.'</b>';

                if($value->is_view == 0){
                   $is_viewed++;
                }
               
                $data[] = array('content' => $content , 'link' => $link , 'employee_image' => $creator_image , 'date_added' => $this->time_elapsed_string($value->date_added) );
           }

           echo json_encode(array('data' => $data, 'total_notification'  => $is_viewed));

       }else{
           echo json_encode(false);
       }



    }



    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }



    function updatenotification(){
         $info =  $this->input->post('info');
         $udpate = $this->reports_model->update_notification($info);

         if($udpate){
          echo json_encode(true);
         }

    }


    function urlExists()  
  {  

      $url = 'http://192.168.1.13';
      if($url == NULL) return false;  
      $ch = curl_init($url);  
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
      $data = curl_exec($ch);  
      $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
      curl_close($ch);  
      if($httpcode>=200 && $httpcode<300){  
          echo  'unable to connect bi';  
      } else {  
          echo 'false';  
      }
  }

	function s_act($empid = false, $details = false, $tablefrom = false, $table_index_id = false) {
		
		$this->load->model("v2main/Globalproc");
		
		$date = date("m/d/Y h:i:s A");
		
		if ($empid == false && $details == false) {
			$dets    			= $this->input->post("info");
			$dets    			= $dets['dets'];
			
			$empid   			= $dets["empid"];
			$details 			= $dets["details"];
			$tablefrom  		= $dets["tablefrom"];
			$table_index_id 	= $dets["indexid"];
		}

		$det_str		  = json_encode($details);
		
		$activity_details = [
							"emp_id"			=> $empid,
							"activity_details"	=> $det_str,
							"ac_date"			=> $date,
							"table_index_id"	=> $table_index_id,
							"table_from"		=> $tablefrom
						];
		
		// $str    		  = json_encode($activity_details);
		// echo $str;
		
		$ret = $this->Globalproc->__save("activities",$activity_details);
		echo json_encode($ret);
	}



}
