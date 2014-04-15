<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sendmail extends MX_Controller {

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
		
		
		/****************************************
			Bat hàm extension=php_openssl.dll trong file php extensions 			
			
			http://ellislab.com/codeigniter/user-guide/libraries/email.html
		****************************************/
		$this->load->library('email');
		
		
        
    }
	public function index()
	{
            
           $this->template->build('sendmail');
           
           
	}
	
	public function sendMail_lienhe($send_email,$send_name,$send_subject,$send_message)
	{

		$this->email->clear();		
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "web.xedulich@gmail.com"; 
		$config['smtp_pass'] = "xedulich@123";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$this->email->initialize($config);	
		
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
     
	 
	 public function sendMail_dangky($send_email,$send_name,$send_subject,$send_message)
	{
		/*$send_email = "loi.huynh@dmmt.vn";
		$send_name = "nghĩa";
		$send_subject ="tradvg";
		$send_message ="test";*/
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
		
		$this->email->from($send_email, $send_name);
		$this->email->to($send_email);
		
		$list_bcc = array('nghia.tran@pinetech.vn','nghia.tran@dmmt.vn');
		//$this->email->cc('another@another-example.com');
		$this->email->bcc($list_bcc); 
		
		$this->email->reply_to($send_email, $send_name);
		$this->email->subject($send_subject);
		
		$data['u_name'] = $send_name;
		$data['u_pass'] = $send_message;
		
		$get_html = $this->load->view('sendmail_dangky',$data,TRUE);
		//var_dump($get_html);exit;


		// this will return you html data as message
    	$this->email->message($get_html);
		//$this->email->message($send_message);		
		
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