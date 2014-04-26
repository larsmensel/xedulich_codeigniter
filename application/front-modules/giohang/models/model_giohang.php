<?php
class Model_giohang extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	function chitiet_xe($id){
		$query = $this->db->get('chitietxe');
		$query = $this->db->get_where('chitietxe', array('IDchitietxe' => $id));
		return $query->result(); // Return the results in a array.
	} 
	
	
	
	public function add_giohang($TenKH,$SDT,$Email,$TenXe,$NgayDat,$NgayThue,$SoNgay,$Tu,$Den,$TongTien,$MaDH)
	{
		$data=array(
			'TenKH'		=>$TenKH,
			'SDT'		=>$SDT,
			'Email'		=>$Email,
			'TenXe'		=>$TenXe,
			'NgayDat'	=>$NgayDat,
			'NgayThue'	=>$NgayThue,
			'SoNgay'	=>$SoNgay,
			'Tu'		=>$Tu,
			'Den'		=>$Den,
			'TongTien'	=>$TongTien,
			'MaDH'		=>$MaDH
			);
		$this->db->insert('donhang',$data);
		$newdata = array(
			'MaDH'	=>	$MaDH
		);
		$this->session->set_userdata($newdata);
	}

  
}