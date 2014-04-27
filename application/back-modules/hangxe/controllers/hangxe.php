<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hangxe extends MX_Controller {

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
        $this->load->model('model_hangxe');		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');		
		$this->lang->load('form_validation','vietnamese');	
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red">', '</p>');
		
		if(($this->session->userdata('admin_logged_in'))==false){
			redirect('home');
		}   
    }
	public function index()
	{
		
		$this->load->library('pagination');		
		$config['base_url'] = base_url().'hangxe/index';
        $config["total_rows"] = $this->model_hangxe->get_total_hangxe();
		
        $config["per_page"] = 10;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['cur_tag_open'] = "<li class='paginate_button active'><a href='javascript:void(0)'>";								
		$config['cur_tag_close'] = "</a></li>";
		$config['num_tag_open'] = "<li class='paginate_button'>";								
		$config['num_tag_close'] = "</li>";
		$config['full_tag_close'] = '</ul>';
        $config["uri_segment"] = 3;		
		$config["num_links"] = 3;
		$config['use_page_numbers'] = TRUE;		
		$config['first_tag_open'] = "<li class='paginate_button'>";
		$config['first_link'] = "Đầu";
		$config['first_tag_close'] = "</li>";		
		$config['prev_tag_open'] = "<li class='paginate_button'>";
		$config['prev_link'] = "Trước";	
		$config['prev_tag_close'] = "</li>";			
		$config['next_tag_open'] = "<li class='paginate_button'>";
		$config['next_link'] 		= "Tiếp theo";									
		$config['next_tag_close'] = "</li>";		
		$config['last_tag_open'] 	= "<li class='paginate_button'>";
		$config['last_link'] 		= "Cuối";
		$config['last_tag_close'] 	= "</li>";		
		
		
		$this->pagination->initialize($config);		
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config["per_page"] : 0;		
		$data["results"] = $this->model_hangxe->get_list_hangxe($config["per_page"], $page);		
		$data['pagination'] = $this->pagination->create_links(); 	
		
		
		$data['title']='Quản lý hãng xe';
        $this->template->build('hangxe', $data);           
	}
    public function chitiethangxe()
	{          
        $data['title']='Quản lý hãng xe';
		$data['kq_danghangxe']='';
		$this->template->build('chitiethangxe', $data);
           
	}
	public function themchitiethangxe()
	{     
		$data['title']='Thêm hãng xe';
        $data['kq_danghangxe']='';
		$this->form_validation->set_rules('tenhangxe', 'Tên hãng xe', 'required|xss_clean');
		$this->form_validation->set_rules('thutu', 'Thứ tự', 'required|xss_clean|is_natural_no_zero');
			
		if($this->form_validation->run() == FALSE){
			$data['kq_danghangxe']='Không thành công';
			$this->template->build('chitiethangxe', $data);
		}
		else{     
			$tenhangxe	=	$this->input->post('tenhangxe');
			$thutu		=	$this->input->post('thutu');
			$anhien		=	$this->input->post('anhien');
			
			$this->model_hangxe->themchitiethangxe($tenhangxe,$thutu,$anhien);
			$data['kq_danghangxe']='Thêm thành công';
			
			$this->template->build('chitiethangxe', $data);
		}
	}
	
	public function capnhathangxe()
	{       
		$data['title']='Cập nhật hãng xe';
		$data['kq_danghangxe']='';
		$id = $this->uri->segment(3);
		$data['results'] = $this->model_hangxe->capnhathangxe($id);	
		$this->template->build('capnhathangxe', $data);				
	}
	public function luu_capnhathangxe()
	{
		$data['title']='Cập nhật hãng xe';
		//echo $this->input->post('id');exit;
		$this->form_validation->set_rules('tenhangxe', 'Tên hãng xe', 'required|xss_clean');
		$this->form_validation->set_rules('thutu', 'Thứ tự', 'required|xss_clean|is_natural_no_zero');
		
		if($this->form_validation->run() == FALSE){	
			$data['kq_danghangxe']='Không thành công';
			$id		=	$this->input->post('id');
			$data['results'] = $this->model_hangxe->capnhathangxe($id);	
			
			$this->template->build('capnhathangxe', $data);
		}
		else{
			$data['kq_dangtin']='Thêm thành công';
			$data['title']='Cập nhật hãng xe';
			
			
			$id			=	$this->input->post('id');
			$tenhangxe	=	$this->input->post('tenhangxe');
			$thutu		=	$this->input->post('thutu');
			$anhien		=	$this->input->post('anhien');
			
			$this->model_hangxe->luu_capnhathangxe($id,$tenhangxe,$thutu,$anhien);
			redirect('hangxe');
		}
	}

	public function xoatatcahangxe()
	{
		$items 	= $this->input->post('items', TRUE);
		$path 	= URL_PATH ;		
		$done	= ($this->model_hangxe->xoatatcahangxe($items, $path)==true) ? 1 : 0;
		echo json_encode($done, true) ;  exit;
	}
    public function xoahangxe()
	{
		$id 	= $this->input->post('id', TRUE);
		$path 	= URL_PATH ;
		$done 	= ($this->model_hangxe->xoahangxe($id, $path)==true) ? 1 : 0;
		echo json_encode($done, true);  exit;
	}    	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */