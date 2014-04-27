<?php
class Model_tintuc extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	public function themchitiettintuc($tentin,$tomtattin,$noidungtin,$urlhinh,$anhien,$hot,$ngaypost,$userpost)
	{
		$data = array(
		   'TieuDe' =>	$tentin ,
		   'TomTat' =>	$tomtattin ,
		   'NoiDung' =>	$noidungtin ,
		   'UrlHinh' =>	$urlhinh ,
		   'AnHien' =>	$anhien ,
		   'Hot' =>	$hot,
		   'NgayThang' =>	$ngaypost,
		   'User' =>	$userpost
		);
		$this->db->insert('tintuc', $data); 
	}

	public function get_total_tintuc()
	{   
		return $this->db->count_all('tintuc');		
	}
	public function get_list_tintuc($limit, $start)
	{   
		$this->db->select('id_tin, TieuDe, UrlHinh, DATE_FORMAT(NgayThang, "%d-%m-%Y") as NgayThang, AnHien, Hot', FALSE);	
		$this->db->limit($limit, $start);
		$this->db->order_by('id_tin', 'DESC');       
		$query = $this->db->get('tintuc');	
		return $query->result_object();
	}
	private function get_images_tintuc($id)
	{
		$this->db->select('id_tin, UrlHinh');
		$this->db->where('id_tin',$id);	
		$this->db->limit(1);	
		$query = $this->db->get('tintuc');			
		if($query->num_rows()>0){
			$data = $query->row_array();				
			return $data;
		}
	}
	public function xoatatcatintuc($items, $path)
	{
		foreach($items as $value){
			$data = $this->get_images_tintuc($value);
			if(!empty($data['UrlHinh'])){
				$file = $path ."/upload/tintuc/" . $data['UrlHinh']; 
				@unlink($file);
			}
			$this->db->where('id_tin', $value);
			$this->db->delete('tintuc');
		}
		return true;			
	}
	public function xoatintuc($id, $path)
	{
		$data = $this->get_images_tintuc($id);
		if(!empty($data['UrlHinh'])){
			$file = $path ."/upload/tintuc/" . $data['UrlHinh']; 
			unlink($file);
		}
		$this->db->where('id_tin', $id);
		return $this->db->delete('tintuc'); 			
	}
	
	
	public function luu_capnhattintuc($id,$tentin,$tomtattin,$noidungtin,$urlhinh,$anhien,$hot,$userpost)
	{
		$data = array(
		   'TieuDe' 	=>	$tentin ,
		   'TomTat' 	=>	$tomtattin ,
		   'NoiDung' 	=>	$noidungtin ,
		   'UrlHinh' 	=>	$urlhinh ,
		   'AnHien' 	=>	$anhien ,
		   'Hot' 		=>	$hot,
		   'User' 		=>	$userpost
		);
		$this->db->where('id_tin', $id);
		$this->db->update('tintuc', $data); 
	}
	
	public function capnhattintuc($id)
	{
		$this->db->select('*');
		$this->db->where('id_tin',$id);		
		$query = $this->db->get('tintuc');			
		return  $query->result();
	}	
}