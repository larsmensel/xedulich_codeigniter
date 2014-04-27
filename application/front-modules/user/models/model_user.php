<?php
class Model_user extends CI_Model{
	public function __construct() {
        parent::__construct();
    } 
	public function add_user()
	{
		$data=array(
		  'TenKH'=>$this->input->post('user_name'),
		  'Email'=>$this->input->post('email_address'),
		  'PWord'=>md5($this->input->post('password'))
		);
		$this->db->insert('khachhang',$data);
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
               'DiaChi' => $this->input->post('DiaChi'),
               'SoDT' => $this->input->post('SoDT')
        		);				

		$this->db->where('TenKH', $ss_user_name);
		$this->db->update('khachhang', $data); 
		$newdata = array(
					'thongbaokq' => '<div class="error-form">Cập nhật thành công</div>'
				);
		$this->session->set_userdata($newdata);

	}
	
	public function change_pass($ss_user_name)
	{
		$data = array(
			   'PWord'=>md5($this->input->post('password_new'))
        		);				

		$this->db->where('TenKH', $ss_user_name);
		$this->db->update('khachhang', $data); 

	}
	
	
	public function get_thongtin_user($ss_user_name)
	{
		$query = $this->db->get_where('khachhang', array('TenKH' => $ss_user_name));
		return  $query->result();
	}
	
		
	
	public function login($username,$password)
	{
		$this->db->where("TenKH",$username);
		$this->db->where("PWord",$password);
		
		$query=$this->db->get("khachhang");
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