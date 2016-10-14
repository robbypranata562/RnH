<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {
	public function getLoginData($user,$password){
		return $this->db->get_where('t_user',array('username' => $user , 'password' => md5($password)));
	}

	public function getDataMenuParent(){
		return $this->db->query("SELECT 
									m.p_menu_id,
									m.menu_name,
									m.menu_controller,
									m.menu_icon,
									m.menu_description,
									m.is_parent
								FROM 
									p_menu AS m 
								WHERE 
								m.menu_parent IS NULL");
	}

	public function getDataMenuChild($parent_id){
		//$parent_id = 4;
		return $this->db->query("SELECT
									m.p_menu_id,
									m.menu_name,
									m.menu_controller,
									m.menu_icon,
									m.menu_description,
									m.is_parent,
									m.menu_parent
								FROM
									p_menu AS m
									INNER JOIN p_role_menu AS rm ON rm.p_menu_id = m.p_menu_id
									INNER JOIN p_role AS r ON rm.p_role_id = r.p_role_id
								WHERE
									r.p_role_id = 1 AND
									m.menu_parent = $parent_id");
		//die($data->result());
		//return $data;
	}
}
