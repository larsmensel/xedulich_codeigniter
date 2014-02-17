<?php
class Model_home extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all_chitietxe("chitietxe");
    }
 
    public function fetch_chitietxe($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("chitietxe");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function get_chitietxe($id) {        
       $query = $this->db->get_where('chitietxe', array('IDchitietxe' => $id));
	   return $query->result();   
   }
   
  public function get_loaithue(){
	  $this->db->select('IDThue, TenThue');    	
	  $query = $this->db->get('loaichothue');
	  return $query->result_array(); 
  }
   
   function chitietxe_thue($id){ 
   		
    	//$this->db->select('l.IDThue,l.TenThue,lx.IDThue,lx.IDXe,cx.IDchitietxe, cx.TenXe, cx.NamSx, cx.Bienso, cx.Mota, cx.IDLoaixe,cx. IDHangxe');       
		$this->db->select('*');        		
		$this->db->join('chitietxe', 'chitietxe.IDchitietxe=loaithue_ctxe.IDXe');	
		$this->db->where('loaithue_ctxe.IDThue',$id);		       
		$query = $this->db->get('loaithue_ctxe');
		//result_object
		return  $query->result_array(); 
    }
}