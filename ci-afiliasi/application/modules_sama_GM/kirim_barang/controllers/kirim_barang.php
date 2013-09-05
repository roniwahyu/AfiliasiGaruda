<?php
	
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Kirim_barang extends MX_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('komisi/komisi_model', 'komisi_model', TRUE);
			$this->load->model('kirim_barang_model', 'kirim_barang_model', TRUE);
		}

		function index(){
		$datalogin=$this->session->all_userdata();
			// if($datalogin['login']===TRUE && $datalogin['rolename']==='administrator' && isset($datalogin['userid']))
			// 	{

   // 				}
		$data=array(
				'pending_transaksi'=>$this->kirim_barang_model->show_all_transaksi('pending'),
				'sukses_transaksi'=>$this->kirim_barang_model->show_all_transaksi('sukses'),
				'terhapus_transaksi'=>$this->kirim_barang_model->show_all_transaksi('hapus'),
				);
			$this->load->view('kirim_barang', $data);
		}


		function kirim()
		{
			$idpembeli=$this->input->post('idpembeli');		$idtransaksi=$this->input->post('idtransaksi');

			if ($idpembeli==null||$idpembeli==0||$idtransaksi==null||$idtransaksi==0) {
				redirect('kirim_barang');
			}

			$cek_idpembeli_komisi=$this->kirim_barang_model->cek_idpembeli($idpembeli);

			$data=array(
				'idpembeli'=>$idpembeli,
				'idtransaksi'=>$idtransaksi,
				'info_pengiriman'=> 'terkirim',
				'isactive'=>1,
				'timestamp'=>date('Y-m-d H:i:s')
				);

				$this->kirim_barang_model->insert_kirim_produk($data);

				$update_info_pemesanan=$this->update_info_pemesanan($idpembeli);
				if ($update_info_pemesanan==null) {
					redirect('update_info_pemesanan');
				}

				$update_info_transfer=$this->update_info_transfer($idpembeli);
				if ($update_info_transfer==null) {
					redirect('update_info_transfer');
				}

				if ($cek_idpembeli_komisi!=null) {

						$data_komisi=$this->select_data_for_total_komisi($idpembeli);

						if ($data_komisi==null) {redirect('error_msg');}
						// var_dump($data_komisi);

						$update_total_komisi=$this->update_total_komisi($data_komisi);

						if ($update_total_komisi==null) {redirect('update_total_komisi');}

						$update_aktif_komisi=$this->update_aktif_komisi($idpembeli);

						if ($update_aktif_komisi==null) {redirect('error_aktif_komisi');}
						else
						{echo "Success to configure komisi ";}

				}

				echo "Success configure pengiriman barang";


			/** 1.insert into kirim_produk
				2. update info_pemesanan at pesan_produk into 'sukses'  which idpembeli equals to idpembeli from kirim_produk
				3. update info_transfer at transaksi into 'sukses' which idpembeli equals to $idpembeli 
				4. select total_komisi	and userid from komisi where idpembeli=$idpembeli and isactive=0
				5. insert or update total_komisi from total_komisi where userid=komisi.userid from 4th step
				6. update isactive into 1 from komisi where idpembeli =$idpembeli
			**/


		}

		function update_info_pemesanan($idpembeli)
		{
			if ($idpembeli==null) {
				redirect('kirim_barang');
			}
			// update value:info_pemesanan=sukses

			$result=null;
			$query=$this->kirim_barang_model->update_info_pemesanan($idpembeli);
			if ($query!=null) {
				$result=$query;
			}

			return $result;

		}

		function update_info_transfer($idpembeli)
		{
			if ($idpembeli==null) {
				redirect('kirim_barang');
			}
				// update value:info_transfer=sukses
			$result=null;
			$query=$this->kirim_barang_model->update_info_transfer($idpembeli);
			if ($query!=null) {
				$result=$query;
			}

			return $result;


		}

		function select_data_for_total_komisi($idpembeli)
		{
			// this function should be proccess array data type
			if ($idpembeli==null) {
				redirect('kirim_barang');
			}
			$result=null;

			$data_total_komisi=$this->kirim_barang_model->select_data_for_total_komisi($idpembeli);
			if ($data_total_komisi!=null) {
				$aktif_komisi=0;
				foreach ($data_total_komisi as $komisi) {
					$userid=$komisi->userid;
					$aktif_komisi=$aktif_komisi+$komisi->total_komisi;

				}

				$result=array(
						'userid'=>$userid,
						'total_komisi'=>$aktif_komisi,
					);
			}
			//should return sum of total_komisi and its userid
			// return value is array data type from selecting query

			return $result;

		}

		function update_total_komisi($data)
		{
			if ($data==null) {
				redirect('kirim_barang');
			}

			$result=null;

			$current_komisi=$this->komisi_model->show_all_komisi($data['userid']);

			if ($current_komisi==null) {
				$data_new_komisi=array(
								'userid'=>$data['userid'],
								'total_komisi'=>$data['total_komisi'],
								'isactive'=>(($data['total_komisi']>=100000)?1:0),
								'timestamp'=>date('Y-m-d H:i:s')
					);
			$result=$this->kirim_barang_model->insert_new_komisi($data_new_komisi);
			}
			else{
				$data_new_komisi=array(
								'total_komisi'=>$data['total_komisi']+$current_komisi,
								'isactive'=>(($data['total_komisi']+$current_komisi>=100000)?1:0),
								'timestamp'=>date('Y-m-d H:i:s')
					);
				$result=$this->kirim_barang_model->update_total_komisi($data_new_komisi, $data['userid']);
			}

			return $result;
		}


		function update_aktif_komisi($idpembeli)
		{
			$result=null;
			// update komisi table
			if ($idpembeli==null) {
				redirect('kirim_barang');
			}

			$query=$this->kirim_barang_model->update_aktif_komisi($idpembeli);
			if ($query!=null) {
				$result=$query;
			}

			return $result;
		}
	
	}











