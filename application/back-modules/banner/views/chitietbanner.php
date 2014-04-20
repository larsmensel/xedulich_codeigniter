<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Chi tiết banner</h1>
    </div>
    <!-- /.col-lg-12 --> 
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Thêm mới tin tức </div>
        <div class="panel-body">
         <?php echo form_open('banner/thembanner'); ?>
            <div class="row">
              <div class="col-lg-6">
                
                <div class="form-group">
                  <label>URL Hình</label>
                  <input name="urlhinh"type="file">
                </div>
                
                <div class="form-group">
                  <label>Đường link dẫn đến</label>
                  <textarea name="link"class="form-control" rows="3"></textarea>
                  <p class="help-block">Thông báo lỗi.</p>
                </div>
                
                <button type="submit" class="btn btn-default">Nhập vào</button>
                <button type="reset" class="btn btn-default">Xóa trắng</button>
              </div>
              <!-- /.col-lg-6 (nested) -->
              
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
