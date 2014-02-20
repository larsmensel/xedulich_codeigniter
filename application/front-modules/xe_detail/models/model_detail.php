<?php
class Model_detail extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	public function get_chitietxe($id) {        
		$this->db->join('hangxe', 'hangxe.IDHangxe=chitietxe.IDHangxe');	
		$this->db->join('loaixe', 'loaixe.IDLoaixe=chitietxe.IDLoaixe');	
		$query = $this->db->get_where('chitietxe', array('IDchitietxe' => $id));
		return $query->result();   
	}
	public function get_hangloaixe($id){
		$this->db->select('IDHangxe, IDLoaixe');    	
		$query = $this->db->get_where('chitietxe', array('IDchitietxe' => $id));
		return $query->result_array(); 
	}	
	public function get_xecung_hang($idxe,$idhang) {  
		$this->db->order_by("chitietxe.IDchitietxe", "desc");    		
		$this->db->limit(4);
		$this->db->where_not_in('chitietxe.IDchitietxe', $idxe);
		$this->db->join('hangxe', 'hangxe.IDHangxe=chitietxe.IDHangxe');	
		$this->db->join('loaixe', 'loaixe.IDLoaixe=chitietxe.IDLoaixe');	
		$query = $this->db->get_where('chitietxe', array('chitietxe.IDHangxe' => $idhang));
		return $query->result();
	}	
	public function get_xecung_loai($idxe,$idloai) {  
		$this->db->order_by("chitietxe.IDchitietxe", "desc");    		
		$this->db->limit(4);
		$this->db->where_not_in('chitietxe.IDchitietxe', $idxe);
		$this->db->join('hangxe', 'hangxe.IDHangxe=chitietxe.IDHangxe');	
		$this->db->join('loaixe', 'loaixe.IDLoaixe=chitietxe.IDLoaixe');	
		$query = $this->db->get_where('chitietxe', array('chitietxe.IDLoaixe' => $idloai));
		return $query->result();
	}	
	
	//lay du lieu cung loại cho thuê
	public function get_loaichothue($id){ 
		$this->db->join('loaithue_ctxe', 'loaithue_ctxe.IDXe=chitietxe.IDchitietxe');	
		$this->db->join('loaichothue', 'loaichothue.IDThue=loaithue_ctxe.IDThue');	
		$query = $this->db->get_where('chitietxe', array('chitietxe.IDchitietxe' => $id));
		return $query->result_array();
	}	
	public function get_cung_loaichothue($idxe,$idthue) {
		$this->db->select('*');
		$this->db->order_by("chitietxe.IDchitietxe", "desc");    		
		$this->db->limit(4);
		$this->db->where_not_in('chitietxe.IDchitietxe', $idxe);
		$this->db->join('chitietxe', 'chitietxe.IDchitietxe=loaithue_ctxe.IDXe');
		$this->db->join('hangxe', 'hangxe.IDHangxe=chitietxe.IDHangxe');
	  	$this->db->join('loaixe', 'loaixe.IDLoaixe=chitietxe.IDLoaixe');
		$this->db->where('loaithue_ctxe.IDThue',$idthue);		       
		$query = $this->db->get('loaithue_ctxe');
		return  $query->result(); 
	}	
}