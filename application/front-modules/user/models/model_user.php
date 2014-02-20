<?php
class Model_user extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	public function add_user()
	{
		$data=array(
		  'username'=>$this->input->post('user_name'),
		  'email'=>$this->input->post('email_address'),
		  'password'=>md5($this->input->post('password'))
		);
		$this->db->insert('user',$data);
	}
	
	public function login($email,$password)
	{
		$this->db->where("email",$email);
		$this->db->where("password",$password);
		
		$query=$this->db->get("user");
		if($query->num_rows()>0)
		{
		 foreach($query->result() as $rows)
		 {
		  //add all data to session
		  $newdata = array(
			'ss_user_id'  => $rows->id,
			'ss_user_name'  => $rows->username,
			'ss_user_email'    => $rows->email,
			'ss_logged_in'  => TRUE,
		  );
		 }
		 $this->session->set_userdata($newdata);
		 return true;
		}
		return false;
	}
  
}