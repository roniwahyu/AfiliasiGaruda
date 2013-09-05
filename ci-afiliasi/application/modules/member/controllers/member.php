<?php
	
	class Member extends MX_Controller{
		function __construct(){
			parent::__construct();
			

		}

		function index(){
			$this->load->model('member_model');
        
			$data['member_list'] = $this->member_model->get_members();
			$this->load->view('member_view',$data);
		}

		function add_form(){
			$this->load->view('insert');
		}

		function update_form($id){
			$datam['member_uniq'] = $this->member_model->get_member_by_id($id);		
			$this->load->view('update',$datam);
		}

		public function insert_new_member(){
			$udata['username'] = $this->input->post('username');
			$udata['password'] = $this->input->post('password');
			$udata['phone'] = $this->input->post('phone');
			$udata['email'] = $this->input->post('email');

			$res = $this->member_model->insert_users_to_db($udata);
			if($res){
				header('location:'.base_url()."member/".$this->index());
			}

		}

		public function update(){
			$udata['username'] = $this->input->post('username');
			$udata['password'] = $this->input->post('password');
			$udata['phone'] = $this->input->post('phone');
			$udata['email'] = $this->input->post('email');
			$id = $this->input->post('id');

			$res=$this->member_model->update_info($udata, $id);
			if($res){
				header('location:'.base_url()."member/".$this->index());
			}
		}

		public function delete($id){
			$this->member_model->delete_a_user($id);
			$this->index();
		}

	}












