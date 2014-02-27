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
    	<p>Chúc mừng bạn đã đăng ký thành công</p>    
        <div><a class="tt-input-form" href="<?php echo base_url().'user/thongtin_canhan' ?>">Cập nhật thông tin cá nhân</a> <a class="tt-input-form" href="<?php echo base_url(); ?>">Trở lại trang chủ</a></div>
    </div>	
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
