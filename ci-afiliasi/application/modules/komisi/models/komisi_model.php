<?php
	class Komisi_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function insert_komisi($data)
		{
			$query=	$this->db->insert('komisi',$data);
		}	

		function show_komisi($userid)	
		{
			$result=null;
			$query=$this->db->query("select `transaksi`.`userid` AS `userid`,`pembeli`.`idpembeli` AS `idpembeli`,`pembeli`.`atas_nama` AS `atas_nama`,
			`transaksi`.`total_qty` AS `total_qty`,`transaksi`.`total_transfer` AS `total_transfer`,
			`transaksi`.`info_transfer` AS `info_transfer`,`pembeli`.`alamat` AS `alamat` 
			from (`transaksi` join `pembeli` on((`pembeli`.`idpembeli` = `transaksi`.`idpembeli`)))
			 where transaksi.userid=".$userid."");

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
			$query=$this->db->query("SELECT
Sum(komisi.total_komisi) AS total_komisi,
komisi.userid AS userid,
pesan_produk.idpembeli AS idpembeli
from (`komisi` join `pesan_produk` on((`pesan_produk`.`idpesan` = `komisi`.`idpesan`)))
GROUP BY komisi.userid, pesan_produk.idpembeli
 where komisi.userid=".$userid." and pesan_produk.idpembeli=".$idpembeli."");

			if ($query!=null) {
				$result=$query->result();
			}

			return $result;

		}
	}	

?>