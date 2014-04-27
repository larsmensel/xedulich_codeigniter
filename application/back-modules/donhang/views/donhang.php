<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Danh sách loại xe</h1>
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
                </div>
              </div>
              <?php if(!empty($results)): ?>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr role="row">
                    <th style="width: 20px;"> <input type="checkbox" id='selecctall'/>
                    </th>
                    <th style="width: 220px;">Tên khách hàng</th>
                    <th style="width: 100px;">Tên Xe</th>
                    <th style="width: 90px;">Tổng Tiền</th>
                    <th style="width: 130px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($results as $key=>$info):
								$edit = base_url() . 'donhang/capnhatdonhang/'. $info->id_giohang;
							?>
                  <tr class="gradeA odd">
                    <td><input type="checkbox" class='selected' name="selected[]" value="<?php echo $info->id_giohang;?>"  /></td>
                    <td><?php echo $info->TenKH;?></td>
                    <td><?php echo $info->TenXe;?></td>
                    <td class="center"><?php echo $info->TongTien;?></td>
                    <td class="center"><button class="btn btn-primary" onclick="Updatedonhang('<?php echo $edit;?>')" type="button">Cập nhật</button>
                      <button class="btn btn-danger" type="button" onclick="Deletedonhang('<?php echo $info->id_giohang;?>')">Xóa</button></td>
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
				url: http + "donhang/xoatatcadonhang",
				data:{items:items},
				type:"POST",
				dataType:"json",
				beforeSend:function(){},
			}).done(function(data){
				if(data==1){
					alert('Xóa dữ liệu thành công.');
					window.location.href = http + 'donhang';
				}else{
					alert('Xóa dữ liệu không thành công. Vui lòng thực hiện lại.');
				}
			});
		}else{			
			alert('Vui lòng chọn dữ liệu để xóa.');						
		}
	}
	function Updatedonhang(url)
	{
		window.location.href = url;
	}
	function Deletedonhang(id)
	{
		return $.ajax({
			url: http + "donhang/xoadonhang",
			data:{id:id},
			type:"POST",
			dataType:"json",
			beforeSend:function(){},
		}).done(function(data){
			if(data==1){
				alert('Xóa dữ liệu thành công.');
				window.location.href = http + 'donhang';
			}else{
				alert('Xóa dữ liệu không thành công. Vui lòng thực hiện lại.');
			}
		});
	}
</script>