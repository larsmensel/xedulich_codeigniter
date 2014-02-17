<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <?php if(!empty($object)):
			foreach($object as $key=>$value):
	?>
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt"> <?php echo $value['TenThue'];?></h2>
    <ul class="tt-box-grids">
      <?php foreach($value['sub'] as $key=>$info):?>
      <li> <a href="#" class="pull-left"><img src="<?php echo base_url(); ?>themes/front/images/car-m1.jpg" width="150" height="110"></a>
        <div class="tt-body-overl">
          <p class="tt-box-grids-title"> <?php echo $info['TenXe'];?></p>
          <ul>
            <li><strong>Hiệu:</strong> Honda</li>
            <li><strong>Dòng xe:</strong>Civic</li>
            <li><strong>Đời xe:</strong> 2008 -2012</li>
            <li><strong>Kiểu xe:</strong> 05 chỗ</li>
          </ul>
          <p class="tt-txt-right"><a href="#" class="tt-btn-viewmore"> Chi tiết</a> </p>
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
