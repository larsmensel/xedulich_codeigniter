<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller {

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
		$this->load->model('model_banner');
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
            
           $this->template->build('danhsachbanner');
           
           
	}
	public function danhsachbanner()
	{
           $data['result']	=	$this->model_banner->hiendanhsachbanner(); 
           $this->template->build('danhsachbanner',$data);
           
           
	}
	
	public function chitietbanner()
	{
            
           $this->template->build('chitietbanner');
           
           
	}
	
	public function thembanner()
	{
            $urlhinh	=	$this->input->post('urlhinh');
			$link		=	$this->input->post('link');
		
			$this->model_banner->thembanner($urlhinh,$link);
		
          	$this->chitietbanner();
           
           
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */