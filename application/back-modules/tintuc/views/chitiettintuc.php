<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Chi tiết tin tức</h1>
    </div>
    <!-- /.col-lg-12 --> 
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Basic Form Elements </div>
        <div class="panel-body">
         <?php echo form_open('tintuc/themchitiettintuc'); ?>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Tiêu đề</label>
                  <input name="tentin"class="form-control">
                  <p class="help-block">Thông báo lỗi.</p>
                </div>
                <div class="form-group">
                  <label>Tóm tắt</label>
                  <textarea name="tomtattin"class="form-control" rows="3"></textarea>
                  <p class="help-block">Thông báo lỗi.</p>
                </div>
                <div class="form-group">
                  <label>Nội dung</label>
                  <textarea name="noidungtin"class="form-control" rows="3"></textarea>
                  <p class="help-block">Thông báo lỗi.</p>
                </div>
              </div>
              <!-- /.col-lg-6 (nested) -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label>URL Hình</label>
                  <input name="urlhinh"type="file">
                </div>
                <div class="form-group">
                  <label>Ẩn hiện</label>
                  <label class="radio-inline">
                    <input type="radio" name="anhien" id="optionsRadiosInline1" value="1" checked>
                    Hiện </label>
                  <label class="radio-inline">
                    <input type="radio" name="anhien" id="optionsRadiosInline2" value="0">
                    Ẩn </label>
                </div>
                <div class="form-group">
                  <label>Hot</label>
                  <label class="radio-inline">
                    <input type="radio" name="hot" id="optionsRadiosInline1" value="1" checked>
                    Hot </label>
                  <label class="radio-inline">
                    <input type="radio" name="hot" id="optionsRadiosInline2" value="0">
                    Ko hot </label>
                </div>
                <button type="submit" class="btn btn-default">Nhập vào</button>
                <button type="reset" class="btn btn-default">Xóa trắng</button>
              </div>
              <!-- /.col-lg-6 (nested) --> 
            </div>
            <!-- /.row (nested) -->
          <?php echo form_close(); ?>
        </div>
        <!-- /.panel-body --> 
      </div>
      <!-- /.panel --> 
    </div>
    <!-- /.col-lg-12 --> 
  </div>
  <!-- /.row --> 
</div>
