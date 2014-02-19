<?php
class Model_category extends CI_Model{
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
  
  /* the loai thue xe & chitietxe theo loai thue xe*/
  public function count_chitietxe_loaithue($id) {	  
	  $this->db->like('IDThue', $id);
	  $this->db->from('loaithue_ctxe');
	  return $this->db->count_all_results();
  }

  public function fetch_chitietxe_loaithue($id,$limit, $page) {
	  //$query = $this->db->get('mytable', 10, 20);
	  // Produces: SELECT * FROM mytable LIMIT 20(bat dau), 10(gioi han) (in MySQL. Other databases have slightly different syntax)

	  $this->db->select('*');        		
	  $this->db->join('chitietxe', 'chitietxe.IDchitietxe=loaithue_ctxe.IDXe');	
	  $this->db->where('loaithue_ctxe.IDThue',$id);		       
	  $query = $this->db->get('loaithue_ctxe',$limit,$page);  
	  if ($query->num_rows() > 0) {
		  foreach ($query->result() as $row) {
			  $data[] = $row;
		  }
		  return $data;
	  }
	  return false;
 }
  /* end the loai thue xe */
  
}