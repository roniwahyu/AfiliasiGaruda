<?php
	
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Transaksi extends MX_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('template/template_model', 'template', TRUE);
			$this->load->model('transaksi_model', 'transaksi_model', TRUE);
			$this->load->model('produk/produk_model', 'produk', TRUE);
			$this->load->model('profile/profile_model', 'profile', TRUE);
			$this->load->model('komisi/komisi_model', 'komisi_model', TRUE);
			$this->load->model('akun_bank/akun_bank_model', 'akun_bank_model', TRUE);
			$this->load->model('jasa_kirim/jasa_kirim_model', 'jasa_kirim_model', TRUE);
		}

		function index(){
			$idproduk=$this->input->post('idproduk');

				if (!isset($idproduk)) {
					redirect('produk');
				}

			$session=$this->session->all_userdata();
			$page['title']='Transaksi';
			$view_as='guest';
			$result=array(
					'dataproduk'=>Modules::load('produk/produk')->show_all(),
					'idproduk'=>$idproduk,
					'jasa_kirim'=>$this->jasa_kirim_model->get_aktif_jasa_kirim(),
					'bank_pilihan'=>$this->akun_bank_model->get_bank_admin(),
					'datapembeli'=>null);

			if ($this->session->userdata('login')===TRUE && $session['rolename']==='member' && isset($session['userid'])) {
					$view_as='member';
					$result=array(
								'dataproduk'=>Modules::load('produk/produk')->show_all(),
								'idproduk'=>$idproduk,
								'jasa_kirim'=>$this->jasa_kirim_model->get_aktif_jasa_kirim(),
								'bank_pilihan'=>$this->akun_bank_model->get_bank_admin(),
								'datapembeli'=>$this->tampil_detail_pembeli($session['userid'])
							);	
				$page['menus']=$this->template->menu($view_as);
				$this->load->view('template/header_member', $page);		
				$this->load->view('transaksi', $result);
			}
			else
			{
				$page['menus']=$this->template->menu($view_as);
			$this->load->view('template/header', $page);
			$this->load->view('transaksi', $result);
			$this->load->view('template/footer');
			}

			
			
			
		}


		function tampil_detail_barang($idproduk)
		{
			if ($idproduk==null) {
				redirect('produk');
			}
			$dataproduk=$this->produk->get_per_item($idproduk);

			return $dataproduk->result();

		}

		function tampil_detail_pembeli($userid)
		{
			if ($userid==null) {
				redirect('login');
			}
			$datapembeli=$this->profile->get_data($userid);
	
			return $datapembeli->result();
		}

		function get_refid($userid)
		{

			//get userid when user click or sign up via referal link
				$id_parent=null;
				if ($userid==null) {
					$id_parent=$this->input->cookie('refid');}
				else
				{$id_parent=$this->transaksi_model->get_parent($userid);}	

			return $id_parent;

		}

		function do_pesan()
		{	

			$data_pembeli=array(
							'atas_nama'=>$this->input->post('nama_pemesan'),
							'alamat'=>$this->input->post('alamat'),
							'kota'=>$this->input->post('kota'),
							'provinsi'=>$this->input->post('provinsi'),
							'negara'=>$this->input->post('negara'),
							'postal'=>$this->input->post('postal'),
							'userid'=>(($this->session->userdata('userid')!=null)?$this->session->userdata('userid'):0),
							'idjasa_kirim'=>$this->input->post('jasa_kirim'),
							'timestamp'=>date('Y-m-d H:i:s')
						);

			if (empty($data_pembeli['atas_nama']) || empty($data_pembeli['alamat']) || empty($data_pembeli['kota']) || empty($data_pembeli['provinsi']) || empty($data_pembeli['negara']) || empty($data_pembeli['postal']) || empty($data_pembeli['idjasa_kirim'])) {
				redirect('error');
			}

			$simpan_data_pembeli=$this->transaksi_model->insert_pembeli($data_pembeli);

			$data=array();
			$data_pesan_produk=array();
			$datakomisi=array();
			$total_qty=0;

			$id_parent=$this->get_refid($this->session->userdata('userid'));
	
			//inserting data to pesan_barang table
			for ($i=0; $i <count($this->input->post('idproduk')); $i++) { 
				if (!empty($_POST['qty'][$i])) {
					$data[$i]=array(
						'idpembeli'=>$simpan_data_pembeli,
						'idproduk'=>$_POST['idproduk'][$i],
						'qty'=>$_POST['qty'][$i],
						'info_pemesanan'=>'pending',
						'harga_per_pesan'=>$_POST['qty'][$i]*$_POST['harga'][$i],
						'timestamp'=>date('Y-m-d H:i:s')
							);
				$total_qty=$total_qty+$_POST['qty'][$i];

				$data_pesan_produk[$i]=$this->transaksi_model->insert_pesan_produk($data[$i]);
				// $current_komisi=$this->komisi_model->show_all_komisi($id_parent);
				//inserting comission for each pesang_barang
				if ($id_parent!=null||$id_parent!=0) {
					//get current comission

					$datakomisi[$i]=array(
							'idpesan'=>$data_pesan_produk[$i],
							'userid'=>$id_parent,
							'idpembeli'=>$simpan_data_pembeli,
							'child_id'=>($this->session->userdata('userid')==null?0:$this->session->userdata('userid')),
							'total_komisi'=>$_POST['qty'][$i]* $_POST['harga'][$i] * 0.2,
							'isactive'=>0,
							'timestamp'=>date('Y-m-d H:i:s')
							);
						$this->komisi_model->insert_komisi($datakomisi[$i]);	}
						
				}
			}
			
				if ($simpan_data_pembeli!=null && count($data_pesan_produk)>0) {

					$data_biaya=$this->jasa_kirim_model->get_per_item($data_pembeli['idjasa_kirim']);
					foreach ($data_biaya as $biaya) {
						$biaya_kirim=$biaya->biaya_kirim;}

					$data_transaksi=array(
						'userid'=>$this->get_refid($this->session->userdata('userid')),
						'idpembeli'=>$simpan_data_pembeli,
						'idbankacc_admin'=>$this->input->post('bank_tujuan'),
						'total_qty'=>$total_qty,
						'total_transfer'=>$this->transaksi_model->get_tot_harga($simpan_data_pembeli)+$biaya_kirim,
						'info_transfer'=>'pending',
						'timestamp'=>date('Y-m-d H:i:s')
				);

					$this->transaksi_model->insert_transaksi($data_transaksi);
					$this->info_transaksi($data_pembeli, $data_transaksi);// go to info_transaksi page
				}
				else
				{
					$this->transaksi_model->del_pembeli($simpan_data_pembeli);
					redirect('error');
				}

		}


		function info_transaksi($data_pembeli, $data_transaksi)
		{
			if ($data_pembeli==null||$data_transaksi==null) {
				redirect('produk');
			}


			//$id_parent=$this->get_refid($this->session->userdata('userid'));

			$data_info=array(
							'atas_nama'=>$data_pembeli['atas_nama'],
							'alamat'=>$data_pembeli['alamat'],
							'kota'=>$data_pembeli['kota'],
							'provinsi'=>$data_pembeli['provinsi'],
							'negara'=>$data_pembeli['negara'],
							'postal'=>$data_pembeli['postal'],
							'total_qty'=>$data_transaksi['total_qty'],
							'data_produk'=>$this->transaksi_model->get_produk_perpembeli($data_transaksi['idpembeli']),
							'total_transfer'=>$data_transaksi['total_transfer'],
							'jasa_kirim'=>$this->jasa_kirim_model->get_per_item($data_pembeli['idjasa_kirim']),
							'bank_tujuan'=>$this->akun_bank_model->get_per_item($data_transaksi['idbankacc_admin'])
						);

			$session=$this->session->all_userdata();
					$page['title']='Transaksi';
					$view_as='guest';

				if ($this->session->userdata('login')===TRUE && $session['rolename']==='member' && isset($session['userid'])) {
						$view_as='member';
					$page['menus']=$this->template->menu($view_as);
					$this->load->view('template/header', $page);
					$this->load->view('info_transaksi', $data_info);
							}
				else{
					$page['menus']=$this->template->menu($view_as);
					$this->load->view('template/header', $page);
					$this->load->view('info_transaksi', $data_info);
					$this->load->view('template/footer');
				}
		}

	}