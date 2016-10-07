<?php
/*
 * Template Name: Flexable no-sidebar II
 */
get_header();
	$args = array( 'post_type' => 'page');
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
            
            if ( has_post_thumbnail() && ! post_password_required())
                {
                    $imageHero = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $imageHero = $imageHero[0];?>
                        <div id="hero" style="background-image: url('<?php echo $imageHero; ?>');" >
                            <div class="clearfix title-wrap white container">
                            <?php if( $no_title != 1 ){ ?><h1 class="entry-title"><span><?php the_title(); ?></span></h1><?php };?>
                            <?php if( $page_subtitle != '' ){ ?><h3 class="entry-title"><span><?php echo($page_subtitle); ?></span></h3><?php };?>
                            </div>
                        </div>
                    <?php
                    } else {
                        if( $no_title !== 0 ){ ?>
                             <div class="clearfix title-wrap" style="margin-top:120px">
                            <h2 class="<?php if($background_color != ""): ?>white<?php elseif($image != ""): ?>white<?php endif; ?>">	
                            <?php if($page_title != '') { echo $page_title; }else{ echo get_the_title(); } ?> </h2>
	                        </div>
	               <?php
                        } 
                    }
		        
			if(( $separator != 1 ) && ( $postId != $current_page_id ))
			{
				if( $page_section == 'default' ){		// Default Content Page
				?>
				
				
				
					<section id="<?php echo $post->post_name; ?>" class="<?php echo $pad_class; ?>" <?php if($background_color != ""): ?> style='background-color:<?php echo $background_color ?>;'<?php elseif($image !=""): ?> style='background-image:url(<?php echo $image ?>); background-size:cover; background-position: top center;'<?php endif; ?>>
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