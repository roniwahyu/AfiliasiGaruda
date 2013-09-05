<?php

	if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Chart extends MX_Controller{


	function __construct(){
		parent::__construct();
		// $this->load->model('Main_model', 'model', TRUE);
		// $this->load->model('template/template_model', 'template', TRUE);
	}

function index(){
	$this->load->view("chart");	
	}

function getData(){
	$respon->cols[]=array("id"=>"", "label"=>"Topping", "pattern"=>"", "type"=>"string");
	$respon->cols[]=array("id"=>"", "label"=>"kjsdfl", "pattern"=>"", "type"=>"number");
	$respon->rows[]["c"]=array(array("v"=>"Mushrooms", "f"=>null),array("v"=>3, "f"=>null));
	$respon->rows[]["c"]=array(array("v"=>"Onions", "f"=>null),array("v"=>1, "f"=>null));
	$respon->rows[]["c"]=array(array("v"=>"Olives", "f"=>null),array("v"=>1, "f"=>null));
	$respon->rows[]["c"]=array(array("v"=>"Zuccini", "f"=>null),array("v"=>1, "f"=>null));
	$respon->rows[]["c"]=array(array("v"=>"Pepperoni", "f"=>null),array("v"=>3, "f"=>null));

	echo json_encode($respon);
}

	
	
	
}