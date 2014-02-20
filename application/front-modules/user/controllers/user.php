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
	{	$data['title']='Đăng ký';
		
		if($this->form_validation->run('signup') == FALSE)
		{
		 	$this->template->build('signup',$data);
		}
		else
		{
		 $this->model_user->add_user();
		 $this->formsuccess();
		}
	}
	
	public function login()
	{
		$data['title']='Đăng ký thành công';
		$email=$this->input->post('user_name');
		$password=md5($this->input->post('password'));
		
		$result=$this->model_user->login($email,$password);
		if($result) {$this->template->build('formsuccess',$data);}
		else        {$this->template->build('signin',$data);}
	}
	
	public function formsuccess()
	{
		$data['title']='Đăng ký thành công';
		$this->load->view('formsuccess',$data);
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */