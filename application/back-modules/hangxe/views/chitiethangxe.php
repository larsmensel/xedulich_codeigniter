<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Thêm Hãng Xe</h1>
      <?php if($kq_danghangxe!=''){ ?>
      <div class="alert <?php if($kq_danghangxe=='Không thành công'){echo 'alert-danger';}else{echo 'alert-success';} ?>"> <?php echo $kq_danghangxe; ?> </div>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Thêm Hãng Xe</div>
        <div class="panel-body"> <?php echo form_open('hangxe/themchitiethangxe'); ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tên Hãng Xe</label>
                <input name="tenhangxe" class="form-control" value="">
                <?php echo form_error('tenhangxe'); ?> </div>
              <div class="form-group">
                <label>Thứ tự</label>
                <input name="thutu" class="form-control" value="">
                <?php echo form_error('thutu'); ?> </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Ẩn hiện</label>
                <label class="radio-inline">
                  <input type="radio" name="anhien" id="optionsRadiosInline1" value="1" checked>
                  Hiện </label>
                <label class="radio-inline">
                  <input type="radio" name="anhien" id="optionsRadiosInline2" value="0">
                  Ẩn </label>
              </div>
              <button type="submit" class="btn btn-default">Nhập vào</button>
              <button type="reset" class="btn btn-default">Xóa trắng</button>
            </div>
          </div>
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>
