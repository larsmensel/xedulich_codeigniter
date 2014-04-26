<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>
<base href="<?php echo base_url();?>" />

<!-- Core CSS - Include with every page -->
<link href="<?php echo base_url(); ?>../themes/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>../themes/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>../themes/admin/css/admin.css" rel="stylesheet">


<!-- Page-Level Plugin CSS - Dashboard -->
<link href="<?php echo base_url(); ?>../themes/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>../themes/admin/css/plugins/timeline/timeline.css" rel="stylesheet">

<!-- SB Admin CSS - Include with every page -->
<link href="<?php echo base_url(); ?>../themes/admin/css/sb-admin.css" rel="stylesheet">

<script type="text/javascript">var http = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url(); ?>../themes/admin/js/jquery-1.10.2.js"></script> 
<script src="<?php echo base_url(); ?>../themes/admin/js/jquery-ui.min.js"></script> 



</head>

<body>
<div id="wrapper">
  <?php
	$this->load->module('header');
	$this->header->index();
	
	echo $template['body']; 
	
		
?> 
 
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper --> 

<!-- Core Scripts - Include with every page --> 

<script src="<?php echo base_url(); ?>../themes/admin/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>../themes/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script> 

<!-- Page-Level Plugin Scripts - Dashboard --> 
<script src="<?php echo base_url(); ?>../themes/admin/js/plugins/morris/raphael-2.1.0.min.js"></script> 
<?php /*?><script src="<?php echo base_url(); ?>../themes/admin/js/plugins/morris/morris.js"></script> <?php */?>

<!-- SB Admin Scripts - Include with every page --> 
<script src="<?php echo base_url(); ?>../themes/admin/js/sb-admin.js"></script> 

<!-- Page-Level Demo Scripts - Dashboard - Use for reference --> 
<?php /*?><script src="<?php echo base_url(); ?>../themes/admin/js/demo/dashboard-demo.js"></script><?php */?>
</body>
</html>
