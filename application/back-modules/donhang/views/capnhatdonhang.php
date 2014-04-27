<?php 
	foreach($results as $result){
		$id_giohang		=	$result->id_giohang;
		$TenKH		=	$result->TenKH;
		$SDT			=	$result->SDT;
		$Email			=	$result->Email;
		$TenXe			=	$result->TenXe;
		$NgayThue		=	$result->NgayThue;
		$SoNgay			=	$result->SoNgay;
		$Tu				=	$result->Tu;
		$Den			=	$result->Den;
		$TongTien		=	$result->TongTien;
		$TinhTrang		=	$result->TinhTrang;
	}
?>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Cập Nhật Đơn Hàng</h1>
      <?php if($kq_dangdonhang!=''){ ?>
      <div class="alert <?php if($kq_dangdonhang=='Không thành công'){echo 'alert-danger';}else{echo 'alert-success';} ?>"> <?php echo $kq_dangdonhang; ?> </div>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Cập Nhật Đơn Hàng</div>
        <div class="panel-body"> <?php echo form_open('donhang/luu_capnhatdonhang'); ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tên đơn hàng</label>
                <input name="tenkh" class="form-control" value="<?php echo $TenKH;?>">
                <?php echo form_error('tendonhang'); ?> </div>
              <div class="form-group">
                <label>Số điện thoại</label>
                <input name="sdt" class="form-control" value="<?php echo $SDT;?>">
                <?php echo form_error('sdt'); ?> </div>
              <div class="form-group">
                <label>Email</label>
                <input name="email" class="form-control" value="<?php echo $Email;?>">
                <?php echo form_error('email'); ?> </div>
              <div class="form-group">
                <label>Tên xe</label>
                <input name="tenxe" class="form-control" value="<?php echo $TenXe;?>">
                <?php echo form_error('tenxe'); ?> </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Ngày Thuê</label>
                <input name="ngaythue" class="form-control" value="<?php echo $NgayThue;?>">
                <?php echo form_error('ngaythue'); ?> </div>
              <div class="form-group">
                <label>Số Ngày</label>
                <input name="songay" class="form-control" value="<?php echo $SoNgay;?>">
                <?php echo form_error('songay'); ?> </div>
              <div class="form-group">
                <label>Từ</label>
                <input name="tu" class="form-control" value="<?php echo $Tu;?>">
                <?php echo form_error('tu'); ?> </div>
                <div class="form-group">
                <label>Đến</label>
                <input name="den" class="form-control" value="<?php echo $Den;?>">
                <?php echo form_error('den'); ?> </div>
                <div class="form-group">
                <label>Tổng Tiền</label>
                <input name="tongtien" class="form-control" value="<?php echo $TongTien;?>">
                <?php echo form_error('tongtien'); ?> </div>
                
                
              <div class="form-group">
                <label>Tình Trạng</label>
                <label class="radio-inline">
                  <input type="radio" name="anhien" id="optionsRadiosInline1" value="1" <?php echo ($TinhTrang==0) ? 'checked="checked"' : '';?>>
                  Đang xử lý </label>
                <label class="radio-inline">
                  <input type="radio" name="anhien" id="optionsRadiosInline2" value="0" <?php echo ($TinhTrang==1) ? 'checked="checked"' : '';?>>
                  Hoàn tất </label>
              </div>
              <input name="id" type='hidden' class="form-control" value="<?php echo $id_giohang;?>">
              <button type="submit" class="btn btn-default">Cập nhật</button>
              <button type="reset" class="btn btn-default">Xóa trắng</button>
            </div>
          </div>
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>
