<?php
class Model_tintuc extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	
	
	
	public function themchitiettintuc( $tentin,$tomtattin,$noidungtin,$urlhinh,$anhien,$hot)
	{
		$data = array(
		   'TieuDe' =>	$tentin ,
		   'TomTat' =>	$tomtattin ,
		   'NoiDung' =>	$noidungtin ,
		   'UrlHinh' =>	$urlhinh ,
		   'AnHien' =>	$anhien ,
		   'Hot' =>	$hot 
		);

		$this->db->insert('tintuc', $data); 
	}
	
		
	
	
  
}