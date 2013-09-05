<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');

	class Pengaturan_model extends CI_Model{
		function __construct(){
			parent::__construct();
	}

	function get_all_bank(){
		$query=$this->db->query("SELECT * FROM bank");
		return $query->result();
	}
}

