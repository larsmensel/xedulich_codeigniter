<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donhang extends MX_Controller {

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
        $this->load->model('model_donhang');		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');		
		$this->lang->load('form_validation','vietnamese');	
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red">', '</p>');
		
		if(($this->session->userdata('logged_in'))==false){
			redirect('home');
		}   
    }
	public function index()
	{
		
		$this->load->library('pagination');		
		$config['base_url'] = base_url().'donhang/index';
        $config["total_rows"] = $this->model_donhang->get_total_donhang();
		
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
		$data["results"] = $this->model_donhang->get_list_donhang($config["per_page"], $page);		
		$data['pagination'] = $this->pagination->create_links(); 	
		
		
		$data['title']='Quản lý đơn hàng';
        $this->template->build('donhang', $data);           
	}
	public function capnhatdonhang()
	{       
		$data['title']='Cập nhật đơn hàng';
		$data['kq_dangdonhang']='';
		$id = $this->uri->segment(3);
		$data['results'] = $this->model_donhang->capnhatdonhang($id);	
		$this->template->build('capnhatdonhang', $data);				
	}
	public function luu_capnhatdonhang()
	{
		$data['title']='Cập nhật đơn hàng';
		//echo $this->input->post('id');exit;
		$this->form_validation->set_rules('tenkh', 'Tên khách hàng', 'required|xss_clean');
		$this->form_validation->set_rules('tenxe', 'Tên xe', 'required|xss_clean');
		
		if($this->form_validation->run() == FALSE){	
			$data['kq_dangdonhang']='Không thành công';
			$id		=	$this->input->post('id');
			$data['results'] = $this->model_donhang->capnhatdonhang($id);	
			
			$this->template->build('capnhatdonhang', $data);
		}
		else{
			$data['kq_dangtin']='Thêm thành công';
			$data['title']='Cập nhật đơn hàng';
			
			
			$id				=	$this->input->post('id');
			$TenKH			=	$this->input->post('tenkh');
			$SDT			=	$this->input->post('sdt');
			$Email			=	$this->input->post('email');
			$TenXe			=	$this->input->post('tenxe');
			$NgayThue		=	$this->input->post('ngaythue');
			$SoNgay			=	$this->input->post('songay');
			$Tu				=	$this->input->post('tu');
			$Den			=	$this->input->post('den');
			$TongTien		=	$this->input->post('tongtien');
			$TinhTrang		=	$this->input->post('tinhtrang');
			
			$this->model_donhang->luu_capnhatdonhang($id,$TenKH,$SDT,$Email,$TenXe,$NgayThue,$SoNgay,$Tu,$Den,$TongTien,$TinhTrang);
			redirect('donhang');
		}
	}

	public function xoatatcadonhang()
	{
		$items 	= $this->input->post('items', TRUE);
		$path 	= URL_PATH ;		
		$done	= ($this->model_donhang->xoatatcadonhang($items, $path)==true) ? 1 : 0;
		echo json_encode($done, true) ;  exit;
	}
    public function xoadonhang()
	{
		$id 	= $this->input->post('id', TRUE);
		$path 	= URL_PATH ;
		$done 	= ($this->model_donhang->xoadonhang($id, $path)==true) ? 1 : 0;
		echo json_encode($done, true);  exit;
	}    	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */