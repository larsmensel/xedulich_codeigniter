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
						$send_email = $this->input->post('email');
						$send_name = $this->input->post('name');
						$send_subject = $this->input->post('tieude');
						$send_message = $this->input->post('noidung');
						
						$this->load->module('sendmail');
						$this->load->sendmail->sendMail_lienhe($send_email,$send_name,$send_subject,$send_message);					
						
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */