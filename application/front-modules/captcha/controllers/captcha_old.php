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
		$this->load->helper(array('captcha'));
		
		//http://ellislab.com/codeigniter/user-guide/helpers/captcha_helper.html
		//http://thuthuatvietnam.com/su-dung-captcha-helper-tren-codeigniter.html
		//http://runnable.com/UXb8GazDrMMiAAEA/how-to-add-a-captcha-in-codeigniter
		
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');	
		
		$this->lang->load('form_validation','vietnamese');	
		//form_validation->ten file language/vietnamese/form_validation_lang.php
		//vietnamese -> ten thu muc chua language/vietnamese
		
		$this->form_validation->set_error_delimiters('<div class="error-form">', '</div>');
		
        
    }
	public function index()
	{
            
			$cap_word = random_string('alnum', 8);
			$vals = array(	
							'word'   => $cap_word,
							'img_path' => './upload/captcha/images/', 
							'img_url' => base_url().'upload/captcha/images/', 
							'font_path' => './upload/captcha/fonts/UTM_Androgyne.ttf', 
							'img_width' => '170', 
							'img_height' => '45', 
							'expiration' => 7200 
					); 
			$cap = create_captcha($vals); 
			//echo '111111'.$cap['image'];
			
			$cap_input = $this->input->post('captcha');
			echo $cap_input;
			echo '<br/>';
			echo $cap_word;
			$data['image'] = $cap['image']; 
			if(strtolower($cap_input) != strtolower($cap_word) || strtoupper($cap_input) != strtoupper($cap_word)) {
				$this->form_validation->set_message('validate_captcha_code', 'Wrong captcha code, Please try again.');
				
				echo 'that bai';
				$this->template->build('captcha',$data);
			}else{
				echo 'thanh cong';
				$this->template->build('captcha',$data);
			}
			
			
			
			
			
			
					
			
			
			
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