<?php
	
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Withdraw extends MX_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('template/template_model', 'template', TRUE);
			$this->load->model('withdraw/withdraw_model', 'withdraw_model', TRUE);
			$this->load->model('pengaturan/pengaturan_model', 'pengaturan_model', TRUE);
			$this->load->model('komisi/komisi_model', 'komisi_model', TRUE);
			$this->load->model('kirim_barang/kirim_barang_model', 'kirim_barang_model', TRUE);
		}

		function index(){

			$datalogin=$this->session->all_userdata();
				if($datalogin['login']===TRUE && $datalogin['rolename']==='member' && isset($datalogin['userid']))
				{
					$session=$this->session->all_userdata();
					$data_komisi=array(
									'total_komisi'=>$this->komisi_model->show_all_komisi($datalogin['userid']),
									'available_komisi'=>$this->komisi_model->show_all_komisi($datalogin['userid'])-100000,
									'bank'=>$this->pengaturan_model->get_rekening_by_id($this->session->userdata('userid'))
								);

					if (empty($data_komisi['total_komisi'])) {
						$data_komisi['total_komisi']=0;
					}
					
					$this->load->view('form', $data_komisi);
				} else {redirect('login');}	
				
		}

		/*
		1. show withdrawal form
		2. select total_komisi and available komisi for transaksi >=100.000
		3. update table total_komisi, decrease depend on withdraw amount
		4. check total_komisi<=100.000, update isactive to 0 if true
		5. insert into withdraw table, with withdraw amount
		*/

		function transfer_komisi()
		{
			$total_penarikan=$this->input->post('total_penarikan');
			$id_bankacc=$this->input->post('idbankacc');
			$available_komisi=$this->input->post('available_komisi');

			//echo $total_penarikan." ".$id_bankacc." ".$available_komisi;

			if ($total_penarikan==null || $id_bankacc==null) {
				redirect('komisi');

			}

			if ($total_penarikan>$available_komisi||$total_penarikan<100000) {
				redirect('lebih_besar');
			}

			$new_total_komisi=$this->komisi_model->show_all_komisi($this->session->userdata('userid'))-$total_penarikan;


			$data_update_komisi=array(
					'total_komisi'=>$new_total_komisi,
					'isactive'=>(($new_total_komisi<=100000)?0:1)
				);

			$update_komisi=$this->kirim_barang_model->update_total_komisi($data_update_komisi, $this->session->userdata('userid'));

			if ($update_komisi==null) {
				redirect('update_komisi');
			}

			$data_withdraw=array(
					'userid'=>$this->session->userdata('userid'),
					'id_bankacc'=>$id_bankacc,
					'total_withdraw'=>$total_penarikan,
					'isactive'=>0,
					'timestamp'=>date('Y-m-d H:i:s')
				);

			$new_withdraw=$this->withdraw_model->insert_new_withdraw($data_withdraw);

			if ($new_withdraw==null) {
				redirect('new_withdraw');
			}
			
			redirect('komisi#info');
		}

		function info()
		{
			$datalogin=$this->session->all_userdata();
				if($datalogin['login']===TRUE && $datalogin['rolename']==='member' && isset($datalogin['userid']))
				{
					$result=array(
					'info_last_withdraw'=>$this->info_last_withdraw($this->session->userdata('userid')),
					'log_withdraw'=>$this->log_withdraw($this->session->userdata('userid')),
					'info_komisi'=>$this->komisi_model->show_all_komisi($this->session->userdata('userid')),
					'transfer_komisi_sukses'=>$this->statistik_komisi($this->session->userdata('userid'), 1),
					'transfer_komisi_pending'=>$this->statistik_komisi($this->session->userdata('userid'), 0)
					);

					if ($this->uri->segment(2)=='info') {
						
					$page['title']='Transaksi';
					$page['menus']=$this->template->menu('member');
					$this->load->view('template/header_member', $page);		
					}

					$this->load->view('withdraw', $result);
					
				} else {redirect('login');}	
				

		}

		function statistik_komisi($userid, $isactive)
		{
			$result=null;
			if ($userid==null || ($isactive==null&&$isactive!=0)) {
				redirect('error');
			}

			$total=$this->withdraw_model->view_total_komisi($userid, $isactive);

			if ($total!=null) {
				foreach ($total as $sukses) {
					$result=$sukses->sum;
				}
			}

			return $result;
		}

		function info_last_withdraw($userid){
			$result=null;

			$data=$this->withdraw_model->last_withdraw($userid);

			if ($data!=null) {
				$result=$data;
			}

			return $result;
		}

		function log_withdraw($userid){

					$result=null;

			$data=$this->withdraw_model->withdraw_per_user($userid);

			if ($data!=null) {
				$result=$data;
			}

			return $result;
		}
	}
	?>