<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_admin extends CI_Controller {
	public function index()
	{
		$this->load->view('dashboard_admin');
	}

		public function get_menu(){
		$menu = array();
		$menusparent = $this->db_model->getDataMenuParent();
		foreach ($menusparent->result() as $m ) {
			$menu[] = $m;
			$menus = $this->db_model->getDataMenuChild($m->p_menu_id);
			foreach ($menus->result() as $n ) {
				$menu[] = $n;
			}

		}
		//$this->output->set_header('Content-Type: application/json; charset=utf-8');
		echo json_encode($menu);
	}
}
