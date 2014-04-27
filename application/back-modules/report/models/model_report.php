<?php
class Model_report extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	
	
	
	public function toExcel()
	{
		$query = $this->db->get('donhang');
		return  $query->result();
	}
  
}