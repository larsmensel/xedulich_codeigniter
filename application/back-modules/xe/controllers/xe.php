<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xe extends MX_Controller {

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
		$this->load->model('model_xe');
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
             
		$this->template->build('xe');          
           
	}
    public function chitietxe()
	{          
             
		$this->template->build('chitietxe');          
           
	}
	public function themchitietxe()
	{          
        $tenxe		=	$this->input->post('tenxe');
		$namsx		=	$this->input->post('namsx');
		$bienso		=	$this->input->post('bienso');
		$mauxe		=	$this->input->post('mauxe');
		$hinhanh	=	$this->input->post('hinhanh');
		$mota		=	$this->input->post('mota');
		$gia		=	$this->input->post('gia');
		$loaixe		=	$this->input->post('loaixe');
		$hangxe		=	$this->input->post('hangxe');
		$this->model_xe->themchitietxe($tenxe,$namsx,$bienso,$mauxe,$hinhanh,$mota,$gia,$loaixe,$hangxe);
		
		$this->chitietxe();
           
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */