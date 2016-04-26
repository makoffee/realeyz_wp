<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $themeum; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php if(isset($themeum['favicon'])){ ?>
		<link rel="shortcut icon" href="<?php echo $themeum['favicon']; ?>" type="image/x-icon"/>
	<?php }else{ ?>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/images/plus.png' ?>" type="image/x-icon"/>
	<?php } ?>

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="https://cleeng.com/js-api/3.0/api.js"></script>
	<?php wp_head(); ?>
	<meta name="google-site-verification" content="C-MKcyCrXIuvy4_vWJq39Kc2MGP31_jr5pRBPASmoEE" />
</head>

<body <?php body_class() ?>>
<div id="page" class="hfeed site">
		<header id="header" class="site-header" role="banner">      
	        <div class="navbar navbar-inverse navbar-fixed-top" role="banner">
	            <div class="container-wide">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>

	                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><h1 class="logo-wrapper">
	                    	<?php
								if (isset($themeum['logo']))
							   {
							   		
									if($themeum['logo_text_en']) {
										echo $themeum['logo_text'];
									}
									else
									{
										if(!empty($themeum['logo'])) {
										?>
											<img class="enter-logo" src="<?php echo $themeum['logo']; ?>" title="">
										<?php
										}else{
											echo get_bloginfo('name');
										}
									}
							   }
								else
							   {
							    	echo get_bloginfo('name');
							   }
							?>
	                    </h1></a>
	                    
	                </div>
	            </div>
	        </div>
	    </header>