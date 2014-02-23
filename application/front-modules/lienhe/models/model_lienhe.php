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
	/* the loai thue xe & chitietxe theo loai thue xe*/
	public function count_chitietxe_loaithue($id) {	  
		$this->db->like('IDThue', $id);
		$this->db->from('loaithue_ctxe');
		return $this->db->count_all_results();
	}  
	public function fetch_chitietxe_loaithue($id,$limit, $page) {
		//$query = $this->db->get('mytable', 10, 20);
		// Produces: SELECT * FROM mytable LIMIT 20(bat dau), 10(gioi han) (in MySQL. Other databases have slightly different syntax)
  
		$this->db->select('*');        		
		$this->db->join('chitietxe', 'chitietxe.IDchitietxe=loaithue_ctxe.IDXe');	
		$this->db->join('hangxe', 'hangxe.IDHangxe=chitietxe.IDHangxe');
	  	$this->db->join('loaixe', 'loaixe.IDLoaixe=chitietxe.IDLoaixe');
		$this->db->where('loaithue_ctxe.IDThue',$id);		       
		$query = $this->db->get('loaithue_ctxe',$limit,$page);  
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