<?php
	class Transaksi_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function insert_pembeli($pembeli)
		{
			$this->db->insert('pembeli',$pembeli);
			$last_idpembeli=$this->db->insert_id();
			return $last_idpembeli;
		}

		function insert_pesan_produk($pesan)
		{
			$this->db->insert('pesan_produk',$pesan);
			$last_idproduk=$this->db->insert_id();
			return $last_idproduk;
		}

		function get_parent($userid)
		{
			$result=null;
			$query=$this->db->query("select parent from role_user where userid=".$userid."");
			if ($query!=null) {
				foreach ($query->result() as $user) {
					$result=$user->parent;
				}
			}

			return $result;
		}

		function get_tot_harga($idpembeli)
		{
			$result=null;
			$query=$this->db->query("select sum(harga_per_pesan) as total from pesan_produk where idpembeli=".$idpembeli."");

			if ($query!=null) {
				foreach ($query->result() as $total) {
					$result=$total->total;
				}
			}

			return $result;
		}

		function get_produk_perpembeli($idpembeli)
		{
			$result=null;
			$query=$this->db->query("SELECT
	`pesan_produk`.`idpesan` AS `idpesan`,
	`produk`.`idproduk` AS `idproduk`,
	`produk`.`nama` AS `nama`,
	`produk`.`harga` AS `harga`,
	`pesan_produk`.`qty` AS `qty`,
	`pesan_produk`.`harga_per_pesan` AS `harga_per_pesan`,
	`pesan_produk`.`idpembeli` AS `idpembeli`
FROM
	(`produk`
		JOIN `pesan_produk` ON((`produk`.`idproduk` = `pesan_produk`.`idproduk`))
	)
WHERE	(`pesan_produk`.`idpembeli` = '$idpembeli')");

			if ($query!=null) {
				$result=$query->result();
			}
			return $result;

		}

		function del_pembeli($id)
		{
			$this->db->delete('pembeli', array('idpembeli' => $id)); 
		}

		function insert_transaksi($transaksi){
			$this->db->insert('transaksi',$transaksi);
		}

	
		
		}

?>