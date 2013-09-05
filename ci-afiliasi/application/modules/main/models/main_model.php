<?php


if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Main_model extends CI_Model{
	
	function __construct(){
		parent::__construct();

	}


function update_lastlogin($userid){
      $result=$this->db->where('userid', $userid)
                  ->set('timestamp', date('Y-m-d H:i:s'))
                  ->update('users');
            if ($result==null) {
                  return FALSE;
            }
            else{
                  return TRUE;
            }
 }



}

/*EOF blog.php*/
/*Location: ./application/controllers/blog.php*/
