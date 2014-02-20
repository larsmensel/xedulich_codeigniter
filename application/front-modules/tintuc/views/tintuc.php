<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
 	<h2 class="tt-box-style-tt">Tin Tức</h2>
    <ul class="tt-tintuc-style">
    <?php 
	foreach($results as $row){
		$id_tin=$row->id_tin;
		$TieuDe=$row->TieuDe;
		$UrlHinh=$row->UrlHinh;
		$TomTat=$row->TomTat;
	?>
      <li> <a href="<?php echo base_url().'tintuc/detail/'.$id_tin; ?>" class="pull-left"> <img src="<?php echo base_url().'upload/tintuc/'.$UrlHinh;?>" width="150" height="110"></a>
        <div class="tt-body-overl"> <a href="<?php echo base_url().'tintuc/detail/'.$id_tin; ?>" class="tt-tintuc-tieude">
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
<?php
$this->load->module('right');
$this->right->index();
?>
