<?php
	
	class Member extends MX_Controller{
	

		function __construct(){
			parent::__construct();
			$this->load->model('member_model');
        
		}

		/*
		||for anonymouse visitor||
		1. show list top 10 affiliate user(registered date, commision, photo, firstname lastname, City, Country)
		2. Show full detail if visitor click user url

		||for logged user||
		1. if userid==userid show edit button
		2. if edit button clicked go to pengaturan modules
		*/


		function index(){
			
			$data['member_list'] = $this->get_members();
			$this->load->view('members',$data);
		}

		function get_members()
		{
			$result=null;

			$data_members=$this->member_model->get_members();

			if ($data_members!=null) {
				
			}

		}



	}












