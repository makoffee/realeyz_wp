<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $themeum; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
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
</head>

<body <?php body_class() ?>
	<div id="page" class="hfeed site">