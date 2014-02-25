<?php
class Model_captcha extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	public function saveData($data){
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);	
	}  
	
	public function b_fCheck($the_sz_Captcha) { 
		// Xóa các captcha cũ đi 
		$expiration = time()-7200; 	// Giới hạn là 2 tiếng 
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); // Kiểm tra captcha nhập vào có tồn tại hay không: 
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($the_sz_Captcha, $this->input->ip_address(), $expiration); //$the_sz_Captcha = $_POST['captcha']
		$query = $this->db->query($sql, $binds);
		$row = $query->row(); 
		if ($row->count == 0) { 
			return false; 
		} else { 
			return true; 
		} 
	}
	
	
	
	
	
	
	
	
	
}