<?php
	class Transfer_komisi_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

	
		function show_req_komisi($condition)
		{
			$result=null;
			$query=$this->db->query("
				select `withdraw`.`id_withdraw` AS `id_withdraw`,`withdraw`.`total_withdraw` AS `total_withdraw`,
				`withdraw`.`isactive` AS `isactive`,`withdraw`.`timestamp` AS `timestamp`,`bank`.`namabank` AS `namabank`,
				`bank_account`.`account` AS `account`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname`,
				`users`.`email` AS `email`,`users`.`email2` AS `email2` from (((`withdraw` join `users`
				on((`users`.`userid` = `withdraw`.`userid`))) join `bank_account` on((`bank_account`.`idbankacc` = `withdraw`.`id_bankacc`)))
				join `bank` on((`bank`.`idbank` = `bank_account`.`idbank`))) where withdraw.isactive=".$condition."");

			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function update_withdraw($data, $id_withdraw)
		{
			$result=null;
			$this->db->where('id_withdraw',$id_withdraw);
			$this->db->update('withdraw', $data);

				if ($this->db->affected_rows()>0) {
					$result=$this->db->affected_rows();
				}

				return $result;

		}


	}	

?>