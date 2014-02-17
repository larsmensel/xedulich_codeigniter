<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

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
        
    }
	public function index()
	{
            /*$this->load->module('header');
			$data['header'] = $this->header->index();
            $this->template->build('home',$data);*/
			$data['title'] = '.::Cho Thuê Xe Du Lịch::.';
			
			
			$this->load->model("model_home");
			$loaixe = $this->model_home->get_loaithue();
			$object = array();
			foreach($loaixe as $key=>$value){
				$object[] = array(
					'IDThue'=>$value['IDThue'],
					'TenThue'=>$value['TenThue'],
					'sub'=>$this->model_home->chitietxe_thue($value['IDThue'])
				);			
			}
			
			$data['object'] = $object;
			
			$this->template->build('home',$data);
            
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */