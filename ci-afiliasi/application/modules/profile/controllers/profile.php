<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Profile extends MX_Controller{

	
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('profile_model', 'model', TRUE);
		$this->load->model('template/template_model', 'template', TRUE);
	}

	function index(){
		$datalogin=$this->session->all_userdata();
		if($this->session->userdata('login')===TRUE && $datalogin['rolename']==='member' && isset($datalogin['userid']))
		{
			$profilemember=$this->get_member_info($this->session->userdata('userid'));
			if($profilemember!=null){
				$aktif_menu['title']='Profile';
				$aktif_menu['menus']=$this->template->menu('member');
				$this->load->view('template/header', $aktif_menu);
				$this->load->view('profile', $profilemember);}
			else
				{echo "error while fetch data member";}
		}
		else
		{redirect('dologin');}
			
		
		}

	function get_member_info($userid)
	{
		if ($userid==null) {
			redirect('dologin');

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
			redirect('dologin');
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
					elseif($tipe=='image/gif'){
						return ".gif";
					}
					else{
						redirect('dologin');
					}
	}

	function edit_img($userid)
	{
		$img_name=null;

		if ($userid==null) {
			redirect('dologin');
		}
		if(strlen($_FILES['userfile']['name'])!=0)
		{
			unlink(FCPATH."/assets/user_img/".$this->input->post('photo'));
			//echo var_dump($_FILES['userfile']);
			$tipe=$this->cek_tipe($_FILES['userfile']['type']);
			$img_path="assets/user_img/";
		$img_name="Photo00".md5($userid).$tipe;
		$config['upload_path']=$img_path;
		$config['allowed_types']="png|jpg|gif";
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
			$aktif_menu['title']='Ganti Password';
			$aktif_menu['menus']=$this->template->menu('member');
			$this->load->view('template/header', $aktif_menu);
			$this->load->view('changepass', $data);
		}
		else{
			redirect('home');
		}
	}

	function do_changepass(){
		$this->form_validation->set_rules('oldpassword', 'Password Lama', 'min_length[6]|trim|required|xss_clean|callback_cek_pass_lama'); 					
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]|trim|required|xss_clean'); 
		$this->form_validation->set_rules('repassword', 'Password', 'min_length[6]|trim|required|xss_clean|callback_cek_sama'); 
		$this->form_validation->set_message('required', '%s Harus Diisi');
		
		
		
		if ($this->form_validation->run($this) == TRUE ) { 
			$data['password']  =md5($this->input->post('password'));
			$email             =$this->input->post('email');
			$this->model->ubah_password($email,$data);
			$this->session->set_flashdata('message', ' Password berhasil diubah');
			redirect('profile/changepass');

		}
		
		$this->changepass();
			

	}

	function cek_sama($pas1){
		$pas2=$this->input->post('password');
		if($pas1==$pas2){
			return TRUE;
		}else{
		    $this->form_validation->set_message('cek_sama','Password yang anda masukkan tidak sama');
			return FALSE;
		}
	}

	function cek_pass_lama($pas){
		$email =$this->session->userdata('email');
		$pasw  =md5($pas);
		$result=$this->model->cek_password_lama($pasw,$email);
		if($result){
			return TRUE;
		}else{
		    $this->form_validation->set_message('cek_pass_lama','Password lama yang anda masukkan salah');
			return FALSE;
		}
	}
}
