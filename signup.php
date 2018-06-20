<?php
/*
 * Template Name: Signup
 */ 

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $themeum; ?>
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
	<style>
	#menu-item-459 { display: none !important;}
	</style>
	<?php wp_head(); ?>

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
<?php
	$args = array( 'post_type' => 'page');
	$allPosts = new WP_Query( $args ); // get pages on menu
	$parallaxId = array();

	if (have_posts()) {
		// Start the Loop.
		while ( have_posts() ) { the_post();
			// set global $post
			global $post;

			$separator 				= get_post_meta( $post->ID, 'thm_no_hash', true );
			$page_section 			= get_post_meta( $post->ID, 'thm_section_type', true );
			$no_title 				= get_post_meta( $post->ID, 'thm_no_title', true );
			$menu_disable 			= get_post_meta( $post->ID, 'thm_disable_menu', true );
			$remove_pad 			= get_post_meta( $post->ID, 'thm_remove_pad', true );
			$page_title 			= get_post_meta( $post->ID, 'thm_page_title', true );
			$page_subtitle 			= get_post_meta( $post->ID, 'thm_page_subtitle', true );
			$image                  = get_post_meta( $post->ID, 'thm_background_url', true );
			$background_color       = get_post_meta( $post->ID, 'thm_bg_color', true );
            
            
			$pad_class = '';

			if($remove_pad != 1){
				$pad_class = 'page-wrapper ';
			}

			$postId = get_the_ID();

			if(( $separator != 1 ) && ( $postId != $current_page_id ))
			{
				if( $page_section == 'default' ){		// Default Content Page
				?>
					<section id="<?php echo $post->post_name; ?>" class="<?php echo $pad_class; ?>" <?php if($background_color != ""): ?> style='background-color:<?php echo $background_color ?>;'<?php elseif($image !=""): ?> style='background-image:url(<?php echo $image ?>); background-size:cover; background-position: top center;'<?php endif; ?>>
						<?php if( $no_title != 1 ){ ?>
							<div class="clearfix title-wrap">
                                <h2 class="title <?php if($background_color != ""): ?>white<?php elseif($image != ""): ?>white<?php endif; ?>">	
                    <?php if($page_title != '') { echo $page_title; }else{ echo get_the_title(); } ?> </h2>
							</div>
						<?php }?>
						<div class="container page-content <?php if($background_color != ""): ?>white<?php elseif($image != ""): ?>white<?php endif; ?>">
							<?php echo do_shortcode(get_the_content()); ?>
						</div> <!-- .container -->
					</section>
				<?php
				}
				elseif( $page_section == 'full' )
				{
				?>
					<div id="<?php echo $post->post_name; ?>" class="<?php echo $pad_class; ?>full-width clearfix"<?php if($background_color != ""): ?> style='background-color:<?php echo $background_color ?>;'<?php elseif($image !=""): ?> style='background-image:url(<?php echo $image ?>);'<?php endif; ?>>
						<?php if( $no_title != 1 ){ ?>
							<div class="clearfix title-wrap">
							   <h2 class="title <?php if($background_color != ""): ?>white<?php elseif($image != ""): ?>white<?php endif; ?>">	
								<?php if($page_title != '') { echo $page_title; }else{ echo get_the_title(); } ?> </h2>
							</div>
						<?php }?>
						<div class="page-fullwdth-content <?php if($background_color != ""): ?>white<?php elseif($image != ""): ?>white<?php endif; ?>">	
								<?php echo do_shortcode(get_the_content()); ?>
						</div> <!-- .page-fullwdth-content -->
					</div> <!-- .page-content -->
				<?php
				}
				else
				{
					// Parallax Page
					//$image = get_post_meta( $post->ID, 'thm_background_url', true );

					$parallaxId[] = $post->post_name;
				?>
					<section id="<?php echo $post->post_name; ?>" class="<?php echo $pad_class; ?> parallax parallax-section" style="background-image:url('<?php if($image != "") echo $image;?>');">
						<?php if( $no_title != 1 ) { ?>
							<div class="clearfix title-wrap">
								<h2 class="title"><?php if($page_title != '') { echo $page_title; }else{ echo get_the_title(); } ?> </h2>
							</div>
						<?php }?>
						<div class="container">
							<?php echo do_shortcode(get_the_content()); ?>
						</div>
					</section> <!-- /.parallax -->
				<?php
				}
			} // check only for one-page item
		}

		wp_reset_query();

		if( !empty( $parallaxId ) )
		{
			function add_my_script()
			{
				global $parallaxId;
				$output ='';
				$output .='<script type="text/javascript">';
				$output .='jQuery(document).ready(function($) {';
				$output .='$(window).load(function(){';
					
				foreach( $parallaxId as $id ){
					$output .='$("#'.$id.'").parallax("50%", 0.5);';
				}

				$output .='})';
				$output .='})';
				$output .='</script>';
				echo $output;
			}

			add_action('wp_footer','add_my_script',100);
		} // add parallax
	}

?>

<?php get_footer(); ?>