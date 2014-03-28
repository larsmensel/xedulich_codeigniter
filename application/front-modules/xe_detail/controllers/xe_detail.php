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
		$this->load->helper(array('form', 'url'));
        
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

		$xlq_hangxe = $this->model_detail->get_hangloaixe($product_id);
		foreach($xlq_hangxe as $value){
			$data["results_xecung_hang"] = $this->model_detail->get_xecung_hang($product_id,$value['IDHangxe']);
			$data["results_xecung_loai"] = $this->model_detail->get_xecung_loai($product_id,$value['IDLoaixe']);
		}
		//lay duu lieu cung loai cho thue
		$xlq_loaithue = $this->model_detail->get_loaichothue($product_id);
		foreach($xlq_loaithue as $value1){
			$data['results_tenloaithue'] = $value1['TenThue'];
			$data["results_xecung_loaithue"] = $this->model_detail->get_cung_loaichothue($product_id,$value1['IDThue']);
		}		
		$this->template->build('xe_detail',$data);
            
	}
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */