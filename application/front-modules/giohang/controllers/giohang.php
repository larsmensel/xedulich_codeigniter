<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giohang extends MX_Controller {

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
		$this->load->helper(array('form', 'url'));
        //http://code.tutsplus.com/tutorials/how-to-build-a-shopping-cart-using-codeigniter-and-jquery--net-8187
		
		//https://www.youtube.com/watch?v=xk5w4oTM0ng
		

		$this->load->library('form_validation');	
		
		$this->lang->load('form_validation','vietnamese');	
		//form_validation->ten file language/vietnamese/form_validation_lang.php
		//vietnamese -> ten thu muc chua language/vietnamese
		
		$this->form_validation->set_error_delimiters('<div class="error-form">', '</div>');
		// link thu vien http://ellislab.com/codeigniter%20/user-guide/libraries/form_validation.html#validationrules
		
	}
	/*public function Cart()
    {
        parent::Controller(); // We define the the Controller class is the parent. 
    }*/
    public function index()
    {
    	$data['title'] = 'Đặt xe';		
		$this->load->module('captcha');	
		
		
		
		
		if($this->form_validation->run('xacnhan_giohang') == FALSE)
		{
			// xóa hình captcha cũ
			$this->load->captcha->deleteImage();
			$data['image_captcha'] = $this->load->captcha->_tao_captcha();			
			$this->template->build('giohang',$data);
		}
		else
		{
			$captcha = $this->input->post('captcha');
			$this->session->set_userdata('loi_captcha', '');				
			
			if(($this->load->captcha->kiemtra($captcha))){
				// xóa hình captcha cũ
				$this->load->captcha->deleteImage();
				$this->datxe_thanhcong();
			}
			else{
				$this->session->set_userdata('loi_captcha', '<div class="error-form">Mã xác nhận không đúng</div>');
				// xóa hình captcha cũ
				$this->load->captcha->deleteImage();
				$data['image_captcha'] = $this->load->captcha->_tao_captcha();
				
				$this->template->build('giohang',$data);
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
		$cart = $this->cart->contents();
		//var_dump($cart);exit();
		foreach($cart as $item){	
			$options = $this->cart->product_options($item['rowid']);				
			$send_email = $options['kh_email'];
			$send_name = $options['kh_name'];
		}
		$send_subject = 'Đặt xe thành công';
		$send_message = "'Mã đơn hàng của bạn là: ".$this->session->userdata('MaDH')."'";		
		
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
	
	public function datxe_thanhcong()
    {
    	$data['title'] = 'Đặt xe';		
		$this->load->model('model_giohang');
		
		if($cart = $this->cart->contents()){
			$TongTien = $this->cart->total();			
			//var_dump($cart);			
			foreach($cart as $item){	
				$TenXe = $item['name'];
				$SoNgay = $item['qty'];
				$Gia = $item['price'];
				$NgayDat = date('d-m-Y');		
	
				$options = $this->cart->product_options($item['rowid']);				
				$TenKH 		= 	$options['kh_name'];
				$SDT 		= 	$options['kh_phone'];
				$Email 		= 	$options['kh_email'];
				$NgayThue 	= 	$options['ngay_thue'];
				$Tu 		= 	$options['di_tu'];
				$Den 		= 	$options['di_den'];				
				$MaDH		=	time();
				
			}//end foreach			
			
			$this->model_giohang->add_giohang($TenKH,$SDT,$Email,$TenXe,$NgayDat,$NgayThue,$SoNgay,$Tu,$Den,$TongTien,$MaDH);			
			$this->template->build('thanhcong', $data);
			$this->sendMail();
			$this->cart->destroy();
			
			
		}else{
			$this->template->build('giohang_rong', $data);	
		} 
    }
	
	
	public function datxe()
    {
    	$data['title'] = 'Đặt xe';
    	if ($this->uri->segment(3) === FALSE){show_404();$idxe = 0;}
    	else{$idxe = $this->uri->segment(3);}
    	//echo $idxe;exit;
    	$this->load->model('model_giohang');
    	$data["results"] = $this->model_giohang->chitiet_xe($idxe);
    	
    	$this->template->build('datxe', $data);	
    }
	
	
	
	
    public function add()
    {
		$data['title'] = 'Đặt xe';
		$this->load->model('model_giohang');
		if($this->form_validation->run('datxe_form') == FALSE)
		{			
			$data["results"] = $this->model_giohang->chitiet_xe($this->input->post('idxe'));			
			$this->template->build('datxe', $data);	
		}
		else{
			if($this->cart->contents()){
				$this->cart->destroy();
			}
			
			$data['title'] = 'Đặt xe';
			
			//Lây thông tin giỏi hàng mới
			if($this->input->post('idxe')){
				
				//phan khach hang 
				$kh_name	=	$this->input->post('kh_name');
				$kh_phone	=	$this->input->post('kh_phone');
				$kh_email	=	$this->input->post('kh_email');
				
				//phan xe
				$id_xe		=	$this->input->post('idxe');
				$ngay_thue	=	$this->input->post('infromdate');
				$so_ngay	=	$this->input->post('qty');
				$di_tu		=	$this->input->post('infrom');
				$di_den		=	$this->input->post('into');
				
				
				$xe = $this->model_giohang->chitiet_xe($id_xe);
				
				foreach($xe as $x){
					$Gia = $x->Gia;
					$TenXe = $x->TenXe;
				}
				//print_r($xe);
				
				$them_giohang = array(
					'id'		=> $id_xe,
					'qty'		=> $so_ngay,
					'price'		=> $Gia,
					'name'		=> $TenXe,
					'options'	=> array(
						'kh_name'	=>	$kh_name,
						'kh_phone'	=>	$kh_phone,
						'kh_email'	=>	$kh_email,
						'ngay_thue'	=>	$ngay_thue,
						'di_tu'		=>	$di_tu,
						'di_den'	=>	$di_den
						)
					);
				
				$this->cart->insert($them_giohang); 
			}//end if 
			
			redirect('giohang');
		}
		//xóa giỏ hàng cũ trước
		

		
	}

	public function update(){
		$data = array(
			array(
				'rowid'   => $this->input->post('rowid'),
				'qty'     => $this->input->post('qty')
				)
			);
		echo 'update() thuc hien';
		$this->cart->update($data);
		echo '<pre>'.$this->input->post('infrom');
		print_r($this->cart->contents());
	}

	

	public function remove($rowid){
		$data = array(
			array(
				'rowid'   => $rowid,
				'qty'     => 0
				)
			);
		//echo 'remove() thuc hien';
		$this->cart->update($data);
		redirect('giohang');
	}
	
	public function total(){
		echo $this->cart->total();
		
	}
	public function destroy(){
		$this->cart->destroy();		
	}
	public function show(){
		$giohang = $this->cart->contents();
		echo '<pre>';
		print_r($giohang);
	}    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */