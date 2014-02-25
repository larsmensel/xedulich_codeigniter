<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends MX_Controller {

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
		
		//http://ellislab.com/codeigniter/user-guide/helpers/captcha_helper.html
		//http://thuthuatvietnam.com/su-dung-captcha-helper-tren-codeigniter.html
		
		
		$this->load->helper(array('form', 'url','captcha','file'));
		$this->load->library('form_validation');	
		
		$this->lang->load('form_validation','vietnamese');	
		//form_validation->ten file language/vietnamese/form_validation_lang.php
		//vietnamese -> ten thu muc chua language/vietnamese
		
		$this->form_validation->set_error_delimiters('<div class="error-form">', '</div>');

		/**************************
		CREATE TABLE captcha (
		 captcha_id bigint(13) unsigned NOT NULL auto_increment,
		 captcha_time int(10) unsigned NOT NULL,
		 ip_address varchar(16) default '0' NOT NULL,
		 word varchar(20) NOT NULL,
		 PRIMARY KEY `captcha_id` (`captcha_id`),
		 KEY `word` (`word`)
		);
		***************************/    
    }
	public function index()
	{
		$data['thongbaokq'] = '';
    	$data['image_captcha'] = $this->_tao_captcha();
		$this->template->build('captcha',$data);
	}
	
	public function createWord()
    {
			$chars = "1234567890";
			$word = '';
			for ($a = 0; $a <= 5; $a++) {
				$b = rand(0, strlen($chars) - 1);
				$word .= $chars[$b];
			}        
			return $word; 
	}

	public function _tao_captcha()
	{
    	$vals = array(	
				'word' => $this->createWord(), //ko thích thì bỏ dòng này ra
				'img_path' => './upload/captcha/images/', 
				'img_url' => base_url().'upload/captcha/images/', 
				'font_path' => './upload/captcha/fonts/UTM_Androgyne.ttf', 
				'img_width' => '170', 
				'img_height' => '45', 
				'expiration' => 7200 
		); 
		$cap = create_captcha($vals);
		$image = $cap['image'];
		// ...and store the captcha word in a session		
		$this->session->set_userdata(array(
										'captchaword'=>$cap['word'], 
										'captcha_fileimage' => $cap['time'].'.jpg'
									)); //set data to session for compare 
		
		// we will return the image html code
		return $image; 
	}
	
	
	
	//Xóa hình captcha để xóa file thì phải có $this->load->helper("file");
	public function deleteImage()
    {	

		//define('PUBPATH',str_replace(SELF,'',FCPATH)); // added		
        if(isset($this->session->userdata['captcha_fileimage'])){			
            //$lastImage = PUBPATH.'upload/captcha/images/'.$this->session->userdata['captcha_fileimage'];
			$lastImage = str_replace(SELF,'',FCPATH).'upload/captcha/images/'.$this->session->userdata['captcha_fileimage'];					
			if(file_exists($lastImage)){
                unlink($lastImage);
            }
        }
        return $this;
    }
	
	public function kiemtra($captcha)
	{
		$captcha2 = $this->session->userdata('captchaword');		
		if(strtoupper($captcha)==strtoupper($captcha2)){
			return true;
		}else{
			return false;
		}	
	}
	
	
	public function kiemtra2()
	{

		$this->form_validation->set_rules('name','Tên','required|xss_clean');
		$this->form_validation->set_rules('captcha','Mã xác nhận','required|xss_clean');	

		if($this->form_validation->run() == false)
		{
			$this->index();			
		}
		else
		{
			$data['name'] = $this->input->post('name');
			$captcha  = $this->input->post('captcha');
			$captcha2 = $this->session->userdata('captchaword');
			if($captcha==$captcha2){
				$this->template->build('success-view',$data);
			}else{
				$data['thongbaokq'] = '<div class="error-form">Mã xác nhận không đúng</div>';
				$data['image_captcha'] = $this->_tao_captcha();
				$this->template->build('captcha',$data);
			}
		}
	
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */