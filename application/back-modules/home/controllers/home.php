<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

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
		$this->load->model('model_home');
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
		
		
		
		if(($this->session->userdata('admin_logged_in'))==false)
		{
			$data['error_signin']= '';
            $this->load->view('login',$data);
		}
		else
		{
           $this->thanhcong();
		}   
	}
	
	public function thanhcong()
	{
		$data['title'] = 'Quản lý';
		$this->template->build('home',$data);
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
	
	public function dangnhap()
	{
		$data['error_signin']= '';
		
		$login_user_name=$this->input->post('user_name');
		$login_password=md5($this->input->post('password'));
		//var_dump($password);exit();

		if($this->form_validation->run('admin_signin') == FALSE) //kiem tra xem co nhap du lieu k, chua xet dung sai so voi database
		// If chua nhap text vao the input trong form thi goi lai function "index"
		{
			$this->index();
		} 
		
		// if user nhap vao day du the input thi tiep tuc xly ham ben duoi
		else
		{
			$result=$this->model_home->login($login_user_name,$login_password);
			if($result){ 
			//input dung voi csdl
				$this->thanhcong();
			}
			else {
				
				$data['error_signin']= '<div class="error-form">Tên đăng nhập hoặc mật khẩu không đúng</div>';
				 $this->load->view('login',$data);
			}
		}
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */