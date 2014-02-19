<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <?php 
  if(!empty($object)):
	foreach($object as $key=>$value):
  ?>
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt"><a href="<?php echo base_url().'xe_category/'.$value['IDThue']; ?>"><?php echo $value['TenThue'];?></a></h2>
    <ul class="tt-box-grids">
      <?php foreach($value['sub'] as $key=>$info):?>
      <li> <a href="<?php echo base_url().'xe_detail/'.$info['IDchitietxe']; ?>" class="pull-left"><img src="<?php echo base_url().'upload/'.$info['UrlHinh'];?>" width="150" height="110"></a>
        <div class="tt-body-overl">
          <p class="tt-box-grids-title"> <?php echo $info['TenXe'];?></p>
          <ul>
            <li><strong>Năm Sản Xuất:</strong> <?php echo $info['NamSx'];?></li>
            <li><strong>Loại xe:</strong> <?php echo $info['TenLoaixe'];?></li>
            <li><strong>Hiệu xe:</strong> <?php echo $info['TenHangxe'];?></li>
            <li><strong>Màu xe:</strong> <?php echo $info['MauXe'];?></li>
          </ul>
          <p class="tt-txt-right"><a href="<?php echo base_url().'xe_detail/'.$info['IDchitietxe']; ?>" class="tt-btn-viewmore"> Chi tiết</a> </p>
        </div>
      </li>
      <?php endforeach;?>
    </ul>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
  <?php 
  	endforeach;
  endif;?>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
