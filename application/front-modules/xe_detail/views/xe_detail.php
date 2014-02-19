<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
  	<?php 
	foreach($results as $row){
		$IDchitietxe=$row->IDchitietxe;
		$TenXe=$row->TenXe;
		$NamSx=$row->NamSx;
		$Bienso=$row->Bienso;
		$Mota=$row->Mota;
	?>
  
    <h2 class="tt-box-style-tt"><?php echo $TenXe;?></h2>
    <ul>
      <li><strong>Đời xe:</strong><?php echo $NamSx;?></li>
      <li><strong>Biển số</strong><?php echo $Bienso;?></li>
      <li><strong>Loại xe:</strong>5 Chỗ</li>
      <li><strong>Hiệu xe:</strong>CIVIC</li>
      <li><strong>Màu xe:</strong>Đen - Trắng</li>
    </ul>
    <div><img src="images/car-c1.jpg" width="150" height="110" alt=""></div>
    <div>
      <p>Thông tin thêm</p>
      <div>
      	<?php echo $Mota;?>
      </div>
    </div>
     <?php } ?>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
