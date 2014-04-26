<?php
class Model_hangxe extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	
	public function hiendanhsachhangxe()
	{
		$this->db->select('*');
		$this->db->order_by("IDHangxe", "desc");    		
		$query = $this->db->get('hangxe');  
		//result_object
		return  $query->result();//

	}
	
  
}