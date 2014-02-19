<?php
class Model_home extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
	public function get_loaithue(){
		$this->db->select('IDThue, TenThue');    	
		$query = $this->db->get('loaichothue');
		return $query->result_array(); 
	}	 
	public function chitietxe_thue($id){ 		  
		//$this->db->select('l.IDThue,l.TenThue,lx.IDThue,lx.IDXe,cx.IDchitietxe, cx.TenXe, cx.NamSx, cx.Bienso, cx.Mota, cx.IDLoaixe,cx. IDHangxe');       
		$this->db->select('*');
		$this->db->order_by("chitietxe.IDchitietxe", "desc");    		
		$this->db->limit(4);
		$this->db->join('chitietxe', 'chitietxe.IDchitietxe=loaithue_ctxe.IDXe');
		$this->db->join('hangxe', 'hangxe.IDHangxe=chitietxe.IDHangxe');
		$this->db->join('loaixe', 'loaixe.IDLoaixe=chitietxe.IDLoaixe');
		$this->db->where('loaithue_ctxe.IDThue',$id);		       
		$query = $this->db->get('loaithue_ctxe');
		//result_object
		return  $query->result_array(); 
	}
}