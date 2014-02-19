<?php
class Model_detail extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	public function get_chitietxe($id) {        
	   $query = $this->db->get_where('chitietxe', array('IDchitietxe' => $id));
	   return $query->result();   
	}
}