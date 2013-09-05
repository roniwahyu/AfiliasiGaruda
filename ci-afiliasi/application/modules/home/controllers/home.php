<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Home extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('template/template_model', 'template', TRUE);
	}

	function index(){
		$page['title']='Home';
		$page['menus']=$this->template->menu('guest');
		$this->load->view('template/header', $page);
		$this->load->view('home');
	}

	
	
}
?>