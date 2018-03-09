<?php $blogViews = get_post_meta(get_the_ID(),'_post_count_key',true); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="blog-item">
		
		<div class="col-xs-12">
			<div class="blog-content">
			<div class="featured-image">
			   <div class="intrinsic-container intrinsic-container-16x9">
					<?php $video_source = rwmb_meta( 'thm_video_source' ); ?>
                    <?php $kmc_entry_id = get_post_meta($post->ID, 'kmc_entry_id', true); ?>
					<?php $video = rwmb_meta( 'thm_video' ); ?>
                    <?php if($kmc_entry_id != ''): ?>
                        <?php echo '<iframe id="kaltura_player_1509100143" src="https://www.kaltura.com/p/2031841/sp/203184100/embedIframeJs/uiconf_id/40844861/partner_id/2031841?iframeembed=true&playerId=kaltura_player_1509100143&entry_id='.$kmc_entry_id.'" width="600" height="337" allowfullscreen webkitallowfullscreen mozAllowFullScreen frameborder="0"></iframe>'; ?>
                    <?php endif; ?>
					<?php if($video_source == 1): ?>
						<?php echo rwmb_meta( 'thm_video' ); ?>
					<?php elseif ($video_source == 2): ?>
						<?php echo '<iframe width="100%" height="350" src="http://www.youtube.com/embed/'.$video.'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>'; ?>
					<?php elseif ($video_source == 3): ?>
						<?php echo '<iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; ?>
					<?php endif; ?>
				</div>	
				</div>

		         <header class="entry-header">
		         <div class="row">
	                 <div class="col-sm-9 col-xs-6 no-padding">
	                        <h4 class="entry-title no-margin">
	                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	                            <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
	                            <sup class="featured-post"><?php _e( 'Sticky', 'themeum' ) ?></sup>
	                            <?php } ?>
	                        </h4> 
	                        <!-- //.entry-title -->
	                </div>
	                <?php $kmc_entry_url = get_post_meta($post->ID, 'kmc_entry_url', true); ?>
	                <?php if($kmc_entry_url != ''): ?>
	                <div class="col-sm-3 col-xs-6 text-right no-padding">
			        <a class="btn btn-primary btn-sm" href="<?php echo($kmc_entry_url); ?>">WATCH NOW</a>
	                </div>
	                <?php endif; ?>
	                </div>
		        </header>    
				<div class="post-content">
				<!-- custom author -->
    			 <h5 style="color:#666;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
    			 <?php
    			 $custom_author = get_post_meta($post->ID, 'custom_author', true);
    			 $custom_author_url = get_post_meta($post->ID, 'custom_author_url', true);	 
    			 if (($custom_author_url != '' )&&($custom_author != '')) { ?><a href="<?php echo($custom_author_url); ?>"><?php echo($custom_author); ?></a> <?php }
    			 else if (($custom_author_url == '' )&&($custom_author != '')) { echo($custom_author);
    			 } else { the_author_posts_link(); } ?>
    			 &nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?><?php if ($blogViews !=0) {?>
&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo ($blogViews); }; ?></h5>
                    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                        <span class="comments-number"> <i class="fa fa-comments-o"></i> <?php echo get_comments_number(get_the_ID()); ?></span>
                    <?php endif;?>
                <!-- //.facebook -->
                <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=40&appId" width="450" height="40" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                </div>
                
                <div  id="author" class="media commnets">
					<div class="pull-left">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
					</div>
					<div class="media-body">
					<h4 class="media-heading"><?php echo get_the_author_link(); ?></h4>
					<p><?php the_author_meta('description'); ?></p>
					</div>
				</div> <!-- .post-author -->
				
				<?php the_tags( '<div class="tag-meta"><span class="tag-links"><i class="fa fa-tags"></i> ', ' ', '</span></div>' ); ?>
				
				<div class="clearfix post-navigation">
				    <?php previous_post_link('<span class=" pull-left">%link</span>','<i class="fa fa-long-arrow-left"></i> Früher'); ?>
				    <?php next_post_link('<span class="pull-right">%link</span>','Nächster <i class="fa fa-long-arrow-right"></i>'); ?>
		        </div> <!-- .post-navigation -->
				
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://realeyz.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//realeyz.disqus.com/count.js" async></script>
				
				<div class="response-area">
					<?php
						if ( comments_open() || get_comments_number() ) {
								comments_template();
						}
					?>					
				</div>
				
				<!--/Response-area-->
		</div><!--/.blog-content-->
    </div>
    </div><!--/.blog-item-->

    
</article> <!--/#post-->
