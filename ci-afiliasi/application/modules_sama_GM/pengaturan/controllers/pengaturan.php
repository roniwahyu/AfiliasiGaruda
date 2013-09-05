<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Pengaturan extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('memberarea/memberarea_model');
		$this->load->model('member/member_model');
		$this->load->model('template/template_model','template',TRUE);
		$this->load->model('pengaturan/pengaturan_model');
		$this->load->model('akun_bank/akun_bank_model', 'akun_bank_model', TRUE);
		
	}

	function index(){
		if($this->session->userdata('login')===TRUE){
			$datam['data']		=$this->memberarea_model->get_member_by_id($this->session->userdata('userid'));
			$datam['rekening']	=$this->pengaturan_model->get_rekening_by_id($this->session->userdata('userid'));
			$datam['bank']		=$this->pengaturan_model->get_all_bank();
			$datam['total_akunbank']=$this->pengaturan_model->total_rek($this->session->userdata('userid'));
                  
 			$page['title']		='Pengaturan';
			$page['menus']		=$this->template->menu('member');
			$this->load->view('template/header_member', $page);
			$this->load->view('pengaturan',$datam);
		}else{
			redirect('login'); 
		}
	}

	function simpanprofil(){
 			$this->load->library('form_validation');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric'); 
			$this->form_validation->set_rules('nomorrekening', 'Nomor Rekening', 'trim|numeric'); //cek, validasi username
            $this->form_validation->set_rules('email2', 'Email', 'trim|valid_email');

            if ($this->form_validation->run($this) == TRUE) {
            	$userid=$this->input->post('userid', TRUE);
            	
            	$cek_img=$this->input->post('photo');

            	if(strlen($_FILES['userfile']['name'])!=0){
            	$cek_img=$this->edit_img($userid,$cek_img);
				}
            	

            	$data['photo']			 = (file_exists(FCPATH."assets/user_img/".$this->input->post('photo')))?$cek_img:"default.jpg";
            	$data['firstname'] 		 = $this->input->post('firstname');
            	$data['midname'] 		 = $this->input->post('midname');
            	$data['lastname'] 		 = $this->input->post('lastname');
            	$data['province'] 		 = $this->input->post('province');
            	$data['postal'] 		 = $this->input->post('postal');
            	$data['country'] 		 = $this->input->post('country');
            	
            	$data['address']		 = $this->input->post('address');
            	$data['city'] 			 = $this->input->post('city');
            	$data['phone'] 			 = $this->input->post('phone');
            	$data['email2'] 		 = $this->input->post('email2');
            	
				$this->member_model->update_info($data, $userid);

           		$databank['userid']		= $userid;
				$databank['idbank']		= $this->input->post('idbank');

				$query=null;
					if (empty($databank['idbank'])) {
						$databank['idbank']=$this->input->post('idbank_baru');
						$databank['account']	= $this->input->post('account_baru');		

						$query=$this->akun_bank_model->insert_bank_account($databank);
					}
					else{
						$databank['account']=$this->input->post('account');
						$query=$this->pengaturan_model->update_data_bank($databank,$userid);
					}

						if ($query>0){$this->index(); }
									
									$this->index(); 

		}	

				 // echo "<h1>".$databank['idbank']." ".$databank['account']." ".$databank['userid']."</h1>";
        }

        function cek_tipe($tipe){
			if ($tipe=='image/jpeg') { return ".jpg"; } else 
            if($tipe=='image/png'){ return ".png"; } else
            if($tipe=='image/gif'){ return ".gif"; } else
            { redirect('login'); }	
		}

		function edit_img($userid,$namafoto){
			$img_name="default.jpg";

			if ($userid==null) { redirect('login'); }
			if(strlen($_FILES['userfile']['name'])!=0){
				if(($namafoto!='default.jpg'&&$namafoto!=''&&$namafoto!=NULL)&&file_exists(FCPATH."assets/user_img/".$this->input->post('photo')))
					{unlink(FCPATH."assets/user_img/".$this->input->post('photo'));	}

				$tipe=$this->cek_tipe($_FILES['userfile']['type']);
				$img_name				="Photo00".md5($userid).$tipe;
				$img_path				="./assets/user_img";
				$config['upload_path']	=$img_path;
				$config['allowed_types']="png|jpg|gif";
				$config['file_name']	=$img_name;
				$config['max_size']		='500';
				$config['max_width']	='1500';
				$config['max_height']	='1500';
				$config['overwrite']	=TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					
				if (!$this->upload->do_upload()) {
					$img_name="default.jpg";
				}
			}
			return $img_name;
		}

		function akun_bank()
		{
			if ($this->session->userdata('login')===FALSE|| $this->session->userdata('userid')==null) {
				redirect('error');
			}
			$data['bank']=$this->pengaturan_model->get_all_bank();
			$this->load->view('tambah_akun', $data);

		}

		function tambah_akun_bank()
		{
			if ($this->session->userdata('login')===FALSE|| $this->session->userdata('userid')==null) {
				redirect('error');
			}

			$databank['userid']		= $this->session->userdata('userid');
			$databank['idbank']=$this->input->post('idbank_baru');
			$databank['account']= $this->input->post('account_baru');		

			if ($databank['idbank']==null || $databank['account']==null) {
				redirect('pengaturan#databank');
			}

			$query=$this->akun_bank_model->insert_bank_account($databank);

			if ($query!=null) {
				redirect('pengaturan');
			}

		}
}
?>