<?php
	
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Memberarea extends MX_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('memberarea_model');
			$this->load->model('member/member_model');
			$this->load->model('template/template_model','template',TRUE);
		}

		function index(){
			$datam['data']=$this->memberarea_model->get_member_by_id($this->session->userdata('userid'));
			$datam['track']=$this->memberarea_model->get_referal_by_id($this->session->userdata('userid'));
			
			if($this->session->userdata('login')===TRUE && $this->session->userdata('rolename')==='member'){
			    $page['title']='Dashboard';
				$page['menus']=$this->template->menu('member');
				$this->load->view('template/header', $page);
			    $this->load->view('memberarea',$datam);
			} else {
     			redirect('login');
   			}
		}

		function logout(){
		$data = array(
			'login' => FALSE,
			'username' => '',
			'rolename' => '',
			'userid' =>''
		);
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		   redirect('login');
 		}

 		function pengaturan(){
			Modules::load('pengaturan/pengaturan/')->index();
		}

		function ubahpassword(){
			//Modules::load('pengaturan/pengaturan/')->index();
			$page['title']='Ubah Password';
			$page['menus']=$this->template->menu('member');
			$this->load->view('template/header', $page);
			$this->load->view('resetpass');
		}


 		function statistik(){
			$datam['data']=$this->memberarea_model->get_member_by_id($this->session->userdata('userid'));
			$this->load->view('statistik',$datam);
		}

	}











