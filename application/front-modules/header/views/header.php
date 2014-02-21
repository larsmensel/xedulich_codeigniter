<div class="tt-wrapper">
<div class="tt-header-full">
  <div class="tt-header">
    <div class="tt-logo"><a href="<?php echo base_url();?>"> <img src="<?php echo base_url(); ?>themes/front/images/logo.png" width="240" height="50"></a> </div>
    <div class="tt-search">
      <form name="form1" method="post" action="">
        <input type="text" class="tt-search-input" value="Tìm kiếm: Loại xe, Hãng Xe, Hình thức thuê" id="search" name="search" onfocus="if (this.value == 'Tìm kiếm: Loại xe, Hãng Xe, Hình thức thuê') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Tìm kiếm: Loại xe, Hãng Xe, Hình thức thuê';}" autocomplete="off">
        <input  class="tt-search-btn" type="submit" name="search_btn" id="search_btn" value="Tìm">
      </form>
    </div>
    <ul class="tt-menu-usertop">
    	<?php 
		if(($this->session->userdata('user_name')!=""))
		{
		?>
        	<li><a href="<?php echo base_url().'user/thongtin_canhan'; ?>"><?php echo 'Xin chào '.$this->session->userdata('user_name');?></a></li>
            <li><a href="<?php echo base_url().'user/thoat'; ?>">Thoát</a></li>
			
		<?php
		}
		else{ ?>
			<li><a href="<?php echo base_url().'user'; ?>">Đăng Nhập</a> </li>
      		<li><a href="<?php echo base_url().'user/dangky'; ?>">Đăng Ký</a> </li>
		<?php
        }
		?>
      
    </ul>
    <div class="clear"></div>
  </div>
</div>