<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <div class="tt-sty-form">
      <p>Thông tin cá nhân</p>
      <?php echo form_open('user/thongtin_canhan'); ?>
      
      
      <?php
      	foreach($results_user as $row_user){
			$email = $row_user->Email;
			$HoTen = $row_user->TenKH;
			$DiaChi = $row_user->DiaChi;
			$SDT = $row_user->SoDT;
		}
	  ?>
      
      <?php
      	$thongbao='';
		if(($this->session->userdata('thongbaokq')!="")){
			$thongbao=$this->session->userdata('thongbaokq');
			$this->session->unset_userdata('thongbaokq');
		}
		echo $thongbao;
	  ?>
      
      <div>
        <h5>Username</h5>
      	<p><?php echo $this->session->userdata('user_name');?></p>
      </div>
      <div>
        <h5>Email</h5>
      	<p><?php echo $email;?></p>
      </div>
      
      
      <div>
        <h5>Số điện thoại</h5>
        <input type="text" name="SDT" value="<?php if($this->input->post('SoDT')!=''){
			echo set_value('SoDT');
		}else{
			echo $SDT;
		}
		?>" size="50" />
        <?php echo form_error('SDT'); ?> </div>
      <div>
        <input class="tt-input-form" name="btn_capnhat_user" type="submit" value="Cập nhật thông tin" />
      </div>
      <?php echo form_close(); ?> </div>
	  <div><a class="tt-input-form" href="<?php echo base_url().'user/doimatkhau' ?>">Đổi mật khẩu</a></div>
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
