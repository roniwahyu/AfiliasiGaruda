<!DOCTYPE html>
<html lang="en">
<head>
		<title>GarudaAffiliate | <?php echo ((isset($title)) ?  $title: "&nbsp"); ?></title>


		<!-- load bootstrap -->
	<link href="<?php echo base_url(); ?>assets/bootstrap/backup_bootstrapku.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>assets/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>assets/bootstrap/style.css" rel="stylesheet" media="screen">
	<!-- bootstrap jquery -->
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js" ></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js" ></script>
	<link href="<?php echo base_url(); ?>assets/bootstrap/font-awesome.css" rel="stylesheet" media="screen">

<script type="text/javascript">

        $('.coba').popover(
 			trigger : "hover"
  		// 	placement: 'right',
  		// content: function(){return '<img src="'+$(this).data('img') + '" />';}
        );
</script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style type="text/css">
	.controls{
		margin: 5px 0px;
	}


</style>

<body>
		<div class="navbar navbar-fixed-top" style="-webkit-box-shadow: 0 8px 10px -3px rgba(175,175,175, 0.44);-moz-box-shadow: 0 8px 6px -3px rgba(175,175,175, 0.44);box-shadow: 0 8px 6px -3px rgba(175,175,175, 0.44);">
		  <div class="navbar-inner" style="padding-top:10px;">
		  	<div class="container">
		  		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		    <a class="brand" href="<?php echo base_url();?>home">
		    	<img src="<?php echo base_url(); ?>assets/img/logo.png" style="margin-top:-25px;">
		    	
		    </a>
			<div class="nav-collapse collapse">
		    <?php echo $menus; ?>
		</div>
		 </div>
  
          </div>
          </div>
     
    
    