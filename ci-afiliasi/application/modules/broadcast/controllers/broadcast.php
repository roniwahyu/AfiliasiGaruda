<?php
	
	class Broadcast extends MX_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('broadcast/broadcast_model');
			
		}

		function index(){
			$data['member_list'] = $this->member_model->get_members();
			$this->load->view('broadcast',$data);
		}

		function baru(){
			$terkirim=0;
			$jumlah=$this->input->post('jumlah');
			for($i=1;$i<=$jumlah;$i++){
				$data=$this->input->post('cek'.$i);
				if(!empty($data)){
					$email=$this->broadcast_model->get_email_by_id($data)->row_array();
					 
					$kepada   = $email['email'];
	  				$judul	  = "Promo Terbaru Member Affiliasi GarudaMedia";
	  				$pesan	  = "Hai ".$email['username']."!<br>";
	  				$pesan   .= "Silahkan cek promo terbaru mengenai member affiliasi di website GarudaMedia.";
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1\r\n';
					$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
					$headers .= 'From: GarudaMedia <faiza914@merapi.rumahweb.com>';  	
	  				$sentmail = mail($kepada,$judul,$pesan,$headers);

	  				if($sentmail){
						$terkirim++;			
					}
			
				}	
			}
			$konfirmasi['judul']="Broadcast Sukses!";
			$konfirmasi['isi']="Broadcast message berhasil dikirim ke ".$terkirim." email.";
						
			$this->load->view('konfirmasi',$konfirmasi);

		}
		
	}











