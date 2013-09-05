<?php


if(!defined('BASEPATH'))
		exit('No direct script access allowed');


class Template_model extends CI_Model{
	
	function __construct(){
		parent::__construct();

	}

	function get_usermenu($rolename=null, $menu_parent)
	{
		if ($rolename==null) {
			$rolename='guest';
		}
		else{$rolename=$rolename;}
	
		$query=$this->db->query("select megamenu.menuid AS menuid,
			megamenu.parent AS parent,megamenu.menuurl AS menuurl,
			megamenu.menutitle AS menutitle,megamenu.menudesc AS menudesc,
			megamenu.menuname AS menuname,role.rolename AS rolename,
			megamenu.isactive AS isactive
			from ((megamenu join menulevel on((megamenu.menuid = menulevel.menuid)))
			join role on((role.roleid = menulevel.roleid)))
			where ((role.rolename ='".$rolename."') and (megamenu.isactive = 1)
			and (megamenu.parent = ".$menu_parent."))" );
		if($query->num_rows()!=0)
		{	return $query;	}
		else if($query->num_rows()==null)
		{
			return null;
		}


	}

	function menu($rolename)
	{	
		$aktif_menu=$this->get_usermenu($this->session->userdata('rolename'), 0);
		$show_menu="

				<ul class='nav pull-right'>";
					if($aktif_menu==null)
					{
						echo " ";
					}
					else{


		foreach ($aktif_menu->result() as $menu) {

			
			$parent=$this->get_usermenu($rolename, $menu->menuid);

			if($parent==null)
				{
					
					if ($this->uri->segment(1)==$menu->menuurl) {
					$show_menu.="<li class='active'><a href='".base_url().$menu->menuurl."'>".$menu->menutitle."</a></li>";
					}
					else{
						$show_menu.="<li><a href='".base_url().$menu->menuurl."'>".$menu->menutitle."</a></li>";	
					}
					
					
				}
			else
			{	
				if ($this->uri->segment(1)==$menu->menuurl) {
				$show_menu .="<li class='dropdown active'><a data-target='#' href='/page.html' role='button' id='drop1' href='".base_url().$menu->menuurl."' class='dropdown-toggle' data-toggle='dropdown'>".$menu->menutitle."&nbsp<b class='caret whitecaret'></b></a>";
				}
				else
				{
					$show_menu .="<li class='dropdown'><a data-target='#' href='/page.html' role='button' id='drop1' href='".base_url().$menu->menuurl."' class='dropdown-toggle' data-toggle='dropdown'>".$menu->menutitle."&nbsp<b class='caret whitecaret'></b></a>";
				}
				
				$parents=$this->get_usermenu($rolename, $menu->menuid);
				$show_menu .="<ul class='dropdown-menu' role='menu' aria-labelledby='drop1'>";
                 
				foreach ($parents->result() as $menus) {
						$show_menu .="<li><a href='".base_url().$menus->menuurl."'>".$menus->menutitle."</a></li>";
					}
					$show_menu .="</ul></li>";

			}

					
			

		}
		}
			$show_menu .="</ul>";

		return $show_menu;
	}




}

/*EOF blog.php*/
/*Location: ./application/controllers/blog.php*/
