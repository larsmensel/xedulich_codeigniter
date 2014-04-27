<?php
class Model_tim_xe extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	public function get_loaithue($id){
		$this->db->select('IDThue, TenThue');    	
		$query = $this->db->get_where('loaichothue', array('IDThue' => $id));
		return $query->result_array(); 
	}
	/* the loai thue xe & chitietxe theo loai thue xe*/
	public function count_chitietxe_tim($key) {	  
		$this->db->like('TenXe', $key);
		$this->db->from('chitietxe');
		return $this->db->count_all_results();
	}  
	public function fetch_chitietxe_tim($key,$limit, $page) {
		//$query = $this->db->get('mytable', 10, 20);
		// Produces: SELECT * FROM mytable LIMIT 20(bat dau), 10(gioi han) (in MySQL. Other databases have slightly different syntax)
  
		$this->db->select('*');
		$this->db->like('TenXe', $key);	       
		$query = $this->db->get('chitietxe',$limit,$page);  
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
  /* end the loai thue xe */
  
}