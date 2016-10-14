<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('UserModel');
		}

		public function index()
		{
			$this->load->view('user/index');
		}

		public function getUser()
		{
			$data=$this->UserModel->getalluser();
			$this->output->set_header('Content-Type: application/json; charset=utf-8');
			$output['aaData']=array();
			foreach($data->result() as $result){
			$json_array=array();
			$json_array[]=$result->username;
			$json_array[]=$result->status;
			$json_array[]=$result->user_id;
			$output['aaData'][]=$json_array;
			}
			echo json_encode($output);
		}

	}
?>