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
    
    <?php $tongtien = $this->cart->total();?>
    
    
    <?php foreach($cart as $item){	
		$TenXe = $item['name'];
		$so_ngay = $item['qty'];
		$Gia = $item['price'];
	 ?>
     <?php echo form_open('giohang'); ?>
    <table class="tt-giohang" width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
        <th width="40%" align="right" scope="row">Tên xe</th>
        <td><?php echo $TenXe; ?></td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Giá/Ngày</th>
        <td><?php echo number_format($Gia,0,",","."); ?> vnđ</td>
      </tr>
      <tr>
        <th width="40%" align="right" scope="row">Số ngày thuê</th>
        <td><?php echo $so_ngay; ?></td>
      </tr>
      <?php $options = $this->cart->product_options($item['rowid']);?>
	  <?php /*?>foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value){ ?>
      <tr>
        <th width="40%" align="right" scope="row"><?php echo $option_name; ?></th>
        <td><?php echo $option_value; ?></td>
      </tr>
      <?php }//end foreach product_options ?><?php */?>
      
      <tr>
        <th width="40%" align="right" scope="row">Tên khách hàng</th>
        <td><?php echo $options['kh_name']; ?></td>
      </tr>
      
      <tr>
        <th width="40%" align="right" scope="row">Số điện thoại</th>
        <td><?php echo $options['kh_phone']; ?></td>
      </tr>
      
      <tr>
        <th width="40%" align="right" scope="row">Email</th>
        <td><?php echo $options['kh_email']; ?></td>
      </tr>
      
      <tr>
        <th width="40%" align="right" scope="row">Ngày thuê xe</th>
        <td><?php echo $options['ngay_thue']; ?></td>
      </tr>
      
      <tr>
        <th width="40%" align="right" scope="row">Đi từ</th>
        <td><?php echo $options['di_tu']; ?></td>
      </tr>
      
      <tr>
        <th width="40%" align="right" scope="row">Đi đến</th>
        <td><?php echo $options['di_den']; ?></td>
      </tr>
      
      <tr>
        <th width="40%" align="right" scope="row">Thành tiền</th>
        <td><strong style="color:#F00;"><?php echo number_format($tongtien,0,",","."); ?> vnđ </strong></td>
      </tr>
      <tr>
        <th colspan="2" scope="row"><input type="text" name="captcha" value="" autocomplete="off"/> <?php echo $image_captcha;?>
          <?php echo form_error('captcha'); ?>
          <?php
		  $loi_captcha='';
		  if(($this->session->userdata('loi_captcha')!="")){
			  $loi_captcha=$this->session->userdata('loi_captcha');
			  $this->session->unset_userdata('loi_captcha');
		  }
		  echo $loi_captcha;
		  ?>
          
          </th>
      </tr>
      <tr>
        <th colspan="2" scope="row"> 
        	<input class="tt-input-form" type="button" onClick="window.location.href='<?php echo base_url().'giohang/datxe/'.$item['id']; ?>'" value="Trở về">
            <input class="tt-input-form" type="submit" value="Xác nhận"> 
        </th>
      </tr>
    </table>
    <?php echo form_close(); ?>
    
    <?php }//end foreach ?>
    <?php }else{
		echo 'Giỏ hàng rỗng';
	} ?>
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
