<?php
	class Broadcast_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function get_email_by_id($id){
			$query=$this->db->query("SELECT username,email FROM member WHERE id='$id'");
			return $query;
		}

		
	}	

?>