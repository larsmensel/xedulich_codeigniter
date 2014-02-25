<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
 	<h2 class="tt-box-style-tt">test</h2>
	<div class="tt-sty-form">
    
    	<?php //echo validation_errors(); ?>
    
		<?php echo form_open('captcha_insert_db/index'); ?>
        
        
        <div><h5>Username</h5>
        <input type="text" name="captcha" value="" size="50" />
        <?php echo $image; ?>
        <?php //echo form_error('user_name'); ?>
        <?php //echo $error_signin; ?>
        </div>        
        
        
        <div><input class="tt-input-form" type="submit" name="btn_captcha" value="xax nhan" /></div>
        
        <?php echo form_close(); ?>
    
    </div>	

  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
