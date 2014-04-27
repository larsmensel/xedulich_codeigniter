<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Danh sách xe</h1>
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
                  <button class="btn btn-primary" type="button" onclick='AddCar()'>Thêm xe </button>
                </div>
              </div>
              <?php if(!empty($results)): ?>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr role="row">
                    <th style="width: 20px;"> <input type="checkbox" id='selecctall'/>
                    </th>
                    <th style="width: 220px;">Tên Xe</th>
                    <th style="width: 100px;">Hình</th>
                    <th style="width: 90px;">Giá</th>
                    <th style="width: 90px;">Biển số</th>
                    <th style="width: 87px;">Màu xe</th>
                    <th style="width: 130px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($results as $key=>$info):
								$images = (!empty($info->UrlHinh)) ? base_url() . "../upload/xe/" . $info->UrlHinh : base_url() . '../upload/xe/noimage.jpg';
								$edit = base_url() . 'xe/capnhatxe/'. $info->IDchitietxe;
							?>
                  <tr class="gradeA odd">
                    <td><input type="checkbox" class='selected' name="selected[]" value="<?php echo $info->IDchitietxe;?>"  /></td>
                    <td><?php echo $info->TenXe;?></td>
                    <td><img width="100" src="<?php echo $images;?>"></td>
                    <td><?php echo number_format($info->Gia,0,",",".");?>vnđ</td>
                    <td class="center"><?php echo $info->Bienso;?></td>
                    <td class="center"><?php echo $info->MauXe;?></td>
                    <td class="center"><button class="btn btn-primary" onclick="UpdateCar('<?php echo $edit;?>')" type="button">Cập nhật</button>
                      <button class="btn btn-danger" type="button" onclick="DeleteCar('<?php echo $info->IDchitietxe;?>')">Xóa</button></td>
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
				url: http + "xe/xoatatcaxe",
				data:{items:items},
				type:"POST",
				dataType:"json",
				beforeSend:function(){},
			}).done(function(data){
				if(data==1){
					alert('Xóa dữ liệu thành công.');
					window.location.href = http + 'xe';
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
		window.location.href = http + 'xe/chitietxe';
	}
	function UpdateCar(url)
	{
		window.location.href = url;
	}
	function DeleteCar(id)
	{
		return $.ajax({
			url: http + "xe/xoaxe",
			data:{id:id},
			type:"POST",
			dataType:"json",
			beforeSend:function(){},
		}).done(function(data){
			if(data==1){
				alert('Xóa dữ liệu thành công.');
				window.location.href = http + 'xe';
			}else{
				alert('Xóa dữ liệu không thành công. Vui lòng thực hiện lại.');
			}
		});
	}
</script>