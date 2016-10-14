<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
	private $nama_tabel='t_user';
	private $primary='id_user';
	public function __construct(){
	parent::__construct();
	}

	function getalluser(){
		return $this->db->get($this->nama_tabel);
	}
}