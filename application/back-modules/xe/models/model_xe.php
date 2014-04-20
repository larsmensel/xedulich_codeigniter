<?php
class Model_xe extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	
	
	
	public function themchitietxe($tenxe,$namsx,$bienso,$mauxe,$hinhanh,$mota,$gia,$loaixe,$hangxe)
	{
		$data = array(
		   'TenXe' => $tenxe ,
		   'NamSx' => $namsx ,
		   'Bienso' => $bienso ,
		   'MauXe' => $mauxe ,
		   'UrlHinh' => $hinhanh ,
		   'Mota' => $mota ,
		   'Gia' => $gia ,
		   'IDLoaixe' => $loaixe ,
		   'IDHangxe' => $hangxe 
		);
		
		$this->db->insert('chitietxe', $data); 
		

	}
	
	
  
}