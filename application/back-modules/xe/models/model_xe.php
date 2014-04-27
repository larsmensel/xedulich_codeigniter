<?php
class Model_xe extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
	
	public function loaixe()
	{   
		$this->db->select('IDLoaixe, TenLoaixe');			   
		$this->db->where('AnHien',1);
		$this->db->order_by('ThuTu', 'ASC');
		$query = $this->db->get('loaixe');
		return $query->result();
	}
	public function hangxe()
	{   
		$this->db->select('IDHangxe, TenHangxe');		  
		$this->db->where('AnHien',1);	
		$this->db->order_by('ThuTu', 'ASC');		
		$query = $this->db->get('hangxe');
		return $query->result();
	}
	
	public function get_total_xe()
	{   
		return $this->db->count_all('chitietxe');		
	}
	public function themchitietxe($tenxe,$namsx,$bienso,$mauxe,$urlhinh,$mota,$gia,$loaixe,$hangxe)
	{
		$data = array(
		   'TenXe' => $tenxe ,
		   'NamSx' => $namsx ,
		   'Bienso' => $bienso ,
		   'MauXe' => $mauxe ,
		   'UrlHinh' => $urlhinh ,
		   'Mota' => $mota ,
		   'Gia' => $gia ,
		   'IDLoaixe' => $loaixe ,
		   'IDHangxe' => $hangxe 
		);
		
		$this->db->insert('chitietxe', $data); 
	}
	public function get_list_xe($limit, $start)
	{   
		$this->db->select('IDchitietxe, TenXe, NamSx, Bienso, MauXe, UrlHinh, Gia');	
		$this->db->limit($limit, $start);
		$this->db->order_by('IDchitietxe', 'DESC');       
		$query = $this->db->get('chitietxe');	
		return $query->result();
	}
	
	
	private function get_images_xe($id)
	{
		$this->db->select('IDchitietxe, UrlHinh');
		$this->db->where('IDchitietxe',$id);	
		$this->db->limit(1);	
		$query = $this->db->get('chitietxe');			
		if($query->num_rows()>0){
			$data = $query->row_array();				
			return $data;
		}
	}
	public function xoatatcaxe($items, $path)
	{
		foreach($items as $value){
			$data = $this->get_images_xe($value);
			if(!empty($data['UrlHinh'])){
				$file = $path ."/upload/xe/" . $data['UrlHinh']; 
				@unlink($file);
			}
			$this->db->where('IDchitietxe', $value);
			$this->db->delete('chitietxe');
		}
		return true;			
	}
	public function xoaxe($id, $path)
	{
		$data = $this->get_images_xe($id);
		if(!empty($data['UrlHinh'])){
			$file = $path ."/upload/xe/" . $data['UrlHinh']; 
			unlink($file);
		}
		$this->db->where('IDchitietxe', $id);
		return $this->db->delete('chitietxe'); 			
	}
	
	
	public function luu_capnhatxe($id,$tenxe,$namsx,$bienso,$mauxe,$urlhinh,$mota,$gia,$loaixe,$hangxe)
	{
		$data = array(
		   'TenXe' => $tenxe ,
		   'NamSx' => $namsx ,
		   'Bienso' => $bienso ,
		   'MauXe' => $mauxe ,
		   'UrlHinh' => $urlhinh ,
		   'Mota' => $mota ,
		   'Gia' => $gia ,
		   'IDLoaixe' => $loaixe ,
		   'IDHangxe' => $hangxe 
		);
		$this->db->where('IDchitietxe', $id);
		$this->db->update('chitietxe', $data); 
	}
	
	public function capnhatxe($id)
	{
		$this->db->select('*');
		$this->db->where('IDchitietxe',$id);		
		$query = $this->db->get('chitietxe');			
		return  $query->result();
	}	
	
  
}