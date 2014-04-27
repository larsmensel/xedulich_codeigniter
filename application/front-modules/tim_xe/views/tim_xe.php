<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Tìm</h2>
    <ul class="tt-box-grids">
      <?php 
	  foreach($results as $row){
		  $IDchitietxe=$row->IDchitietxe;
		  $TenXe=$row->TenXe;
		  $NamSx=$row->NamSx;
		  $MauXe=$row->MauXe;
		  $UrlHinh=$row->UrlHinh;
	  ?>
      <li> <a href="<?php echo base_url().'xe_detail/'.$IDchitietxe; ?>" class="pull-left"><img src="<?php echo base_url().'upload/xe/'.$UrlHinh;?>" width="150" height="110"></a>
        <div class="tt-body-overl">
          <p class="tt-box-grids-title"> <?php echo $TenXe;?> </p>
          <ul>
            <li><strong>Năm Sản Xuất:</strong> <?php echo $NamSx;?></li>
            <li><strong>Màu xe:</strong> <?php echo $MauXe;?></li>
          </ul>
          <p class="tt-txt-right"><a href="<?php echo base_url().'xe_detail/'.$IDchitietxe; ?>" class="tt-btn-viewmore"> Chi tiết</a> </p>
        </div>
      </li>
      <?php } ?>
    </ul>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
  <div class="tt-phantrang"> <?php echo $phantrang; ?> </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
