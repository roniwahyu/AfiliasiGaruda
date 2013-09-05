<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');

	class Pengaturan_model extends CI_Model{
		function __construct(){
			parent::__construct();
	}

	function get_all_bank(){
		$query=$this->db->query("SELECT * FROM bank where isactive=1");
		return $query->result();
	}

	function get_rekening_by_id($id){
		$query=$this->db->query("SELECT
users.userid AS userid,
users.username AS username,
bank.namabank AS namabank,
bank.idbank AS idbank,
bank_account.account AS account,
bank_account.idbankacc
from ((bank join bank_account on((bank.idbank = bank_account.idbank))) 
join users on((users.userid = bank_account.userid)))
 where (users.userid = '$id')");

		return $query->result();
	}

	function total_rek($userid){
		$result=null;
		$query=$this->db->query("SELECT
Count(idbankacc) as total_akun
from bank_account
where userid=".$userid." ");
		if ($query!=null) {
			foreach ($query->result() as $akun_bank) {
				$result=$akun_bank->total_akun;
			}
		}

		return $result;
	}

	function update_data_bank($data,$id){
		$result=null;
			$this->db->where('userid',$id);
			$this->db->update('bank_account', $data);

				if ($this->db->affected_rows()>0) {
					$result=$this->db->affected_rows();
				}

				return $result;
	}

	public function insert_data_bank($data){
		return $this->db->insert('bank_account',$data);
	}

	// function cek_akun_bank($userid)
	// {
	// 	$result=null;
	// 	$query=$this->db->query("select idbank from bank_account where userid=".$userid." and isactive=1");
	// 	if ($query!=null) {
	// 		$result=$query->result();
	// 	}

	// 	return $result;
	// }
}

