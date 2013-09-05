<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Captcha_model extends CI_Model 
{
 
        function __construct()
 {
          parent::__construct();
 }
          
        function setCaptcha()
        {
          $this->load->helper('captcha');
          $vals = array(
           'img_path'       => './assets/captcha/',
           'img_url'        => base_url().'/assets/captcha/',
           'expiration'     => 3600,// one hour
           'font_path'   => './system/fonts/georgia.ttf',
           'img_width'   => '220',
           'img_height'   => 30,
           'word'   => random_string('numeric', 6),
                 );
                  
          $cap = create_captcha($vals);
          if ($cap)
          {
                   $this->db->query("TRUNCATE table captcha;");
                  $capdb = array(
                   'captcha_id'       => '',
                   'captcha_time'     => $cap['time'],
                   'ip_address'       => $this -> input -> ip_address(),
                   'word'             => $cap['word']
                  );
                  $query = $this->db->insert_string('captcha', $capdb);
                  $this->db->query($query);
          }else {
                                return "Captcha not work" ;
                         }
                        //$data['cap'] = $cap;     
                    return $cap['image'];
 }        
}