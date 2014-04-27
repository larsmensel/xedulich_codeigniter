<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
 	<h2 class="tt-box-style-tt">Đăng nhập</h2>
	<div class="tt-sty-form">
    
    	<?php //echo validation_errors(); ?>
    
		<?php echo form_open('user/dangnhap'); ?>
        
        
        <div><h5>Email</h5>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
        <?php echo form_error('email'); ?>
        <?php echo $error_signin; ?>
        </div>
        
        <div><h5>Password</h5>
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" autocomplete="off" size="50" />
        <?php echo form_error('password'); ?>
        </div>
        
        <div><input class="tt-input-form" type="submit" value="Đăng nhập" /></div>
        
        <?php echo form_close(); ?>
    
    </div>	

  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
