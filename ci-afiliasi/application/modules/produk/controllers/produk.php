<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Produk extends MX_Controller{

	
	function __construct(){
		parent::__construct();
		
		$this->load->model('template/template_model', 'template', TRUE); //required for header template

		$this->load->model('produk_model', 'produk_model', TRUE);
	}

	function index(){
		//Configuration page title and menu for active user
				$aktif_menu['title']='Produk';
				$view_menu_as="guest";
				$session=$this->session->all_userdata();
				if ($this->session->userdata('login')===TRUE && $this->session->userdata('rolename')==='member' && isset($session['userid']))
					{$view_menu_as="member";}
			

				if ($this->uri->segment(1)=='produk') {
					$aktif_menu['menus']=$this->template->menu($view_menu_as);
					$this->load->view('template/header', $aktif_menu);
				}
				
				//end of configuration

				$show=array(
						'dataproduk'=>$this->show_all()
						);

				$this->load->view('produk', $show);
				$this->load->view('template/footer');
		
			}
	
	function distributor()
	{
		$aktif_menu['title']='Produk';
		$view_menu_as="guest";
		$session=$this->session->all_userdata();
			if ($this->session->userdata('login')===TRUE && $this->session->userdata('rolename')==='member' && isset($session['userid']))
				{$view_menu_as="member";}
			

			if ($this->uri->segment(1)=='produk') {
					$aktif_menu['menus']=$this->template->menu($view_menu_as);
					$this->load->view('template/header', $aktif_menu);}
				
				//end of configuration

				$show=array('dataproduk'=>$this->show_all());

				$this->load->view('beli_banyak', $show);
				$this->load->view('template/footer');
	}

	function show_all()
	{
		$produk=$this->produk_model->get_all();
		$result=null;
		if ($produk!=null) {
			$result=$produk->result();
		}


		return $result;
	}

	function detail()
	{
		$idproduk=$this->input->get('id');

		if (!isset($idproduk)) {
			$this->index();
		}

		//proc show detail product depends on idproduk

	}
}

/**EOF blog.php**/
/**Location: ./modules/blog.php**/