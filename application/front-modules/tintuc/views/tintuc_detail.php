<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-chitietin-box">
    <?php
	foreach($results as $row){
		$id_tin=$row->id_tin;
		$TieuDe=$row->TieuDe;
		$TomTat=$row->TomTat;
		$NoiDung=$row->NoiDung;
		$UrlHinh=$row->UrlHinh;
	}
	 ?>
    <h1 class="tt-chitiettin-tieude"> <?php echo $TieuDe ?> </h1>
    <div class="tt-body-ov"> <img class="pull-left" src="<?php echo base_url().'upload/tintuc/'.$UrlHinh;?>" width="150" height="110">
      <div class="tt-body-overl">
        <p class="tt-chitiettin-tomtat"> <?php echo $TomTat ?></p>
      </div>
    </div>
    <div class="clear"></div>
    <div class="tt-content-prod-con"> <?php echo $NoiDung; ?> </div>
  </div>
  <div class="tt-related_posts">
    <h2 class="tt-titletx">Liên quan</h2>
    <ul class="tt-dot-ul">
    	<?php
	foreach($results_tinlienquan as $row2){
		$id_tin2=$row2->id_tin;
		$TieuDe2=$row2->TieuDe;	
	 ?>
      <li><a href="<?php echo base_url().'tintuc/detail/'.$id_tin2; ?>"><?php echo $TieuDe2;?></a></li>
      <?php } ?>
    </ul>
  </div>
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
        <div class="fb-comments" data-href="<?php echo base_url().'tintuc/detail/'.$id_tin; ?>" data-width="660" data-numposts="5" data-colorscheme="light"></div>
    </div>
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
