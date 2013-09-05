<?php
	class Kirim_barang_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

	
		function show_all_transaksi($condition)
		{
			$result=null;
			$query=$this->db->query("SELECT
	`transaksi`.`idtransaksi` AS `idtransaksi`,
	`transaksi`.`idpembeli` AS `idpembeli`,
	`pembeli`.`atas_nama` AS `nama_pembeli`,
	`pembeli`.`alamat` AS `alamat`,
	`pembeli`.`kota` AS `kota`,
	`pembeli`.`provinsi` AS `provinsi`,
	`pembeli`.`negara` AS `negara`,
	`pembeli`.`postal` AS `postal`,
	`transaksi`.`total_qty` AS `total_qty`,
	`transaksi`.`total_transfer` AS `total_transfer`,
	`transaksi`.`info_transfer` AS `info_transfer`,
	`transaksi`.`timestamp` AS `timestamp`,
	`bank`.`namabank` AS `namabank`,
	`bank_admin`.`no_rekening` AS `no_rekening`,
	`bank_admin`.`atas_nama` AS `atas_nama`,
	`jasa_kirim`.`nama` AS `nama`,
	`jasa_kirim`.`biaya_kirim` AS `biaya_kirim`
FROM
	(
		(
			(
				(
					`transaksi`
					JOIN `pembeli` ON(
						(
							`pembeli`.`idpembeli` = `transaksi`.`idpembeli`
						)
					)
				)
				JOIN `bank_admin` ON(
					(
						`bank_admin`.`idbankacc_admin` = `transaksi`.`idbankacc_admin`
					)
				)
			)
			JOIN `jasa_kirim` ON(
				(
					`jasa_kirim`.`idjasa_kirim` = `pembeli`.`idjasa_kirim`
				)
			)
		)
		JOIN `bank` ON(
			(
				`bank`.`idbank` = `bank_admin`.`idbank`
			)
		)
	) WHERE transaksi.info_transfer = '".$condition."'");

			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function delete_transaksi($idpembeli)
		{
			// only update info in transaksi with "terhapus"
		}

		function insert_kirim_produk($data)
		{
			//insert into kirim_barang table
			$result=null;
			$this->db->insert('kirim_produk',$data);
			if ($this->db->affected_rows()>0) {
				$result=$this->db->affected_rows();
			}

			return $result;
		}

		function cek_idpembeli($idpembeli){

			$result=null;
			$query=$this->db->query("select userid from komisi where idpembeli=".$idpembeli." and isactive=0 ");
			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function update_info_pemesanan($idpembeli)
		{
			$result=null;
			$data=array('info_pemesanan'=>'sukses');
			$this->db->where('idpembeli',$idpembeli);
			$this->db->update('pesan_produk', $data);

				if ($this->db->affected_rows()>0) {
					$result=$this->db->affected_rows();
				}

				return $result;
		}


		function update_info_transfer($idpembeli)
		{
			$result=null;
			$data=array('info_transfer'=>'sukses');
			$this->db->where('idpembeli',$idpembeli);
			$this->db->update('transaksi', $data);

				if ($this->db->affected_rows()>0) {
					$result=$this->db->affected_rows();
				}

				return $result;
		}

		function select_data_for_total_komisi($idpembeli)
		{
			$result=null;
			$query=$this->db->query("select userid, total_komisi from komisi where idpembeli=".$idpembeli." and isactive=0 ");
			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function update_aktif_komisi($idpembeli)
		{
			$result=null;
			$data=array('isactive'=>1);
			$this->db->where('idpembeli',$idpembeli);
			$this->db->update('komisi', $data);

				if ($this->db->affected_rows()>0) {
					$result=$this->db->affected_rows();
				}

				return $result;	
		}

		function insert_new_komisi($data_new_komisi)
		{
			$result=null;
			$this->db->insert('total_komisi',$data_new_komisi);
			if ($this->db->affected_rows()>0) {
				$result=$this->db->affected_rows();
			}

			return $result;

		}

		function update_total_komisi($data_new_komisi, $userid)
		{
			$result=null;
			$this->db->where('userid',$userid);
			$this->db->update('total_komisi', $data_new_komisi);

				if ($this->db->affected_rows()>0) {
					$result=$this->db->affected_rows();
				}

				return $result;	
		}
	}	

?>