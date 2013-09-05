<?php
	class Withdraw_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}


		function insert_new_withdraw($data)
		{
			$result=null;
			$this->db->insert('withdraw',$data);

			if ($this->db->affected_rows()>0) {
				$result=$this->db->affected_rows();
			}

			return $result;
		}

		function last_withdraw($userid){
			$result=null;
			$query=$this->db->query("SELECT
bank.idbank,
bank.namabank,
bank_account.account,
withdraw.total_withdraw,
withdraw.isactive,
withdraw.timestamp,
withdraw.id_withdraw
FROM withdraw
INNER JOIN bank_account ON bank_account.idbankacc = withdraw.id_bankacc
INNER JOIN bank ON bank.idbank = bank_account.idbank
where withdraw.userid = ".$userid." and withdraw.isactive=0 order by withdraw.id_withdraw desc  ");

			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function withdraw_per_user($userid)
		{
			$result=null;
			$query=$this->db->query("SELECT
bank.idbank,
bank.namabank,
bank_account.account,
withdraw.total_withdraw,
withdraw.isactive,
withdraw.timestamp,
withdraw.id_withdraw
FROM withdraw
INNER JOIN bank_account ON bank_account.idbankacc = withdraw.id_bankacc
INNER JOIN bank ON bank.idbank = bank_account.idbank
where withdraw.userid=".$userid." and withdraw.isactive=1
order by withdraw.id_withdraw desc");
			
			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function view_total_komisi($userid,$isactive)
		{
			$result=null;
			$query=$this->db->query("select sum(total_withdraw) as sum from withdraw where userid=".$userid." and isactive=".$isactive." ");
			
			if ($query!=null) {

				$result=$query->result();
			}

			return $result;
		}
		
		}

?>