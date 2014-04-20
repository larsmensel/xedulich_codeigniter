<?php
class Model_banner extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	
public function hiendanhsachbanner()
	{
		$this->db->select('*');
		$this->db->order_by("IDBanner", "desc");    		
		$query = $this->db->get('banner');  
		//result_object
		return  $query->result();//
	}	
	
public function thembanner($urlhinh,$link)
	{
		$data = array(
		   'urlhinh' 	=>	$urlhinh ,
		   'link' 		=>	$link 
		);

		$this->db->insert('banner', $data); 
	}	 
	  
}