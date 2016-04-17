<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-item">  		
		<div>
            <div class="blog-content">
    			
    		<?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark"> <div class="featured-image">
    					<?php the_post_thumbnail('blog-large', array('class' => 'img-responsive img-blog')); ?>
    			
    				<span class="date"><?php the_time('M'); ?><span><?php the_time('d'); ?></span></span>
    				<span class="post-type"><h4 class="no-padding no-margin"><?php the_title(); ?><h4></span>
    			</div>
    			</a>
            <?php } else{ //.entry-thumbnail ?>
	<?php get_the_image( array( 'scan' => true ) ); ?>
                <div class="no-image">
                    <span class="date"><?php the_time('M'); ?><span><?php the_time('d'); ?></span></span>
                </div>
            <?php } ?>
            
                 <header class="entry-header">
                        <h3 class="entry-title brand">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                            <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
                            <sup class="featured-post"><?php _e( 'Sticky', 'themeum' ) ?></sup>
                            <?php } ?>
                        </h3> <!-- //.entry-title -->
                </header>
                
                <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                <?php the_author_posts_link(); ?>
                <span><i class="fa fa-eye"></i> <?php echo get_post_meta(get_the_ID(),'_post_count_key',true); // dont-delete ?> </span>
                <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                <span class="comments-number"> <i class="fa fa-comments-o"></i> <?php echo get_comments_number(get_the_ID()); ?></span>
                <?php endif;?>
                
                  <!-- //.facebook -->
                 <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=false&width=450&action=like&font=arial&colorscheme=light&height=25" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:40px;" allowtransparency="true"></iframe>
    			 <div class="post-content">
                    <?php the_excerpt(); ?>
                </div>
    		</div><!-- //.blog-content -->
        </div>

    </div> <!--/#post-->

</article> <!--/#post-->

