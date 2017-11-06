<?php $blogViews = get_post_meta(get_the_ID(),'_post_count_key',true); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="blog-item">
		
		<div class="col-xs-12">
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
				 <div class="post-content">
                    
                <!-- //.facebook -->
                 <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=false&width=450&action=like&font=arial&colorscheme=light&height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:40px;" allowtransparency="true"></iframe>
                <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>
			
			  <?php the_tags( '<div class="tag-meta"><span class="tag-links"><i class="fa fa-tags"></i> ', ' ', '</span></div>' ); ?>

		        <div id="fb-root"></div>
<!-- facebook comments -->	        
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="10"></div>
<!-- end facebook comments -->	

                <div class="response-area">
					<?php
						if ( comments_open() || get_comments_number() ) {
								comments_template();
						}
					?>					
				</div><!--/Response-area-->
				
				<div class="clearfix post-navigation">
		            <?php previous_post_link('<span class=" pull-left btn btn-default">%link</span>','<i class="fa fa-long-arrow-left"></i> Früher'); ?>
		             <?php next_post_link('<span class="pull-right btn btn-default">%link</span>','Nächster <i class="fa fa-long-arrow-right"></i>'); ?>
		        </div> <!-- .post-navigation -->
				
		</div><!--/.blog-content-->
    </div>
    </div><!--/.blog-item-->

    
</article> <!--/#post-->
