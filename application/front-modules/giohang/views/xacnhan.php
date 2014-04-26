<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Xác nhận</h2>
    <?php if($cart = $this->cart->contents()){ ?>
    	<?php echo '<pre>';
			print_r($cart);
		?>
    <?php }else{
		echo 'Giỏ hàng rỗng';
	} ?>
  </div>
   
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
