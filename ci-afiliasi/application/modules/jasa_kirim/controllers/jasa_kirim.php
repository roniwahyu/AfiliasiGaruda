<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Profile extends MX_Controller{

	
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		//$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->library('database');
		$this->load->model('profile_model', 'model', TRUE);

		$this->load->model('template/template_model', 'template', TRUE);
	}

	function index(){
		$datalogin=$this->session->all_userdata();
		if($this->session->userdata('login')===TRUE && $datalogin['rolename']==='member' && isset($datalogin['userid']))
		{
			$profilemember=$this->get_member_info($this->session->userdata('userid'));
			if($profilemember!=null){
				$aktif_menu['header']='Profile';
				$aktif_menu['menus']=$this->template->menu('member');
				$this->load->view('template/header', $aktif_menu);
				$this->load->view('profile', $profilemember);
				$this->load->view('template/footer');
			}
			else
				{echo "error while fetch data member";}
		}
		else
		{redirect('login');}
			
		
		}

	function get_member_info($userid)
	{
		if ($userid==null) {
			redirect('login');

		}
		else
		{
			$profilemember=$this->model->get_data($userid);
			if($profilemember!=null)
			{
				foreach ($profilemember->result() as $profile) {
					$profile=array(
							'userid'=>$profile->userid,
							'username'=>$profile->username,
							'password'=>$profile->password,
							'firstname'=>$profile->firstname,
							'midname'=>$profile->midname,
							'lastname'=>$profile->lastname,
							'phone'=>$profile->phone,
							'email'=>$profile->email,
							'email2'=>$profile->email2,
							'address'=>$profile->address,
							'address2'=>$profile->address2,
							'city'=>$profile->city,
							'province'=>$profile->province,
							'postal'=>$profile->postal,
							'country'=>$profile->country,
							'birthdate'=>$profile->birthdate,
							'photo'=>$profile->photo,
							'isactive'=>$profile->isactive,
							'timestamp'=>$profile->timestamp
						);
				}
			}
			else{
				$profile=null;
			}

			return $profile;
		}

	}

	function edit_memberinfo(){
		$userid=$this->input->post('userid', TRUE);
		if ($userid==null) {
			redirect('login');
		}
		else{
			$cek_img=$this->edit_img($userid);
			
			$update=$this->model->edit_data($userid, $cek_img);
			if (!$update) {

				$this->session->set_flashdata('message_error', $this->db->_error_message());
				}
			else{
				$this->session->set_flashdata('message', 'Berhasil mengubah informasi akun');
			}
		redirect('profile');
		}
	}
	function cek_tipe($tipe)
	{
					if ($tipe=='image/jpeg') {
						return ".jpg";
					}
					elseif($tipe=='image/png'){
						return ".png";
					}
					else{
						redirect('login');
					}
	}

	function edit_img($userid)
	{
		$img_name=null;

		if ($userid==null) {
			redirect('login');
		}
		if(strlen($_FILES['userfile']['name'])!=0)
		{
			unlink(FCPATH."/assets/user_img/".$this->input->post('photo'));
			//echo var_dump($_FILES['userfile']);
			$tipe=$this->cek_tipe($_FILES['userfile']['type']);
			$img_path="assets/user_img/";
		$img_name="Photo00".md5($userid).$tipe;
		$config['upload_path']=$img_path;
		$config['allowed_types']="png|jpg";
		$config['file_name']=$img_name;
		$config['max_size']='25';
		$config['max_width']='450';
		$config['max_height']='450';
		$config['overwrite']=TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
			
				//var_dump(is_dir($img_path)); 
				if (!$this->upload->do_upload()) {
					//echo $config['upload_path'];
					//print_r($this->upload->display_errors());
					$img_name=null;
				}

		}
			
		return $img_name;
	}

	function changepass()
	{
		$userid=$this->session->userdata('userid');
		if ($userid!=null) {
			foreach ($this->model->getpwd($userid)->result() as $query) {
				$oldpass=$query->password;	
			}
			$data['oldpass']=$oldpass;
			$aktif_menu['header']='Ganti Password';
			$aktif_menu['menus']=$this->template->menu('member');
			$this->load->view('template/header', $aktif_menu);
			$this->load->view('changepass', $data);
		}
		else{
			redirect('login');
		}
	}

	function do_changepass()
	{
		$userid=$this->session->userdata('userid');
		
		if ($userid!=null&&strlen($this->input->post('new_pass'))>5) {
			$oldpass=$this->input->post('oldpass');
			$repeat_oldpass=md5($this->input->post('repeat_oldpass'));
			$new_pass=md5($this->input->post('new_pass'));
			$repeat_pass=md5($this->input->post('repeat_pass'));
			
			//echo "old pass=".$oldpass." oldpass_repeat=".$repeat_oldpass." new_pass=". $new_pass. " repeat new pass=". $repeat_pass." userid=".$userid;

			if ($new_pass===$repeat_pass && $oldpass===$repeat_oldpass) {
				$result=$this->model->edit_pass($repeat_pass, $userid);
				//echo "result= ".$result;
				if ($result==TRUE) {
					$this->session->set_flashdata('message_success', 'Password telah diganti');
				}
				else{
					$this->session->set_flashdata('message', 'Gagal ganti password');
				}
			}
			else{
					$this->session->set_flashdata('message', 'Password yang dimasukan tidak sama');
			}
			//redirect('profile/changepass');
			
		}
		else{
			$this->session->set_flashdata('message', 'Panjang password minimal 6 karakter');
			//redirect('profile/changepass');
		}
		redirect('profile/changepass');
	}
}

/**EOF blog.php**/
/**Location: ./modules/blog.php**/