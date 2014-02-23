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
		$newdata = array(
			'user_name'		=>$this->input->post('user_name'),
			'user_email'	=>$this->input->post('email_address'),
			'logged_in'		=> TRUE
		);
		$this->session->set_userdata($newdata);
	}
	
	
	public function update_user($ss_user_name)
	{
		$data = array(
               'HoTen' => $this->input->post('HoTen'),
               'DiaChi' => $this->input->post('DiaChi'),
               'SDT' => $this->input->post('SDT')
        		);				

		$this->db->where('username', $ss_user_name);
		$this->db->update('user', $data); 
		$newdata = array(
					'thongbaokq' => '<div class="error-form">Cập nhật thành công</div>'
				);
		$this->session->set_userdata($newdata);

	}
	
	public function change_pass($ss_user_name)
	{
		$data = array(
			   'password'=>md5($this->input->post('password_new'))
        		);				

		$this->db->where('username', $ss_user_name);
		$this->db->update('user', $data); 

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