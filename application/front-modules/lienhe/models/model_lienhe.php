<?php
class Model_lienhe extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	public function get_loaithue($id){
		$this->db->select('IDThue, TenThue');    	
		$query = $this->db->get_where('loaichothue', array('IDThue' => $id));
		return $query->result_array(); 
	}
	
}