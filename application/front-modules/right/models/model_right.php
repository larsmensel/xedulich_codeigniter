<?php
class Model_right extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	public function get_tinnoibat(){ 		  	       
		$this->db->order_by("id_tin", "desc");    		
		$this->db->limit(1);
		$query = $this->db->get_where('tintuc', array('Hot' => '1'));
		return $query->result();
	}	
}