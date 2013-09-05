<?php
	class Komisi_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function insert_komisi($data)
		{
			$query=	$this->db->insert('komisi',$data);
		}	

		function show_komisi($userid, $kondisi)	
		{
			$result=null;
			$query=$this->db->query("select `transaksi`.`userid` AS `userid`,`pembeli`.`idpembeli` AS `idpembeli`,`pembeli`.`atas_nama` AS `atas_nama`,
			`transaksi`.`total_qty` AS `total_qty`,`transaksi`.`total_transfer` AS `total_transfer`,
			`transaksi`.`info_transfer` AS `info_transfer`,`pembeli`.`alamat` AS `alamat`,transaksi.`timestamp` AS timestamp
			from (`transaksi` join `pembeli` on((`pembeli`.`idpembeli` = `transaksi`.`idpembeli`)))
			 where transaksi.userid=".$userid." and transaksi.info_transfer='".$kondisi."' order by idpembeli desc");

			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function show_detail($userid, $idpembeli)
		{
					$result=null;
			$query=$this->db->query("select `komisi`.`idkomisi` AS `idkomisi`,`komisi`.`userid` AS `userid`,`komisi`.`total_komisi` AS `total_komisi`,
				`komisi`.`isactive` AS `isactive`,`pesan_produk`.`idpembeli` AS `idpembeli`,`pesan_produk`.`qty` AS `qty`,`pesan_produk`.`info_pemesanan` AS `info_pemesanan`,`pesan_produk`.`harga_per_pesan` AS `harga_per_pesan`,
				`produk`.`nama` AS `nama`,`produk`.`harga` AS `harga` from ((`komisi` join `pesan_produk` on((`pesan_produk`.`idpesan` = `komisi`.`idpesan`)))
				join `produk` on((`produk`.`idproduk` = `pesan_produk`.`idproduk`))) where komisi.userid=".$userid." and pesan_produk.idpembeli=".$idpembeli."");

			if ($query!=null) {
				$result=$query->result();
			}

			return $result;

		}

		function show_total_komisi($userid, $idpembeli)
		{
			
			$result=null;
			$query=$this->db->query("
				select sum(`komisi`.`total_komisi`) AS `total_komisi`,`komisi`.`userid` AS `userid`,`pesan_produk`.`idpembeli` AS `idpembeli`
from (`komisi` join `pesan_produk` on((`pesan_produk`.`idpesan` = `komisi`.`idpesan`)))
WHERE komisi.userid = ".$userid." AND pesan_produk.idpembeli = ".$idpembeli."
group by `komisi`.`userid`,`pesan_produk`.`idpembeli`
				");

			if ($query!=null) {
				
				foreach ($query->result() as $total) {
					$result=$total->total_komisi;
				}
			}

			return $result;

		}

		function show_all_komisi($userid)
		{

			$result=null;
			$query=$this->db->query("select total_komisi.total_komisi AS `total_komisi`,`total_komisi`.`userid` AS `userid`
from (total_komisi) WHERE total_komisi.userid = ".$userid." ");

			if ($query!=null) {
				
				foreach ($query->result() as $total) {
					$result=$total->total_komisi;
				}
			}

			return $result;

		}

		function update_total_komisi($userid, $data){
			$this->db->where('userid', $userid);
			$this->db->update('total_komisi', $data); 
		}

		function add_new_total_komisi($data)
		{
			$this->db->insert('total_komisi', $data); 
		}

		function view_income_komisi($userid,$isactive)
		{
			$result=null;
			$query=$this->db->query("select sum(total_komisi) as sum from komisi where userid=".$userid." and isactive=".$isactive." ");
			
			if ($query!=null) {

				$result=$query->result();
			}

			return $result;
		}

	}	

?>