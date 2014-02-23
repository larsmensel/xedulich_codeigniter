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
    	<p>Thank</p>    
        <?php $this->session->set_userdata('aaa', '111'); ?>
    </div>	

  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
