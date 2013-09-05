<?php
	class Tracker_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

	
		function get_referal_by_id($id){
			$query=$this->db->query("SELECT * FROM trackreferal WHERE userid=".$id."");
			return $query->result();
		}
		function insert_ref_to_db($data){
			return $this->db->insert('trackreferal',$data);
		}

		
		
	}	

?>