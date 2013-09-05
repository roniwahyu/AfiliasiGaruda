<?php
	class Registrasi_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function insert_member_db($data){
			return $this->db->insert('users',$data);
		}

		function insert_role_user($data){
			return $this->db->insert('role_user',$data);
		}

		function get_latest_id(){
			$query=$this->db->query("SELECT * FROM users ORDER BY userid DESC LIMIT 1");
			return $query->result();
		}

		function aktivasi_user($kode){			
			$data['kode']=$kode;
			$data['status']=1;
			$this->db->where('member.kode',$kode);
			return $this->db->update('member', $data);
		}
	}	

?>