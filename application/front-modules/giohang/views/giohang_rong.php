<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Giỏ hàng</h2>
    <p style="margin:10px 0;">Giỏ hàng rỗng</p>
    <p style="padding-top:20px; text-align:center;"><a class="tt-input-form" href="<?php echo base_url();?>">Trở về trang chủ</a></p>
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
