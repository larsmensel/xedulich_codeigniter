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
    <?php echo form_open('giohang/capnhatsp'); ?>
    <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
      <tr>
        <th width="25" align="center">STT</th>
        <th align="center">Tên xe</th>
        <th align="center">Loại xe</th>
        <th align="center">Hãng xe</th>
        <th align="center">Số lượng</th>
        <th align="left">Màu xe</th>
        <th style="text-align:right">Biển số</th>
        <th style="text-align:right">Đơn giá</th>
      </tr>
      <?php $i = 1; ?>
      <?php foreach ($this->cart->contents() as $items): ?>
      <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
      <tr>
        <td width="25" align="center"><?php echo $i; ?></td>
        <td align="center">Honda Civic 1.8 MT</td>
        <td align="center">Đám cưới</td>
        <td align="center">Honda</td>
        <td align="center"><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
        <td align="left"><?php echo $items['name']; ?>
          <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
          <p>
            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
            <?php endforeach; ?>
          </p>
          <?php endif; ?></td>
        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
        <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      <tr>
        <td colspan="6"></td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()).'/'.$this->cart->total_items(); ?></td>
      </tr>
    </table>
    <p><?php echo form_submit('', 'Update your Cart'); ?></p>
    <?php echo form_close(); ?>
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
