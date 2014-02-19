<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xe_category extends MX_Controller {

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
		
        if ($this->uri->segment(2) === FALSE){$product_id = 0;}
		else{$product_id = $this->uri->segment(2);}
		//echo $product_id;exit;
		
	    $data['title'] = 'Cho Thuê Xe Du Lịch';
		$this->load->model('model_category');
		$this->load->library("pagination");
		$config = array();
				
		$config["base_url"] = base_url() . "xe_category/".$product_id."/page";
        $config["total_rows"] = $this->model_category->count_chitietxe_loaithue($product_id);
        $config["per_page"] = 4;
        $config["uri_segment"] = 4;
		$config["next_link"]= 'Tiếp theo';
		$config["prev_link"]= 'Quay lại';
		$config['first_link'] = 'Đầu trang';
		$config['last_link'] = 'Cuối trang';
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["results"] = $this->model_category->fetch_chitietxe_loaithue($product_id,$config["per_page"], $page);
        $data["phantrang"] = $this->pagination->create_links();
		
		$this->template->build('category_xe',$data);
            
	}
 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */