<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    } 	
		$this->load->model('db_model');
 
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function user_login(){
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$is_login	= $this->db_model->getLoginData($username,$password);
		if ( $is_login->num_rows() > 0){
			$data_session = array(
				'nama' 		=> $username,
				'status' 	=> "login"
			);
			$this->session->set_userdata($data_session);
			//redirect('welcome');
			//$this->get_menu();
			$this->load->view('dashboard_admin');
		} else {
			redirect('login');
		}
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
		 $this->output->set_header('Content-Type: application/json; charset=utf-8');
		echo json_encode($menu);
	}
}
