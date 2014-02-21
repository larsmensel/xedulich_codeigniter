<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
         * 
	 */
    public function __construct() {
        parent::__construct();
		$this->load->model('model_user');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');	
		
		
		
		$this->lang->load('form_validation','vietnamese');	
		//form_validation->ten file language/vietnamese/form_validation_lang.php
		//vietnamese -> ten thu muc chua language/vietnamese
		
		$this->form_validation->set_error_delimiters('<div class="error-form">', '</div>');
		// link thu vien http://ellislab.com/codeigniter%20/user-guide/libraries/form_validation.html#validationrules
        
    }
	public function index()
	{
		/*$session_id = $this->session->userdata('user_name');
		echo $session_id;*/
		if(($this->session->userdata('user_name')!=""))
		{
			$this->thongtin_canhan();
		}
		else{
			$data['title']= 'Đăng nhập';
			$data['error_signin']= '';
			$this->template->build('signin',$data);
		}
	}
	public function thongtin_canhan()
	{
			$data['title']= 'Thông tin cá nhân';
			$this->template->build('thongtin_canhan',$data);
	}
	public function dangnhap()
	{
		$data['error_signin']= '';
		
		$login_user_name=$this->input->post('user_name');
		$login_password=md5($this->input->post('password'));
		//var_dump($password);exit();
		
		$result=$this->model_user->login($login_user_name,$login_password);
		
		if($this->form_validation->run('signin') == FALSE)
		{
			$this->index();
		}
		else
		{
			if($result) $this->thongtin_canhan();
			else {
				$data['title']= 'Đăng nhập';
				$data['error_signin']= 'Tên đăng nhập hoặc mật khẩu không đúng';
				$this->template->build('signin',$data);
			}
		}
	}
	public function dangky_thanhcong()
	{
		$data['title']= 'Đăng ký thành công';
		$this->template->build('dangky_thanhcong',$data);
	}
	public function dangky()
	{		
		/*$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[12]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required_pass|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');*/		
		
		
		if($this->form_validation->run('signup') == FALSE)
		{
			$data['title']= 'Đăng ký';
			$this->template->build('signup',$data);
		}
		else
		{
			$this->model_user->add_user();
			$this->dangky_thanhcong();
		}
	}
	public function thoat()
	{
		$newdata = array(
		'user_name'		=>'',
		'user_email'	=> '',
		'logged_in'		=> FALSE,
		);
		$this->session->unset_userdata($newdata );
		$this->session->sess_destroy();
		$this->index();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */