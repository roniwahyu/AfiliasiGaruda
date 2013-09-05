<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Resetpassword extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('resetpassword_model');
		$this->load->model('template/template_model','template',TRUE);
	}

	function index(){
		if($this->session->userdata('login')===TRUE){
			$data=$this->session->all_userdata();
			if ($data['rolename']==='administrator'){
				redirect('admin');}
			else if ($data['rolename']==='member'){ 
				redirect('memberarea'); 
			}
		}else{
			$aktif_menu['header']='Reset Password';
				$aktif_menu['menus']=$this->template->menu('guest');
				$this->load->view('template/header', $aktif_menu);
			$data['msg_title']="Reset Password";
			$data['msg_content']="Reset password affiliate";
			$this->load->view('resetpassword',$data);
		}
	}

	function send(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_cek_validemail'); 
		$this->form_validation->set_message('required', '%s Harus Diisi');
		 
		if ($this->form_validation->run($this) == TRUE ) { 
			$email    	 =$this->input->post('email');
			$kode     	 =md5(uniqid(rand()));
			$url    	 ="http://gm.faizalqurni.com";
			$data['kode']=$kode;
			$this->resetpassword_model->update_kode($email,$data);


					$url	  ="http://gm.faizalqurni.com";
					$kepada   = $email;
	  				$judul	  = "Konfirmasi Reset Password Affiliasi GarudaMedia";
	  				$pesan	  = "Hai! Kami mendeteksi permintaan reset password dari akun affiliasi GarudaMedia anda. Untuk mengeset kembali password anda, silahkan klik link konfirmasi dibawah ini :<br>";
	  				$pesan   .= "<a href='$url/resetpassword/aktivasi/$kode'>$url/resetpassword/aktivasi/$kode</a><br>";
	  				$pesan   .= "Jika anda merasa tidak ingin mereset password anda, maka abaikan email ini.<br> Terima Kasih.";
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1\r\n';
					$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
					$headers .= 'From: GarudaMedia <faiza914@merapi.rumahweb.com>';  	
	  				$sentmail = mail($kepada,$judul,$pesan,$headers);	

	  				if($sentmail){
						$konfirmasi['judul']="Kode Konfirmasi";
						$konfirmasi['isi']="Terima Kasih, Kode Konfirmasi Reset Password Telah Dikirim ke Email Anda.";
					}else{
						$konfirmasi['judul']="Kode Konfirmasi";
						$konfirmasi['isi']="Maaf, Kode Konfirmasi Reset Password Gagal Dikirim ke Email Anda.";
					}

					$this->load->view('konfirmasi',$konfirmasi);
		}else{
			$this->index();
		}
	}

	public function cek_validemail($str){
  				$email=$str;
                $sql="SELECT * FROM member WHERE email='$email'";
                $query = $this->db->query($sql);
                $row = $query->row();
                if ($row){
                        return TRUE;
                }else{
                        $this->form_validation->set_message('cek_validemail','Email yang anda masukkan tidak terdaftar');                        
                        return FALSE;
                }
                
	}


	function aktivasi($kode=NULL){
			if($kode!=NULL){
				$result=$this->resetpassword_model->cek_kode($kode);
				if($result){
					foreach ($result as $user) {
						$data['email']=$user->email;
					}
					$this->session->set_userdata($data);
					$data['msg_title']  ="Reset Password";
					$data['msg_content']="Masukkan password baru";	
					$this->load->view('formreset',$data);
				}
			}else{
				$this->index();
			}
	}

	function formreset(){
		$data['email']=$this->session->userdata('email');
		$data['msg_title']="Reset Password";
		$data['msg_content']="Masukkan password baru";	
		$this->load->view('formreset',$data);
	}

	function set(){
		if($this->input->post('useoldpass')==TRUE){
			$this->form_validation->set_rules('oldpassword', 'Password Lama', 'min_length[6]|trim|required|xss_clean|callback_cek_pass_lama'); 					
		}

		$this->form_validation->set_rules('password', 'Password', 'min_length[6]|trim|required|xss_clean'); 
		$this->form_validation->set_rules('repassword', 'Password', 'min_length[6]|trim|required|xss_clean|callback_cek_sama'); 
		$this->form_validation->set_message('required', '%s Harus Diisi');
		 
		if ($this->form_validation->run($this) == TRUE ) { 
			$data['password']  =sha1($this->input->post('password'));
			$email             =$this->input->post('email');
			$this->resetpassword_model->ubah_password($email,$data);
			if($this->session->userdata('login')!=TRUE){
				$konfirmasi['judul']="Password Berhasil Diubah";
				$konfirmasi['isi']="Terima Kasih, Password Anda Telah Diubah";
				$this->load->view('konfirmasi',$konfirmasi);
				//$this->session->sess_destroy();
			}else{
				$this->session->set_flashdata('message', ' Password berhasil diubah');
				//$this->load->view('memberarea/resetpass');
				redirect('memberarea/ubahpassword');
			}

		}else{
			if($this->session->userdata('login')==TRUE){
				    $page['title']='Dashboard';
				$page['menus']=$this->template->menu('member');
				$this->load->view('template/header', $page);
			
				$this->load->view('memberarea/resetpass');
			}else{
				$this->formreset();
			}
		}
			
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
		$pasw  =sha1($pas);
		$result=$this->resetpassword_model->cek_password_lama($pasw,$email);
		if($result){
			return TRUE;
		}else{
		    $this->form_validation->set_message('cek_pass_lama','Password lama yang anda masukkan salah');
			return FALSE;
		}
	}


}
?>