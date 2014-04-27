<script language="javascript" src="<?php echo base_url();?>../themes/admin/js/ajaxupload.js"></script>
<script type="text/javascript">
$(function(){
	var btnUpload=$('#upload');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: '<?php echo base_url();?>tintuc/upload_img',
		name: 'uploadfile',     			 			   			
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                // extension is not allowed 
				status.text('Chỉ Cho Phép các định dạng ảnh JPG, PNG hoặc GIF ');
				return false;
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list    
			 $('ul#files').text(''); 				
			if(response!=="error"){ 
				$('<li></li>').appendTo('#files').html('<img width="170" src="'+response+'"/>');
				$('#images').val(file); 
			} else{
				$('<li></li>').appendTo('#files').text('Upload file '+file+' error ').addClass('error');
			}
		}
	});	
});   
</script>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Thêm tin tức</h1>
      <?php if($kq_dangtin!=''){ ?>
      <div class="alert <?php if($kq_dangtin=='Không thành công'){echo 'alert-danger';}else{echo 'alert-success';} ?>"> <?php echo $kq_dangtin; ?> </div>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Thêm tin tức</div>
        <div class="panel-body"> <?php echo form_open('tintuc/themchitiettintuc'); ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tiêu đề</label>
                <input name="tentin"class="form-control">
                <?php echo form_error('tentin'); ?> </div>
              <div class="form-group">
                <label>Tóm tắt</label>
                <textarea name="tomtattin"class="form-control" rows="3"></textarea>
                <?php echo form_error('tomtattin'); ?> </div>
              <div class="form-group">
                <label>Nội dung</label>
                <textarea name="noidungtin"class="form-control" rows="3"></textarea>
                <?php echo form_error('noidungtin'); ?> </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Upload Hình</label>
                <div id="upload"><label>Upload Hình</label></div>
                <ul id="files" >
                </ul>
                <input type="hidden" name="images" id="images" class="fileold">
              </div>
              <div class="clearfix"></div>
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
                  <input type="radio" name="hot" id="optionsRadiosInline1" value="1" >
                  Hot </label>
                <label class="radio-inline">
                  <input type="radio" name="hot" id="optionsRadiosInline2" value="0" checked>
                  Ko hot </label>
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
