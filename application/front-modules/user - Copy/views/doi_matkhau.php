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
      <p>Đổi mật khẩu</p>
      <?php echo form_open('user/doimatkhau'); ?>      
      <div>
        <h5>Mật khẩu cũ</h5>
      	<input type="password" name="password_old" autocomplete="off" value="<?php echo set_value('password_old'); ?>" size="50" />
        <?php echo form_error('password_old'); ?>
        <?php echo $error_pass; ?>
      </div>
      <div>
        <h5>Mật khẩu Mới</h5>
      	<input type="password" name="password_new" autocomplete="off" value="<?php echo set_value('password_new'); ?>" size="50" />
        <?php echo form_error('password_new'); ?>
      </div>
      <div>
        <h5>Xác nhận mật khẩu mới</h5>
      	<input type="password" name="password_newcof" autocomplete="off" value="<?php echo set_value('password_newcof'); ?>" size="50" />
        <?php echo form_error('password_newcof'); ?>
      </div>
      <div>
        <input class="tt-input-form" type="submit" value="Đổi mật khẩu" /> <a class="tt-input-form" href="<?php echo base_url().'user/thongtin_canhan' ?>">Trở lại</a>
      </div>
      <?php echo form_close(); ?> 
      </div>
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
