<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Bảng giá</h2>
    <table class="tt-giohang" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>STT</td>
    <td>Tên xe</td>
    <td>Giá</td>
  </tr>
	<?php $i=1;
	  foreach($results as $row){
		  $IDchitietxe=$row->IDchitietxe;
		  $TenXe=$row->TenXe;
		  $Gia=$row->Gia;
			
	  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $TenXe;?></td>
    <td><?php echo number_format($Gia,0,",","."); ?> vnđ</td>
  </tr>
  <?php 
  	$i++;
  } ?>
</table>

  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
  <div class="tt-phantrang"> <?php echo $phantrang; ?> </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
