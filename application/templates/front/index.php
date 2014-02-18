<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en-US" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="en-US" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>.::<?php echo $title; ?>::.</title>
<link href='<?php echo base_url(); ?>themes/front/css/reset.css' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url(); ?>themes/front/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>themes/front/css/fonts.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>themes/front/css/media-queries.css" rel="stylesheet" type="text/css">
<!--js cho banner-->
<script type="text/javascript" src="<?php echo base_url(); ?>themes/front/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>themes/front/js/jquery.cycle2.js" ></script>
</head>
<body>
<?php
	$this->load->module('header');
	$this->header->index();
	
	echo $template['body']; 
	
	$this->load->module('footer');
	$this->footer->index();
?> 
</body>
</html>
