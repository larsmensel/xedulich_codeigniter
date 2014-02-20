<?php
class Model_tintuc extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
	
	// Query cho function lay tin tuc
	
	// đếm tất cả số tin có trong database
	public function count_tintuc() {	  
		$this->db->from('tintuc');
		return $this->db->count_all_results();
	}  
	
	public function fetch_tin($limit,$page){ 		         
		$this->db->select('*');
		$this->db->order_by("id_tin", "desc");    		
		$query = $this->db->get('tintuc',$limit,$page);  
		//result_object
		return  $query->result();//
	}
	
	
	// Query cho function lay tin tuc chi tiet
	public function chitiet_tin($id){ 		  	       
		$query = $this->db->get_where('tintuc', array('id_tin' => $id));
		return $query->result(); 
	}
	public function get_tinlienquan($id){ 		  	       
		$this->db->order_by("id_tin", "desc");    		
		$this->db->limit(5);
		$this->db->where_not_in('id_tin', $id);
		$query = $this->db->get('tintuc');
		return $query->result();
	}	
	
}