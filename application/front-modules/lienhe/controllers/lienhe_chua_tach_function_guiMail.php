<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lienhe extends MX_Controller {

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
		//$this->load->library('email');
		
		//gọi controller captcha
		$this->load->module('captcha');	
		
        
    }
	public function index()
	{		

			$data['title']= 'Liên hệ';
			$this->load->model('model_lienhe');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');	
			
			$this->lang->load('form_validation','vietnamese');	
			//form_validation->ten file language/vietnamese/form_validation_lang.php
			//vietnamese -> ten thu muc chua language/vietnamese			
			
			$this->form_validation->set_error_delimiters('<div class="error-form">', '</div>');
			
			if($this->form_validation->run('lienhe') == FALSE) //kết quả trả về sai
			{								
				// xóa hình captcha cũ
				$this->load->captcha->deleteImage();
				$data['image_captcha'] = $this->load->captcha->_tao_captcha();
				$this->template->build('lienhe',$data);
			}
			else //kết quả trả về đúng
			{
				if($this->input->post('btn_lienhe')!=''){	//kiểm tra user có bấm nút submit hay ko (có bấm)				
				
					$captcha = $this->input->post('captcha');
					$this->session->set_userdata('loi_captcha', '');
					
					//kiểm tra mã captcha nhập đúng hay không ($this->load->captcha->kiemtra($captcha)==true)	
					if(($this->load->captcha->kiemtra($captcha))){ 	
					
					
						//gửi Mail
						$this->sendMail();						
						
						// xóa hình captcha cũ
						$this->load->captcha->deleteImage();
						$data['image_captcha'] = $this->load->captcha->_tao_captcha();
						
						$this->template->build('lienhe',$data);
					}
					else{
						
						$this->session->set_userdata('loi_captcha', '<div class="error-form">Mã xác nhận không đúng</div>');
						// xóa hình captcha cũ
						$this->load->captcha->deleteImage();
						$data['image_captcha'] = $this->load->captcha->_tao_captcha();
						$this->template->build('lienhe',$data);
					}								
					
				}
				else{
					// xóa hình captcha cũ
					$this->load->captcha->deleteImage();
					$data['image_captcha'] = $this->load->captcha->_tao_captcha();
					$this->template->build('lienhe',$data);
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
		$config['newline'] = "\r\n";
		
		$this->email->initialize($config);
		
		$send_email = $this->input->post('email');
		$send_name = $this->input->post('name');
		$send_subject = $this->input->post('tieude');
		$send_message = $this->input->post('noidung');		
		
		$this->email->from($send_email, $send_name);
		$list = array('nghia.tran@pinetech.vn','nghia.tran@dmmt.vn');
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
	
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */