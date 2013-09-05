<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model', 'logindb', TRUE);
		$this->load->model('template/template_model', 'template', TRUE);
	}

	function index(){
		if($this->session->userdata('login')===TRUE){
			$data=$this->session->all_userdata();
			if ($data['rolename']==='administrator'){
				redirect('admin');}
			else if ($data['rolename']==='member'){ 

				if ($this->session->userdata('requested_page')!=null) {
					redirect($this->session->userdata('requested_page'));
				}
				else{redirect('main');}
			}
		}else{
			if ($this->uri->segment(1)=='login') {
				$page['title']='Login Affiliate';
			$page['menus']=$this->template->menu('guest');
			$data['msg_title']="Login Affiliate";
			$data['msg_content']="Masuk ke member area";
			$this->load->view('template/header', $page);
			$this->load->view('login',$data);
			}
			else{
				//condition when load from another modules(transaksi, etc)
				$this->load->view('login');
			}
				
			
			//echo $this->session->userdata('login')." rolename ".$this->session->userdata('rolename')." ".$this->session->userdata('userid');

		}
	}

	function signin(){
		if($this->session->userdata('login')===TRUE){
			redirect('login');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean'); 
		$this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean'); 
		$this->form_validation->set_message('required', '%s Harus Diisi');
            
        if ($this->form_validation->run($this) == TRUE ) { 
			$username  =$this->input->post('username');
			$pwd       =$this->input->post('pwd');
			
			$userdata  =$this->logindb->cek_aktif($username);
			if ($this->logindb->cek_login($username, $pwd)==TRUE){
				if ($userdata!=null){
					foreach ($userdata as $row){
						$userid=$row->userid;
					}
					$cek_user=$this->cek_user($userid);
					$this->session->set_userdata($cek_user);
					//$data=$this->session->all_userdata();
					//echo $this->session->userdata('login')." ".$this->session->userdata('rolename')." ".$this->session->userdata('userid');
	   				redirect("login");
				} else {
						$data['msg_title']="Akun Belum Aktif";
						$data['msg_content']="Silakan aktifkan akun anda melalui link yang dikirim ke email anda";
						$page['title']='Login Affiliate';
						$page['menus']=$this->template->menu('guest');
						$this->load->view('template/header', $page);
			
						$this->load->view('login',$data);
				}	
			} else {
				$data['msg_title']="Kesalahan Login";
				$data['msg_content']="Password dan/atau Username anda tidak sesuai.";
				$page['title']='Login Affiliate';
				$page['menus']=$this->template->menu('guest');
				$this->load->view('template/header', $page);
			
				$this->load->view('login',$data);
		}
		}else{

				redirect('login');
			

		}
	}

	function cek_user($id=null){
		if ($id==null){
			redirect('login');
		} else{
		$userdata=$this->logindb->get_userdata($id);
			if($userdata!=null){
				$data=array(
						'login'=>TRUE,
						'username'=>$userdata->username,
						'rolename'=>$userdata->rolename,
						'email'=>$userdata->email,
						'userid'=>$id
				);
				return $data;
			}
		}
	}
}
?>