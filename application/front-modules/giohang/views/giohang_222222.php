<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Gio hang</h2>
    <?php if($cart = $this->cart->contents()){ ?>
    <?php echo form_open('giohang/update'); ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th>Tên xe</th>
        <th>Từ</th>
        <th>Đến</th>
        <th>Số ngày</th>
        <th>Xóa</th>
      </tr>
      <?php foreach($cart as $item){ ?>
      <tr>
        <td><?php echo $item['name'];?></td>
        <td><input type="text" class="form-control" name="infrom" id="autocompleteinfrom" placeholder=""></td>
        <td><input type="text" class="form-control" name="into" id="autocompleteinto" placeholder=""></td>
        <td><input type="text" value="<?php echo $item['qty']; ?>" class="form-control" name="qty" id="autocompleteinto" placeholder="">
          <input type="hidden" name="rowid" id="rowid" value="<?php echo $item['rowid'];?>"></td>
        <td><a href="<?php echo base_url().'giohang/remove/'.$item['rowid'];?>">Xóa</a></td>
      </tr>
      <tr>
        <td colspan="5"><button onClick="history.back();">Trở về</button>
          <button type="submit">Tiếp tục</button></td>
      </tr>
      <?php } ?>
    </table>
    <?php echo form_close(); ?>
    <?php }else{
		echo 'Giỏ hàng rỗng';
	} ?>
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
