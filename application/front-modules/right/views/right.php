<div class="tt-main-right">
  <div class="tt-main-right-box">
  	 <?php 
	  foreach($results_tinnoibat as $row){
		  $id_tin=$row->id_tin;
		  $TieuDe=$row->TieuDe;
		  $UrlHinh=$row->UrlHinh;
	  ?>
    <p class="tt-main-right-title">TIN TỨC NỔI BẬT</p>
    <div class="tt-main-right-in box-news"> <a title="<?php echo $TieuDe;?>" href="<?php echo base_url().'tintuc/detail/'.$id_tin; ?>"><img style="width:100%" alt="<?php echo $TieuDe;?>" src="<?php echo base_url().'upload/tintuc/'.$UrlHinh;?>"></a>
      <h6><a class="box-news-tt" href="#"><?php echo $TieuDe;?></a></h6>
    </div>
    <?php } ?>
  </div>
  <div class="tt-main-right-box">
    <p class="tt-main-right-title">TƯ VẤN KHÁCH HÀNG</p>
    <div class="tt-main-right-in box-chatbox">
      <p> <a href="ymsgr:sendIM?chobekeo_beseyeuanh"><img src="http://opi.yahoo.com/online?u=chobekeo_beseyeuanh&amp;m=g&amp;t=14" alt="Tư vấn 1"><span class="style11">Nhân viên tư vấn 1</span></a> </p>
      <p> <a href="ymsgr:sendIM?kimthinh_12"><img src="http://opi.yahoo.com/online?u=kimthinh_12&amp;m=g&amp;t=14" alt="Tư vấn 2"><span class="style11">Nhân viên tư vấn 2</span></a> </p>
    </div>
  </div>
  <div class="tt-main-right-box">
    <p class="tt-main-right-title">TÌM CHÚNG TÔI TRÊN FACEBOOK</p>
    <div class="tt-main-right-in box-facebook">
      <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpaywebvn&amp;width=287&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:287px; height:258px;" allowTransparency="true"></iframe>
    </div>
  </div>
</div>
<div class="clear"></div>
</div>
</div>
