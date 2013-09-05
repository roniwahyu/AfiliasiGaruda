<?php
	class Member_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function get_members(){
			//$query=$this->db->query("SELECT * FROM member ORDER BY id ASC");
			$query=$this->db->get('member');
			return $query->result();
		}

		function get_member_by_id($id){
			$query=$this->db->query("SELECT * FROM member WHERE id='$id'");
			//$query=$this->db->select(*)->where('id',$id);
			return $query->result();
		}
		

		function insert_users_to_db($data){
			return $this->db->insert('member',$data);
		}

		public function update_info($data,$id){
			$this->db->where('member.id',$id);
			return $this->db->update('member', $data);
		}

		public function delete_a_user($id){
			$this->db->where('member.id',$id);
			return $this->db->delete('member');
		}
	}
