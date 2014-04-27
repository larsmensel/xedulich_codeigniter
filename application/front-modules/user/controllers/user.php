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
		if(($this->session->userdata('logged_in'))==true)
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
		if(($this->session->userdata('logged_in'))==true)
		{
			$data['title']= 'Thông tin cá nhân';
			$ss_user_email = $this->session->userdata('user_email');				
			$data['results_user'] = $this->model_user->get_thongtin_user($ss_user_email);
			if($this->input->post('btn_capnhat_user')!=''){
				$this->model_user->update_user($ss_user_email);
				$this->template->build('thongtin_canhan',$data);
			}
			else{
				$this->template->build('thongtin_canhan',$data);
			}				
		}
		else{
			$data['title']= 'Đăng nhập';
			$data['error_signin']= '';
			$this->template->build('signin',$data);
		}
	
	}
	
	public function doimatkhau()
	{		
		if(($this->session->userdata('logged_in'))==true)
		{
			$data['title']= 'Đổi mật khẩu';
			$data['error_pass'] = '';
			$ss_user_email = $this->session->userdata('user_email');				
			$lay_passold = $this->model_user->get_thongtin_user($ss_user_email);
			foreach($lay_passold as $row_passold){
				$pass_old = $row_passold->PWord;
			}	
			
			if($this->form_validation->run('doimatkhau') == FALSE)
			{
				$this->template->build('doi_matkhau',$data);
			}
			else
			{
				$passold_in=md5($this->input->post('password_old'));
				if($passold_in == $pass_old){
					$this->model_user->change_pass($ss_user_email);
					
					
					$newdata = array(
						'thongbaokq' => '<div class="error-form">Đổi mật khẩu thành công</div>'
					);
					$this->session->set_userdata($newdata);
					$this->thongtin_canhan();
				}
				else{
					$data['error_pass'] = '<div class="error-form">Mật khẩu cũ không đúng</div>';
					$this->template->build('doi_matkhau',$data);
				}
			}
		}
		else{
			$data['title']= 'Đăng nhập';
			$data['error_signin']= '';
			$this->template->build('signin',$data);
		}
	
	}
	
	public function dangnhap()
	{
		$data['error_signin']= '';
		
		$login_email=$this->input->post('email');
		$login_password=md5($this->input->post('password'));
		//var_dump($password);exit();
		
		$result=$this->model_user->login($login_email,$login_password);
		
		if($this->form_validation->run('signin') == FALSE)
		{
			$this->index();
		}
		else
		{
			if($result) $this->thongtin_canhan();
			else {
				$data['title']= 'Đăng nhập';
				$data['error_signin']= '<div class="error-form">Email hoặc mật khẩu không đúng</div>';
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
		$this->load->module('captcha');	
			
	
		if(($this->session->userdata('logged_in'))==true)
		{
			$this->thongtin_canhan();
		}
		else{
			if($this->form_validation->run('signup') == FALSE)
			{
				$data['title']= 'Đăng ký';
				
				// xóa hình captcha cũ
				$this->load->captcha->deleteImage();
				$data['image_captcha'] = $this->load->captcha->_tao_captcha();
				
				$this->template->build('signup',$data);
			}
			else
			{
				$captcha = $this->input->post('captcha');
				$this->session->set_userdata('loi_captcha', '');				
				
				if(($this->load->captcha->kiemtra($captcha))){								
						
						// xóa hình captcha cũ
						$this->load->captcha->deleteImage();
						$data['image_captcha'] = $this->load->captcha->_tao_captcha();
						
						$this->model_user->add_user();
						$this->dangky_thanhcong();
					}
					else{
						
						$this->session->set_userdata('loi_captcha', '<div class="error-form">Mã xác nhận không đúng</div>');
						// xóa hình captcha cũ
						$this->load->captcha->deleteImage();
						$data['image_captcha'] = $this->load->captcha->_tao_captcha();
						
						$this->template->build('signup',$data);
					}
										
			}
		}
	}
	
	
	
	public function sendMail()
	{
		
		/****************************************
			Bat hàm extension=php_openssl.dll trong file php extensions			
			http://ellislab.com/codeigniter/user-guide/libraries/email.html
		****************************************/

		$this->load->library('email');
		$this->email->clear();	
		
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "web.xedulich@gmail.com"; 
		$config['smtp_pass'] = "xedulich@123";
		$config['mailtype'] = "html";
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n";
		
		$this->email->initialize($config);
		
		$send_email = $this->input->post('email');
		$send_name = $this->input->post('name');
		$send_subject = $this->input->post('tieude');
		$send_message = $this->input->post('noidung');		
		
		$this->email->from($send_email, $send_name);
		$list = array('thanhthanhspk36@gmail.com','kimthinh1211@gmail.com');
		$this->email->to($list);
		$this->email->reply_to($send_email, $send_name);
		$this->email->subject($send_subject);
		$this->email->message($send_message);		
		
		if($this->email->send())
		{
			$newdata = array('thongbaokq' => '<div class="error-form">Email đã được gửi thành công</div>');
			$this->session->set_userdata($newdata);
		}
		else
		{
			$newdata = array('thongbaokq' => '<div class="error-form">Có lỗi xảy ra trong quá trình gửi mail</div>');
			$this->session->set_userdata($newdata);
			//show_error($this->email->print_debugger());
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