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
		                <h3 class="entry-title brand">
		                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		                    <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
		                    <sup class="featured-post"><?php _e( 'Sticky', 'themeum' ) ?></sup>
		                    <?php } ?>
		                </h3> <!-- //.entry-title -->
		        </header>    
				 <div class="post-content">
                    <h5 style="color:#666;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?><?php if ($blogViews !=0) {?>
&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo ($blogViews); }; ?></h5>
                    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                        <span class="comments-number"> <i class="fa fa-comments-o"></i> <?php echo get_comments_number(get_the_ID()); ?></span>
                    <?php endif;?>
                <!-- //.facebook -->
                 <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=false&width=450&action=like&font=arial&colorscheme=light&height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:40px;" allowtransparency="true"></iframe>
                <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>
			
			  <?php the_tags( '<div class="tag-meta"><span class="tag-links"><i class="fa fa-tags"></i> ', ' ', '</span></div>' ); ?>
			
				<div  id="author" class="media commnets">
					<div class="pull-left">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
					</div>
					<div class="media-body">
					<h4 class="media-heading"><?php echo get_the_author_link(); ?></h4>
					<p><?php the_author_meta('description'); ?></p>
					</div>
				</div> <!-- .post-author -->

		        <div class="clearfix post-navigation">
		            <?php previous_post_link('<span class=" pull-left btn btn-default">%link</span>','<i class="fa fa-long-arrow-left"></i> Früher'); ?>
		             <?php next_post_link('<span class="pull-right btn btn-default">%link</span>','Nächster <i class="fa fa-long-arrow-right"></i>'); ?>
		        </div> <!-- .post-navigation -->


				
				<div class="response-area">
					<?php
						if ( comments_open() || get_comments_number() ) {
								comments_template();
						}
					?>					
				</div><!--/Response-area-->
		</div><!--/.blog-content-->
    </div>
    </div><!--/.blog-item-->

    
</article> <!--/#post-->
