
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Chi Tiết Xe</h1>
    </div>
    <!-- /.col-lg-12 --> 
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Nhập Dữ Liệu Chi Tiết Xe </div>
        <div class="panel-body">
            <?php echo form_open('xe/themchitietxe'); ?>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Tên Xe</label>
                  <input name="tenxe" class="form-control">
                  <p class="help-block"> aaaaaaaaa</p>
                </div>
                <div class="form-group">
                  <label> Năm Sản Xuất </label>
                  <input name="namsx" class="form-control">
                  <p class="help-block"> aaaaaaaaa</p>
                </div>
                <div class="form-group">
                  <label>Biển Số </label>
                  <input name="bienso" class="form-control">
                  <p class="help-block"> aaaaaaaaa</p>
                </div>
                <div class="form-group">
                  <label>Màu Xe</label>
                  <input name="mauxe" class="form-control">
                  <p class="help-block"> aaaaaaaaa</p>
                </div>
              </div>
              <!-- /.col-lg-6 (nested) -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label> Hình ảnh</label>
                  <input name="hinhanh" type="file">
                </div>
                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea name="mota" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Giá</label>
                  <input name="gia" class="form-control">
                  <p class="help-block"> aaaaaaaaa</p>
                </div>
                <div class="form-group">
                  <label> Loại Xe</label>
                  <select name="loaixe" class="form-control">
                    <option>4 chỗ</option>
                    <option>7 chỗ </option>
                    <option>16 chỗ</option>
                    <option>24 chỗ</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Hãng Xe</label>
                  <select name="hangxe" class="form-control">
                    <option>Toyota</option>
                    <option>Honda</option>
                    <option>Innova</option>
                  </select>
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
