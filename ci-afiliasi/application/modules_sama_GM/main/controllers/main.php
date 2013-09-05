<?php

	if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Main extends MX_Controller{


	function __construct(){
		parent::__construct();
		$this->load->model('Main_model', 'model', TRUE);
		$this->load->model('template/template_model', 'template', TRUE);
	}

function index(){
		$datalogin=$this->session->all_userdata();
		if($this->session->userdata('login')===TRUE && $datalogin['rolename']==='member' && isset($datalogin['userid']))
		{
			$aktif_menu['title']='Member Area';
			$aktif_menu['menus']=$this->template->menu('member');
			$this->load->view('template/header_member', $aktif_menu);
			
			
			$this->load->model('profile/profile_model','profile_model', TRUE);
			$profile_model=$this->get_userprofile($this->session->userdata('userid'));
			
			$this->load->view('main', $profile_model);
		}
		else
		{

			redirect('home');
		}

	}

	
	function get_userprofile($userid=null)
	{
		if ($userid==null) {
			redirect('login');
		}
		else{
			$profilemember=$this->profile_model->get_data($userid);
			if($profilemember!=null)
			{
				foreach ($profilemember->result() as $profile) {
					$profile=array(
							'username'=>$profile->username,
							'firstname'=>$profile->firstname,
							'lastname'=>$profile->lastname,
							'email'=>$profile->email,
							'country'=>$profile->country,
							'photo'=>$profile->photo,
							'timestamp'=>$profile->timestamp
						);
				}
			}
			else{
				$profile=null;
			}

			return $profile;
		}

		//return ;

	}
	
	function logout()
	{
		$change_timestamp=$this->model->update_lastlogin($this->session->userdata('userid'));
		if ($change_timestamp==FALSE) {
			redirect('dologin');
		}
		else{
					$data=array(
							'login'=> FALSE,
							'rolename'=> '',
							'userid'=> '',
						);

					$this->session->unset_userdata($data);
					$this->session->sess_destroy($data);
					redirect('home');
			}

	}

	
}