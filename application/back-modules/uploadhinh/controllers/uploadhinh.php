<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploadhinh extends MX_Controller {

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
		$this->load->library('upload');
        
    }
	public function index()
	{         
			$this->load->view('uploadhinh', array('error' => ' ' ));
	}
	function do_upload()
	{
		//echo var_dump(is_dir(base_url().'uploads/'));
		//echo base_url().'../uploads/';
		var_dump(is_dir('../uploads/')); 
		$config['upload_path'] ='../uploads/';
		
		//$config['upload_path'] = base_url().'../uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->upload->initialize($config);

		//$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('uploadhinh', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */