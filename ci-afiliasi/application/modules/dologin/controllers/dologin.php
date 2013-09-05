<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Dologin extends MX_Controller{

	
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->library('database');
		$this->load->model('dologin_model', 'logindb', TRUE);
	}

	function index(){
		if ($this->session->userdata('administrator')===TRUE) {
			redirect('index.php/adminpanel');
		}
		elseif ($this->session->userdata('affiliate')===TRUE) {
			redirect('index.php/dashboard');
		}
		else{
			$this->load->view('login');
			$sess=$this->session->all_userdata();
			echo $sess['session_id'];
		}

	}

	

	function signin()
	{
		$username=$this->input->post('username');
		$pwd=$this->input->post('pwd');
		$userdata=$this->logindb->cek_aktif($username);
		if ($this->logindb->cek_login($username, $pwd)==TRUE) {
			if ($userdata!=null) {
				foreach ($userdata as $row) {
					$userid=$row->userid;
				}
				$cek_user=$this->cek_user($userid);
				$this->session->userdata($cek_user);
				redirect('index.php/dashboard');
				}
			else
				{echo "Akun anda belum aktif";}
		}
		else{
			echo "Maaf username dan/atau password anda salah";
		}

	}

	function cek_user($id=null)
	{
		if ($id==null) {
			redirect('dologin');
		}
		else{
		$userdata=$this->logindb->get_userdata($id);
			if($userdata!=null)
			{
				if ($userdata->rolename=='administrator') {
					return 'administrator';
				}
				else if ($userdata->rolename=='user1') {
					return 'affiliate';
				}
				else{
					redirect('dologin');
				}
			}
		}
		
	}



}

/**EOF blog.php**/
/**Location: ./modules/blog.php**/