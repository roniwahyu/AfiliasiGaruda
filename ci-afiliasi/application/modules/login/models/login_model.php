<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');

	class Login_model extends CI_Model{
		function __construct(){
			parent::__construct();
			
		}

		// function cek_login($username, $pwd){
		// 	$query=$this->db->get_where('users', array('username'=>$username, 'password'=>md5($pwd)));
		// 	if ($query->num_rows()==1) {
		// 		return $query->result();

		// 	}else{
		// 		return FALSE;
		// 	}
		// }

		// function cek_aktif($username){
		// 	$cek_aktif=$this->db->get_where('users', array('username'=>$username,'isactive'=>'1'));
		// 	if ($cek_aktif->num_rows()!=0){	
		// 		return $cek_aktif->result();	
		// 	}
				
		// }

		// function get_userdata($id){
		// 	$query=$this->db->query("SELECT * FROM users  WHERE id=".$id);
		// 	if($query->num_rows()>0){ 
		// 		return $query; 
		// 	} else {
		// 		return null;
		// 	}
		// }

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
		$query=$this->db->query("SELECT
role_user.roleuserid,
role.rolename,
role.roledesc,
role_user.isactive,
users.username,
users.`password`,
users.email
FROM
role
INNER JOIN role_user ON role.roleid = role_user.roleid
INNER JOIN users ON role_user.userid = users.userid
 WHERE users.userid=".$id);
		if($query->num_rows()>0){ return $query->row(); }
		else {return "null";}
		
	}
}

