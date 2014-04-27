<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



//ko su dung file nay

class Sendmail extends MX_Controller{ // nho them extends MX_Controller http://ellislab.com/codeigniter/user-guide/general/creating_libraries.html

    public function sendmail_template()
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
		
		/*$send_email = $this->input->post('email');
		$send_name = $this->input->post('name');
		$send_subject = $this->input->post('tieude');
		$send_message = $this->input->post('noidung');	*/
		
		$send_email = 'test@yahoo.com';
		$send_name = 'test';
		$send_subject = 'Tieu de';
		$send_message = 'Noi dung';	
		
		$this->email->from($send_email, $send_name);
		$list = array('thanhthanhspk36@gmail.com','kimthinh1211@gmail.com');
		$this->email->to($list);
		$this->email->reply_to($send_email, $send_name);
		$this->email->subject($send_subject);
		
		
		
		$this->load->library('parser');

		$data = array(
              'blog_title'   => 'My Blog Title',
              'blog_heading' => 'My Blog Heading',
              'blog_entries' => array(
                                      array('title' => 'Title 1', 'body' => 'Body 1'),
                                      array('title' => 'Title 2', 'body' => 'Body 2'),
                                      array('title' => 'Title 3', 'body' => 'Body 3'),
                                      array('title' => 'Title 4', 'body' => 'Body 4'),
                                      array('title' => 'Title 5', 'body' => 'Body 5')
                                      )
            );

		$get_html = $this->parser->parse('aaaa',$data,TRUE); 
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