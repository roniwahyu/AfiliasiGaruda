<?php


if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Produk_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		
	}

      function get_all()
      {
            $data=$this->db->query("select * from produk where isactive=1 AND stok > 0");
            if($data!=null)
            { return $data; }
            else {return null;}
      }

      function get_per_item($idproduk)
      {
            $data=$this->db->query("select * from produk where isactive=1 AND stok > 0 AND idproduk=".$idproduk."");
            if($data!=null)
            { return $data; }
            else {return null;}     
      }

}

/*EOF blog.php*/
/*Location: ./application/controllers/blog.php*/
