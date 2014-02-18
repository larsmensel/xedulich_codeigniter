<?php
class Model_home extends CI_Model{
	public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("chitietxe");
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
   
  public function chitietxe_thue($id){ 
   		
    	//$this->db->select('l.IDThue,l.TenThue,lx.IDThue,lx.IDXe,cx.IDchitietxe, cx.TenXe, cx.NamSx, cx.Bienso, cx.Mota, cx.IDLoaixe,cx. IDHangxe');       
		$this->db->select('*');        		
		$this->db->join('chitietxe', 'chitietxe.IDchitietxe=loaithue_ctxe.IDXe');	
		$this->db->where('loaithue_ctxe.IDThue',$id);		       
		$query = $this->db->get('loaithue_ctxe');
		//result_object
		return  $query->result_array(); 
  }
  
  /* the loai thue xe */
  public function get_id_loaichothue($id){ 
   		     
		$query = $this->db->get_where('loaichothue', array('IDThue' => $id));
		//result_object
		return  $query->result_array(); 
  }  
  
  public function chitietxe_thue_all($id){ 
   		
    	//$this->db->select('l.IDThue,l.TenThue,lx.IDThue,lx.IDXe,cx.IDchitietxe, cx.TenXe, cx.NamSx, cx.Bienso, cx.Mota, cx.IDLoaixe,cx. IDHangxe');       
		$this->db->select('*');        		
		$this->db->join('chitietxe', 'chitietxe.IDchitietxe=loaithue_ctxe.IDXe');	
		$this->db->where('loaithue_ctxe.IDThue',$id);		       
		$query = $this->db->get('loaithue_ctxe');
		//result_object
		return  $query->result_array(); 
  }
  
  public function record_count_loai($id) {
/*	  	$query = $this->db->get_where('loaithue_ctxe', array('IDThue' => $id));		       
        echo $query->num_rows();exit;*/
		
		$this->db->like('IDThue', $id);
		$this->db->from('loaithue_ctxe');
		echo $this->db->count_all_results();exit();
  }
  
  /* end the loai thue xe */
  
}