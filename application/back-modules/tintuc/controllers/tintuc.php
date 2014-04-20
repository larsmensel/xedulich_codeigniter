<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tintuc extends MX_Controller {

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
        $this->load->model('model_tintuc');
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
            
            $this->template->build('tintuc');
           
           
	}
	
	public function chitiettintuc()
	{
            
            $this->template->build('chitiettintuc');
           
           
	}
        
	public function themchitiettintuc()
	{
            
        $tentin		=	$this->input->post('tentin');
		$tomtattin	=	$this->input->post('tomtattin');
		$noidungtin	=	$this->input->post('noidungtin');
		$urlhinh	=	$this->input->post('urlhinh');
		$anhien		=	$this->input->post('anhien');
		$hot		=	$this->input->post('hot');
		$this->model_tintuc->themchitiettintuc($tentin,$tomtattin,$noidungtin,$urlhinh,$anhien,$hot);	
		$this -> chitiettintuc();                     
	}
        	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */