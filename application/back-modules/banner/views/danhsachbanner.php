<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Danh sách Banner <a href="<?php echo base_url().'banner/thembanner/'; ?>" class="btn btn-default">Thêm banner mới</a></h1>
    </div>
    <!-- /.col-lg-12 --> 
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Danh sách banner </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>URL hình</th>
                  <th>Link tới đường dẫn</th>
                  <th>Tùy chỉnh</th>
                </tr>
              </thead>
              <tbody>
              <?php 
	foreach($result as $row){
		$id_banner=$row->IDBanner;
		$UrlHinh=$row->urlhinh;
		$Link=$row->link;
	?>
                <tr class="odd gradeX">
                  
                  <td><?php echo $id_banner ?></td>
                  <td><?php echo $UrlHinh ?></td>
                  <td><?php echo $Link ?></td>
                  <td class="center"><a class="btn btn-default">Xóa</a><a class="btn btn-default">Chỉnh sửa</a></td>
                  
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive --> 
          
        </div>
        <!-- /.panel-body --> 
      </div>
      <!-- /.panel --> 
    </div>
    <!-- /.col-lg-12 --> 
  </div>
  <!-- /.row --> 
  
</div>
