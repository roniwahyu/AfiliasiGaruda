<?php
	class Ref_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function insert_ref_to_db($data){
			return $this->db->insert('trackreferal',$data);
		}
		
	}	

?>