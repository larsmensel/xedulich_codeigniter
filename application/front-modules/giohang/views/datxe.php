<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Thông tin đặt xe</h2>
    <?php 
	foreach($results as $row){
		$IDchitietxe = $row->IDchitietxe;
		$TenXe       = $row->TenXe;
		$NamSx       = $row->NamSx;
		$MauXe       = $row->MauXe;
		$Gia		 = $row->Gia;
	?>
    <?php echo form_open('giohang/add'); ?>
    <table class="tt-giohang" width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <th colspan="2" align="left" scope="row">Thông tin khách hàng</th>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Tên khách hàng</th>
        <td><input type="text" name="kh_name" id="kh_name" value="<?php echo set_value('kh_name'); ?>">
          <br />
          <?php echo form_error('kh_name'); ?></td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Điện thoại</th>
        <td><input type="text" name="kh_phone" id="kh_phone" value="<?php echo set_value('kh_phone'); ?>">
          <br />
          <?php echo form_error('kh_phone'); ?></td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Email</th>
        <td><input type="text" name="kh_email" id="kh_email" value="<?php echo set_value('kh_email'); ?>">
          <br />
          <?php echo form_error('kh_email'); ?></td>
      </tr>
    </table>
    <table class="tt-giohang" width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <th colspan="2" align="left" scope="row">Thông tin đặt xe</th>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Tên xe</th>
        <td><?php echo $TenXe; ?>
          <input type="hidden" name="idxe" id="idxe" value="<?php echo $IDchitietxe; ?>"></td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Giá</th>
        <td><?php echo number_format($Gia,0,",",".");?>/ngày</td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Ngày bắt đầu thuê</th>
        <td><input type="text" class="form-control tt-datepicker"  name="infromdate" id="infromdate" value="<?php echo set_value('infromdate'); ?>" placeholder="">
          <br />
          <?php echo form_error('infromdate'); ?></td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Số ngày thuê</th>
        <td><input type="text" name="qty" id="qty" value="1">
          <br />
          <?php echo form_error('qty'); ?></td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Từ</th>
        <td><input type="text" class="form-control" name="infrom" id="autocompleteinfrom" value="<?php echo set_value('infrom'); ?>" placeholder="">
          <br />
          <?php echo form_error('infrom'); ?></td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Đến</th>
        <td><input type="text" class="form-control" name="into" id="autocompleteinto" value="<?php echo set_value('into'); ?>" placeholder="">
          <br />
          <?php echo form_error('into'); ?></td>
      </tr>
      <tr>
        <th colspan="2" scope="row"> <input class="tt-input-form" type="button" onClick="history.back();" value="Trở về">
          <input class="tt-input-form" type="submit" value="Tiếp tục">
        </th>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <?php } ?>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>themes/front/js/jquery.autocomplete.min.js"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>themes/front/js/jquery.mockjax.js"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>themes/front/js/tinhthanh.js"></script> 
  <script type="text/javascript" src="<?php echo base_url(); ?>themes/front/js/code_autocomplete.js"></script> 
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
