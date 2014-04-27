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
<?php 
	foreach($results as $result){
		$id_tin = $result->id_tin;
		$TieuDe = $result->TieuDe;
		$TomTat = $result->TomTat;
		$NoiDung = $result->NoiDung;
		$UrlHinh = $result->UrlHinh;
		$AnHien = $result->AnHien;
		$Hot = $result->Hot;
	}
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Cập nhật tin tức</h1>
      <?php if($kq_dangtin!=''){ ?>
      <div class="alert <?php if($kq_dangtin=='Không thành công'){echo 'alert-danger';}else{echo 'alert-success';} ?>"> <?php echo $kq_dangtin; ?> </div>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Cập nhật tin tức</div>
        <div class="panel-body"> <?php echo form_open('tintuc/luu_capnhattintuc'); ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Tiêu đề</label>
                <input name="tentin"class="form-control" value="<?php echo $TieuDe;?>">
                <?php echo form_error('tentin'); ?>
              </div>
              <div class="form-group">
                <label>Tóm tắt</label>
                <textarea name="tomtattin"class="form-control" rows="3"><?php echo $TomTat;?></textarea>
                <?php echo form_error('tomtattin'); ?>
              </div>
              <div class="form-group">
                <label>Nội dung</label>
                <textarea name="noidungtin"class="form-control" rows="3"><?php echo $NoiDung;?></textarea>
                <?php echo form_error('noidungtin'); ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Upload Hình</label>
                <div id="upload">
                  <label>Upload Hình</label>
                </div>
                <ul id="files" >
                  <?php if($UrlHinh==''){ ?>
                  <li><img src="<?php echo URL_HTTP;?>/upload/tintuc/noimage.jpg" width="150" alt=""></li>
                  <?php } else{ ?>
                  <li><img width="150" src="<?php echo URL_HTTP.'/upload/tintuc/'.$UrlHinh;?>" ></li>
                  <?php } ?>
                </ul>
                <input type="hidden" name="images" id="images" class="fileold" value="<?php echo (!empty($UrlHinh)) ? $UrlHinh : ""; ?>">
              </div>
              <div class="clearfix"></div>
              <div class="form-group">
                <label>Ẩn hiện</label>
                <label class="radio-inline">
                  <input type="radio" name="anhien" id="optionsRadiosInline1" value="1" <?php echo ($AnHien==1) ? 'checked="checked"' : '';?> >
                  Hiện </label>
                <label class="radio-inline">
                  <input type="radio" name="anhien" id="optionsRadiosInline2" value="0" <?php echo ($AnHien==0) ? 'checked="checked"' : '';?> >
                  Ẩn </label>
              </div>
              <div class="form-group">
                <label>Hot</label>
                <label class="radio-inline">
                  <input type="radio" name="hot" id="optionsRadiosInline1" value="1" <?php echo ($Hot==1) ? 'checked="checked"' : '';?> >
                  Hot </label>
                <label class="radio-inline">
                  <input type="radio" name="hot" id="optionsRadiosInline2" value="0" <?php echo ($Hot=='0') ? 'checked="checked"' : '';?> >
                  Ko hot </label>
              </div>
              <input name="id" type='hidden' class="form-control" value="<?php echo $id_tin;?>">
              <button type="submit" name="btn_update" class="btn btn-default">Cập nhật</button>
              <button type="reset" class="btn btn-default">Hủy</button>
            </div>
          </div>
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>
