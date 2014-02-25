<div class="tt-main-full">
<div class="tt-main">
<?php
$this->load->module('banner');
$this->banner->index();
?>
<div class="clear"></div>
<div class="tt-main-left">
  <div class="tt-box-style">
    <h2 class="tt-box-style-tt">Liên hệ</h2>
    <div class="tt-contactform">
      <div class="pull-right tt-mapgg">
        <div id="map1" style="width: 320px; height: 320px; border: 1px solid #777; overflow: hidden;"></div>
        <script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyDx4kSR9R_VNsZdrRdxxAz1bzaW6jLCQqo"></script> 
        <script type="text/javascript" src="<?php echo base_url();?>themes/front/js/jquery.gmap-1.1.0-min.js"></script> 
        <script>
            $("#map1").gMap({markers: [{ latitude: 10.762176,longitude: 106.682417,html: "Lớp CNTT4- ĐH Sư Phạm TP.HCM, Số 280 An Dương Vương Quận 5 TP. Hồ Chí Minh",popup: true }],zoom: 19 });
            </script> 
      </div>
      <div class="tt-body-overr">
        <ul class="tt-contactform-ul">
          <li style="list-style-image:url(<?php echo base_url();?>themes/front/images/icon/con_address.png)">Lớp CNTT4- ĐH Sư Phạm TP.HCM, Số 280 An Dương Vương Quận 5 TP. Hồ Chí Minh</li>
          <li style="list-style-image:url(<?php echo base_url();?>themes/front/images/icon/emailButton.png)"> <a href="mailto:xedulich@gmail.com">xedulich@gmail.com</a></li>
          <li style="list-style-image:url(<?php echo base_url();?>themes/front/images/icon/con_mobile.png)"> 0932058209</li>
          <li style="list-style-image:url(<?php echo base_url();?>themes/front/images/icon/con_mobile.png)"> 0906644305</li>
        </ul>
      </div>
      <div class="clear"></div>
      <div class="tt-contactform-form">
        <div class="tt-sty-form">
        
        
		<?php
      	$thongbao='';
		if(($this->session->userdata('thongbaokq')!="")){
			$thongbao=$this->session->userdata('thongbaokq');
			$this->session->unset_userdata('thongbaokq');
		}
		echo $thongbao;
		?>
        
        
          <?php //echo validation_errors(); ?>
          <?php echo form_open('lienhe'); ?>
          <div>
            <h5>Tên bạn:</h5>
            <input type="text" name="name" value="<?php echo set_value('name'); ?>" size="50" />
            <?php echo form_error('name'); ?> </div>
          <div>
            <h5>Địa chỉ email:</h5>
            <input type="email" name="email" value="<?php echo set_value('email'); ?>" size="50" />
            <?php echo form_error('email'); ?> </div>
          <div>
            <h5>Tiêu đề thông điệp:</h5>
            <input type="text" name="tieude" value="<?php echo set_value('tieude'); ?>" size="50" />
            <?php echo form_error('tieude'); ?> </div>
          <div>
            <h5>Nội dung</h5>
            <textarea style="width:316px; resize:none;height:150px;" name="noidung" id="noidung"><?php echo set_value('noidung'); ?></textarea>
<?php echo form_error('noidung'); ?> </div>
          <div>
          <h5>Mã xác nhận</h5>
          <input type="text" name="captcha" value="" autocomplete="off"/> <?php echo $image_captcha;?>
          <?php echo form_error('captcha'); ?>
          
          <?php
		  $loi_captcha='';
		  if(($this->session->userdata('loi_captcha')!="")){
			  $loi_captcha=$this->session->userdata('loi_captcha');
			  $this->session->unset_userdata('loi_captcha');
		  }
		  echo $loi_captcha;
		  ?>
          
          </div>
          <div>
            <input class="tt-input-form" name="btn_lienhe" type="submit" value="Gửi" />
          </div>
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>
<?php
$this->load->module('right');
$this->right->index();
?>
