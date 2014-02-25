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
		
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');	
		
		$this->lang->load('form_validation','vietnamese');	
		//form_validation->ten file language/vietnamese/form_validation_lang.php
		//vietnamese -> ten thu muc chua language/vietnamese
		
		$this->form_validation->set_error_delimiters('<div class="error-form">', '</div>');
		
        
    }
	private function _create_captcha()
  	{
    // we will first load the helper. We will not be using autoload because we only need it here
    $this->load->helper('captcha');
    // we will set all the variables needed to create the captcha image
    $vals = array(	
							'img_path' => './upload/captcha/images/', 
							'img_url' => base_url().'upload/captcha/images/', 
							'font_path' => './upload/captcha/fonts/UTM_Androgyne.ttf', 
							'img_width' => '170', 
							'img_height' => '45', 
							'expiration' => 7200 
					); 
    //now we will create the captcha by using the helper function create_captcha()
    $cap = create_captcha($vals);
    // we will store the image html code in a variable
    $image = $cap['image'];
    // ...and store the captcha word in a session
    $this->session->set_userdata('captchaword', $cap['word']);
    // we will return the image html code
    return $image;
  }
 
  public function check_captcha($string)
  {
    if($string==$this->session->userdata('word'))
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_captcha', 'Wrong captcha code');
      return FALSE;
    }
  }
 
  public function index()
  {
    //whenever someone gets to the login page we will create a captcha and render the login form
    $data['image']=$this->_create_captcha();
    $this->load->view('captcha',$data);
  }
  // we will also create a method to verify the data that the user has entered
 
  public function verify()
  {
    //we will check the form completion and verify the credentials such as the username, email or password. I will jump over that part and concentrate on the captcha part...
    $this->form_validation->set_rules( 'captcha', 'captcha', 'trim|callback_check_captcha|required' );
    //as you can see, I used the check_captcha callback to verify if the characters the user entered are the same as the ones that can be found inside the captcha image
    if($this->form_validation->run()===false) /* if the form validation failed */
    {
      $data['image']=$this->_create_captcha(); /* we will again call the captcha creator to recreate the captcha an the image */
      $this->load->view('captcha',$data); /* and load the login_view */
    }
    else
    {
      // from here on we can do whatever we want if the form validation was passed
	  echo 'passed';
    }
  }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */