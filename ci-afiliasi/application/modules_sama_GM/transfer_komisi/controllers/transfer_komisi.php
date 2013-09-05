<?php
	
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Transfer_komisi extends MX_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('komisi/komisi_model', 'komisi_model', TRUE);
			$this->load->model('transfer_komisi_model', 'transfer_komisi_model', TRUE);
		}

		function index(){
		$datalogin=$this->session->all_userdata();
			// if($datalogin['login']===TRUE && $datalogin['rolename']==='administrator' && isset($datalogin['userid']))
			// 	{

   // 				}
		$data=array(
				'pending_transfer_komisi'=>$this->transfer_komisi_model->show_req_komisi(0),
				'sukses_transfer_komisi'=>$this->transfer_komisi_model->show_req_komisi(1)
				);
			$this->load->view('transfer_komisi', $data);
		}


		function kirim()
		{
			$datalogin=$this->session->all_userdata();
			// if($datalogin['login']===TRUE && $datalogin['rolename']==='administrator' && isset($datalogin['userid']))
			// 	{

   // 				}
			$id_withdraw=$this->input->post('id_withdraw');
			// $userid=$this->input->post('userid');
			if (empty($id_withdraw)) {
				redirect('error');
			}

			$data=array(
				'isactive'=>1
				);

			$update=$this->transfer_komisi_model->update_withdraw($data, $id_withdraw);

			if ($update==null) {
				redirect('error');
			}

			$this->index();
						/** 1.update isactive value in withdraw table with 1**/


		}


	}











