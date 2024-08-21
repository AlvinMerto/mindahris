<?php

	Class Main_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function select($query){
			if(!empty($query['join'])){$readJoin = $this->readJoin($query['join']); }else{$readJoin = '';}
			if(!empty($query['condition'])){$readCondition = $this->readCondition($query['condition']); }else{$readCondition = '1';}
			if(!empty($query['order'])){$order = $this->readOrder($query['order']); }else{$order='';}
			if(!empty($query['limit'])){$limit = "Limit ".$query['limit']; }else{$limit='';}
			$query = $this->db->query("select ".$query['field']." from ".$query['table']." ".$readJoin."  where 1 and (".$readCondition.") ".$order." ".$limit." ");
			return $query->result();
		}

		public function insert($query){

			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);

			$query = $DB2->query("insert into ".$query['table']." (".$query['field'].") values (".$query['value'].") ");
			return true;
		}
		
		public function update($query){
			
			$session_database = $this->session->userdata('database_default');			
			$DB2 = $this->load->database($session_database, TRUE);

			if(!empty($query['condition'])){$condition = $query['condition'];}else{$condition = '1'; }
			$query = $DB2->query("update ".$query['table']." set ".$this->updateSet($query['set'])." where 1 and ".$condition." ");
			return $query->result();
		}



		public function updateSet($query){
			$result = array();
			$field = explode(",", $query['field']);
			$value = explode(",", $query['value']);
			foreach ($fied as $key => $val) { $result[] = $val."='".$value[$key]."'"; }
			return join(', ',$result);
		}

		public function readOrder($query){
			$order = array();
			if(count($query)!=count($query,1)){
				foreach ($query as $val) {
					$order[] = $val['field'].' '.$val['type'];
				}
				return " Order by ".join(', ',$order);
			}else{ return ((!empty($query)) ? "Order by ".$query['field']." ".$query['type'] : ""); }
		}

		public function readJoin($query){  
            $string = null;
            if(!empty($query)){   
                foreach($query as $roll){
                    $string .= " ".$roll['type']." join ".$roll['table']." On ".$roll['condition']; 
                        
                }                 
            }
            return $string; 
        }

        public function readCondition($query){
            $string=null;
            //print_r($query);
            if(!empty($query)){
                if(count($query)>1){
                    foreach($query as $roll){
                        $string .= " ".$roll['type']." ".$roll['condition']; 
                    }                
                }else{
                    $string = $query;
                } 
            }
            return $string;   
        }

			function array_utf8_encode_recursive($dat) 
	        { if (is_string($dat)) { 
	            return utf8_encode($dat); 
	          } 
	          if (is_object($dat)) { 
	            $ovs= get_object_vars($dat); 
	            $new=$dat; 
	            foreach ($ovs as $k =>$v)    { 
	                $new->$k=$this->array_utf8_encode_recursive($new->$k); 
	            } 
	            return $new; 
	          } 
	          
	          if (!is_array($dat)) return $dat; 
	          $ret = array(); 
	          foreach($dat as $i=>$d) $ret[$i] = $this->array_utf8_encode_recursive($d); 
	          return $ret; 
	        } 


		function encode_special_characters($string){

			return iconv("UTF-8", "Windows-1252", $string);
		}
        
	}