<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">XE <a href="<?php echo base_url().'xe/chitietxe/'; ?>" class="btn btn-default">Thêm Xe Mới</a></h1> 
    </div>
    <!-- /.col-lg-12 --> 
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Danh sách Hãng Xe </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên Xe</th>
                  <th>Biển số</th>
                  <th>Màu xe</th>
                  <th>Tùy chỉnh</th>
                </tr>
              </thead>
              <tbody>
                
                <?php 
	foreach($result as $row){
		$IDchitietxe=$row->IDchitietxe;
		$TenXe=$row->TenXe;
		$Bienso=$row->Bienso;
		$MauXe=$row->MauXe;		
	?>
                <tr class="odd gradeX">
                  
                  <td><?php echo $IDchitietxe ?></td>
                  <td><?php echo $TenXe ?></td>
                  <td><?php echo $Bienso ?></td>
                  <td class="center"><?php echo $MauXe ?></td>
                  <td class="center"><a class="btn btn-default">Xóa</a> <a class="btn btn-default">Chỉnh sửa</a></td>
                  
                </tr>
                <?php } ?>  
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