	<?php

if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Myreferer extends MX_Controller{


	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->library('database');
		$this->load->model('myReferer_model', 'ref_model', TRUE);
		//$this->load->model('template/template_model', 'template', TRUE);
	}

	function index(){
		//print_r($this->session->all_userdata());
		$datalogin=$this->session->all_userdata();
		if($this->session->userdata('login')===TRUE && $datalogin['rolename']==='member' && isset($datalogin['userid']))
		{	
			if ($this->uri->segment(1)=='myReferer') {
				redirect('main');
			}

			$show=($this->get_myreferer($this->session->userdata('userid')))==null?'<strong class="text-error">Anda belum memiliki Anggota Referal</strong>': $this->get_myreferer($this->session->userdata('userid'));

			$data=array(
					'show'=>$show
					);

			$this->load->view('myReferer', $data);
		}
		else
		{

			redirect('dologin');
		}

	}

	function get_myreferer($userid){
		if ($userid==null) {
			redirect('dologin');
		}
		$refererdata=$this->ref_model->get_referer_data($this->session->userdata('userid'));
		if ($refererdata==null) {
			$show=null;
		}
		else
		{
			$show=null;
			$i=1;
			foreach ($refererdata->result() as $data) {
				
				$cek_aktif="<span class='label'>inactive</span>";
					if ($data->isactive==1) {
						$cek_aktif="<span class='label label-success'>active</span>";
					}
			$show .="<tr>
			<td>".$i++."</td>
			<td><a href=".base_url()."member/".$data->username.">".$data->firstname." ".$data->lastname."</a></td>
			<td>".$data->email."</td>
			<td>".$data->timestamp."</td>
			<td>".$cek_aktif."</td></tr>";

			}
		}

		return $show;

	}


	
}

/**EOF blog.php**/
/**Location: ./modules/blog.php**/