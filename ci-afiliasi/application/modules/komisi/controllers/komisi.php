<?php
	
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Komisi extends MX_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('komisi_model', 'komisi_model', TRUE);
			$this->load->model('template/template_model', 'template', TRUE);
		}

		function index(){
		$datalogin=$this->session->all_userdata();
		if($datalogin['login']===TRUE && $datalogin['rolename']==='member' && isset($datalogin['userid']))
		{
			$session=$this->session->all_userdata();
			$page['title']='Komisi';
			$page['menus']=$this->template->menu('member');
			$this->load->view('template/header', $page);
			$data=array(
					'komisi'=>$this->lihat($datalogin['userid'])
					);
			$this->load->view('komisi', $data);
			$this->load->view('template/footer');

		} else {redirect('login');}

		}

		function lihat($userid)
		{
			$result="<table class='table table-striped table-hover'>
						<thead>
						<tr style='font-weight:900'>
							<td>No.</td><td>User Referall</td><td>Alamat</td><td>Jumlah Pembelian</td><td>Total (Rp.)</td><td>Status</td><td>Detail</td>
						</tr>
						</thead>
						<tbody>";
			$data_komisi=$this->komisi_model->show_komisi($userid);
			if ($data_komisi==null) {
				$result.="<p class='text-error'><strong>Maaf, komisi anda masih kosong. Perbanyak kesempatan mendapat komisi dengan memperbanyak menyebar link affilasi anda.</strong></p>";
			}
			else{
				$i=1;
				foreach ($data_komisi as $komisi) {
					$result.="<tr>
								<td>".$i."</td><td>".$komisi->atas_nama."</td>
								<td>".$komisi->alamat."</td><td>".$komisi->total_qty."</td><td>".$komisi->total_transfer."</td>
								<td>".$komisi->info_transfer."</td>
								<td><a href='".base_url()."komisi/detail/".$komisi->idpembeli."' role='button' class='btn btn-info' data-toggle='modal'>View</a></td>
							</tr>";
						$i++;
						}
			}
			$result.="</tbody></table>";

			return $result;
		}

		function detail($id=null)
		{
			if ($id!=null) {
				$result="<div id='myModal' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
    <h3 id='myModalLabel'>Detail Pembelian</h3>
  </div>";
  $detail_pembeli=$this->komisi_model->show_detail($this->session->userdata('userid'), $id);

  		foreach ($detail_pembeli as $pembelian) {
				$result.="<div class='modal-body'>
					
				</div>";  
 		 }

  $result.="<div class='modal-footer'>
    <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
  </div>
</div>";
			}
		}


	}