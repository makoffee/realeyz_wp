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
                    <h4 class="entry-title brand">
                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
                        <sup class="featured-post"><?php _e( 'Sticky', 'themeum' ) ?></sup>
                        <?php } ?>
                    </h4> <!-- //.entry-title -->
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
                <iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&width=450&layout=standard&action=like&size=small&show_faces=false&share=true&height=40&appId" width="450" height="40" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                <?php the_excerpt(); ?>
                </div>
    		</div><!-- //.blog-content -->
        </div>

    </div> <!--/#post-->

</article> <!--/#post-->

