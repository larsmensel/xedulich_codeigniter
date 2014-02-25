<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha_insert_db extends MX_Controller {

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
		
		
		$this->load->helper(array('form', 'url','captcha'));
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
            
			
			$vals = array(	
							'img_path' => './upload/captcha/images/', 
							'img_url' => base_url().'upload/captcha/images/', 
							'font_path' => './upload/captcha/fonts/UTM_Androgyne.ttf', 
							'img_width' => '170', 
							'img_height' => '45', 
							'expiration' => 7200 
					); 
			$cap = create_captcha($vals); 
			//echo '111111'.$cap['image'];
			
			$data = array(
							'captcha_time' => $cap['time'],
							'ip_address' => $this->input->ip_address(),
							'word' => $cap['word']
					);					
			$this->load->model('model_captcha');
			$this->load->model_captcha->saveData($data);
			if($this->input->post('btn_captcha')!='') { 
				$sz_Word = $this->input->post('captcha');
				$b_Check = $this->model_captcha->b_fCheck($sz_Word); 
				var_dump($b_Check);exit();
			}
			$data['image'] = $cap['image']; 
			$this->template->build('captcha',$data);
			
			
			
					
			
			
			
			/*$data = array(	'captcha_time' => $cap['time'], 
							'ip_address' => $this->input->ip_address(), 
							'word' => $cap['word'] ); 
			$this->load->model('captcha_model');
			$b_SaveData = $this->captcha_model->saveData($data);
			if($_SERVER['REQUEST_METHOD'] == 'POST') { 
				$sz_Word = $this->input->post('captcha'); 
				$b_Check = $this->captcha_model->b_fCheck($sz_Word); 
				if($b_Check) { 
					$a_Data['success'] = 'Your input catpcha is correct'; 
				}else{ 
					$a_Data['error'] = 'Your input catpcha is not correct. Please try again.'; 
				} 
			} 
			
			//store image html code in a variable
			$a_Data['Data'] = $cap['image']; 
			$this->load->view('captcha_template', $a_Data);        */
			
			
			
           
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */