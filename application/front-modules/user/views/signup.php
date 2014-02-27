<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
 	<h2 class="tt-box-style-tt">Đăng ký</h2>
    
	<div class="tt-sty-form">
    
    	<?php //echo validation_errors(); ?>
    
		<?php echo form_open('user/dangky'); ?>
        
        <div><h5>Username</h5>
        <input type="text" name="user_name" value="<?php echo set_value('user_name'); ?>" size="50" />
        <?php echo form_error('user_name'); ?>
        </div>
        
        <div><h5>Password</h5>
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" autocomplete="off" size="50" />
        <?php echo form_error('password'); ?>
        </div>
        
        <div><h5>Password Confirm</h5>
        <input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" autocomplete="off" size="50" />
        <?php echo form_error('passconf'); ?>
        </div>
        
        <div><h5>Email Address</h5>
        <input type="text" name="email_address" value="<?php echo set_value('email_address'); ?>" size="50" />
        <?php echo form_error('email_address'); ?>
        </div>
        <div>
          <h5>Mã xác nhận</h5>
          <input type="text" name="captcha" value="" autocomplete="off"/> <?php echo $image_captcha;?>
          <?php echo form_error('captcha'); ?>
          
          <?php
		  $loi_captcha='';
		  if(($this->session->userdata('loi_captcha')!="")){
			  $loi_captcha=$this->session->userdata('loi_captcha');
			  $this->session->unset_userdata('loi_captcha');
		  }
		  echo $loi_captcha;
		  ?>
          
          </div>
        <div><input class="tt-input-form" type="submit" value="Đăng ký" /></div>
        
        <?php echo form_close(); ?>
    
    </div>	

  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
