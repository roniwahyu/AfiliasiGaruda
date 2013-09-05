<?php
	
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Ref extends MX_Controller{
		function __construct(){
			$this->load->library('user_agent');
			$this->load->helper('date');
			parent::__construct();
			$this->load->model('ref_model');
		}

		function index(){
			$this->load->view('ref');
		}

		function id($id){
			if ($this->agent->is_referral()){
    			$this->agent->is_mobile()?$udata['jenis']='Mobile':$udata['jenis']='Desktop';
				$udata['sumber']   =$this->agent->referrer();
				$udata['browser']  =$this->agent->browser();
				$udata['platform'] =$this->agent->platform();
				$udata['ipaddress']=$this->input->ip_address();
				$udata['tanggal']  =date('Y-m-d');
				$udata['idreferal']=	$id;
				$res = $this->ref_model->insert_ref_to_db($udata);
			}

			
			$this->load->view('ref');
		}


		

	
		
	}











