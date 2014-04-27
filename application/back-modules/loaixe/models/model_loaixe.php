<?php
class Model_loaixe extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
	public function get_total_loaixe()
	{   
		return $this->db->count_all('loaixe');		
	}
	public function themchitietloaixe($TenLoaixe,$ThuTu,$AnHien)
	{
		$data = array(
		   'TenLoaixe' => $TenLoaixe ,
		   'ThuTu' => $ThuTu ,
		   'AnHien' => $AnHien
		);
		
		$this->db->insert('loaixe', $data); 
	}
	public function get_list_loaixe($limit, $start)
	{   
		$this->db->select('IDLoaixe, TenLoaixe, ThuTu, AnHien');	
		$this->db->limit($limit, $start);
		$this->db->order_by('IDLoaixe', 'DESC');       
		$query = $this->db->get('loaixe');	
		return $query->result();
	}

	public function xoatatcaloaixe($items)
	{
		foreach($items as $value){
			$this->db->where('IDLoaixe', $value);
			$this->db->delete('loaixe');
		}
		return true;			
	}
	public function xoaloaixe($id)
	{
		$this->db->where('IDLoaixe', $id);
		return $this->db->delete('loaixe'); 			
	}
	
	
	public function luu_capnhatloaixe($id,$TenLoaixe,$ThuTu,$AnHien)
	{
		$data = array(
		   'TenLoaixe' => $TenLoaixe ,
		   'ThuTu' => $ThuTu ,
		   'AnHien' => $AnHien
		);
		$this->db->where('IDLoaixe', $id);
		$this->db->update('loaixe', $data); 
	}
	
	public function capnhatloaixe($id)
	{
		$this->db->select('*');
		$this->db->where('IDLoaixe',$id);		
		$query = $this->db->get('loaixe');			
		return  $query->result();
	}	
	
  
}