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
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red">', '</p>');
		
		
		if(($this->session->userdata('logged_in'))==false){
			redirect('home');
		}
		
    }
	public function index()
	{            
		$data = array();				
		//phan trang
		$this->load->library('pagination');		
		$config['base_url'] = base_url().'tintuc/index';
        $config["total_rows"] = $this->model_tintuc->get_total_tintuc();
		
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
		$data["DanhSachTinTuc"] = $this->model_tintuc->get_list_tintuc($config["per_page"], $page);		
		$data['pagination'] = $this->pagination->create_links(); 	
		
		
		$data['title']='Quản lý tin tức';
        $this->template->build('tintuc', $data);
           
           
	}
	
	public function chitiettintuc()
	{            
        $data['title']='Quản lý tin tức';
		$data['kq_dangtin']='';
		$this->template->build('chitiettintuc', $data);           
           
	}
        
	public function themchitiettintuc()
	{        
		$data['title']='Thêm tin';
        $data['kq_dangtin']='';
	
		$this->form_validation->set_rules('tentin', 'Tiêu đề tin', 'required|xss_clean');
		$this->form_validation->set_rules('tomtattin', 'Tóm tắt tin', 'required|xss_clean');
		$this->form_validation->set_rules('noidungtin', 'Nội dung tin', 'required|xss_clean');	
		if($this->form_validation->run() == FALSE){
			$data['kq_dangtin']='Không thành công';
			$this->template->build('chitiettintuc', $data);
		}
		else{
			
			$tentin		=	$this->input->post('tentin');
			$tomtattin	=	$this->input->post('tomtattin');
			$noidungtin	=	$this->input->post('noidungtin');
			$urlhinh	=	$this->input->post('images');
			$anhien		=	$this->input->post('anhien');
			$hot		=	$this->input->post('hot');
			$ngaypost	=	date("Y-m-d");
			$userpost	=	$this->session->userdata['user_id'];//lay session user_id
			
			$this->model_tintuc->themchitiettintuc($tentin,$tomtattin,$noidungtin,$urlhinh,$anhien,$hot,$ngaypost,$userpost);	
			$data['kq_dangtin']='Thêm thành công';
			$this->template->build('chitiettintuc', $data);
		}
        		
	}
	public function capnhattintuc()
	{       
		$data['title']='Cập nhật tin tức';
		$data['kq_dangtin']='';
		
		$id = $this->uri->segment(3);
		$data['results'] = $this->model_tintuc->capnhattintuc($id);	
		$this->template->build('capnhattintuc', $data);				
	}
	public function luu_capnhattintuc()
	{
		$data['title']='Cập nhật tin tức';
		$this->form_validation->set_rules('tentin', 'Tiêu đề tin', 'required|xss_clean');
		$this->form_validation->set_rules('tomtattin', 'Tóm tắt tin', 'required|xss_clean');
		$this->form_validation->set_rules('noidungtin', 'Nội dung tin', 'required|xss_clean');
		
		if($this->form_validation->run() == FALSE){	
			$data['kq_dangtin']='Không thành công';
			$id		=	$this->input->post('id');
			$data['results'] = $this->model_tintuc->capnhattintuc($id);	
			$this->template->build('capnhattintuc', $data);
		}
		else{
			$data['kq_dangtin']='Thêm thành công';
			$data['title']='Cập nhật tin tức';
			
			$id		=	$this->input->post('id');
			$tentin		=	$this->input->post('tentin');
			$tomtattin	=	$this->input->post('tomtattin');
			$noidungtin	=	$this->input->post('noidungtin');
			$urlhinh	=	$this->input->post('images');
			$anhien		=	$this->input->post('anhien');
			$hot		=	$this->input->post('hot');
			$userpost	=	$this->session->userdata['user_id'];//lay session user_id
			$this->model_tintuc->luu_capnhattintuc($id,$tentin,$tomtattin,$noidungtin,$urlhinh,$anhien,$hot,$userpost);
			redirect('tintuc');
		}
	}
	public function upload_img()
	{				
	
		//echo 'aaaaaaaaaaaaa:'.URL_PATH;exit();
		$config['upload_path'] = URL_PATH ."/upload/tintuc/";
		
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
			echo URL_HTTP."/upload/tintuc/".$img['file_name'];
		}		
		return true;
	}
	public function xoatatcatintuc()
	{
		$items 	= $this->input->post('items', TRUE);
		$path = URL_PATH ;		
		$done = ($this->model_tintuc->xoatatcatintuc($items, $path)==true) ? 1 : 0;
		echo json_encode($done, true) ;  exit;
	}
    public function xoatintuc()
	{
		$id 	= $this->input->post('id', TRUE);
		$path = URL_PATH ;
		$done = ($this->model_tintuc->xoatintuc($id, $path)==true) ? 1 : 0;
		echo json_encode($done, true);  exit;
	}    	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */