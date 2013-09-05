<?php
	
	class Registrasi extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('registrasi_model');
			$this->load->model('captcha_model');
			$this->load->model('template/template_model','template',TRUE);
  			
		}

		function index(){
			$data['captcha'] = $this->captcha_model->setCaptcha();     
			$page['title']='Registrasi';
			$page['menus']=$this->template->menu('guest');
			$this->load->view('template/header', $page);
			$this->load->view('registrasi',$data);
		}

		function baru(){
			  $this->load->library('form_validation'); //load library form_validation
			  $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean'); //cek, validasi username
              $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|xss_clean'); //cek, validasi password
              $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric'); //cek, validasi username
              $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_cek_email'); //cek, validasi username
              $this->form_validation->set_rules('captchaku', 'Captcha', 'trim|required|callback_valid_captcha');
              $this->form_validation->set_message('required', '%s Harus Diisi');
              

             
  			if ($this->form_validation->run($this) == TRUE ) { //apabila validasi true(benar semua)
    			$data['username'] = $this->input->post('username');
				$data['password'] = md5($this->input->post('password'));
				$data['phone']    = $this->input->post('phone');
				$data['email']    = $this->input->post('email');
				$data['kode']     = md5(uniqid(rand()));
				$data['isactive'] = '0';
				$data['photo']	  = 'default.jpg';
				$data['timestamp']= date('Y-m-d H:i:s');
				$url="http://gm.faizalqurni.com";

				//cek cookie & session untuk sistem referal
				$parent=0;
			    $cek_cookie=$this->cek_cookie();

            	if ($cek_cookie!=null) {
              		$parent=$cek_cookie;
              	}

				// Memasukkan user baru
				$result = $this->registrasi_model->insert_member_db($data);
				$hasil=$this->registrasi_model->get_latest_id();
				foreach ($hasil as $hasilid) {
					$datarole['userid']=$hasilid->userid;
				}
				$datarole['roleid']='2';
				$datarole['parent']=$parent;
				$datarole['isactive']='1';
				$datarole['timestamp']=$data['timestamp'];
				// Memasukkan user role baru
				$result2 = $this->registrasi_model->insert_role_user($datarole);

				if($result&&$result2){
					$kepada   = $data['email'];
	  				$judul	  = "Aktivasi Akun Member Affiliasi GarudaMedia";
	  				$pesan	  = "Selamat! Anda berhasil terdaftar sebagai member affiliasi GarudaMedia. Aktifkan akun member Anda dengan klik link berikut ini : <br>";
	  				$pesan   .= "<a href='$url/registrasi/aktivasi/$data[kode]'>$url/registrasi/aktivasi/$data[kode]</a><br>";
	  				$pesan   .= "hai";
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1\r\n';
					$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
					$headers .= 'From: GarudaMedia <faiza914@merapi.rumahweb.com>';  	
	  				$sentmail = mail($kepada,$judul,$pesan,$headers);	

	  				if($sentmail){
						$konfirmasi['judul']="Registrasi Sukses!";
						$konfirmasi['isi']="Kode Aktivasi Telah Dikirim ke Email Anda.";
					}else{
						$konfirmasi['judul']="Registrasi Sukses!";
						$konfirmasi['isi']="Kode Aktivasi Gagal Dikirim ke Email Anda.";
					}
				}
				$page['title']='Registrasi Sukses';
				$page['menus']=$this->template->menu('guest');
				$this->load->view('template/header', $page);
				$this->load->view('konfirmasi',$konfirmasi);
			}else{

				$this->index();

			}
		}

		function cek_cookie()
		{
			$refid=$this->session->userdata('value');
			if ($refid==null) {
				$refid=$this->input->cookie('refid');
				if ($refid==null) {
					$refid=null;
				}
			}

			return $refid;
		}

		function aktivasi($kode=NULL){
			if($kode!=NULL){
				$result=$this->registrasi_model->aktivasi_user($kode);
				if($result){
					$konfirmasi['judul']="Aktivasi Sukses!";
					$konfirmasi['isi']="Selamat, Akun Anda Berhasil Diaktifkan.";
					$this->load->view('konfirmasi',$konfirmasi);
				}
			}else{
				$this->index();
			}
		}

		public function valid_captcha($str){
  				$binds=$str;
                $sql="SELECT * FROM captcha WHERE word= '$binds' ORDER BY captcha_id DESC LIMIT 1";
                $query = $this->db->query($sql);
                $row = $query->row();
                if ($row){
                        return TRUE;
                }else{
                        $this->form_validation->set_message('valid_captcha','Captcha tidak sama');
                        return FALSE;
                }
                
		}

		public function cek_email($star){
  				$email=$star;
                $sql="SELECT * FROM users WHERE email='$email'";
                $query = $this->db->query($sql);
                $row = $query->row();
                if ($row){
                        $this->form_validation->set_message('cek_email','%s sudah terdaftar');
                        return FALSE;
                }else{
                        return TRUE;
                }
                
		}


}








