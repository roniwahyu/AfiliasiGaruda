<?php


if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Jasa_kirim_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		
	}

      function get_aktif_jasa_kirim()
      {
            $result=null;
            $query=$this->db->query("select * from jasa_kirim where isactive=1");
            if ($query!=null) {
                  $result=$query->result();
            }

            return $result;
      }

      function get_all_jasa_kirim()
      {
       $result=null;
            $query=$this->db->query("select * from jasa_kirim");
            if ($query!=null) {
                  $result=$query->result();
            }

            return $result;     
      }

      function get_per_item($id)
      {
            $result=null;
            $query=$this->db->query("select * from jasa_kirim where idjasa_kirim=".$id." and isactive=1");
            if ($query!=null) {
                  $result=$query->result();
            }

            return $result;
      }


}

/*EOF blog.php*/
/*Location: ./application/controllers/blog.php*/
