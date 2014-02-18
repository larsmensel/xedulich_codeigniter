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
			$data['title'] = 'Cho Thuê Xe Du Lịch';
			
			
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
	
	public function category_xe()
	{		
	
			if ($this->uri->segment(3) === FALSE)
			{
				$id_lchothue = 0;
			}
			else
			{	
				
				$id_lchothue = $this->uri->segment(3);
				
				
				/* phan trang mau
				$config["base_url"] = base_url() . "welcome/example1";
				$config["total_rows"] = $this->Countries->record_count();
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;
				$choice = $config["total_rows"] / $config["per_page"];
				$config["num_links"] = round($choice);
			 
				$this->pagination->initialize($config);
			 
				$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
				$data["results"] = $this->Countries
					->fetch_countries($config["per_page"], $page);
				$data["links"] = $this->pagination->create_links();
			 
				$this->load->view("example1", $data);*/
				$this->load->model("model_home");
				$this->load->library("pagination");
				$config = array();
						
				$config["base_url"] = base_url() . "home/category_xe";				
				
				$config["total_rows"] = $this->model_home->record_count_loai($id_lchothue);
				var_dump($config["total_rows"]);exit();
				$config["per_page"] = 6;
				$config["uri_segment"] = 3;
				$config["next_link"]= 'Kế tiếp';
				$config["prev_link"]= 'Quay Lại';
		 
				$this->pagination->initialize($config);
		 
				$page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
				$data["results"] = $this->model_tintuc->fetch_tintuc($config["per_page"], $page);
				$data["phantrang"] = $this->pagination->create_links();
				
				
				
				
				$loaixe = $this->model_home->get_id_loaichothue($id_lchothue);
				$object = array();
				foreach($loaixe as $key=>$value){
					$object[] = array(						
						'IDThue'=>$value['IDThue'],
						'TenThue'=>$value['TenThue'],
						'sub'=>$this->model_home->chitietxe_thue($value['IDThue'])
					);			
				}
				$data['title'] = $object[0]['TenThue'];

			}
			$data['object'] = $object;
			$this->template->build('category_xe',$data);
            var_dump($data);exit();
	}
	
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */