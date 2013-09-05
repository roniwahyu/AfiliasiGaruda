<?php


if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Myreferer_model extends CI_Model{
	
	function __construct(){
		parent::__construct();

	}

      function get_referer_data($userid)
      {
            $query=$this->db->query('select `users`.`userid` AS `userid`,`role_user`.`parent` AS `parent`,
                  `role`.`rolename` AS `rolename`,`users`.`isactive` AS `isactive`,
                  `users`.`username` AS `username`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname`,
                  `users`.`email` AS `email`,`role_user`.`timestamp` AS `timestamp` 
                  from ((`users` join `role_user` on((`users`.`userid` = `role_user`.`userid`)))
                        join `role` on((`role`.`roleid` = `role_user`.`roleid`))) 
                  where ((`role_user`.`parent` = '.$userid.'))');

            if ($query->num_rows()==null) {
                  return null;
            }
            else{
                  return $query;
            }
      }

      function coba()
      {
            echo 'hello world';
      }

}

/*EOF blog.php*/
/*Location: ./application/controllers/blog.php*/
