<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giohang extends MX_Controller {

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
        //http://code.tutsplus.com/tutorials/how-to-build-a-shopping-cart-using-codeigniter-and-jquery--net-8187
		
		//https://www.youtube.com/watch?v=xk5w4oTM0ng
    }
	/*public function Cart()
    {
        parent::Controller(); // We define the the Controller class is the parent. 
    }*/
	public function index()
	{
		$data['title'] = 'Cho Thuê Xe Du Lịch';
		$this->load->model('model_giohang');
        //$data["results"] = $this->model_giohang->thongtinxe($product_id);	
		//$this->template->build('xe_detail',$data);
		
	}
	public function add()
	{
		$this->load->model('model_giohang');
		$id_xe = $this->input->post('xe_id');
		$xe = $this->model_giohang->chitiet_xe($id_xe);
		
		foreach($xe as $x){
			$Gia = $x->Gia;
			$TenXe = $x->TenXe;
			$NamSx = $x->NamSx;
			$MauXe = $x->MauXe;
		}
		//print_r($xe);
		
		$them_giohang = array(
			'id'		=> $id_xe,
			'qty'		=> 1,
			'price'		=> $Gia,
			'name'		=> $TenXe,
			'options'	=> array('MauXe' => $MauXe, 'NamSx' => $NamSx)
		);
		
		$this->cart->insert($them_giohang); 
		echo 'add() thuc hien';
	}
	
	public function update(){
		$data = array(
		   array(
				   'rowid'   => 'a16196e7cec37aa07fc6161e99e8dd9c',
				   'qty'     => 3
				),
		   array(
				   'rowid'   => 'c81e728d9d4c2f636f067f89cc14862c',
				   'qty'     => 4
				),
		   array(
				   'rowid'   => 'eccbc87e4b5ce2fe28308fd9f2a7baf3',
				   'qty'     => 2
				)
		);
		echo 'update() thuc hien';
		$this->cart->update($data);
	}
	
	public function show(){
		$giohang = $this->cart->contents();
		echo '<pre>';
		print_r($giohang);
	}
	public function remove(){
		$data = array(
		   array(
				   'rowid'   => 'a16196e7cec37aa07fc6161e99e8dd9c',
				   'qty'     => 0
				)
		);
		echo 'remove() thuc hien';
		$this->cart->update($data);
	}
	
	public function total(){
		echo $this->cart->total();
		
	}
	
	public function destroy(){
		$this->cart->destroy();		
	}
	
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */