<?php


if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Dologin_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		
	}


	function cek_login($username, $password){
		$query=$this->db->get_where('users', array('username'=>$username, 'password'=>md5($password)));
		if ($query->num_rows()==1) {
							return TRUE;
						}
					else{
						return FALSE;
						}
	}

	function cek_aktif($username){
					$cek_aktif=$this->db->get_where('users', array('username'=>$username,'isactive'=>'1'));
			if ($cek_aktif->num_rows()!=0)	{	return $cek_aktif->result();	}
			
	}

	function get_userdata($id){
		$query=$this->db->query("SELECT users.username, users.`password`, role.rolename, role.roledesc,users.userid FROM role_user INNER JOIN role ON role.roleid = role_user.roleid INNER JOIN users ON users.userid = role_user.userid WHERE users.userid=".$id);
		if($query->num_rows()>0){ return $query->row(); }
		else {return null;}
		
	}


}

/*EOF blog.php*/
/*Location: ./application/controllers/blog.php*/
