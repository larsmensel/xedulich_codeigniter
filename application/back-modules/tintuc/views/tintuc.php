<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Danh sách tin tức</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <div role="grid">
              <div class="row" >
                <div class="col-sm-6" style=" height:55px;">
                  <button class="btn btn-danger" type="button" onclick='DeleteAll()'>Xóa tất cả</button>
                  <button class="btn btn-primary" type="button" onclick='AddCar()'>Thêm tin tức </button>
                </div>
              </div>
              <?php if(!empty($DanhSachTinTuc)): ?>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr role="row">
                    <th style="width: 20px;"> <input type="checkbox" id='selecctall'/>
                    </th>
                    <th style="width: 220px;">Tiêu đề</th>
                    <th style="width: 100px;">Hình</th>
                    <th style="width: 90px;">Hot</th>
                    <th style="width: 90px;">Ngày tạo</th>
                    <th style="width: 87px;">Trạng thái</th>
                    <th style="width: 130px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($DanhSachTinTuc as $key=>$info):
								$images = (!empty($info->UrlHinh)) ? base_url() . "../upload/tintuc/" . $info->UrlHinh : base_url() . '../upload/tintuc/autodaily-mini-2014-1-529x297.jpg';
								$edit = base_url() . 'tintuc/capnhattintuc/'. $info->id_tin;
							?>
                  <tr class="gradeA odd">
                    <td><input type="checkbox" class='selected' name="selected[]" value="<?php echo $info->id_tin;?>"  /></td>
                    <td><?php echo $info->TieuDe;?></td>
                    <td><img width="100" height="80" src="<?php echo $images;?>"></td>
                    <td><?php 
										if($info->Hot ==1){
											?>
                      <button class="btn btn-danger btn-circle" type="button"><i class="fa fa-heart"></i> </button>
                      <?php
										}									
									?></td>
                    <td class="center"><?php echo $info->NgayThang; ?></td>
                    <td class="center"><?php 									
										if($info->AnHien ==1){
										?>
                      <button class="btn btn-info btn-circle" type="button"><i class="fa fa-check"></i> </button>
                      <?php
										}else{
										?>
                      <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button>
                      <?php
										}									
									?></td>
                    <td class="center"><button class="btn btn-primary" onclick="UpdateCar('<?php echo $edit;?>')" type="button">Cập nhật</button>
                      <button class="btn btn-danger" type="button" onclick="DeleteNews('<?php echo $info->id_tin;?>')">Xóa</button></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
              <?php if(!empty($pagination)):?>
              <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                  <div style="float:right"> <?php echo $pagination;?> </div>
                </div>
              </div>
              <?php endif; endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#selecctall').click(function(event) {  
			if(this.checked) { // check select status
				$('.selected').each(function() { //loop through each checkbox
					this.checked = true;  //select all checkboxes with class "checkbox1"              
				});
			}else{
				$('.selected').each(function() { //loop through each checkbox
					this.checked = false; //deselect all checkboxes with class "checkbox1"                      
				});        
			}
		});	   
	});
	function DeleteAll()
	{
		var items = new Array();
		var n = jQuery(".selected:checked").length;
		if (n > 0){				
			jQuery(".selected:checked").each(function(){
				items.push($(this).val());
			});	
			return $.ajax({
				url: http + "tintuc/xoatatcatintuc",
				data:{items:items},
				type:"POST",
				dataType:"json",
				beforeSend:function(){},
			}).done(function(data){
				if(data==1){
					alert('Xóa dữ liệu thành công.');
					window.location.href = http + 'tintuc';
				}else{
					alert('Xóa dữ liệu không thành công. Vui lòng thực hiện lại.');
				}
			});
		}else{			
			alert('Vui lòng chọn dữ liệu để xóa.');						
		}
	}
	function AddCar()
	{
		window.location.href = http + 'tintuc/chitiettintuc';
	}
	function UpdateCar(url)
	{
		window.location.href = url;
	}
	function DeleteNews(id)
	{
		return $.ajax({
			url: http + "tintuc/xoatintuc",
			data:{id:id},
			type:"POST",
			dataType:"json",
			beforeSend:function(){},
		}).done(function(data){
			if(data==1){
				alert('Xóa dữ liệu thành công.');
				window.location.href = http + 'tintuc';
			}else{
				alert('Xóa dữ liệu không thành công. Vui lòng thực hiện lại.');
			}
		});
	}
</script>