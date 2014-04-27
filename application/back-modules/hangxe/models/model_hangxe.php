<?php
class Model_hangxe extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
	public function get_total_hangxe()
	{   
		return $this->db->count_all('hangxe');		
	}
	public function themchitiethangxe($Tenhangxe,$ThuTu,$AnHien)
	{
		$data = array(
		   'Tenhangxe' => $Tenhangxe ,
		   'ThuTu' => $ThuTu ,
		   'AnHien' => $AnHien
		);
		
		$this->db->insert('hangxe', $data); 
	}
	public function get_list_hangxe($limit, $start)
	{   
		$this->db->select('IDHangxe, TenHangxe, ThuTu, AnHien');	
		$this->db->limit($limit, $start);
		$this->db->order_by('IDHangxe', 'DESC');       
		$query = $this->db->get('hangxe');	
		return $query->result();
	}

	public function xoatatcahangxe($items)
	{
		foreach($items as $value){
			$this->db->where('IDHangxe', $value);
			$this->db->delete('hangxe');
		}
		return true;			
	}
	public function xoahangxe($id)
	{
		$this->db->where('IDHangxe', $id);
		return $this->db->delete('hangxe'); 			
	}
	
	
	public function luu_capnhathangxe($id,$Tenhangxe,$ThuTu,$AnHien)
	{
		$data = array(
		   'Tenhangxe' => $Tenhangxe ,
		   'ThuTu' => $ThuTu ,
		   'AnHien' => $AnHien
		);
		$this->db->where('IDHangxe', $id);
		$this->db->update('hangxe', $data); 
	}
	
	public function capnhathangxe($id)
	{
		$this->db->select('*');
		$this->db->where('IDHangxe',$id);		
		$query = $this->db->get('hangxe');			
		return  $query->result();
	}	
	
  
}