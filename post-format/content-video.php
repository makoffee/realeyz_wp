<?php $blogViews = get_post_meta(get_the_ID(),'_post_count_key',true); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-item">  		
		<div>
            <div class="blog-content">
					<div class="featured-image">
						<?php $video_source = rwmb_meta( 'thm_video_source' ); ?>
						<?php $video = rwmb_meta( 'thm_video' ); ?>

						<?php if($video_source == 1): ?>
							<?php echo rwmb_meta( 'thm_video' ); ?>
						<?php elseif ($video_source == 2): ?>
							<?php echo '<iframe width="100%" height="350" src="http://www.youtube.com/embed/'.$video.'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>'; ?>
						<?php elseif ($video_source == 3): ?>
							<?php echo '<iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; ?>
						<?php endif; ?>

					</div>
	                 <header class="entry-header">
	                 <div class="row">
	                 <div class="col-xs-6 no-padding">
	                        <h3 class="entry-title no-margin">
	                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	                            <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
	                            <sup class="featured-post"><?php _e( 'Sticky', 'themeum' ) ?></sup>
	                            <?php } ?>
	                        </h3> 
	                        <!-- //.entry-title -->
	                </div>
	                <div class="col-xs-6 text-right no-padding">
			        <a class="btn btn-primary btn-sm" href="<?php $key="kmc_entry_url"; echo get_post_meta($post->ID, $key, true); ?>">FILM ANSEHEN</a>
	                </div>
	                </div>
	                </header>
	                
	                <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=false&width=450&action=like&font=arial&colorscheme=light&height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:40px;" allowtransparency="true"></iframe>
	                <!-- //.facebook -->
					 <div class="post-content">
			            <?php the_content(); ?>
			        </div>
			        

		        </div>
        </div>

    </div> <!--/#post-->

</article> <!--/#post-->

