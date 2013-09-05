<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Pengaturan extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('memberarea/memberarea_model');
		$this->load->model('member/member_model');
		$this->load->model('template/template_model','template',TRUE);
		
	}

	function index(){
		if($this->session->userdata('login')===TRUE){
			$datam['data']=$this->memberarea_model->get_member_by_id($this->session->userdata('userid'));
 			$page['title']='Pengaturan';
			$page['menus']=$this->template->menu('member');
			$this->load->view('template/header', $page);
			$this->load->view('pengaturan',$datam);
			
		}else{
			redirect('login'); 
		}
	}

// 	function simpanprofil(){
//  			$this->load->library('form_validation');
// 			$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric'); 
// 			$this->form_validation->set_rules('nomorrekening', 'Nomor Rekening', 'trim|numeric'); //cek, validasi username
//             $this->form_validation->set_rules('email2', 'Email', 'trim|valid_email');

//             if ($this->form_validation->run($this) == TRUE) {
//             	$userid=$this->input->post('userid', TRUE);
            	
//             	$namafoto=$this->input->post('photo');
//             	$cek_img=$this->edit_img($userid,$namafoto);
//             	if ($cek_img==null) {
//             		$cek_img=$this->input->post('photo');
//       			}
//             	$data['photo']			 = $cek_img;
//             	$data['firstname'] 		 = $this->input->post('firstname');
//             	$data['midname'] 		 = $this->input->post('midname');
//             	$data['lastname'] 		 = $this->input->post('lastname');
//             	$data['province'] 		 = $this->input->post('province');
//             	$data['postal'] 		 = $this->input->post('postal');
//             	$data['country'] 		 = $this->input->post('country');
            	
//             	$data['address']		 = $this->input->post('address');
//             	$data['city'] 			 = $this->input->post('city');
//             	$data['phone'] 			 = $this->input->post('phone');
//             	$data['email2'] = $this->input->post('email2');
            	
// 				$this->member_model->update_info($data, $userid);
// 				// echo "photo".$data['photo']." firstname ".$data['firtsname']." add".$data['address']." ".$data['city']." ".$data['phone']." ".$data['email2'];

//             }	
//             $this->index();
//         }

//         function cek_tipe($tipe){
// 			if ($tipe=='image/jpeg') { return ".jpg"; } else 
//             if($tipe=='image/png'){ return ".png"; } else
//             if($tipe=='image/gif'){ return ".gif"; } else
//             { redirect('login'); }	
// 		}

// 		function edit_img($userid,$namafoto){
// 			$img_name=null;

// 			if ($userid==null) { redirect('login'); }
// 			if(strlen($_FILES['userfile']['name'])!=0){
// 				if($namafoto!='default.jpg'&&$namafoto!=''&&$namafoto!=NULL){
// 					unlink(FCPATH."assets/user_img/".$this->input->post('photo'));
// 				}
				
// 				$tipe     				=$this->cek_tipe($_FILES['userfile']['type']);
// 				$img_path				="assets/user_img/";
// 				$img_name				="Photo00".md5($userid).$tipe;
// 				$config['upload_path']	=$img_path;
// 				$config['allowed_types']="png|jpg|gif";
// 				$config['file_name']	=$img_name;
// 				$config['max_size']		='25';
// 				$config['max_width']	='1024';
// 				$config['max_height']	='1024';
// 				$config['overwrite']	=TRUE;
// 				$this->load->library('upload', $config);
// 				$this->upload->initialize($config);
					
// 				if (!$this->upload->do_upload()) {
// 					$img_name=null;
// 				}
// 			}
// 			return $img_name;
// 		}


}
