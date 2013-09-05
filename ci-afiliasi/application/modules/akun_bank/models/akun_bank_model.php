<?php
	class Akun_bank_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function get_bank_admin()
		{
			$query=$this->db->query("SELECT
	`bank_admin`.`idbankacc_admin` AS `idbankacc_admin`,
	`bank_admin`.`userid` AS `userid`,
	`bank_admin`.`idbank` AS `idbank`,
	`bank`.`namabank` AS `namabank`,
	`bank`.`kodebank` AS `kodebank`,
	`bank_admin`.`no_rekening` AS `no_rekening`,
	`bank_admin`.`atas_nama` AS `atas_nama`,
	`bank_admin`.`isactive` AS `isactive`
FROM
	(
		`bank`
		JOIN `bank_admin` ON(
			(
				`bank`.`idbank` = `bank_admin`.`idbank`
			)
		)
	)
WHERE
	(`bank_admin`.`isactive` = 1)");

			return $query;
		}


function get_per_item($id)
	{
		$result=null;
		$query=$this->db->query("SELECT
	`bank_admin`.`idbankacc_admin` AS `idbankacc_admin`,
	`bank_admin`.`userid` AS `userid`,
	`bank_admin`.`idbank` AS `idbank`,
	`bank`.`namabank` AS `namabank`,
	`bank_admin`.`no_rekening` AS `no_rekening`,
	`bank_admin`.`atas_nama` AS `atas_nama`,
	`bank_admin`.`isactive` AS `isactive`
FROM
	(
		`bank`
		JOIN `bank_admin` ON(
			(
				`bank`.`idbank` = `bank_admin`.`idbank`
			)
		)
	)
WHERE (`bank_admin`.`isactive` = 1 AND bank_admin.idbankacc_admin=".$id.")");
		if ($query!=null) {
			$result=$query->result();
		}

		return $result;
	}

		
		
	}	


?>