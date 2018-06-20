<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $themeum; 

?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google" content="notranslate">
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
	<meta name="google-site-verification" content="u8FyLuBYzxLwKLV7PL6nVWWSePeg9TD9sqykrU59diA" />
	<!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '964739756966487');
            fbq('track', "PageView");
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=964739756966487&ev=PageView&noscript=1"/>
        </noscript>
    <!-- End Facebook Pixel Code -->
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
	                <div class="collapse navbar-collapse">
	                    <?php if(has_nav_menu('primary')): ?>
							<?php wp_nav_menu( array( 'theme_location' => 'primary','container' => false,'menu_class' => 'nav navbar-nav navbar-left', 'walker' => new Onepage_Walker()) ); ?>
						<?php endif; ?>
						<?php if(has_nav_menu('secondary')): ?>
							<?php wp_nav_menu( array( 'theme_location' => 'secondary','container' => false,'menu_class' => 'nav navbar-nav navbar-right navbar-login', 'walker' => new Onepage_Walker()) ); ?>
						<?php endif; ?>
	                </div>
	                <div class="login-widget">
	                <?php
                    if(is_active_sidebar('login-widget')){
                    dynamic_sidebar('login-widget');
                    }
                ?>
	                </div>
	            </div>
	        </div>
	    </header>