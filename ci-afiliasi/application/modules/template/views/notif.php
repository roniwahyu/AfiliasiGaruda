<?php

	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	$data['header']=$header;
	$this->load->view('template/header', $data); ?>

<?php 
	if (!isset($msg_title) && !isset($msg_content)) {
		redirect('home');
	}else{
		echo "<p><h2>".$msg_title."</h2><br/><strong>".$msg_content."</strong></p>";
	}
?>

<?php $this->load->view('template/footer'); ?>