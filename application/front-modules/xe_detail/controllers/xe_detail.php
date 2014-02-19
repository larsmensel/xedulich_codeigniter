<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xe_detail extends MX_Controller {

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
		$this->load->helper("url");
        
    }
	public function index()
	{
		//show_404();	
        if ($this->uri->segment(2) === FALSE){show_404();$product_id = 0;}
		else{$product_id = $this->uri->segment(2);}
		//echo $product_id;exit;
		
	    $data['title'] = 'Cho Thuê Xe Du Lịch';
		$this->load->model('model_detail');
        $data["results"] = $this->model_detail->get_chitietxe($product_id);
		//var_dump($data);exit();
		$this->template->build('xe_detail',$data);
            
	}
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */