<?php $blogViews = get_post_meta(get_the_ID(),'_post_count_key',true); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="blog-item">  		
		<div>
            <div class="blog-content">
                <?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                <div class="featured-image fadein-quick">
    					<?php the_post_thumbnail('blog-large', array('class' => 'img-responsive img-blog full-width')); ?>
    				<span class="date"><?php the_time('M'); ?><span><?php the_time('d'); ?></span></span>	
    			</div>
    			</a>                
                
            <?php } else {?>
                <div class="featured-image fadein-quick">
                    <img src="http://realeyz.de/wp-content/uploads/2014/05/default_film_alt3.jpg" class="img-responsive img-blog full-width">
    				<span class="date"><?php the_time('M'); ?><span><?php the_time('d'); ?></span></span>
    			</div>
    		<?php  }?>
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
                <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
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
				    <?php previous_post_link('<span class=" pull-left btn btn-primary btn-sm">%link</span>','<i class="fa fa-long-arrow-left"></i> Früher'); ?>
				    <?php next_post_link('<span class="pull-right btn btn btn-primary btn-sm">%link</span>','Nächster <i class="fa fa-long-arrow-right"></i>'); ?>
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
