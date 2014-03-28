<?php
class Model_giohang extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	function chitiet_xe($id){
		$query = $this->db->get('chitietxe');
		$query = $this->db->get_where('chitietxe', array('IDchitietxe' => $id));
		return $query->result(); // Return the results in a array.
	}   
  /* end the loai thue xe */
  
}