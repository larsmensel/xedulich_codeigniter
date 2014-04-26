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
		$IDchitietxe = $row->IDchitietxe;
		$TenXe       = $row->TenXe;
		$NamSx       = $row->NamSx;
		$Bienso      = $row->Bienso;
		$MauXe       = $row->MauXe;
		$UrlHinh     = $row->UrlHinh;
		$Mota        = $row->Mota;
		$TenHangxe   = $row->TenHangxe;
		$TenLoaixe   = $row->TenLoaixe;
		$Gia		 = $row->Gia;
	?>
    <h1 class="tt-detail-style-tt"><?php echo $TenXe ;?></h1>
    <ul class="tt-detail-ul pull-left">
      <li>
        <h2 class="tt-titleh2">Thông tin về xe</h2>
      </li>
      <li><strong>Đời xe:</strong> <?php echo $NamSx;?></li>
      <li><strong>Biển số</strong> <?php echo $Bienso;?></li>
      <li><strong>Loại xe:</strong> <?php echo $TenLoaixe;?></li>
      <li><strong>Hiệu xe:</strong> <?php echo $TenHangxe;?></li>
      <li><strong>Màu xe:</strong> <?php echo $MauXe;?></li>
      <li><strong>Gia:</strong> <?php echo number_format($Gia,0,",","."); ?> vnđ</li>
	  <li><strong>Đặt xe:</strong> <a class="tt-btn-viewmore" href="<?php echo base_url().'giohang/datxe/'.$IDchitietxe;?>">Đặt xe</a></li>
    </ul>
    
     <script>
    	/*$(document).ready(function() {
			var link = "<?php //echo base_url();?>/index.php/"; // Url to your application (including index.php/)
			$("ul.tt-detail-ul form").submit(function() {
		 		// Get the product ID and the quantity
				var id = $(this).find('input[name=product_id]').val();
				var qty = $(this).find('input[name=quantity]').val();
				//alert('ID:' + id + '\n\rQTY:' + qty);
				
				 $.post(link + "cart/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
					function(data){
						// Interact with returned data
				 });
				
				
				return false; // Stop the browser of loading the page defined in the form "action" parameter.
			});
		 
		});*/
    </script>
    
    <div class="tt-detail-hinh pull-right"><img src="<?php echo base_url().'upload/'.$UrlHinh;?>" width="150" height="110" alt=""></div>
    <div class="clear"></div>
    <div class="tt-detail-mota">
      <h2 class="tt-titleh2">Thông tin thêm</h2>
      <div> <?php echo $Mota;?> </div>
    </div>
    <?php } ?>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
  <div class="tn-bxcomment">
    <h2 class="tn-titletx">Bình luận</h2>
    <div id="container-comment">
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=266538110043726";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
      <div class="fb-comments" data-href="<?php echo base_url().'xe_detail/'.$IDchitietxe; ?>" data-width="660" data-numposts="5" data-colorscheme="light"></div>
    </div>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Cùng loại xe <?php echo $TenLoaixe; ?></h2>
    <ul class="tt-box-grids">
      <?php 
	  if(!empty($results_xecung_loai)){ //nếu có dữ liệu liên quan thì hiện ra kết quả
	  foreach($results_xecung_loai as $row_lienquan){
		  $IDchitietxe_cl = $row_lienquan->IDchitietxe;
		  $TenXe_cl       = $row_lienquan->TenXe;
		  $NamSx_cl       = $row_lienquan->NamSx;
		  $MauXe_cl       = $row_lienquan->MauXe;
		  $UrlHinh_cl     = $row_lienquan->UrlHinh;
		  $TenLoaixe_cl   = $row_lienquan->TenLoaixe;
		  $TenHangxe_cl   = $row_lienquan->TenHangxe;
	  ?>
      <li> <a href="<?php echo base_url().'xe_detail/'.$IDchitietxe_cl ;?>" class="pull-left"><img src="<?php echo base_url().'upload/'.$UrlHinh_cl;?>" width="150" height="110"></a>
        <div class="tt-body-overl">
          <p class="tt-box-grids-title"> <?php echo $TenXe_cl;?> </p>
          <ul>
            <li><strong>Năm Sản Xuất:</strong> <?php echo $NamSx_cl ;?></li>
            <li><strong>Loại xe:</strong> <?php echo $TenLoaixe_cl ;?></li>
            <li><strong>Hiệu xe:</strong> <?php echo $TenHangxe_cl ;?></li>
            <li><strong>Màu xe:</strong> <?php echo $MauXe_cl ;?></li>
          </ul>
          <p class="tt-txt-right"><a href="<?php echo base_url().'xe_detail/'.$IDchitietxe_cl ;?>" class="tt-btn-viewmore"> Chi tiết</a> </p>
        </div>
      </li>
      <?php } 
	  }
	  else{
	  	echo 'Không có dữ liệu';
	  }
	  ?>
    </ul>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Cùng hãng xe <?php echo $TenHangxe; ?></h2>
    <ul class="tt-box-grids">
      <?php 
	  if(!empty($results_xecung_hang)){ //nếu có dữ liệu liên quan thì hiện ra kết quả
	  foreach($results_xecung_hang as $row_hang){
		  $IDchitietxe_ch = $row_hang->IDchitietxe;
		  $TenXe_ch       = $row_hang->TenXe;
		  $NamSx_ch       = $row_hang->NamSx;
		  $MauXe_ch       = $row_hang->MauXe;
		  $UrlHinh_ch     = $row_hang->UrlHinh;
		  $TenLoaixe_ch   = $row_hang->TenLoaixe;
		  $TenHangxe_ch   = $row_hang->TenHangxe;
	  ?>
      <li> <a href="<?php echo base_url().'xe_detail/'.$IDchitietxe_ch; ?>" class="pull-left"><img src="<?php echo base_url().'upload/'.$UrlHinh_ch;?>" width="150" height="110"></a>
        <div class="tt-body-overl">
          <p class="tt-box-grids-title"> <?php echo $TenXe_ch;?> </p>
          <ul>
            <li><strong>Năm Sản Xuất:</strong> <?php echo $NamSx_ch;?></li>
            <li><strong>Loại xe:</strong> <?php echo $TenLoaixe_ch;?></li>
            <li><strong>Hiệu xe:</strong> <?php echo $TenHangxe_ch;?></li>
            <li><strong>Màu xe:</strong> <?php echo $MauXe_ch;?></li>
          </ul>
          <p class="tt-txt-right"><a href="<?php echo base_url().'xe_detail/'.$IDchitietxe_ch; ?>" class="tt-btn-viewmore"> Chi tiết</a> </p>
        </div>
      </li>
      <?php } 
	  }
	  else{
	  	echo 'Không có dữ liệu';
	  }
	  ?>
    </ul>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Cùng <?php echo mb_strtolower($results_tenloaithue); ?></h2>
    <ul class="tt-box-grids">
      <?php 
	  if(!empty($results_xecung_loaithue)){ //nếu có dữ liệu liên quan thì hiện ra kết quả
	  foreach($results_xecung_loaithue as $row_thue){
		  $IDchitietxe_ct = $row_thue->IDchitietxe;
		  $TenXe_ct       = $row_thue->TenXe;
		  $NamSx_ct       = $row_thue->NamSx;
		  $MauXe_ct       = $row_thue->MauXe;
		  $UrlHinh_ct     = $row_thue->UrlHinh;
		  $TenLoaixe_ct   = $row_thue->TenLoaixe;
		  $TenHangxe_ct   = $row_thue->TenHangxe;
	  ?>
      <li> <a href="<?php echo base_url().'xe_detail/'.$IDchitietxe_ct; ?>" class="pull-left"><img src="<?php echo base_url().'upload/'.$UrlHinh_ct;?>" width="150" height="110"></a>
        <div class="tt-body-overl">
          <p class="tt-box-grids-title"> <?php echo $TenXe_ct;?> </p>
          <ul>
            <li><strong>Năm Sản Xuất:</strong> <?php echo $NamSx_ct;?></li>
            <li><strong>Loại xe:</strong> <?php echo $TenLoaixe_ct;?></li>
            <li><strong>Hiệu xe:</strong> <?php echo $TenHangxe_ct;?></li>
            <li><strong>Màu xe:</strong> <?php echo $MauXe_ct;?></li>
          </ul>
          <p class="tt-txt-right"><a href="<?php echo base_url().'xe_detail/'.$IDchitietxe_ct; ?>" class="tt-btn-viewmore"> Chi tiết</a> </p>
        </div>
      </li>
      <?php } 
	  }
	  else{
	  	echo 'Không có dữ liệu';
	  }
	  ?>
    </ul>
  </div>
  <div class="clear" style="margin-bottom:10px;"></div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
