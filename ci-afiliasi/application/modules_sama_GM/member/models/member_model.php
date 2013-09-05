<?php
	class Member_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function get_members(){
			//$query=$this->db->query("SELECT * FROM users ORDER BY id ASC");
			$result=null;

			$query=$this->db->query("SELECT users.userid AS userid,
											users.username AS username,
											users.firstname AS firstname,
											users.lastname AS lastname,
											users.city AS city,
											users.country AS country,
											users.photo AS photo,
											total_komisi.total_komisi AS total_komisi
					from (`users` join `total_komisi` on((`users`.`userid` = `total_komisi`.`userid`)))
					where users.isactive=1");
			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}

		function get_member_by_id($username){
				$result=null;

			$query=$this->db->query("SELECT users.userid AS userid,
											users.username AS username,
											users.firstname AS firstname,
											users.lastname AS lastname,
											users.city AS city,
											users.country AS country,
											users.photo AS photo,
											total_komisi.total_komisi AS total_komisi
					from (`users` join `total_komisi` on((`users`.`userid` = `total_komisi`.`userid`)))
					where users.isactive=1 AND users.username='".$username."'");
			if ($query!=null) {
				$result=$query->result();
			}

			return $result;
		}
		

		
	}
