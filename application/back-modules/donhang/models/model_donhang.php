<?php
class Model_donhang extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
	public function get_total_donhang()
	{   
		return $this->db->count_all('donhang');		
	}
	public function get_list_donhang($limit, $start)
	{   
		$this->db->select('id_giohang, TenKH, TenXe, TongTien');	
		$this->db->limit($limit, $start);
		$this->db->order_by('id_giohang', 'DESC');       
		$query = $this->db->get('donhang');	
		return $query->result();
	}

	public function xoatatcadonhang($items)
	{
		foreach($items as $value){
			$this->db->where('id_giohang', $value);
			$this->db->delete('donhang');
		}
		return true;			
	}
	public function xoadonhang($id)
	{
		$this->db->where('id_giohang', $id);
		return $this->db->delete('donhang'); 			
	}
	
	
	public function luu_capnhatdonhang($id,$TenKH,$SDT,$Email,$TenXe,$NgayThue,$SoNgay,$Tu,$Den,$TongTien,$TinhTrang)
	{
		$data = array(
		   'TenKH' => $TenKH ,
		   'SDT' => $SDT ,
		   'Email' => $Email ,
		   'TenXe' => $TenXe ,
		   'NgayThue' => $NgayThue ,
		   'SoNgay' => $SoNgay ,
		   'Tu' => $Tu ,
		   'Den' => $Den ,
		   'TongTien' => $TongTien ,
		   'TinhTrang' => $TinhTrang ,
		);
		$this->db->where('id_giohang', $id);
		$this->db->update('donhang', $data); 
	}
	
	public function capnhatdonhang($id)
	{
		$this->db->select('*');
		$this->db->where('id_giohang',$id);		
		$query = $this->db->get('donhang');			
		return  $query->result();
	}	
	
  
}