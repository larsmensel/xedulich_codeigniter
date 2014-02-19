<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
 
    <ul class="tt-tintuc-style">
    <?php 
	foreach($results as $row){
		$id_tin=$row->IDchitietxe;
		$TieuDe=$row->TenXe;
		$UrlHinh=$row->Bienso;
		$TomTat=$row->NamSx;
	?>
      <li> <a href="<?php echo base_url().'home/category_xe/'.$id_tin; ?>" class="pull-left"> <img src="<?php echo base_url().'upload/'.$UrlHinh?>" width="150" height="110"></a>
        <div class="tt-body-overl"> <a href="<?php echo base_url().'home/category_xe/'.$id_tin; ?>" class="tt-tintuc-tieude">
          <h3> <?php echo $TieuDe ?></h3>
          </a>
          <p class="tt-sumary"> <?php echo $TomTat ?></p>
        </div>
        <div class="clear"></div>
      </li>
    <?php } ?>  
      
    </ul>
    
    <div class="tt-phantrang">
    <?php echo $phantrang; ?>
    </div>
  </div>
</div>

<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt"> <?php echo $value['TenThue'];?></h2>
    <ul class="tt-box-grids">
      <?php foreach($results as $row):
		$id_tin=$row->IDchitietxe;
		$TenXe=$row->TenXe;
		$Bienso=$row->Bienso;
		$NamSx=$row->NamSx;
	  ?>
      <li> <a href="#" class="pull-left"><img src="<?php echo base_url(); ?>themes/front/images/car-m1.jpg" width="150" height="110"></a>
        <div class="tt-body-overl">
          <p class="tt-box-grids-title"> <?php echo $TenXe ;?></p>
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
  <div class="tt-phantrang">
  	<?php echo $phantrang; ?>
  </div>
</div>

<?php
$this->load->module('right');
$this->right->index();
?>
