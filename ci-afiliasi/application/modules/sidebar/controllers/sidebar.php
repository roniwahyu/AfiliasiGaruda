	<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Sidebar extends MX_Controller{


	function __construct(){
		parent::__construct();
		$this->load->model('Main_model', 'model', TRUE);
		$this->load->model('template/template_model', 'template', TRUE);
	}

	function index(){
		//print_r($this->session->all_userdata());
		$datalogin=$this->session->all_userdata();
		if($this->uri->segment(1)!='sidebar')
		{		
			$this->load->model('profile/profile_model','profile_model', TRUE);
			$profile_model=$this->get_userprofile($this->session->userdata('userid'));
			$this->load->view('sidebar', $profile_model);
			
		}
		else
		{

			redirect('login');
		}

	}

	function get_userprofile($userid=null)
	{
		if ($userid==null) {
			redirect('dologin');
		}
		else{
			$profilemember=$this->profile_model->get_data($userid);
			if($profilemember!=null)
			{
				foreach ($profilemember->result() as $profile) {
					$profile=array(
							'firstname'=>$profile->firstname,
							'lastname'=>$profile->lastname,
							'email'=>$profile->email,
							'country'=>$profile->country,
							'photo'=>$profile->photo,
							'timestamp'=>$profile->timestamp
						);
				}
			}
			else{
				$profile=null;
			}

			return $profile;
		}

		//return ;

	}
	
	
	
}

/**EOF blog.php**/
/**Location: ./modules/blog.php**/