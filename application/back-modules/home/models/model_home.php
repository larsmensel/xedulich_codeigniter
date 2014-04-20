<?php
class Model_home extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	
	
	
	public function get_thongtin_user($ss_user_name)
	{
		$query = $this->db->get_where('user', array('username' => $ss_user_name));
		return  $query->result();
	}
	
		
	
	public function login($username,$password)
	{
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		
		$query=$this->db->get("user");
		if($query->num_rows()>0)
		{
		 foreach($query->result() as $rows)
		 {
		  //add all data to session
		  $newdata = array(
			'user_name'		=> $rows->username,
			'user_email'    => $rows->email,
			'logged_in'		=> TRUE
		  );
		 }
		 $this->session->set_userdata($newdata);
		 return true;
		}
		return false;
	}
  
}