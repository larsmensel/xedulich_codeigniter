<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> ::..Đăng nhập Admin..:::</title>

<!-- Core CSS - Include with every page -->
<link href="<?php echo base_url(); ?>../themes/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="<?php echo base_url(); ?>../themes/admin/css/sb-admin.css" rel="stylesheet">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Please Sign In</h3>
        </div>
        <div class="panel-body"> <?php echo form_open('home/dangnhap'); ?>
          <fieldset>
            <div class="form-group">
              <input class="form-control" placeholder="Username" id="user_name" name="user_name" type="text">
              <?php echo form_error('user_name'); ?> </div>
            <div class="form-group">
              <input class="form-control" placeholder="Password" name="password" type="password" value="">
              <?php echo form_error('password'); ?> </div>
            <div class="checkbox">
              <label>
                <input name="remember" type="checkbox" value="Remember Me">
                Remember Me </label>
            </div>
            <!-- Change this to a button or input when using this as a form -->
            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
          </fieldset>
          <?php echo form_close(); ?> <?php echo $error_signin;?> </div>
      </div>
    </div>
  </div>
</div>

<!-- Core Scripts - Include with every page --> 
<script src="<?php echo base_url(); ?>../themes/admin/js/jquery-1.10.2.js"></script> 
<script src="<?php echo base_url(); ?>../themes/admin/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>../themes/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script> 

<!-- SB Admin Scripts - Include with every page --> 
<script src="<?php echo base_url(); ?>../themes/admin/js/sb-admin.js"></script>
</body>
</html>
