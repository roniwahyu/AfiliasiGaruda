<?php


if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Profile_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		
	}

function get_data($userid)
{
	$data=$this->db->query("select * from users where userid=".$userid."");

	if($data!=null)
		{ return $data; }
	else {return null;}

}

function getpwd($userid){
      $query=$this->db->query("select password from users where userid='".$userid."'");
      if ($query==null) {
            return null;
      }
      else
      {
            return $query;           
      }

}

function edit_data($userid, $img_title)
{
      if ($img_title==null) {
            $img_title=$this->input->post('photo');
      }

      $data = array(
       
       'username' => $this->input->post('username', TRUE),
       
       'password' => $this->input->post('password', TRUE),
       
       'firstname' => $this->input->post('firstname', TRUE),
       
       'midname' => $this->input->post('midname', TRUE),
       
       'lastname' => $this->input->post('lastname', TRUE),
       
       'phone' => $this->input->post('phone', TRUE),
       
       'email' => $this->input->post('email', TRUE),
       'email2' => $this->input->post('email2', TRUE),
       
       'address' => $this->input->post('address', TRUE),
       
       'address2' => $this->input->post('address2', TRUE),
       
       'city' => $this->input->post('city', TRUE),
       
       'province' => $this->input->post('province', TRUE),
       
       'postal' => $this->input->post('postal', TRUE),
       
       'country' => $this->input->post('country', TRUE),
       
       'birthdate' => $this->input->post('birthdate', TRUE),
       
       'userlevel' => $this->input->post('userlevel', TRUE),
       
       'kode' => null,
       
       'isactive' => 1,
       
       'photo' => $img_title,
       
       'timestamp' => $this->input->post('timestamp', TRUE),
       
        );

      return $this->db->where('userid', $userid)
                        ->update('users', $data);
}

function edit_pass($pass, $userid){
      $result=$this->db->where('userid', $userid)
                  ->set('password', $pass)
                  ->update('users');
            if ($result==null) {
                  return null;
            }
            else{
                  return $result;
            }
 }

      function cek_password_lama($password,$email){
            $query=$this->db->query("SELECT * FROM users WHERE password='$password' and email='$email' ");
            return $query->result();
      }

      function ubah_password($email,$data){
            $this->db->where('users.email',$email);
            return $this->db->update('users', $data);
      }



}

/*EOF blog.php*/
/*Location: ./application/controllers/blog.php*/
