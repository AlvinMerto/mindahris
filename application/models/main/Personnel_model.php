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
							sp.DBM_Sub_Pap_id as id,
							'-1' as parentid,
							sp.DBM_Sub_Pap_Desc as name,
							sp.DBM_Sub_Pap_id as master_id,
							'DBM_Sub_Pap' as db_table
					 	FROM 
							DBM_Sub_Pap sp
						UNION ALL
						SELECT
						  	d.division_id as id,
							d.DBM_Sub_Pap_Id as parentid,
							d.Division_Desc as name,
							d.division_id as master_id,
							'Division' as db_table
							FROM 
							Division d";

			$result =  $DB2->query($query); 
			return $result->result();

		}


}
