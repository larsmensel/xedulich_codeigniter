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
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red">', '</p>');
		
		if(($this->session->userdata('logged_in'))==false){
			redirect('home');
		}   
    }
	public function index()
	{
		
		$this->load->library('pagination');		
		$config['base_url'] = base_url().'xe/index';
        $config["total_rows"] = $this->model_xe->get_total_xe();
		
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
		$data["results"] = $this->model_xe->get_list_xe($config["per_page"], $page);		
		$data['pagination'] = $this->pagination->create_links(); 	
		
		
		$data['title']='Quản lý xe';
        $this->template->build('xe', $data);           
	}
    public function chitietxe()
	{          
        $data['title']='Quản lý xe';
		$data['kq_dangxe']='';
		
		$data['loaixe_all'] = $this->model_xe->loaixe();
		$data['hangxe_all'] = $this->model_xe->hangxe();
		$this->template->build('chitietxe', $data);
           
	}
	public function themchitietxe()
	{     
		$data['title']='Thêm xe';
        $data['kq_dangxe']='';
		
		$data['loaixe_all'] = $this->model_xe->loaixe();
		$data['hangxe_all'] = $this->model_xe->hangxe();
	
		$this->form_validation->set_rules('tenxe', 'Tên xe', 'required|xss_clean');
		$this->form_validation->set_rules('namsx', 'Năm sản xuất', 'required|xss_clean|integer');
		$this->form_validation->set_rules('bienso', 'Biển số', 'required|xss_clean');
		$this->form_validation->set_rules('mauxe', 'Màu xe', 'required|xss_clean');
		$this->form_validation->set_rules('mota', 'Mô tả', 'required|xss_clean');
		$this->form_validation->set_rules('gia', 'Giá', 'required|xss_clean|integer');	
		$this->form_validation->set_rules('loaixe', 'Loại xe', 'required|xss_clean');	
		$this->form_validation->set_rules('hangxe', 'Hãng xe', 'required|xss_clean');	
		if($this->form_validation->run() == FALSE){
			$data['kq_dangxe']='Không thành công';
			$this->template->build('chitietxe', $data);
		}
		else{     
			$tenxe		=	$this->input->post('tenxe');
			$namsx		=	$this->input->post('namsx');
			$bienso		=	$this->input->post('bienso');
			$mauxe		=	$this->input->post('mauxe');
			$urlhinh	=	$this->input->post('images');
			$mota		=	$this->input->post('mota');
			$gia		=	$this->input->post('gia');
			$loaixe		=	$this->input->post('loaixe');
			$hangxe		=	$this->input->post('hangxe');
			$this->model_xe->themchitietxe($tenxe,$namsx,$bienso,$mauxe,$urlhinh,$mota,$gia,$loaixe,$hangxe);
			$data['kq_dangxe']='Thêm thành công';
			
			$this->template->build('chitietxe', $data);
		}
	}
	
	public function capnhatxe()
	{       
		$data['title']='Cập nhật xe';
		$data['kq_dangxe']='';
		$id = $this->uri->segment(3);
		$data['results'] = $this->model_xe->capnhatxe($id);	
		$data['loaixe_all'] = $this->model_xe->loaixe();
		$data['hangxe_all'] = $this->model_xe->hangxe();
		$this->template->build('capnhatxe', $data);				
	}
	public function luu_capnhatxe()
	{
		$data['title']='Cập nhật xe';
		//echo $this->input->post('id');exit;
		$this->form_validation->set_rules('tenxe', 'Tên xe', 'required|xss_clean');
		$this->form_validation->set_rules('namsx', 'Tóm tắt tin', 'required|xss_clean|integer');
		$this->form_validation->set_rules('bienso', 'Nội dung tin', 'required|xss_clean');
		$this->form_validation->set_rules('mauxe', 'Tên xe', 'required|xss_clean');
		$this->form_validation->set_rules('mota', 'Tóm tắt tin', 'required|xss_clean');
		$this->form_validation->set_rules('gia', 'Nội dung tin', 'required|xss_clean|integer');	
		$this->form_validation->set_rules('loaixe', 'Nội dung tin', 'required|xss_clean');	
		$this->form_validation->set_rules('hangxe', 'Nội dung tin', 'required|xss_clean');	
		
		if($this->form_validation->run() == FALSE){	
			$data['kq_dangxe']='Không thành công';
			$id		=	$this->input->post('id');
			$data['results'] = $this->model_xe->capnhatxe($id);	
			$data['loaixe_all'] = $this->model_xe->loaixe();
			$data['hangxe_all'] = $this->model_xe->hangxe();
			
			$this->template->build('capnhatxe', $data);
		}
		else{
			$data['kq_dangtin']='Thêm thành công';
			$data['title']='Cập nhật xe';
			
			$id				=	$this->input->post('id');
			$tenxe			=	$this->input->post('tenxe');
			$namsx			=	$this->input->post('namsx');
			$bienso			=	$this->input->post('bienso');
			$mauxe			=	$this->input->post('mauxe');
			$hinhanh		=	$this->input->post('images');
			$mota			=	$this->input->post('mota');
			$gia			=	$this->input->post('gia');
			$loaixe			=	$this->input->post('loaixe');
			$hangxe			=	$this->input->post('hangxe');
			
			$this->model_xe->luu_capnhatxe($id,$tenxe,$namsx,$bienso,$mauxe,$hinhanh,$mota,$gia,$loaixe,$hangxe);
			redirect('xe');
		}
	}
	public function upload_img()
	{				
	
		//echo 'aaaaaaaaaaaaa:'.URL_PATH;exit();
		$config['upload_path'] = URL_PATH ."/upload/xe/";
		
		//echo URL_PATH;exit();
		
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '4048';
		//$config['encrypt_name']	= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('uploadfile'))
		{
			$this->data['error'] = $this->upload->display_errors();	
			echo "error";
		}	
		else
		{
			$img = $this->upload->data();	
			echo URL_HTTP."/upload/xe/".$img['file_name'];
		}		
		return true;
	}
	public function xoatatcaxe()
	{
		$items 	= $this->input->post('items', TRUE);
		$path 	= URL_PATH ;		
		$done	= ($this->model_xe->xoatatcaxe($items, $path)==true) ? 1 : 0;
		echo json_encode($done, true) ;  exit;
	}
    public function xoaxe()
	{
		$id 	= $this->input->post('id', TRUE);
		$path 	= URL_PATH ;
		$done 	= ($this->model_xe->xoaxe($id, $path)==true) ? 1 : 0;
		echo json_encode($done, true);  exit;
	}    	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */